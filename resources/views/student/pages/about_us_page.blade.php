@extends('student.layout.auth')
@section('content')

<div class="all_banner">
    <div class="auto_content">
        <div class="all_banner_inner">
            <div class="banner_heading">
                <strong>{{$page->name}}</strong>
            </div>
        </div>
    </div>
</div>
<main class="content">
    <section class="aboutUs_content_main">
        <div class="auto_content">
            <div class="aboutUs_content_inner">
                <div class="aboutUs_values clearfix">
                    <div class="abouUs_mainImg">
                        <span>
                            <img src="{{ asset('public/front_assets/images/aboutMain_img.png') }}" alt="#">
                        </span>
                    </div>
                    <div class="abouUs_values_details">
                        {!! nl2br($page->content) !!}

                    </div>
                </div>
                <div class="about_stries">
                    <h4>{{Lang::get('label.our_story_label')}}</h4>
                    <ul>
                        <li> <span>{{Lang::get('label.certified_teachers')}}</span> <strong>{{getTotalCertifiedTeachers()}}</strong> </li>
                        <li> <span>{{Lang::get('label.student_enrolled')}}</span> <strong>{{  getTotalEnrolledStudent()  }}</strong> </li>
                        <li> <span>{{Lang::get('label.complete_course')}}</span> <strong>{{getTotalCourses()}}</strong> </li>
                    </ul>
                </div>
                <div class="about_whoWeAre">
                    <ul>
                        <li> <strong>{{$who_we_are->name}}</strong>
                            {!! nl2br($who_we_are->content) !!}
                        </li>
                        <li> <strong>{{$who_we_are->name}}</strong>
                            {!! nl2br($who_we_are->content) !!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection


