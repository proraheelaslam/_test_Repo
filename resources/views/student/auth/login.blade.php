@extends('student.layout.auth')

@section('content')
    <div class="all_banner">
        <div class="auto_content">
            <div class="all_banner_inner">
                <div class="banner_heading">
                    <strong>{{Lang::get('label.Login')}}</strong>
                </div>
            </div>
        </div>
    </div>
    <main class="content">
        <section class="stLogin_mainContent">
            <div class="auto_content">
                <div class="stLogin_content_inner ">

                    <div class="stLogin_formBox_main clearfix">
                        <div class="stLogin_leftPicMain stLogin_leftPic">
                        </div>
                        <div class="stLogin_formBox">
                            <div class="stLogin_formBoxAuto">
                                <div class="stLogin_formBox_title">
                                    <h4>{{Lang::get('label.Login to your account')}}</h4>
                                    <p>{{Lang::get("label.Don't have an account?")}} <a href="{{url('student/register')}}"> {{Lang::get('label.Sign Up!')}}</a></p>
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

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/login') }}">
                                    {{ csrf_field() }}

                                    <div class="stLogin_form">
                                        <div class="formParent">
                                            <div class="formRow clearfix">
                                                <div class="formCell col12">
                                                    <div class="form_field{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <input type="text" name="email" class="st_login_email" placeholder="{{Lang::get('label.Email Address')}}" value="{{ old('email') }}" autofocus>
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
                                                    <div class="form_field{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <input type="password" name="password" class="st_login_pw" placeholder="{{Lang::get('label.Password')}}">
                                                    </div>
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="formRow padding_btm_20 clearfix">
                                                <div class="formCell col6">
                                                    <div class="form_checkbox loginRememberMe">
                                                        <label> {{Lang::get('label.Remember me')}}
                                                            <input type="checkbox" name="loginRemember_checkbox">
                                                            <span class="checkbox_checked"></span> </label>
                                                    </div>
                                                </div>
                                                <div class="formCell col6">
                                                    <div class="text_right">

                                                        <a class="st_loginForgot_link" href="{{ url('/student/password/reset') }}">{{Lang::get('label.Forgot Password?')}}</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="formRow clearfix">
                                                <div class="formCell col12">
                                                    <div class="st_loginSubmit_main">
                                                        <button type="submit" class="all_buttons all_red">
                                                            {{Lang::get('label.Login')}}
                                                        </button>
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
