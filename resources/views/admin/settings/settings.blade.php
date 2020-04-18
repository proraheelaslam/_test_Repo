@extends('admin.template.template')
@section('content')

<section id="main-content">
        <section class="wrapper">
                @include('admin.template.flash_messages')
                <div class="row">
                        <div class="col-lg-12">
                                <section class="panel">
                                        <header class="panel-heading">
                                                {{ $page_title}}
                                        </header>
                                        <div class="panel-body">
                                                <div class="position-center">
                                                         {!! Form::open(['url' => 'admin/settings/update', 'class' => 'form-horizontal', 'files' => true,'id' => 'setting_form']) !!}

                                                        <div class="form-group">
                                                                 {!! Form::label('title','Title', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('title',settingValue('title'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                                 {!! Form::label('user_currency','Currency', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('user_currency',settingValue('user_currency'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>


                                                        <div class="form-group">
                                                                 {!! Form::label('email_from_name','Email From Name', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('email_from_name',settingValue('email_from_name'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                                 {!! Form::label('email_from','Email From', array('class' => 'control-label')) !!}
                                                                 {!! Form::email('email_from',settingValue('email_from'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>


                                                        <div class="form-group">
                                                                 {!! Form::label('copy_right','Copy Rights Text', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('copy_right',settingValue('copy_right'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                                 {!! Form::label('fb_url','Facebook Url', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('fb_url',settingValue('fb_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                                 {!! Form::label('twitter_url','Twitter Url', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('twitter_url',settingValue('twitter_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                          <div class="form-group">
                                                                 {!! Form::label('insta_url','Instagram Url', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('insta_url',settingValue('insta_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>


                                                              <div class="form-group">
                                                                 {!! Form::label('apple_url','Apple Store', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('apple_url',settingValue('apple_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                              <div class="form-group">
                                                                 {!! Form::label('play_store_url','Play Store', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('play_store_url',settingValue('play_store_url'),['class'=>'form-control','required' => 'required']) !!}
                                                               </div>
                                                        <div class="form-group">
                                                            {!! Form::label('contact_us','Email Contact Us', array('class' => 'control-label')) !!}
                                                            {!! Form::text('contact_us',settingValue('contact_us'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('contact_us_mobile','Contact Mobile Number', array('class' => 'control-label')) !!}
                                                            {!! Form::text('contact_us',settingValue('contact_us_mobile'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                            {!! Form::label('contact_us_email','Contact Email', array('class' => 'control-label')) !!}
                                                            {!! Form::text('contact_us_email',settingValue('contact_us_email'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                            {!! Form::label('our_location','Our Location', array('class' => 'control-label')) !!}
                                                            {!! Form::text('our_location',settingValue('our_location'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('paypal_url','Paypal Url', array('class' => 'control-label')) !!}
                                                            {!! Form::text('paypal_url',settingValue('paypal_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('pinterest_url','Pinterest Url', array('class' => 'control-label')) !!}
                                                            {!! Form::text('pinterest_url',settingValue('pinterest_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('booking_url','Booking Url', array('class' => 'control-label')) !!}
                                                            {!! Form::text('booking_url',settingValue('booking_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('google_url','Google Url', array('class' => 'control-label')) !!}
                                                            {!! Form::text('google_url',settingValue('google_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                    <div class="form-group">
                                                        {!! Form::label('adidas_url','Adidas Url', array('class' => 'control-label')) !!}
                                                        {!! Form::text('adidas_url',settingValue('adidas_url'),['class'=>'form-control','required' => 'required']) !!}
                                                    </div>
                                                        <div class="form-group">
                                                                {!! Form::label('dribbble_url','Dribble  Url', array('class' => 'control-label')) !!}
                                                                {!! Form::text('dribbble_url',settingValue('dribbble_url'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                                {!! Form::label('view_more','View More Url', array('class' => 'control-label')) !!}
                                                                {!! Form::text('view_more',settingValue('view_more'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                                {!! Form::label('direct_bank_transfer','Direct Bank Transfer', array('class' => 'control-label')) !!}
                                                                {!! Form::textarea('direct_bank_transfer',settingValue('direct_bank_transfer'),['class'=>'form-control','required' => 'required', 'rows' => 4]) !!}
                                                        </div>

                                                        <div class="form-group">
                                                                {!! Form::label('check_payments','Check Payments', array('class' => 'control-label')) !!}
                                                                {!! Form::textarea('check_payments',settingValue('check_payments'),['class'=>'form-control','required' => 'required', 'rows' => 4]) !!}
                                                        </div>


                                                        <div class="form-group">
                                                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Update' ,['class'=>'btn btn-success']) !!}
                                                        </div>


                                                        {!! Form::close() !!}
                                                </div>
                                        </div>
                                </section>
                        </div>
                </div>
        </section>
</section>

@endsection

@section('scripts')

<script type="text/javascript">

    $('#setting_form').validator('update');

</script>
@endsection
