<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Students;
use Hashids;
use Session;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Image;
use File;

use App\Models\Courses;
use App\Models\ContentLecture;
use App\Models\CourseFeature;
use App\Models\UserCourse;
use App\Models\CourseReview;
use App\Models\StudentBillingDetail;
use App\Models\ShoppingCart;
use App\Models\Orders;
use Gloudemans\Shoppingcart\Facades\Cart;

use Srmklive\PayPal\Services\ExpressCheckout;
use Log;
use URL;

class CheckoutController  extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('preventBackHistory');
    }

    //To show Course Listing View
    public function  index(){

        if(Auth::user()){
            $user = Auth::user();

            $cartItems = ShoppingCart::with('course_details')->where('order_id', 0)
                ->where(function($query) use($user){
                    return $query->where('student_id', $user->id)
                        ->orWhere('ip', getUniqueSessionId() );

                })->get();
            $billing_detail = StudentBillingDetail::where('student_id', $user->id)->orderby('id', 'desc')->first();

            return view('student.checkout.checkout_details',compact('user', 'cartItems', 'billing_detail'));
        }else{
            return redirect('student/login');
        }
    }

    public function store(Request $request){

        $authenticated_user = Auth::user();

        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'country' => 'required',
            'street_address' => 'required',
            'post_code' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'payment_method' => 'required',
        ];
        $this->validate($request, $rules);


        $total = 0;
        $shopping_cart_array = [];
        $cart_items = ShoppingCart::with('course_details')->where('order_id', 0)
            ->where(function($query) use($authenticated_user){

                return $query->where('student_id', $authenticated_user->id)
                    ->orWhere('ip', getUniqueSessionId() );

            })->get();
        $data = [];
        if($cart_items){
            foreach ($cart_items as $row){
                $shopping_cart['student_id'] = $authenticated_user->id;
                $total = $total+($row->price*$row->quantity);
                $shopping_cart_array[] =$row->id;

                $data_pay['items'][]=
                    [
                        'name' => $row->course_details->name,
                        'price' => $row->price,
                        'desc' => '',
                        'qty' => $row->quantity
                    ];

            }
        }

        $order['student_id'] = $authenticated_user->id;
        $order['order_status'] = 'Pending';
        $order['order_date'] = Carbon::now()->toDateTimeString();
        $order['order_total'] = $total;
        $order['payment_method'] = $request->payment_method;
        $created_order  = Orders::create($order);

        $input['student_id'] = $authenticated_user->id;
        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['company_name'] = isset($request->company_name)?$request->company_name:null;
        $input['country_id'] = $request->country;
        $input['street_address'] = $request->street_address;
        $input['street_address_2'] = isset($request->street_address_2)?$request->street_address_2:null;
        $input['post_code'] = $request->post_code;
        $input['city'] = $request->city;
        $input['province'] = isset($request->province)?$request->province:null;
        $input['phone'] = $request->phone;
        $input['email'] = $request->email;
        $input['order_notes'] = isset($request->order_notes)?$request->order_notes:null;
        $input['order_id'] =$created_order->id;

        $billing_detail = StudentBillingDetail::where('order_id', $created_order->id)->first();
        if($billing_detail){

            StudentBillingDetail::where('id', $billing_detail->id)->update($input);
        }else{

            $billing_detail = StudentBillingDetail::create($input);
        }



        ShoppingCart::whereIn('id', $shopping_cart_array)->update(array('order_id'=>$created_order->id, 'student_id'=>$authenticated_user->id));

        if($request->payment_method==3){
            $data_pay['invoice_id'] = $created_order->id;
            $data_pay['invoice_description'] = '';
            $data_pay['return_url'] = URL::to('/student/order/success/'.$created_order->id);
            $data_pay['cancel_url'] = URL::to('/student/order/cancel/'.$created_order->id);
            $data_pay['total'] = $total;

            $provider = new ExpressCheckout;
            $response = $provider->setExpressCheckout($data_pay);

            return redirect($response['paypal_link']);
        }else{
            $this->sendEmail($created_order->id, Auth::user()->id);
        }


        $response['message'] = Lang::get('messages.Order has been placed successfully.');
        Session::flash('success_message', $response['message']);
        return redirect('/student/orders');

    }

    public function SuccessPayment($order_id,Request $request){
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            $orders = Orders::where('id',$order_id)->first();

            $shopping_cart = ShoppingCart::where('order_id', $order_id)->get();
            if($shopping_cart){
                foreach($shopping_cart as $row){
                    $user_course['user_id'] = Auth::user()->id;
                    $user_course['course_id'] = $row->course_id;
                    UserCourse::create($user_course);
                }
            }

            $up['order_status'] = 'Completed';
            $orders->update($up);
            $this->sendEmail($orders->id, Auth::user()->id);
            Session::flash('success_message', Lang::get('messages.Your Payment is done and order placed successfully.'));
            return redirect('/student/orders');
        }
        Order::where('id', $order_id)->update(array('order_status'=>'Cancelled'));

        Session::flash('error_message', Lang::get('messages.Your Payment went Wrong.'));
        return redirect('/student/orders');

    }

    public function cancelPayment($order_id,Request $request)
    {
        Order::where('id', $order_id)->update(array('order_status'=>'Cancelled'));

        Session::flash('error_message', Lang::get('messages.Your Payment is Cancelled.'));
        return redirect('/student/orders');
    }


    public function sendEmail($order_id=0 , $user_id=0)
    {
        $order_detail = Orders::where('id', $order_id)->first();
        $shopping_cart_detail = ShoppingCart::with('course_details')->where('order_id', $order_id)->get();
        $billing_detail = StudentBillingDetail::with('country')->where('order_id', $order_id)->first();

        $username = Auth::user()->name;
        $email_to = Auth::user()->email;

        $payment_method = $order_detail->payment_method_detail;
        $order_date = $order_detail->order_date;
        $total_bill = settingValue('user_currency').$order_detail->order_total;
        $item_details='<table><tr><td width="300">Item</td><td width="300">Quantity</td><td width="300">Price</td><td  width="300">Total Price</td></tr>';
        if($shopping_cart_detail){
            foreach ($shopping_cart_detail as $row){
                $item_details.='<tr>';
                $item_details.='<td width="300"><p>'.$row->course_details->name.'</p></td>';
                $item_details.='<td width="300">'.$row->quantity.'</td>';
                $item_details.='<td width="300">'.settingValue('user_currency').$row->price.'</td>';
                $item_details.='<td width="300">'.settingValue('user_currency').$row->total_price.'</td>';
                $item_details.='</tr>';
            }
        }
        $item_details.= '</table>';
        $billing_address = '<table>';
        $billing_address.='<tr><td>Comapny Name:</td><td>'.$billing_detail->company_name.'</td></tr>';
        $billing_address.='<tr><td>Country:</td><td> '.$billing_detail->country->name.'</td></tr>';
        $billing_address.='<tr><td>Street Address:</td><td> '.$billing_detail->street_address.'</td></tr>';
        $billing_address.='<tr><td>Street Address 2:</td><td> '.$billing_detail->street_address_2.'</td></tr>';
        $billing_address.='<tr><td>Post Code:</td><td> '.$billing_detail->post_code.'</td></tr>';
        $billing_address.='<tr><td>City:</td><td> '.$billing_detail->city.'</td></tr>';
        $billing_address.='<tr><td>Province:</td><td> '.$billing_detail->province.'</td></tr>';
        $billing_address.='<tr><td>Phone:</td><td> '.$billing_detail->phone.'</td></tr>';
        $billing_address.='<tr><td>Email:</td><td> '.$billing_detail->email.'</td></tr>';
        $billing_address .= '</table>';


        $order_note = $billing_detail->order_notes;

        $email_data = Email::where('key', 'order_confirmed')->first();


        $email_subject = $email_data->subject;
        $email_body = $email_data->content;
        $email_body = str_replace('{username}', $username, $email_body);
        $email_body = str_replace('{order_date}', date('Y-m-d',strtotime($order_date)), $email_body);
        $email_body = str_replace('{payment_method}', $payment_method, $email_body);
        $email_body = str_replace('{item_details}', $item_details, $email_body);
        $email_body = str_replace('{billing_address}', $billing_address, $email_body);
        $email_body = str_replace('{total_bill}', $total_bill, $email_body);
        $email_body = str_replace('{order_note}', $order_note, $email_body);

        $body = $email_body;
        Email::sendEmail($email_to, $email_data, $body, $email_subject);

    }
}
