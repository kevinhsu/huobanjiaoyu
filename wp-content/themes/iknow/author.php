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
	global $paged,$post,$sidebar,$blog_div_size_num_class,$counter,$wp_query,$post_id;	
		
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
	if($html_class <> ''){$html_class_banner = 'banner';} ?>
	<!--BANNER START-->
	<div class="page-heading">
		<div class="container">						
			<h2><?php esc_html_e('Student Profile','crunchpress');?></h2>
			<p><?php esc_html_e('Review your profile here you can edit and update your profile information here.','crunchpress');?></p>
		</div>
	</div>
	<!--BANNER END-->
<?php
	global $current_user,$wp_query,$post;
	$post_id = isset( $_REQUEST['post_id'] ) ? intval( $_REQUEST['post_id'] ) : 0;

	//$logged_user = isset( $_REQUEST['author'] ) ? intval( $_REQUEST['author'] ) : 0;
	$logged_user = get_query_var('author');
	
	if($logged_user == 0){
		if(isset($post)){
			$authordata = get_userdata( $post->post_author );
			$author_id = $authordata->ID;	
			$logged_user = $author_id; 
		}
	}
	$current_user_id = get_current_user_id();
	
	if(class_exists('cp_education_class')){
		$education_class = new cp_education_class;
		if($logged_user == $current_user_id){
			$education_class->current_user_edit_rights($logged_user);
		}else{
			$education_class->default_user_profile($logged_user);
		}
	}

	get_footer(); ?>