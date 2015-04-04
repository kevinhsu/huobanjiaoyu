<?php

	/*	
	*	CrunchPress Options File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains the CrunchPress panel elements and create the 
	*	CrunchPress panel at the back-end of the framework
	*	---------------------------------------------------------------------
	*/
	

add_action('wp_ajax_course_management','course_management');
function course_management(){
	
	foreach ($_REQUEST as $keys=>$values) {
		$$keys = trim($values);
	}
	$return_data = array(
		'success'=>'-1',
		'alert'=>'Save option failed, please try contacting your host provider to increase the post_max_size and suhosin.post.max_vars varialble on the server.'
	); ?>
	<div class="cp-wrapper bootstrap_admin cp-margin-left"> 

		<!--content area start -->	  
		<div class="hbg top_navigation row-fluid">
			<div class="cp-logo span2">
				<img src="<?php echo CP_PATH_URL;?>/framework/images/logo.png" class="logo" />
			</div>
			<div class="sidebar span10">
				<?php echo top_navigation_html_tooltip();?>
			</div>
		 <?php //echo top_navigation_html(); ?>
		</div>
		<div class="content-area-main row-fluid"> 
		
		  <!--sidebar start -->
		  <div class="sidebar-wraper span2">
			<div class="sidebar-sublinks">
				<ul id="wp_t_o_right_menu">
					<li class="news_letter" id="active_tab"><?php _e('Course Management', 'crunchpress'); ?></li>
				</ul>
			</div>
		  </div>
		  <!--sidebar end --> 
			<div class="content-area span10">
			<?php //echo top_navigation_html(); ?>
				<div class="wrapper_right">
					<?php 
					
					
					$html_user = '';
						$course_subscriber = maybe_unserialize(get_option('_course_subscriber'));
						if(!empty($course_subscriber)){
							$html_user = '<div class="user_box_container">';
							foreach($course_subscriber as $user){
								$currentUrl = admin_url().'admin.php?page=course_management';
								//$currentUrl_aa = get_admin_url();
								
								//$html_user .=$_GET['page'];
								
								$cp_detail = add_query_arg( 'student', $user, $currentUrl );
								$html_user .= '<div class="user_box">';
								$user_meta_image = esc_attr( get_the_author_meta( 'user_meta_image', $user ) );
								// make sure the field is set
								if ( isset( $user_meta_image ) && $user_meta_image ) {
							 
									// only display if function exists
									if ( function_exists( 'get_additional_user_meta_thumb' ) ){
										$html_user .= '<div class="thumb"><a href="'.$cp_detail.'"><img alt="author photo two" src="'.$user_meta_image.'" /></a></div>';
									}	
							 
								} 
								
								$html_user .= '<h4><a href="'.$cp_detail.'">'.get_the_author_meta( 'nickname', $user ).'</a></h4>';
								$html_user .= '</div>';
							}
							$html_user .= '</div>';
						}
					echo $html_user;
					
					//User Detail
					
					if(isset($student)){
						$education_class = new cp_education_class;
						echo $education_class->get_full_quiz_score($student);
					}
					?>
				</div>	
			</div>
		</div>				
	</div>		
	<?php
}	



?>
