

<div class="form-group ">
    {!! Form::label('name','Course Name', array('class' => 'control-label')) !!}
    {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}
</div>
<div class="form-group ">
    {!! Form::label('price','course_price', array('class' => 'control-label')) !!}
    {!! Form::text('course_price',null,['class'=>'form-control','required' => 'required']) !!}
</div>
<div class="form-group ">
    {!! Form::label('course_start','Course Start', array('class' => 'control-label')) !!}
    {!! Form::text('course_start',null,['class'=>'form-control','required' => 'required', "id"=>"course_start"]) !!}
</div>
<div class="form-group ">
    {!! Form::label('course_expire','Course Expire', array('class' => 'control-label')) !!}
    {!! Form::text('course_expire',null,['class'=>'form-control', "id"=>"course_expire"]) !!}
</div>
<div class="form-group ">
    {!! Form::label('teacher_name','Teacher Name', array('class' => 'control-label')) !!}
    {!! Form::text('teacher_name',null,['class'=>'form-control','required' => 'required']) !!}
</div>
<div class="form-group ">
    {!! Form::label('is_free','Is Free', array('class' => 'control-label')) !!}
    <input type="checkbox" name="is_free" <?if($courses->is_free==1){?> checked <? }?>>
</div>
<div class="form-group">
    {!! Form::label('category_id','Category', array('class' => 'control-label')) !!}
    <select class="form-control" name="category_id" id="category" onchange="getSubCategory()">
        <?php
        foreach ($categories as $cat) {?>
        <option <?php if (@$courses->category_id== $cat->id) {?> selected <?php }?> value="{{$cat->id}}">{{$cat->name}}</option>
        <?php }?>
    </select>
</div>

<div class="form-group">
    {!! Form::label('sub_category','Sub Category', array('class' => 'control-label')) !!}
    <select class="form-control" name="sub_category_id" id="sub_category">
        <?php
        foreach(getsubCategoryList(@$courses->category_id) as $row){?>
        <option value="{{$row->id}}" <?php if($row->id==$courses->sub_category_id){?>selected<?}?>>{{$row->name}}</option>
        <?php }?>
    </select>
</div>

<div class="form-group">
    {!! Form::label('course_skills','Skills', array('class' => 'control-label')) !!}
    <select class="form-control" name="course_skills" >
        <?php
        foreach (getCourseList() as $key => $row) {?>
        <option <?php if (@$courses->course_skills == $key) {?> selected <?php }?> value="{{$key}}">{{$row}}</option>
        <?php }?>
    </select>
</div>
<div class="form-group ">
    {!! Form::label('description','Course Description', array('class' => 'control-label')) !!}
    {!! Form::textarea('description',null,['class'=>'form-control','required' => 'required']) !!}
</div>
<div class="form-group ">
    {!! Form::label('course_tags','Course Tags', array('class' => 'control-label')) !!}
    {!! Form::textarea('course_tags',null,['class'=>'form-control','required' => 'required']) !!}
</div>


<div class="form-group">

    {!! Form::label('image','Course Image', array('class' => 'control-label')) !!}

    <input type="file"  onchange="readImageURL(this);" onclick="BrowseFile()"  name="image" id="image" accept="image/*">
    @if ($errors->has('image'))
        <span  class="help-block">{{ $errors->first('image') }}</span>
    @endif
    <?php if(@$courses->image!=''){ ?>
    <img src="{{@$courses->fullImage}}" width="70" height="70" id="new_image"  >

    <a  onclick="delete_record(<?=@$courses->id?>)" href="javascript:;">Remove Image</a>
    <?php }
    else{?>
    <img name="image" style="width: 70px; height: 70px;" onclick="BrowseFile()" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
    <?php } ?>

</div>


<div class="form-group">
    {!! Form::submit(isset($courses) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>


@section('scripts')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        (function($){
            $('#course_start').datepicker({dateFormat: 'yy-mm-dd'});
            $('#course_expire').datepicker({dateFormat: 'yy-mm-dd'});
        })(jQuery);
        $('#client_form').validator('update');
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        $(document).ready(function () {

            $( "#registartion_date" ).datepicker();
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
        function getSubCategory() {

            var category_id = $('#category option:selected').val();
            $.ajax({
                url: "{{URL::to('/')}}/admin/courses/get_sub_category",
                type: 'POST',  // user.destroy
                data:{ "category_id" : category_id},
                success: function(result) {

                    var subcate = result.data;
                    var html = '';
                    var i;
                    var length = subcate.key.length;
                    for (i = 0; i < length; i++) {
                        html+='<option name="sub_category_id" value = "'+subcate.key[i]+'" >'+subcate.value[i]+'</option>';
                    }

                    $("#sub_category").html(html);

                }
            });
        }
    </script>
    <script>

    </script>
@endsection
