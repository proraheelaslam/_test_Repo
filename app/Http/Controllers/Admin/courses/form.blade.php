

     <div class="form-group ">
      {!! Form::label('name','Course Name', array('class' => 'control-label')) !!}
      {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}
  </div>

  
     <div class="form-group ">
      {!! Form::label('course_code','Course Code', array('class' => 'control-label')) !!}
      {!! Form::text('course_code',null,['class'=>'form-control','required' => 'required']) !!}
  </div>

       
        
 
    
    <div class="form-group">
     {!! Form::label('category_id','Category', array('class' => 'control-label')) !!}
	     <select class="form-control" name="category_id">

                              <?php
foreach ($categories as $cat) {?>

                            <option <?php if (@$courses->class_id == $cat->id) {?> selected <?php }?> value="{{$cat->id}}">{{$cat->name}}</option>
                           <?php }?>
                          </select>                            
	</div>

    
    
    	<div class="form-group">
     {!! Form::label('class_id','Class', array('class' => 'control-label')) !!}
	     <select class="form-control" name="class_id">

                              <?php
foreach ($classes as $classrow) {?>

                            <option <?php if (@$students->class_id == $classrow->id) {?> selected <?php }?> value="{{$classrow->id}}">{{$classrow->name}}</option>
                           <?php }?>
                          </select>                            
	</div>




	<div class="form-group">
     {!! Form::label('grade_id','Grade', array('class' => 'control-label')) !!}
	     <select class="form-control" name="grade_id">

                              <?php
foreach ($grades as $graderow) {?>

                            <option <?php if (@$students->grade_id == $graderow->id) {?> selected <?php }?> value="{{$graderow->id}}">{{$graderow->name}}</option>
                           <?php }?>
                          </select>                            
	</div>



	<div class="form-group">
     {!! Form::label('school_id','School', array('class' => 'control-label')) !!}
	     <select class="form-control" name="school_id">

                              <?php
foreach ($schools as $schoolrow) {?>

                            <option <?php if (@$courses->school_id == $schoolrow->id) {?> selected <?php }?> value="{{$schoolrow->id}}">{{$schoolrow->name}}</option>
                           <?php }?>
                          </select>                            
	</div>
    
    

                  <div class="form-group ">
                                                    
                                <label class=" control-label">Short Description</label>

                                    <textarea name="short_desc" id="short_desc" class="form-control" rows="4"><?=@$courses->short_desc?></textarea>
                              

                            </div>
                            
                              <div class="form-group ">
                                                    
                                <label class=" control-label">Course Includes</label>

                                    <textarea name="course_includes" id="course_includes" class="form-control" rows="4"><?=@$courses->course_includes?></textarea>
                              

                            </div>
                            
                              <div class="form-group ">
                                                    
                                <label class=" control-label">Course Requirments</label>

                                    <textarea name="course_requirement" id="course_requirement" class="form-control" rows="4"><?=@$courses->course_requirement?></textarea>
                              

                            </div>
    
                      

 <div class="form-group">
    {!! Form::submit(isset($courses) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>


@section('scripts')


       

<script type="text/javascript">

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
</script>
<script>
  
</script>
@endsection