@extends('student.layout.auth')
@section('content')

    <main class="content">
        <section class="cp_course_main">
            <div class="auto_content">
                <div class="cp_course_heading"><strong>{{Lang::get('label.Search Courses')}}</strong>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                     <b>6 Aldus PageMaker including versions of Lorem Ipsum.</b>--}} </div>
                <div class="cp_course_inner">
                    <div class="cp_course_detail clearfix">
                        <div class="cp_course_left">
                            <div class="cp_course_left_inner">
                                <div class="cp_course_bar clearfix">
                                    <div class="cp_course_bar_left">
                                        <div class="cp_course_bar_text">
                                            <strong class="cp_total_cousrse">
                                                <span>{{Lang::get('label.Courses')}}</span>
                                            </strong>
                                            <strong class="cp_total_video_content">
                                                <span> {{Lang::get('label.video_tutorial')}} </span>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="cp_course_bar_right">
                                        <div class="cp_course_bar_filter">
                                            <div class="formRow clearfix">
                                                <div class="formCell col5">
                                                    <div class="search_select_out">
                                                        <select class="search_select checked_button_list"
                                                                data-name="latest" data-checked-type="order_by"
                                                                id="cp_course_sort_dropdown">
                                                            <option data-name="latest" data-checked-type="order_by"
                                                                    value="latest">{{Lang::get('label.Latest')}}</option>
                                                            <option data-name="old" data-checked-type="order_by"
                                                                    value="old">{{Lang::get('label.Oldest')}}</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="formCell col7">
                                                    <div class="form_field form_field_search cp_our_search_inner">
                                                        <input data-name="" data-checked-type="our_course" type="text"
                                                               placeholder="{{Lang::get('label.Search our courses')}}"
                                                               id="cp_course_search_box"
                                                               class=" hasCourseList_searchBar checked_button_list">
                                                        <button type="button"
                                                                class="search_our_courses_btn  cp_search_crs_chk"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cp_course_listing_inner">
                                    @include('student.pages.course_listing')
                                </div>
                            </div>

                        </div>
                        <div class="cp_course_right">
                            <div class="cp_accordion_main">
                                <div class="cp_accordion_title">

                                    <div class="search_select_out">

                                        <select class="search_select" id="search_category_dropDown">
                                            @foreach(getCategoryList() as $category)

                                                <option data-id="{{$category->id}}" data-category-type="main_category"
                                                        value="{{$category->name}}">{{$category->name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="cp_accordion">
                                    <div class="cp_accordion_scroll">
                                        <div class="cp_accordion_detail">
                                            <ul id="cp_categories_ul">


                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <a class="cp_seeMore_btn" href="javascript:void(0);">See More</a> </div>--}}
                                </div>
                            </div>
                            <div class="cp_accordion_main">
                               <div class="cp_accordion_title">
                                   <a  href="javascript:void(0);">{{Lang::get('label.Author')}}</a>
                               </div>
                               <div class="cp_accordion">
                                        <div class="cp_accordion_scroll">
                                            <div class="cp_accordion_detail">
                                                <ul>
                                                    @if(count($authors) > 0)
                                                        @foreach($authors as $author)
                                                            @if(!is_null($author->teacher_name ))
                                                                <li data-id="" data-name="{{$author->teacher_name}}"
                                                                    data-checked-type="author"
                                                                    class="checked_button_list">
                                                                    <div class="cp_accordion_check clearfix">
                                                                        <div class="form_checkbox">
                                                                            <label> {{ $author->teacher_name }}
                                                                                <input class="cp_author_list_chk"
                                                                                       type="radio" name="author">
                                                                                <span
                                                                                    class="checkbox_checked form_radio"></span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif


                                                </ul>
                                            </div>
                                        </div>
                                        {{--<a class="cp_seeMore_btn" href="javascript:void(0);">See More</a> </div>--}}
                                    </div>
                            </div>
                             <div class="cp_accordion_main">
                                    <div class="cp_accordion_title">
                                        <a href="javascript:void(0);">{{Lang::get('label.Price')}}</a>
                                    </div>
                                    <div class="cp_accordion">
                                        <div class="cp_accordion_scroll">
                                            <div class="cp_accordion_detail">
                                                <ul>
                                                    <li data-id="" data-name="free" data-checked-type="price"
                                                        class="checked_button_list">
                                                        <div class="cp_accordion_check clearfix">
                                                            <div class="form_checkbox">
                                                                <label> {{Lang::get('label.Free')}}
                                                                    <input class="cp_course_price_chk" type="radio"
                                                                           name="price">
                                                                    <span
                                                                        class="checkbox_checked form_radio"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li data-id="" data-name="paid" data-checked-type="price"
                                                        class="checked_button_list">
                                                        <div class="cp_accordion_check clearfix">
                                                            <div class="form_checkbox">
                                                                <label> {{Lang::get('label.Paid')}}
                                                                    <input class="cp_course_price_chk" type="radio"
                                                                           name="price">
                                                                    <span
                                                                        class="checkbox_checked form_radio"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                        {{--<a class="cp_seeMore_btn" href="javascript:void(0);">See More</a> </div>--}}
                                    </div>
                             </div>

                              <div class="cp_accordion_main">
                                        <div class="cp_accordion_title">
                                            <a href="javascript:void(0);">{{Lang::get('label.Skill level')}}</a>
                                        </div>
                                        <div class="cp_accordion">
                                            <div class="cp_accordion_detail">
                                                <ul>
                                                    <li data-id="1" data-name="beginner" data-checked-type="skill_level"
                                                        class="checked_button_list">
                                                        <div class="cp_accordion_check clearfix">
                                                            <div class="form_checkbox">
                                                                <label> {{Lang::get('label.Beginner')}}
                                                                    <input class="cp_skill_level_chk" type="checkbox">
                                                                    <span class="checkbox_checked"></span> </label>
                                                            </div>
                                                            {{--<em>(03)</em>--}} </div>
                                                    </li>
                                                    <li data-id="2" data-name="intermediate"
                                                        data-checked-type="skill_level" class="checked_button_list">
                                                        <div class="cp_accordion_check clearfix">
                                                            <div class="form_checkbox">
                                                                <label> {{Lang::get('label.Intermediate')}}
                                                                    <input class="cp_skill_level_chk" type="checkbox">
                                                                    <span class="checkbox_checked"></span> </label>
                                                            </div>
                                                            {{-- <em>(15)</em>--}} </div>
                                                    </li>
                                                    <li data-id="3" data-name="advanced" data-checked-type="skill_level"
                                                        class="checked_button_list">
                                                        <div class="cp_accordion_check clearfix">
                                                            <div class="form_checkbox">
                                                                <label>{{Lang::get('label.Advanced')}}
                                                                    <input class="cp_skill_level_chk" type="checkbox">
                                                                    <span class="checkbox_checked"></span> </label>
                                                            </div>
                                                            {{-- <em>(126)</em>--}} </div>
                                                    </li>
                                                    <li data-id="4" data-name="appropriate_for_all"
                                                        data-checked-type="skill_level" class="checked_button_list">
                                                        <div class="cp_accordion_check clearfix">
                                                            <div class="form_checkbox">
                                                                <label> {{Lang::get('label.Appropriate for all')}}
                                                                    <input class="cp_skill_level_chk" type="checkbox">
                                                                    <span class="checkbox_checked"></span> </label>
                                                            </div>
                                                            {{-- <em>(1,584)</em>--}} </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                              </div>

                                    <div class="cp_accordion_main">
                                        <div class="cp_accordion_title">
                                            <a href="javascript:void(0);">{{Lang::get('label.Rating')}}</a>
                                        </div>
                                        <div class="cp_accordion_title">
                                            <div class="search_select_out">
                                                <select class="search_select checked_button_list"
                                                        id="search_course_rating_dropDown">
                                                    <option value=""></option>
                                                    <option data-name="0-1" data-checked-type="rating" value="0-1">0-1
                                                    </option>
                                                    <option data-name="1-2" data-checked-type="rating" value="1-2">1-2
                                                    </option>
                                                    <option data-name="2-3" data-checked-type="rating" value="2-3">2-3
                                                    </option>
                                                    <option data-name="3-4" data-checked-type="rating" value="3-4">3-4
                                                    </option>
                                                    <option data-name="4-5" data-checked-type="rating" value="4-5">4-5
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="cp_accordion">
                                            <div class="cp_accordion_detail">
                                                <div class="cp_notSure">
                                                    <strong>{{Lang::get('label.Not sure?')}}</strong>
                                                    <p>{{Lang::get('label.Every course comes with a 30-day money-back guarantee')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    <div class="cp_about_more">
                        <div class="cp_course_heading">
                            <strong>{{Lang::get('label.more_about_category_label')}} </strong>
                        </div>
                        <p>{{Lang::get('label.more_about_category_text')}}</p>
                    </div>
                    <div class="cp_videos_main">
                        <div class="cp_course_heading"><strong>{{Lang::get('label.feature_video')}}</strong>
                            <p>{{Lang::get('label.feature_video_text')}}  </p>
                        </div>
                        <div class="vidos_list">
                            <ul>
                                @if(!is_null($featureContentLecture) && count($featureContentLecture) > 0)
                                    @foreach($featureContentLecture as $content)
                                        <li>
                                            <div class="video_box">
                                                <div class="video_box_inner"><a data-fancybox="video"
                                                                                href="{{$content->full_file_path}}"
                                                                                class="video"> <img
                                                            src="{{ asset('public/front_assets/images/video_banner.png') }}"
                                                            alt="#">
                                                        <video controls id="" style="display:none;" width="100%"
                                                               height="400">
                                                            <source src="{{$content->full_file_path}}" type="video/mp4">
                                                            </source>
                                                        </video>
                                                    </a></div>
                                                <div class="video_text"><strong>{{ $content->title  }}</strong>
                                                    <span>{{ $content->short_desc  }} </span></div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                        </div>



                </div>





        </section>
    </main>

@endsection
@section('javascript')
    <script>
        $(".search_select").select2({
            placeholder: "Please Select",
            allowClear: true,
        });
    </script>

@stop

