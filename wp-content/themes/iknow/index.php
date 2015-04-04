<?php
/*
 * This file is used to generate main index page.
 */
					
	//Fetch the theme Option Values
	$maintenance_mode = get_themeoption_value('maintenance_mode','general_settings');
	$maintenace_title = get_themeoption_value('maintenace_title','general_settings');
	$countdown_time = get_themeoption_value('countdown_time','general_settings');
	$email_mainte = get_themeoption_value('email_mainte','general_settings');
	$mainte_description = get_themeoption_value('mainte_description','general_settings');
	$social_icons_mainte = get_themeoption_value('social_icons_mainte','general_settings');
	$page_caption = '';
	$page_caption = get_post_meta ( $post->ID, "page-option-item-page-caption", true );
	
	if($maintenance_mode <> 'disable'){
		//If Logged in then Remove Maintenance Page
		if ( is_user_logged_in() ) {
			$maintenance_mode = 'disable';
		} else {
			$maintenance_mode = 'enable';
		}
	}
	
	if($maintenance_mode == 'enable'){
		//Trigger the Maintenance Mode Function Here
		maintenance_mode_fun();
	}else{

		@get_header();
		
		global $post,$post_id;
		$item_class = '';
		//Get Default Option for Archives, Category, Search.
			$num_excerpt = '';
			$cp_default_settings = get_option('default_pages_settings');
			
			if($cp_default_settings != ''){
				$cp_default = new DOMDocument ();
				$cp_default->loadXML ( $cp_default_settings );
				$sidebar = find_xml_value($cp_default->documentElement,'sidebar_default');
				$right_sidebar = find_xml_value($cp_default->documentElement,'right_sidebar_default');
				$left_sidebar = find_xml_value($cp_default->documentElement,'left_sidebar_default');
				$num_excerpt = find_xml_value($cp_default->documentElement,'default_excerpt');
			}	
			//Get Default Excerpt
			if($num_excerpt == ''){$num_excerpt = 250;}
			
		$sidebar_class = '';
		$content_class = '';
		
		//Get Sidebar for page
		$sidebar_class = sidebar_func($sidebar);
		
		
		$breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
		if($breadcrumbs == 'enable'){ ?>
		<!--BREADCRUMS START-->
		<div class="page-heading">
			<div class="container">						
				<div class="row">
					<div class="span8">
						<?php if(get_the_title() <> ''){ ?><h2><?php echo esc_attr(get_the_title());?></h2><?php }?>
						<?php if($page_caption <> ''){ ?><p><?php echo esc_html($page_caption);?></p><?php }else{ ?><p> <?php esc_html_e('','crunchpress'); ?></p><?php }?>
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
			<div class="container"> 

				<!--MAIN CONTANT ARTICLE START-->
				<div class="main-content">
					<div class="single_content row-fluid">
						<?php
						if($sidebar == "left-sidebar" || $sidebar == "both-sidebar" || $sidebar == "both-sidebar-left"){?>
							<div id="block_first" class="sidebar <?php echo esc_attr($sidebar_class[0]);?>">
								<?php dynamic_sidebar( $left_sidebar ); ?>
							</div>
							<?php
						}
						if($sidebar == 'both-sidebar-left'){?>
						<div id="block_first_left" class="sidebar <?php echo esc_attr($sidebar_class[0]);?>">
							<?php dynamic_sidebar( $right_sidebar );?>
						</div>
						<?php } ?>
						<div id="<?php the_ID(); ?>" class="<?php echo esc_attr($sidebar_class[1]);?> blog_post_detail bg_white_post">
									<?php
									//Feature Sticky Post	
										if ( is_front_page() && cp_has_featured_posts() ) {
											// Include the featured content template.
											get_template_part( 'featured-content' );
										}
										$mask_html = '';
										$no_image_class = 'no-image';
									?>
									<?php while ( have_posts() ) : the_post();
										//If image exists print its mask
											$mask_html = '';
											$no_image_class = 'no-image';
											if(get_the_post_thumbnail($post_id, array(1170,350)) <> ''){
												$mask_html = '<div class="mask">
													<a href="'.esc_url(get_permalink()).'#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a>
													<a href="'.esc_url(get_permalink()).'" class="anchor"> <i class="fa fa-link"></i></a>
												</div>';
												$no_image_class = 'image-exists';
											}	
									?>
										<!--BLOG LIST ITEM START-->
										<div <?php post_class($item_class); ?>>
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
								<?php endwhile; pagination();?>
						</div>
						<?php
						if($sidebar == "both-sidebar-right"){?>
							<div class="<?php echo esc_attr($sidebar_class[0]);?>">
								<?php dynamic_sidebar( $left_sidebar ); ?>
							</div>
							<?php
						}
						if($sidebar == 'both-sidebar-right' || $sidebar == "right-sidebar" || $sidebar == "both-sidebar"){?>
						<div class="<?php echo esc_attr($sidebar_class[0]);?>">
							<?php dynamic_sidebar( $right_sidebar );?>
						</div>
						<?php } ?>			
					</div>
				</div>	
			</div>
		</div>	
<?php 
		//Reset all data now
		wp_reset_query();
		wp_reset_postdata();
			
		@get_footer();
}
 ?>