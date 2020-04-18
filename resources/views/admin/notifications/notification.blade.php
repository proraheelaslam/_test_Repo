@extends('admin.template.template')

@section('content')
<style type="text/css">


</style>
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
                                                         {!! Form::open(['url' => 'admin/settings/send_notifications', 'class' => 'form-horizontal', 'files' => true,'id' => 'setting_form']) !!}
<div class="row">
                                                        <div class="form-group">
                                                             
                                                        </div>

                                                        <div class="form-group" id="client_select">


                                                        <select multiple="multiple" id="my-select_c" name="my-select_client[]">
                                                            <?php
if ($client) {
	
	foreach ($client as $row) {
?>
          <option value=<?=$row['id']?>><?=$row['first_name']?> <?=$row['last_name']?>(<?=$row['email']?>)</option>
    <?php }
}
?>


    </select>
</div>
   

                                                    </div>
                                                        <div class="row">
                                                        <div class="form-group">
                                                             <div class="radio">
                                <label>
                                    <input name="notification_type" onchange="show_panel(this.value)" id="optionsRadios1" value="email" checked="" type="radio">
                                   Email
                                </label>

                            </div>
                            <div class="radio">

                                 <label>
                                    <input name="notification_type" onchange="show_panel(this.value)" id="optionsRadios1" value="notification" checked="" type="radio">
                                   Notification
                                </label>
                            </div>
                                                        </div>
                                                    </div>


<div class="row">
                                                  <div class="form-group ">
                                                      <div class="form-group col-md-12">
                                <label class=" control-label">Message</label>

                                    <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                                </div>

                            </div>
                          </div>

<div class="row" id="email_settings"  style="display: none;">

<div class="form-group ">
              <div class="form-group col-md-6">
{!! Form::label('image','Email Attachment',['class'=>'control-label']) !!}
           <input type="file"   class="form-control"  name="image" id="image" accept="image/*">
           @if ($errors->has('image'))
            <span  class="help-block">{{ $errors->first('image') }}</span>
            @endif
       </div>
     </div>





 </div>


 <div class="row">

                                                        <div class="form-group">
                                                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Send' ,['class'=>'btn btn-success']) !!}
                                                        </div>
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
<script type="text/javascript" src={{asset('public/admin_assets/js/multiselect/js/jquery.multi-select.js')}}></script>

<script type="text/javascript">

    $('#setting_form').validator('update');
$('#my-select_c').multiSelect();
$('#my-select_p').multiSelect();

function show_panel(value){
    //alert(value);
if(value=='email'){

    $('#email_settings').show();
}
else{
     $('#email_settings').hide();
}

}
 $(document).ready(function () {
       
    }); 
</script>
@endsection