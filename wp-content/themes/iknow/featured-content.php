<?php
/**
 * The template for displaying featured content
 *
 * @package CrunchPress
 * @subpackage Rockon
 */
?>

<div id="featured-content" class="featured-content cp-blog">
	<div class="featured-content-inner cp-blog">
	<?php
		/**
		 * Fires before the Twenty Fourteen featured content.
		 *
		 * @since Twenty Fourteen 1.0
		 */
		//do_action( 'twentyfourteen_featured_posts_before' );
		
		$thumbnail_types = '';
		$counter_posts = 1;
		$featured_posts = cp_get_featured_posts();
		foreach ( (array) $featured_posts as $order => $post ) :
			setup_postdata( $post ); 
			$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
			if($post_detail_xml <> ''){
				$cp_post_xml = new DOMDocument ();
				$cp_post_xml->loadXML ( $post_detail_xml );
				$post_social = find_xml_value($cp_post_xml->documentElement,'post_social');
				$sidebar = find_xml_value($cp_post_xml->documentElement,'sidebar_post');
				$right_sidebar = find_xml_value($cp_post_xml->documentElement,'right_sidebar_post');
				$left_sidebar = find_xml_value($cp_post_xml->documentElement,'left_sidebar_post');
				$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
				$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
				$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');	
			}	
			?>
			<!--BLOG LIST ITEM START-->
			<div <?php post_class(); ?>>
				<div class="blog_cp-contant">
					<h2><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html(get_the_title());?></a></h2>
					<?php the_tags('<div class="blog_cp-tags"><i class="fa fa-tags"></i>',' ',' </div>');?>
					<?php if(print_blog_thumbnail($post->ID,array(1170,350)) <> ''){ ?>
						<div class="thumb">
							<?php echo print_blog_thumbnail($post->ID,array(1170,350));?>
						</div>
					<?php }?>
					<div class="text">
						<?php the_content();?>						
					</div>
					<div class="blog_cp-comments">
						<a href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-user"></i><?php echo esc_attr(get_the_author());?></a>
						<a href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-calendar"></i><?php echo esc_attr(get_the_date(get_option('date_format')));?></a>
							<?php
								//Get Post Comment 
								comments_popup_link( __('<i class="fa fa-comments-o"></i>	 0 Comment','crunchpress'),
								__('<i class="fa fa-comment"></i>	 1 Comment','crunchpress'),
								__('<i class="fa fa-comment"></i>	 % Comments','crunchpress'), '',
								__('<i class="fa fa-comment"></i>	 Comments are off','crunchpress') );
							?>
					</div>
				</div>					
			</div>
			<!--BLOG LIST ITEM END-->
			<?php
		endforeach;
		
		/**
		 * Fires after the Twenty Fourteen featured content.
		 *
		 * @since Twenty Fourteen 1.0
		 */
		//do_action( 'twentyfourteen_featured_posts_after' );

		wp_reset_postdata();
	?>
	</div><!-- .featured-content-inner -->
</div><!-- #featured-content .featured-content -->
