<?php get_header(); ?>
<?php if ( have_posts() ){ while (have_posts()){ the_post();
	global $current_user,$post,$post_id;
	
	$course = $post;
	
	
	$course_selected = '';
	$lesson_prerequisite = '';
	$lesson_preview = '';
	$lesson_order = '';
	$lesson_caption = '';
	$lesson_detail_xml = get_post_meta($post->ID, 'lesson_detail_xml', true);
	$course_tutor = get_post_meta($post->ID, 'course_tutor', true);
	$course_selected = get_post_meta($post->ID, 'course_selected', true);
	$lesson_order = get_post_meta($post->ID, 'lesson_order', true);
	
	if($lesson_detail_xml <> ''){
		$cp_team_xml = new DOMDocument ();
		$cp_team_xml->loadXML ( $lesson_detail_xml );				
		$lesson_prerequisite = find_xml_value($cp_team_xml->documentElement,'lesson_prerequisite');
		$lesson_preview = find_xml_value($cp_team_xml->documentElement,'lesson_preview');
		$lesson_caption = find_xml_value($cp_team_xml->documentElement,'lesson_caption');		
	}
	
	$sidebar = '';
	$right_sidebar = '';
	$left_sidebar = '';
	$audio_url_type = '';
	$post_thumbnail = '';
	$video_url_type = '';
	$select_slider_type = '';
	$course_id = '';
	$product_selected = '';
	$duration_field = '';	
	// Get Post Meta Elements detail 
	$course_detail_xml = get_post_meta($course_selected, 'course_detail_xml', true);
	$course_tutor = get_post_meta($course_selected, 'course_tutor', true);
	if($course_detail_xml <> ''){
		$cp_course_xml = new DOMDocument ();
		$cp_course_xml->loadXML ( $course_detail_xml );
		$sidebar = find_xml_value($cp_course_xml->documentElement,'sidebars_port');
		$right_sidebar = find_xml_value($cp_course_xml->documentElement,'right_sidebar_port');
		$left_sidebar = find_xml_value($cp_course_xml->documentElement,'left_sidebar_port');	
		$audio_url_type = find_xml_value($cp_course_xml->documentElement,'audio_url_type');
		$post_thumbnail = find_xml_value($cp_course_xml->documentElement,'post_thumbnail');
		$video_url_type = find_xml_value($cp_course_xml->documentElement,'video_url_type');
		$select_slider_type = find_xml_value($cp_course_xml->documentElement,'select_slider_type');
		$course_id = find_xml_value($cp_course_xml->documentElement,'course_id');
		$duration_field = find_xml_value($cp_course_xml->documentElement,'duration_field');
		$product_selected = find_xml_value($cp_course_xml->documentElement,'product_selected');
		$feature_course = find_xml_value($cp_course_xml->documentElement,'feature_course');
	}
	
	
	$sidebar_class = '';
	$content_class = '';
	
	
	$current_user_url =  get_author_posts_url($current_user->ID);
	$take_quiz = add_query_arg( 'cp_show', 'take_quiz', get_permalink() );
	
	$lesson_id = get_the_author_meta( 'lesson_id', $current_user->ID );
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
						<?php if($lesson_caption <> ''){ ?><p><?php echo esc_html($lesson_caption);?></p><?php }else{ ?><p><?php esc_html_e('Lorem ipsum dolor sit amet, consetetur sadipscing elitr', 'crunchpress'); ?></p><?php }?>
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
		<!--BREADCRUMS END-->
	<?php } ?>
	<div class="content">
	<?php 
		if($breadcrumbs == 'disable'){
			$class_margin='margin_top_cp';
		}else {
			$class_margin='';
		} ?>
		<div class="blog-page <?php echo esc_attr($class_margin);?>">
			<div class="container">
			<!--MAIN CONTANT ARTICLE START-->
            <!--<div class="main-content">-->
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
					<!--CONTANT START-->						
					<div id="<?php the_ID(); ?>" class="<?php echo esc_attr($sidebar_class[1]);?> blog-content <?php echo esc_attr($post_thumbnail);?>">
						<?php 
						$cp_education_class = new cp_education_class;
						if(is_user_logged_in()){
							$get_products_order = $cp_education_class->cp_completed_orders($current_user->ID);
							$product_list = $get_products_order['product_list'];;
						}else{
							$get_products_order = array();
							$product_list = array();
						}
						if(empty($product_list)){
							$product_list = array();
						}
						if(!empty($get_products_order['product_list'])){						
							if(in_array( $product_selected, $product_list )){
								if ( is_user_logged_in() ) { ?>
									<!--COURSE DETAIL START-->
									<div class="tutor-detail-section">
										<div class="thumb">
											<?php echo get_the_post_thumbnail($post->ID,array(1170,350));?>
										</div>
										<div class="lesson_text text">
											<h3><?php echo esc_attr(get_the_title());?></h3>
											<?php the_content();?>
											<div class="share-course">
												<h4><?php esc_html_e('Share:','crunchpress');?></h4>
												<?php include_social_shares(); ?>
											</div>
											<div class="clearfix clear"></div>								
											<!--<a href="#" class="enroll"><?php esc_html_e('Next Lesson','crunchpress');?></a>-->
										</div>
										<?php 
											$user_id = 0;
											$xml_value = get_post_meta($post->ID,'quiz_detail_'.$current_user->ID,true);
											if($xml_value <> ''){
												$cp_social = new DOMDocument ();
												$cp_social->loadXML ( $xml_value );
												$user_id = find_xml_value($cp_social->documentElement,'user_id');
											}	
											$cp_education_class = new cp_education_class;
											if($user_id <> $current_user->ID){ 
												if(!isset($_GET['cp_show'])){
													echo '<div class="btn-container-cp"><a href="'.esc_url($take_quiz).'" id="btn-submit-cp" class="btn-submit">'.esc_html__('Take This Quiz','crunchpress').'</a></div>';
												}else{
													echo '<div class="lesson_text text">'.$cp_education_class->get_lesson_question($post->ID).'</div>';
												}
											}else{
												echo '<div class="lesson_text text"><h3>'.esc_html__('You have taken this quiz.','crunchpress').'</h3></div>';
											}
										?>
									</div>
									<!--COURSE DETAIL END-->
								<?php
								}else{
										echo '<h3>'.esc_html_e('Please sign in!','crunchpress').'</h3>';
								} //Logged In Check
							}else{
								if($lesson_preview == 'enable'){ ?>
								<!--COURSE DETAIL START-->
								<div class="tutor-detail-section">
									<div class="thumb">
										<?php echo get_the_post_thumbnail($post->ID,array(1170,350));?>
									</div>
									<div class="lesson_text text">
										<h3><?php echo esc_html(get_the_title());?></h3>
										<?php the_content();?>
										<div class="share-course">
											<h4><?php esc_html_e('Share:','crunchpress');?></h4>
											<?php include_social_shares(); ?>
										</div>
										<div class="clearfix clear"></div>								
										<a href="#" class="enroll"><?php esc_html_e('You are not Enrolled in this Course.','crunchpress');?></a>	
									</div>
								</div>
								<!--COURSE DETAIL END-->
							<?php 
								}else{
									echo '<h3>'.esc_html_e('You are not allowed to view this lesson, Please purchase its course first.','crunchpress').'</h3>';
								}
							} //Not in Array
						}else{ //Empty Check Not Empty 		
							if($lesson_preview == 'enable'){ ?>
							<!--COURSE DETAIL START-->
							<div class="tutor-detail-section">
								<div class="thumb">
									<?php echo get_the_post_thumbnail($post->ID,array(1170,350));?>
								</div>
								<div class="lesson_text text">
									<h3><?php echo esc_html(get_the_title());?></h3>
									<?php the_content();?>
									<div class="share-course">
										<h4><?php esc_html_e('Share:','crunchpress');?></h4>
										<?php include_social_shares(); ?>
									</div>
									<div class="clearfix clear"></div>								
									<a class="enroll"><?php esc_html_e('You are not Enrolled in this Course.','crunchpress');?></a>	
								</div>
							</div>
							<!--COURSE DETAIL END-->
						<?php 
							}
						} ?>
					</div>
					<!--CONTANT END-->
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
			<!--</div>-->
		</div>
	</div>
<?php 
	}
}
?>
<div class="clearfix"></div>
<?php get_footer(); ?>