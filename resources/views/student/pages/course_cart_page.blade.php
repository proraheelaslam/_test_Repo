@extends('student.layout.auth')
@section('content')
    @php $subTotalItems = 0; @endphp
    <main class="content">
        <section class="courseCheckOut_main courseCart_main">
            <div class="auto_content">
                <div class="courseCheckOut_inner clearfix cp_cart_item_inner">

                    <div class="emptyCartSection " style="display: {{ (getTotalCartItems() == 0) ? 'block' : 'none' }}">
                        <p class="emptyCartTxt">{{Lang::get('label.Your cart is empty. Keep shopping to find a course!')}}</p>
                        <a class="cp_addCart_btn cp_add_to_cart_button all_buttons all_orange " href="{{ Session::has('previous_search_url')  ? Session::get('previous_search_url') : url('courses/search?')}}">{{Lang::get('label.Keep shopping')}} </a>
                    </div>
                    <div style="display: {{ (getTotalCartItems() == 0) ? 'none' : 'block' }}">
                        <div class="courseCart_left cp_cartItem_sec">
                            <div class="courseCart_left_inner">
                                <div class="courseCart_tableMain">
                                    <div class="courseCart_table">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <thead>
                                            <tr>
                                                <th width="560" scope="col"><strong>{{Lang::get('label.Product')}}</strong></th>
                                                <th scope="col"><strong>{{Lang::get('label.Price')}}</strong></th>
                                                <th scope="col"><strong>{{Lang::get('label.Quantity')}}</strong></th>
                                                <th scope="col"><strong>{{Lang::get('label.Total')}}</strong></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($cartItems) > 0)
                                                @foreach($cartItems as $item)

                                                    @php  $subTotalItems =  number_format((float)$subTotalItems + $item->price*$item->quantity, 2, '.', '');
                                                          $itemPrice = number_format((float)$item->price*$item->quantity, 2, '.', '');

                                                    @endphp
                                                    <tr class="cp_cart_item_list" data-student-id="{{$item->student_id}}" data-ip-id="{{$item->ip}}" data-item-id="{{$item->course_id}}">
                                                        <td>
                                                            <div class="courseCart_cell1"> <a data-id="{{$item->course_id}}" class="courseCart_close remove_cartItem" href="javascript:void(0)"></a>
                                                                <div class="courseCart_selectedImg"> <span><img src="{{$item->course_details->fullImage}}" alt="#"></span> </div>
                                                                <div class="courseCart_cellDetail">
                                                                    <p><strong><a href="{{url('courses/course_detail')}}/{{Hashids::encode($item->course_details->id)}}">{{$item->course_details->name}}</a></strong></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="courseCart_cellPrice">${{$item->price}}</p>
                                                        </td>
                                                        <td>
                                                            <div class="form_field">
                                                                <input  min="1" type="number" class="courseCart_number course_cart_qty" value="{{$item->quantity}}">
                                                            </div></td>
                                                        <td>
                                                            <p class="courseCart_cellPrice">${{$itemPrice}}</p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="course_haveCoupn_show courseCart_coupsForm">
                                    <ul>
                                      {{--  <li>
                                            <div class="form_field">
                                                <input type="text" class="course_haveCoupn_field" placeholder="Coupon Code">
                                            </div>
                                        </li>
                                        <li> <a class="all_buttons all_orange course_applyCouponBtn" href="javascript:void(0)">Apply Coupon</a> </li>
                                        --}}
                                        <li> <a class="all_buttons course_updateCartBtn course_item_cart_update_btn" href="javascript:void(0)">{{Lang::get('label.Update Cart')}}</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="courseCart_right cp_cartItem_sec">
                            <div class="courseCart_right_inner">
                                <div class="cource_orderSumry_box">
                                    <div class="cource_orderSumry_box_inner">
                                        <h5>{{Lang::get('label.Cart Totals')}}</h5>
                                        <ul>
                                            <li class="clearfix">
                                                <div class="cource_orderSumry_cell"> <strong>{{Lang::get('label.Subtotal')}}</strong> </div>
                                                <div class="cource_orderSumry_cell"> <strong>${{$subTotalItems}}</strong> </div>
                                            </li>
                                            <li class="clearfix">
                                                <div class="cource_orderSumry_cell"> <strong>{{Lang::get('label.Total')}}</strong> </div>
                                                <div class="cource_orderSumry_cell"> <strong class="cource_orderSumry_total">${{$subTotalItems}}</strong> </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cource_payment_row">
                                <a class="all_buttons all_orange btn_rounded cource_cart_processOrdr_btn" href="{{url('/student/cart/checkout')}}">{{Lang::get('label.Proceed To Checkout')}}</a> </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </main>

    <div class="all_popup small_popup message_popup">
        <div class="all_popup_inner">
            <div class="popup_table">
                <div class="popup_tableCell">
                    <div class="popup_auto">
                        <div class="popup_detail">
                            <div class="all_popup_header clearfix">
                                <div class="popup_header_left">
                                    <ul>
                                        <li><strong>{{Lang::get('label.Warning !')}}</strong></li>
                                    </ul>
                                </div>
                                <div class="popup_close"></div>
                            </div>
                            <div class="popup_content">
                                <div class="popup_tabs_main">
                                    <div class="popupTabs_detail">
                                        <div class="popupTabs_show" style="display:block;">
                                            <div class="setting_width_main">
                                                <div class="formParent">
                                                    <div class="formRow clearfix">
                                                        <div class="formCell col12">
                                                            <div class="form_heading_out">
                                                                <div class="form_heading"> <strong id="message_text" class="ms_alert">{{Lang::get('label.Are you sure you want to delete this course?')}} </strong> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="formRow padding_0 clearfix">
                                                        <div class="formCell col12">
                                                            <div class="form_saveBtn text_right"> <a href="javascript:void(0)" class="all_buttons small_popup_ok_btn mes_btn_ok confirmDeleteCartItemBtn">{{Lang::get('label.Ok')}}</a>
                                                                <a href="javascript:void(0)" class="all_buttons small_popup_ok_btn mes_btn_cancel">{{Lang::get('label.Cancel')}}</a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="back_top_btn"> <a href="javascript:void(0);"></a> </div>
@endsection
@section('javascript')
@stop
