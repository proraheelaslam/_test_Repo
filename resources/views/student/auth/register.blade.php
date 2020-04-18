@extends('student.layout.auth')

@section('content')

    <div class="all_banner">
        <div class="auto_content">
            <div class="all_banner_inner">
                <div class="banner_heading">
                    <strong>{{Lang::get('label.Registration')}}</strong>
                </div>
            </div>
        </div>
    </div>
    <main class="content">
        <section class="stLogin_mainContent">
            <div class="auto_content">
                <div class="stLogin_content_inner ">

                    <div class="stLogin_formBox_main clearfix">
                        <div class="stLogin_leftPicMain stRegister_leftPic">
                        </div>
                        <div class="stLogin_formBox">
                            <div class="stLogin_formBoxAuto">
                                <div class="stLogin_formBox_title">
                                    <h4>{{Lang::get('label.Register to start learning')}}</h4>
                                    <p>{{Lang::get("label.Don't have an account?")}} <a href="{{url('student/login')}}"> {{Lang::get('label.Login')}}</a></p>
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

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/register') }}">
                                    {{ csrf_field() }}
                                    <div class="stLogin_form">
                                        <div class="formParent">


                                            <div class="formRow clearfix">
                                                <div class="formCell col12">
                                                    <div class="form_field{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <input id="name" type="text" class="st_reg_userName" name="name" placeholder="{{Lang::get('label.Username')}}" value="<?php if (Session::has('social_data')) {?>{{ session('social_data.name') }}<?php } else {?>{{ old('name') }}<?php }?>" autofocus >

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="formRow clearfix">
                                                <div class="formCell col12">
                                                    <div class="form_field{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <input id="email" type="email"  class="st_reg_email" name="email" placeholder="{{Lang::get('label.Email Address')}}" value="<?php if (Session::has('social_data')) {?>{{ session('social_data.email') }}<?php } else {?>{{ old('email') }}<?php }?>">
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="facebook_id" value="<?php if (Session::has('social_data')) {?>{{ session('social_data.facebook_id') }}<?php } else {}?>">

                                            <input type="hidden" name="google_id" value="<?php if (Session::has('social_data')) {?>{{ session('social_data.google_id') }}<?php } else {}?>">


                                            <div class="formRow clearfix">
                                                <div class="formCell col12">
                                                    <div class="form_field{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <input id="password" type="password" class="st_reg_pw" placeholder="{{Lang::get('label.Password')}}" name="password">
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="formRow clearfix">
                                                <div class="formCell col12">
                                                    <div class="form_field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                        <input id="password-confirm" type="password" name="password_confirmation" class="st_reg_confirmPw" placeholder="{{Lang::get('label.Confirm Password')}}">
                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="formRow padding_btm_20 clearfix">
                                                <div class="formCell col12">
                                                    <div class="form_checkbox loginRememberMe">
                                                        <label> {{Lang::get('label.Want to become an instructor?')}}
                                                            <input type="checkbox" id="is_instructor" name="is_instructor" value="0">
                                                            <span class="checkbox_checked"></span> </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="formRow clearfix">
                                                <div class="formCell col12">
                                                    <div class="st_loginSubmit_main">
                                                        <button type="submit" class="all_buttons all_orange">{{Lang::get('label.Register')}}</button>
                                                    </div>
                                                </div>
                                            </div>

                                            @include('student.layout.social_login')
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
