@extends('student.layout.auth')

@section('content')

    <main class="content">
        <section class="st_dashboard_main">
            @include('student.layout.header')

            <div class="st_dashboard_content">
                @include('student.layout.sidebar')
                <div class="stDb_right_content">
                    <div class="stDb_right_contentInner">

                        <div class="stDb_navigations clearfix">
                            <div class="stDb_navigations_left">
                                <strong>{{Lang::get('label.Edit Course')}}</strong>
                            </div>
                            <div class="stDb_navigations_menu">
                                <ul>
                                    <li><a href="javascript:void(0)">{{Lang::get('label.Home')}}</a></li>
                                    <li><span>{{Lang::get('label.Edit Course')}}</span></li>
                                </ul>
                            </div>
                        </div>

                        <form id="course_form"  name="course_form" role="form" method="post" action="{{ url('/student/courses/update')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}" >
                            <div class="st_settingsFormMain clearfix">
                                <div class="form_heading st_settingsForm_heading">
                                    <h4>{{Lang::get('label.Basic info')}}</h4>
                                </div>

                                <div class="st_settingsForm">
                                    @include('student.flash_message')
                                    <div class="formParent">
                                        <div class="formRow clearfix">
                                            <div class="formCell col6">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Course title')}}</strong>
                                                </div>
                                                <div class="form_field">
                                                    <input type="text" class="insEdit_form_courseTitle" name="course_title" value="{{old('course_title')?old('course_title'):$course->name}}">
                                                </div>
                                            </div>
                                            <div class="formCell col6">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Course price')}}</strong>
                                                </div>
                                                <div class="form_field">
                                                    <input type="number" step="0.0001" class="insEdit_form_coursePrice" name="course_price" value="{{old('course_price')?old('course_price'):$course->course_price}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formRow clearfix">
                                            <div class="formCell col6">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Course start')}}</strong>
                                                </div>
                                                <div class="form_field">
                                                    <input type="text" id="course_start" class="insEdit_form_courseStarts" name="course_start" value="{{old('course_start')?old('course_start'):$course->course_start}}">
                                                </div>
                                            </div>
                                            <div class="formCell col6">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Course expire')}}</strong>
                                                </div>
                                                <div class="form_field">
                                                    <input type="text" id="course_expire" class="insEdit_form_courseExpire" name="course_expire" value="{{old('course_expire')?old('course_expire'):$course->course_expire}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="formRow clearfix">
                                            <div class="formCell col6">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Teacher name')}}</strong>
                                                </div>
                                                <div class="form_field">
                                                    <input type="text" class="insEdit_form_courseStarts" name="teacher_name" value="{{old('teacher_name')?old('teacher_name'):$course->teacher_name}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Course picture')}}</strong>
                                                </div>
                                                <div class="form_field">
                                                    <div class="ins_uploadPic_box">
                                                        <span class="ins_uploadPic_box_text" id="uploadForm"></span>
                                                        <div id="ins_uploadPic_box_image"><img src="{{$course->fullImage}}" alt="#"></div>
                                                        <input type="file" name="course_picture" id="image" onchange="filePreview(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="formRow padding_btm_20 clearfix">
                                            <div class="formCell col12">
                                                <div class="form_checkbox loginRememberMe">
                                                    <label> {{Lang::get('label.Is Free?')}}
                                                        <input type="checkbox" name="is_free" id="is_free" value="{{old('is_free')?old('is_free'):$course->is_free}}" <? if(old('is_free')== 1){?>checked<?}else if($course->is_free==1){?>checked<?}?>>
                                                        <span class="checkbox_checked"></span> </label>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="form_heading st_settingsForm_heading">
                                    <h4>{{Lang::get('label.Description')}}</h4>
                                </div>
                                <div class="st_settingsForm">
                                    <div class="formParent">

                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Category')}}</strong>
                                                </div>
                                                <div class="search_select_out">
                                                    <select class="search_select " name="category" id="category" onchange="getSubCategory()">
                                                        <option value="">{{Lang::get('label.Please Select')}}</option>
                                                        @foreach(getCategoryList() as $row)
                                                            <option value="{{$row->id}}" <?php if($row->id==$course->category_id){?>selected<?}?>>{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Sub Category')}}</strong>
                                                </div>
                                                <div class="search_select_out">
                                                    <select class="search_select " name="sub_category" id="sub_category">
                                                        @foreach(getsubCategoryList($course->category_id) as $row)
                                                            <option value="{{$row->id}}" <?php if($row->id==$course->sub_category_id){?>selected<?}?>>{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Skills')}}</strong>
                                                </div>
                                                <div class="search_select_out">
                                                    <select class="search_select " name="course_skills" id="course_skills">
                                                        <option value="">{{Lang::get('label.Please Select')}}</option>
                                                        @foreach(getCourseList() as $key=>$row)
                                                            <option value="{{$key}}" <?php if($key==$course->course_skills){?>selected<?}?>>{{$row}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Course description')}}</strong>
                                                </div>
                                                <div class="form_field">
                                                    <textarea type="text" class="insEdit_form_desc" name="description" id="description">{{old('description')?old('description'):$course->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="formRow clearfix">
                                            <div class="formCell col12">
                                                <div class="form_heading">
                                                    <strong>{{Lang::get('label.Tags')}}</strong>
                                                </div>
                                                <div class="form_field">
                                                    <textarea type="text" class="insEdit_form_desc" name="tags" id="tags">{{old('tags')?old('tags'):$course->course_tags}}</textarea>
                                                </div>
                                                <p>Please add tags with ', '</p>
                                            </div>
                                        </div>

                                        <div class="ins_formVideos_main">
                                            <div class="ins_formVideos_tableMain">
                                                <div class="ins_formVideos_title">
                                                    <div class="ins_formVideos_row">
                                                        <div class="ins_formVideos_cell ins_formVideos_cell1">
                                                            <div class="form_heading">
                                                                <strong>{{Lang::get('label.Feature Key')}}</strong>
                                                            </div>
                                                        </div>
                                                        <div class="ins_formVideos_cell ins_formVideos_cell2">
                                                            <div class="form_heading">
                                                                <strong>{{Lang::get('label.Feature Value')}}</strong>
                                                            </div>
                                                        </div>
                                                        <div class="ins_formVideos_cell ins_formVideos_cell4">
                                                            <div class="form_heading">
                                                                <strong><br></strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ins_formVideos_appendAble" id="add_feature_div">
                                                    @if(count($course->course_features) > 0)
                                                        @foreach($course->course_features as $row)
                                                            <div class="ins_formVideos_appended_row">
                                                                <div class="ins_formVideos_row">
                                                                    <div class="ins_formVideos_cell ins_formVideos_cell1">
                                                                        <div class="form_field">
                                                                            <input type="hidden" name="feature_id[]" id="feature_id" value="{{$row->id}}">

                                                                            <input type="text" class="ins_formVideos_courseName_field" name="course_key[]" value="{{$row->feature_key}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="ins_formVideos_cell ins_formVideos_cell2">
                                                                        <div class="form_field">
                                                                            <input type="text" class="ins_formVideos_courseName_field" name="course_value[]" value="{{$row->feature_value}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="ins_formVideos_cell ins_formVideos_cell4">
                                                                        <a href="javascript:void(0)" class="ins_formVideos_delete_icon ins_formVideos_delClick"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="ins_formVideos_footer">
                                                <a class="all_buttons all_gray" href="javascript:void(0)" onclick="add_features()">{{Lang::get('label.Add Feature')}}</a>
                                            </div>
                                        </div>
                                </div>
                            </div>


                            <div class="form_heading st_settingsForm_heading"  style="padding-top: 20px;">
                                <h4>{{Lang::get('label.Videos')}}</h4>
                            </div>
                            <div class="st_settingsForm">
                                <div class="formParent">
                                    <div class="ins_formVideos_main">
                                        <div class="ins_formVideos_tableMain">
                                            <div class="ins_formVideos_title">
                                                <div class="ins_formVideos_row">
                                                    <div class="ins_formVideos_cell ins_formVideos_cell1">
                                                        <div class="form_heading">
                                                            <strong>{{Lang::get('label.Course Name')}}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="ins_formVideos_cell ins_formVideos_cell2">
                                                        <div class="form_heading">
                                                            <strong>{{Lang::get('label.Video Type')}}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="ins_formVideos_cell ins_formVideos_cell3">
                                                        <div class="form_heading">
                                                            <strong id="video_url_strong">{{Lang::get('label.Video URL/Browse')}}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="ins_formVideos_cell ins_formVideos_cell3">
                                                        <div class="form_heading">
                                                            <strong>{{Lang::get('label.Image Cover')}}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="ins_formVideos_cell ins_formVideos_cell4">
                                                        <div class="form_heading">
                                                            <strong><br></strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ins_formVideos_appendAble" id="add_item_div">
                                                @if(count($course->course_lectures))
                                                    @foreach($course->course_lectures as $row)
                                                        <div class="ins_formVideos_appended_row">
                                                            <div class="ins_formVideos_row">
                                                                <div class="ins_formVideos_cell ins_formVideos_cell1">
                                                                    <div class="form_field">
                                                                        <input type="hidden" name="lecture_id[]" id="lecture_id" value="{{$row->id}}">

                                                                        <input type="text" class="ins_formVideos_courseName_field" name="course_name[]" value="{{$row->title}}">
                                                                    </div>
                                                                </div>
                                                                <div class="ins_formVideos_cell ins_formVideos_cell2">
                                                                    <div class="search_select_out">
                                                                        <select class="search_select ins_formVideos_cat_sel" name="video_type[]" onchange="change_url_video(this)">
                                                                            <option>{{Lang::get('label.Please Select')}}</option>
                                                                            <option value="file" <?php if($row->file_type=='file'){?>selected<?}?>>{{Lang::get('label.File')}}</option>
                                                                            <option value="youtube" <?php if($row->file_type=='youtube'){?>selected<?}?>>{{Lang::get('label.Youtube')}}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="ins_formVideos_cell ins_formVideos_cell3" id="video_file">
                                                                    <div class="form_field">

                                                                        <input <?php if($row->file_type=='file'){?>style="display: none;"<?php }?> type="text" class="ins_formVideos_courseName_field"  name="video_url[]" id="video_url" value="<?php if($row->file_type=='youtube'){ echo $row->file_name;}?>">
                                                                        <input <?php if($row->file_type=='youtube'){?>style="display: none;"<?php }?> accept="video/*" type="file" class="ins_formVideos_courseName_field" name="video_url[]" id="video_file_img" value="<?php if($row->file_type=='file'){ echo $row->file_name;}?>">
                                                                    </div>

                                                                </div>

                                                                <div class="ins_formVideos_cell ins_formVideos_cell3">
                                                                    <div class="form_field">
                                                                        <input type="file" class="ins_formVideos_courseName_field" name="image_cover[]" value="{{$row->image_cover}}">
                                                                    </div>
                                                                </div>
                                                                <div class="ins_formVideos_cell ins_formVideos_cell4">
                                                                    <a href="javascript:void(0)" class="ins_formVideos_delete_icon ins_formVideos_delClick"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                        <div class="ins_formVideos_footer">
                                            <a class="all_buttons all_gray" href="javascript:void(0)" onclick="add_item()">{{Lang::get('label.Add Item')}}</a>
                                        </div>
                                    </div>

                                    <div class="form_heading st_settingsForm_heading">
                                        <h4>{{Lang::get('label.Live Streaming')}}</h4>
                                    </div>
                                    <div class="st_settingsForm" style="padding: 0px;">
                                        <div class="formParent">

                                            <div class="formRow padding_btm_20 clearfix">
                                                <div class="formCell col12">
                                                    <div class="form_checkbox loginRememberMe">
                                                        <label> {{Lang::get('label.I want to have live streaming sessions')}}
                                                            <input type="checkbox" name="is_live_stream" id="is_live_stream" value="{{old('is_live_stream')?old('is_live_stream'):$course->is_live_stream}}" <? if(old('is_live_stream')== 1){?>checked<?}else if($course->is_live_stream==1){?>checked<?}?>>
                                                            <span class="checkbox_checked"></span> </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="ins_formVideos_main">
                                                <div class="ins_formVideos_tableMain">
                                                    <div class="ins_formVideos_title">
                                                        <div class="ins_formVideos_row">
                                                            <div class="ins_formVideos_cell ins_formVideos_cell1">
                                                                <div class="form_heading">
                                                                    <strong>{{Lang::get('label.Start Date')}}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="ins_formVideos_cell ins_formVideos_cell2">
                                                                <div class="form_heading">
                                                                    <strong>{{Lang::get('label.Start Time')}}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="ins_formVideos_cell ins_formVideos_cell3">
                                                                <div class="form_heading">
                                                                    <strong id="video_url_strong">{{Lang::get('label.End Time')}}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ins_formVideos_appendAble">
                                                        <div class="ins_formVideos_appended_row">
                                                            <div class="ins_formVideos_row">
                                                                <div class="ins_formVideos_cell ins_formVideos_cell1">
                                                                    <div class="form_field">
                                                                        <input type="text" id="streaming_date" class="ins_formVideos_courseName_field" name="streaming_date" value="{{old('streaming_date')?old('streaming_date'):$course->streaming_date}}">
                                                                    </div>
                                                                </div>
                                                                <div class="ins_formVideos_cell ins_formVideos_cell2">
                                                                    <div class="form_field">
                                                                        <input type="text" id="start_streaming_time" class="ins_formVideos_courseName_field" name="start_streaming_time" value="{{old('start_streaming_time')?old('start_streaming_time'):date('h:i A',strtotime($course->start_streaming_time))}}">
                                                                    </div>
                                                                </div>
                                                                <div class="ins_formVideos_cell ins_formVideos_cell3" id="video_file">
                                                                    <div class="form_field">
                                                                        <input type="text" id="end_streaming_time" class="ins_formVideos_courseName_field" name="end_streaming_time" value="{{old('end_streaming_time')?old('end_streaming_time'):date('h:i A', strtotime($course->end_streaming_time))}}">
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="formRow clearfix">
                                        <div class="formCell col12">
                                            <button type="submit"  class="stSettings_formSaveBtn">{{Lang::get('label.Save')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{asset('public/front_assets/js/jquery-3.4.1.min.js')}}" type="text/javascript"></script>

        <link href="{{asset('public/front_assets/bs3/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/bootstrap_datepicker/css/bootstrap-datepicker.css')}}" />

        <script type="text/javascript" src="{{asset('public/front_assets/bootstrap_datepicker/js/bootstrap-datepicker.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/bootstrap-timepicker/css/timepicker.css')}}" />

        <script type="text/javascript" src="{{asset('public/front_assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>

        <script type="text/javascript">
            (function($){
                $('#course_start').datepicker({format: 'yyyy-mm-dd',autoclose: true,pickTime: false});
                $('#course_expire').datepicker({format: 'yyyy-mm-dd',autoclose: true,pickTime: false});
                $('#streaming_date').datepicker({format: 'yyyy-mm-dd',autoclose: true,pickTime: false});
                $('#start_streaming_time').timepicker({ autoclose: true,
                    minuteStep: 5,
                    showSeconds: false,
                    showMeridian: true,
                    defaultTime: 'value'});
                $('#end_streaming_time').timepicker({ autoclose: true,
                    minuteStep: 5,
                    showSeconds: false,
                    showMeridian: true,
                    defaultTime: 'value'});


            })(jQuery);
            $('.stSettings_formSaveBtn').click(function (e) {
                $('.stSettings_formSaveBtn').addClass('disable_button');
            })
            function filePreview(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#uploadForm').hide();
                        $('#uploadForm').parent('.ins_uploadPic_box').find('#ins_uploadPic_box_image').html('<img src="'+e.target.result+'" alt="#">');

                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function getSubCategory() {
                var category_id = $('#category option:selected').val();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
                $.ajax({
                    url: "{{URL::to('/')}}/student/courses/get_sub_category",
                    type: 'GET',  // user.destroy
                    data:{"csrf-token":"{{ csrf_token() }}", "category_id" : category_id},
                    success: function(result) {
                        $("#sub_category").html(result.data);

                    }
                });
            }
            function change_video_type(e) {
                if($(e). children("option:selected"). val()=="file"){
                    $(e).parents('.formParent').find('#video_url_strong').html("{{Lang::get('label.Browse')}}");
                }else if($(e). children("option:selected"). val()=="youtube"){
                    $(e).parents('.formParent').find('#video_url_strong').html("{{Lang::get('label.Video URL')}}");
                }else{
                    $(e).parents('.formParent').find('#video_url_strong').html("{{Lang::get('label.Video URL')}}");
                };

            }

            function change_url_video(e) {
                if($(e). children("option:selected"). val()=="file") {
                    $(e).closest('.ins_formVideos_appended_row').find('#video_file #video_url').hide();
                    $(e).closest('.ins_formVideos_appended_row').find('#video_file #video_file_img').show();
                }
                else if($(e). children("option:selected"). val()=="youtube"){
                    $(e).closest('.ins_formVideos_appended_row').find('#video_file #video_url').show();
                    $(e).closest('.ins_formVideos_appended_row').find('#video_file #video_file_img').hide();
                }
                else{
                    $(e).closest('.ins_formVideos_appended_row').find('#video_file #video_url').show();
                    $(e).closest('.ins_formVideos_appended_row').find('#video_file #video_file_img').hide();
                };
            }

            function add_item(){
                var html = '<div class="ins_formVideos_appended_row"><div class="ins_formVideos_row"><div class="ins_formVideos_cell ins_formVideos_cell1"><div class="form_field"><input type="text" class="ins_formVideos_courseName_field" name="course_name[]"></div></div><div class="ins_formVideos_cell ins_formVideos_cell2"><div class="search_select_out"><select class="search_select ins_formVideos_cat_sel" name="video_type[]" onchange="change_url_video(this)"><option>{{Lang::get('label.Please Select')}}</option><option value="file">{{Lang::get('label.File')}}</option><option value="youtube">{{Lang::get('label.Youtube')}}</option></select></div></div><div class="ins_formVideos_cell ins_formVideos_cell3" id="video_file"><div class="form_field"><input type="text" class="ins_formVideos_courseName_field" name="video_url[]" id="video_url"><input style="display: none;" accept="video/*" type="file" class="ins_formVideos_courseName_field" name="video_url[]" id="video_file_img"></div></div><div class="ins_formVideos_cell ins_formVideos_cell3"><div class="form_field"><input type="file" class="ins_formVideos_courseName_field" name="image_cover[]"></div></div><div class="ins_formVideos_cell ins_formVideos_cell4"><a href="javascript:void(0)" class="ins_formVideos_delete_icon ins_formVideos_delClick"></a></div></div></div>';
                $(".ins_formVideos_appendAble#add_item_div").append(html);
                $(".search_select").select2({
                    placeholder: "Please Select",
                    allowClear: true,
                });
            }

            function add_features() {
                var html = '<div class="ins_formVideos_appended_row"><div class="ins_formVideos_row"><div class="ins_formVideos_cell ins_formVideos_cell1"><div class="form_field"><input type="text" class="ins_formVideos_courseName_field" name="course_key[]"></div></div><div class="ins_formVideos_cell ins_formVideos_cell2"><div class="form_field"><input type="text" class="ins_formVideos_courseName_field" name="course_value[]"></div></div><div class="ins_formVideos_cell ins_formVideos_cell4"><a href="javascript:void(0)" class="ins_formVideos_delete_icon ins_formVideos_delClick"></a></div></div></div>';
                $(".ins_formVideos_appendAble#add_feature_div").append(html);
            }
        </script>


    </main>

@endsection
