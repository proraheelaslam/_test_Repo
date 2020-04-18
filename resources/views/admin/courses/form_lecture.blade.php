
<div class="form-group ">
    {!! Form::label('title','Lecture Title', array('class' => 'control-label')) !!}
    {!! Form::text('title',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="row">
    <div class="form-group">
        <div class="radio">
            <label>
                <input name="file_type" onchange="show_panel(this.value)" id="optionsRadios1" value="file" type="radio" <?if(@$lecture->file_type=='file'){?> checked<? }?>>
                File
            </label>
        </div>
        <div class="radio">
            <label>
                <input name="file_type" onchange="show_panel(this.value)" id="optionsRadios1" value="youtube" type="radio" <?if(@$lecture->file_type=='youtube'){?>checked<? }?>>
                Youtube
            </label>
        </div>
    </div>
</div>


<div class="row" id="document_div"  <?php if(@$lecture->file_type=='file'){ ?> style="display: block;"<?php }else{?> style="display: none;"<?php  } ?>>
    <div class="form-group ">
        <div class="form-group col-md-6">
            {!! Form::label('image','Video',['class'=>'control-label']) !!}
            <input type="file" class="form-control" name="file_name" />
            @if ($errors->has('file'))
                <span  class="help-block">{{ $errors->first('file') }}</span>
            @endif
            <?php if(@$lecture->file_type=='file'){ ?>
            <a href="{{@$lecture->full_file_path}}"><?=@$lecture->file_name?></a>
            <? }?>
        </div>
    </div>
</div>

<div class="row" id="video_audio_div"  <?php if(@$lecture->file_type=='youtube'){ ?> style="display: block;"<?php }else{?> style="display: none;"<?php  } ?>>

    <div class="form-group ">
        {!! Form::label('file_name','Youtube Url', array('class' => 'control-label')) !!}
        {!! Form::text('file_name',null,['class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('image_cover','Image Cover', array('class' => 'control-label')) !!}
    <input type="file"  onchange="readImageURL(this);" onclick="BrowseFile()"  name="image_cover" id="image" accept="image/*">
    @if ($errors->has('image_cover'))
        <span  class="help-block">{{ $errors->first('image') }}</span>
    @endif
    <?php if(@$lecture->image_cover!=''){ ?>
    <div class="form_upload_img" style="margin-top: 10px;">
        <img src="{{@$lecture->full_image}}" width="70" height="70" id="new_image"  >
    </div>
    <?php }
    else{?>
    <img name="image_cover" style="width: 70px; height: 70px;" onclick="BrowseFile()" src="{{asset('public/admin_assets/images/upload.png')}}" alt="#" id="new_image">
    <?php } ?>
</div>

<input name="lecture_id" value="<?=@$lecture->id?>" type="hidden">

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
