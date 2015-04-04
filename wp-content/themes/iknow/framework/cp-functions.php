<?php

	/*	
	*	Crunchpress Function Registered File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		Crunchpress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) Crunchpress
	*	---------------------------------------------------------------------
	*	This file use to register the wordpress function to the framework,
	*	and also use filter to hook some necessary events.
	*	---------------------------------------------------------------------
	*/
	
	if (function_exists('register_sidebar')){	
	
		// default sidebar array
		$sidebar_attr = array(
			'name' => '',
			'description' => '',
			'before_widget' => '<div class="widget sidebar_section %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		);

			
		$footer_col_layout = '';
		$footer_col_layout = get_themeoption_value('footer_col_layout','general_settings');
		
		$sidebar_id = 0;
		$cp_sidebar = array();
		//Print Footer Widget Areas
		$select_footer_cp = get_themeoption_value('select_footer_cp','general_settings');
		if($select_footer_cp == 'Style 1' || $select_footer_cp == 'Style 2' || $select_footer_cp == 'Style 6'){
			$cp_sidebar = array("Footer");
			$cp_sidebar_upper = array();
		}else{
			$cp_sidebar = array("Footer");
			$cp_sidebar_upper = array("Upper-Footer");
		}
		//Home Page Layout		
		if($footer_col_layout == 'footer-style1'){
			
			foreach( $cp_sidebar as $sidebar_name ){
				$sidebar_attr['name'] = $sidebar_name;
				$sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
				$sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
				$sidebar_attr['before_widget'] = '<div class="span3"><div class="widget %2$s">' ;
				$sidebar_attr['before_title'] = '<h4>' ;
				$sidebar_attr['after_title'] = '</h4>' ;				
				$sidebar_attr['after_widget'] = '</div></div>' ;
				$sidebar_attr['description'] = 'Please place widget here' ;				
				register_sidebar($sidebar_attr);
			}
		}else{
			
			foreach( $cp_sidebar as $sidebar_name ){
				$sidebar_attr['name'] = $sidebar_name;
				$sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
				$sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
				$sidebar_attr['before_widget'] = '<div class="span4 widget %2$s">' ;
				$sidebar_attr['after_widget'] = '</div>' ;
				$sidebar_attr['before_title'] = '<h4>' ;
				$sidebar_attr['after_title'] = '</h4>' ;	
				$sidebar_attr['description'] = 'Please place widget here' ;
				register_sidebar($sidebar_attr);
			}
		}		
		
		
		$footer_upper_layout = get_themeoption_value('footer_upper_layout','general_settings');
		//Home Page Layout		
		if($footer_upper_layout == 'footer-style-upper-1'){
			
			foreach( $cp_sidebar_upper as $sidebar_name ){
				$sidebar_attr['name'] = $sidebar_name;
				$sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
				$sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
				$sidebar_attr['before_widget'] = '<div class="span3"><div class="widget %2$s">' ;
				$sidebar_attr['before_title'] = '<h4>' ;
				$sidebar_attr['after_title'] = '</h4>' ;	
				$sidebar_attr['after_widget'] = '</div></div>' ;
				$sidebar_attr['description'] = 'Please place widget here' ;				
				register_sidebar($sidebar_attr);
			}
		}else{
			
			foreach( $cp_sidebar_upper as $sidebar_name ){
				$sidebar_attr['name'] = $sidebar_name;
				$sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
				$sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
				$sidebar_attr['before_widget'] = '<div class="span3"><div class="widget %2$s">' ;
				$sidebar_attr['before_title'] = '<h4>' ;
				$sidebar_attr['after_title'] = '</h4>' ;	
				$sidebar_attr['after_widget'] = '</div></div>' ;
				$sidebar_attr['description'] = 'Please place widget here' ;				
				register_sidebar($sidebar_attr);
			}
			// foreach( $cp_sidebar_upper as $sidebar_name ){
				// $sidebar_attr['name'] = $sidebar_name;
				// $sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
				// $sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
				// $sidebar_attr['before_widget'] = '<div class="span4 widget %2$s">' ;
				// $sidebar_attr['after_widget'] = '</div>' ;
				// $sidebar_attr['before_title'] = '<h4>' ;
				// $sidebar_attr['after_title'] = '</h4>' ;	
				// $sidebar_attr['description'] = 'Please place widget here' ;
				// register_sidebar($sidebar_attr);
			// }
		}		
		
		//Footer Layout
		//$cp_sidebar_footer = array("Footer");
		
		//$sidebar_attr['before_title'] = '<h2 class="custom-sidebar-title footer-title-color cp-title">';
		// foreach( $cp_sidebar_footer as $sidebar_name ){
			// $sidebar_attr['name'] = $sidebar_name;
			// $sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
			// $sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
			// $sidebar_attr['before_widget'] = '<div class="span4 %2$s">' ;
			// $sidebar_attr['before_title'] = '<h4>' ;
			// $sidebar_attr['after_title'] = '<span class="h-line"></span></h4>' ;
			// $sidebar_attr['description'] = 'Please place widget here' ;
			// register_sidebar($sidebar_attr);
		// }
		$cp_sidebar = '';
		$cp_sidebar = get_option('sidebar_settings');
		//$sidebar_attr['before_title'] = '<h3>';
		
		if(!empty($cp_sidebar)){
			$xml = new DOMDocument();
			$xml->loadXML($cp_sidebar);
			foreach( $xml->documentElement->childNodes as $sidebar_name ){
				$sidebar_attr['name'] = $sidebar_name->nodeValue;
				$sidebar_attr['id'] = 'custom-sidebar' . $sidebar_id++ ;
				$sidebar_attr['before_widget'] = '<div class="widget sidebar_section %2$s">' ;
				$sidebar_attr['after_widget'] = '</div>' ;
				$sidebar_attr['before_title'] = '<div class="head"><h3>' ;
				$sidebar_attr['after_title'] = '</h3></div>' ;	
				register_sidebar($sidebar_attr);
			}
		}
		
		
		
		
	}
	
	//Add Theme Support
	if(function_exists('add_theme_support')){
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list',) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array('aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery') );
		
		// enable featured image
		add_theme_support('post-thumbnails');
		
		// enable editor style
		add_editor_style('editor-style.css');
		
		// enable navigation menu
		add_theme_support('menus');
		register_nav_menus(array('main-menu' => 'Main Menu'));
	}
	
	// add filter to hook when user press "insert into post" to include the attachment id
	add_filter('media_send_to_editor', 'add_para_media_to_editor', 20, 2);
	function add_para_media_to_editor($html, $id){

		if(strpos($html, 'href')){
			$pos = strpos($html, '<a') + 2;
			$html = substr($html, 0, $pos) . ' attid="' . $id . '" ' . substr($html, $pos);
		}
		
		return $html ;
		
	}
	
	// enable theme to support the localization
	add_action('init', 'cp_word_translation');
	function cp_word_translation(){
		load_theme_textdomain( 'crunchpress', get_template_directory() . '/languages/' );		
	}

	// excerpt filter
	add_filter('excerpt_length','cp_excerpt_length');
	function cp_excerpt_length(){
		return 1000;
	}
	


	add_action('wp_footer', 'add_google_analytics_code');
	// Google Analytics
	function add_google_analytics_code(){
		$google_webmaster_code = '';
		//Get Options
		$cp_general_settings = get_option('general_settings');
		if($cp_general_settings <> ''){
			$cp_logo = new DOMDocument ();
			$cp_logo->loadXML ( $cp_general_settings );
			$google_webmaster_code = find_xml_value($cp_logo->documentElement,'google_webmaster_code');
			}
		echo $google_webmaster_code;
	
	}
	
	add_action('wp_footer', 'add_header_code');
	// Header Style or Script
	function add_header_code(){
		$header_css_code = '';
		//Get Options
		$cp_general_settings = get_option('general_settings');
		if($cp_general_settings <> ''){
			$cp_logo = new DOMDocument ();
			$cp_logo->loadXML ( $cp_general_settings );
			$header_css_code = find_xml_value($cp_logo->documentElement,'header_css_code');
		}
		echo $header_css_code;
	}
	
	add_action('wp_footer', 'add_typekit_code');
	// Google Analytics
	function add_typekit_code(){
		$embed_typekit_code = '';
		$cp_typography_settings = get_option('typography_settings');
		if($cp_typography_settings <> ''){
			$cp_typo = new DOMDocument ();
			$cp_typo->loadXML ( $cp_typography_settings );
			$embed_typekit_code = find_xml_value($cp_typo->documentElement,'embed_typekit_code');
		}
		echo $embed_typekit_code;
	
	}
	
	// Custom Post type Feed
	add_filter('request', 'myfeed_request');
	function myfeed_request($qv) {
		if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array('post', 'portfolio');
		return $qv;
	}

	// Translate the wpml shortcode
	function webtreats_lang_test( $atts, $content = null ) {
		extract(shortcode_atts(array( 'lang' => '' ), $atts));
		
		$lang_active = ICL_LANGUAGE_CODE;
		
		if($lang == $lang_active){
			return $content;
		}
	}
	
	
	
	// Add Another theme support
	add_filter('widget_text', 'do_shortcode');
	add_theme_support( 'automatic-feed-links' );	
	
	if ( ! isset( $content_width ) ){ $content_width = 980; }
	
	// update the option if new value is exists and not equal to old one 
		function save_option($name, $old_value, $new_value){
		
			if(empty($new_value) && !empty($old_value)){
			
				if(!delete_option($name)){
				
					return false;
					
				}
				
			}else if($old_value != $new_value){
			
				if(!update_option($name, $new_value)){
				
					return false;
					
				}
				
			}
			
			return true;
			
		}
	
	
	//Add Newsletter Table
	function add_newsletter_table() {
		global $wpdb;
		$wpdb->query("
			CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."cp_newsletter` (
			  `name` varchar(100) NOT NULL,
			  `email` varchar(100) NOT NULL,
			  `ip` varchar(16) NOT NULL,
			  `date_time` datetime NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		");
	}
	
	
	/* Flush rewrite rules for custom post types. */
		global $pagenow, $wp_rewrite;
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ){
			//$wp_rewrite->flush_rules();
			add_action('init', 'add_newsletter_table');	
			
			//if(get_option('default_pages_settings') == ''){$default_pages_xml = "<default_pages_settings><sidebar_default>no-sidebar</sidebar_default><right_sidebar_default>Right Sidebar</right_sidebar_default><left_sidebar_default>Right Sidebar</left_sidebar_default><default_excerpt></default_excerpt></default_pages_settings>";save_option('default_pages_settings', get_option('default_pages_settings'),$default_pages_xml);}if(get_option('general_settings') == ''){$general_settings = "<general_settings><header_logo>1405</header_logo><logo_width>239</logo_width><logo_height>73</logo_height><header_favicon></header_favicon><header_fav_link></header_fav_link><select_layout_cp>full_layout</select_layout_cp><boxed_scheme></boxed_scheme><color_scheme>#00A685</color_scheme><body_color></body_color><heading_color></heading_color><select_bg_pat>Background-Color</select_bg_pat><bg_scheme></bg_scheme><body_patren></body_patren><color_patren>/framework/images/pattern/pattern-5.png</color_patren><body_image></body_image><position_image_layout>top</position_image_layout><image_repeat_layout>no-repeat</image_repeat_layout><image_attachment_layout>fixed</image_attachment_layout><contact_us_code>&lt;ul&gt;               &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Donate&lt;/a&gt;&lt;/li&gt;               &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Join Volunteer&lt;/a&gt;&lt;/li&gt;               &lt;li&gt;&lt;a href=&quot;#&quot;&gt;0800 1234&lt;/a&gt;&lt;/li&gt;             &lt;/ul&gt;</contact_us_code><select_header_cp></select_header_cp><header_style_apply></header_style_apply><header_css_code></header_css_code><google_webmaster_code></google_webmaster_code><topbutton_icon></topbutton_icon><topsocial_icon>enable</topsocial_icon><select_footer_cp></select_footer_cp><footer_style_apply></footer_style_apply><footer_upper_layout></footer_upper_layout><copyright_code>&lt;p&gt;Copyright © 2014 All Rights Reserved by  CrunchPress.com&lt;/p&gt;</copyright_code><social_networking>enable</social_networking><twitter_feed>enable</twitter_feed><admin_social>enable</admin_social><twitter_home_button>disable</twitter_home_button><twitter_id>CrunchPress</twitter_id><consumer_key>LiNR6cJamz1oTq76YCmOCg</consumer_key><consumer_secret>7DziOUahT3cVHjUFZdv9DWGYxgs3dThwQdlxhlBLRo</consumer_secret><access_token>95420785-lc52fpbTrJYM02imucymoidZ0xzHabkWP5wEcbXkB</access_token><access_secret_token>vm642ki1HnOSMw6DTUPW8SrVcUaqCSsVolUhTssGI</access_secret_token><footer_col_layout>footer-style1</footer_col_layout><footer_logo>360</footer_logo><footer_link></footer_link><footer_logo_width>172</footer_logo_width><footer_logo_height>37</footer_logo_height><breadcrumbs>enable</breadcrumbs><rtl_layout>disable</rtl_layout><site_loader></site_loader><element_loader></element_loader><mega_menu_layout></mega_menu_layout><maintenance_mode>disable</maintenance_mode><maintenace_title></maintenace_title><countdown_time></countdown_time><email_mainte></email_mainte><mainte_description></mainte_description><social_icons_mainte>enable</social_icons_mainte><donation_button>enable</donation_button><donate_btn_text></donate_btn_text><donation_page_id>1248</donation_page_id><donate_email_id></donate_email_id><donate_title></donate_title><donation_currency>AUD</donation_currency><tf_username></tf_username><tf_sec_api></tf_sec_api></general_settings>";save_option('general_settings', get_option('general_settings'),$general_settings);}if(get_option('typography_settings') == ''){$typography_settings = "<typography_settings><font_google>Open Sans</font_google><font_size_normal>14</font_size_normal><font_google_heading>Open Sans</font_google_heading><menu_font_google>Roboto Slab</menu_font_google><heading_h1>25</heading_h1><heading_h2></heading_h2><heading_h3></heading_h3><heading_h4></heading_h4><heading_h5></heading_h5><heading_h6></heading_h6><embed_typekit_code></embed_typekit_code></typography_settings>";save_option('typography_settings', get_option('typography_settings'),$typography_settings);}if(get_option('slider_settings') == ''){$slider_settings = "<slider_settings><select_slider>default</select_slider><bx_slider_settings><slide_order_bx>slide</slide_order_bx><auto_play_bx>enable</auto_play_bx><pause_on_bx>enable</pause_on_bx><animation_speed_bx>1500</animation_speed_bx><show_bullets>enable</show_bullets><show_arrow>enable</show_arrow></bx_slider_settings></slider_settings>";save_option('slider_settings', get_option('slider_settings'),$slider_settings);}if(get_option('social_settings') == ''){$social_settings = "<social_settings><facebook_network>#</facebook_network><twitter_network>#</twitter_network><delicious_network>#</delicious_network><google_plus_network>#</google_plus_network><linked_in_network>#</linked_in_network><youtube_network>#</youtube_network><flickr_network></flickr_network><vimeo_network>#</vimeo_network><pinterest_network>#</pinterest_network><Instagram_network></Instagram_network><github_network></github_network><skype_network></skype_network><facebook_sharing>disable</facebook_sharing><twitter_sharing>enable</twitter_sharing><stumble_sharing>enable</stumble_sharing><delicious_sharing>disable</delicious_sharing><googleplus_sharing>enable</googleplus_sharing><digg_sharing>enable</digg_sharing><myspace_sharing>enable</myspace_sharing><reddit_sharing>enable</reddit_sharing></social_settings>";save_option('social_settings', get_option('social_settings'),$social_settings);}if(get_option('sidebar_settings') == ''){$sidebar_settings = "<sidebar_settings><sidebar_name>Right Sidebar</sidebar_name><sidebar_name>Left Sidebar</sidebar_name><sidebar_name>Dual Sidebar Left</sidebar_name><sidebar_name>Dual Sidebar Right</sidebar_name><sidebar_name>Contact Us Sidebar</sidebar_name><sidebar_name>Events Sidebar</sidebar_name></sidebar_settings>";save_option('sidebar_settings', get_option('sidebar_settings'),$sidebar_settings);}
			if(get_option('default_pages_settings') == ''){$default_pages_xml = "<default_pages_settings><sidebar_default>no-sidebar</sidebar_default><right_sidebar_default>Right Sidebar</right_sidebar_default><left_sidebar_default>Right Sidebar</left_sidebar_default><default_excerpt></default_excerpt></default_pages_settings>";save_option('default_pages_settings', get_option('default_pages_settings'),$default_pages_xml);}if(get_option('general_settings') == ''){$general_settings = "<general_settings><header_logo>1608</header_logo><logo_width>131</logo_width><logo_height>36</logo_height><header_favicon></header_favicon><header_fav_link></header_fav_link><select_layout_cp></select_layout_cp><color_scheme>#00A685</color_scheme><select_bg_pat>Background-Color</select_bg_pat><bg_scheme></bg_scheme><body_patren></body_patren><color_patren>/framework/images/pattern/pattern-5.png</color_patren><body_image></body_image><position_image_layout>top</position_image_layout><image_repeat_layout>no-repeat</image_repeat_layout><image_attachment_layout>fixed</image_attachment_layout><contact_us_code>&lt;ul&gt;               &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Donate&lt;/a&gt;&lt;/li&gt;               &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Join Volunteer&lt;/a&gt;&lt;/li&gt;               &lt;li&gt;&lt;a href=&quot;#&quot;&gt;0800 1234&lt;/a&gt;&lt;/li&gt;             &lt;/ul&gt;</contact_us_code><select_header_cp></select_header_cp><header_style_apply></header_style_apply><header_css_code></header_css_code><google_webmaster_code></google_webmaster_code><topbutton_icon></topbutton_icon><topsocial_icon>enable</topsocial_icon><select_footer_cp></select_footer_cp><footer_style_apply></footer_style_apply><footer_upper_layout></footer_upper_layout><copyright_code>&lt;p&gt;Copyright © 2014 All Rights Reserved by  CrunchPress.com&lt;/p&gt;</copyright_code><social_networking>enable</social_networking><twitter_feed>enable</twitter_feed><admin_social>enable</admin_social><twitter_home_button>disable</twitter_home_button><twitter_id>CrunchPress</twitter_id><consumer_key>LiNR6cJamz1oTq76YCmOCg</consumer_key><consumer_secret>7DziOUahT3cVHjUFZdv9DWGYxgs3dThwQdlxhlBLRo</consumer_secret><access_token>95420785-lc52fpbTrJYM02imucymoidZ0xzHabkWP5wEcbXkB</access_token><access_secret_token>vm642ki1HnOSMw6DTUPW8SrVcUaqCSsVolUhTssGI</access_secret_token><footer_col_layout>footer-style1</footer_col_layout><footer_logo>360</footer_logo><footer_link></footer_link><footer_logo_width>172</footer_logo_width><footer_logo_height>37</footer_logo_height><breadcrumbs>enable</breadcrumbs><rtl_layout>disable</rtl_layout><site_loader></site_loader><element_loader></element_loader><mega_menu_layout></mega_menu_layout><maintenance_mode>disable</maintenance_mode><maintenace_title></maintenace_title><countdown_time></countdown_time><email_mainte></email_mainte><mainte_description></mainte_description><social_icons_mainte>enable</social_icons_mainte><donation_button>enable</donation_button><donate_btn_text></donate_btn_text><donation_page_id>1248</donation_page_id><donate_email_id></donate_email_id><donate_title></donate_title><donation_currency>AUD</donation_currency><tf_username></tf_username><tf_sec_api></tf_sec_api></general_settings>";save_option('general_settings', get_option('general_settings'),$general_settings);}if(get_option('typography_settings') == ''){$typography_settings = "<typography_settings><font_google>Open Sans</font_google><font_size_normal>14</font_size_normal><font_google_heading>open-sans</font_google_heading><menu_font_google>Roboto Slab</menu_font_google><heading_h1>25</heading_h1><heading_h2></heading_h2><heading_h3></heading_h3><heading_h4></heading_h4><heading_h5></heading_h5><heading_h6></heading_h6><embed_typekit_code></embed_typekit_code></typography_settings>";save_option('typography_settings', get_option('typography_settings'),$typography_settings);}if(get_option('slider_settings') == ''){$slider_settings = "<slider_settings><select_slider>default</select_slider><bx_slider_settings><slide_order_bx>slide</slide_order_bx><auto_play_bx>enable</auto_play_bx><pause_on_bx>enable</pause_on_bx><animation_speed_bx>1500</animation_speed_bx><show_bullets>enable</show_bullets><show_arrow>enable</show_arrow></bx_slider_settings></slider_settings>";save_option('slider_settings', get_option('slider_settings'),$slider_settings);}if(get_option('social_settings') == ''){$social_settings = "<social_settings><facebook_network>#</facebook_network><twitter_network>#</twitter_network><delicious_network>#</delicious_network><google_plus_network>#</google_plus_network><linked_in_network>#</linked_in_network><youtube_network>#</youtube_network><flickr_network></flickr_network><vimeo_network>#</vimeo_network><pinterest_network>#</pinterest_network><Instagram_network></Instagram_network><github_network></github_network><skype_network></skype_network><facebook_sharing>disable</facebook_sharing><twitter_sharing>enable</twitter_sharing><stumble_sharing>enable</stumble_sharing><delicious_sharing>disable</delicious_sharing><googleplus_sharing>enable</googleplus_sharing><digg_sharing>enable</digg_sharing><myspace_sharing>enable</myspace_sharing><reddit_sharing>enable</reddit_sharing></social_settings>";save_option('social_settings', get_option('social_settings'),$social_settings);}if(get_option('sidebar_settings') == ''){$sidebar_settings = "<sidebar_settings><sidebar_name>Right Sidebar</sidebar_name><sidebar_name>Left Sidebar</sidebar_name><sidebar_name>Dual Sidebar Left</sidebar_name><sidebar_name>Dual Sidebar Right</sidebar_name><sidebar_name>Contact Us Sidebar</sidebar_name><sidebar_name>Events Sidebar</sidebar_name></sidebar_settings>";save_option('sidebar_settings', get_option('sidebar_settings'),$sidebar_settings);}
		}

		//Custom background Support	
		$args = array(
			'default-color'          => '',
			'default-image'          => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		);

		//Custom Header Support	
		$defaults = array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 950,
			'height'                 => 200,
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => true,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		global $wp_version;
		if ( version_compare( $wp_version, '3.4', '>=' ) ){ 
			add_theme_support( 'custom-background', $args );
			add_theme_support( 'custom-header', $defaults );
		}
	
	
	
	// echo get_option('show_on_front');
	// $page_on_front = get_option('show_on_front');
	// if($page_on_front == 'posts'){
	
	// }else{
	
	// }
	function maintenance_mode(){
	
	
		// save_option('show_on_front','', $show_on_front);
		// save_option('page_on_front','', $page_on_front);
	}		
	
	function ajax_login(){

		// First check the nonce, if it fails the function will break
		check_ajax_referer( 'ajax-login-nonce', 'security' );

		// Nonce is checked, get the POST data and sign user on
		$info = array();
		$info['user_login'] = $_POST['username'];
		$info['user_password'] = $_POST['password'];
		$info['remember'] = true;

		$user_signon = wp_signon( $info, false );
		if ( is_wp_error($user_signon) ){
			echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
		} else {
			echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, Now Redirecting...')));
		}

		die();
	}	
	
	function ajax_login_init(){

		wp_register_script('ajax-login-script', CP_PATH_URL.'/frontend/js/ajax-login-script.js', array('jquery') ); 
		wp_enqueue_script('ajax-login-script');

		wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'redirecturl' => home_url(),
			'loadingmessage' => __('Sending user info, please wait...','crunchpress')
		));

		// Enable the user with no privileges to run ajax_login() in AJAX
		add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
	}	
	
	// Execute the action only if the user isn't logged in
	if (!is_user_logged_in()) {
		add_action('init', 'ajax_login_init');		
	}
	
	
	
	
	
	function ajax_signup(){
		
		// First check the nonce, if it fails the function will break
		//check_ajax_referer( 'ajax-signup-nonce', 'security' );

		// Nonce is checked, get the POST data and sign user on
		foreach ($_REQUEST as $keys=>$values) {
			$$keys = $values;
		}
		$default_role = get_option('default_role');
		//$info = array();
		$nickname = $_POST['nickname'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_email = $_POST['user_email'];
		$user_pass = $_POST['user_pass'];
		$captcha_code = $_POST['captcha_code'];
		$ajax_captcha = $_POST['ajax_captcha'];
		

		$userdata = array(
			'user_login'    => $nickname,
			'first_name'  => $first_name,
			'last_name'  => $last_name,
			'user_email'  => $user_email,
			'user_pass'  => $user_pass,
			'role' => $default_role
		);
		$user_signup = wp_insert_user( $userdata );
		if(strtolower($captcha_code) == strtolower($ajax_captcha)){
			if ( is_wp_error($user_signup) ){
				echo json_encode(array('signup'=>false, 'message'=>__('Please verify the details you are providing.','crunchpress')));
			} else {
				echo json_encode(array('signup'=>true, 'message'=>__('Your request submitted successfully, Redirecting you to login page!','crunchpress')));
			}
		}else{
			echo json_encode(array('signup'=>false, 'message'=>__('Invalid Captcha','crunchpress')));
		}

		die();
	}	
	
	function ajax_signup_init(){

		wp_register_script('ajax-signup-script', CP_PATH_URL.'/frontend/js/ajax-signup-script.js', array('jquery') ); 
		wp_enqueue_script('ajax-signup-script');

		wp_localize_script( 'ajax-signup-script', 'ajax_signup_object', array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'redirecturl' => home_url(),
			'loadingmessage' => __('Sending user info, please wait...','crunchpress')
		));
		
		// Enable the user with no privileges to run ajax_login() in AJAX
		add_action('wp_ajax_ajaxsignup', 'ajax_signup');
		add_action( 'wp_ajax_nopriv_ajaxsignup', 'ajax_signup' );
	}
	
	add_action('init', 'ajax_signup_init');	
	
	
	function CP_SIGN_UP(){ ?>
	<!--SIGN UP BOX START-->
    <div id="signup" class="modal hide fade" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="form-box">
		<?php
		$users_can_register = get_option('users_can_register');
			if($users_can_register <> 1){ ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i></button>
				<h3><?php esc_html_e('Sign up not allowed by admin.','crunchpress');?></h3>
			</div>
			<div class="modal-body form-body">
				<p><?php esc_html_e('Please contact admin for registration.','crunchpress');?></p>
			</div>
			<div class="modal-footer footer">
				
			</div>
		
		<?php }else{ 
		//Start Session for Captcha
		$session_variable = '';
		$_SESSION = array();
		
		$_SESSION['captcha'] = simple_php_captcha();
		if(isset($_SESSION['captcha'])){
			$session_variable = $_SESSION['captcha']['image_src'];
		}
		?>
			<form id="sing-up" action="signup" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i></button>
					<h3><?php esc_html_e('SIGN UP','crunchpress');?></h3>
				</div>
				<div class="modal-body form-body">
					<div class="row-fluid">
						<div class="span6">
							<label><?php esc_html_e('First Name','crunchpress');?></label>
							<input name="first_name" id="first_name" type="text" class="input-block-level" />
						</div>
						<div class="span6">
							<label><?php esc_html_e('Last Name','crunchpress');?></label>
							<input name="last_name" id="last_name" type="text" class="input-block-level" />
						</div>
					</div>
					<label><?php esc_html_e('Email Address','crunchpress');?></label>
					<input name="user_email" id="user_email" type="text" class="input-block-level" />
					
					<label><?php esc_html_e('Username','crunchpress');?></label>
					<input name="nickname" id="nickname" type="text" class="input-block-level" />
					
					<label><?php esc_html_e('Password','crunchpress');?></label>
					<input name="user_pass" id="user_pass" type="password" class="input-block-level" />
					
					<img src="<?php echo esc_attr($session_variable);?>" alt="CAPTCHA CODE" />
					<label><?php esc_html_e('Enter Captcha Code','crunchpress');?></label>
					<input name="captcha_code" id="captcha_code" type="text" class="input-block-level" />
					
					<?php wp_nonce_field( 'ajax-signup-nonce', 'security' ); ?>
					<input class="btn-style" type="submit" value="<?php _e('Sign Up','crunchpress');?>" name="submit">
					<input type="hidden" id="ajax_captcha" name="ajax_captcha" value="<?php echo $_SESSION['captcha']['code'];?>"/>
				</div>
				<div class="modal-footer footer">
					<p class="status"></p>
				</div>
			</form>	
		<?php }?>
		</div>
    </div>
    <!--SIGN UP BOX END-->
	<?php
	}
	
	function CP_SIGN_IN(){ ?>
	<!--LOGIN BOX START-->
    <div id="signin" class="modal hide fade" tabindex="-1" role="dialog"  aria-hidden="true">
		<?php if (is_user_logged_in()) { ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i></button>
				<h3><?php esc_html_e('You are logged in','crunchpress');?></h3>
			</div>
			<div class="modal-body">
				<p><?php esc_html_e('For logout click on following logout link.','crunchpress');?></p>
			</div>
			<div class="modal-footer">
				<a class="btn-style login_button" href="<?php echo wp_logout_url( home_url() ); ?>"><?php esc_html_e('Logout','crunchpress');?></a>
			</div>
		<?php } else { ?>
		<div class="form-box">			
			<form id="login" action="login" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i></button>
					<h3><?php esc_html_e('Login Below:','crunchpress');?></h3>
				</div>
				<div class="modal-body form-body">
					<label for="username"><?php esc_html_e('User Name','crunchpress');?></label>
					<input name="username" id="username" type="text" class="input-block-level">
					
					<label for="password"><?php esc_html_e('Password','crunchpress');?></label>
					<input name="password" id="password" type="password" class="input-block-level">
					
					<input class="btn-style" type="submit" value="<?php esc_html_e('Sign In','crunchpress');?>" name="submit">
				</div>
				<div class="modal-footer footer">
					<p class="status"></p>
					<ul>
						<li>
							<a class="lost" href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?','crunchpress');?></a>
						</li>
					</ul>
				</div>
				<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
			</form> 
		</div>
		<?php }?>
    </div>
    <!--LOGIN BOX END-->
   <?php }?>