<?php

	// Ajax to include font infomation
	add_action('wp_ajax_nopriv_cp_color_bg', 'cp_color_bg');
	add_action('wp_ajax_cp_color_bg','cp_color_bg');
	function cp_color_bg($recieve_color='',$bg_texture='',$navi_color='',$head_text_color='',$color_font_body='',$select_layout_cp = '',$backend_on_off=''){
	
		global $html_new;
		
		/*
		================================================
						Create StyleSheet
		================================================
		*/
		$html_new .= '<style id="stylesheet">';
			
				/*
				================================================
							TEXT SELECTION COLOR 
				================================================
				*/

				$html_new .= '::selection {
					background: '.$recieve_color.'; /* Safari */
					color:#fff;
					}
				::-moz-selection {
					background: '.$recieve_color.'; /* Firefox */
					color:#fff;
				}';
				
				
				/*Background Color Instead of Texture*/
				$html_new .= 'body{
					background-color:'.$bg_texture.' !important;
				}';
				/*Background Color Instead of Texture*/
				
				/*Navigation Color*/
				$html_new .= '.cp_mega_plugin .menu_inner li a , .cp_mega_plugin .menu_inner li span{
					color:'.$navi_color.' !important;
				}';
				/*Navigation Color*/
				
				/*Heading Color*/
				// $html_new .= '.price-box:hover .rate h2, .sidebar .widget .inner h2, .top-courses h4, .top-courses h4 a, blockquote, .admin h2, .admin h2 a,.message-box h4, .faq-2 h3,.widget-slider h2,.course-topics .text h4 a, .search-result h1,.error-404, .cart-collaterals h2 a,.related li h3, .woo_product li h3, .woo_product .span3 h3,.tutor-detail-section .text h2 a, .course-box.course-item .text h4 a,.cp_price_table:hover .cp_price_rate h2,.services .text h3,.text h3 a,.services  .cp_course_item .text h4,.course-topics .text h4,h1,h2,h3,h4,h5,h6{
					// color:'.$head_text_color.' !important;
				// }';
				/*Heading Color*/
				
				/*Background Color Start*/
				$html_new .= '.tutor-detail-section .thumb span, #btn-submit-cp, #quiz_form_element .btn-submit, .profile-box.editing thead tr, .navigation ul li a:hover, a.return, .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active, .newsletters .subscribe button, .services .text h3:before, .cp_course_item .course-detail-btn a:hover, .form-data button, .teachers .social-icons a:hover, .teachers:hover .text, section.papular-post, .post .text .more, .box:hover, .price-footer a, .price-box:hover, .follow i, .tweets, .widget-top-rated ul li .text span:before, .tweet-contant i, .newsletter-contant button, .faq .accordion-heading:hover, .our-skills .progress .bar, section.upcoming-events, .btn-style, .pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, .widget-flickr ul li, .the-best, .admin .social-icons a, .comments ul li:before, .comments ul ul:before, .widget-tags ul li a, .widget-tags ul li a:after, .data-tags a:before, .campaign .social-icons a:hover, .news-contant .thumb, .accordion-close span,.accordion-open span, .cp_course_item .price, .widget-course-categories ul li a:hover, .course-detail, .gallery ul li, .gallery ul li:before, .teacher-profile .followers, .get-touch-form .btn-search, .widget_product_search input[type="submit"], .get-touch-form input[type="submit"], .widget_product_widget .ignitiondeck a.learn-more-button, .widget_product_widget .ignitiondeck .progress-bar, .widget_em_calendar table.em-calendar thead, .widget_product_tag_cloud a, .edit-link a, .onsale, .custom_accordion_cp.accordion-close span, .custom_accordion_cp.accordion-open span, .summary button, .actions .button, .add_to_cart_button, .edit-link a, .added_to_cart, a.product_type_grouped, a.single_add_to_cart_button, .shipping_calculator .button, #payment .button, .checkout_coupon .button, .login .button, .contant #submit, .widget_archive ul li:hover, .contant #searchsubmit, .widget_categories ul li:hover, .widget_calendar #calendar_wrap table thead, .widget_pages ul li:hover, .widget_recent_comments ul li:hover, .widget_nav_menu ul li:hover a, .widget_nav_menu ul ul li:before, .widget_nav_menu ul li:hover ul li:hover:before, .widget_product_categories ul.product-categories li:hover, .shop_table thead, footer .widget_recent_entries ul li:hover a, .widget_meta ul li:hover, #searchform > input, .woocommerce-message, .form-submit #submit, .woocommerce-info, .shop_table tfoot, .em-search-options .show, div.css-search div.em-search-main .em-search-submit, .em-pagination a, .em-categories-list li a:hover, .widget_recent_entries ul li:hover, .tagcloud a, .share-course ul li a:hover, .tutor-detail-section .text a.enroll, .course-price, .cp_price_table:hover, .price-table .btn-style, #submit_btn, .form-data input[type="submit"], .css-events-list table thead, .account .dropdown-menu > li > a:hover, .account .dropdown-menu > li > a:focus, .account .dropdown-submenu:hover > a, .account .dropdown-submenu:focus > a, .top-strip .language .social-icons a:hover, .social-icons li a, thead tr th, .search-box button, .btn-readmore, #course_navigation .inactive:hover{
					background-color:'.$recieve_color.';
				}';
				/*Background Color End*/
				
				/*Background Color Start*/
				$html_new .= '#readmore_btn .btn-container a, #block_content_first .cp_color_frontend_class,  #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li:hover > .item_link, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li > .item_link:hover, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li > .item_link:focus, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link{
					background-color:'.$recieve_color.' !important;
				}';
				/*Background Color End*/

				/*Border Color Start*/
				$html_new .= '.top-strip, textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus, section.follow-us, .widget-papular-post ul li:hover, .events .event-header span, .faq-2 .accordion-open, .widget-course-categories, .widget-slider .thumb, .form-box, .woocommerce-tabs ul.tabs li.active, footer #search-text input[type="text"]:focus, .share-course ul li:hover{
					border-color:'.$recieve_color.';
				}';
				/*Border Color End*/
				
				/*Border Color Start*/
				$html_new .= 'a,.services:hover .header .fa-tablet, .services .text a, #course_item_list .text a, .event-galley.next-course .text a, .event-galley .text a, .testimonial-data .testimonial-text a, .widget-article .text,.widget-top-rated .text{
					color:'.$recieve_color.';
				}';
				/*Border Color End*/
				$html_new .= '.cp_course_container .text a,.admin h2, .sidebar-tab-content .text-box a, .sidebar-recent-post ul li .text a, .ignitiondeck h2.id-product-title a, .widget_recent_comments ul li, .logged-in-as a, .cart-collaterals h2 a, .summary .plus, .summary .minus, .product-quantity .minus, .product-quantity .plus, .cart-menu .minus, .cart-menu .plus, .related li h3, .woo_product li h3, .woo_product .span3 h3, .post-time a{
					color:'.$recieve_color.';
				}';
				

				/*Text Color Start*/
				// $html_new .= '.cp_course_container h4 a, .color, .contant .sec-header p, .services .header .inner-icon,  .cp_course_item .course-name span, .student-form .header p, .course-tabs .nav-tabs > li.active i, .course-tabs .nav-tabs > li.active a,  .course-topics .text span, .teachers .social-icons a, .teachers .text p, .post .post-date span, .post .icons ul li a, .post .text h5, .event-galley .text a, .lesson .text span, .next-course .text span, .testimonial-text a, .price-box .price-contant i, .price-box:hover .rate p, .price-box:hover .price-contant p.striped, .price-box:hover .price-footer a, .widget-top-rated ul li .text span, .widget-posts ul li a, .widget-categories ul li a, .copyright a, .list-style1 li a:hover, .list-style2 li a:hover, .chart.easyPieChart, .blog-tags a:hover, .blog-contant h2 a:hover, .blog-comments a i, .pagination ul > li > a, .pagination ul > li > span, .widget-papular-post h4, .widget-papular-post ul li .text p.date span, .widget-twitter ul li a, .widget-twitter ul li:before,  .comments p.date, .event-vanue table tr td i, .text-detail ul li a, .data-tags a:hover, .features i, .tabs .nav-tabs > .active > a, .tabs .nav-tabs > .active > a:hover, .tabs .nav-tabs > .active > a:focus,  .faq-2 .accordion-open p,  .gallery .social-icons a,  .search-result a, .search-result a:hover, .teacher-profile .profile .title p, .teacher-profile .profile .detail, .sidebar-tab-content .text-box a, .sidebar-recent-post ul li .text a, .ignitiondeck h2.id-product-title a, .widget_recent_comments ul li, .logged-in-as a,  .summary .plus, .summary .minus, .product-quantity .minus, .product-quantity .plus, .cart-menu .minus, .cart-menu .plus,  .post-time a, .widget_rss ul li a.rsswidget, .woocommerce-message .button:hover, .css-locations-list ul li a, .em-pagination strong, .css-my-bookings a, a:hover,  .course-box.course-item .text span,  .cp_price_table:hover .cp_price_rate p, .cp_price_table:hover .btn-style, .cp_price_table:hover .table-body ul li a:hover, .tabs .nav-tabs > li.ui-state-active > a, .css-events-list table tbody tr a, .account ul li a:hover, span.wpcf7-not-valid-tip, .cp-mega-menu .mega-menu .sub-menu .cp_menu_mega > a, .follow-us .bx-wrapper .bx-controls-direction a:before, .widget-article .text p a{
					// color:'.$color_font_body.';
				// }';
				
				if($select_layout_cp == 'boxed_layout'){
				$html_new .= '
				#custom_mega .mmm_fullwidth_container{
					width:auto !important;
				}
				.banner_edu{
					overflow:hidden;
				}
				';
				}else{
				
				}
				/*Text Color End*/

				
				
				

		$html_new .= '</style>';
		
		//Color Picker Is Installed 
		if($backend_on_off <> 1){
			die(json_encode($html_new));
		}else{
			return $html_new;
		}
		
	}

	// Add Style to Frontend
	function add_font_code(){
		global $pagenow;
		
		//Style tag Start
		echo '<style type="text/css">';
			
			//Attach Background
			$select_bg_pat = get_themeoption_value('select_bg_pat','general_settings');
			$body_image = get_themeoption_value('body_image','general_settings');
			$image_repeat_layout = get_themeoption_value('image_repeat_layout','general_settings');
			$position_image_layout = get_themeoption_value('position_image_layout','general_settings');
			$image_attachment_layout = get_themeoption_value('image_attachment_layout','general_settings');
			
			 if($select_bg_pat == 'Background-Image'){
				$image_src_head = '';							
				if(!empty($body_image)){ 
					$image_src_head = wp_get_attachment_image_src( $body_image, 'full' );
					$image_src_head = (empty($image_src_head))? '': $image_src_head[0];
					$thumb_src_preview = wp_get_attachment_image_src( $body_image, 'full');
				}
				echo 'body{
				background-image:url('.$thumb_src_preview[0].');
				background-repeat:'.$image_repeat_layout.';
				background-position:'.$position_image_layout.';
				background-attachment:'.$image_attachment_layout.';
				background-size:cover; }';
			}else if($select_bg_pat == 'Background-Color'){ 
				$bg_scheme = get_themeoption_value('bg_scheme','general_settings');
				echo 'body{background:'.$bg_scheme.' !important;} .inner-pages h2 .txt-left{background:'.$bg_scheme.';}';
			}else if($select_bg_pat == 'Background-Patren'){
				$body_patren = get_themeoption_value('body_patren','general_settings');
				$color_patren = get_themeoption_value('color_patren','general_settings');
				//render Body Pattern
				if(!empty($body_patren)){
					$image_src_head = wp_get_attachment_image_src( $body_patren, 'full' );
					$image_src_head = (empty($image_src_head))? '': $image_src_head[0];
					$thumb_src_preview = wp_get_attachment_image_src( $body_patren, array(60,60));
					//Custom patterm
					if($thumb_src_preview[0] <> ''){ echo 'body{background:url('.$thumb_src_preview[0].') repeat !important;}'; }
				}else{ 
					$bg_scheme = get_themeoption_value('bg_scheme','general_settings');
					$color_patren = get_themeoption_value('color_patren','general_settings');
					//Default patterns
					echo 
					'body{background:'.$bg_scheme.' url('.CP_PATH_URL.$color_patren.') repeat;} 
					.inner-pages h2 .txt-left{background:'.$bg_scheme.' url('.CP_PATH_URL.$color_patren.') repeat;}'; 
				}
			}
			
			//Heading Variables
			$heading_h1 = get_themeoption_value('heading_h1','typography_settings');
			$heading_h2 = get_themeoption_value('heading_h2','typography_settings');
			$heading_h3 = get_themeoption_value('heading_h3','typography_settings');
			$heading_h4 = get_themeoption_value('heading_h4','typography_settings');
			$heading_h5 = get_themeoption_value('heading_h5','typography_settings');
			$heading_h6 = get_themeoption_value('heading_h6','typography_settings');
			
			//Render Heading sizes
			if($heading_h1 <> ''){ echo 'h1{ font-size:'.$heading_h1.'px !important; }'; }
			if($heading_h2 <> ''){ echo 'h2{ font-size:'.$heading_h2.'px !important; }'; }
			if($heading_h3 <> ''){ echo 'h3{ font-size:'.$heading_h3.'px !important; }'; }
			if($heading_h4 <> ''){ echo 'h4{ font-size:'.$heading_h4.'px !important; }'; }
			if($heading_h5 <> ''){ echo 'h5{ font-size:'.$heading_h5.'px !important; }'; }
			if($heading_h6 <> ''){ echo 'h6{ font-size:'.$heading_h6.'px !important; }'; }
			
			//Body Font Size
			$font_size_normal = get_themeoption_value('font_size_normal','typography_settings');
			if($font_size_normal <> ''){ echo 'body{font-size:'.$font_size_normal.'px !important;}'; }
			
			//Body Font Family
			$font_google = get_themeoption_value('font_google','typography_settings');
			if($font_google <> 'Default'){ echo 'body,.comments-list li .text p, .header-4-address strong.info,.header-4-address a.email,strong.copy,.widget-box-inner p,.blog-post-box .text p,.box-1 p, .box-1 .textwidget,.get-touch-form input,.get-touch-form strong.title,.footer-copyright strong.copy,#inner-banner p,.welcome-text-box p,.about-me-text p,.about-me-text blockquote q,.team-box .text p,.accordition-box .accordion-inner p,.facts-content-box p,.our-detail-box p,.our-detail-box ul li,.widget_em_widget ul li,.sidebar-recent-post ul li p,blockquote p,blockquote q,.author-box .text p,.contact-page address ul li strong.title,.contact-page address ul li strong.ph,.contact-page address ul li strong.mob,.contact-page address ul li a.email,a.comment-reply-link,.timeline-project-box > .text p,.comments .text p,.event-row .text p,.project-detail p,.news-box .text p,.error-page p,.cp-columns p,.cp-list-style ul li,.customization-options ul li,.cp-accordion .accordion-inner strong,.list-box ul li,.list-box2 ul li,.list-box3 ul li,.tab-content p, .tab-content-area p,.blockquote-1 q,.blockquote-2 q,.map h3,.even-box .caption p,.header-4-address strong.info,.header-4-address a.email,strong.copy,.widget-box-inner p { font-family:"'.$font_google.'";}'; }else{ 
			echo '';
			}
			
			//Body Font Size
			$boxed_scheme = get_themeoption_value('boxed_scheme','general_settings');
			$select_layout_cp = get_themeoption_value('select_layout_cp','general_settings');
			if($select_layout_cp == 'box_layout'){ echo '.boxed{background:'.$boxed_scheme.';}'; }
			
			//Heading Font Family
			$font_google_heading = get_themeoption_value('font_google_heading','typography_settings');
			if($font_google_heading <> 'Default'){ echo 'h1, h2, h3, h4, h5, h6, .head-topbar .left ul li strong.number,.head-topbar .left ul li a,.navigation-area a.btn-donate-2,.footer-menu li a,.footer-menu2 li a,#nav-2 li a,#nav-2 li ul li a,.navigation-area a.btn-donate3,.top-search-input,a.btn-donate5,.navigation-area a.btn-donate,.top-search-input,#nav li a,#nav li ul li a,.cp-banner .caption h1,.cp-banner .caption h2,.cp-banner .caption strong.title,.cp-banner .caption a.view,.widget-box-inner h2,.entry-header > h1,.h-style,.latest-news-box h3,.css3accordion .content .top a,.css3accordion .content .top strong.mnt,.css3accordion .content .top a.comment,.css3accordion .content strong.title,.css3accordion .content p,.css3accordion .content a.readmore,.upcoming-heading h3,.upcoming-box .caption strong.title,.upcoming-box .caption strong.mnt,.upcoming-events-box a.btn-view,.countdown_holding span,.countdown_amount,.countdown_period,.our-project a.btn-view,.our-project h3,.portfolio-filter li a,.gallery-box .caption strong.title,.timeline-box h3,.timeline-head strong.mnt,.timeline-frame-outer .caption h4,.timeline-frame-outer .caption p,.blog-post h3,.blog-post-box .caption strong.date,.blog-post-box .caption strong.comment,.blog-post-box .text strong.title,.blog-post-box .text h4,.blog-post-box .text a.readmore,.blog-post-share strong.title1,.name-box strong.name,.name-box-inner strong,.text-row strong.title,.text-row strong.time,.twitter-info-box ul li strong.number,.twitter-info-box ul li a.tweet,.box-1 h4,.box-1 a.btn-readmore,.box-1 .text strong.title,.box-1 .text strong.mnt,#inner-banner h1,.welcome-text-box h2,.about-me-left .text ul li h3,.about-me-left .text ul li strong.title,.about-me-socila strong.title,.about-me-text h3,.team-member-box h3,.team-box .text h4,.team-box .text h4 a,.team-box .text strong.title,.heading h3,.our-facts-box strong.number,.our-facts-box a.detail,.our-detail-box h4,.accordition-box .accordion-heading .accordion-toggle strong,.facts-tab-box .nav-tabs > li > a, .nav-pills > li > a,.blog-box-1 strong.title,.bottom-row .left span,.bottom-row .left a,.bottom-row .left ul li a,.bottom-row .right strong.title,.blog-box-1 .text h2,.blog-box-1 .text a.readmore,.pagination-all.pagination ul > li > a, .pagination ul > li > span,.sidebar-input,.sidebar-member a.member-text,.sidebar-recent-post h3,.sidebar-recent-post ul li:hover .text strong.title,.widget_em_widget ul li a,.sidebar-recent-post ul li .text strong.title,.sidebar-recent-post ul li a.mnt,.sidebar-recent-post ul li a.readmore,.list-area ul li a,.archive-box ul li a,.tagcloud a,.share-socila strong.title,.author-box .text strong.title,.contact-me-row strong.title,.blog-detail-form h3,.form-area label,.detail-input,.detail-textarea,.detail-btn-sumbit,.post-password-form input[type="submit"],#searchsubmit,.detail-btn-sumbit2,a.comment-reply-link,.donate-page h2,.donate-form ul li a,.donate-form-area ul li label,.donate-input,.donate-btn-submit,.timeline-project-box .holder .heading-area,.timeline-project-box .blog-box-1 > .text h2,.comment-box h3,.comments .text strong.title,.comments .text a.date,.comments .text a.reply,.timer-area ul li a,.event-detail-timer .countdown-amount,.countdown-period,.contact-me-row2 strong.title,.contact-me-row2 ul li a,.related-event-box h3,.related-box .text strong.title,.related-box .text a.date,.member-input,.member-input-2,.member-input-3,.member-form label,.check-box strong.title,.member-btn-submit,.event-heading a,.event-row .text h2,.detail-row li a,.map-row a.location,.project-detail h2,.project-detail-list li .even,.project-detail-list li .odd,.other-project h3,.news-box .text-top-row span,.news-box .text-top-row a,.news-box .text-top-row a,.news-box .text h2,.news-box .text a.readmore,.slide-out-div h3,.error-page h2,.cp-columns h2,.cp-columns strong.title,.customization-options h2,.cp-highlighter h2,.cp-accordion .accordion-heading .accordion-toggle strong,.cp-testimonials h2,.frame-box strong.name,.frame-box strong.title,.testimonial-box-1 blockquote q,.single-testimonial blockquote q,.frame-box2 strong.name,.frame-box2 strong.title,.button-box a,.typography h1,h2.cp-heading-full,.typography h2,h3.cp-heading-full,.typography h3,h4.cp-heading-full,.typography h4,h5.cp-heading-full,.typography h5,h6.cp-heading-full,.typography h6,.tabs-box .nav-tabs > li > a, .nav-pills > li > a,#wp-calendar caption,.even-box .caption h2,.timeline-round strong.year,#search-text input[type="text"],.sidebar-recent-post select,.content_section .review-final-score h3,.content_section .review-final-score h4{ font-family:"'.$font_google_heading.'";}'; }else{ echo 'h1, h2, h3, h4, h5, h6{}';}
			
			//Menu Font Family
			$menu_font_google = get_themeoption_value('menu_font_google','typography_settings');
			if($menu_font_google <> 'Default'){ echo '#mega_main_menu.main-menu > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li > .item_link, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li > .item_link .link_text, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li.nav_search_box *, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li .post_details > .post_title, #mega_main_menu.main-menu > .menu_holder > .menu_inner > ul > li .post_details > .post_title > .item_link, .navigation ul{font-family:"'.$menu_font_google.' !important";}';}else{ echo '#nav{font-family:"Open Sans",sans-serif;}';}
			
		echo '</style>';
		//Style Tag End
		
		
		$color_scheme = get_themeoption_value('color_scheme','general_settings');	
		$body_color = get_themeoption_value('body_color','general_settings');
		$heading_color = get_themeoption_value('heading_color','general_settings');
		$select_layout_cp = get_themeoption_value('select_layout_cp','general_settings');
		
		$recieve_color = '';
		$recieve_an_color = '';
		$html_new = '';
		$backend_on_off = 1;
		//Color Scheme
		echo cp_color_bg($color_scheme,$bg_texture='',$navi_color='',$heading_color,$body_color,$select_layout_cp,$backend_on_off);
	}

	//Add Style in Footer
	global $pagenow;
	if( $GLOBALS['pagenow'] != 'wp-login.php' ){
		if(!is_admin()){
			//for Frontend only
			add_action('wp_head', 'add_font_code');
		}
	}