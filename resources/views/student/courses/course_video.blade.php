@extends('student.layout.auth')

@section('content')
    <? ?>
    <main class="content">
        <section class="cp_course_main cp_courseDetail_main cp_streaming_main">
            <div class="auto_content">
                <div class="cp_course_heading"> <strong>{{$course['name']}}</strong>
                    <p>{{$course['instructor_detail']['name']}}</p>
                </div>

                <div class="cp_course_inner">
                    <div class="cp_course_detail clearfix">
                        <div class="cp_course_left">
                            <div class="cp_course_left_inner">
                                <div class="cp_course_preview_main">
                                    <div class="cp_course_preview" id="previewed_video">
                                        @if(count($course->course_lectures)>0)
                                            @if($course->course_lectures[0]->file_type=='youtube')
                                                <iframe src="{{$course->course_lectures[0]->file_name}}" width="900" height="384" frameborder="0" allowfullscreen></iframe>
                                            @else
                                                <video controls>
                                                    <source src="{{$course->course_lectures[0]->full_file_path}}" type="video/mp4" />
                                                    {{Lang::get('label.Your browser does not support HTML5 video.')}}
                                                </video>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="cp_course_tabs">

                                    <div class="cp_course_tabs_inner">
                                        <div class="cp_course_tabs_box">
                                            <div class="cp_course_tabs_overview">
                                                <div class="cp_course_tabs_heading">
                                                    <h3>{{Lang::get('label.Overview')}}</h3>
                                                </div>
                                                <div class="cp_course_discription">
                                                    <h4>{{Lang::get('label.Course Description')}}</h4>
                                                    <p>{{$course['description']}}</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="cp_course_tabs_box">
                                            <div class="cp_course_tabs_overview">
                                                <div class="cp_course_tabs_heading">
                                                    <h3>{{Lang::get('label.Q & A')}}</h3>
                                                </div>
                                                <div class="cp_rewiew_rate">
                                                    <div class="cp_rewiew_rateStar clearfix">
                                                        <span>{{Lang::get('label.Ask Questions regrading this course')}}</span>
                                                    </div>
                                                </div>
                                                <div class="cp_rewiew_rate_form">
                                                    <div class="qa_search">
                                                        <input id="question_searchBar" type="search" placeholder="{{Lang::get('label.Search all Course questions')}}">
                                                        <button type="submit" onclick="getAnswer()" ></button>
                                                    </div>
                                                    <div class="titleSrchSmry_show">
                                                     </div>
                                                    <div class="formRow clearfix">
                                                        <div class="formCell col12">
                                                            <div class="form_heading"> <strong>{{Lang::get('label.Title or summary')}}</strong> </div>
                                                            <div class="form_field">
                                                                <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                                                <input type="text" name="question" id="question" value="" onkeyup="make_enable_send()">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="formRow clearfix">
                                                        <div class="formCell col12">
                                                            <div class="form_heading"> <strong>{{Lang::get('label.Details (optional)')}}</strong> </div>
                                                            <div class="form_field">
                                                                <textarea name="answer" id="answer" onkeyup="make_enable_send()"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cp_publish_btn">
                                                        <button class="all_buttons btn_rounded disable_button" type="submit" id="save_answer_btn" disabled>{{Lang::get('label.Publish')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($course->featured_videos) && count($course->featured_videos)>0)
                            <div class="cp_videos_main">
                                <div class="cp_course_heading"> <strong>{{Lang::get('label.Featured Videos')}}</strong>
                                    <p></p>
                                </div>
                                <div class="vidos_list">
                                    <ul>
                                        @foreach($course->featured_videos as $row)
                                                <li>
                                                    <div class="video_box">
                                                        <div class="video_box_inner">
                                                            @if($row->file_type=='youtube')
                                                                <a data-fancybox="video" href="{{$row->file_name}}" class="video">
                                                             @else
                                                                <a data-fancybox="video" href="{{$row->full_file_path}}" class="video">
                                                             @endif
                                                                <img src="{{$row->full_image}}" alt="#">
                                                                <video controls id="" style="display:none;" width="100%" height="400">
                                                                    @if($row->file_type=='youtube')
                                                                        <source src="{{$row->file_name}}" type="video/mp4" />
                                                                    @else
                                                                        <source src="{{$row->full_file_path}}" type="video/mp4" />
                                                                    @endif
                                                                </video>
                                                             </a>
                                                        </div>
                                                        <div class="video_text"> <strong>{{$row->title}}</strong> <span></span> </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="cp_course_right">
                            <div class="cp_course_right_box">
                                <div class="cvs_detail">
                                    <div class="cvs_detail_title">
                                        <div class="cvs_detail_row">
                                            <div class="cvs_detail_cell cvs_cell_1">
                                                <div class="cvs_detail_text">
                                                    <strong>{{Lang::get('label.Course Content')}}</strong>
                                                </div>
                                            </div>
                                            <div class="cvs_detail_cell cvs_cell_2">
                                                <div class="cvs_detail_text">
                                                    <span>{{$course['total_lecture_content']}}  {{Lang::get('label.Lectures')}}</span>
                                                </div>
                                            </div>
                                            <div class="cvs_detail_cell cvs_cell_2">
                                                <div class="cvs_detail_text">
                                                    <span>{{$course['total_lecture_time']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cvs_detail_content">
                                        <ul>
                                            @if($course->course_lectures)
                                                <?php $count = 0;?>
                                                @foreach($course->course_lectures as $row)

                                                    <?php $count = $count+1;?>
                                                    <li>
                                                        <div class="cvs_detail_inner">
                                                            <div class="cvs_detail_row">
                                                                <div class="cvs_detail_cell cvs_cell_1">
                                                                    <div class="cvs_detail_text">
                                                                        <a class="cvs_lec_icon" href="javascript:void(0);">{{Lang::get('label.Lecture')}} {{$count}}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="cvs_detail_cell cvs_cell_2">
                                                                    <div class="cvs_detail_text">
                                                                        @if($count>1 && $course->student_id!=Auth::user()->id && $course->course_status!='Completed')
                                                                        <a class="text_right" href="javascript:void(0);">{{Lang::get('label.Preview After Purchasing')}}</a>
                                                                        @else
                                                                        <a class="text_right" href="javascript:void(0);" onclick="preview_video('{{$row->file_name}}', '{{$row->file_type}}', '{{$row->full_file_path}}')">{{Lang::get('label.Preview')}}</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="cvs_detail_cell cvs_cell_2">
                                                                    <div class="cvs_detail_text">
                                                                        <span>{{$row->lecture_time}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="cvs_detail_row">
                                                                <div class="cvs_detail_cell cvs_cell_3">
                                                                    <div class="cvs_detail_text">
                                                                        <p>{{$row->title}}</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

        <script type="text/javascript">



            let questionData = {!!  $all_questions !!} ;
            let prseQuestion = JSON.parse(JSON.stringify((questionData)));
            let QuestionDataList = [];

            if(prseQuestion.length > 0) {
                for(let c = 0; c < prseQuestion.length; c++ ){
                    let single = prseQuestion[c];
                    let name = single.question;
                    QuestionDataList.push(name);
                }
            };
            jQuery(function(){

                jQuery('#question_searchBar').autocomplete({
                    source: QuestionDataList
                });

            });




            function preview_video(file_name, file_type, file_full_path){
                var video_path = file_full_path;
                var html = '';
                if(file_type=='youtube'){
                    video_path = file_name;

                    html = '<iframe src="'+video_path+'" width="900" height="384" frameborder="0" allowfullscreen></iframe>';

                }else{
                    video_path = file_full_path;
                    html = '<video controls><source src="'+video_path+'" type="video/mp4" /></video>';
                }
                $("#previewed_video").html(html);

                console.log(file_name+'***'+file_type+'***'+file_full_path);
            }

            function getAnswer() {
                var id = {{$course->id}};

                var question = $('#question_searchBar').val();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
                $.ajax({
                    url: "{{URL::to('/')}}/student/courses/get_answer/",
                    type: 'GET',  // user.destroy
                    data:{"csrf-token":"{{ csrf_token() }}", "question" : question, "id": id},
                    success: function(result) {
                        var data = result.data;
                        console.log(data);
                        var html = '<strong>'+data.question+'</strong><p>'+data.answer+'</p>';
                        $('.titleSrchSmry_show').html(html);

                    }
                });
            }
            function make_enable_send(){
                var question =  $.trim($("#question").val());
                var answer =  $.trim($("#answer").val());
                if(question!='' && answer!=''){
                    document.getElementById("save_answer_btn").disabled = false;
                    document.getElementById("save_answer_btn").classList.remove("disable_button");
                }else{
                    document.getElementById("save_answer_btn").disabled = true;
                    document.getElementById("save_answer_btn").classList.add("disable_button");
                }
            }
        $('#save_answer_btn').click(function (e) {
            var course_id = $('#course_id').val();
            var question = $('#question').val();
            var answer = $('#answer').val();
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/student/courses/save_answer/",
                type: 'GET',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}", "question" : question, "course_id": course_id, "answer": answer},
                success: function(result) {
                    $.toast({
                        heading: '<?=Lang::get('messages.Success')?>',
                        text: '<?=Lang::get('messages.Question Answer has been posted successfully.')?>',
                        showHideTransition: 'slide',
                        icon: 'success',

                    });
                    setTimeout(function(){ window.location.reload() }, 3000);
                }
            });
        })
        </script>
    </main>
@endsection
