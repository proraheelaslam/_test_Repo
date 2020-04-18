<?php

namespace App\Http\Controllers\Pages;

use App\Models\ShoppingCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CourseCartController extends Controller
{
    //


    public function index(){

        $user_id = Auth::guard('student')->id();
        $cartItems = ShoppingCart::with('course_details')
                                    ->where('order_id', 0)
                                    ->where(function($query) use($user_id){
                                        return $query->where('student_id', $user_id)
                                            ->orWhere('ip', getUniqueSessionId() );

                                    })->get();

       //
        return view('student.pages.course_cart_page', compact('cartItems'));
    }


    public function addCourseCart(Request $request){

        $user_id = Auth::guard('student')->id();
        $course = ShoppingCart::with('course_details')
                        ->where('order_id', 0)
                        ->where('course_id', $request->id)
                            ->where(function($query) use($user_id){
                                return $query->where('student_id', $user_id)
                                    ->orWhere('ip', getUniqueSessionId() );

                            })->first();

        if (is_null($course)) {

            $shoppingCart = new ShoppingCart();
            $shoppingCart->price = $request->price;
            $shoppingCart->quantity = $request->qty;
            $shoppingCart->course_id = $request->id;
            $shoppingCart->student_id =  (Auth::guard('student')->id() != null ? Auth::guard('student')->id() : 0);
            $shoppingCart->order_id = 0;
            if (Auth::guard('student')->id() != null) {
                $shoppingCart->student_id =  Auth::guard('student')->id();
                $shoppingCart->ip = null;
            }else{
                $shoppingCart->student_id =  0;
                $shoppingCart->ip = getUniqueSessionId();
            }

            $shoppingCart->save();
        }

        return getAllShoppingCartItems();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function removeCourseCart(Request $request){

        $user_id = Auth::guard('student')->id();
        ShoppingCart::where('course_id', $request->id)
                        ->where('order_id', 0)
                        ->where(function($query) use($user_id){
                            return $query->where('student_id', $user_id)
                                ->orWhere('ip', getUniqueSessionId() );
                        })->delete();

        return [
            'data'=> getAllShoppingCartItems()
        ];

    }

    public function getAllCartItems(){

        return [
            'total_items' => getTotalCartItems(),
            'cart_items' => getAllShoppingCartItems()
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function updateCourseCart(Request $request){

        $cartItems = $request->items;
        foreach ($cartItems as $item) {
            ShoppingCart::where('course_id', $item['itemId'])->update(['quantity' => $item['qty'] ]);
        }
        return [
            'data' => []
        ];
    }


}
