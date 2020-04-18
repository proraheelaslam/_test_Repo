<ul>
    @if($data['user']->is_instructor==1)
        @if(count($data['courses'])>0)
            @foreach($data['courses'] as $single_course)
                <li>
                    <div class="stMc_myCourse_detail">
                        <div class="stMc_myCourse_img">
                            <a href="{{url('student/courses/course_video/').'/'.Hashids::encode($single_course->id)}}">
                                <img src="{{$single_course->full_image}}" alt="#">
                            </a>
                        </div>
                        <div class="stMc_myCourse_right">
                            <div class="stMc_myCourse_text">
                                <strong><a href="{{url('student/courses/course_video/').'/'.Hashids::encode($single_course->id)}}">{{$single_course->name}}</a>
                                    <em>
                                        <a href="{{url('student/courses/edit_listing/').'/'.Hashids::encode($single_course->id)}}">{{@Lang::get('label.Edit')}}</a> / <a href="javascript:void(0);" onclick="delete_course('{{Hashids::encode($single_course->id)}}')">{{@Lang::get('label.Delete')}}</a>
                                    </em>
                                </strong>
                                <p>{{str_limit($single_course->description,300)}}@if(strlen($single_course->description)>300)...@endif </p>
                            </div>
                            <div class="stMc_myCourse_rate clearfix">
                                <div class="stMc_myCourse_rate_left">
                                    <div class="cp_instructor_bar clearfix">
                                        <div class="stars">
                                            <ul>
                                                <?php for($i=1;$i<=5;$i++){?>
                                                @if($i<=$single_course->course_rating)
                                                    <li class="highlighted_star"><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                @elseif(($i-$single_course->course_rating)<1)
                                                        <li class="highlighted_star"><a href="javascript:void(0);"><i class="fa fa-star-half-o"></i></a></li>
                                                @else
                                                        <li class="not_highlighted_star"><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                @endif
                                                <?php
                                                }?>
                                            </ul>
                                        </div>
                                        <span>{{settingValue('user_currency')}}{{$single_course->course_price}}</span>
                                    </div>
                                </div>
                                <div class="stMc_myCourse_rate_right">

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <li>
                <div class="stMc_myCourse_detail">
                    {{@Lang::get('label.No Record Found')}}
                </div>
            </li>
        @endif
    @endif
</ul>
