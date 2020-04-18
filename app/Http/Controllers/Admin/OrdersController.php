<?php

namespace App\Http\Controllers\Admin;

use App\Models\Email;
use App\Models\ShoppingCart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Orders;
use DataTables;
use Hashids;
use Session;
use URL;
use App\Models\UserCourse;

class OrdersController extends Controller {
    //
    public $resource = 'admin/orders/';
    public $view_path = 'admin/orders';

    public function AllOrders() {

        $data['class'] = 'orders';
        $data['subclass'] = 'all_orders';

        $data['title'] = 'Manage Orders';
        $data['resource'] = $this->resource;
        return view($this->view_path . '/all_listing', $data);
    }

    public function orderUpdateStatus(Request $request) {
        $order_id = $request->order_id;
        $order_status = $request->order_status;
        $order = Orders::with('student_details', 'shopping_carts')->where('id', $order_id)->first();

        if($order_status == 'Completed'){
            if($order->shopping_carts){
                foreach($order->shopping_carts as $row){
                    $exist_usercourse = UserCourse::where('user_id', $row->student_id)
                                                ->where('course_id', $row->course_id)
                                                ->first();
                    if(empty($exist_usercourse)){
                        $user_course['user_id'] = $row->student_id;
                        $user_course['course_id'] = $row->course_id;
                        UserCourse::create($user_course);
                    }

                }
            }

        }

        $input['order_status'] = $order_status;
        $order->update($input);
        $email_data = Email::where('key', 'order_status_changed')->first();
        $email_to = $order['student_details']['email'];

        $email_subject = $email_data->subject;
        $email_body = $email_data->content;
        $email_body = str_replace('{username}', $order['student_details']->name, $email_body);
        $email_body = str_replace('{order_id}', $order->id, $email_body);
        $email_body = str_replace('{order_status}', $order->order_status, $email_body);

        $body = $email_body;
        Email::sendEmail($email_to, $email_data, $body, $email_subject);

        Session::flash('success_message', 'Status successfully updated and Email has been sent to user.');
        echo 1;
    }
    public function orderDetail($order_id) {

        try {
            $id = Hashids::decode($order_id)[0];

            $orders = Orders::with(['course_details','student_details', 'billing_detail'])
                ->where('id', $id)
                ->first();

            $shopping_cart_detail = ShoppingCart::with('course_details')->where('order_id', $id)->get();

            $data['class'] = 'orders';

            $data['title'] = 'Order Detail';

            $data['orders'] = $orders;
            $data['shopping_cart_detail'] = $shopping_cart_detail;
            $data['resource'] = $this->resource;
            return view($this->view_path . '/order_detail', $data);

        } catch (\Exception $e) {

            return redirect($this->resource);
        }
    }
    public function orderDetailEdit($order_id) {

        try {
            $id = Hashids::decode($order_id)[0];

            $orders = Orders::with(['course_details','school_details', 'student_details'])->where('id', $id)->get()->first();
            $data['class'] = 'orders';

            $data['title'] = 'Order Detail';

            $data['orders'] = $orders;

            return view($this->view_path . '/order_detail_edit', $data);

        } catch (\Exception $e) {

            return redirect($this->resource);
        }
    }
    public function deleteOrder($id) {
        try {
            $id = Hashids::decode($id)[0];
            $order = Orders::findOrFail($id);

            $order_details = AdditionalOrders::where(['order_id' => $id])->get();
            $order->delete();
            $order_details->delete();
            Session::flash('success_message', 'Order has been successfully deleted.');

            echo 'success';
        } catch (\Exception $e) {
            return redirect($this->resource);
        }
    }
    public function getOrders(Request $request) {
        //client order
        $status = $request->status;

        $orders = Orders::with(['course_details', 'school_details', 'student_details']);
        if ($status == 'all') {
            $orders = $orders->whereIn('order_status', [ 'Pending','Completed','Cancelled','Paid','Unpaid']);
        }

        $orders = $orders->orderBy('order_date', 'desc')->get();

        return Datatables::of($orders)

            ->addColumn('order_id', function ($single) {
                return @$single->id;
            })
            ->addColumn('purchaser_name', function ($single) {
                return $single['student_details']->name;
            })
            ->addColumn('purchaser_email', function ($single) {
                return @$single['student_details']->email;
            })
            ->addColumn('order_total', function ($single) {
                return settingValue('user_currency') . $single->order_total;
            })
            ->addColumn('order_date', function ($single) {
                return Carbon::parse($single->order_date)->format('Y-m-d');
            })
            ->addColumn('order_status', function ($single) {
                $html = '<select name="order_status" id="order_status_'.$single->id.'" onchange="change_status('.$single->id.')">';
                foreach(getOrderStatus() as $key => $row){
                    $selected = '';
                    if($single->order_status == $key){
                        $selected = "selected";
                    }
                    $html.='<option value="'.$key.'" '.$selected.' > '.$row.'</option>';
                }

                $html.='</select>';
                return $html;
            })

            ->addColumn('action', function ($single) {
                $id = Hashids::encode($single->id);
                $action_html = '';

                $action_html = '<a '.get_tooltip('Order Detail').' href="' . URL::to('admin/orders/order_detail/' . $id . '') . '" ><i class="fa fa-bars"></i></a>';
                return $action_html;

            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['order_id', 'purchaser_name', 'purchaser_email', 'order_total','order_date', 'order_status', 'action'])
            ->make(true);

    }

}
