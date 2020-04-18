@php
    $totalStudenReviews =  $courseDetail->total_review_students;


    @endphp
<div class="cp_course_rewiew_main">
    <div class="cp_feedback clearfix">
        <div class="cp_feedback_left">
            <div class="cp_feedback_bars">
                <ul>
                    <li>
                        <div class="cp_progress_out"> <em>Stars 5</em>
                            <div class="cp_progress">
                                <div class="cp_progress_inner" style="width:{{ getStudentPercentage($courseDetail->five_star_rating_students , $totalStudenReviews)  }}%;"></div>
                            </div>
                            <span>%{{ getStudentPercentage($courseDetail->five_star_rating_students , $totalStudenReviews)   }}</span> </div>
                    </li>
                    <li>
                        <div class="cp_progress_out"> <em>Stars 4</em>
                            <div class="cp_progress">
                                <div class="cp_progress_inner" style="width:{{ getStudentPercentage($courseDetail->four_star_rating_students , $totalStudenReviews)   }}%;"></div>
                            </div>
                            <span>%{{ getStudentPercentage($courseDetail->four_star_rating_students , $totalStudenReviews)   }}</span> </div>
                    </li>
                    <li>
                        <div class="cp_progress_out"> <em>Stars 3</em>
                            <div class="cp_progress">
                                <div class="cp_progress_inner" style="width:{{ getStudentPercentage($courseDetail->three_star_rating_students , $totalStudenReviews)   }}%;"></div>
                            </div>
                            <span>% {{ getStudentPercentage($courseDetail->three_star_rating_students , $totalStudenReviews)   }}</span> </div>
                    </li>
                    <li>
                        <div class="cp_progress_out"> <em>Stars 2</em>
                            <div class="cp_progress">
                                <div class="cp_progress_inner" style="width: {{ getStudentPercentage($courseDetail->two_star_rating_students , $totalStudenReviews)   }}%;"></div>
                            </div>
                            <span>%{{ getStudentPercentage($courseDetail->two_star_rating_students , $totalStudenReviews)   }}</span> </div>
                    </li>
                    <li>
                        <div class="cp_progress_out"> <em>Stars 1</em>
                            <div class="cp_progress">
                                <div class="cp_progress_inner" style="width:{{ getStudentPercentage($courseDetail->one_star_rating_students , $totalStudenReviews)   }}%;"></div>
                            </div>
                            <span>% {{ getStudentPercentage($courseDetail->one_star_rating_students , $totalStudenReviews)   }} </span> </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="cp_feedback_right">
            <div class="cp_feedback_box"> <strong>{{$courseDetail->course_rating}}</strong>
                <div class="stars">
                    <div id="cp_course_rating"></div>
                </div>
                <span>{{Lang::get('label.course_rating')}}</span> </div>
        </div>
    </div>
</div>
