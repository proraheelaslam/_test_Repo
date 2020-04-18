<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />

<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/css/jquery.raty.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">

<header class="header">
    <div class="caret caret_mobile" style="display:none;"><a href="javascript:void(0);"><img src="<?=get_bloginfo('template_directory');?>/images/caret.png" alt="#"><i>2</i></a></div>
    <div class="search_icon_mobile" style="display:none;"></div>
    <div class="header_search_main header_search_mobile" style="display:none;">
      <div class="header_search">
        <input type="search" placeholder="I want to learn about. . .">
        <button type="submit"></button>
      </div>
    </div>
    <div class="auto_content">
      <div class="header_main clearfix">
        <div class="logo"> <a href="<?php echo site_url();?>"><img src="<?=get_bloginfo('template_directory');?>/images/logo.png" alt="#"></a> </div>
        <div class="menuIcon"></div>
        <div class="header_inner">
          <div class="menu_close">x</div>
          <div class="header_detail">
            <div class="header_left">
              <div class="header_left_inner">
                <div class="header_category_main"> <a class="header_category_btn" href="javascript:void(0);">Categories</a>
                  <div class="h_category">
                    <div class="h_category_inner">
                      <div class="menu">
                        <ul>
                          <li> <a class="h_category_btn active" href="javascript:void(0);">Development</a>
                            <div class="h_category_detail clearfix" style="display: block;">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_1.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li> <a class="h_category_btn" href="javascript:void(0);">Business</a>
                            <div class="h_category_detail clearfix">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_2.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li> <a class="h_category_btn" href="javascript:void(0);">IT &amp; Software</a>
                            <div class="h_category_detail clearfix">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_1.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li> <a class="h_category_btn" href="javascript:void(0);">Design</a>
                            <div class="h_category_detail clearfix">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_1.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li> <a class="h_category_btn" href="javascript:void(0);">Marketing</a>
                            <div class="h_category_detail clearfix">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_1.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li> <a class="h_category_btn" href="javascript:void(0);">Lifestyle</a>
                            <div class="h_category_detail clearfix">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_1.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li> <a class="h_category_btn" href="javascript:void(0);">Photography</a>
                            <div class="h_category_detail clearfix">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_1.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li> <a class="h_category_btn" href="javascript:void(0);">Education + Elearning</a>
                            <div class="h_category_detail clearfix">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_1.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li> <a class="h_category_btn" href="javascript:void(0);">Music</a>
                            <div class="h_category_detail clearfix">
                              <div class="h_category_left clearfix">
                                <div class="h_category_menu"> <strong>Topics</strong>
                                  <ul class="h_category_scroll">
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">Typography</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> </div>
                                <div class="h_category_menu"> <strong>Popular</strong>
                                  <ul>
                                    <li><a href="javascript:void(0);">Color</a></li>
                                    <li><a href="javascript:void(0);">Digital Painting</a></li>
                                    <li><a href="javascript:void(0);">Drawing</a></li>
                                    <li><a href="javascript:void(0);">Illustration</a></li>
                                    <li><a href="javascript:void(0);">Logo Design</a></li>
                                    <li><a href="javascript:void(0);">User Experience</a></li>
                                    <li><a href="javascript:void(0);">Web Design</a></li>
                                  </ul>
                                  <a class="seeAll_btn" href="javascript:void(0);">See All</a> <a class="lessAll_btn" href="javascript:void(0);">Less All</a> </div>
                              </div>
                              <div class="h_category_right">
                                <div class="h_category_img">
                                  <figure><img src="<?=get_bloginfo('template_directory');?>/images/h_category_img_1.png" alt="#"></figure>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="header_search_main">
                  <div class="header_search">
                    <input type="search" placeholder="I want to learn about. . .">
                    <button type="submit"></button>
                  </div>
                </div>
                <div class="header_start_main">
                  <div class="header_start">
                    <ul>
                      <li><a href="st_dashboard.html">Start Learing</a></li>
                      <li>
                        <a href="ins_dashboard.html">Start Teaching</a>
                        <div class="caret"><a href="course_cart.html"><img src="<?=get_bloginfo('template_directory');?>/images/caret.png" alt="#"><i>2</i></a></div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="header_right">
              <div class="header_right_inner">
                <div class="header_login"> <a href="st_login.html">Log In</a> </div>
                <div class="header_signUp">
                  <ul>
                    <li><a href="st_register.html">Sign Up</a></li>
                    <li><a class="header_contact_btn" href="contact_us.html">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
