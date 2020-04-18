

     <div class="form-group ">
      {!! Form::label('content_title','Content Title', array('class' => 'control-label')) !!}
      {!! Form::text('content_title',null,['class'=>'form-control','required' => 'required']) !!}
  </div>

  
  

                  <div class="form-group ">
                                                    
                                <label class=" control-label">Short Description</label>

                                    <textarea name="content_desc" id="content_desc" class="form-control" rows="4"><?=@$content->content_desc?></textarea>
                              

                            </div>
                            
                   <input name="course_id" value="<?=$course_id?>" type="hidden">        
    
                      

 <div class="form-group">
    {!! Form::submit(isset($content) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
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