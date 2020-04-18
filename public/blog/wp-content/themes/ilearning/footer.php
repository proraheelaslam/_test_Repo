<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<footer class="footer">
    <div class="footer_main">
      <div class="auto_content">
        <div class="footer_inner clearfix">
          <div class="footer_left">
            <div class="footer_menu_main">
              <div class="footer_menu"> <strong>CONTACT</strong>
                <div class="footer_contact">
                  <p>8 Lorem Ipsum is simply duext of the printing </p>
                  <span>123 456 7890</span> <a href="mailTo:support@i-learning.co.uk">support@i-learning.co.uk</a> </div>
              </div>
              <div class="footer_menu"> <strong>COMPANY</strong>
                <ul>
                  <li><a href="javascript:void(0);">About Us</a></li>
                  <li><a href="javascript:void(0);">Blog</a></li>
                  <li><a href="javascript:void(0);">Contact</a></li>
                  <li><a href="javascript:void(0);">Become a Instructor</a></li>
                </ul>
              </div>
              <div class="footer_menu"> <strong>PROGRAMS</strong>
                <ul>
                  <li><a href="javascript:void(0);">Lorem Ipsum is</a></li>
                  <li><a href="javascript:void(0);">simply dummy</a></li>
                  <li><a href="javascript:void(0);">text of the</a></li>
                  <li><a href="javascript:void(0);">printing and</a></li>
                </ul>
              </div>
              <div class="footer_menu"> <strong>SUPPORT</strong>
                <ul>
                  <li><a href="javascript:void(0);">Documentation</a></li>
                  <li><a href="javascript:void(0);">Forums</a></li>
                  <li><a href="javascript:void(0);">Dollar Packs</a></li>
                  <li><a href="javascript:void(0);">Loren Isupum</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer_right">
            <div class="footer_map"> <img src="<?=get_bloginfo('template_directory');?>/images/footer_map.png" alt="#"> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_socials_main">
      <div class="auto_content">
        <div class="footer_socials_inner">
          <div class="footer_socials_left">
            <div class="footer_logo"> <a href="<?php echo site_url();?>"><img src="<?=get_bloginfo('template_directory');?>/images/logo.png" alt="#"></a> </div>
            <div class="footer_terms">
              <ul>
                <li><a href="javascript:void(0);">Home</a></li>
                <li><a href="javascript:void(0);">Privacy</a></li>
                <li><a href="javascript:void(0);">Terms</a></li>
                <li><a href="javascript:void(0);">Sitemap</a></li>
              </ul>
            </div>
          </div>
          <div class="footer_socials_right">
            <div class="footer_socials">
              <ul>
                <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-google"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_copyRight_main">
      <div class="auto_content">
        <div class="footer_copyRight">
          <p>Copyright i-Learning &copy; 2020.  All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>

<div class="back_top_btn"> <a href="javascript:void(0);"></a> </div>
</div>

<script src="<?=get_bloginfo('template_directory');?>/js/jquery-3.4.1.min.js"></script> 
<script src="<?=get_bloginfo('template_directory');?>/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="<?=get_bloginfo('template_directory');?>/js/select2.min.js"></script> 
<script src="<?=get_bloginfo('template_directory');?>/js/slick.js"></script> 
<script src="<?=get_bloginfo('template_directory');?>/js/my_script.js"></script> 
<script src="<?=get_bloginfo('template_directory');?>/js/jquery.fancybox.js"></script> 
<script src="<?=get_bloginfo('template_directory');?>/js/jquery.raty.js"></script>
<script>
$('.blog_slider').slick({
  arrows: true,
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  centerMode: false,
  responsive: [
  {
    breakpoint: 1025,
    settings: {
    slidesToShow: 3,
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
  </script>

<?php wp_footer(); ?>
</body>
</html>
