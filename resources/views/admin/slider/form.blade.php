

 	<div class="form-group">
	    {!! Form::label('name','Name EN', array('class' => 'control-label')) !!}
	    {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>

<div class="form-group">
	    {!! Form::label('name_sv','Name SV', array('class' => 'control-label')) !!}
	    {!! Form::text('name_sv',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
    <div class="form-group">
	    {!! Form::label('name_de','Name DE', array('class' => 'control-label')) !!}
	    {!! Form::text('name_de',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>

     
     <div class="form-group ">
                                                    
                                <label class=" control-label">Description EN</label>

                                    <textarea name="descrip" id="descrip" class="form-control" rows="4"><?=@$slider->descrip?></textarea>
                                
                            </div>
                            
                            
                        <div class="form-group ">
                                                    
                                <label class=" control-label">Description SV</label>

                                    <textarea name="descrip_sv" id="descrip_sv" class="form-control" rows="4"><?=@$slider->descrip_sv?></textarea>
                                
                            </div>
                            
                            
                              <div class="form-group ">
                                                    
                                <label class=" control-label">Description DE</label>

                                    <textarea name="descrip_de" id="descrip_de" class="form-control" rows="4"><?=@$slider->descrip_de?></textarea>
                                
                            </div>
 
  <div class="form-group">
    
         {!! Form::label('image','Slider Image', array('class' => 'control-label')) !!}
         
             <input type="file"  onchange="readImageURL(this);" onclick="BrowseFile()"  name="image" id="image" accept="image/*">
           @if ($errors->has('image'))
            <span  class="help-block">{{ $errors->first('image') }}</span>
            @endif
           <?php if(isset($slider->image)){ ?>		
                <img src="{{asset('public/uploads/slider/'.@$slider->image)}}" width="70" height="70" id="new_image"  >
            <?php }
            else{?>
              <img name="image" style="width: 70px; height: 70px;" onclick="BrowseFile()" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
            <?php } ?>
       
     </div>

 <div class="form-group">
    {!! Form::submit(isset($slider) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>


@section('scripts')


<script type="text/javascript">

    $('#category_form').validator('update');


$("#chk").change( function() {
  if ( $(this).is(":checked") ) {
    // do something if a1 is checked
	 $(this).val(1);
  } else if ( $(this).not(":checked") ) {
    // do something if a1 is unchecked
	 $(this).val(0);
  }
});

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
@endsection