@extends('student.layout.auth')

@section('content')

    <main class="content">
        <section class="courseCheckOut_main">
            <div class="auto_content">
                <form id="course_form"  name="course_form" role="form" method="POST" action="{{ url('/student/order/save') }}">
                    {{csrf_field()}}
                <div class="courseCheckOut_inner clearfix">
                    <div class="courseCheckOut_left">
                        <div class="courseCheckOut_left_inner">
                            {{--<div class="course_haveCoupn_top">
                                <p>{{Lang::get('label.Have a coupon?')}} <a href="javascript:void(0)" class="course_haveCoupn_click">{{Lang::get('label.Click here to enter your code')}}</a></p>
                                <div class="course_haveCoupn_show">
                                    <ul>
                                        <li>
                                            <div class="form_field">
                                                <input type="text" class="course_haveCoupn_field" placeholder="{{Lang::get('label.Coupon Code')}}">
                                            </div>
                                        </li>
                                        <li> <a class="all_buttons all_orange course_applyCouponBtn" href="javascript:void(0)">{{Lang::get('label.Apply Coupon')}}</a> </li>
                                    </ul>
                                </div>
                            </div>--}}
                            <div class="course_form">
                                <div class="formParent">
                                    <div class="formRow clearfix">
                                        <div class="formCell col12">
                                            <div class="form_heading">
                                                <h4>{{Lang::get('label.Billing Details')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    @include('student.flash_message')
                                    <div class="formRow clearfix">
                                        <div class="formCell col6">
                                            <div class="form_heading"> <strong>{{Lang::get('label.First Name')}} *</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_firstName" name="first_name" value="{{isset($billing_detail->first_name)?$billing_detail->first_name:old('first_name')}}">
                                            </div>
                                        </div>
                                        <div class="formCell col6">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Last Name')}} *</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_lastName" name="last_name" value="{{isset($billing_detail->last_name)?$billing_detail->last_name:old('last_name')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix">
                                        <div class="formCell col12">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Company name (optional)')}}</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_companyName" name="company_name" value="{{isset($billing_detail->company_name)?$billing_detail->company_name:old('company_name')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix">
                                        <div class="formCell col12">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Country')}} *</strong> </div>
                                            <div class="search_select_out">
                                                <select class="search_select cource_billingSel_country" name="country">
                                                    <option></option>
                                                    @foreach(getCountryList() as $row)
                                                        <option value="{{$row->id}}" <?php if(@$billing_detail->country_id == $row->id) {?> selected<?php }else if(old('country')==$row->id){?> selected<? }?>>{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix">
                                        <div class="formCell col12">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Street address')}} *</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_address1" placeholder="{{Lang::get('label.House number and street name')}}" name="street_address" value="{{isset($billing_detail->street_address)?$billing_detail->street_address:old('street_address')}}">
                                            </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_address2" placeholder="{{Lang::get('label.Apartment, suite, unit etc. (optional)')}}" name="street_address_2" value="{{isset($billing_detail->street_address_2)?$billing_detail->street_address_2:old('street_address_2')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix">
                                        <div class="formCell col6">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Postcode / ZIP')}} *</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_zip" name="post_code" value="{{isset($billing_detail->post_code)?$billing_detail->post_code:old('post_code')}}">
                                            </div>
                                        </div>
                                        <div class="formCell col6">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Town / City')}} *</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_city" name="city" value="{{isset($billing_detail->city)?$billing_detail->city:old('city')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix">
                                        <div class="formCell col6">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Province')}}</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_province"  name="province" value="{{isset($billing_detail->province)?$billing_detail->province:old('province')}}">
                                            </div>
                                        </div>
                                        <div class="formCell col6">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Phone')}} *</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_phone"  name="phone" value="{{isset($billing_detail->phone)?$billing_detail->phone:old('phone')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix">
                                        <div class="formCell col12">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Email address')}} *</strong> </div>
                                            <div class="form_field">
                                                <input type="text" class="cource_billingField_email"  name="email" value="{{isset($billing_detail->email)?$billing_detail->email:old('email')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix">
                                        <div class="formCell col12">
                                            <div class="form_heading">
                                                <h4>{{Lang::get('label.Additional Information')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix">
                                        <div class="formCell col12">
                                            <div class="form_heading"> <strong>{{Lang::get('label.Order notes (optional)')}}</strong> </div>
                                            <div class="form_field">
                                                <textarea class="cource_billingField_notes" placeholder="{{Lang::get('label.Notes about your order, e.g. special notes for delivery.')}}"  name="order_notes">{{isset($billing_detail->order_notes)?$billing_detail->order_notes:old('order_notes')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="courseCheckOut_right">
                        <div class="courseCheckOut_right_inner">
                            <div class="cource_orderSumry_box">
                                <div class="cource_orderSumry_box_inner">
                                    <h5>{{Lang::get('label.Your Order')}}</h5>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="cource_orderSumry_cell"> <strong>{{Lang::get('label.Product')}}</strong> </div>
                                            <div class="cource_orderSumry_cell"> <strong>{{Lang::get('label.Total')}}</strong> </div>
                                        </li>
                                        <?php $total_price = 0;?>
                                        @if(!is_null($cartItems))
                                            @foreach($cartItems as $item)
                                                <?php $total_price = $total_price+($item->price*$item->quantity); ?>
                                                <li class="clearfix">
                                                    <div class="cource_orderSumry_cell">
                                                       <a href="{{url('courses/course_detail/').'/'.Hashids::encode($item->course_id)}}" >
                                                           <p>{{$item->course_details->name}} × {{$item->quantity}}</p>
                                                       </a>
                                                    </div>
                                                    <div class="cource_orderSumry_cell">
                                                        <p>{{settingValue('user_currency')}}{{number_format($item->price*$item->quantity,2)}}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif

                                        <li class="clearfix">
                                            <div class="cource_orderSumry_cell"> <strong>{{Lang::get('label.Subtotal')}}</strong> </div>
                                            <div class="cource_orderSumry_cell"> <strong>{{Lang::get('label.Subtotal')}}</strong> </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="cource_orderSumry_cell"> <strong>{{Lang::get('label.Total')}}</strong> </div>
                                            <div class="cource_orderSumry_cell">
                                                <strong class="cource_orderSumry_total">{{settingValue('user_currency')}}{{number_format($total_price,2)}}</strong>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cource_payment_box">
                            <div class="cource_payment_box_inner">
                                <div class="cource_payment_row">
                                    <div class="form_checkbox cource_payment_check">
                                        <label> {{Lang::get('label.Direct bank transfer')}}
                                            <input type="radio" name="payment_method" value="1" <? if(old('payment_method')==1){?>checked<?}?> >
                                            <span class="checkbox_checked form_radio"></span> </label>
                                    </div>
                                    <div class="cource_payment_checkShow" <?php if(@old('payment_method')==1){ ?> style="display: block;"<?php }else{?> style="display: none;"<?php  } ?>>
                                        <div class="cource_payment_tipBox"> <span>{{settingValue('direct_bank_transfer')}}</span> </div>
                                    </div>
                                </div>
                                <div class="cource_payment_row">
                                    <div class="form_checkbox cource_payment_check">
                                        <label> {{Lang::get('label.Check payments')}}
                                            <input type="radio" name="payment_method" value="2" <? if(old('payment_method')==2){?>checked<?}?>>
                                            <span class="checkbox_checked form_radio"></span> </label>
                                    </div>
                                    <div class="cource_payment_checkShow" <?php if(@old('payment_method')==2){ ?> style="display: block;"<?php }else{?> style="display: none;"<?php  } ?>>
                                        <div class="cource_payment_tipBox"><span>{{settingValue('check_payments')}}</span></div>
                                    </div>
                                </div>
                                <div class="cource_payment_row">
                                    <div class="form_checkbox cource_payment_check">
                                        <label> {{Lang::get('label.Paypal')}}<em class="cource_payment_payPal"></em>
                                            <input type="radio" name="payment_method" value="3" <? if(old('payment_method')==3){?>checked<?}?>>
                                            <span class="checkbox_checked form_radio"></span> </label>
                                    </div>
                                </div>
                                <div class="cource_payment_row">
                                    <button type="submit"  class="all_buttons all_orange btn_rounded cource_payment_placeOrdr_btn">{{Lang::get('label.Place Order')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
        <script type="text/javascript">

        </script>
    </main>
@endsection
