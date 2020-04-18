<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="{{URL::to('admin/home')}}" class="logo" >
        <img   src="{{asset('public/admin_assets/images/logo.png')}}" alt="" style="display: block; width:auto; max-height:60px;">
    </a>

    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>

</div>
<!--logo end-->


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">

        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="photo"><img alt="avatar" src="{{asset('public/uploads/user_placeholder.png')}}"></span>
                <span class="username">{{ Auth::user()->name }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li>
                    <a href="{{URL::to('admin/change_password')}}">
                        <i class="fa fa-lock"></i>
                        Change Password
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-key"></i>
                        Log Out
                    </a>
                </li>
                 <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </li>

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->