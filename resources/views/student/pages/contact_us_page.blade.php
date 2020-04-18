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
        <section class="contactUs_content_main">
            <div class="auto_content">
                <div class="contactUs_content_inner">

                    <div class="contactInfo_top">
                        <ul>
                            <li>
                                <div class="contactInfo_icon">
                                    <span>
                                       <a target="_blank" href="https://www.google.com/maps/place/{{settingValue('our_location')}}"> <img src="{{ asset('public/front_assets/images/contactIcon_location.png') }} " alt="#"></a>
                                    </span>
                                </div>
                                <h5><a target="_blank" href="https://www.google.com/maps/place/{{settingValue('our_location')}}">{{Lang::get('label.Our Location')}}</a> </h5>
                                   <a target="_blank" href="https://www.google.com/maps/place/{{settingValue('our_location')}}" class="contactInfo_callUs"><p>{{settingValue('our_location')}}</p></a>
                            </li>
                            <li>
                                <div class="contactInfo_icon">
                                    <span>
                                        <a href="callTo:{{settingValue('contact_us_mobile')}}"><img src="{{ asset('public/front_assets/images/contactIcon_phone.png') }} " alt="#"></a>
                                    </span>
                                </div>
                                <h5><a href="callTo:{{settingValue('contact_us_mobile')}}">{{Lang::get('label.Contact Us')}}</a> </h5>
                                <p>{{Lang::get('label.Mobile')}}
                                    <a class="contactInfo_callUs" href="callTo:{{settingValue('contact_us_mobile')}}">{{settingValue('contact_us_mobile')}}</a>
                                </p>
                            </li>
                            <li>
                                <div class="contactInfo_icon">
                                   <a href="mailTo:{{settingValue('contact_us_email')}}">  <span><img src="{{ asset('public/front_assets/images/contactIcon_email.png') }} " alt="#"></span></a>
                                </div>
                                <h5><a href="mailTo:{{settingValue('contact_us_email')}}">{{Lang::get('label.our_contact_email')}}</a> </h5>
                                <p><a class="contactInfo_email" href="mailTo:{{settingValue('contact_us_email')}}">
                                         {{settingValue('contact_us_email')}}</a></p>
                            </li>
                        </ul>

                    </div>


                    <div class="contactInfo_formMain clearfix">
                        <div class="contactInfo_formBox">
                            <div class="contactInfo_formBoxInner">
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
                                <div class="contactInfo_form">
                                   <form id="contact_us_form" method="POST" action="{{route('contact_us.sendMessage')}}">
                                       @csrf
                                       <div class="formParent">
                                           <div class="formRow clearfix">
                                               <div class="formCell col12">
                                                   <div class="form_heading">
                                                       <h4>{{Lang::get('label.Send a Message')}}</h4>
                                                       <p>{{Lang::get('label.Please enter below details')}}</p>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="formRow clearfix">
                                               <div class="formCell col12">
                                                   <div class="form_heading"> <strong>{{Lang::get('label.Full Name')}}</strong> </div>
                                                   <div class="form_field {{ $errors->has('full_name') ? ' has-error' : '' }}">
                                                       <input type="text" class="contactField_fullName" name="full_name">
                                                   </div>
                                                   @if ($errors->has('full_name'))
                                                       <span class="help-block">
                                                            <strong>{{ $errors->first('full_name') }}</strong>
                                                        </span>
                                                   @endif
                                               </div>
                                           </div>

                                           <div class="formRow clearfix">
                                               <div class="formCell col12">
                                                   <div class="form_heading"> <strong>{{Lang::get('label.Your Email')}}</strong> </div>
                                                   <div class="form_field  {{ $errors->has('email') ? ' has-error' : '' }}">
                                                       <input type="text" class="contactField_email" name="email">
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
                                                   <div class="form_heading"> <strong>{{Lang::get('label.Subject')}}</strong> </div>
                                                   <div class="form_field {{ $errors->has('subject') ? ' has-error' : '' }}">
                                                       <input type="text" class="contactField_subject" name="subject">
                                                   </div>
                                                   @if ($errors->has('subject'))
                                                       <span class="help-block">
                                                            <strong>{{ $errors->first('subject') }}</strong>
                                                        </span>
                                                   @endif
                                               </div>
                                           </div>
                                           <div class="formRow clearfix">
                                               <div class="formCell col12">
                                                   <div class="form_heading"> <strong>{{Lang::get('label.Your Message')}}</strong> </div>
                                                   <div class="form_field {{ $errors->has('message') ? ' has-error' : '' }}">
                                                       <textarea class="contactField_msg" name="message"></textarea>
                                                   </div>
                                                   @if ($errors->has('message'))
                                                       <span class="help-block">
                                                            <strong>{{ $errors->first('message') }}</strong>
                                                        </span>
                                                   @endif
                                               </div>
                                           </div>
                                           <div class="formRow clearfix">
                                               <div class="formCell col12">
{{--                                                   <a class="all_buttons btn_rounded contactForm_submit_btn" href="javascript:void(0)">Submit</a>--}}
                                                   <button type="submit" class="all_buttons btn_rounded contactForm_submit_btn" href="javascript:void(0)">{{Lang::get('label.Submit')}}</button>
                                               </div>
                                           </div>

                                       </div>
                                   </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


