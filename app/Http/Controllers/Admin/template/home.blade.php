@extends('admin.template.template')

@section('content')
 <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
        <div class="col-md-3">
        <div class="mini-stat clearfix">
           <a href="{{URL::to('/admin/users')}}"> <span class="mini-stat-icon green"><i class="fa fa-users"></i></span></a>
            <div class="mini-stat-info">
                <span><?=@$total_schools?></span>
               Total Schools
            </div>
        </div>
    </div>
   

 
    <div class="col-md-3">
        <div class="mini-stat clearfix">
           <a href="{{URL::to('/admin/orders/open_orders')}}"><span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span></a>
            <div class="mini-stat-info">
                <span><?=@$total_students?></span>
               Total Students
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
           <a href="{{URL::to('/admin/orders/close_orders')}}"> <span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span></a>
            <div class="mini-stat-info">
                <span><?=@$total_course?></span>
               Total Course
            </div>
        </div>
    </div>
  


        </div>

  
        <!-- page end-->
        </section>
    </section>

@endsection
