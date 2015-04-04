<?php
/** 
     * @author Roy Stone
     * @copyright roshi[www.themeforest.net/user/crunchpress]
     * @version 2013
     */

if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

require_once ABSPATH . 'wp-admin/includes/import.php';

$import_filepath = get_template_directory()."/framework/extensions/importer/dummy_data";
$errors = false;
if ( !class_exists( 'WP_Importer' ) ) {
	$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	if ( file_exists( $class_wp_importer ) )
	{
		require_once($class_wp_importer);
	}
	else
	{
		$errors = true;
	}
}
if ( !class_exists( 'WP_Import' ) ) {
	$wp_importer = CP_FW. '/extensions/importer/wordpress-importer.php';
	if ( file_exists( $wp_importer ) )
	{
		require_once($wp_importer);
	}
	else
	{
		$errors = true;
	}
}

if($errors){
   echo "Errors while loading classes. Please use the standart wordpress importer."; 
}else{
    
    
	include_once('default_dummy_data.inc.php');
	if(!is_file($import_filepath.'_1.xml'))
	{
		echo "Problem with dummy data file. Please check the permisions of the xml file";
	}
	else
	{  
	   if(class_exists( 'WP_Import' )){
	       global $wp_version;
			$our_class = new themeple_dummy_data();
			$our_class->fetch_attachments = true;
			$our_class->import($import_filepath.'_1.xml');
		
$widget_flickr_widget = array (
  2 => 
  array (
    'title' => 'Flickr Widget',
    'type' => 'user',
    'flickr_id' => '94975828@N00',
    'count' => '9',
    'display' => 'latest',
    'size' => 'latest',
    'copyright' => NULL,
  ),
  '_multiwidget' => 1,
);$widget_courses = array (
  2 => 
  array (
    'title' => 'Trending Courses',
    'recent_post_category' => NULL,
    'nop' => '4',
  ),
  3 => 
  array (
    'title' => 'Courses',
    'recent_post_category' => NULL,
    'nop' => '3',
  ),
  4 => 
  array (
    'title' => 'Courses',
    'recent_post_category' => NULL,
    'nop' => '3',
  ),
  '_multiwidget' => 1,
);$widget_popular_post = array (
  2 => 
  array (
    'title' => 'Popular Posts',
    'recent_post_category' => 'computer-sciences-2',
    'nop' => '3',
  ),
  3 => 
  array (
    'title' => 'Popular Posts',
    'recent_post_category' => 'computer-sciences-2',
    'nop' => '3',
  ),
  4 => 
  array (
    'title' => 'Popular Posts',
    'recent_post_category' => 'computer-sciences-2',
    'nop' => '4',
  ),
  '_multiwidget' => 1,
);$widget_newsletter_widget = array (
  2 => 
  array (
    'title' => 'NewsLetter',
    'show_name' => NULL,
    'news_letter_des' => 'Subscribe to be the first to know about best deals and exclusive offers!',
  ),
  3 => 
  array (
    'title' => 'Newsletter',
    'show_name' => NULL,
    'news_letter_des' => 'Subscribe to be the first to know about best deals and exclusive offers! ',
  ),
  '_multiwidget' => 1,
);$widget_recent_news_show = array (
  2 => 
  array (
    'wid_class' => NULL,
    'title' => 'Latest News',
    'recent_post_category' => 'computer-sciences-2',
    'number_of_news' => '5',
  ),
  '_multiwidget' => 1,
);$widget_categories = array (
  3 => 
  array (
    'title' => 'Categories',
    'count' => 1,
    'hierarchical' => 0,
    'dropdown' => 0,
  ),
  '_multiwidget' => 1,
);$widget_gallery_image_show = array (
  2 => 
  array (
    'wid_class' => '',
    'title' => 'Event Gallery',
    'select_gallery' => '182',
    'nofimages' => '9',
    'externallink' => NULL,
  ),
  3 => 
  array (
    'wid_class' => '',
    'title' => 'Event Gallery',
    'select_gallery' => '182',
    'nofimages' => '9',
    'externallink' => NULL,
  ),
  '_multiwidget' => 1,
);$widget_search = array (
  2 => 
  array (
    'title' => 'Search',
  ),
  '_multiwidget' => 1,
);
$sidebars_widgets=array (
  'wp_inactive_widgets' => 
  array (
  ),
  'sidebar-footer' => 
  array (
    0 => 'flickr_widget-2',
    1 => 'courses-3',
    2 => 'popular_post-2',
    3 => 'newsletter_widget-2',
  ),
  'sidebar-upper-footer' => 
  array (
    0 => 'recent_news_show-2',
    1 => 'courses-2',
    2 => 'categories-3',
    3 => 'gallery_image_show-2',
  ),
  'custom-sidebar0' => 
  array (
    0 => 'courses-4',
    1 => 'popular_post-3',
    2 => 'newsletter_widget-3',
  ),
  'custom-sidebar1' => 
  array (
    0 => 'search-2',
    1 => 'gallery_image_show-3',
    2 => 'popular_post-4',
  ),
  'custom-sidebar2' => 
  array (
  ),
  'custom-sidebar3' => 
  array (
  ),
  'custom-sidebar4' => 
  array (
  ),
  'custom-sidebar5' => 
  array (
  ),
  'mmm_menu_widgets_area_1' => 
  array (
  ),
  'array_version' => 3,
);
$show_on_front = 'page';
$page_on_front = '20';
$theme_mods_iknow = array (
  0 => false,
  'nav_menu_locations' => 
  array (
    'main-menu' => 61,
  ),
);


			//Default Widgets
			save_option('sidebars_widgets','', $sidebars_widgets);
			save_option('widget_flickr_widget','', $widget_flickr_widget);
			save_option('widget_courses','', $widget_courses);	
			save_option('widget_popular_post','', $widget_popular_post);			
			save_option('widget_newsletter_widget','', $widget_newsletter_widget);			
			save_option('widget_recent_news_show','', $widget_recent_news_show);		
			save_option('widget_categories','', $widget_categories);	
			save_option('widget_gallery_image_show','', $widget_gallery_image_show);
			save_option('widget_search','', $widget_search);
			// save_option('widget_facebook_widget','', $widget_facebook_widget);			
			// save_option('widget_calendar','', $widget_calendar);						
			// save_option('widget_tag_cloud','', $widget_tag_cloud);			
			// save_option('widget_em_widget','', $widget_em_widget);			

			//Default Widgets
			save_option('show_on_front','', $show_on_front);			
			save_option('page_on_front','', $page_on_front);			
			save_option('theme_mods_iknow','', $theme_mods_education);			
		

        }
	}    
}


?>