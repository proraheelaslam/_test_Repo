@extends('student.layout.auth')

<!-- Main Content -->
@section('content')
<div class="all_banner">
    <div class="auto_content">
        <div class="all_banner_inner">
            <div class="banner_heading">
                <strong>{{Lang::get("label.Forgot Password?")}}</strong>
            </div>
        </div>
    </div>
</div>
<main class="content">
    <section class="stLogin_mainContent">
        <div class="auto_content">
            <div class="stLogin_content_inner ">

                <div class="stLogin_formBox_main clearfix">
                    <div class="stLogin_leftPicMain stForgot_leftPic">

                    </div>
                    <div class="stLogin_formBox">
                        <form class="stLogin_formBoxAuto" role="form" method="POST" action="{{ url('/student/forgetpassword') }}">
                            {{ csrf_field() }}

                            <div class="stLogin_formBox_title">
                                <h4>{{Lang::get('label.Forgot Password?')}}</h4>
                                <p>{{Lang::get('label.Enter below details to proceed')}}</p>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('success_message'))
                                <div class="alert alert-success">
                                    {{ session('success_message') }}
                                </div>
                            @endif
                            @if (session('error_message'))
                                <div class="alert alert-danger">
                                    {{ session('error_message') }}
                                </div>
                            @endif

                             <div class="stLogin_form">
                                    <div class="formParent">

                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="form_field{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <input type="email" name="email" id="email" class="st_forgot_email" placeholder="{{Lang::get('label.Email Address')}}" value="{{ old('email') }}">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="st_loginSubmit_main">
                                                    <button type="submit" class="all_buttons all_red">{{Lang::get('label.Submit')}}</button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                          </form>

                        </div>
                    </div>
                </div>

                @include('student.layout.change_user_type')

            </div>
        </div>
    </section>
</main>
@endsection
