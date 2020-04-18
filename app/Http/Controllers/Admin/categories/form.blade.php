
 <div class="form-group">
	    {!! Form::label('name','Name English', array('class' => 'control-label')) !!}
	    {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>

	<div class="form-group">
	    {!! Form::label('name_ru','Name Russian', array('class' => 'control-label')) !!}
	    {!! Form::text('name_ru',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>

 	<div class="form-group ">
	    {!! Form::label('name_iw','Name Hebrew', array('class' => 'control-label')) !!}
	    {!! Form::text('name_iw',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
     
   <div class="form-group ">
	    {!! Form::label('name_el','Name Greek', array('class' => 'control-label')) !!}
	    {!! Form::text('name_el',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
   
 
  <div class="form-group">    
    {!! Form::label('image','Category Image', array('class' => 'control-label')) !!}
    <input type="file"  onchange="readImageURL(this);" onclick="BrowseFile()"  name="image" id="image" accept="image/*">
    @if ($errors->has('image'))
      <span  class="help-block">{{ $errors->first('image') }}</span>
    @endif
    <?php if(@$categories->image!=''){ ?>	
    <div class="form_upload_img">	
      <img src="{{asset('public/uploads/category/'.@$categories->image)}}" width="70" height="70" id="new_image"  >
      <a  onclick="delete_record(<?=@$categories->id?>)" href="javascript:;">Remove Image</a>
    </div>
    <?php }
      else{?>
        <img name="image" style="width: 70px; height: 70px;" onclick="BrowseFile()" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
    <?php } ?>
  </div>

  <div class="form-group">
      {!! Form::submit(isset($categories) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right btn-loading']) !!}
  </div>

@include('admin/common/delete_modal')
@section('scripts')

<script type="text/javascript">
  var delID = 0;
  function delete_record(del_id){
    delID = del_id;
    $("#confirmDelete").modal("show");
  }

  $(document).ready(function () {
    $("#btn-delete").click(function(e) {
        if(delID != 0){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/admin/categories/remove_image_category",
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}",'image_id':delID},
                success: function(result) {
                location.reload();
                }
            });
        }
    });
  }); //..... end of ready() .....//

    $('#category_form').validator('update');

  // $("#chk").change( function() {
  //   if ( $(this).is(":checked") ) {
  //     // do something if a1 is checked
  //   $(this).val(1);
  //   } else if ( $(this).not(":checked") ) {
  //     // do something if a1 is unchecked
  //   $(this).val(0);
  //   }
  // });

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