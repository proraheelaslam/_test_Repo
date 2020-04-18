@extends('student.layout.auth')

@section('content')
    <div class="banner">
        <div class="banner_img">
            <figure><img src="{{ asset('public/front_assets/images/hm_banner_img.png') }}" alt="#"></figure>
        </div>
        <div class="banner_inner">
            <div class="auto_content">
                <div class="banner_table">
                    <div class="banner_tableCell">
                        <div class="banner_detail">
                            <div class="banner_text">
                                <h1>{{Lang::get('label.choose_from_range')}} <b>{{Lang::get('label.online_courses')}} </b></h1>
                                <div class="banner_search">
                                    <input   id="banr_course_search_bar"  type="search" placeholder="{{Lang::get('label.home_search_placeholder')}}">
                                    <button  data-search-type="banner" class="cp_hdr_searchBar_btn"  type="submit">{{Lang::get('label.Search')}}</button>
                                </div>
                            </div>
                            <div class="banner_slider_out">
                                <div class="banner_slider">
                                    @if(count($cateCoursesData) > 0)

                                        @foreach($cateCoursesData as $category)
                                            @if($category->is_featured == 1)
                                                <div class="def_item">
                                                    <div class="banner_slider_box"> <a href="{{url('courses/search?category=')}}{{$category->name}}">
                                                            <figure><em><img src="{{ $category->fullImage  }}" alt="#"></em></figure>
                                                            <span>{{ $category->name  }}</span> </a> </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="content">

        <section class="wedo_main">
            <div class="auto_content">
                <div class="wedo_inner clearfix">
                    <div class="wedo_left">
                        <div class="wedo_text">

                            {!! Lang::get('label.home_what_we_do_label') !!}
                            <p >{{Lang::get('label.home_what_we_do_text')}}</p>
                            <a target="_blank" class="all_buttons btn_rounded" href="{{settingValue('view_more')}}"> {{Lang::get('label.view_more')}}</a> </div>
                        <div class="wedo_logos">
                            <ul>
                                <li><a target="_blank" href="{{settingValue('paypal_url')}}"><img src="{{ asset('public/front_assets/images/paypal.png') }} " alt="#"></a></li>
                                <li><a target="_blank" href="{{settingValue('pinterest_url')}}"><img src="{{ asset('public/front_assets/images/pinterest.png') }} " alt="#"></a></li>
                                <li><a target="_blank" href="{{settingValue('booking_url')}}"><img src="{{ asset('public/front_assets/images/booking.png') }}" alt="#"></a></li>
                                <li><a target="_blank" href="{{settingValue('adidas_url')}}"><img src="{{ asset('public/front_assets/images/adidas.png') }} " alt="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="wedo_right">
                        <div class="wedo_list">
                            <ul>
                                <li>
                                    <div class="wedo_box">
                                        <div class="wedo_box_inner">
                                            <figure><img src="{{ asset('public/front_assets/images/wedo_box_icon1.png') }} " alt="#"></figure>
                                            <strong>{{Lang::get('label.create_account_label')}}</strong>
                                            <p>{{Lang::get('label.create_account_text')}}</p>
                                            <a href="{{url('student/register')}}"></a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wedo_box box_bright_orange">
                                        <div class="wedo_box_inner">
                                            <figure><img src="{{ asset('public/front_assets/images/wedo_box_icon2.png') }}" alt="#"></figure>
                                            <strong>{{Lang::get('label.create_online_account_label')}}</strong>
                                            <p>{{Lang::get('label.create_online_account_text')}}</p>
                                            <a href="{{url('student/register')}}"></a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wedo_box box_vivid_orange">
                                        <div class="wedo_box_inner">
                                            <figure><img src="{{ asset('public/front_assets/images/wedo_box_icon3.png') }} " alt="#"></figure>
                                            <strong>{{Lang::get('label.interact_with_student_label')}}</strong>
                                            <p>{{Lang::get('label.interact_with_student_text')}}</p>
                                            <a href="{{url('student/login')}}"></a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wedo_box box_vivid_red">
                                        <div class="wedo_box_inner">
                                            <figure><img src="{{ asset('public/front_assets/images/wedo_box_icon4.png') }} " alt="#"></figure>
                                            <strong>{{Lang::get('label.achieve_your_goal_label')}}</strong>
                                            <p>{{Lang::get('label.achieve_your_goal_text')}}</p>
                                            <a href="{{url('student/login')}}"></a> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="skill_main">
            <div class="auto_content">
                <div class="skill_inner clearfix">
                    <div class="skill_left">
                        <div class="skill_img">
                            <figure><img src="{{ asset('public/front_assets/images/skill_img.png') }} " alt="#"></figure>
                        </div>
                    </div>
                    <div class="skill_right">
                        <div class="skill_text"> <span>{{Lang::get('label.middle_banner_label_enhance_skill')}}  </span>
                            <h1>{{Lang::get('label.middle_banner_start_online_course')}}</h1>
                            <a class="all_buttons white btn btn_rounded" href="{{url('student/register')}}"> {{Lang::get('label.get_started_now')}}  </a> </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="courses_main">
            <div class="auto_content">
                <div class="all_heading">
                    <h1>{{Lang::get('label.browse_top_category_label')}}</h1>
                    <p> {{Lang::get('label.browse_top_category_text')}} </p>
                </div>
                <div class="courses_inner">
                    <div class="courses_tabTitle ">
                        <ul>
                            <li><a  data-id="all" class="active feature_slideCategory_lists" href="javascript:void(0);">ALL</a></li>
                            @if(count($cateCoursesData) > 0)
                                @foreach($cateCoursesData as $category)
                                    @if($category->is_featured == 1)
                                        <li  data-id="{{ $category->id  }}" class="feature_slideCategory_lists"><a href="javascript:void(0);">{{ $category->name  }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="courses_detail">
                        <div class="courses_slider home_courses_slide">
                            @foreach($cateCoursesData as $category)
                                @if($category->courses != null && count($category->courses) > 0)
                                    @foreach($category->courses as $course)
                                        <div>
                                            <div class="courses_box">
                                                <a href="{{url('courses/course_detail')}}/{{Hashids::encode($course->id)}}">
                                                    <div class="courses_box_img">
                                                        <figure><img src="{{$course->fullImage}}" alt="#"></figure>
                                                    </div>
                                                </a>
                                                <div class="courses_box_inner">
                                                    <div class="course_rate"> <span>${{$course->coursePrice}} </span> </div>
                                                    <div class="stars " >
                                                        <div class="category_course_statRating" data-score="{{$course->course_rating}}"></div>

                                                    </div>
                                                    <div class="courses_box_text"> <span>{{$category->name}}</span> <a  href="{{url('courses/course_detail')}}/{{Hashids::encode($course->id)}}">{{$course->name}} </a> </div>

                                                    <div class="user"> <a href="javascript:void(0);"> <i><img src="{{($course->instructor != null ) ? $course->instructor->fullImage : asset('public/uploads/no_image.png') }}" alt="#"></i>
                                                            <p> <strong>{{$course->instructor != null ? $course->instructor->fullName  : ''}}</strong> <span>{{$course->courseCreated}}</span> </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="vidos_main">
            <div class="auto_content">
                <div class="vidos_inner">
                    <div class="vidos_list">
                        <ul>
                            @if(!is_null($featureContentLecture) && count($featureContentLecture) > 0)
                                @foreach($featureContentLecture as $content)
                                    <li>
                                        <div class="video_box">
                                            <div class="video_box_inner"> <a data-fancybox="video" href="{{$content->full_file_path}}" class="video"> <img src="{{ asset('public/front_assets/images/video_banner.png') }}" alt="#">
                                                    <video controls id="" style="display:none;" width="100%" height="400">
                                                        <source src="{{$content->full_file_path}}" type="video/mp4">
                                                        </source>
                                                    </video>
                                                </a> </div>
                                            <div class="video_text"> <strong>{{ $content->title  }}</strong> <span>{{ $content->short_desc  }} </span> </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="start_teach_main">
            <div class="auto_content">
                @include('student.layout.change_user_type');
            </div>
        </section>
        <section class="hm_student_main">
            <div class="auto_content">
                <div class="all_heading">
                    <h1>{{Lang::get('label.what_about_our_student_label')}}  </h1>
                    <p>{{Lang::get('label.what_about_our_student_text')}}</p>
                </div>
                <div class="hm_student_inner">
                    <div class="hm_student_slider">
                        @if($instructorReviews != null && count($instructorReviews) > 0)
                            @foreach($instructorReviews as $review)
                                <div>
                                    <div class="hm_student_detail">
                                        <div class="hm_student_text">
                                            <p>{{$review->reviews}}</p>
                                        </div>
                                        <div class="user user_student"> <a href="javascript:void(0);" tabindex="0">
                                                <i><img src="{{$review->from_user->fullImage}}" alt="#"></i>
                                                <p> <strong>{{$review->from_user->fullName}}</strong>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="newsLetter_main">
            <div class="auto_content">
                <div class="all_heading">
                    <h1>{{Lang::get('label.get_news_letter_weekly_label')}}</h1>
                    <p>{{Lang::get('label.get_news_letter_weekly_text')}}</p>
                </div>
                <div class="newsLetter_inner">
                    <form id="newsLetterForm" >

                        <div class="newsLetter">
                            <input type="email" placeholder="{{Lang::get('label.Email address')}}" name="email">
                            <button class="all_buttons white_arrow_btn" type="submit">{{Lang::get('label.Get it now')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection
@section('javascript')
    <script>
        $(document).ready(function(){
            initBannerSlider();
            initCoursesSlider();
            initStudentSlider();
            setSingleCategoryCourseRating();
        });
    </script>
@stop

