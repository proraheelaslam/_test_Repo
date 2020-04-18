@extends('student.layout.auth')

@section('content')

    <main class="content">
        <section class="st_dashboard_main ins_course_main">
            @include('student.layout.header')

            <div class="st_dashboard_content">
                @include('student.layout.sidebar')
                <div class="stDb_right_content">
                    <div class="stDb_right_contentInner">

                        <div class="stDb_navigations clearfix">
                            <div class="stDb_navigations_left">
                                <strong>{{Lang::get('label.My Courses')}}</strong>
                            </div>
                            <div class="stDb_navigations_menu">
                                <ul>
                                    <li><a href="javascript:void(0)">{{Lang::get('label.Home')}}</a></li>
                                    <li><span>{{Lang::get('label.My Courses')}}</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="stMc_myCourse_main">
                            @if(Auth::user()->is_instructor==1)
                                <div class="stMc_myCourse_box">
                                <div class="stMc_myCourse_header">
                                    <div class="cp_course_bar clearfix">
                                        <div class="cp_course_bar_left">
                                            <div class="cp_course_bar_text"> <strong>{{Lang::get('label.Courses')}}</strong></div>
                                        </div>
                                        <div class="cp_course_bar_right">
                                            <div class="cp_course_bar_filter">
                                                <div class="formRow clearfix">
                                                    <div class="formCell col5">
                                                        <div class="search_select_out">
                                                            <select class="search_select" name="filter_by_date" onchange="filter_by_date(this)">
                                                                <option value=""></option>
                                                                <option value="newly_published">{{Lang::get('label.Newly published')}}</option>
                                                                <option value="latest">{{Lang::get('label.Latest')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="formCell col7">
                                                        <div class="form_field form_field_search">
                                                            <input type="text" placeholder="{{Lang::get('label.Search our courses')}}" name="filter_by_name" id="filter_by_name">
                                                            <button type="submit" onclick="filter_list()"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('student.flash_message')
                                </div>
                                <div class="stMc_myCourse_content">

                                    <div class="stMc_myCourse_list" id="course_listing_div">

                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="stMc_myCourse_box">
                                <div class="stMc_myCourse_header">
                                    <div class="cp_course_bar clearfix">
                                        <div class="cp_course_bar_left">
                                            <div class="cp_course_bar_text">
                                                <strong>{{Lang::get('label.My Courses')}}</strong>
                                            </div>
                                        </div>
                                        <div class="cp_course_bar_right">
                                            <div class="cp_course_bar_filter">
                                                <div class="formRow clearfix">
                                                    <div class="formCell col5">
                                                        <div class="search_select_out">
                                                            <select class="search_select" name="filter_by_course_date" onchange="filter_by_course_date(this)">
                                                                <option value=""></option>
                                                                <option value="latest">{{Lang::get('label.Latest')}}</option>
                                                                <option value="oldest">{{Lang::get('label.Oldest')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="formCell col7">
                                                        <div class="form_field form_field_search">
                                                            <input type="text" placeholder="{{Lang::get('label.Search our courses')}}" name="filter_by_course_name" id="filter_by_course_name">
                                                            <button type="submit" onclick="filter_course_list()"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('student.flash_message')
                                </div>
                                <div class="stMc_myCourse_content">

                                    <div class="stMc_myCourse_list" id="my_course_listing_div">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            var search_key = '';
            var filtered_key = '';
            var search_user_course_key = '';
            var filtered_user_course_key = '';


            window.onload = function() {
                filter_list();
                filter_course_list();
            }


            function filter_list() {
                search_key = $('#filter_by_name').val();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
                $.ajax({
                    url: "{{URL::to('/')}}/student/courses/search_course/",
                    type: 'GET',  // user.destroy
                    data:{"csrf-token":"{{ csrf_token() }}", "search_key" : search_key, "filtered_key" : filtered_key},
                    success: function(result) {

                        $("#course_listing_div").html(result.data);
                    }
                });
            }

            function filter_course_list() {
                search_user_course_key = $('#filter_by_course_name').val();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
                $.ajax({
                    url: "{{URL::to('/')}}/student/courses/search_my_course/",
                    type: 'GET',  // user.destroy
                    data:{"csrf-token":"{{ csrf_token() }}", "search_user_course_key": search_user_course_key, "filtered_user_course_key": filtered_user_course_key},
                    success: function(result) {
                        $("#my_course_listing_div").html(result.data);
                    }
                });
            }

            function filter_by_date(e) {
                filtered_key = $(e). children("option:selected"). val();
                filter_list();
            }
            function filter_by_course_date(e) {
                filtered_user_course_key = $(e). children("option:selected"). val();
                filter_course_list();
            }
            function delete_course(id) {

                $.ajax({
                    url: "{{URL::to('/')}}/student/courses/delete_course/"+id,
                    type: 'GET',  // user.destroy
                    success: function(result) {
                        console.log(result);
                        filter_list();
                        filter_course_list();
                         $.toast({
                            heading: '<?=Lang::get('messages.Success')?>',
                            text: '<?=Lang::get('messages.Course has been deleted successfully.')?>',
                            showHideTransition: 'slide',
                            icon: 'success',

                        });
                    }
                });
            }
        </script>
    </main>
@endsection
