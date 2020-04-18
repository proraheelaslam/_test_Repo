<div class="stDb_sideBar">
    <div class="stDb_sideBar_inner">
        <div class="stDb_sideBar_menu">
            <h4>{{Lang::get("label.Start")}}</h4>
            <ul>
                <li><a class="stDb_sideBar_db {{ request()->is('student/dashboard') ? 'active' : '' }}" href="{{ url('/student/dashboard') }}">{{Lang::get("label.Dashboard")}}</a></li>
                <li><a class="stDb_sideBar_myCourses {{ (request()->is('student/my_courses') || request()->is('student/courses/edit_listing/*')) ? 'active' : '' }}" href="{{url('student/my_courses')}}">{{Lang::get("label.My Courses")}}</a></li>
                @if(Auth::user()->is_instructor==1)
                    <li><a class="stDb_sideBar_order {{ request()->is('student/courses/add_listing') ? 'active' : '' }}" href="{{url('student/courses/add_listing')}}">{{Lang::get("label.Add Listing")}}</a></li>
                @endif
                 <li><a class="stDb_sideBar_order {{ request()->is('student/orders') ? 'active' : '' }}" href="{{url('student/orders')}}">{{Lang::get("label.Order")}}</a></li>
                <li><a class="stDb_sideBar_msg {{ request()->is('student/messages/*') ? 'active' : '' }}" href="{{url('student/messages/').'/'.Hashids::encode(0)}}">{{Lang::get("label.Messages")}}</a></li>
            </ul>
        </div>
        <div class="stDb_sideBar_menu">
            <h4>Account</h4>
            <ul>
                <li><a class="stDb_sideBar_settings {{ request()->is('student/profile') ? 'active' : '' }}" href="{{ url('/student/profile') }}">{{Lang::get("label.Settings")}}</a></li>
                <li>
                    <a class="stDb_sideBar_logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{Lang::get("label.Logout")}}</a>
                    <form id="logout-form" action="{{url('student/logout')}}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </li>
            </ul>
        </div>


    </div>

</div>
