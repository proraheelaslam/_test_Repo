
// Home page Js
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
let  pageURL = window.location.href;
let lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
let lastSegmentPart = lastURLSegment.split('?')[0];
let searchCoursesUrl  = APP_URL+'/search-courses/'+queryString;

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });


    $("#contact_us_form").closest('.contactInfo_formBoxInner').find('.alert-success, .alert-error').delay(5000).slideUp(300);
    if (lastSegmentPart == 'faq') {
        $(".faq_leftMenu ul li a:first").trigger('click');
    }

   // $("#search_category_dropDown option:first").trigger('change');


    if (lastSegmentPart == "search") {

        searchViewCourses();
        let categoryParams = urlParams.getAll('category');
         if (categoryParams != "" && categoryParams != "undefined") {
               if (categoryParams.length > 0) {
                   let cateName = '';
                   $("#search_category_dropDown option").each(function () {
                       let categry = $(this).val();
                       if(categoryParams.includes(categry)) {
                           cateName = categry;
                       }
                   });
                   if (cateName != ""){
                       $(`#search_category_dropDown option[value='${cateName}']`).attr('selected','selected').trigger('change',[1]);
                   }else{
                       $(`#search_category_dropDown option:first`).attr('selected','selected').trigger('change',[1]);
                   }

               }
           }else {
             $(`#search_category_dropDown option:first`).attr('selected','selected').trigger('change',[1]);
         }


    }
});

function searchSingleRatingCourses() {

    $('.cp_single_course_rating').each(function(){
        $(this).raty({
            readOnly:true,
            starHalf:     '../public/front_assets/images/star-half.png',
            starOff:      '../public/front_assets/images/star-off.png',
            starOn:       '../public/front_assets/images/star-on.png',
            score: function() {return $(this).attr('data-score');},
        });
        $(this).next().text($(this).attr('data-score'));
    });
}

function setSingleCategoryCourseRating(){

    $('.category_course_statRating').each(function(){
        $(this).raty({
            readOnly:true,
            starHalf:     'public/front_assets/images/star-half.png',
            starOff:      'public/front_assets/images/star-off.png',
            starOn:       'public/front_assets/images/star-on.png',
            score: function() {return $(this).attr('data-score');},
        });
        $(this).next().text($(this).attr('data-score'));
    });
}

/* ******************Courses Search ***********************/


$(".input_search_bar_resp").keydown(function(e){
    if(e.which === 13){
        $(".search_btn_resp").click();
    }
});

$("body").on('click', '.search_btn_resp', function (e) {

    let keyword = $(".input_search_bar_resp").val();
    const queryString = window.location.search;
    let url = APP_URL+'/courses/search/'+queryString;
    let href = new URL(url);
    href.searchParams.set('q_hdr', keyword);
    window.location.href = href.toString();
});

$("body").on('click', '#cp_hdr_searchBar_btn', function (e) {

    let keyword = $("#hdr_course_searchBox").val();
    const queryString = window.location.search;
    let url = APP_URL+'/courses/search/'+queryString;
    let href = new URL(url);
    href.searchParams.set('q_hdr', keyword);
    window.location.href = href.toString();
});




$("#hdr_course_searchBox").keydown(function(e){
    if(e.which === 13){
        $("#cp_hdr_searchBar_btn").click();
    }
});
$("#banr_course_search_bar").keydown(function(e){
    if(e.which === 13){
        $(".cp_hdr_searchBar_btn").click();
    }
});

$("#cp_course_search_box").keydown(function(e){
    if(e.which === 13){
        $(".search_our_courses_btn").click();
    }
});
$("body").on('click', '.cp_hdr_searchBar_btn', function (e) {

    let keyword = $(".hdr_course_searchBox").val();
    if (keyword === "") {
        keyword = "";
    }
    let searchType = $(this).attr('data-search-type');
    if (searchType == 'banner') {
        keyword = $("#banr_course_search_bar").val();
    }
    const queryString = window.location.search;
    let url = APP_URL+'/courses/search/'+queryString;
    let href = new URL(url);
    href.searchParams.set('q_hdr', keyword);
    window.location.href = href.toString();
});

//
$('body').on('click', '.pagination a', function(e) {

    e.preventDefault();
    let url = $(this).attr('href');
    let urlParam = new URLSearchParams(url);
    let page = urlParam.get('page');
    let pageParam = url.split('?')[1];
    let pageNumber = pageParam.split('=')[1];
    let paramUrl = new URL(window.location.href);
    let ajxReqUrl = new URL(searchCoursesUrl);
    paramUrl.searchParams.set('page', pageNumber);
    ajxReqUrl.searchParams.set('page', pageNumber);
    //let paginationUrl =  pageURL+"&"+pageParam;
    window.history.pushState(paramUrl.href, "", paramUrl.href);
    searchViewCourses(ajxReqUrl);

});

function searchViewCourses(ajxReqUrl){

    $("#cpCourses_ul").LoadingOverlay("show");
    // filter check items
    searchCoursesUrl = searchCoursesUrl;
    if (ajxReqUrl){
        searchCoursesUrl = ajxReqUrl;
    }
    //return false;
    getAjaxData(searchCoursesUrl,'',  (result) => {

        let courses = result.data;
        let totalCourses = courses.total_courses;
        let totalContent = courses.total_lecture_content;
        $("#cpCourses_ul").html('');
        $("#cp_course_listing_inner").html(result.view);
        $("#cpCourses_ul").LoadingOverlay("hide");
        $(".cp_total_cousrse").html(`${totalCourses} <span>Courses</span>`);
        $(".cp_total_video_content").html(`${totalContent} <span>Video Tutorials</span>`);
        selectedFilterOption();
        // set rating

        searchSingleRatingCourses();

    });
}

/**
 *
 */
function selectedFilterOption(){

    let urlParams = new URLSearchParams(window.location.search);

    let categoryParams = urlParams.getAll('category');
    let authorParams = urlParams.getAll('author');
    let skillLevelParams = urlParams.getAll('skill_level');
    let orderByParams = urlParams.getAll('order_by');
    let priceParams = urlParams.getAll('price');
    let qhdrParams = urlParams.get('q_hdr');
    let ourCourseParams = urlParams.get('our_course');
    let ratingParams = urlParams.get('rating');

    $("#hdr_course_searchBox").val(qhdrParams);
    $(".input_search_bar_resp").val(qhdrParams);
    $("#cp_course_search_box").val(ourCourseParams);

    $(".cp_course_inner").find('.checked_button_list').each(function () {

        let dataType = $(this).attr('data-checked-type');
        let dataName = $(this).attr('data-name');

        if (dataType == "category") {

            let categoryFound = categoryParams.find(c => c == dataName);
            if (categoryFound !== undefined) {
                $(this).find('input[type="checkbox"]').attr('checked','checked');
            }


        }else if (dataType == 'author') {
            let authorFound = authorParams.find(c => c == dataName);
            if (authorFound !== undefined) {
                $(this).find('input[type="radio"]').attr('checked','checked');
            }
        }else if (dataType == 'skill_level') {

            let skillLevelFound = skillLevelParams.find(c => c == dataName);
            if (skillLevelFound !== undefined) {
                $(this).find('input[type="checkbox"]').attr('checked','checked');
            }
        }else if (dataType == 'order_by') {

            let obj = $(this);
            $(obj).find('option').each(function(){

                let name  = $(this).attr('data-name');
                let orderByFound = orderByParams.find(c => c == name);
                if (orderByFound !== undefined) {
                    $(obj).find(`option[data-name=${orderByFound}]`).attr('selected', 'selected');
                    $(obj).find(`option[data-name=${orderByFound}]`).trigger('change',[1]);

                }
            });

        }else if (dataType == 'price') {

            let priceFound = priceParams.find(c => c == dataName);
            if (priceFound !== undefined) {
                $(this).find('input[type="radio"]').attr('checked', 'checked');
            }
        }

    });
    // rating
    if (ratingParams != "" && ratingParams != "undefined") {
        let obj = $(`#search_course_rating_dropDown option[data-name='${ratingParams}']`).attr('selected','selected').trigger('change',[1]);
    }


}


$("body").on('change', '#search_category_dropDown', function (e, isTrigger) {


    let type = $(this).find(':selected').attr('data-category-type');
    let categoryId = $(this).find(':selected').attr('data-id');
    let paramData = {
        id:categoryId
    };
    let url  = APP_URL+'/category/options';

    getAjaxData(url,paramData,  (result) => {
        let data = result.data;
        let categoryListHtml = '';
        if (data.length > 0) {

            for (let c = 0; c < data.length; c++) {
                let single = data[c];
                categoryListHtml +=`<li data-checked-type="category" data-id="${single.id}" data-name="${single.name}" class="c_category_lists checked_button_list">
                                        <div class="cp_accordion_check clearfix">
                                            <div class="form_checkbox">
                                                <label> ${single.name}
                                                    <input class="cp_category_chk" type="checkbox">
                                                    <span class="checkbox_checked"></span> 
                                                </label>
                                            </div>
                                            <em>(${single.courses_count})</em> </div>
                                    </li>`;
            }
            $("#cp_categories_ul").html(categoryListHtml);
        }
        if (!isTrigger) {
            selectedFilterOption();
        }

    })

});


$("body").on('change', '#search_course_rating_dropDown', function (e,istrigger) {
    if(!istrigger) {
        addOrUpdateQueryString();
    }
});

$("body").on('click', ".cp_author_list_chk", function () {

    addOrUpdateQueryString();
});

$("body").on('click', ".cp_category_chk", function () {

    addOrUpdateQueryString();
});

$("body").on('click', ".cp_skill_level_chk", function () {

    addOrUpdateQueryString();
});
$("body").on('click', ".cp_course_price_chk", function () {

    addOrUpdateQueryString();
});
//

$("body").on('click', '.search_our_courses_btn', function () {

    addOrUpdateQueryString($(this));
});




function addOrUpdateQueryString(obj) {

    let checkItems = [];

    let checkDataType = $(obj).closest('.cp_our_search_inner').find("#cp_course_search_box").attr('data-checked-type');
    if (checkDataType == 'our_course') {
        let srchkeyWord = $("#cp_course_search_box").val();
        let ourData = checkDataType+"="+srchkeyWord;
        checkItems.push(ourData);
    }
    $(".cp_course_right").find('.checked_button_list').each(function () {

        let itemChecked = $(this).find('input[type="checkbox"] , input[type="radio"]').is(':checked');
        if (itemChecked) {

            let dataType = $(this).attr('data-checked-type');
            let dataName = $(this).attr('data-name');
            dataName = dataName.replace('&','');
            let queryName = dataType+"="+dataName;
            checkItems.push(queryName);

        }
    });
    // rating dropdown select
    let chkType = $("#search_course_rating_dropDown").find(':selected').attr('data-checked-type');
    if (chkType == "rating") {
        let dataType = $("#search_course_rating_dropDown").find(':selected').attr('data-checked-type');
        let dataName = $("#search_course_rating_dropDown").find(':selected').attr('data-name');
        dataName = dataName.replace('&','');
        let queryName = dataType+"="+dataName;
        checkItems.push(queryName);
    }

    let searchCourseUrl = APP_URL+'/courses/search';
    let url_arr = searchCourseUrl.split("?");
    let queryParam = checkItems.join('&');
    let queryStr =  url_arr[0]+"?"+queryParam;
    if (history.pushState) {
        window.history.pushState({ path:queryStr },'',queryStr);
    }
    $("#cpCourses_ul").LoadingOverlay("show");
    searchCoursesUrl = APP_URL+'/search-courses/?'+queryParam;
    searchViewCourses();
}

function searchCoursesByKey(){

    let checkItems = [];
    $(".cp_course_inner").find('.checked_button_list').each(function () {

        let itemChecked = $(this).find('input[type="checkbox"] , input[type="radio"]').is(':checked');
        let dataType = $(this).attr('data-checked-type');
        let dataName = $(this).attr('data-name');

        if (dataType === 'order_by') {

            let selectedSort = $(this).find(':selected').attr('data-checked-type');
            let selectedDataName = $(this).find(':selected').attr('data-name');
            dataName = selectedDataName.replace('&','');
            let queryName = selectedSort+"="+selectedDataName;
            checkItems.push(queryName);
        }
        if (itemChecked) {

            dataName = dataName.replace('&','');
            let queryName = dataType+"="+dataName;
            checkItems.push(queryName);

        }
    });

    let searchCourseUrl = APP_URL+'/courses/search';
    let url_arr = searchCourseUrl.split("?");
    let queryParam = checkItems.join('&');
    let queryStr =  url_arr[0]+"?"+queryParam;
    if (history.pushState) {
        window.history.pushState({ path:queryStr },'',queryStr);
    }
    let  newPageUrl = window.location.href;
    $("#cpCourses_ul").LoadingOverlay("show");
    searchCoursesUrl = APP_URL+'/search-courses/?'+queryParam;
    searchViewCourses();

}


$("body").on('change', '#cp_course_sort_dropdown', function (e, isTrigger) {

    if (!isTrigger) {
        searchCoursesByKey();
    }
});



$("body").on('click', '.feature_slideCategory_lists', function () {

    let categoryId = $(this).attr('data-id');
    let url = APP_URL+'/home/featureCourses/'+categoryId;
    let noImage = ASSET_PATH+'/no_image.png';

    getAjaxData(url,'', (result) => {
        let featureCoursesHtml = '';
        $(".home_courses_slide").html('');
        let resData = result.data;
        let categoryType = result.category_type;
        if (categoryType == 'single') {

            let courses = resData.courses;

            if (courses.length > 0) {

                for (let c = 0; c < courses.length; c++) {
                    let singleCourse = courses[c];
                    let instructor = singleCourse.instructor;
                    let courseCreatedDate = singleCourse.created_at;

                    featureCoursesHtml +=`<div>
                                           
                                                <div class="courses_box">
                                                 <a href="${APP_URL}/courses/course_detail/${singleCourse.hash_encoded_id}">
                                                        <div class="courses_box_img">
                                                            <figure><img src="${singleCourse.fullImage} " alt="#"></figure>
                                                        </div>
                                                      </a>
                                                    <div class="courses_box_inner">
                                                        <div class="course_rate"> <span>$${singleCourse.coursePrice}</span> </div>
                                                        <div class="stars " >
                                                        <div class="category_course_statRating " data-score="${singleCourse.course_rating}"></div>
                                                         
                                                        </div>
                                                        <div class="courses_box_text"> <span>${resData.name}</span> <a  href="${APP_URL}/courses/course_detail/${singleCourse.hash_encoded_id}">${singleCourse.name}</a> </div>
                                                        <div class="user"> <a href="javascript:void(0);"> <i><img src="${(instructor!= null ? instructor.fullImage :noImage )}" alt="#"></i>
                                                                <p> <strong>${(instructor!= null ? instructor.fullName : '')}</strong> <span>${singleCourse.courseCreated}</span> </p>
                                                            </a> </div>
                                                    </div>
                                                </div>
                                        
                                        </div>`;
                }
            }
        }else {

            let courses = resData;

            if (courses.length > 0) {
                for (let c = 0; c < courses.length; c++) {
                    let singleCourse = courses[c];
                    let instructor = singleCourse.instructor;
                    let courseCreatedDate = singleCourse.created_at;
                    let category = singleCourse.categories;

                    featureCoursesHtml +=`<div>
                                            <div class="courses_box">
                                             <a href="${APP_URL}/courses/course_detail/${singleCourse.hash_encoded_id}">
                                                <div class="courses_box_img">
                                                    <figure><img src="${singleCourse.fullImage} " alt="#"></figure>
                                                </div>
                                                <div class="courses_box_inner">
                                                    <div class="course_rate"> <span>$${singleCourse.coursePrice}</span> </div>
                                                    
                                                    <div class="stars " >
                                                    <div class="category_course_statRating" data-score="${singleCourse.course_rating}"></div>
                                                  
                                                    </div>
                                                    <div class="courses_box_text"> <span>${category.name}</span> <a  href="${APP_URL}/courses/course_detail/${singleCourse.hash_encoded_id}">${singleCourse.name}</a> </div>
                                                    <div class="user"> <a href="javascript:void(0);"> <i><img src="${(instructor != null ? instructor.fullImage : noImage)}" alt="#"></i>
                                                            <p> <strong>${(instructor != null ? instructor.fullName : '')}</strong> <span>${singleCourse.courseCreated}</span> </p>
                                                        </a> </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>`;
                }
            }
        }
        $('.home_courses_slide').slick('unslick');
        $(".home_courses_slide").html(featureCoursesHtml);
        initCoursesSlider();
        setSingleCategoryCourseRating();
    });

});



/*****************load more review ***********************/

function setStudentsReviewRating(){
    $('.cp_studentCourse_rating').each(function(){
        $(this).raty({
            readOnly:true,
            score: function() {return $(this).attr('data-score');},
        });
        $(this).next().text($(this).attr('data-score'));
    });
}

$(document).on('click', '.show_more_reviews_btn', function () {

    loadStudentsReviews($(this));
});


function loadCourseStudentsFeedback() {

    let courseId = $("#cp_detail_info").attr('data-hash-course-id');
    let  url = APP_URL+'/courses/course_detail/'+courseId;

    $('.cp_feedback').html("");
    postAjaxData('GET',url,'',(res) => {
        $('.cp_feedback').html(res.view);
        studentFeedbackRating();
    });
}


function loadStudentsReviews(obj){

    let  url = APP_URL+'/courses/reviews/load_more';
    let courseId = $("#cp_course_info").attr('data-course-id');
    let data = {
        id: courseId
    };
    postAjaxData('POST',url,data,(res) => {

        $('.cp_reviews_list ul').html(res.view);
        $("#btn-more").hide();
        $(obj).hide();
        setStudentsReviewRating();
        loadCourseStudentsFeedback();
    });
}


/********** Cart Page ***************/

$(document).on('click','.cp_add_to_cart_button', function () {

        let  url = APP_URL+'/courses/cart/add';
        let id =  $("#cp_course_info").attr('data-course-id');
        let name = $("#cp_course_info").attr('data-course-name');
        let price = $("#cp_course_info").attr('data-course-price');
        let qty = $("#cp_course_info").attr('data-course-qty');
        let image = $("#cp_course_info").attr('data-course-image');
        let data = {
            id: id,
            name: name,
            qty:qty,
            price : price,
        };
        $(".cp_add_toCart_button").addClass('disabled_loader');
        postAjaxData('POST',url,data,(res) => {
            $(".cp_add_toCart_button").hide();
            $(".cp_go_to_cart_button").show();
            $(".cp_add_toCart_button").removeClass('disabled_loader');
            updateCartItemCounter();
        });
});

$("body").on("click",".courseCart_close",function(){


    let obj = $(this);
    $(".message_popup").show();
    $("body").addClass("hidden");
    $(".confirmDeleteCartItemBtn").unbind('click');
    $(".confirmDeleteCartItemBtn").click(function () {

        let  url = APP_URL+'/courses/remove_item';
        let itemId = $(obj).attr('data-id');
        let data = {
            id: itemId,
        };

        postAjaxData('POST',url,data,(res) => {

            $(obj).closest('tr').remove();
            $(".message_popup").hide();
            $("body").removeClass("hidden");
            updateCartItemCounter();
            if (Object.keys(res.data).length == 0) {
                $(".cp_cartItem_sec").hide();
                $(".cp_cart_item_inner").show();
                $(".emptyCartSection").show();
            }

            location.reload();
        });
    })

});

function updateCartItemCounter(){

    let url = APP_URL+'/courses/all_cart_items';
    getAjaxData(url,'',  (result) => {
        console.log('result', result);
        $(".cp_courseCart_counter").text(result.total_items);
    });

}


$(".course_cart_qty").keyup(function(){
    var value = $(this).val();
    value = value.replace(/^(0*)/,"");
    $(this).val(value);
});

$("body").on('click', '.course_item_cart_update_btn', function () {

    let url = APP_URL + '/courses/cart/update';
    let cartItems = [];
    $(".cp_cart_item_list").each(function () {

        let ip = $(this).attr('data-ip-id');
        let itemId = $(this).attr('data-item-id');
        let studentId = $(this).attr('data-student-id');
        let itemQty = $(this).find('.course_cart_qty').val();
        if (itemQty === 0 || itemQty == "") {
            itemQty = 1;
        }
        let qty = parseInt(itemQty);
        let obj = {
            ip,
            itemId,
            qty,
            studentId
        };
        cartItems.push(obj);
    });
    let itemOb = {};
    itemOb.items = cartItems;
    //
    postAjaxData('POST', url, itemOb, (res) => {
        location.reload();
        $(".message_popup").hide();

    });


});

function initBannerSlider() {

    $('.banner_slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        centerMode: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]
    });
}
function initCoursesSlider() {
    $('.courses_slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: false,
        responsive: [
            {
                breakpoint: 1366,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
        ]
    });
}
function initStudentSlider() {
    $('.hm_student_slider').slick({
        arrows: false,
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        centerMode: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
}

/*****************Contact page*********/

$('#contact_us_form').validate({ // initialize the plugin
    rules: {
        full_name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        subject: {
            required: true,
        },
         message: {
            required: true,
        },
    },
    submitHandler: function(form) {
        $("#contact_us_form").find('.contactForm_submit_btn').addClass('disabled_loader');
        form.submit();
    },
});

$('#newsLetterForm').validate({
    rules: {
        email: {
            required: true,
            email: true
        },
    },
    submitHandler: function(form) {
        getWeeklyNewsLetter();
    },

});

$('#cpReviewRatingForm').validate({
    rules: {
        title: {
            required: true,
        },
        content: {
            required: true,
        },
    },
    submitHandler: function(form) {
        submitCourseReview();
    },
});

function submitCourseReview() {

    let url = APP_URL+'/courses/add_review';
    let title  = $("#cpReviewRatingForm").find('input[name="title"]').val();
    let content  = $("#cpReviewRatingForm").find('textarea[name="content"]').val();
    let courseId = $("#cp_detail_info").attr('data-course-id');
    let studentId = $("#cp_detail_info").attr('data-student-id');
    let instructorId = $("#cp_detail_info").attr('data-instructor-id');
    let scoreValue = $("#half").raty('score');

    let data = {
        courseId : courseId,
        studentId: studentId,
        instructorId: instructorId,
        review_title: title,
        review_content: content,
        rating: scoreValue
    };
    $("#cpReviewRatingForm").find('.reviewSubmit_msg_btn').remove();
    $("#cpReviewRatingForm").find(".cpSubmitReviewBtn").addClass('disabled_loader');

    postAjaxData('POST',url,data,(res) => {

        if (res.status) {

            $("#cpReviewRatingForm").find(".cpSubmitReviewBtn").after(`<label  class="error alert_success_color reviewSubmit_msg_btn" >${res.message}.</label>`);
            $("#cpReviewRatingForm").find('input[name="title"]').val('');
            $("#cpReviewRatingForm").find('textarea[name="content"]').val('');
            loadStudentsReviews();
        }else {
            $("#cpReviewRatingForm").find(".cpSubmitReviewBtn").after(`<label class="error reviewSubmit_msg_btn" >${res.message}.</label>`);
        }
        $("#cpReviewRatingForm").find('.reviewSubmit_msg_btn').delay(5000).hide('slow');
        $("#cpReviewRatingForm").find(".cpSubmitReviewBtn").removeClass('disabled_loader');
    });
}

function getWeeklyNewsLetter(){


    $("#newsLetterForm").find('label').remove();
    let url = APP_URL+'/weekly_news_letter/get';
    let email  = $("#newsLetterForm").find('input[name="email"]').val();
    let data = {
        email: email,
    };
    postAjaxData('POST',url,data,(res) => {

        if (res.status) {
            $("#newsLetterForm").find('input[name="email"]').val('');
            $("#newsLetterForm").find('input[name="email"]').after(`<label  class="error alert_success_color" for="email">${res.message}.</label>`);
            $("#newsLetterForm").find('label').delay(5000).slideUp(200);

            $("#newsLetterForm").find('label').slideUp(5000, function() {
                $(this).remove();
            });



        }else {
            console.log("dd", $("#newsLetterForm").find('label'));
            $("#newsLetterForm").find('label').removeClass('alert_success_color');
            $("#newsLetterForm").find('input[name="email"]').after(`<label  class="error " for="email">${res.message}.</label>`);
        }

    });

}

/***************** FAQ ****************/
$("body").on("click",".faq_leftMenu ul li a",function(){


    let id = $(this).parent().attr('data-id');
    $(this).closest(".faq_leftMenu").find("ul li a").removeClass("active");
    $(this).addClass("active");
    $('.faq_accordian_main').find(`.faq_accordian`).hide();
    $('.faq_accordian_main').find(`.faq_accordian[data-id=${id}]`).show();
    $(".faq_accordian_main").show();

});


/***************/

function getAjaxData(url,params = "", callback) {


    $.ajax({
        url: url,
        type: 'GET',
        data: params,
        success: function (result) {
            callback(result);
        }
    });
}

function postAjaxData(type,url,data,callback) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: type,
        data:data,
        success: function (result) {
            callback(result);
        }
    });
}


/******************************/

$('#filter_by_name').keydown(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        filter_list();
    }
});

$('#filter_by_course_name').keydown(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        filter_course_list();
    }
});

$('#question_searchBar').keydown(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        getAnswer();
    }
});
