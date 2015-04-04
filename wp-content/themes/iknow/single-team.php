<?php get_header(); 
 if ( have_posts() ){ while (have_posts()){ the_post();
	
	global $post;
	
	$team_social = '';
	$sidebar = '';
	$left_sidebar = '';
	$right_sidebar = '';
	$team_designation = '';
	$team_email = '';
	$team_join = '';
	$page_caption = '';
	// Get Post Meta Elements detail 
	$team_detail_xml = get_post_meta($post->ID, 'team_detail_xml', true);
	if($team_detail_xml <> ''){
		$cp_team_xml = new DOMDocument ();
		$cp_team_xml->loadXML ( $team_detail_xml );
		$team_social = find_xml_value($cp_team_xml->documentElement,'team_social');
		$sidebar = find_xml_value($cp_team_xml->documentElement,'sidebar_team');
		$left_sidebar = find_xml_value($cp_team_xml->documentElement,'left_sidebar_team');
		$right_sidebar = find_xml_value($cp_team_xml->documentElement,'right_sidebar_team');
		$team_designation = find_xml_value($cp_team_xml->documentElement,'team_designation');
		$team_facebook = find_xml_value($cp_team_xml->documentElement,'team_facebook');
		$team_linkedin = find_xml_value($cp_team_xml->documentElement,'team_linkedin');
		$team_twitter = find_xml_value($cp_team_xml->documentElement,'team_twitter');
		$team_email = find_xml_value($cp_team_xml->documentElement,'team_email');
		$team_join = find_xml_value($cp_team_xml->documentElement,'team_join');
		$page_caption = find_xml_value($cp_team_xml->documentElement,'page_caption');
	}
	
	$select_layout_cp = '';
	$cp_general_settings = get_option('general_settings');
	if($cp_general_settings <> ''){
		$cp_logo = new DOMDocument ();
		$cp_logo->loadXML ( $cp_general_settings );
		$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
	}
	
	//Get Sidebar for page
	$sidebar_class = sidebar_func($sidebar);
	$header_style = '';
	$html_class_banner = '';
	$html_class = print_header_class($header_style);
	if($html_class <> ''){$html_class_banner = 'banner';}
	
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
								<?php if($page_caption <> ''){ ?><p><?php echo esc_html($page_caption);?></p><?php }else{ ?><p><?php esc_html_e('Lorem ipsum dolor sit amet, consetetur sadipscing elitr', 'crunchpress'); ?></p><?php }?>
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
		<?php }?>	
		<!--BREADCRUMS END--> 
		
    <div class="contant">
		<!--Inner Pages Heading Area End--> 
    	<div class="container">
			<!--MAIN CONTANT ARTICLE START-->
			<?php if($breadcrumbs == 'disable'){
				$class_margin='margin_top_cp_team';
			}else {
				$class_margin='team_bottom_margin';
			}
			?>
            <div class="main-content <?php echo esc_attr($class_margin);?>">
				<div class="team-content row-fluid">
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
					<?php $image_size = array('1170','350');?>
					<!--Blog Detail Page Page Start-->
					<div id="<?php the_ID(); ?>" class="<?php echo esc_attr($sidebar_class[1]);?> team_detail_cp ">
						<div <?php post_class(); ?>>
							<div class="first mbtm2 outer_lyr">
								<div class="inner_lyr">
									<div class="section_content"> 
										<div class="span4">
											<div class="our-team team-member-box">
												<div class=" teachers">
													<?php
													//Thumbnail for Team Members
													$thumbnail_id = get_post_thumbnail_id( $post->ID );
													$thumbnail = wp_get_attachment_image_src( $thumbnail_id , array(350,350) ); 
													$thumbnail_img = wp_get_attachment_image_src( $thumbnail_id , 'full' );
													?>
													<div class="social-icons">
														<?php if(isset($team_facebook) AND $team_facebook <> ''){?>
															<a href="<?php echo esc_url($team_facebook);?>"><i class="fa fa-facebook"></i></a>
														<?php }?>
														<?php if(isset($team_twitter) AND $team_twitter <> ''){?>
															<a href="<?php echo esc_url($team_twitter);?>"><i class="fa fa-twitter"></i></a>
														<?php }?>
														<?php if(isset($team_linkedin) AND $team_linkedin <> ''){?>
															<a href="<?php echo esc_url($team_linkedin);?>"><i class="fa fa-linkedin"></i></a>
														<?php }?>
													</div>
													<div class="thumb">
														<?php if($thumbnail[1].'x'.$thumbnail[2] == '350x350'){ ?>
															<?php echo get_the_post_thumbnail($post->ID, array(350,350));?>
														<?php }?>
													</div>
													<div class="text">
														<h2><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html(get_the_title());?></a></h2>
														<?php if($team_designation <> ''){ ?><p><?php echo esc_attr($team_designation);?></p><?php }?>
													</div>
													
												</div>
											</div>	
										</div>	
										<div class="span8"> 
											<h3 class="h-style"><?php echo esc_html(get_the_title());?></h3>
											<?php 
												the_content();
												wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html_e( 'Pages:', 'crunchpress' ) . '</span>', 'after' => '</div>' ) );
											?>
											<?php
												echo '<div class="share-course team-detail-row">';
													//Post Social Sharing 
													if($team_social == "enable"){
														echo '<h4>'.esc_html_e('Share This Profile','crunchpress').'</h4>';
														echo include_social_shares();
														echo "<div class='clear'></div>";
													}
												echo '</div>';
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
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