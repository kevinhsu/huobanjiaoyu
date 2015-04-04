<?php get_header(); ?>
<?php if ( have_posts() ){ while (have_posts()){ the_post();
	global $post,$EM_Event;
	
	// Get Post Meta Elements detail 
	$event_social = '';
	$sidebar = '';
	$left_sidebar = '';
	$right_sidebar = '';
	$event_thumbnail = '';
	$video_url_type = '';
	$page_caption = '';
	
	$select_slider_type = '';
	$event_detail_xml = get_post_meta($post->ID, 'event_detail_xml', true);
	if($event_detail_xml <> ''){
		$cp_event_xml = new DOMDocument ();
		$cp_event_xml->loadXML ( $event_detail_xml );
		$event_social = find_xml_value($cp_event_xml->documentElement,'event_social');
		$sidebar = find_xml_value($cp_event_xml->documentElement,'sidebar_event');
		$left_sidebar = find_xml_value($cp_event_xml->documentElement,'left_sidebar_event');
		$right_sidebar = find_xml_value($cp_event_xml->documentElement,'right_sidebar_event');
		$event_thumbnail = find_xml_value($cp_event_xml->documentElement,'event_thumbnail');
		$video_url_type = find_xml_value($cp_event_xml->documentElement,'video_url_type');
		$select_slider_type = find_xml_value($cp_event_xml->documentElement,'select_slider_type');
		$page_caption = find_xml_value($cp_event_xml->documentElement,'page_caption');
	}
	
	
	$select_layout_cp = '';
	$color_scheme = '';
	$cp_general_settings = get_option('general_settings');
	if($cp_general_settings <> ''){
		$cp_logo = new DOMDocument ();
		$cp_logo->loadXML ( $cp_general_settings );
		$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
		$color_scheme = find_xml_value($cp_logo->documentElement,'color_scheme');
	}
	
	$sidebar_class = '';
	$content_class = '';
	
	//Get Sidebar for page
	$sidebar_class = sidebar_func($sidebar);
	//print_r($EM_Event);
	if(!empty($EM_Event->location_id->name)){
		$location_summary = "<b>" . $EM_Event->get_location()->name . "</b><br/>" . $EM_Event->get_location()->address . " - " . $EM_Event->get_location()->town;
	}
	?>
<?php if($EM_Event->get_location()->location_latitude <> 0 AND $EM_Event->get_location()->location_longitude <> 0){ ?>
	
	<?php }	
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
			
	<!--Inner Pages Heading Area End--> 
	<?php //echo "<pre>"; print_r($EM_Event->get_location()); die;?>
    <div class="contant">
    	<div class="container">
             <!--BREADCRUMS START-->
            <div class="loc">
			   <?php
				//print_r($EM_Event);
				if(!empty($EM_Event->location_id->name)){
					$location_summary = "<b>" . $EM_Event->get_location()->name . "</b><br/>" . $EM_Event->get_location()->address . " - " . $EM_Event->get_location()->town;
				}
			   ?>
            </div>
            <!--BREADCRUMS END-->
            <!--MAIN CONTANT ARTICLE START-->
			<?php if($breadcrumbs == 'disable'){
				$class_margin='margin_top_cp';
			}else {
				$class_margin='';
			}
			?>
            <div class="main-content <?php echo esc_attr($class_margin);?>">
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
					<div id="event-<?php the_ID(); ?>"  class="blog-content <?php echo esc_attr($sidebar_class[1]);?>"> 
						<div <?php post_class(); ?>>
							<!--Play Ground-->
							<div class="event-page">
								<div class="row-fluid events_cp">
									<div class="span6">
										<div class="thumb">
											<a href="<?php echo esc_url($EM_Event->guid);?>">
												<?php echo get_the_post_thumbnail($EM_Event->post_id, array(570,336));?>
											</a>
										</div>
									</div>
									<!--EVENT CONTANT START-->
									<div class="span6">
										<div class="text">
											<!--EVENT HEADER START-->
											<div class="event-header">
												<span><?php echo esc_attr(date('D M m',$EM_Event->start));?></span>
												<h2><?php echo esc_html(get_the_title()); ?></h2>
												<div class="event-tags">
													<?php 
														$variable_category = wp_get_post_terms( $EM_Event->post_id, 'event-tags');
														$counterr = 0;
														foreach($variable_category as $values){
															$counterr++;
															echo '<a class="event-tag" href="'.esc_url(get_term_link(intval($values->term_id),'event-tags')).'">'.esc_attr($values->name).'</a>';
														}
													?>
												</div>
											</div>
											<!--EVENT HEADER END-->
											<!--EVENT BODY START-->
											<div class="event-body">
												<p><?php echo strip_tags(mb_substr(esc_html($EM_Event->post_content),0,180));?></p>
											</div>
											<!--EVENT BODY END-->
											<!--EVENT VANUE START-->
											<div class="event-vanue">
												<table cellspacing="0" cellpadding="0" border="0">
												  <tbody><tr>
													<td><p class="color"><?php esc_html_e('Date:', 'crunchpress') ; ?></p></td>
													<td>
														<a href="<?php echo esc_url($EM_Event->guid);?>">
															<i class="fa fa-calendar-o"></i>
															<?php echo esc_attr(date(get_option('date_format'),$EM_Event->start));?> 
															- 
															<?php echo esc_attr(date(get_option('date_format'),$EM_Event->end));?>
														</a> 
														<?php if($EM_Event->event_all_day <> 1){ ?>
														<a href="<?php echo esc_url($EM_Event->guid);?>"><i class="fa fa-clock-o"></i>
															<?php echo esc_attr($EM_Event->start_time);?> - <?php echo esc_attr($EM_Event->end_time);?>
														</a>
														<?php }else{echo esc_html__('All Day','crunchpress');}?>
													</td>
												  </tr>
												  <tr>
													<td><p class="color"><?php esc_html_e('Venue:', 'crunchpress'); ?></p></td>
													<td><?php if(!empty($EM_Event->get_location()->name)){ ?>
													<a href="<?php echo esc_url($EM_Event->guid);?>"><?php echo esc_attr($EM_Event->get_location()->name) . " " . esc_attr($EM_Event->get_location()->address) . " " . esc_attr($EM_Event->get_location()->town);?></a>
													<?php }else{echo esc_html__('No Location Found For This Event.','crunchpress');}?>
													</td>
													
												  </tr>
												</tbody></table>
											</div>
											<!--EVENT VANUE END-->
											<!--EVENT FOOTER START
											<div class="event-footer">
												<a class="btn-style" href="<?php echo esc_attr($EM_Event->guid);?>"><?php esc_html_e('Register', 'crunchpress'); ?></a>
											</div>
											EVENT FOOTER END-->
										</div>
									</div>
								</div>
								<div class="text-detail">
									<h2><?php echo esc_html(get_the_title()); ?></h2>
									<p><?php echo esc_html(do_shortcode(html_entity_decode($EM_Event->post_content)));?></p>
								</div>
								<?php if($EM_Event->get_location()->location_latitude <> ''){ ?>
								<div class="event-location-map">
									<?php echo do_shortcode('[map latitude="'.esc_attr($EM_Event->get_location()->location_latitude).'" longitude="'.esc_attr($EM_Event->get_location()->location_longitude).'" maptype="ROADMAP" width="100%" height="360px" zoom="9"][/map]'); ?>
								</div>
								<?php }?>
								<div class="admin">
									<div class="thumb">
										<a href="<?php echo esc_url(get_permalink());?>"><?php echo get_avatar(get_the_author_meta('ID'));?></a>
									</div>
									<div class="text">
										<div class="social-icons">
											<ul>
												<li><a href="<?php echo esc_url(get_the_author_meta( 'email' ));?>"><i class="fa fa-envelope"></i></a></li>
												<?php if(get_the_author_meta('url') <> ''){ ?>
													<li><a href="<?php echo esc_url(get_the_author_meta('url'));?>"><i class="fa fa-sitemap"></i></a></li>
												<?php } ?>
												<?php if(get_the_author_meta('dbem_phone') <> ''){ ?>
													<li><a href="<?php echo esc_attr(get_the_author_meta('dbem_phone'));?>"><i class="fa fa-phone"></i></a></li>
												<?php } ?>
												<?php if(get_the_author_meta('twitter') <> ''){ ?>
													<li><a href="<?php echo esc_url(get_the_author_meta('twitter'));?>"><i class="fa fa-twitter-square"></i></a></li>
												<?php } ?>
												<?php if(get_the_author_meta('facebook') <> ''){ ?>
													<li><a href="<?php echo esc_url(get_the_author_meta('facebook'));?>"><i class="fa fa-facebook-square"></i></a></li>
												<?php } ?>
												<?php if(get_the_author_meta('gplus') <> ''){ ?>
													<li><a href="<?php echo esc_url(get_the_author_meta('gplus'));?>"><i class="fa fa-google-plus-square"></i></a></li>
												<?php } ?>
												<?php if(get_the_author_meta('linked') <> ''){ ?>
													<li><a href="<?php echo esc_url(get_the_author_meta('linked'));?>"><i class="fa fa-linkedin-square"></i></a></li>
												<?php } ?>
												<?php if(get_the_author_meta('skype') <> ''){ ?>
													<li><a href="<?php echo esc_url(get_the_author_meta('skype'));?>"><i class="fa fa-skype"></i></a></li>
												<?php } ?>
											</ul>
										</div>
										<h2><a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-user"></i><?php echo esc_attr(get_the_author());?></a></h2>
										<p></p>
										<p><?php echo mb_substr(esc_html(get_the_author_meta( 'description' )),0,360);?></p>
									</div>
								</div>
								<div class="booking_form">
									<?php booking_form_event_manager(); ?>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<div class="leave-reply">
											<?php comments_template(); ?>
										</div>
									</div>
								</div>
							</div>
							<!--Play Ground-->
						</div>
					</div>		
					<?php
					if($sidebar == "both-sidebar-right"){?>
						<div class="<?php echo $sidebar_class[0];?>">
							<?php dynamic_sidebar( $left_sidebar ); ?>
						</div>
						<?php
					}
					if($sidebar == 'both-sidebar-right' || $sidebar == "right-sidebar" || $sidebar == "both-sidebar"){?>
					<div class="<?php echo $sidebar_class[0];?>">
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