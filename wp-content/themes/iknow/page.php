<?php
/*
 * This file is used to generate different page layouts set from backend.
 */
 
 	//Fetch the theme Option Values
	$maintenance_mode = get_themeoption_value('maintenance_mode','general_settings');
	$maintenace_title = get_themeoption_value('maintenace_title','general_settings');
	$countdown_time = get_themeoption_value('countdown_time','general_settings');
	$email_mainte = get_themeoption_value('email_mainte','general_settings');
	$mainte_description = get_themeoption_value('mainte_description','general_settings');
	$social_icons_mainte = get_themeoption_value('social_icons_mainte','general_settings');
	
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
 
get_header ();

	global $post,$post_id;
		$page_builder_full = get_post_meta ( $post->ID, "cp-show-full-layout", true );      
		if($page_builder_full == 'No'){
			$sidebar_class = '';
			$content_class = '';
			$sidebar = get_post_meta ( $post->ID, 'page-option-sidebar-template', true );
			$sidebar_class = sidebar_func($sidebar);
			$left_sidebar = get_post_meta ( $post->ID, "page-option-choose-left-sidebar", true );
			$right_sidebar = get_post_meta ( $post->ID, "page-option-choose-right-sidebar", true );
			
			
		}else{
			$sidebar_class = array('0'=>'no-sidebar','1'=>'no-sidebar');
			$content_class = array();
			$sidebar = array();
			$left_sidebar = '';
			$right_sidebar = '';
		}	
		
		//print_r(get_font_array());
		echo '<div class="clearfix clear"></div>';
		//echo '<pre>';print_r($all_font);die;
		// $myfont = get_font_array('Google Font');
		// foreach($myfont as $keys => $val){
			// print_R(get_google_font_url($keys));die;
		// }
		
		//echo '<pre>';print_r($myfont['ABeeZee']['subsets']);
		$slider_off = '';
		$slider_type = '';
		$slider_slide = '';
		$slider_height = '';
		$page_caption = '';
		
		//Fetch the data from page
		
		$slider_off = get_post_meta ( $post->ID, "page-option-top-slider-on", true );
		$slider_type = get_post_meta ( $post->ID, "page-option-top-slider-types", true );
		$slider_type_album = get_post_meta ( $post->ID, "page-option-top-slider-album", true );
		$page_builder_full = get_post_meta ( $post->ID, "cp-show-full-layout", true );
		$cp_page_title = get_post_meta ( $post->ID, "page-option-item-page-title", true );
		$page_caption = get_post_meta ( $post->ID, "page-option-item-page-caption", true );
		$subscribe = '<div class="newsletters">
        	<h1>Start 30-Day free trial today.</h1>
            <h4>Search for online courses on Web development, Yoga, Guitar lessons, or anything else.</h4>
            <div class="subscribe">
            	<input type="text" class="input-block-level">
                <button>Subscribe</button>
            </div>
        </div>';
		//If Slider Plugin Exist
		if(class_exists('cp_slider_class')){
			//Condition for Box Layout
				if($slider_off == 'Yes'){ 
					echo '<div class="banner_edu main-slider">';
						echo page_slider();
						//echo $subscribe;
						echo '</div>';	
				} //Slider Off			
		}
		
		if($slider_off <> 'Yes'){ ?>
			<?php 
			$breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
			if($breadcrumbs == 'enable'){ ?>
				<!--BANNER START-->
				<div class="page-heading">
					<div class="container">						
						<div class="row">
							<div class="span8">
								<?php if(get_the_title() <> ''){ ?><h2><?php echo esc_attr(get_the_title());?></h2><?php }?>
								<?php if($page_caption <> ''){ ?><p><?php echo esc_html($page_caption);?></p><?php }else{ ?><p><?php esc_html_e('','crunchpress'); ?></p><?php }?>
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
				<!--BANNER END-->
			<?php }?>	
		<?php }?><!--breadcrumb End--> 
				<!--CONTANT SECTION START-->
		<div class="contant">
			<div class="<?php if($page_builder_full <> 'Yes'){echo 'container';}else{echo 'full-width-content';}?>">
				<?php if($slider_off == 'No'){ ?>
					<?php if($page_builder_full == 'Yes'){echo '<div class="container">';}?>
						<?php if($cp_page_title <> ''){ ?><h2 class="h-style"><?php echo esc_attr($cp_page_title);?></h2><?php }?>
					<?php if($page_builder_full == 'Yes'){echo '</div>';}?>	
				<?php }?>
					<div class="page_content row-fluid">
						<?php
						if($sidebar == "left-sidebar" || $sidebar == "both-sidebar" || $sidebar == "both-sidebar-left"){ ?>
							<div id="block_first" class="sidebar side-bar <?php echo esc_attr($sidebar_class[0]);?>">
								<?php dynamic_sidebar( $left_sidebar ); ?>
							</div>
							<?php
						}
						if($sidebar == 'both-sidebar-left'){ ?>
						<div id="block_first_left" class="sidebar side-bar <?php echo esc_attr($sidebar_class[0]);?>">
							<?php dynamic_sidebar( $right_sidebar );?>
						</div>
						<?php } ?>
						<div id="block_content_first" class="<?php echo esc_attr($sidebar_class[1]);?>">
							<div class="row-fluid">
								<?php
								$cp_page_xml = get_post_meta($post->ID,'page-option-item-xml', true);		
									global $cp_item_row_size;
									$cp_item_row_size = 0;	
									$counter = 0;
									// Page Item Part
									if (! empty ( $cp_page_xml )) {
										$page_xml_val = new DOMDocument ();
										$page_xml_val->loadXML ( $cp_page_xml );
										foreach ( $page_xml_val->documentElement->childNodes as $item_xml ) {
											$counter++;
											switch ($item_xml->nodeName) {
												case 'Accordion' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm' );
													print_accordion_item ( $item_xml );
													echo '</div>';
													break;
												case 'Blog' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ));
													print_blog_item ( $item_xml );
													echo '</div>';
												break;
												case 'Timeline' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm timeline-posts');
													if(class_exists('cp_timeline_class')){
														$cp_timeline_class = new cp_timeline_class;
														$cp_timeline_class->print_timeline_item($item_xml);
													}													
													echo '</div>';
													break;
												case 'Division_Start' :
													if($page_builder_full == 'Yes'){
														// print_item_size ( find_xml_value ( $item_xml, 'size' ));
														// echo '</div>';
														print_div_item ( $item_xml );
													}	
													break;	
												case 'Division_End' :
													if($page_builder_full == 'Yes'){
														// print_item_size ( find_xml_value ( $item_xml, 'size' ));
														// echo '</div>';
														print_div_end_item ( $item_xml );
													}	
													break;		
												case 'Events' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'events_cp mbtm');
													if(class_exists('EM_Events')){
														$cp_events_class = new cp_events_class;
														$cp_events_class->page_event_manager_plugin($item_xml);
													}
													echo '</div>';
													break;
												case 'Woo-Products' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm woo-produ-cp');
													if(class_exists('function_library')){
														if(class_exists("Woocommerce")){
															print_wooproduct_item ( $item_xml );
														}	
													}
													echo '</div>';
												break;
												case 'Sermons-Gallery' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm sermons-gallery-cp');
													if(class_exists('cp_album_class')){
														$cp_album_class = new cp_album_class;
														$cp_album_class->print_gallery_sermons_item ( $item_xml );
													}
													echo '</div>';
												break;
												case 'Popular-Posts' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm papular-post');
													print_featured_item ( $item_xml );
													echo '</div>';
												break;
												case 'Topics' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm course-topic');
													$cp_education_class = new cp_education_class;
													$cp_education_class->cp_course_topics ( $item_xml );
													echo '</div>';
												break;
												case 'Sermons' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm sermons-cp');
													if(class_exists('cp_album_class')){
														$cp_album_class = new cp_album_class;
														$cp_album_class->print_sermons_listing_item ( $item_xml );
													}
													echo '</div>';
												break;
												case 'Events-Counter' :
													if(class_exists('function_library')){
														if(class_exists('EM_Events')){
															print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm');
															$cp_events_class = new cp_events_class;
															$cp_events_class->print_count_events_item ( $item_xml );
															echo '</div>';
														}
													}
												break;
												case 'Event-Slider' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm upcoming-events-box');
													if(class_exists('function_library')){
														if(class_exists('EM_Events')){
															$cp_events_class = new cp_events_class;
															$cp_events_class->print_upcomming_event ( $item_xml );
														}
													}
													echo '</div>';
												break;
												case 'Next-Events' :
													if(class_exists('function_library')){
														if(class_exists('EM_Events')){
															print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm');
															$cp_events_class = new cp_events_class;
															$cp_events_class->print_next_events_item ( $item_xml );
															echo '</div>';
														}
													}
													break;
												case 'Newest-Sermons' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm newest-sermons-cp');
													if(class_exists('cp_album_class')){
														$cp_album_class = new cp_album_class;
														$cp_album_class->print_newest_sermons_item ( $item_xml );
													}
													echo '</div>';
													break;													
												case 'Modern-Blog' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm');
													print_blog_modern_item ( $item_xml );
													echo '</div>';
													break;	
												case 'Sidebar' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm');
													print_sidebar_item ( $item_xml );
													echo '</div>';
													break;		
												case 'Pastors' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'pastors fadeIn cp_load mbtm');
													if(class_exists('cp_album_class')){
														$cp_album_class = new cp_album_class;
														$cp_album_class->print_pastor_item_item ( $item_xml );
													}
													echo '</div>';
													break;		
												case 'News' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm latest-news-cp');
													print_news_item ( $item_xml );
													echo '</div>';
													break;
												case 'Our-Team' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm our-team-cp');
													if(class_exists('cp_team_class')){
													$cp_team_class = new cp_team_class;
														$cp_team_class->print_team_item ( $item_xml );
													}
													echo '</div>';
													break;
												case 'Contact-Form' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ), 'mt0 fadeIn cp_load mbtm' );
													print_contact_form ( $item_xml );
													echo '</div>';
													break;
												case 'Column' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm column' );														
													print_column_item ( $item_xml );
													echo '</div>';
													break;
												case 'Services' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'feature fadeIn cp_load mbtm' );
													print_column_service ( $item_xml );
													echo '</div>';
													break;
												case 'Content' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ) ,'fadeIn cp_load mbtm');
													print_content_item ( $item_xml );
													echo '</div>';
													break;
												case 'Divider' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ), 'wrapper fadeIn cp_load' );
													print_divider ( $item_xml );
													echo '</div>';
													break;
												case 'Gallery' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'overflow_class mbtm');
													print_gallery_item ( $item_xml );
													echo '</div>';
													break;
												case 'Message-Box' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm' );
													print_message_box ( $item_xml );
													echo '</div>';
													break;
												case 'Slider' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ), 'containter_slider fadeIn cp_load mbtm' );
													print_slider_item ( $item_xml );
													echo '</div>';
													break;
												case 'Tab' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'fadeIn cp_load mbtm' );
													print_tab_item ( $item_xml );
													echo '</div>';
													break;
												case 'Testimonial' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm');
													if(class_exists('cp_testi_class')){
													$cp_testi_class = new cp_testi_class;
														$cp_testi_class->print_testimonial ( $item_xml );
													}
													echo '</div>';
													break;
												case 'Client-Slider' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm testimonials');
													if(class_exists('cp_testi_class')){
													$cp_testi_class = new cp_testi_class;
														$cp_testi_class->print_testimonial_slider ( $item_xml );
													}
													echo '</div>';
													break;	
												case 'Portfolio' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm portfolio-gallery-cp');
													if(class_exists('cp_portfolio_class')){
													$cp_portfolio_class = new cp_portfolio_class;
														$cp_portfolio_class->print_port_item ( $item_xml );
													}
													echo '</div>';
													break;	
												case 'Portfolio-Gallery' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm');
													if(class_exists('cp_portfolio_class')){
													$cp_portfolio_class = new cp_portfolio_class;
														$cp_portfolio_class->portfolio_gallery ( $item_xml );
													}
													echo '</div>';
													break;
												case 'Carousel' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm');
													if(class_exists('cp_timeline_class')){
													$cp_timeline_class = new cp_timeline_class;
														$cp_timeline_class->timeline_slider ( $item_xml );
													}
													echo '</div>';
													break;
												case 'Courses' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm education_courses');
													if(class_exists('cp_education_class')){
													$cp_education_class = new cp_education_class;
														$cp_education_class->course_item_element ( $item_xml );
													}
													echo '</div>';
													break;														
												case 'Crowd-Funding' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm');
													print_ignition_item($item_xml);
													echo '</div>';
													break;	
												case 'Feature-Projects' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm');
													//print_ignition_item($item_xml);
													echo '</div>';
													break;								
												case 'Toggle-Box' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm' );
													print_toggle_box_item ( $item_xml );
													echo '</div>';
													break;
												case 'DonateNow' :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm' );
													print_donate_item ( $item_xml );
													echo '</div>';
													break;	
												default :
													print_item_size ( find_xml_value ( $item_xml, 'size' ),'mbtm' );
													echo '</div>';
													break;
											}
										}
										//Content Area
										if($page_xml_val->documentElement->childNodes->length == 0){
											print_default_content_item();
										}										
									}else{
										print_default_content_item();
									}
							   ?>
							</div>
						</div>
						<?php
						wp_reset_query();
						wp_reset_postdata();
						global $post,$post_id;
						$page_builder_full = get_post_meta ( $post->ID, "cp-show-full-layout", true );      
						if($page_builder_full == 'No'){
							$sidebar_class = '';
							$content_class = '';
							$sidebar = get_post_meta ( $post->ID, 'page-option-sidebar-template', true );
							$sidebar_class = sidebar_func($sidebar);
							$left_sidebar = get_post_meta ( $post->ID, "page-option-choose-left-sidebar", true );
							$right_sidebar = get_post_meta ( $post->ID, "page-option-choose-right-sidebar", true );
						}else{
							$sidebar_class = array();
							$content_class = array();
							$sidebar = array();
							$left_sidebar = '';
							$right_sidebar = '';
						}	
						if($sidebar == "both-sidebar-right"){ ?>
							<div id="block_second" class="sidebar side-bar <?php echo esc_attr($sidebar_class[0]);?>">
								<?php dynamic_sidebar( $left_sidebar ); ?>
							</div>
							<?php
						}
						if($sidebar == 'both-sidebar-right' || $sidebar == "right-sidebar" || $sidebar == "both-sidebar"){ ?>
							<div id="block_second_right" class="sidebar side-bar <?php echo esc_attr($sidebar_class[0]);?>">
								<?php dynamic_sidebar( $right_sidebar );?>
							</div>
						<?php } ?>
					</div>
				</div>
					<div class="clear clearfix"></div>
		</div>
	
	
	<?php
		//Reset all data now
		wp_reset_query();
		wp_reset_postdata();
	?>
<div class="clearfix"></div>
<?php get_footer(); 

}
?>