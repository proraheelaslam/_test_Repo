
  {!! Form::hidden('parent_id',Hashids::decode($category_id)[0],['class'=>'form-control']) !!}                                   

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
        {!! Form::label('image','Upload Image', array('class' => 'control-label')) !!}
        (<span class="color-required"> for better result image size should be 1000KB.</span>)    
        <div class="controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                    <span class="btn btn-white btn-file">
                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" class="default" name="image" data-prev-id="prev_uploaded_img" multiple="multiple" accept="image/jpg,image/png,image/jpeg" value="" id="input_img" />
                    </span>
                    <img id="prev_uploaded_img" src="{{isset($subcategory->fullImage) ? $subcategory->fullImage : asset('public/uploads/noimage.png')}}" alt="your image" class="form-preview-img" />
                <span id="fileupload-preview" class="fileupload-preview" style="margin-left:5px;"></span>
                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
            </div>
        </div> 
    </div>
    
    <div class="form-group">
        {!! Form::submit(isset($subcategory) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right btn-loading']) !!}
        <a class="btn btn-danger pull-right mr-5 btn-loading" href="<?=URL::to('/') . '/admin/categories/'. $category_id?>">Cancel</a>
    </div>

    @include('admin/common/delete_modal')
    @section('scripts')

    <script type="text/javascript">

        $('#subcategory_form').validator('update');

    // var delID = 0;
    // function delete_record(del_id){
    //     delID = del_id;
    //     $("#confirmDelete").modal("show");
    // }

    // $(document).ready(function () {
    //     $("#btn-delete").click(function(e) {
    //         if(delID != 0){
    //             $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
    //             $.ajax({
    //                 url: "{{URL::to('/')}}/admin/categories/remove_image_category",
    //                 type: 'post',  // user.destroy
    //                 data:{"csrf-token":"{{ csrf_token() }}",'image_id':delID},
    //                 success: function(result) {
    //                 location.reload();
    //                 }
    //             });          
    //         }
    //     });
    // }); //..... end of ready() .....//

    // $("#chk").change( function() {
    //   if ( $(this).is(":checked") ) {
    //     // do something if a1 is checked
    //   $(this).val(1);
    //   } else if ( $(this).not(":checked") ) {
    //     // do something if a1 is unchecked
    //   $(this).val(0);
    //   }
    // });

    // function BrowseFile() {
    //         $("input[id='imaage']").click();
    //     }
    // function readImageURL(input)
    // {
    //         if (input.files && input.files[0]) {
    //             var reader = new FileReader();

    //             reader.onload = function (e) {
    //                 $('#new_image')
    //                     .attr('src', e.target.result)
    //                     .width(70)
    //                     .height(70);
    //             };
    //             reader.readAsDataURL(input.files[0]);
    //         }
    //     }    
    </script>
@endsection