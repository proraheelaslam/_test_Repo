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
                                <strong>{{Lang::get("label.Dashboard")}}</strong>
                            </div>
                            <div class="stDb_navigations_menu">
                                <ul>
                                    <li><a href="javascript:void(0)">{{Lang::get("label.Home")}}</a></li>
                                    <li><span>{{Lang::get("label.Dashboard")}}</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="stDb_topCountrs_main">
                            <ul>
                                <li>
                                    <div class="stDb_topCountrs_box stDb_topCountrs_msg">
                                        <div class="stDb_topCountrs_text">
                                            <span>{{Lang::get("label.Messages")}}</span>
                                            <strong>{{$messages}}</strong>
                                        </div>
                                        <div class="stDb_topCountrs_icon">
                                            <i></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="stDb_topCountrs_box stDb_topCountrs_reviews">
                                        <div class="stDb_topCountrs_text">
                                            <span>{{Lang::get("label.Reviews")}}</span>
                                            <strong>{{$reviews}}</strong>
                                        </div>
                                        <div class="stDb_topCountrs_icon">
                                            <i></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="stDb_topCountrs_box stDb_topCountrs_course">
                                        <div class="stDb_topCountrs_text">
                                            <span>{{Lang::get("label.Courses")}}</span>
                                            <strong>{{$courses}}</strong>
                                        </div>
                                        <div class="stDb_topCountrs_icon">
                                            <i></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="stDb_topCountrs_box stDb_topCountrs_bookmarks">
                                        <div class="stDb_topCountrs_text">
                                            <span>{{Lang::get("label.Bookmarks")}}</span>
                                            <strong>{{$bookmarks}}</strong>
                                        </div>
                                        <div class="stDb_topCountrs_icon">
                                            <i></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>


                        <div class="stDb_profileNews_main clearfix">
                            <div class="stDb_profileNews_left">
                                <div class="stDb_profileNews_leftInner">
                                    <h4>{{Lang::get("label.Your Profile Views")}}</h4>
                                    <div class="stDb_profileNews_chartMain">
                                        <div class="stDb_profileNews_chart" id="month_views_chart">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stDb_profileNews_right">

                                <div class="stDb_profileNews_notifications">
                                    <h4 class="stDb_notif_heading">{{Lang::get("label.Notifications")}}</h4>
                                    <div class="stDb_profileNews_notifi_content">
                                        <div class="stDb_notif_listing">
                                            <ul>
                                                @if(!getUnreadNotification(3)->isEmpty())
                                                @foreach(getUnreadNotification(3)  as $row)
                                                    <li>
                                                        <a href="javascript:void(0)" onclick="read_notification('{{Hashids::encode($row->course_id)}}', '{{$row->id}}')">
                                                            <strong>{{$row->subject}}</strong>
                                                            <span>{{$row->notification}}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @else
                                                    <li><a href="javascript:void(0)">
                                                            <strong>{{Lang::get('label.No Record Found')}}</strong>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
    </main>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            get_views_report();
        }
        function get_views_report() {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});

            $.ajax({
                url :  '{{ url("student/views_report") }}',
                type: 'POST',
                data:{"csrf-token":"{{ csrf_token() }}"},
                success: function (result) {
                    var data = result.result;


                    Highcharts.chart('month_views_chart', {
                        title: {
                            text: ''
                        },
                        credits: {enabled: false},
                        chart: {
                            type: 'line'
                        },
                        xAxis: {
                            categories:data.months
                        },
                        yAxis: {
                            title: {
                                text: 'Views Count'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                            enabled: false
                        },
                        tooltip: {
                            enabled: false
                        },



                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: false
                                },
                            }
                        },
                        series: [{
                            name: 'Views',
                            color: 'rgba(0,100,0)',
                            data: data.views
                        }]
                    });

                }

            });

        }
    </script>
@endsection
