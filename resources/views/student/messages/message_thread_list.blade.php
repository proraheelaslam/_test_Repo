<ul>
    @if($messages['messages'])
        @if($messages['search_key'] != '')
            @foreach($messages['messages'] as $row)
                @if(isset($row->is_shown) )
                    <li onclick="getMessages({{$row->id}})">
                        <div class="chatBox_listInn">
                            <div class="chatBox_listPic">
                                <span>
                                    @if($row->from_id!=Auth::user()->id)
                                        <img src="{{$row->from_user['thumbImage']}}" alt="#">
                                    @else
                                        <img src="{{$row->to_user['thumbImage']}}"  alt="#">
                                    @endif
                                </span>
                                @if($row->from_id!=Auth::user()->id)
                                    @if($row->from_user['is_online']==1)
                                        <small class="chatBox_status online"></small>
                                    @else
                                        <small class="chatBox_status offline"></small>
                                    @endif
                                @else
                                    @if($row->to_user['is_online']==1)
                                        <small class="chatBox_status online"></small>
                                    @else
                                        <small class="chatBox_status offline"></small>
                                    @endif
                                @endif

                            </div>
                            <div class="chatBox_lb_userName">
                                @if($row->from_id!=Auth::user()->id)
                                    <h2>{{$row->from_user['name']}}</h2>
                                @else
                                    <h2>{{$row->to_user['name']}}</h2>
                                @endif

                                @if(isset($row->last_message) && count($row->last_message)>0)
                                    <p>{{$row->last_message[0]->message}}</p>
                                @else
                                    <p></p>
                                @endif
                            </div>
                            <div class="chtBox_pendingMsg" id="thread_{{$row->id}}">{{$row->count_unread_messages}}</div>
                        </div>
                    </li>
                @endif
            @endforeach
        @else
            @foreach($messages['messages'] as $row)
                <li onclick="getMessages({{$row->id}})">
                    <div class="chatBox_listInn" id="thread_listInn_{{$row->id}}">
                        <div class="chatBox_listPic">
                            <span>
                                @if($row->from_id!=Auth::user()->id)
                                    <img src="{{$row->from_user['thumbImage']}}" alt="#">
                                @else
                                    <img src="{{$row->to_user['thumbImage']}}" alt="#">
                                @endif
                            </span>
                            @if($row->from_id!=Auth::user()->id)
                                @if($row->from_user['is_online']==1)
                                    <small class="chatBox_status online"></small>
                                @else
                                    <small class="chatBox_status offline"></small>
                                @endif
                            @else
                                @if($row->to_user['is_online']==1)
                                    <small class="chatBox_status online"></small>
                                @else
                                    <small class="chatBox_status offline"></small>
                                @endif
                            @endif

                        </div>
                        <div class="chatBox_lb_userName">
                            @if($row->from_id!=Auth::user()->id)
                                <h2>{{$row->from_user['name']}}</h2>
                            @else
                                <h2>{{$row->to_user['name']}}</h2>
                            @endif
                            @if(isset($row->last_message) && count($row->last_message)>0)
                            <p>{{str_limit($row->last_message[0]->message,25)}}</p>
                            @else
                            <p></p>
                            @endif
                        </div>
                        <div class="chtBox_pendingMsg"  id="thread_{{$row->id}}">{{$row->count_unread_messages}}</div>
                    </div>
                </li>
            @endforeach
        @endif
    @endif
        <script type="text/javascript">
            var thread_id = "{{$messages['thread_id']}}";
            console.log(thread_id);

         </script>
</ul>
