@extends('admin.template.template')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->

            @include('admin/template/flash_messages')
            <div class="row">
                <div class="col-sm-6">
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a style="margin-bottom:10px;" class="btn btn-primary" href="{{url('admin/chats')}}">Back</a>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chat
                        </header>
                        <div class="panel-body">
                            <div class="chat-conversation">
                                <div id="scrollable" style="">
                                    <ul class="conversation-list" >
                                        @if(count($inboxData) > 0)
                                            @php  $fromId = $inboxData[0]->from_id;  $toId = $inboxData[0]->to_id;  @endphp
                                            @foreach($inboxData as $row)
                                                @if($row->from_id ==  $fromId)
                                                         <li   class="clearfix ">
                                                                <div class="chat-avatar">
                                                                    <img style="width: 100%; height: 100%" src="{{$row->from_user->fullImage}}" alt="male">
                                                                    <i>{{$row->message_time}}</i>
                                                                </div>
                                                            <div class="conversation-text">

                                                                <div class="ctext-wrap">
                                                                    <i>{{$row->from_user->name}}</i>
                                                                    <p> {!! nl2br($row->message) !!}
                                                                    </p>
                                                                </div>
                                                                <a data-placement="top" title="Delete Message" href="javascript:void(0);" onclick="delete_record('{{$row->id}}')" style="
                                                                        position: relative;
                                                                        top: -24px;

                                                                    "><i class="fa fa-trash-o"></i>
                                                                </a>
                                                            </div>
                                                         </li>
                                                @elseif($row->from_id ==  $toId)

                                                        <li {{$row->to_id }} class="clearfix odd">
                                                            <div class="chat-avatar">
                                                                <img style="width: 100%; height: 100%" src="{{$row->from_user->fullImage}}" alt="female">
                                                                <i>{{$row->message_time}}</i>
                                                            </div>
                                                            <div class="conversation-text">
                                                                <a data-placement="top" title="Delete Message" href="javascript:void(0);" onclick="delete_record('{{$row->id}}')" style="
                                                                        position: relative;
                                                                        top: -24px;

                                                                    "><i class="fa fa-trash-o"></i>
                                                                </a>
                                                                <div class="ctext-wrap">

                                                                    <i>{{$row->from_user->name}}</i>
                                                                    <p>
                                                                       {!! nl2br($row->message) !!}
                                                                    </p>
                                                                </div>

                                                            </div>
                                                        </li>

                                                    @endif
                                             @endforeach

                                        @endif


                                      </ul>

                            </div>
                        </div>
                        </div>
                    </section>
                </div>
            </div>

        </section>
    </section>
    <!--main content end-->

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmDelete" class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Confirm Delete</h4>
                </div>
                <div class="modal-body"> Are you sure you want to delete? </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn-delete"> Confirm</button>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">



        var delID = 0;
        function delete_record(del_id){
            delID = del_id;
            $("#confirmDelete").modal("show");
        }

        $("#btn-delete").click(function(e) {
            if(delID != 0){
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"} });
                $.ajax({
                    url: "{{URL::to('/')}}/admin/chats/delete_message/"+delID,
                    type: 'POST',  // user.destroy
                    data:{"csrf-token":"{{ csrf_token() }}" },
                    success: function(result) {
                        // Do something with the result
                        location.reload();
                    }
                });
            }
        });

    </script>
@endsection
