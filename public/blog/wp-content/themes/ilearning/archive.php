<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$queried_object = get_queried_object();
$cat_slug       = $queried_object->slug;
$term_name      = $queried_object->name;
$termid         = $queried_object->term_id;
if (is_category()){
	$taxonomy       = 'category';
}elseif (is_tag()){
	$taxonomy       = 'post_tag';
}
get_header();
?>

<div class="all_banner gray_bg">
	<div class="auto_content">
		<div class="all_banner_inner">
			<div class="banner_heading">
				<strong><?php echo $term_name; ?></strong>
			</div>
		</div>
	</div>
</div>
<main class="content">
	<section class="blog_main">

		<div class="blog">
			<div class="auto_content">
				<div class="blog_inner clearfix">

					<!-- Left_bar_start-->
					<div class="cp_course_left">
						<div class="cp_course_left_inner">
							<?
							$post_search    =   $_GET['searchpost'];
							if (isset($_GET['searchpost']) && $_GET['searchpost'] != "")
							//if click on search this section will be load "ELSE....". 
							{
								$paged = (get_query_var('page')) ? absint(get_query_var('page')) : 1;
								$var = query_posts('post_type=post&posts_per_page=2&s=' . $post_search . '&order=ASC&paged=' . $paged);

								//count if no record found than show this message.	
								$counter = count($var);
								if ($counter == 0) {
							?>
									<div class="Search_no_result">
										<h1>Nothing Found</h1>
										<p class="no_match_found">Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
									</div>
								<? } else {
									//if search result found than show search result listing.	
								?>

									<div class="blog_list">
										<ul>
											<?php

											while (have_posts()) : the_post();
												$blogImage     = get_field('image');
												$post_day      = get_the_time('j', $post->ID);
												$post_menth    = get_the_time('F', $post->ID);
												$author_name   = get_the_author();
											?>
												<li>
													<div class="blog_detail">
														<div class="blog_img">
															<a href="<?php the_permalink() ?>"><img src="<?php echo $blogImage; ?>" alt="#"></a>
															<strong><?php echo $post_day; ?><em><?php echo $post_menth; ?></em></strong>
														</div>
														<div class="blog_text">
															<a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a>
															<ul>
																<li><a class="blog_admin" hre="javascript:void(0);"><?php echo $author_name; ?></a></li>
																<li><a class="blog_comment" hre="javascript:void(0);"><?php echo comment_count($post->ID); ?> comments</a></li>
															</ul>
															<p><? echo $contentext = get_the_content();
																//echo substr($contentext,0,196)."..."; 
																?></p>
														</div>
													</div>
												</li>
											<? endwhile; ?>


										</ul>
									</div>

								<? }
							} else {
								//if not searching than simplpe posts section will be load.
								?>

								<div class="blog_list">
									<ul>
										<?php
										$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
										//query_posts('post_type=post&posts_per_page=2&order=ASC&paged=' . $paged);
										query_posts( array(  
											'post_type' => 'post', 
											'paged' => $paged, 
											'posts_per_page' => 2, 
											'tax_query' => array( 
												array( 
													'taxonomy' => $taxonomy, //or tag or custom taxonomy
													'field' => 'id', 
													'terms' => $termid//array('9') 
												) 
											) 
										) );

										while (have_posts()) : the_post();
											$blogImage     = get_field('image');
											$post_day      = get_the_time('j', $post->ID);
											$post_menth    = get_the_time('F', $post->ID);
											$author_name   = get_the_author();
										?>
											<li>
												<div class="blog_detail">
													<div class="blog_img">
														<a href="<?php the_permalink() ?>"><img src="<?php echo $blogImage; ?>" alt="#"></a>
														<strong><?php echo $post_day; ?><em><?php echo $post_menth; ?></em></strong>
													</div>
													<div class="blog_text">
														<a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a>
														<ul>
															<li><a class="blog_admin" hre="javascript:void(0);"><?php echo $author_name; ?></a></li>
															<li><a class="blog_comment" hre="javascript:void(0);"><?php echo comment_count($post->ID); ?> comments</a></li>
														</ul>
														<p><? echo $contentext = get_the_content();
															//echo substr($contentext,0,196)."..."; 
															?></p>
													</div>
												</div>
											</li>
										<? endwhile; ?>


									</ul>
								</div>
							<? } ?>
							<div class="pagination_main">
								<?php wpbeginner_numeric_posts_nav();
								//wp_reset_query();  
								?>
							</div>

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
										$selected  = ($cat_slug==$term->slug) ? 'cat_selected' : '';
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
											$selected      = ($post->ID==$postId) ? 'cat_selected' : '';

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
													<a href="<?php the_permalink(); ?>"></a>
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
									<strong>Tags </strong>
									<ul>
										<? $posttags = get_the_tags(); 
										   //$cat_slug;
										?>
										<? if (!empty($posttags)) {?>
											<?  foreach ($posttags as $this_tag) {
												$tag_link = get_tag_link($this_tag->term_id);
												$selected  = ($cat_slug==$this_tag->slug) ? 'cat_selected' : '';
											?>
												<li><a class="<?php echo $selected;?>" href="<?php echo $tag_link; ?>"><? echo $tagdisplay = $this_tag->name; ?></a></li>
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
