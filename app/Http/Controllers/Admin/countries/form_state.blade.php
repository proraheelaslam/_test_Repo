

 	<div class="form-group">
	    {!! Form::label('name','Name', array('class' => 'control-label')) !!}
	    {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
<?php 
if(!isset($edit)){
?>

	<input type="hidden" name="country_id" value="<?=$country->id?>" />    
    <?php }?>
 
 

 <div class="form-group">
    {!! Form::submit(isset($country) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
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