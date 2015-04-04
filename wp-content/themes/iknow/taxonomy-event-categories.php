<?php
/*
 * This file is used to generate WordPress standard archive/category pages.
 */
get_header ();
	
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
	
	if(empty($paged)){
		$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
	}
	global $paged,$post,$sidebar,$blog_div_size_num_class,$counter,$wp_query;	
		
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
	
		$select_layout_cp = '';
		$cp_general_settings = get_option('general_settings');
		if($cp_general_settings <> ''){
			$cp_logo = new DOMDocument ();
			$cp_logo->loadXML ( $cp_general_settings );
			$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
		}
		
		$sidebar_class = '';
		$content_class = '';
		
		//Get Sidebar for page
		$sidebar_class = sidebar_func($sidebar);
		$header_style = '';
	$html_class_banner = '';
	$html_class = print_header_class($header_style);
	if($html_class <> ''){$html_class_banner = 'banner';}
	?>	
	<!--BANNER START-->
	<div class="page-heading">
		<div class="container">						
			<?php if (is_category()) { ?>
				<h2 class="h-style"><?php esc_html_e('Categories', 'crunchpress'); ?> <?php echo esc_attr(single_cat_title()); ?></h2>
				<?php } elseif (is_day()) { ?>
					<h2 class="h-style"><?php esc_html_e('Archive for', 'crunchpress'); ?> 
					<?php echo esc_attr(get_the_date(get_option("time_format"))); ?></h2>
				<?php } elseif (is_month()) { ?>
					<h2 class="h-style"><?php esc_html_e('Archive for', 'crunchpress'); ?> <?php echo esc_attr(get_the_date(get_option("time_format"))); ?></h2>
				<?php } elseif (is_year()) { ?>
					<h2 class="h-style"><?php esc_html_e('Archive for', 'crunchpress'); ?> <?php echo esc_attr(get_the_date(get_option("time_format"))); ?></h2>
				<?php }elseif (is_search()) { ?>
					<h2 class="h-style"><?php esc_html_e('Search results for', 'crunchpress'); ?> : <?php echo esc_attr(get_search_query()) ?></h2>
				<?php } elseif (is_tag()) { ?>
					<h2 class="h-style"><?php esc_html_e('Tag Archives', 'crunchpress'); ?> : <?php echo esc_attr(single_tag_title('', true)); ?></h2>
				<?php }elseif (is_author()) { ?>
					<h2 class="h-style"><?php esc_html_e('Archive by Author', 'crunchpress'); ?></h2>
				<?php }?>
				<?php
					if(!is_front_page()){
						echo cp_breadcrumbs();
					}
				?>
		</div>
	</div>
	<!--BANNER END-->
    <div class="contant">
    	<div class="container">
            <!--MAIN CONTANT ARTICLE START-->
            <div class="main-content main-content-area">
				
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
					<div id="archive-<?php the_ID(); ?>" class="<?php echo esc_attr($sidebar_class[1]);?> blog_listing blog_post_detail cp-blog">
						<div <?php post_class(); ?>>
							<?php if (is_author()) {
								if ( have_posts() ) {
									the_post();?>
									<div class="clear"></div>
									<!--DETAILED TEXT END-->
									<div class="about-admin">
										<div class="thumb">
											<?php echo esc_attr(get_avatar(get_the_author_meta( 'ID' )));?>
										</div>
										<div class="text">
											<h4><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
													<?php the_author(); ?>
												</a>
											</h4>
											<p><?php echo mb_substr(esc_html(get_the_author_meta( 'description' )),0,360);?></p>
											<div class="share-it">
												<h5><?php esc_html_e('Follow Me','crunchpress');?></h5>
												<?php 
													$facebook = get_the_author_meta('facebook');
													$twitter = get_the_author_meta('twitter');
													$gplus = get_the_author_meta('gplus');
													$linked = get_the_author_meta('linked');
													$skype = get_the_author_meta('skype');
												?>
												<?php if($facebook <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo esc_url($facebook);?>" data-original-title="facebook"><i class="fa fa-facebook"></i></a><?php }?>
												<?php if($twitter <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo esc_url($twitter);?>" data-original-title="Twitter"><i class="fa fa-twitter"></i></a><?php }?>
												<?php if($gplus <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo esc_url($gplus);?>" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a><?php }?>
												<?php if($linked <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo esc_url($linked);?>" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a><?php }?>
												<?php if($skype <> ''){ ?><a title="" data-toggle="tooltip" href="<?php echo esc_url($skype);?>" data-original-title="skype"><i class="fa fa-skype"></i></a><?php }?>
											</div>
										</div>
									</div>
									<div class="clear"></div>
								<?php
								} wp_reset_query();
							}
							if ( have_posts() ) : while ( have_posts() ) : the_post();
							//Image dimension
							global $post, $post_id;	
							$mask_html = '';
							$no_image_class = 'no-image';
							if(get_the_post_thumbnail($post_id, array(1170,350)) <> ''){
								$mask_html = '<div class="mask">
									<a href="'.esc_url(get_permalink()).'#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a>
									<a href="'.esc_url(get_permalink()).'" class="anchor"> <i class="fa fa-link"></i></a>
								</div>';
								$no_image_class = 'image-exists';
							}	
							$arc_div_archive_listing_class = array("Full-Image" => array("index"=>"1", "class"=>"sixteen ", "size"=>array(1170,420), "size2"=>array(770, 400), "size3"=>array(570,300)));
							$item_type = 'Full-Image';
							$item_class = $arc_div_archive_listing_class[$item_type]['class'];
							$item_index = $arc_div_archive_listing_class[$item_type]['index'];		
							if( $sidebar == "no-sidebar" ){
								$item_size = $arc_div_archive_listing_class[$item_type]['size'];
							}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
								$item_size = $arc_div_archive_listing_class[$item_type]['size2'];
							}else{
								$item_size = $arc_div_archive_listing_class[$item_type]['size3'];
							}
							?>
							<!--BLOG LIST ITEM START-->
							<div <?php post_class($item_class); ?>>
								<div class="blog_cp-contant">
									<h2><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html(get_the_title());?></a></h2>
									<?php the_tags('<div class="blog_cp-tags"><i class="fa fa-tags"></i>',' ',' </div>');
									if(print_blog_thumbnail($post->ID,array(1600,900)) <> ''){ ?>
										<div class="thumb">
											<?php echo print_blog_thumbnail($post->ID,array(1600,900));?>
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
							//End while
							endwhile; 
							//Condition Ends
							endif;
							//Pagination
							pagination();
						?>
						</div>
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
<div class="clear"></div>
<?php get_footer(); ?>