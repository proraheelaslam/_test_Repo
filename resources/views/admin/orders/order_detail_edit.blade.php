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
                            <div class="invoice-title col-md-3 col-xs-2">
                                <h1>invoice</h1>
                                <img style="height: auto;
    width: 94px;
    background: #54a0da;" class="logo-print" src="{{asset('/admin_assets/images/logo-wite.png')}}" alt="">
                            </div>
                            <div class="invoice-info col-md-9 col-xs-10">

                                <div class="pull-right">
                                    <div class="col-md-6 col-sm-6 pull-left">
                                        <p>School Name:<?=$orders['school_details']->name?></p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 pull-right">
                                        <p>Address: <?=$orders['school_details']->address?> <br>
                                            Email : <?=$orders['student_details']->email?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row invoice-to">
                            <div class="col-md-4 col-sm-4 pull-left">
                                <h4>Invoice To:</h4>
                                <h2><?=$orders['student_details']->email?></h2>
                                <p>
                                   <?=$orders['student_details']->address?><br>
                                    Phone:  <?=$orders['student_details']->phone_number?><br>
                                    Email :<?=$orders['student_details']->email?>
                                </p>
                            </div>
                            
                            
                                
                            <div class="col-md-4 col-sm-5 pull-right">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Invoice #</div>
                                    <div class="col-md-8 col-sm-7"><?php echo $orders->id; ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Date #</div>
                                    <div class="col-md-8 col-sm-7">{{$orders->created_at }}</div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 inv-label">
                                        <h3>TOTAL DUE</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <h1 class="amnt-value">{{ settingValue('user_currency') }} {{$orders->order_total }}</h1>
                                    </div>
                                </div>
   <div class="row">
                                    <div class="col-md-12 inv-label">
                                <select class="form-control m-bot15" onChange="update_status(this.value)">
                                <option value="Pending" <?php if ($orders->order_status == 'Pending') {?> selected<?php }?>>Pending</option>

                                <option value="Completed" <?php if ($orders->order_status == 'Completed') {?> selected<?php }?>>Completed</option>
                                <option value="Cancelled" <?php if ($orders->order_status == 'Cancelled') {?> selected<?php }?>>Cancelled</option>
                                </select>
                                </div>
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
                            <tr>


							 <td>1</td>
                                <td>
                                    <h4><?=$orders['course_details']->name?></h4>
                                    <p>Code:<?=$orders['course_details']->course_code?><br>
                                    <br>
                                    Amount:<?=$orders['course_details']->course_price?>
                                    </p>
                                </td>
                                 <td class="text-center">{{ settingValue('user_currency') }} {{$orders->order_total }}</td>
                                <td class="text-center">1</td>
                                <td class="text-center">{{ settingValue('user_currency') }} {{$orders->order_total }}</td>

						
                            </tr>





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


<input type="hidden" name="cur" id="cur" value="{{ settingValue('user_currency') }}">
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

   function update_status(value){


	 $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/admin/orders/updateorderstatus/"+<?=$orders->id?>,
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}","order_status": value},
                success: function(result) {

					 location.reload();

                }
            });


	}


</script>
@endsection