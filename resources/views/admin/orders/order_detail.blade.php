@extends('admin.template.template')

@section('content')
<style type="text/css">
    #payment_type { width: 200px; margin-bottom: 10px;  }
    #donation_type { width: 200px; margin-bottom: 10px; margin-right: 10px; }
</style>

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        @include('admin/template/flash_messages')
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body invoice">
                        <div class="invoice-header">
                            <div class="invoice-title col-md-3 col-xs-2" style="font-size: 35px !important;">
                                Order # {{$orders->id}}
                                </div>
                            <div class="invoice-info col-md-9 col-xs-10">

                                <div class="pull-right">
                                    <div class="col-md-4 col-sm-4 pull-left">
                                        <p>Your Name : </p>
                                        <br/>
                                        <p>Email :</p>
                                    </div>
                                    <div class="col-md-8 col-sm-8 pull-right">
                                        <p>@if($orders['student_details']['first_name']!=''){{ucfirst($orders['student_details']['first_name']).' '.ucfirst($orders['student_details']['last_name'])}} @else {{ucfirst($orders['student_details']['name'])}}@endif</p>
                                        <br/>
                                        <p><?=$orders['student_details']['email']?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row invoice-to">
                            <div class="col-md-4 col-sm-4 pull-left">
                                <h4>Billing Detail:</h4><br/>
                                <h5>Address: </h5><p><?=$orders['billing_detail']['street_address']?><br></p>
                                <br/>
                                <p>
                                <h5>Phone: </h5><p><?=$orders['billing_detail']['phone']?></p>
                                <br/>
                                <h5>Email: </h5> <p>Email :<?=$orders['billing_detail']['email']?></p>
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-5 pull-right">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Status</div>
                                    <div class="col-md-8 col-sm-7">
                                        <select name="order_status" id="order_status" onchange="change_status({{$orders->id}})">
                                            @foreach(getOrderStatus() as $key=>$row)
                                                <option value="{{$key}}" <? if($key==$orders->order_status){?> selected="selected"<? }?>>{{$row}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Date #</div>
                                    <div class="col-md-8 col-sm-7">{{$orders->order_date }}</div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Order Note</div>
                                    <div class="col-md-8 col-sm-7">@if($orders['billing_detail']['order_notes']!=''){{$orders['billing_detail']['order_notes']}}@else{{'N/A'}}@endif</div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-invoice" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Description</th>
                                    <th class="text-center">Unit Cost</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(!$shopping_cart_detail->isEmpty())
                                <? $count=0?>
                                @foreach($shopping_cart_detail as $row)
                                    <? $count++;?>
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>
                                            <?=$row['course_details']['name']?>

                                        </td>
                                        <td class="text-center">{{ settingValue('user_currency') }} {{$row->price}}</td>
                                        <td class="text-center">{{$row->quantity}}</td>
                                        <td class="text-center">{{ settingValue('user_currency') }} {{$row->price*$row->quantity }}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                        <div class="row">

                            <div class="col-md-4 col-xs-5 invoice-block pull-right">
                                <ul class="unstyled amounts">
                                    <li>Sub - Total amount : {{ settingValue('user_currency') }}<?=$orders->order_total?></li>

                                    <li class="grand-total">Grand Total : {{ settingValue('user_currency') }}<?=$orders->order_total?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        </section>
    </section>
    <!--main content end-->
        <!-- page end-->
@endsection

@section('scripts')

<script type="text/javascript">
$(document).ready(function () {

  $('.amnt-value').html($('#cur').val() +<?=$orders->order_total?>+'.00');


}); //..... end of ready() .....//
function change_status(order_id) {
    var order_id = order_id;
    var order_status = $('#order_status').find('option:selected').val();
    console.log(order_id);
    console.log(order_status);
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"} });
    $.ajax({
        url: "{{URL::to('/')}}/{{$resource}}updateorderstatus",
        type: 'POST',  // user.destroy
        data: { order_id: order_id, order_status:order_status },
        success: function(result) {
            location.reload();
        }
    });

}


</script>
@endsection
