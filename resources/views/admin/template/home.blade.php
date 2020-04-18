@extends('admin.template.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
            <div class="row">
                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <a href="{{URL::to('/admin/users')}}">
                            <span class="mini-stat-icon green">
                                <i class="fa fa-users"></i>
                            </span>
                        </a>
                        <div class="mini-stat-info">
                            <span><?=@$total_instructors?></span>
                            Total Instructors
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <a href="{{URL::to('/admin/users')}}">
                            <span class="mini-stat-icon orange">
                                <i class="fa fa-gavel"></i>
                            </span>
                        </a>
                        <div class="mini-stat-info">
                            <span><?=@$total_students?></span>
                            Total Students
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <a href="{{URL::to('/admin/courses')}}">
                            <span class="mini-stat-icon orange">
                                <i class="fa fa-gavel"></i>
                            </span>
                        </a>
                        <div class="mini-stat-info">
                            <span><?=@$total_course?></span>
                            Total Course
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <a href="{{URL::to('/admin/orders/all_order')}}">
                            <span class="mini-stat-icon green">
                                <i class="fa-first-order "></i>
                            </span>
                        </a>
                        <div class="mini-stat-info">
                            <span><?=@$total_orders?></span>
                            Total Orders
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <a href="{{URL::to('/admin/orders/all_order')}}">
                            <span class="mini-stat-icon orange">
                                <i class="fa fa-money"></i>
                            </span>
                        </a>
                        <div class="mini-stat-info">
                            <span><?=@$total_income?></span>
                            Total Income
                        </div>
                    </div>
                </div>

            </div>
        <!-- page end-->
        </section>
    </section>
@endsection
