<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CrunchPress
 * @subpackage Rockon
 */

	
	$admin_social = get_themeoption_value('admin_social','general_settings');	
	$facebook_network = get_themeoption_value('facebook_network','social_settings');	
	$twitter_network = get_themeoption_value('twitter_network','social_settings');
	$delicious_network = get_themeoption_value('delicious_network','social_settings');
	$google_plus_network = get_themeoption_value('google_plus_network','social_settings');
	$linked_in_network = get_themeoption_value('linked_in_network','social_settings');
	$youtube_network = get_themeoption_value('youtube_network','social_settings');
	$vimeo_network = get_themeoption_value('vimeo_network','social_settings');
	$pinterest_network = get_themeoption_value('pinterest_network','social_settings');
	
	if($admin_social == 'enable'){ ?>
	<script>
		jQuery(document).ready(function($){
			$('.row_social_icons').bxSlider({
				slideMargin:30,
				moveSlides:1,
				slideWidth:350,
				minSlides:1,
				maxSlides:5,
				auto:true,
			});
		});
	</script>
	<!--FOLLOW US SECTION START-->
	<div class="follow-us">
		<div class="container">
			<div class="row_social_icons">
			<?php if($facebook_network <> ''){ ?>
				<div class="social_icon_list">
					<div class="follow">
						<a href="<?php echo esc_url($facebook_network);?>">
							<i class="fa fa-facebook"></i>
							<div class="text">
								<h4><?php esc_html_e('Follow us on Facebook','crunchpress');?></h4>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			<?php if($google_plus_network <> ''){ ?>
				<div class="social_icon_list">
					<div class="follow">
						<a href="<?php echo esc_url($google_plus_network);?>">
							<i class="fa fa-google-plus"></i>
							<div class="text">
								<h4><?php esc_html_e('Follow us on Google Plus','crunchpress');?></h4>								
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			<?php if($linked_in_network <> ''){ ?>
				<div class="social_icon_list">
					<div class="follow">
						<a href="<?php echo esc_url($linked_in_network);?>">
							<i class="fa fa-linkedin"></i>
							<div class="text">
								<h4><?php esc_html_e('Follow us on LinkedIn','crunchpress');?></h4>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			<?php if($twitter_network <> ''){ ?>
				<div class="social_icon_list">
					<div class="follow">
						<a href="<?php echo esc_url($twitter_network);?>">
							<i class="fa fa-twitter"></i>
							<div class="text">
								<h4><?php esc_html_e('Follow us on Twitter','crunchpress');?></h4>								
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			<?php if($youtube_network <> ''){ ?>
				<div class="social_icon_list">
					<div class="follow">
						<a href="<?php echo esc_url($youtube_network);?>">
							<i class="fa fa-youtube"></i>
							<div class="text">
								<h4><?php esc_html_e('Follow us on Youtube','crunchpress');?></h4>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			<?php if($vimeo_network <> ''){ ?>
				<div class="social_icon_list">
					<div class="follow">
						<a href="<?php echo esc_url($vimeo_network);?>">
							<i class="fa fa-vimeo-square"></i>
							<div class="text">
								<h4><?php esc_html_e('Follow us on Vimeo','crunchpress');?></h4>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			<?php if($pinterest_network <> ''){ ?>
				<div class="social_icon_list">
					<div class="follow">
						<a href="<?php echo esc_url($pinterest_network);?>">
							<i class="fa fa-pinterest"></i>
							<div class="text">
								<h4><?php esc_html_e('Follow us on Pinterest','crunchpress');?></h4>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php }?>
	<!--FOOTER START-->
    <footer>
        <div class="container top_footer_area">
        	<div class="row">
				<?php dynamic_sidebar('sidebar-upper-footer'); ?>				
            </div>
        </div>
		<?php	

	$twitter_feed = get_themeoption_value('twitter_feed','general_settings');
	$admin_social = get_themeoption_value('admin_social','general_settings');
	$twitter_home_button = get_themeoption_value('twitter_home_button','general_settings');
	$twitter_id = get_themeoption_value('twitter_id','general_settings');
	$consumer_key = get_themeoption_value('consumer_key','general_settings');
	$consumer_secret = get_themeoption_value('consumer_secret','general_settings');
	$access_token = get_themeoption_value('access_token','general_settings');
	$access_secret_token = get_themeoption_value('access_secret_token','general_settings');
	//Turn on Twitter from theme options
	if(class_exists('function_library')){
		if($twitter_feed == 'enable'){ 
			if($twitter_home_button == 'enable'){
				wp_reset_query();
				wp_reset_postdata();
				if(is_front_page()){
					$tweets = get_tweets( $twitter_id,10, $consumer_key, $consumer_secret, $access_token, $access_secret_token ); ?>
					
				<!--Twitter Area Start-->
				<div class="tweets">
				<script type="text/javascript">
						jQuery(document).ready(function($){
							$('#twitter-fade').bxSlider({
								mode:'fade',
								auto:true
							});
						});
					</script>
					<div class="container">
						<div class="tweet-contant">
							<i class="fa fa-twitter"></i>
							<h4><?php esc_html_e('Weekly Updates','crunchpress');?></h4>
							<ul id="twitter-fade">
							<?php
							//Twitter condition start
							if($tweets <> ''){
								$counter_twitter = 0;
								foreach($tweets as $keys=>$val){ ?>
									<li>
										<p><?php echo esc_attr($val->text);?> - <a href="http://twitter.com/<?php echo esc_attr($val->user->screen_name); ?>/status/<?php echo esc_attr($val->id_str); ?>"><?php echo esc_attr(date(get_option('date_format'),strtotime($val->created_at)));?></a></p>
									</li>
								<?php
								} // Foreach loop Ends Here
								
							}// Condition Ends Here
							?>
							</ul>
						</div>
					</div>
				</div>
				<!--Twitter Area End--> 
			<?php 
				}
			}else{ 			
				$tweets = get_tweets( $twitter_id,10, $consumer_key, $consumer_secret, $access_token, $access_secret_token ); ?>
				
				<!--Twitter Area Start-->
				<div class="tweets">
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$('#twitter-fade').bxSlider({
							mode:'fade',
							auto:true
						});
					});
				</script>
					<div class="container">
						<div class="tweet-contant">
							<i class="fa fa-twitter"></i>
							<h4><?php esc_html_e('Weekly Updates','crunchpress');?></h4>
							<ul id="twitter-fade">
							<?php
							//Twitter condition start
							if($tweets <> ''){
								$counter_twitter = 0;
								foreach($tweets as $keys=>$val){ ?>
									<li>
										<p><?php echo esc_attr($val->text);?> - <a href="http://twitter.com/<?php echo esc_attr($val->user->screen_name); ?>/status/<?php echo esc_attr($val->id_str); ?>"><?php echo esc_attr(date(get_option('date_format'),strtotime($val->created_at)));?></a></p>
									</li>
								<?php
								} // Foreach loop Ends Here
								
							}// Condition Ends Here
							?>
							</ul>
						</div>
					</div>
				</div>
				<!--Twitter Area End--> 
			<?php }
		}
	}
	?>
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
					<?php dynamic_sidebar('sidebar-footer'); ?>         
                </div>
            </div>
        </div>
        <div class="copyright">
        	<?php echo get_themeoption_value('copyright_code','general_settings');?>
        </div>
    </footer>
    <!--FOOTER END-->
</div>
<!--WRAPPER END-->
<?php 
wp_footer();?>
</body>
</html>