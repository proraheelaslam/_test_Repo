@extends('student.layout.auth')

@section('content')

    <main class="content">
        <section class="st_dashboard_main">

            @include('student.layout.header')


            <div class="st_dashboard_content">
                @include('student.layout.sidebar')

                <div class="stDb_right_content">
                    <div class="stDb_right_contentInner">

                        <div class="stDb_navigations clearfix">
                            <div class="stDb_navigations_left">
                                <strong>{{Lang::get('label.Personal Details')}}</strong>
                            </div>
                            <div class="stDb_navigations_menu">
                                <ul>
                                    <li><a href="javascript:void(0)">{{Lang::get('label.Home')}}</a></li>
                                    <li><span>{{Lang::get('label.Settings')}}</span></li>
                                </ul>
                            </div>
                        </div>




                        <div class="st_settingsFormMain clearfix">
                            <div class="form_heading st_settingsForm_heading">
                                <h4>{{Lang::get('label.Personal Details')}}</h4>

                            </div>

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/profile') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="st_settingsForm">

                                    @include('student.flash_message')

                                    <div class="formParent">
                                        <div class="formRow clearfix">
                                            <div class="formCell col2">
                                                <div class="stStng_userAvatar">
                                                    <span >
                                                        <?php
                                                        $image_name = 'user_placeholder.png';

                                                        if(Auth::user()->image){

                                                            $image_name = Auth::user()->image;

                                                        }?>

                                                        <img src="{{checkImage("students/".$image_name)}}" alt="#" id="uploadForm"/>

                                                    </span>
                                                    <div class="stStng_vatar_brows" >
                                                        <input type="file" name="image" id="image" onchange="filePreview(this)">{{Lang::get('label.Browse')}}</div>
                                                </div>

                                            </div>
                                            <div class="formCell col10">
                                                <div class="formRow clearfix">
                                                    <div class="formCell col6">
                                                        <div class="form_heading"> <strong>{{Lang::get('label.First Name')}}</strong> </div>
                                                        <div class="form_field">
                                                            <input type="text" class="st_settingsForm_firstName" name="first_name" value="{{old('first_name')?old('first_name'):$user->first_name}}">
                                                        </div>
                                                       {{-- @if ($errors->has('first_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                            </span>
                                                        @endif--}}
                                                    </div>
                                                    <div class="formCell col6">
                                                        <div class="form_heading"> <strong>{{Lang::get('label.Last Name')}}</strong> </div>
                                                        <div class="form_field">
                                                            <input type="text" class="st_settingsForm_lastName" name="last_name" value="{{old('last_name')?old('last_name'):$user->last_name}}">
                                                        </div>
                                                       {{-- @if ($errors->has('last_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                            </span>
                                                        @endif--}}
                                                    </div>
                                                </div>
                                                <div class="formRow clearfix">
                                                    <div class="formCell col6">
                                                        <div class="form_heading"> <strong>{{Lang::get('label.Email Address')}}</strong> </div>
                                                        <div class="form_field">
                                                            <input type="text" class="st_settingsForm_email" name="email" readonly value="{{$user->email}}">
                                                        </div>
                                                       {{-- @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif--}}
                                                    </div>
                                                    <div class="formCell col6">
                                                        <div class="form_heading"> <strong>{{Lang::get('label.Phone No.')}}</strong> </div>
                                                        <div class="form_field">
                                                            <input type="text" class="st_settingsForm_phoneNo" name="phone" value="{{old('phone')?old('phone'):$user->phone}}">
                                                        </div>
                                                       {{-- @if ($errors->has('phone'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        @endif--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="form_heading"> <strong>{{Lang::get('label.Personal info')}}</strong> </div>
                                                <div class="form_field">
                                                    <textarea type="text" class="st_settingsForm_personalInfo" name="personal_info">{{old('personal_info')?old('personal_info'):$user->about_student}}</textarea>
                                                </div>
                                                {{--@if ($errors->has('personal_info'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('personal_info') }}</strong>
                                                    </span>
                                                @endif--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_heading st_settingsForm_heading">
                                    <h4>{{Lang::get('label.Change password')}}</h4>
                                </div>
                                <div class="st_settingsForm">
                                    <div class="formParent">

                                        <div class="formRow clearfix">
                                            <div class="formCell col6">
                                                <div class="form_heading"> <strong>{{Lang::get('label.Old password')}}</strong> </div>
                                                <div class="form_field">
                                                    <input type="password" class="st_settingsForm_oldPw" name="old_password">
                                                </div>
                                                {{--@if ($errors->has('old_password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('old_password') }}</strong>
                                                    </span>
                                                @endif--}}
                                            </div>
                                        </div>
                                        <div class="formRow clearfix">
                                            <div class="formCell col6">
                                                <div class="form_heading"> <strong>{{Lang::get('label.New password')}}</strong> </div>
                                                <div class="form_field">
                                                    <input type="password" class="st_settingsForm_newPw" name="new_password">
                                                </div>
                                                {{--@if ($errors->has('new_password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('new_password') }}</strong>
                                                    </span>
                                                @endif--}}
                                            </div>
                                        </div>
                                        <div class="formRow clearfix">
                                            <div class="formCell col6">
                                                <div class="form_heading"> <strong>{{Lang::get('label.Confirm new password')}}</strong> </div>
                                                <div class="form_field">
                                                    <input type="password" class="st_settingsForm_confirmNew_pw"  name="password_confirmation" id="password_confirmation">
                                                </div>
                                                {{--@if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form_heading st_settingsForm_heading">
                                    <h4>{{Lang::get('label.Social Links')}}</h4>
                                </div>
                                <div class="st_settingsForm">
                                    <div class="formParent">

                                        <div class="formRow clearfix">
                                            <div class="formCell col6">
                                                <div class="form_heading"> <strong>{{Lang::get('label.Facebook')}}</strong> </div>
                                                <div class="form_field">
                                                    <input type="text" class="st_settingsForm_fb" name="facebook" value="{{old('facebook')?old('facebook'):$user->facebook}}">
                                                </div>
                                                {{--@if ($errors->has('facebook'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('facebook') }}</strong>
                                                    </span>
                                                @endif--}}
                                            </div>
                                            <div class="formCell col6">
                                                <div class="form_heading"> <strong>{{Lang::get('label.Twitter')}}</strong> </div>
                                                <div class="form_field">
                                                    <input type="text" class="st_settingsForm_fb" name="twitter" value="{{old('twitter')?old('twitter'):$user->twitter}}">
                                                </div>
                                                {{--@if ($errors->has('twitter'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('twitter') }}</strong>
                                                    </span>
                                                @endif--}}
                                            </div>
                                        </div>
                                        <div class="formRow clearfix">
                                            <div class="formCell col6">
                                                <div class="form_heading"> <strong>{{Lang::get('label.Linkedin')}}</strong> </div>
                                                <div class="form_field">
                                                    <input type="text" class="st_settingsForm_newPw" name="linkedin" value="{{old('linkedin')?old('linkedin'):$user->linkedin}}">
                                                </div>
                                               {{-- @if ($errors->has('linkedin'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('linkedin') }}</strong>
                                                    </span>
                                                @endif--}}
                                            </div>
                                            <div class="formCell col6">
                                                <div class="form_heading"> <strong>{{Lang::get('label.Instagram')}}</strong> </div>
                                                <div class="form_field">
                                                    <input type="text" class="st_settingsForm_newPw" name="instagram" value="{{old('instagram')?old('instagram'):$user->instagram}}">
                                                </div>
                                                {{--@if ($errors->has('instagram'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('instagram') }}</strong>
                                                    </span>
                                                @endif--}}
                                            </div>
                                        </div>
                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <button type="submit" class="stSettings_formSaveBtn">{{Lang::get('label.Save')}}</button >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript">
        function filePreview(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var output = document.getElementById('uploadForm');
                    output.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
