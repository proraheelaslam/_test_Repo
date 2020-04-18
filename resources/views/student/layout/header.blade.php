<div class="st_db_header">

    <div class="st_db_header_inner">
        <div class="stDb_leftBar_showIcon"></div>
        <div class="st_db_header_menu clearfix">
            <ul class="st_db_header_ul">
                <li class="st_db_header_li">
                    <div class="stDb_header_has_icon">
                        <div class="stDb_header_dropdownToShow stDb_header_icon stDb_header_email"></div>
                        <div class="st_db_header_dropdown">
                            <div class="stDb_notif_popup_inner">
                                <h4 class="stDb_notif_heading">{{Lang::get("label.Messages")}}</h4>

                                <div class="stDb_notif_content">
                                    <div class="stDb_notif_listing">
                                        <ul>
                                            @foreach(getLatestMessage(Auth::user()->id) as $row)
                                            <li  class="li_{{$row->inbox_thread_id}}">
                                                <a href="javascript:void(0);" onclick="getMessages({{$row->inbox_thread_id}})">
                                                    <strong>{{$row->from_user->name}}</strong>
                                                    <span>{{$row->message}}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="stDb_notif_footer">
                                    <a class="stDb_notif_seeAll_btn" href="{{url('student/messages/').'/'.Hashids::encode(0)}}">{{Lang::get("label.See All")}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
                <li class="st_db_header_li">
                    <div class="stDb_header_has_icon">
                        <div class="stDb_header_dropdownToShow stDb_header_icon stDb_header_notification"></div>
                        @if(!getUnreadNotification()->isEmpty())
                            <div class="st_db_header_dropdown">
                                <div class="stDb_notif_popup_inner">
                                    <h4 class="stDb_notif_heading">{{Lang::get("label.Notifications")}}</h4>
                                    <div class="stDb_notif_content">
                                        <div class="stDb_notif_listing">
                                            <ul>
                                                @foreach(getUnreadNotification() as  $row)
                                                    <li>
                                                        <a href="javascript:void(0)" onclick="read_notification('{{Hashids::encode($row->course_id)}}', '{{$row->id}}')">
                                                            <strong>{{$row->subject}}</strong>
                                                            <span>{{$row->notification}}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div>
                </li>
                <li class="st_db_header_li">
                    <div class="stDb_header_has_icon">
                        <?php
                        $image_name = 'user_placeholder.png';

                        if(Auth::user()->image){

                            $image_name = Auth::user()->image;

                        }?>

                        <a class="stDb_header_dropdownToShow header_user_avatar" href="javascript:void(0);">
                            <img src="{{checkImage("students/".$image_name)}}" alt="#">
                        </a>
                        <div class="st_db_header_dropdown">
                            <div class="notification_popup">
                                <div class="notification_headerMain">
                                    <div class="notification_header clearfix">
                                        <div class="profile_popup_user">
                                            <a class="profile_popup_avatar" href="javascript:void(0);">

                                                <img src="{{checkImage("students/".$image_name)}}" alt="#">
                                            </a>
                                            <div class="profile_popup_userName">
                                                <span>{{@Auth::user()->name}}</span>
                                                <p><a class="profile_pop_email" href="javascript:void(0)">{{@Auth::user()->email}}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification_content">
                                    <div class="profile_popup_detail">
                                        <ul>
                                            <li> <a href="{{ url('/student/profile') }}" class="{{ request()->is('student/profile') ? 'active' : '' }}">{{Lang::get('label.My Profile')}}</a></li>
                                            <li> <a href="{{url('student/messages/').'/'.Hashids::encode(0)}}" class="{{ request()->is('student/messages/*') ? 'active' : '' }}">{{Lang::get('label.Messages')}}</a></li>
                                            <li> <a href="{{url('student/orders')}}" class="{{ request()->is('student/orders') ? 'active' : '' }}">{{Lang::get('label.Purchase history')}}</a></li>
                                            <li> <a href="{{url('/page_content/help')}}" class="{{ request()->is('page_content/help') ? 'active' : '' }}">{{Lang::get('label.Help')}}</a></li>
                                            <li>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{url('student/logout')}}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>

</div>
