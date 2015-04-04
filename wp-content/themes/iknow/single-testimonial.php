<?php get_header(); ?>
<?php if ( have_posts() ){ while (have_posts()){ the_post();
	global $post;
	
	// Get Post Meta Elements detail 
	$post_social = '';
	$sidebar = '';
	$right_sidebar = '';
	$left_sidebar = '';
	$thumbnail_types = '';
	$page_caption = '';
	
	$post_format = get_post_meta($post->ID, 'post_format', true);
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
		$page_caption = find_xml_value($cp_post_xml->documentElement,'page_caption');
		$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');	
	}
	
	$select_layout_cp = '';
	$cp_general_settings = get_option('general_settings');
	if($cp_general_settings <> ''){
		$cp_logo = new DOMDocument ();
		$cp_logo->loadXML ( $cp_general_settings );
		$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
	}
	
	global $sidebar,$blog_div_listing_num_class,$counter,$post_id;
	
		// get the item class and size from array
		$item_type = 'Full-Image';
		$item_class = $blog_div_listing_num_class[$item_type]['class'];
		$item_index = $blog_div_listing_num_class[$item_type]['index'];
		if( $sidebar == "no-sidebar" ){
			$item_size = $blog_div_listing_num_class[$item_type]['size'];
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$item_size = $blog_div_listing_num_class[$item_type]['size2'];
		}else{
			$item_size = $blog_div_listing_num_class[$item_type]['size3'];
			$item_class = 'both_sidebar_class';
		} 
	
	$sidebar_class = '';
	$content_class = '';
	
	//Get Sidebar for page
	$sidebar_class = sidebar_func($sidebar);
	$header_style = '';
	$html_class_banner = '';
	$html_class = print_header_class($header_style);
	if($html_class <> ''){$html_class_banner = 'banner';}
		$breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
		if($breadcrumbs == 'enable'){ ?>
		<!--BREADCRUMS START-->
		<div class="page-heading">
			<div class="container">						
				<div class="row">
					<div class="span8">
						<?php if(get_the_title() <> ''){ ?><h2><?php echo esc_attr(get_the_title());?></h2><?php }?>
						<?php if($page_caption <> ''){ ?><p><?php echo esc_html($page_caption);?></p><?php }else{ ?><p><?php esc_html_e('Lorem ipsum dolor sit amet, consetetur sadipscing elitr','crunchpress');?></p><?php }?>
					</div>
					<div class="span4">
						<?php
							if(!is_front_page()){
								echo cp_breadcrumbs();
							}
						?>
					</div>						
				</div>
			</div>
		</div>
		<?php } ?>
		<!--BREADCRUMS END--> 
		<div class="contant">		
			<?php 
			if($breadcrumbs == 'disable'){
				$class_margin='margin_top_cp';
			}else {
				$class_margin='';
			}?>
			<div class="blog-page <?php echo esc_attr($class_margin);?>">
				<div class="container">
					<div class="row-fluid">
						<?php
						if($sidebar == "left-sidebar" || $sidebar == "both-sidebar" || $sidebar == "both-sidebar-left"){?>
							<div id="block_first" class="sidebar side-bar <?php echo esc_attr($sidebar_class[0]);?>">
								<?php dynamic_sidebar( $left_sidebar ); ?>
							</div>
							<?php
						}
						if($sidebar == 'both-sidebar-left'){?>
							<div id="block_first_left" class="sidebar side-bar <?php echo esc_attr($sidebar_class[0]);?>">
								<?php dynamic_sidebar( $right_sidebar );?>
							</div>
						<?php } ?>
							<!--Blog Detail Page Page Start-->
							<div id="<?php the_ID(); ?>" class="<?php echo esc_attr($sidebar_class[1]);?> blog-content <?php echo esc_attr($thumbnail_types);?>">
								<div class="blog_cp-contant">
									<?php if(get_the_title() <> ''){ ?><h2><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html(get_the_title());?></a></h2><?php }?>
									<div class="text">
										<p><?php the_content();?></p>
									</div>
								</div>
							</div>
						<!--Blog Detail Page Page End--> 
						<?php
						if($sidebar == "both-sidebar-right"){?>
							<div class="<?php echo esc_attr($sidebar_class[0]);?> side-bar">
								<?php dynamic_sidebar( $left_sidebar ); ?>
							</div>
							<?php
						}
						if($sidebar == 'both-sidebar-right' || $sidebar == "right-sidebar" || $sidebar == "both-sidebar"){?>
							<div class="<?php echo esc_attr($sidebar_class[0]);?> side-bar">
								<?php dynamic_sidebar( $right_sidebar );?>
							</div>
						<?php } ?>				
					</div>
				</div>
			</div>
		</div>
<?php 
	}
}
?>
<div class="clearfix"></div>
<?php get_footer(); ?>