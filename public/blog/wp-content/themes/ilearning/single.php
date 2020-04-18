<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
$postId = get_the_ID();
get_header();
?>

<div class="all_banner">
	<div class="auto_content">
		<div class="all_banner_inner">
			<div class="banner_heading">
				<strong><? the_title(); ?></strong>
			</div>
		</div>
	</div>
</div>
<main class="content">
	<section class="blog_main blog_detail_main">
		<div class="blog">
			<div class="auto_content">
				<div class="blog_inner clearfix">

					<!-- Left_bar_start-->
					<div class="cp_course_left">
						<div class="cp_course_left_inner">
							<div class="blog_list">

								<div class="blog_detail">
									<?php
									while (have_posts()) : the_post();
										$blogImage     		 = get_field('image');
										$detail_page_content = get_field('detail_page_content');
										$post_day      		 = get_the_time('j', $post->ID);
										$post_menth    		 = get_the_time('F', $post->ID);
										$author_name   		 = get_the_author();
									?>
										<div class="blog_img">
											<a href="<?php the_permalink() ?>"><img src="<?php echo $blogImage; ?>" alt="#"></a>
											<strong><?php echo $post_day; ?><em><?php echo $post_menth; ?></em></strong>
										</div>
										<div class="blog_text">
											<strong><? the_title(); ?></strong>
											<ul>
												<li><a class="blog_admin" hre="javascript:void(0);"><?php echo $author_name; ?></a></li>
												<li><a class="blog_comment" hre="javascript:void(0);"><?php echo comment_count($post->ID); ?> comments</a></li>
											</ul>
										</div>
										<div class="cp_course_discription">
											<?php echo $detail_page_content; ?>
										</div>
									<? endwhile; ?>

									<div class="blog_share">
										<div class="footer_socials">
											<ul>
												<li><span>Share</span></li>
												<? //$current_url    = get_the_permalink();
												$current_url   = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '/';
												echo do_shortcode('[addtoany url="' . $current_url . '" title="' . $post->post_title . '"]');
												?>
											</ul>
										</div>
									</div>
									<div class="blog_next_prev clearfix">
										<?php previous_post_link('%link', __('PREVIOUS POST', 'twentyeleven')); ?>
										<?php next_post_link('%link', __('NEXT POST', 'twentyeleven')); ?>
										<!-- <a class="blog_prev" href="javascript:void(0);">Previous Post</a>
										<a class="blog_next" href="javascript:void(0);">Next Post</a> -->
									</div>
								</div>
							</div>

							<!-- comment_section_start-->
							<div class="cp_course_tabs_box">
								<div class="cp_course_tabs_heading">
									<h3>Add Reviews &amp; Rate</h3>
								</div>

								<main id="main" class="site-main" role="main">
									<?php
									/* Start the Loop */
									while (have_posts()) : the_post();
										//get_template_part( 'template-parts/post/content', get_post_format() );
										if (comments_open() || get_comments_number()) :
											comments_template();
										endif;
									endwhile; // End of the loop.
									?>
								</main>


							</div>
							<!-- comment_section_end-->

						</div>
					</div>
					<!-- Left_bar_end-->

					<!-- right_bar_start-->
					<div class="cp_course_right">

						<!-- search_form_start-->
						<div class="blog_search">
							<form method="get" action="<?php bloginfo('home'); ?>/blog/">
								<input placeholder="Search" class="form-control" id="search" name="searchpost" type="search">
								<input class="searchBtn" type="submit" value="" />
								<!--<button type="submit" id="btn-search" value=""></button>-->
							</form>
						</div>
						<!-- search_form_end-->

						<!-- categories_section_start-->
						<div class="cp_course_right_box">
							<div class="cp_course_right_boxInner">
								<strong class="blogRight_title">Categories</strong>
								<ul>
									<?php
									$taxonomies = array('category');
									$args = array(
										'orderby'           => 'name',
										'order'             => 'ASC',
									);
									$terms = get_terms($taxonomies, $args);
									foreach ($terms as $term) {
										$term_link = get_term_link($term->slug, 'category');
										$post_count = $term->count;
										$selected  = ($cat_slug == $term->slug) ? 'cat_selected' : '';
									?>
										<li class="clearfix">
											<a class="<?= $selected; ?>" href="<?php echo $term_link; ?>">
												<div class="cource_orderSumry_cell"> <strong><?php echo $term->name; ?></strong> <span><?php echo $post_count; ?></span></div>
											</a>
										</li>
									<? } ?>
								</ul>
							</div>
						</div>
						<!-- categories_section_end-->

						<!-- recentPost_section_start-->
						<div class="cp_course_right_box">
							<div class="cp_course_right_boxInner">
								<strong class="blogRight_title">Recent Posts</strong>
								<div class="blog_recent_post">
									<ul>
										<?
										query_posts('post_type=post&posts_per_page=3&order=DESC&orderby=publish_date');
										while (have_posts()) : the_post();
											$thumb_id      = get_post_thumbnail_id();
											$img_alt_title = get_post($thumb_id)->post_title;
											$title_Text    = ucwords(str_replace("_", " ", $img_alt_title));
											$alt_text      = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
											$altText       = ucwords(str_replace("_", " ", $alt_text));
											$thumb_url     = wp_get_attachment_image_src($thumb_id, 'full', true);
											$banner_bg     = $thumb_url[0];
											$selected      = ($post->ID == $postId) ? 'cat_selected' : '';

										?>
											<li>

												<div class="blog_recent_post_inner">

													<div class="blog_recent_post_img">
														<!-- <span><img src="<? //get_bloginfo('template_directory'); 
																				?>/images/courseCart_img.png" alt="#"></span> -->
														<a href="<?php the_permalink(); ?>"><span><img src="<?= $banner_bg; ?>" alt="#"></span></a>
													</div>
													<div class="blog_recent_post_detail">
														<a href="<?php the_permalink(); ?>"><strong class="<?= $selected; ?>"><?php the_title(); ?></strong></a>
														<span><?php echo get_the_time('Fj, Y', $post->ID) ?></span>
													</div>
													<!-- <a href="<?php //the_permalink(); 
																	?>"></a> -->
												</div>
											</li>
										<? endwhile;
										wp_reset_postdata();
										?>
									</ul>
								</div>
							</div>
						</div>
						<!-- recentPost_section_end-->

						<!-- tags_section_start-->
						<div class="cp_course_right_box">
							<div class="cp_course_right_boxInner">
								<div class="cp_course_tags">
									<strong>Tags</strong>
									<ul>
										<? $posttags = get_the_tags(); ?>
										<? if (!empty($posttags)) { ?>
											<? foreach ($posttags as $this_tag) {
												$tag_link = get_tag_link($this_tag->term_id);
												$selected  = ($cat_slug == $this_tag->slug) ? 'cat_selected' : '';
											?>
												<li><a class="<?php echo $selected; ?>" href="<?php echo $tag_link; ?>"><? echo $tagdisplay = $this_tag->name; ?></a></li>
										<? }
										} ?>
									</ul>
								</div>
							</div>
						</div>
						<!-- tags_section_start-->

					</div>
					<!-- right_bar_start-->

				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
