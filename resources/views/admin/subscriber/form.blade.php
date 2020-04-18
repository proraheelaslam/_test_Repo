

 	<div class="form-group">
	    {!! Form::label('name','Name English', array('class' => 'control-label')) !!}
	    {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>


	<div class="form-group">
	    {!! Form::label('name_sv','Name Swedish', array('class' => 'control-label')) !!}
	    {!! Form::text('name_sv',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>



 	<div class="form-group ">
	    {!! Form::label('name_de','Name German', array('class' => 'control-label')) !!}
	    {!! Form::text('name_de',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
     
   
     <div class="form-group">
     
                                         
    <div class="checkbox">
        <label>
             <input name="is_active" type="checkbox" id="chk" <?php if (@$categories->is_active == '1') {?> checked value="1" <?php } else {?>   value="0" <?php }?> > Active
        </label>
 </div>
 
 </div>
 
  <div class="form-group">
    
         {!! Form::label('image','Category Image', array('class' => 'control-label')) !!}
         
             <input type="file"  onchange="readImageURL(this);" onclick="BrowseFile()"  name="image" id="image" accept="image/*">
           @if ($errors->has('image'))
            <span  class="help-block">{{ $errors->first('image') }}</span>
            @endif
           <?php if(isset($categories->image)){ ?>		
                <img src="{{asset('public/uploads/category/'.@$categories->image)}}" width="70" height="70" id="new_image"  >
            <?php }
            else{?>
              <img name="image" style="width: 70px; height: 70px;" onclick="BrowseFile()" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
            <?php } ?>
       
     </div>

 <div class="form-group">
    {!! Form::submit(isset($categories) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
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