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

                        <div class="abouUs_values_details" style="width: 100%">
                               {!! $page->content !!}
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
