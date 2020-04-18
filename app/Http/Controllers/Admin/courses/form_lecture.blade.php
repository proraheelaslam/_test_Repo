

     <div class="form-group ">
      {!! Form::label('title','Lecture Title', array('class' => 'control-label')) !!}
      {!! Form::text('title',null,['class'=>'form-control','required' => 'required']) !!}
  </div>

  
  

                  <div class="form-group ">
                                                    
                                <label class=" control-label">Short Description</label>

                                    <textarea name="short_desc" id="short_desc" class="form-control" rows="4"><?=@$lecture->short_desc?></textarea>
                              

                            </div>
                            
                            
                               <div class="row">
                                                        <div class="form-group">
                                                             <div class="radio">
                                <label>
                                    <input name="file_type" onchange="show_panel(this.value)" id="optionsRadios1" value="image" checked="" type="radio">
                                   Image
                                </label>

                            </div>
                            <div class="radio">

                                 <label>
                                    <input name="file_type" onchange="show_panel(this.value)" id="optionsRadios1" value="file" type="radio">
                                   Document
                                </label>
                            </div>
                            
                               <div class="radio">

                                 <label>
                                    <input name="file_type" onchange="show_panel(this.value)" id="optionsRadios1" value="video"  type="radio">
                                   Video
                                </label>
                            </div>
                                                        </div>
                                                    </div>
                                                    
         <div class="row" id="image_div" <?php if(@$lecture->file_type=='image'){ ?> style="display: block;"<?php }else{?> style="display: none;"<?php  } ?>>

<div class="form-group ">
              <div class="form-group col-md-6">
{!! Form::label('image','Image',['class'=>'control-label']) !!}
           <input type="file"   class="form-control"  name="image" id="image" onchange="readImageURL(this);" accept="image/*">
           @if ($errors->has('image'))
            <span  class="help-block">{{ $errors->first('image') }}</span>
            @endif
             <?php if(@$lecture->file_type=='image'){ ?>
            <?php if(isset($lecture->file_name)){ ?>		
                <img src="{{asset('public/uploads/lecture/'.@$lecture->file_name)}}" width="70" height="70" id="new_image"  >
            <?php }
            else{?>
              <img name="image" style="width: 70px; height: 70px;" onchange="readImageURL(this);" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
            <?php }} ?>
       </div>
     </div>





 </div>
 
 <div class="row" id="document_div"  <?php if(@$lecture->file_type=='file'){ ?> style="display: block;"<?php }else{?> style="display: none;"<?php  } ?>>

<div class="form-group ">
              <div class="form-group col-md-6">
{!! Form::label('image','Document',['class'=>'control-label']) !!}
           <input type="file" class="form-control" name="file" accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.txt,.pdf" />
           @if ($errors->has('file'))
            <span  class="help-block">{{ $errors->first('file') }}</span>
            @endif
            <?php if(@$lecture->file_type=='file'){ ?>
              <?php if(isset($lecture->file_name)){ ?>		
                
                <a href="{{asset('public/uploads/lecture/'.@$lecture->file_name)}}"><?=@$lecture->file_name?></a>
            <?php }
			}
           ?>
       </div>
     </div>





 </div>
 
 <div class="row" id="video_audio_div"  <?php if(@$lecture->file_type=='video'){ ?> style="display: block;"<?php }else{?> style="display: none;"<?php  } ?>>

<div class="form-group ">
              <div class="form-group col-md-6">
{!! Form::label('image','Audio/Video File',['class'=>'control-label']) !!}
            <input type="file" class="form-control" name="file" id="file" accept="audio/*,video/*">
           @if ($errors->has('file'))
            <span  class="help-block">{{ $errors->first('file') }}</span>
            @endif
             <?php if(@$lecture->file_type=='video'){ ?>
              <?php if(isset($lecture->file_name)){ ?>		
                
                <a href="{{asset('public/uploads/lecture/'.@$lecture->file_name)}}"><?=@$lecture->file_name?></a>
            <?php }
			 }
           ?>
       </div>
     </div>





 </div>
                            
                            
                            
                   <input name="course_id" value="<?=$course_id?>" type="hidden">   
                   
                   <input name="content_id" value="<?=$content_id?>" type="hidden">        
    
                      

 <div class="form-group">
    {!! Form::submit(isset($content) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>


@section('scripts')


       

<script type="text/javascript">

    $('#client_form').validator('update');
	// This example requires the Places library. Include the libraries=places

function BrowseFile() {
        $("input[id='imaage']").click();
    }
function readImageURL(input)
 {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#new_image')
                    .attr('src', e.target.result)
                    .width(70)
                    .height(70);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
  function show_panel(value){
    //alert(value);
if(value=='image'){
	 $('#document_div').hide();
	  $('#video_audio_div').hide();
    $('#image_div').show();
}
else if(value=='file'){
	 $('#image_div').hide();
	  $('#video_audio_div').hide();
     $('#document_div').show();
}
else{
	
	 $('#image_div').hide();
	  $('#document_div').hide();
	$('#video_audio_div').show();
	}

}
</script>
@endsection