<div class="stOrdrs_details">
    <div class="form_heading">
        <h4>{{Lang::get('label.Order Details')}}</h4>
    </div>
    <ul>
        <li>
            <strong>{{Lang::get('label.Total')}}</strong>
            <span>{{settingValue('user_currency')}}{{$data['order_detail']->order_total}}</span>
        </li>
        <li>
            <strong>{{Lang::get('label.Total Paid')}}</strong>
            <span>{{settingValue('user_currency')}}{{$data['order_detail']->order_total}}</span>
        </li>
    </ul>
</div>
<div class="courseCart_tableMain st_order_detailTable">
    <div class="courseCart_table">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th width="360" scope="col"><strong>{{Lang::get('label.Item')}}</strong></th>
                <th scope="col"><strong>{{Lang::get('label.Ordered')}}</strong></th>
               {{-- <th width="" scope="col"><strong>{{Lang::get('label.Coupon Code')}}</strong></th>
                --}}
                <th scope="col"><strong>{{Lang::get('label.Quantity')}}</strong></th>
                <th width="130" scope="col"><strong>{{Lang::get('label.Price')}}</strong></th>
                <th width="160" scope="col"><strong>{{Lang::get('label.Amount')}}</strong></th>
            </tr>
            </thead>
            <tbody>
            @if(count($data['order_detail']->shopping_carts)>0)
                @foreach($data['order_detail']->shopping_carts as $single_cart)
                    <tr>
                        <td><div class="courseCart_cell1">
                                <div class="courseCart_cellDetail">
                                    <p>
                                        <strong>
                                            <a href="{{url('student/courses/course_video/').'/'.Hashids::encode($single_cart->course_id)}}">{{isset($single_cart->course_details->name)?$single_cart->course_details->name:'NILL'}}</a>
                                        </strong>
                                    </p>
                                </div>
                            </div></td>
                        <td><p class="courseCart_cellPrice">{{set_date_formate($single_cart->created_at)}}</p></td>
                        {{--<td><p class="courseCart_cellPrice">NILL</p></td>--}}
                        <td><p class="courseCart_cellPrice">{{$single_cart->quantity}}</p></td>
                        <td><p class="courseCart_cellPrice">{{settingValue('user_currency')}}{{$single_cart->price}}</p></td>
                        <td><p class="courseCart_cellPrice">{{settingValue('user_currency')}}{{number_format($single_cart->total_price,2)}}</p></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
<div class="stOrdrs_details stOrdrs_right_align">

    <ul>
        <li>
            <strong>{{Lang::get('label.Total')}}</strong>
            <span>{{settingValue('user_currency')}}{{$data['order_detail']->order_total}}</span>
        </li>
        <li>
            <strong>{{Lang::get('label.Total Paid')}}</strong>
            <span>{{settingValue('user_currency')}}{{$data['order_detail']->order_total}}</span>
        </li>
    </ul>
</div>
