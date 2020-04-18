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
                                                                 {!! Form::label('meta_title','Meta Title', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('meta_title',settingValue('meta_title'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                           <div class="form-group">
                                                                 {!! Form::label('meta_desc','Meta Description', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('meta_desc',settingValue('meta_desc'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                           <div class="form-group">
                                                                 {!! Form::label('meta_keywords','Meta Keywords', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('meta_keywords',settingValue('meta_keywords'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                                 {!! Form::label('user_currency','Currency', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('user_currency',settingValue('user_currency'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                                 {!! Form::label('highlight_fee','Highlight Fee %', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('highlight_fee',settingValue('highlight_fee'),['class'=>'form-control','required' => 'required']) !!}
                                                                 <p></p>
                                                        </div>


                                                        <div class="form-group">
                                                                 {!! Form::label('toplisting_fee','Top Listing Fee', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('toplisting_fee',settingValue('toplisting_fee'),['class'=>'form-control','required' => 'required']) !!}
                                                                 <p></p>
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
                                                                 {!! Form::label('copy_rights','Copy Rights Text', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('copy_rights',settingValue('copy_rights'),['class'=>'form-control','required' => 'required']) !!}
                                                        </div>
                                                        
                                                        
                                                      <div class="form-group">
                                                                 {!! Form::label('footer_text','Footer Text', array('class' => 'control-label')) !!}
                                                                 {!! Form::text('footer_text',settingValue('footer_text'),['class'=>'form-control','required' => 'required']) !!}
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