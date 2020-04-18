@extends('student.layout.auth')
@section('content')
    <script src="{{asset('public/front_assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('public/front_assets/js/jquery.raty.js')}}"></script>

    <script>

        // set invidual students rating
        $(function () {
            $('.cp_studentCourse_rating ').each(function(){
                $(this).raty({
                    readOnly:true,
                    score: function() {return $(this).attr('data-score');},
                });
                $(this).next().text($(this).attr('data-score'));
            });




        });

    </script>
    @php
        $lectureLifeTimeAccess = '';
        $showAccessLectureTime = 'none';
        $totalStudenReviews =  $courseDetail->total_review_students;
        $firstLecturePreview = [];
         if (is_null($courseDetail->course_expire) && empty($courseDetail->course_expire) ) {
               $lectureLifeTimeAccess = 'Full lifetime access';
               $showAccessLectureTime = 'block';
         }
          if(count($courseDetail->course_lectures) > 0) {
                 $firstLecturePreview = $courseDetail->course_lectures[0];
            }


      $findCartItem = getShoppingCartItemById($courseDetail->id);
      $courseRating = $courseDetail->course_rating;
      $overAllInstructorRating = ($courseDetail->instructor != null ? $courseDetail->instructor->overall_instructor_rating : 0 )

    @endphp

    <main class="content">
        <input type="hidden" data-hash-course-id="{{$courseDetail->hash_encoded_id}}" data-instructor-id="{{$courseDetail->instructor != null ?  $courseDetail->instructor->id : 0}}" data-student-id="{{Auth::guard('student')->check() ? Auth::guard('student')->user()->id : 0}}" data-course-id="{{$courseDetail->id}}" value="" id="cp_detail_info">
        <section class="cp_course_main cp_courseDetail_main">
            <div class="auto_content">
                <div class="cp_course_heading">
                    <strong>{{!is_null($courseDetail->name) ?  $courseDetail->name : ''}}</strong>

                    <div class="pro_bookmark_top @if(isCourseBookMarked($courseDetail->id)==true) active @endif" title="{{Lang::get('label.Booked mark this course')}}" onclick="bookmark(this, '{{$courseDetail->id}}')">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                    </div>

                </div>
                <div class="cp_course_inner">
                    <div class="cp_course_detail clearfix">
                        <div class="cp_course_left">
                            <div class="cp_course_left_inner">
                                <div class="cp_course_preview_main">
                                    <div class="cp_course_preview">
                                        <video controls>
                                            <source src="{{!empty($firstLecturePreview->full_file_path) ?  $firstLecturePreview->full_file_path : 'https://www.html5rocks.com/en/tutorials/video/basics/Chrome_ImF.mp4'}}" type="video/mp4" />
                                            {{Lang::get('label.Your browser does not support HTML5 video.')}} </video>
                                    </div>
                                </div>
                                <div class="cp_course_tabs">
                                    <div class="cp_course_tabs_title">
                                        <ul>
                                            <li><a class="active" href=".cp_course_tab1">{{Lang::get('label.Overview')}}</a></li>
                                            <li><a href=".cp_course_tab2">{{Lang::get('label.Course Content')}}</a></li>
                                            <li><a href=".cp_course_tab3">{{Lang::get('label.Instructor')}}</a></li>
                                            <li><a href=".cp_course_tab4">{{Lang::get('label.Reviews')}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="cp_course_tabs_inner">
                                        <div class="cp_course_tabs_show cp_course_tab1" style="display:block;">
                                            <div class="cp_course_tabs_box">
                                                <div class="cp_course_tabs_overview">
                                                    <div class="cp_course_tabs_heading">
                                                        <h3>{{Lang::get('label.Overview')}}</h3>
                                                    </div>
                                                    <div class="cp_course_discription">
                                                        <h4>{{Lang::get('label.Course Description')}}</h4>
                                                        <p>{{$courseDetail->description}}</p>

                                                    </div>
                                                    <div class="cp_course_discription" style="display: none">
                                                        <h4>{{Lang::get('label.Requirements')}}</h4>
                                                        <ul class="cp_course_listDisc clearfix">
                                                            <li>{{ $courseDetail->course_requirement }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cp_course_tabs_show cp_course_tab2">
                                            <div class="cp_course_tabs_box">
                                                <div class="cp_course_tabs_overview">
                                                    <div class="cp_course_tabs_heading clearfix">
                                                        <h3>{{Lang::get('label.Course Content')}}
                                                            <span>{{ $courseDetail->total_lecture_content }}<em>{{ $courseDetail->total_lecture_time }}</em></span></h3>
                                                    </div>
                                                    <div class="cp_detail_accordion">
                                                        <ul>


                                                            @if(count($courseDetail->course_lectures) > 0)

                                                                <li>
                                                                    <div class="cp_detail_accordion_row">
                                                                        <div class="cp_detail_accordion_title">
                                                                            <a href="javascript:void(0);">{{$courseDetail->name}}</a> </div>
                                                                        <div class="cp_detail_accordion_show">
                                                                            <div class="cp_detail_accordion_inner">
                                                                                <ul>

                                                                                    @php
                                                                                        $lectureContentCounter = 1;
                                                                                    @endphp
                                                                                    @foreach($courseDetail->course_lectures as $lecture)

                                                                                        <li>

                                                                                            <div style="pointer-events: {{ $courseDetail->is_free == 0 ? 'none' : 'auto'}}" class="cp_detail_lectures"> <a data-fancybox="lectures" href="{{ $courseDetail->is_free == 0 ? 'javascript:void(0)' : $lecture->full_file_path}}"> <span>{{Lang::get('label.lecture')}} {{$lectureContentCounter++}}</span>
                                                                                                    <p>{{$lecture->title}}</p>
                                                                                                    <strong> {{ $courseDetail->is_free == 0 ? Lang::get('label.Paid') : Lang::get('label.Preview')}} <em>{{ gmdate("H:i:s", $lecture->file_time) }}</em></strong>
                                                                                                    <video controls id="" style="display:none;" width="100%" height="400">
                                                                                                        <source src="{{$lecture->full_file_path}}" type="video/mp4" />
                                                                                                    </video>
                                                                                                </a> </div>
                                                                                        </li>
                                                                                    @endforeach

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                            @endif

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cp_course_tabs_show cp_course_tab3">
                                            <div class="cp_course_tabs_box">
                                                <div class="cp_course_tabs_heading clearfix">
                                                    <h3>{{Lang::get('label.about_instructor')}}</h3>
                                                </div>
                                                <div class="cp_instructor">
                                                    <div class="cp_instructor_img">
                                                        <span >
                                                            <img src="{{ $courseDetail->instructor != null ?  $courseDetail->instructor->fullImage  : asset('public/uploads/no_image.png') }}" alt="#">
                                                        </span>
                                                        @if(@Auth::guard('student')->user()->id!=$courseDetail->student_id)
                                                            <a class="all_buttons authorSend_msgBtn" href="javascript:void(0)" onclick="create_thread('{{$courseDetail->student_id}}')">Message</a>
                                                        @endif
                                                    </div>
                                                    <div class="cp_instructor_inner">
                                                        <div class="cp_instructor_bar clearfix">
                                                            <div class="stars " >
                                                                <div class="cp_instructor_rating"></div>
                                                            </div>

                                                            <span> {{Lang::get('label.instructor_rating')}}</span>
                                                            <p>
                                                                <em class="cp_instructor_review" href="javascript:void(0);">{{ $courseDetail->instructor != null ?  $courseDetail->instructor->total_instructor_review  : 0}} {{Lang::get('label.Reviews')}}</em>
                                                                <em class="cp_instructor_student" href="javascript:void(0);" >{{$courseDetail->total_participants}} {{Lang::get('label.100 Students')}}</em>
                                                                <em class="cp_instructor_course" href="javascript:void(0);">{{ $courseDetail->instructor != null ?  $courseDetail->instructor->instructor_courses_count : 0}} {{Lang::get('label.Courses')}}</em>
                                                            </p>
                                                        </div>
                                                        <div class="cp_instructor_name">
                                                            <strong>{{ ( $courseDetail->instructor != null ? $courseDetail->instructor->fullName : '' )  }}
                                                            </strong>

                                                        </div>
                                                        <div class="cp_instructor_detail">
                                                            <p>{{$courseDetail->instructor != null ?  $courseDetail->instructor->about_student : ''}}</p>
                                                            {{--
                                                              <span>Available for:</span>
                                                              <ol>
                                                                  <li>Dummy text ever</li>
                                                                  <li>It has survived </li>
                                                                  <li>960s with the release</li>
                                                                  <li>Dummy text ever</li>
                                                                  <li>Text ever</li>
                                                              </ol>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cp_course_tabs_show cp_course_tab4">
                                            <div class="cp_course_tabs_box">
                                                <div class="cp_course_tabs_heading">
                                                    <h3>{{Lang::get('label.student_feedback')}}</h3>
                                                </div>
                                                {{--student feedback--}}
                                                @include('student.pages.load_students_feedback')

                                            </div>

                                            <div class="cp_reviews">
                                                @if(count($courseDetail->course_reviews) > 0)
                                                <div class="cp_course_tabs_heading">
                                                    <h3>{{Lang::get('label.Reviews')}}</h3>
                                                </div>
                                                @endif
                                                @include('student.pages.load_student_reviews')
                                            </div>
                                            @if(@Auth::guard('student')->check())
                                                @if(@Auth::guard('student')->user()->id != @$courseDetail->instructor->id)
                                                <div class="cp_course_tabs_box "  >
                                                    <div class="cp_course_tabs_heading">
                                                        <h3>{{Lang::get('label.Add Reviews &amp; Rate')}}</h3>
                                                    </div>
                                                    <div class="cp_rewiew_rate">
                                                        <div class="cp_rewiew_rateStar clearfix">
                                                            <span>{{Lang::get('label.What is it like to Course?')}}</span>
                                                            <div class="cp_rewiew_star"><div id="half"></div></div>
                                                        </div>
                                                        <form id="cpReviewRatingForm">
                                                            <div class="cp_rewiew_rate_form">
                                                                <div class="formRow clearfix">
                                                                    <div class="formCell col12">
                                                                        <div class="form_heading"> <strong>{{Lang::get('label.Review Title')}}</strong> </div>
                                                                        <div class="form_field">
                                                                            <input name="title" type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="formRow clearfix">
                                                                    <div class="formCell col12">
                                                                        <div class="form_heading"> <strong>{{Lang::get('label.Review Content')}}</strong> </div>
                                                                        <div class="form_field">
                                                                            <textarea name="content"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="all_buttons white_arrow_btn cpSubmitReviewBtn" type="submit">{{Lang::get('label.Submit Review')}}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="cp_videos_main">


                                        @if(!is_null($courseDetail->course_lectures) && count($courseDetail->course_lectures) > 0)
                                            @if($courseDetail->course_lectures[0]->is_featured == 1)
                                                <div class="cp_course_heading"> <strong>{{ Lang::get('label.Reviews') }}</strong>
                                                    <p>{{ Lang::get('label.feature_video') }} </p>
                                                </div>
                                              @endif
                                    @endif
                                    <div class="vidos_list">
                                        <ul>
                                            @if(!is_null($courseDetail->course_lectures) && count($courseDetail->course_lectures) > 0)
                                            @foreach($courseDetail->course_lectures as $lecutre)
                                                @if($lecutre->is_featured == 1)
                                                    <li>
                                                        <div class="video_box">
                                                            <div class="video_box_inner"> <a data-fancybox="video" href="{{$lecutre->full_file_path}}" class="video"> <img src="{{ asset('public/front_assets/images/video_banner.png') }}" alt="#">
                                                                    <video controls id="" style="display:none;" width="100%" height="400">
                                                                        <source src="{{$lecutre->full_file_path}}" type="video/mp4" />
                                                                    </video>
                                                                </a> </div>
                                                            <div class="video_text"> <strong>{{ $lecutre->title  }}</strong> <span>{{ $lecutre->short_desc  }}</span> </div>
                                                        </div>
                                                    </li>
                                                @endif

                                            @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="cp_course_right">
                            <input type="hidden" value=""  id="cp_course_info" data-course-id="{{$courseDetail->id}}" data-course-price="{{$courseDetail->course_price}}" data-course-name="{{$courseDetail->name}}" data-course-qty="1" data-course-image="{{$courseDetail->fullImage}}">
                            <div class="cp_course_right_box">
                                <div class="cp_course_right_boxInner">
                                    <div class="cp_course_addCart">
                                        <strong><sub>{{Lang::get('label.Price')}}</sub>${{$courseDetail->course_price}}
                                            {{--  <sub>$69.00</sub>--}}
                                        </strong>
                                        @php  $hasInsManageCourse = 'block'; @endphp
                                        @if(Auth::guard('student')->check())
                                            @if(Auth::guard('student')->user()->id == $courseDetail->student_id)

                                                @php  $hasInsManageCourse = 'none';  @endphp
                                                <a style="display: {{ (($findCartItem != null) ? 'none': 'block' )  }}" class="cp_addCart_btn  " href="{{url('student/my_courses')}}">{{Lang::get('label.manage_course')}}</a>

                                            @endif
                                        @endif


                                         <div style="display: {{$hasInsManageCourse}}">
                                             <a style="display: {{ (($findCartItem != null) ? 'none': 'block' )  }}" class="cp_addCart_btn cp_add_to_cart_button cp_add_toCart_button" href="javascript:void(0);">{{Lang::get('label.add_to_cart')}}</a>
                                             <a style="display: {{ (($findCartItem != null) ? 'block': 'none' )  }}" class="cp_addCart_btn cp_add_to_cart_button cp_go_to_cart_button" href="{{url('courses/cart')}}">{{Lang::get('label.go_to_cart')}}</a>
                                         </div>

                                          {{-- <a class="cp_buy_btn" href="javascript:void(0);">Buy Now</a>--}}
                                    </div>
                                    <div class="cp_course_include">
                                        <span>{{Lang::get('label.includes')}}</span>
                                        <ul>
                                            <li><span class="cp_course_include1">{{ $courseDetail->total_lecture_time  }} {{Lang::get('label.on_demand_video')}}</span></li>
                                            <li><span class="cp_course_include2" >{{ $courseDetail->total_lecture_content }} {{Lang::get('label.down_load_resource')}}</span></li>
                                            <li style="display:{{ $showAccessLectureTime }} " ><span class="cp_course_include3" >{{ $lectureLifeTimeAccess }}</span></li>
                                            <li><span class="cp_course_include4" >{{Lang::get('label.access_mobile_tv')}}</span></li>
                                            <li><span class="cp_course_include5">{{Lang::get('label.assignment')}}</span></li>
                                            <li><span class="cp_course_include6" >{{Lang::get('label.ceritified_completion')}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cp_course_right_box">
                                <div class="cource_orderSumry_box_inner">
                                    <h5>{{Lang::get('label.course_feature')}}</h5>
                                    <ul>
                                        @if(count($courseDetail->course_features) > 0)
                                            @foreach($courseDetail->course_features as $feature)
                                                <li class="clearfix">
                                                    <div class="cource_orderSumry_cell"> <strong>{{$feature->feature_key}}</strong> </div>
                                                    <div class="cource_orderSumry_cell"> <p>{{$feature->feature_value}}</p> </div>
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            @if(!is_null($courseDetail->course_tags_arr) && count($courseDetail->course_tags_arr)) >0)
                                <div class="cp_course_right_box">
                                    <div class="cp_course_right_boxInner">
                                        <div class="cp_course_tags">
                                            <strong>{{Lang::get('label.Tags')}}</strong>
                                            <ul>
                                                @foreach($courseDetail->course_tags_arr as $row)
                                                    <li><a href="javascript:void(0);">{{$row}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('javascript')

    <script>

        let courseRating = "{{$courseRating}}";
        let overAllInstructorRating = "{{$overAllInstructorRating}}";

        studentFeedbackRating();
        $(document).ready(function(e) {
            $('[data-fancybox]').fancybox({
                thumbs : {
                    autoStart : true,
                    axis      : 'x'
                }
            });
        });



        $('#half').raty({
            half  : true,
            score : 3.5,
            hints : [['bad 1/2', 'bad'], ['poor 1/2', 'poor'], ['regular 1/2', 'regular'], ['good 1/2', 'good'], ['gorgeous 1/2', 'gorgeous']]
        });


        $('#cp_course_rating').raty({
            half  : true,
            readOnly:true,
            score : courseRating,
            hints : [['bad 1/2', 'bad'], ['poor 1/2', 'poor'], ['regular 1/2', 'regular'], ['good 1/2', 'good'], ['gorgeous 1/2', 'gorgeous']]
        });

        function studentFeedbackRating(){

            $('#cp_course_rating').raty({
                half  : true,
                readOnly:true,
                score : courseRating,
                hints : [['bad 1/2', 'bad'], ['poor 1/2', 'poor'], ['regular 1/2', 'regular'], ['good 1/2', 'good'], ['gorgeous 1/2', 'gorgeous']]
            });
        }


        function create_thread(id) {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{ url('/student/create_thread') }}",
                type: 'post',
                data:{"csrf-token":"{{ csrf_token() }}", "id" : id},
                success: function(result) {
                    console.log(result);
                   window.location.href="{{url('/student/messages')}}"+'/'+result.thread_id;
                }
            });
        }

        function bookmark(e, id) {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{ url('/courses/bookmark') }}",
                type: 'post',
                data:{"csrf-token":"{{ csrf_token() }}", "course_id" : id},
                success: function(result) {
                    if(result.data===true){
                        $('.pro_bookmark_top').addClass('active');
                        $.toast({
                            heading: '<?=Lang::get('messages.Success')?>',
                            text: '<?=Lang::get('messages.Course has been added as bookmark successfully.')?>',
                            showHideTransition: 'slide',
                            icon: 'success',

                        });
                    }else{

                        $('.pro_bookmark_top').removeClass('active');
                        $.toast({
                            heading: '<?=Lang::get('messages.Success')?>',
                            text: '<?=Lang::get('messages.Course has been removed as bookmark successfully.')?>',
                            showHideTransition: 'slide',
                            icon: 'success',

                        });

                    }
                }
            });
        }
    </script>
@stop
