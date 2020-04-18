<div class="cp_course_list">
<ul id="cpCourses_ul">

    @if(count($courses) > 0)

        @foreach($courses as $course)
            <li>
                <div class="courses_box">
                    <a href="{{url('courses/course_detail')}}/{{Hashids::encode($course->id)}}">
                    <div class="courses_box_img">
                        <figure><img src="{{@$course->fullImage}}" alt="#"></figure>
                    </div>
                    </a>
                    <div class="courses_box_inner">
                        <div class="course_rate"> <span>${{$course->course_price}}</span> </div>
                        <div  class="stars " >
                            <div class="cp_single_course_rating" data-score="{{$course->course_rating}}"> </div>
                        </div>

                        <div class="courses_box_text">
                            <span>{{$course->categories->name}} , {{$course->sub_categories->name}} </span>
                            <a  href="{{url('courses/course_detail')}}/{{Hashids::encode($course->id)}}"> {{$course->name}} </a>
                        </div>
                        <div class="user">
                            <a href="javascript:void(0);">
                                <i><img src="{{$course->instructor != null ? $course->instructor->fullImage :   asset('public/uploads/no_image.png') }}" alt="#"></i>
                                <p> <strong>{{@$course->instructor->fullName}}</strong> <span>{{$course->courseCreated}}</span> </p>
                            </a>
                        </div>
                    </div>
                </div>

            </li>


        @endforeach

    @else
        <div class="not_found_crs_inner" >
            <p>{{Lang::get("label.Sorry, we couldn't find any results for this keyword")}}</p>
        </div>
    @endif

</ul>
</div>
@if(count($courses) > 0)
    <div class="pagination_main">
        <div class="pagination">
            {{ $courses->links() }}
        </div>
    </div>
@endif

