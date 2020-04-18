@extends('student.layout.auth')

@section('content')

    <main class="content">
        <section class="st_dashboard_main ins_course_main">
            @include('student.layout.header')

            <div class="st_dashboard_content">
                @include('student.layout.sidebar')
                <div class="stDb_right_content">
                    <div class="stDb_right_contentInner">

                        <div class="stDb_navigations clearfix">
                            <div class="stDb_navigations_left">
                                <strong>{{Lang::get('label.Order')}}</strong>
                            </div>
                            <div class="stDb_navigations_menu">
                                <ul>
                                    <li><a href="javascript:void(0)">{{Lang::get('label.Home')}}</a></li>
                                    <li><span>{{Lang::get('label.Order')}}</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="st_order_tabls_main clearfix">
                            <div class="courseCart_tableMain st_order_sumryTable">
                                <div class="courseCart_table">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <thead>
                                        <tr>
                                            <th scope="col"><strong>{{Lang::get('label.Order Id')}}</strong></th>
                                            <th scope="col"><strong>{{Lang::get('label.Date')}}</strong></th>
                                            <th scope="col"><strong>{{Lang::get('label.Status')}}</strong></th>
                                            <th scope="col"><strong>{{Lang::get('label.Price')}}</strong></th>
                                            <th scope="col"><strong>{{Lang::get('label.Action')}}</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($orders)>0)
                                            @foreach($orders as $single_order)
                                                <tr id="{{$single_order->id}}">
                                                    <td><p class="courseCart_cellPrice">{{$single_order->id}}</p></td>
                                                    <td><p class="courseCart_cellPrice">{{set_date_formate($single_order->order_date)}}</p></td>
                                                    <td><p class="courseCart_cellPrice">{{$single_order->order_status}}</p></td>
                                                    <td><p class="courseCart_cellPrice">{{settingValue('user_currency')}}{{$single_order->order_total}}</p></td>
                                                    <td><p class="courseCart_cellPrice">
                                                            <a class="stOrdr_cellLink" href="javascript:void(0)" onclick="getOrderDetail({{$single_order->id}})">{{Lang::get('label.Receipt')}}</a>
                                                        </p>
                                                    </td>

                                                </tr>
                                            @endforeach
                                         @else
                                            <tr>
                                                <td><p>{{Lang::get('label.No Record Found')}}</p></td>
                                            </tr>

                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="order_detail_div">


                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>

        <script type="text/javascript">

            function getOrderDetail(id) {
                console.log(id);
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
                $.ajax({
                    url: "{{URL::to('/')}}/student/orders/order_detail/",
                    type: 'GET',  // user.destroy
                    data:{"csrf-token":"{{ csrf_token() }}", "id" : id},
                    success: function(result) {
                        console.log(result);
                        $("#order_detail_div").html(result.data);
                    }
                });
            }

        </script>
    </main>
@endsection
