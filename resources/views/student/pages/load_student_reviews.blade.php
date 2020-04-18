<div class="cp_reviews_list">
    <ul>
        @if(count($courseDetail->course_reviews) > 0)

            @foreach($courseDetail->course_reviews as $review)

                <li>
                    <div class="cp_reviews_inner">
                        <div class="cp_instructor">
                            <div class="cp_instructor_img">
                                <span><img src="{{$review->course_review_student->fullImage}}" alt="#"></span>
                            </div>
                            <div class="cp_instructor_inner">
                                <div class="cp_instructor_name clearfix">
                                    <strong >{{$review->course_review_student->fullName}}</strong>
                                    <span>{{$review->review_time}}
                                    </span>
                                    <div class="stars has_course_rating_disable cp_studentCourse_rating" data-score="{{ $review->rating }}">
                                        <div class=""></div>
                                        <script>
                                            {{--setStudentCourseRating("{{$review->rating}}");--}}
                                        </script>
                                    </div>
                                </div>
                                <div class="cp_instructor_detail">
                                    <p>{!! nl2br($review->content) !!}</p>
                                </div>
                                {{-- <div class="cp_reply_bar clearfix"> <a class="cp_like_btn" href="javascript:void(0);"><span>15</span>Thank Admin</a> <a class="cp_reply" href="javascript:void(0);">Reply</a> </div>--}}
                            </div>
                        </div>
                    </div>
                </li>

            @endforeach
        @endif

    </ul>
</div>
@if(count($courseDetail->course_reviews) > 10)
  <div class="more_review_btn" ><a id="btn-more" class="all_buttons btn_rounded show_more_reviews_btn" href="javascript:void(0);">{{Lang::get('label.See more reviews')}}</a></div>
@endif

