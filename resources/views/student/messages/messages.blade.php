<div class="chatBox_rightInnr">
    <div class="mobBack_chatBox"><a href="javascript:void(0)">{{Lang::get('label.Back')}}</a></div>
    <div class="chatBox_rb_titleHdng">

        <div class="chatBox_listInn">
            @if($message_data['inbox_thread']->from_id != Auth::user()->id)
                <div class="chatBox_listPic">

                    <span>
                        <img src="{{checkImage("students/".$message_data['inbox_thread']->from_user->image)}}" alt="#">
                    </span>

                </div>
                <div class="chatBox_lb_userName">
                    <h2>{{$message_data['inbox_thread']->from_user->name}}</h2>
                    <p>{{$message_data['inbox_thread']->from_user->about_student}}</p>
                </div>
            @else
                <div class="chatBox_listPic">

                    <span>
                        <img src="{{checkImage("students/".$message_data['inbox_thread']->from_user->image)}}" alt="#">
                    </span>

                </div>
                <div class="chatBox_lb_userName">
                    <h2>{{$message_data['inbox_thread']->from_user->name}}</h2>
                    <p>{{$message_data['inbox_thread']->from_user->about_student}}</p>
                </div>
            @endif
        </div>
    </div>

    <div class="chatBox_rightbR_scrolAble">
        <div class="chatBox_apendedMsg_out">
            <div class="chatBox_apendedMsg_Inn">
                <div class="chatBox_apendedMsg_box">
                    @if($message_data['inbox_messages'])
                        @foreach($message_data['inbox_messages'] as $row)
                            <?php $is_sender = '';?>
                            @if($row->from_id == Auth::user()->id)
                                <?php $is_sender = 'sender_message';?>
                            @endif
                            <div class="userMessage {{$is_sender}}">

                                <div class="userMessage_boxOut">
                                    <small class="userMessageTime">{{$row->message_time}}</small>
                                    <div class="userMessage_box_row">
                                        <div class="userMessage_box">
                                            <p>{!! nl2br(e($row->message)) !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="userMessage_sendrPicBox">
                                    <span class="userMessage_sendrPic"><img src="{{checkImage("students/".$row->from_user->image)}}" alt="#"></span>

                                </div>
                            </div>
                        @endforeach
                    @endif

                   {{-- <div class="isUser_typing">
                        <span class="userMessage_sendrPic"><img src="{{asset('public/front_assets/images/chatBox_lb_userPic2.png')}}" alt="#"></span>
                        <div class="isUser_typingLoadrBox">
                            <div id="three-circle-loader"></div>
                        </div>
                    </div>--}}

                </div>

            </div>

        </div>
    </div>
    <form class="form-horizontal" id="message_form" role="form" onsubmit="return false">
        {{ csrf_field() }}
        <div class="chatBox_typeMsg_hereOut">
            <div class="chatBox_typeMsg_hereArea">
                <textarea placeholder="{{Lang::get('label.Enter text here...')}}" name="message" id="message" onkeyup="make_enable_send()"></textarea>
                <input type="hidden" name="thread_id"  value="{{$message_data['inbox_thread']->id}}">
                <input class="chatBox_sendBtn disable_button" type="submit" value="{{Lang::get('label.Send')}}" id="send_btn">
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $('#message_form').submit(function(event){
            document.getElementById("send_btn").classList.add("disable_button");
            $.ajax({
                url: "{{ url('/student/post_message') }}",
                type: 'post',
                dataType:'html',   //expect return data as html from server
                data: $('#message_form').serialize(),
                success: function() {
                    getMessages({{$message_data['inbox_thread']->id}});
                }
            });
        });
        function make_enable_send() {
            var text =  $.trim($("#message").val());
            console.log(text);
            if(text!=''){
                document.getElementById("send_btn").disabled = false;
                document.getElementById("send_btn").classList.remove("disable_button");
            }else{
                document.getElementById("send_btn").disabled = true;
                document.getElementById("send_btn").classList.add("disable_button");
            }

        }
    </script>
</div>
