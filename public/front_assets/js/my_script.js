
$(document).ready(function(e) {
//menu js start
var menuIcon_status = 1 ;
$("body").on("click",".menuIcon",function(e){
    if(menuIcon_status == 1){
        $(".header_inner").addClass("open-menu");
        $("body").addClass("opne-mobile-menu");
		 $("body,html").addClass("mobile_pointer");
		$(".header_category_main").removeClass("active");
        menuIcon_status = 0;
    }else{
        $(".header_inner").removeClass("open-menu");
        $("body").removeClass("opne-mobile-menu");
         $("body,html").removeClass("mobile_pointer");
        menuIcon_status = 1;
    }
    e.stopPropagation();
    });
   $("body,html").removeClass("mobile_pointer");
    $("body").on("click",".header_inner",function(e){
        e.stopPropagation();
    });
    $("body").on("click",".caterories-dropDown",function(e){
        e.stopPropagation();
    });

    $("body").on('click', function() {
        $(".header_inner").removeClass("open-menu");
        $("body").removeClass("opne-mobile-menu");
        $("body,html").removeClass("mobile_pointer");
        menuIcon_status = 1;
    });

    $(".menu_close").click(function() {
        $(".header_inner").removeClass("open-menu");
            $("body").removeClass("opne-mobile-menu");
            $("body,html").removeClass("mobile_pointer");
        menuIcon_status = 1;
    });


//menu js end

$(".search_icon_mobile").click(function(e){
  $(".header_search_mobile").toggleClass("active");
  $("body").addClass("mobile_pointer");
});

$("body").click(function(e) {
   if (!$(e.target).is('.search_icon_mobile, .header_search_mobile *')) {
    $(".header_search_mobile").removeClass("active");
	//$("body").removeClass("mobile_pointer");
     }
 });


$(".back_top_btn a").on("click",function(e){
  e.preventDefault();
  $("body, html").animate({scrollTop: 0}, 'slow');
  $(".menu ul li a").removeClass("active");
});


$(".h_category_btn").click(function(e){
  $(".h_category_btn").removeClass("active");
  $(".h_category_detail").hide();
  $(this).parent("li").find(".h_category_detail").show();
  $(this).addClass("active");
});



$("body").on("click",".seeAll_btn",function(e){
	if($(this).hasClass("active")){
		$(this).removeClass("active");
		$(this).text("See All");
		$(this).closest(".h_category_menu").find("ul").mCustomScrollbar('destroy');

	}else{
		$(this).addClass("active");
		$(this).text("See Less");
		$(this).closest(".h_category_menu").find("ul").mCustomScrollbar({
		  scrollInertia:500,
		  mouseWheelPixels: 250,
		  theme:"minimal",
		});
	}

});

$(".header_category_btn").click(function(){
  $(this).parent(".header_category_main").toggleClass("active");
  $("body").toggleClass("mobile_pointer");
});

$("body").click(function(e) {
   if (!$(e.target).is('.header_category_main, .header_category_main *')) {
    $(".header_category_main").removeClass("active");
	//$("body").removeClass("mobile_pointer");
     }
 });

 $(".header_search_main, .header_start_main, .header_right").click(function(){
  $(".header_category_main").removeClass("active");
  $("body").removeClass("mobile_pointer");
});

 $(".courses_tabTitle ul li a").click(function(){
  $(".courses_tabTitle ul li a").removeClass("active");
  $(this).addClass("active");
});

//start jd js
$("body").on("click",".cp_seeMore_btn",function(e){
	if($(this).hasClass("active")){
		$(this).removeClass("active");
		$(this).text("See More");
		$(this).closest(".cp_accordion").find(".cp_accordion_scroll").mCustomScrollbar('destroy');

	}else{
		$(this).addClass("active");
		$(this).text("See Less");
		$(this).closest(".cp_accordion").find(".cp_accordion_scroll").mCustomScrollbar({
		  scrollInertia:500,
		  mouseWheelPixels: 250,
		  theme:"minimal",
		});
	}
});


$(".cp_course_tabs_title ul li a").click(function(){
  var tab_class = $(this).attr("href");
  $(".cp_course_tabs_title ul li a").removeClass("active");
  $(".cp_course_tabs_show").hide();
  $(tab_class).show();
  $(this).addClass("active");
  return false;
});

  $(".cp_detail_accordion_title a").click(function(){

	if($(this).hasClass("active")){
		 $(this).closest(".cp_detail_accordion").find(".cp_detail_accordion_show").hide();
		 $(this).closest(".cp_detail_accordion").find(".cp_detail_accordion_title a").removeClass("active");

	}else{
		 $(this).closest(".cp_detail_accordion").find(".cp_detail_accordion_show").hide();
		 $(this).closest(".cp_detail_accordion").find(".cp_detail_accordion_title a").removeClass("active");
		 $(this).addClass("active");
		 $(this).closest(".cp_detail_accordion_row").find(".cp_detail_accordion_show").show();
	}
  });



//jam js
$("body").on("click",".cource_payment_row input",function(){
   if($(this).prop("checked") === true){
	    $(this).closest(".cource_payment_box_inner").find(".cource_payment_checkShow").hide();
	    $(this).closest(".cource_payment_row").find(".cource_payment_checkShow").show();
   }
});


$("body").on("click",".course_haveCoupn_click",function(){
	if($(this).hasClass("active")){
		$(this).removeClass("active");
		 $(this).closest(".course_haveCoupn_top").find(".course_haveCoupn_show").hide();
	}else{
		$(this).addClass("active");
		 $(this).closest(".course_haveCoupn_top").find(".course_haveCoupn_show").show();
	}
});

$("body").on("click",".faq_accordian_title",function(){
	if($(this).closest(".faq_accordian_row").hasClass("active")){
		 $(this).closest(".faq_accordian_lists").find(".faq_accordian_row").removeClass("active");
	}else{
		 $(this).closest(".faq_accordian_lists").find(".faq_accordian_row").removeClass("active");
		 $(this).closest(".faq_accordian_row").addClass("active");
	}
});

/*
$("body").on("click",".faq_leftMenu ul li a",function(){
	 $(this).closest(".faq_leftMenu").find("ul li a").removeClass("active");
	 $(this).addClass("active");
});*/

$("body").on("click",".courseCart_close",function(){
	 $(".message_popup").show();
	 $("body").addClass("hidden");
});

$("body").on("click",".popup_close, .mes_btn_cancel",function(){
	 $(this).closest(".all_popup").hide();
	 $("body").removeClass("hidden");
});



$("body").on("click",".stDb_header_dropdownToShow",function(e){
	 e.stopPropagation();
	if($(this).closest(".stDb_header_has_icon").hasClass("active")){
		 $(this).closest(".st_db_header_menu").find(".stDb_header_has_icon").removeClass("active");
		 $("body").removeClass("mobile_pointer");
	}else{
		 $(this).closest(".st_db_header_menu").find(".stDb_header_has_icon").removeClass("active");
		 $(this).closest(".stDb_header_has_icon").addClass("active");
		  $("body").addClass("mobile_pointer");

	}
});

$("body").click(function(e) {
    if (!$(e.target).is('.st_db_header_dropdown, .stDb_header_has_icon *')) {
       $(".stDb_header_has_icon").removeClass("active");
	   $("body").removeClass("mobile_pointer");
     }
 });




$("body").on("click",".ins_formVideos_delClick",function(){
  var len =  $(this).closest(".ins_formVideos_appendAble").find(".ins_formVideos_appended_row").length;
  if(len <= 1){
   }else{
     	$(this).closest(".ins_formVideos_appended_row").remove();
   }
});




$("body").on("click",".chatBox_listing .chatBox_listInn",function(){
	$(".chatBox_listInn").removeClass("active");
	$(this).addClass("active");
	$(".chatBox_right").addClass("active");
});
$("body").on("click",".mobBack_chatBox",function(){
	$(".chatBox_right").removeClass("active");
});

$("body").on("click",".stDb_leftBar_showIcon",function(e){
  e.stopPropagation();
  if($(this).hasClass("active")){
	 $(this).removeClass("active");
	 $(".stDb_sideBar").removeClass("sideBar_open");
	 $("body").removeClass("mobile_pointer");
  }else{
	 $(this).addClass("active");
	 $(".stDb_sideBar").addClass("sideBar_open");
	 $("body").addClass("mobile_pointer");
  }
});

$("body").click(function(e) {
    if (!$(e.target).is('.stDb_leftBar_showIcon, .stDb_sideBar *')) {
       $(".stDb_sideBar").removeClass("sideBar_open");
	   $(".stDb_leftBar_showIcon").removeClass("active");

     }
 });













 //end ready
 });

$(window).scroll(function(){
    scroll = $(window).scrollTop();
   if (scroll >= 50){
       $(".back_top_btn").fadeIn("500");
    }else{
        $(".back_top_btn").fadeOut("500");
    }

    });

$("body").on("click",".nav_languages_dropdown",function(e){
    if($(this).hasClass("active")){
        $(this).removeClass("active");
        $("body").removeClass("mobile_pointer");
    }else{
        $(this).addClass("active");
        $("body").addClass("mobile_pointer");
    }
});

$("body").on("click",function(e){
    if (!$(e.target).is('.nav_languages_dropdown *')) {
        $(".nav_languages_dropdown").removeClass("active");
        $("body").removeClass("mobile_pointer");
    }
});


$("body").on("click",".nav_languages ul li a",function(e){
    $(this).closest("ul").find("a.active").removeClass("active");
    $(this).addClass("active");
    var text = $(this).html();
    $(this).closest(".nav_languages").find(".nav_languages_sel span").html(text);
    $(".nav_languages_dropdown").removeClass("sideBar_open");
    $("body").removeClass("mobile_pointer");
});


