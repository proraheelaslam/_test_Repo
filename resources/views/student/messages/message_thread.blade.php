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
                                <strong>{{Lang::get('label.Messages')}}</strong>
                            </div>
                            <div class="stDb_navigations_menu">
                                <ul>
                                    <li><a href="javascript:void(0)">{{Lang::get('label.Home')}}</a></li>
                                    <li><span>{{Lang::get('label.Messages')}}</span></li>
                                </ul>
                            </div>
                        </div>


                        <div class="stMsg_chatMain">
                            <div class="stMsg_chatLeft">
                                <div class="stMsg_chatLeftInner">
                                    <div class="stMsg_searchBox">
                                        <div class="form_field">
                                            <input type="text" placeholder="{{Lang::get('label.Search')}}" onkeyup="search_thread(this)">
                                        </div>
                                    </div>

                                    <div class="chatBox_listing" id="thread_div">


                                    </div>
                                </div>
                            </div>

                            <div class="chatBox_right active" id="messages_div">



                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <script type="text/javascript">
        var search_key ='';
        window.onload = function() {

            search_thread('', {{$id}});
        }

        function getMessages(id) {
            $('.stDb_notif_listing ul').find('.li_'+id).remove();
            $('.chatBox_listInn').removeClass('active');
            $('#thread_listInn_'+id).addClass('active');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/student/get_messages/",
                type: 'GET',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}", "thread_id" : id},
                success: function(result) {

                    $('#thread_'+id).html(0);
                    //search_thread('',id);

                    $("#messages_div").html(result.data);
                    //$('#thread_listInn_'+id).addClass('active');

                    $(".chatBox_rightbR_scrolAble").animate({
                        scrollTop: $('.chatBox_rightbR_scrolAble')[0].scrollHeight - $('.chatBox_rightbR_scrolAble')[0].clientHeight
                    }, 1000);

                }
            });
        }

        function search_thread(search_thread, id) {
            if(search_thread!=''){
                search_key = search_thread.value;
            }
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/student/search_thread/",
                type: 'GET',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}", "search_key" : search_key, "id" : id},
                success: function(result) {
                    $("#thread_div").html(result.data);
                }
            });
        }
    </script>
@endsection
