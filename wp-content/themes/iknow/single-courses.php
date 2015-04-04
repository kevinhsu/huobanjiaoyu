<?php get_header(); ?>
<?php if ( have_posts() ){ while (have_posts()){ the_post();
	global $post,$post_id;
	
	$course = $post;
	
	$sidebar = '';
	$right_sidebar = '';
	$left_sidebar = '';
	$audio_url_type = '';
	$post_thumbnail = '';
	$video_url_type = '';
	$select_slider_type = '';
	$course_id = '';
	$duration_field = '';
	$page_caption = '';
	// Get Post Meta Elements detail 
	$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
	$product_selected = array();
	$course_tutor = get_post_meta($post->ID, 'course_tutor', true);
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
		$page_caption = find_xml_value($cp_course_xml->documentElement,'page_caption');
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
	$breadcrumbs = get_themeoption_value('breadcrumbs','general_settings');
	if($breadcrumbs == 'enable'){ ?>
		<!--BANNER START-->
		<div class="page-heading">
			<div class="container">						
				<div class="row">
					<div class="span8">
						<?php if(get_the_title() <> ''){ ?><h2><?php echo esc_attr(get_the_title());?></h2><?php }?>
						<?php if($page_caption <> ''){ ?><p><?php echo esc_html($page_caption);?></p><?php }else{ ?><p><?php esc_html_e('', 'crunchpress'); ?></p><?php }?>
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
						<div class="row">
							<div class="span3 sidebar">
								<?php
								$cp_education_class = new cp_education_class;
								$get_all_pending = $cp_education_class->get_user_all_pending_orders_and_product_ids($current_user->ID);
								$pending_products = $get_all_pending['product_id'];
								
								$get_all_completed = $cp_education_class->get_user_all_completed_orders_and_product_ids($current_user->ID);
								$completed_products = $get_all_completed['product_id'];
								
								$get_products_order = $cp_education_class->cp_completed_orders($current_user->ID);
								//product_list
								//pro_ordered
								$product_list = $get_products_order['product_list'];	
								
								//Teacher Section
								if(!empty($course_tutor)){ //Condition Start
									if($course_tutor[0] <> 0){
										foreach($course_tutor as $k=>$teacher){ //Loop Start 
											$teacher = get_post($teacher);
											if($teacher->ID <> ''){
												$team_designation = '';
												// Get Post Meta Elements detail 
												$team_detail_xml = get_post_meta($teacher->ID, 'team_detail_xml', true);
												if($team_detail_xml <> ''){
													$cp_team_xml = new DOMDocument ();
													$cp_team_xml->loadXML ( $team_detail_xml );
													$team_designation = find_xml_value($cp_team_xml->documentElement,'team_designation');
													$team_facebook = find_xml_value($cp_team_xml->documentElement,'team_facebook');
													$team_linkedin = find_xml_value($cp_team_xml->documentElement,'team_linkedin');
													$team_twitter = find_xml_value($cp_team_xml->documentElement,'team_twitter');
													$team_email = find_xml_value($cp_team_xml->documentElement,'team_email');
													$team_join = find_xml_value($cp_team_xml->documentElement,'team_join');
												} ?>
												<!--TUTOR PROFILE START-->
												<div class="widget course-tutor">
													<div class="thumb">
														<?php echo get_the_post_thumbnail($teacher->ID, array(350,350));?>
													</div>
													<div class="text">
														<p class="tutor-name color"><a href="<?php echo esc_url(get_permalink($teacher->ID));?>"><?php echo esc_attr($teacher->post_title);?></a></p>
														<p><?php echo esc_attr($team_designation);?></p>
														<p><i class="fa fa-clock-o"></i><?php echo esc_attr($team_join);?></p>
														<div class="share-course">
															<ul class="social_icons_cp">
																<li><a href="<?php echo esc_url($team_email);?>" class="color"><i class="fa fa-link"></i></a></li>
																<li><a href="<?php echo esc_url($team_facebook);?>" class="color"><i class="fa fa-facebook"></i></a></li>
																<li><a href="<?php echo esc_url($team_twitter);?>" class="color"><i class="fa fa-twitter"></i></a></li>
																<li><a href="<?php echo esc_url($team_linkedin);?>" class="color"><i class="fa fa-linkedin"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
												<!--TUTOR PROFILE END-->
											<?php }?>
										<?php } //Foeach loop?>											
									<?php } //Condition?>	
								<?php } //Condtion Ends?>	
								<div class="widget">
									<?php 
									$cp_education_class = new cp_education_class;
									echo $cp_education_class->related_courses($post->ID,8);?>	
								</div>
							</div>
							<div class="span9">
								<!--COURSE DETAIL START-->
								<div class="tutor-detail-section">
									<div class="thumb">
										<?php if(get_the_post_thumbnail($post->ID, array(1170,350)) <> ''){ ?>
											<?php $cp_education_class = new cp_education_class;
											echo $cp_education_class->print_course_thumbnail($post->ID, array(1170,350));?>
											<?php
												if(!empty($get_products_order['product_list'])){
													if(in_array($product_selected, $product_list)){
														echo '<span>'. esc_html__('Subscribed','crunchpress').'</span>';
													}
												}
											?>											
										<?php }?>
									</div>
									<div class="tutor-duration">
										<div class="duration">
											<ul>
												<li>
													<h4><?php esc_html_e('发布日期','crunchpress');?></h4>
													<p><?php echo esc_attr(get_the_date());?></p>
												</li>
												<?php if($duration_field <> ''){ ?>
													<li>
														<h4><?php esc_html_e('时长','crunchpress');?></h4>
														<p><?php echo esc_attr($duration_field);?></p>
													</li>
												<?php }?>
												<?php if($course_id <> ''){ ?>
													<li>
														<h4><?php esc_html_e('ID','crunchpress');?></h4>
														<p><?php echo esc_attr($course_id);?></p>
													</li>
												<?php }?>
											</ul>
										</div>
										<?php
										global $post,$post_id,$product,$product_url;
										if(!empty($product_selected)){
										$regular_price = get_post_meta($product_selected, '_regular_price', true);
										if($regular_price == ''){
											$regular_price = get_post_meta($product_selected, '_max_variation_regular_price', true);
										}
										$sale_price = get_post_meta($product_selected, '_sale_price', true);
										if($sale_price == ''){
											$sale_price = get_post_meta($product_selected, '_min_variation_sale_price', true);
										}
										if($sale_price == ''){$sale_price = $regular_price;}else{}
										$sku_num = get_post_meta($product_selected, '_sku', true);
										$currency = '';
										?>
										<div class="course-price">
											<p><?php esc_html_e('PRICE','crunchpress');?></p>
											<p><?php echo esc_attr($currency);?><?php echo esc_attr($sale_price) ;?></p>
										</div>
										<?php }?>
									</div>
									<div class="text">
										<h2><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html(get_the_title());?></a></h2>
										<?php the_content();?>
										<div class="share-course">
											
											<?php include_social_shares(); ?>
										</div>
										<div class="clearfix clear"></div>
										<?php
										//Current Order is not in Pending
										if(!in_array($product_selected, $pending_products)){
											if(!empty($product_selected)){
												if(!empty($get_products_order['product_list'])){ //Order not yet finalized
													if(in_array($product_selected, $product_list)){ 
														
													}else{
														
													}
												}else{ //Order now 
													echo '<a href="'.esc_url(get_permalink($product_selected)).'" class="enroll">'.esc_html__('Enroll Now','crunchpress').'</a>';
												}
											}else{
												
					
											}
										}else{ //Current Order is in Pending Case Else
											echo '<a href="#" class="enroll">'.esc_html__('Your order is pending','crunchpress').'</a>
											<p>'.esc_html_e('For more information please contact system administrator or check your order status from My Account.','crunchpress').'</p>';
										}?>
									</div>
								</div>
								<!--COURSE DETAIL END-->
								<div class="lessons">
								<?php 
									if(!empty($get_products_order['product_list'])){
										if(in_array($product_selected, $product_list)){
										echo '<h3>'.esc_html__('Course Lessons','crunchpress').'</h3>';
										$cp_education_class = new cp_education_class;
											echo $cp_education_class->get_course_lessons($course->ID);
										}
									}
								?>
								</div>
							</div>
						</div>
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