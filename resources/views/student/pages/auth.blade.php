<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/jquery.fancybox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/jquery-toast-plugin-master/src/jquery.toast.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/jquery.raty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/responsive.css')}}">
    <link rel="shortcut icon" href="{{asset('public/front_assets/images/fav/favicon.ico')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/dev-style.css')}}">

    <script>
        var APP_URL = "{{ url('/') }}";
        var ASSET_PATH = "{{ asset('public/uploads') }}";


    </script>
</head>
<body>
<?php $allCourses = getCoursesList();?>
@if(@Auth::guard('student')->user())
    <div class="wrapper loggedIn">
        @else
            <div class="wrapper">
                @endif
                <header class="header">
                    <div class="nav_languages">
                        <div class="nav_languages_dropdown" title="{{Lang::get('label.Select Language')}}">
                            <div class="nav_languages_sel">
                    <span>
                        @if(\App::getLocale()== 'en')
                            <img src="{{asset('public/front_assets/images/english_active.png')}}" alt="#">
                        @elseif(\App::getLocale()== 'gr')
                            <img src="{{asset('public/front_assets/images/greek_active.png')}}" alt="#">
                        @else
                            <img src="{{asset('public/front_assets/images/russian_active.png')}}" alt="#">
                        @endif
                    </span>
                            </div>
                            <ul>
                                <li>
                                    <a class="@if(\App::getLocale()== 'en') active @endif" href="javascript:void(0)" onclick="select_lang('en')" title="{{Lang::get('label.English')}}">
                                        <img src="{{(\App::getLocale()== 'en')?asset('public/front_assets/images/english_active.png'):asset('public/front_assets/images/english_inactive.png')}}" alt="#">

                                        <em>{{Lang::get('label.English')}}</em>
                                    </a>
                                </li>
                                <li>
                                    <a class="@if(\App::getLocale()== 'gr') active @endif" href="javascript:void(0)" onclick="select_lang('gr')" title="{{Lang::get('label.Greek')}}">
                                        <img src="{{(\App::getLocale() == 'gr')?asset('public/front_assets/images/greek_active.png'):asset('public/front_assets/images/greek_inactive.png')}}" alt="#">
                                        <em>{{Lang::get('label.Greek')}}</em>
                                    </a>
                                </li>
                                <li>
                                    <a class="@if(\App::getLocale()== 'ru') active @endif"href="javascript:void(0)" onclick="select_lang('ru')" title="{{Lang::get('label.Russian')}}">
                                        <img src="{{(\App::getLocale() == 'ru')?asset('public/front_assets/images/russian_active.png'):asset('public/front_assets/images/russian_inactive.png')}}" alt="#">

                                        <em>{{Lang::get('label.Russian')}}</em>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="caret caret_mobile" style="display:none;">
                        <a href="{{url('courses/cart')}}">
                            <img src="{{asset('public/front_assets/images/caret.png')}}" alt="#"><i>{{ getTotalCartItems() }}</i>
                        </a>
                    </div>
                    <div class="search_icon_mobile" style="display:none;">

                    </div>
                    <div class="header_search_main header_search_mobile" style="display:none;">
                        <div class="header_search">
                            <input  class="input_search_bar_resp" type="search" placeholder="{{Lang::get('label.I want to learn about...')}}">
                            <button   class="search_btn_resp" data-search-type="header_bar"  type="submit"></button>
                        </div>
                    </div>
                    <div class="auto_content">
                        <div class="header_main clearfix">
                            <div class="logo">
                                <a href="{{url('/home')}}">
                                    <img src="{{asset('public/front_assets/images/logo.png')}}" alt="#">
                                </a>
                            </div>
                            <div class="menuIcon"></div>

                            <div class="header_inner">
                                <div class="menu_close">x</div>
                                <div class="header_detail">
                                    <div class="header_left">
                                        <div class="header_left_inner">
                                            <div class="header_category_main">
                                                <a class="header_category_btn" href="javascript:void(0);">{{Lang::get('label.Categories')}}</a>
                                                <div class="h_category">
                                                    <div class="h_category_inner">
                                                        <div class="menu">
                                                            <ul>
                                                                <?php $categories = getCategoryList();?>
                                                                @foreach(getCategoryList() as $key => $cat_row)

                                                                    <li>
                                                                        <a class="h_category_btn {{ $key == 0 ? 'active' : ''  }}" href="javascript:void(0);">{{$cat_row->name}}</a>
                                                                        <div class="h_category_detail clearfix" {{ $key == 0 ? 'style="display: block;"' : ''  }} >
                                                                            <div class="h_category_left clearfix">
                                                                                <div class="h_category_menu">
                                                                                    <strong>Topics</strong>
                                                                                    <ul class="h_category_scroll">
                                                                                        <?php $sub_categories = getsubCategoryList($cat_row->id);?>
                                                                                        @foreach($sub_categories as $sub_key => $sub_cat_row)
                                                                                            <li><a href="{{ url('courses/search?category=') }}{{$sub_cat_row->name}}">{{$sub_cat_row->name}}</a></li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                    <a class="seeAll_btn" href="javascript:void(0);" style="display: none">See All</a>
                                                                                </div>
                                                                                <div class="h_category_menu">
                                                                                    <?php $sub_popularCategories = getPopularCategories($cat_row->id);?>
                                                                                    @if(count($sub_popularCategories) > 0)
                                                                                        <strong>{{Lang::get('label.Popular')}}</strong>
                                                                                        <ul>

                                                                                            @foreach($sub_popularCategories as $sub_pkey => $sub_pcat_row)
                                                                                                <li><a href="{{ url('courses/search?category=') }}{{$sub_pcat_row->name}}">{{$sub_pcat_row->name}}</a></li>
                                                                                            @endforeach


                                                                                        </ul>
                                                                                    @endif
                                                                                    <a class="seeAll_btn" href="javascript:void(0);" style="display: none">See All</a>
                                                                                    <a class="lessAll_btn" href="javascript:void(0);" style="display: none">Less All</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="h_category_right">
                                                                                <div class="h_category_img">
                                                                                    <figure>
                                                                                        @if($cat_row->image){
                                                                                        <img src="{{$cat_row->fullImage}}" alt="#" />
                                                                                        @endif
                                                                                    </figure>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="header_search_main">
                                                <div class="header_search">
                                                    <input id="hdr_course_searchBox" type="search" placeholder="{{Lang::get('label.I want to learn about...')}}">
                                                    <button data-search-type="header_bar"  id="cp_hdr_searchBar_btn" type="submit"></button>
                                                </div>
                                            </div>
                                            <div class="header_start_main">
                                                <div class="header_start">
                                                    <ul>
                                                        <li>
                                                            @if(@Auth::guard('student')->user())
                                                                @if(@Auth::guard('student')->user()->is_instructor==0)
                                                                    <a href="{{url('/courses/search')}}">{{Lang::get('label.Start Learning')}}</a>
                                                                @elseif(@Auth::guard('student')->user()->is_instructor==1)
                                                                    <a href="{{url('/student/my_courses')}}">{{Lang::get('label.Start Learning')}}</a>
                                                                @endif
                                                            @else
                                                                <a href="{{url('/student/login')}}">{{Lang::get('label.Start Learning')}}</a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if(@Auth::guard('student')->user())
                                                                @if(@Auth::guard('student')->user()->is_instructor==0)
                                                                    <a href="{{url('/student/dashboard')}}">{{Lang::get('label.Start Teaching')}}</a>
                                                                @elseif(@Auth::guard('student')->user()->is_instructor==1)
                                                                    <a href="{{url('/student/courses/add_listing')}}">{{Lang::get('label.Start Teaching')}}</a>
                                                                @endif
                                                            @else
                                                                <a href="{{url('/student/login')}}">{{Lang::get('label.Start Teaching')}}</a>
                                                            @endif

                                                            <div class="caret">
                                                                <a href="{{url('courses/cart')}}">
                                                                    <img src="{{asset('public/front_assets/images/caret.png')}}" alt="#">

                                                                    <i class="cp_courseCart_counter">{{ getTotalCartItems() }}</i>
                                                                </a>
                                                            </div>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header_right">
                                        <div class="header_right_inner">

                                            <div class="header_login">
                                                @if(!Auth::guard('student')->user())
                                                    <a href="{{ url('/student/login') }}">{{Lang::get('label.Log In')}}</a>
                                                @endif
                                            </div>

                                            <div class="header_signUp">
                                                <ul>
                                                    @if(!Auth::guard('student')->user())
                                                        <li>
                                                            <a href="{{ url('/student/register') }}">{{Lang::get('label.Sign Up')}}</a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ url('/student/profile') }}">{{Auth::guard('student')->user()->name}}</a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a class="header_contact_btn" href="{{url('/contact_us')}}">{{Lang::get('label.Contact Us')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                @yield('content')

                <footer class="footer">
                    <div class="footer_main">
                        <div class="auto_content">
                            <div class="footer_inner clearfix">
                                <div class="footer_left">
                                    <div class="footer_menu_main">
                                        <div class="footer_menu">
                                            <strong>{{Lang::get('label.CONTACT')}}</strong>
                                            <div class="footer_contact">
                                                <p>8 Lorem Ipsum is simply duext of the printing </p>
                                                <span>123 456 7890</span>
                                                <a href="mailTo:support@i-learning.co.uk">support@i-learning.co.uk</a>
                                            </div>
                                        </div>
                                        <div class="footer_menu">
                                            <strong>{{Lang::get('label.COMPANY')}}</strong>
                                            <ul>
                                                <li><a href="{{ route('about_us') }}">{{Lang::get('label.About Us')}}</a></li>
                                                <li><a href="{{url('public/blog')}}">{{Lang::get('label.Blog')}}</a></li>
                                                <li><a href="{{ route('contact_us') }}">{{Lang::get('label.Contact')}}</a></li>
                                                <li><a href="javascript:void(0);">{{Lang::get('label.Become an Instructor')}}</a></li>
                                            </ul>
                                        </div>
                                        <div class="footer_menu">
                                            <strong>{{Lang::get('label.PROGRAMS')}}</strong>
                                            <ul>
                                                <li><a href="javascript:void(0);">{{Lang::get("label.Lorem Ipsum is")}}</a></li>
                                                <li><a href="javascript:void(0);">{{Lang::get("label.simply dummy")}}</a></li>
                                                <li><a href="javascript:void(0);">{{Lang::get("label.text of the")}}</a></li>
                                                <li><a href="javascript:void(0);">{{Lang::get("label.printing and")}}</a></li>
                                            </ul>
                                        </div>
                                        <div class="footer_menu">
                                            <strong>{{Lang::get('label.SUPPORT')}}</strong>
                                            <ul>
                                                <li><a href="javascript:void(0);">{{Lang::get("label.Documentation")}}</a></li>
                                                <li><a href="javascript:void(0);">{{Lang::get("label.Forums")}}</a></li>
                                                <li><a href="javascript:void(0);">{{Lang::get("label.Dollar Packs")}}</a></li>
                                                <li><a href="javascript:void(0);">{{Lang::get("label.Loren Isupum")}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer_right">
                                    <div class="footer_map">
                                        <img src="{{asset('public/front_assets/images/footer_map.png')}}" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_socials_main">
                        <div class="auto_content">
                            <div class="footer_socials_inner">
                                <div class="footer_socials_left">
                                    <div class="footer_logo">
                                        <a href="javascript:void(0);">
                                            <img src="{{asset('public/front_assets/images/logo.png')}}" alt="#">
                                        </a>
                                    </div>
                                    <div class="footer_terms">
                                        <ul>
                                            <li><a href="{{url('/home')}}">{{Lang::get('label.Home')}}</a></li>
                                            <li><a href="{{url('/privacy_policy')}}">{{Lang::get('label.Privacy')}}</a></li>
                                            <li><a href="{{url('/terms_and_condition')}}">{{Lang::get('label.Terms')}}</a></li>
                                            <li><a href="{{url('/home')}}">{{Lang::get('label.Sitemap')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer_socials_right">
                                    <div class="footer_socials">
                                        <ul>
                                            <li><a target="_blank" href="{{settingValue('fb_url')}}"><i class="fa fa-facebook"></i></a></li>
                                            <li><a target="_blank" href="{{settingValue('twitter_url')}}"><i class="fa fa-twitter"></i></a></li>
                                            <li><a target="_blank" href="{{settingValue('insta_url')}}"><i class="fa fa-instagram"></i></a></li>
                                            <li><a target="_blank" href="{{settingValue('pinterest_url')}}"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a target="_blank" href="{{settingValue('dribbble_url')}}"><i class="fa fa-dribbble"></i></a></li>
                                            <li><a target="_blank" href="{{settingValue('google_url')}}"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_copyRight_main">
                        <div class="auto_content">
                            <div class="footer_copyRight">
                                <p>{{settingValue('copy_right')}}</p>
                            </div>
                        </div>
                    </div>
                </footer>
                <div class="back_top_btn"> <a href="javascript:void(0);"></a> </div>
            </div>

            <script src="{{asset('public/front_assets/js/jquery-3.4.1.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('public/front_assets/js/jquery-ui.js')}}"></script>
            <script src="{{asset('public/front_assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
            <script src="{{asset('public/front_assets/js/select2.min.js')}}"></script>
            <script src="{{asset('public/front_assets/js/slick.js')}}"></script>
            <script src="{{asset('public/front_assets/js/my_script.js')}}"></script>
            <script src="{{asset('public/front_assets/js/jquery.fancybox.js')}}"></script>
            <script src="{{asset('public/front_assets/js/jquery.validate.min.js')}}"></script>

            <script src="{{asset('public/front_assets/js/jquery.raty.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
            <script src="{{asset('public/front_assets/js/additional-methods.min.js')}}"></script>
            <script src="{{asset('public/front_assets/jquery-toast-plugin-master/src/jquery.toast.js')}}"></script>
            <script src="{{asset('public/front_assets/js/frontend_script.js')}}"></script>

            <script>
                $(".search_select").select2({
                    placeholder: "Please Select",
                    allowClear: true,
                });

                $(".stDb_notif_content").mCustomScrollbar({
                    scrollInertia:500,
                    mouseWheelPixels: 250,
                    theme:"minimal",
                });

                $("body").on("click",".loginRememberMe input",function(){
                    if($(this).prop("checked") === true){
                        $('.loginRememberMe input').val(1);

                    }else{
                        $('.loginRememberMe input').val(0);
                    }
                });
                // autoComplete

                let courseData = {!!  $allCourses !!} ;
                let prseCourses = JSON.parse(JSON.stringify((courseData)));
                let cousrseDataList = [];

                if(prseCourses.length > 0) {
                    for(let c = 0; c < prseCourses.length; c++ ){
                        let single = prseCourses[c];
                        let name = single.name;
                        cousrseDataList.push(name);
                    }
                }
                $("#hdr_course_searchBox").autocomplete({
                    source: cousrseDataList
                });
                $("#banr_course_search_bar").autocomplete({
                    source: cousrseDataList
                });

                $(".input_search_bar_resp").autocomplete({
                    source: cousrseDataList
                });



                function select_lang(lang){
                    window.location.href = "{{url('select-lang/')}}"+'/'+lang;
                }

            </script>
    @yield('javascript')
</body>
</html>
