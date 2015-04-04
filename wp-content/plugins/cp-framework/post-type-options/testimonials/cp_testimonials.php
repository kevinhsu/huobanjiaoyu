<?php
//Condition for Parent Class
if(class_exists('function_library')){
	
	add_action( 'plugins_loaded', 'testimonial_override' );
	function testimonial_override() {
		$testi_class = new cp_testi_class;
	}

	class cp_testi_class extends function_library{
		// public $testi_array = array(
		
			// 'image_icon' =>array(

				// 'type'=> 'image',
				
				// 'name'=> 'aa',

				// 'hr'=> 'none',

				// 'description'=> "fa fa-comments"),
			
			// "top-bar-div331-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div331'),	

			// 'header'=>array(

				// 'title'=> 'TESTIMONIAL HEADER TITLE',

				// 'name'=> 'page-option-item-testi-header-title',

				// 'type'=> 'inputtext'),
				
			// 'category'=>array(

				// 'title'=>'CHOOSE CATEGORY',

				// 'name'=>'page-option-category-testi',

				// 'options'=>array(),

				// 'type'=>'combobox_category',

				// 'hr'=> 'none',

				// 'description'=>'Choose the testimonial category you want to fetch the testimonials.'),		
			
			// 'num_excerpt'=>array(

				// 'title'=>'NUMBER OF EXCERPT',

				// 'name'=>'page-option-item-testi-excerpt',

				// 'type'=> 'inputtext',

				// 'default'=> 200,

				// 'description'=>'Number of words to show on each testimonial, leaving black all characters will be displayed.'),
				
			// "top-bar-div331-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div331'),		
			
			// "top-bar-div341-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div341'),	
			
			// 'pagination'=>array(

				// 'title'=>'ENABLE PAGINATION',

				// 'name'=>'page-option-item-testi-pagination',

				// 'type'=> 'combobox',

				// 'options'=>array('0'=>'Wp-Default', '1'=>'Theme-Custom','2'=>'No-Pagination'),

				// 'hr'=> 'none',

				// 'description'=>'Pagination will only appear when the number of posts is greater than the number of fetched item in one page you can also select wordpress default pagination that can be added from settings.'),

			// 'num-fetch'=>array(					

				// 'title'=> 'NUM OF TESTIMONIALS',

				// 'name'=> 'page-option-item-testi-num-fetch',

				// 'type'=> 'inputtext',
				
				// 'class'=>'testi-fetch-item',

				// 'default'=> 9,

				// 'description'=>'Set the number of testimonials to display on one page.'),
				
			// "top-bar-div341-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div341'),			


		// );
		
		public $testi_slider_array = array(
		
			'image_icon' =>array(

				'type'=> 'image',
				
				'name'=> 'aa',

				'hr'=> 'none',

				'description'=> "fa fa-smile-o"),
			
			"top-bar-div361-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div361'),	

			'header'=>array(

				'title'=> 'TEAM HEADER TITLE',

				'name'=> 'page-option-testi-slider-header-title',

				'type'=> 'inputtext'),			
			
			'layout'=>array(

				'title'=>'SELECT LAYOUT',

				'name'=>'page-option-item-layout-testi-sel',

				'type'=> 'combobox',

				'options'=>array('0'=>'Normal Slider', '1'=>'Modern Slider'),

				'hr'=> 'none',

				'description'=>'Select layout for your testimonial slider.'),
			
			'category'=>array(

				'title'=>'CHOOSE CATEGORY',

				'name'=>'page-option-category-testi-slider',

				'options'=>array(),

				'type'=>'combobox_category',

				'hr'=> 'none',

				'description'=>'Choose the testimonial category you want to fetch the testimonials.'),		
				
			"top-bar-div361-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div361'),
			
			"top-bar-div371-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div371'),

			'num-fetch'=>array(					

				'title'=> 'NUM OF TESTIMONIALS',

				'name'=> 'page-option-testi-slider-num-fetch',

				'type'=> 'inputtext',
				
				'class'=>'cp-testi-client-fetch-item',

				'default'=> 5,

				'description'=>'Set the number of testimonials to display on one page.'),
			
			"top-bar-div371-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div371'),			
			


		);
		
		
		public $testi_size_array =  array('element1-1'=>'1/1');		
		public $slider_testi_size_array =  array('element1-2'=>'1/2','element2-3'=>'2/3','element1-1'=>'1/1');		

	
		
		public function page_builder_size_class(){
			global $div_size;
			$div_size['Testimonial'] = $this->testi_size_array;	  
			$div_size['Client-Slider'] = $this->slider_testi_size_array;	  
		}
		
		public function page_builder_element_class(){
		global $page_meta_boxes;
			//$page_meta_boxes['Page Item']['name']['Testimonial'] = $this->testi_array;
			$page_meta_boxes['Page Item']['name']['Client-Slider'] = $this->testi_slider_array;
			//$page_meta_boxes['Page Item']['name']['Our-Team']['select_feature']['options'] = function_library::get_title_list_array( 'teams' );	
			//$page_meta_boxes['Page Item']['name']['Testimonial']['category']['options'] = function_library::get_category_list_array( 'testimonial-category' );
			$page_meta_boxes['Page Item']['name']['Client-Slider']['category']['options'] = function_library::get_category_list_array( 'testimonial-category' );
			
			

		}
		
		public function __construct(){
			add_action( 'init', array( $this, 'create_testi' ) );
			add_action( 'add_meta_boxes', array( $this, 'add_testi_option' ) );	
			add_action( 'save_post', array( $this, 'save_testimonial_option_meta' ) );	
		}
		
		
		public function create_testi() {
			//$portfolio_translation = get_option(THEME_NAME_S.'_cp_portfolio_slug','portfolio');
			
			$labels = array(
				'name' => _x('Testimonial', 'Testimonial General Name', 'crunchpress'),
				'singular_name' => _x('Testimonial', 'Event Singular Name', 'crunchpress'),
				'add_new' => _x('Add New', 'Add New Testimonial Name', 'crunchpress'),
				'add_new_item' => __('Add New Testimonial', 'crunchpress'),
				'edit_item' => __('Edit Testimonial', 'crunchpress'),
				'new_item' => __('New Testimonial', 'crunchpress'),
				'view_item' => __('View Testimonial', 'crunchpress'),
				'search_items' => __('Search Testimonial', 'crunchpress'),
				'not_found' =>  __('Nothing found', 'crunchpress'),
				'not_found_in_trash' => __('Nothing found in Trash', 'crunchpress'),
				'parent_item_colon' => ''
			);
			
			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_icon' => 'dashicons-format-quote',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 100,
				'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
				'has_archive' => true,
				'rewrite' => array('slug' => '', 'with_front' => false)
			  ); 
			  
			register_post_type( 'testimonial' , $args);	
			flush_rewrite_rules();

			register_taxonomy(
				"testimonial-category", array("testimonial"), array(
					"hierarchical" => true,
					"label" => "Testimonial Categories", 
					"singular_label" => "Testimonial Categories", 
					"rewrite" => true));
			register_taxonomy_for_object_type('testimonial-category', 'testimonial');			
		}
		
		public function add_testi_option(){	
		
			add_meta_box('testi-option', __('Testimonial Options - Add Icons with their URLs','crunchpress'),array($this,'add_testimonial_option_element'),
				'testimonial', 'normal', 'high');
				
		}
		
		public function add_testimonial_option_element(){
			
			foreach($_REQUEST as $keys=>$values){
				$$keys = $values;
			}
			global $post,$countries;
			
			$designation_text = get_post_meta($post->ID, 'designation_text', true);
		
		?>
			<div class="event_options">		
				<div class="row-fluid">
					<ul class="designation_class recipe_class span12">
						<li class="panel-input">
							<span class="panel-title">
								<h3> <?php esc_html_e('DESIGNATION', 'crunchpress'); ?> </h3>
							</span>
							<input type="text" name="designation_text" id="designation_text" value="<?php if($designation_text <> ''){echo esc_attr($designation_text);}?>" />
							<p><?php esc_html_e('Add designation text here.', 'crunchpress'); ?></p>
						</li>
					</ul>
				</div>			
				<div style="float:left;" class="op-gap add-music">
					<!--my start -->
					<ul class="recipe_class row-fluid cp_bg_image">
						<li class="panel-title time-start span3">
							<h4><i class="fa fa-music"></i> <?php esc_html_e('Icon Name', 'crunchpress'); ?></h4>
							<input type="text" class="" id="add-track-name" value="e.g. fa fa-lock" rel="Add Field Name">
						</li>

						<li class="panel-title border_left time_end span3">
							<h4><i class="fa fa-link"></i> <?php esc_html_e('Add URL', 'crunchpress'); ?></h4>
							<!--<input type="text" class="" id="add-track-title" value="Add Track URL" rel="Add Track URL">-->
							<input id="upload_image_text" name="add-track-title" class="clearme" rel="Add Field Data" type="text" value="#" />							
						</li>
						
						<li class="panel-title border_left delete_btn span1">
							<h4><i class="fa fa-minus"></i> / <i class="fa fa-plus"></i></h4>
							<div id="add-more-tracks" class="add-track-element"></div>
						</li>
					</ul>	
					<div class="clear"></div>
					<ul id="selected-element" class="selected-element nut_table_inner">
						<li class="default-element-item" id="element-item">
							<ul class="career_salary_class recipe_class row-fluid">
								<li class="panel-title span3">
									<input class="element-track-name" type="text" id="add-track-name" value="e.g. fa fa-lock" rel="Add Field Name">
									<!--<span class="ingre-item-text"></span>-->
								</li>	
								<li class="panel-title border_left span3">
									<input id="upload_image_text" class="element-track-title" type="text" value="#" rel="Add Field Data" />									
									<!--<input class="element-track-title" type="text" id="add-track-title" value="Add Track URL" rel="Add Track URL">-->
									<!--<span class="ingre-item-text"></span>-->
								</li>								
								<li class="panel-title border_left span1"><span class="panel-delete-element"></span></li>
							</ul>
						</li>
						
					<?php
						//Fetching All Tracks from Database
						$track_name_xml = get_post_meta($post->ID, 'add_icon_xml', true);
						$track_url_xml = get_post_meta($post->ID, 'add_project_field_xml', true);
						
						//Empty Variables
						//$album_download = '';
						$children = '';
						$children_title = '';

						//Track Name
						if($track_name_xml <> ''){
							$ingre_xml = new DOMDocument();
							$ingre_xml->recover = TRUE;
							$ingre_xml->loadXML($track_name_xml);
							$children_name = $ingre_xml->documentElement->childNodes;
						}		
						
						//Track URL
						if($track_url_xml <> ''){	
							$ingre_title_xml = new DOMDocument();
							$ingre_title_xml->recover = TRUE;
							$ingre_title_xml->loadXML($track_url_xml);
							$children_title = $ingre_title_xml->documentElement->childNodes;
						}
					
						
						//Combine Loop
						if($track_name_xml <> '' || $track_url_xml <> ''){
							$counter = 0;
							$nofields = $ingre_xml->documentElement->childNodes->length;
							for($i=0;$i<$nofields;$i++) { 
								$counter++;?>
								<li class="" style="display: block;">
									<ul class="career_salary_class recipe_class row-fluid">
										<li class="panel-title span3">
											<input class="" type="text" name="add-track-name[]" value="<?php echo esc_attr($children_name->item($i)->nodeValue);?>">
										</li>	
										<li class="panel-title border_left span3">
											<input id="upload_image_text" class="element-track-title" type="text" name="add-track-title[]" value="<?php echo esc_attr($children_title->item($i)->nodeValue);?>" />											
										</li>
										<li class="panel-title span1 border_left"><span class="panel-delete-element"></span></li>
									</ul>
								</li>
								<?php
							}
						} ?>
					</ul>
				</div>
				<input type="hidden" name="testimonial_submit" value="testimonial"/>
				<div class="clear"></div>
			</div>	
			<div class="clear"></div>
		<?php }
		
		
		public function save_testimonial_option_meta($post_id){
			
	
			foreach($_REQUEST as $keys=>$values){
				$$keys = $values;
			}
		
			if(defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return;
		
				if(isset($testimonial_submit) AND $testimonial_submit == 'testimonial'){
				
					//Saving Sidebar and Social Sharing Settings as XML
					$old_data = get_post_meta($post_id, 'designation_text',true);
					save_meta_data($post_id, $designation_text, $old_data, 'designation_text');
					
					//Track Name
					$add_icon_xml = '<add_icon_xml>';
					if(isset($_POST['add-track-name'])){
						$track_name_item = $_POST['add-track-name'];
						if(isset($track_name_item)){
							foreach($track_name_item as $keys=>$values){
								$add_icon_xml = $add_icon_xml . function_library::create_xml_tag('add_icon_xml',$values);
							}
						}
					}else{$add_icon_xml = '<add_icon_xml>';}
					$add_icon_xml = $add_icon_xml . '</add_icon_xml>';
				
					//Save Post
					$old_data = get_post_meta($post_id, 'add_icon_xml',true);
					function_library::save_meta_data($post_id, $add_icon_xml, $old_data, 'add_icon_xml');
					
					
					//Track URL
					$track_url_item = array();
					$add_project_field_xml = '<add_project_field_xml>';
					if(isset($_POST['add-track-title'])){
						$track_url_item = $_POST['add-track-title'];
						if(is_array($track_url_item)){
							foreach($track_url_item as $keys=>$values){
								$add_project_field_xml = $add_project_field_xml . function_library::create_xml_tag('add_project_field_xml',$values);
							}
						}
					}else{$add_project_field_xml = '<add_project_field_xml>';}
					$add_project_field_xml = $add_project_field_xml . '</add_project_field_xml>';
				
					//Save Post
					$old_data = get_post_meta($post_id, 'add_project_field_xml',true);
					function_library::save_meta_data($post_id, $add_project_field_xml, $old_data, 'add_project_field_xml');
				}
		}

		// Print Testimonial Slider
		// Print Testimonial Slider
		public function print_testimonial_slider($item_xml){
			global $counter;
			$header = find_xml_value($item_xml, 'header');
			$category = find_xml_value($item_xml, 'category');
			$layout = find_xml_value($item_xml, 'layout');
			$num_fetch = find_xml_value($item_xml, 'num-fetch');
			
			if($category == '0'){
				query_posts(
					array( 
					'post_type' => 'testimonial',
					'posts_per_page' => 5,
					'orderby' => 'title',
					'order' => 'ASC' )
				);
			}else{
				query_posts(
					array( 
					'post_type' => 'testimonial',
					'posts_per_page' => 5,
					//'ignore_sticky_posts' => true,
					'tax_query' => array(
						array(
							'taxonomy' => 'testimonial-category',
							'terms' => $category,
							'field' => 'term_id',
						)
					),
					'orderby' => 'title',
					'order' => 'ASC' )
				);
			}
			if($layout == 'Modern Slider'){
			echo '
				<!--HAPPY PARENTS START-->
				<div class="happy-parents">
					<script type="text/javascript">
					jQuery(document).ready(function ($) {
						"use strict";
						if ($("#cp_testi-'.$counter.'").length) {
							$("#cp_testi-'.$counter.'").bxSlider({
							});
						}
					});
					</script>
						<ul id="cp_testi-'.$counter.'" class="cp_testi_bxslider">';
							while ( have_posts() ): the_post();global $post,$post_id;
							$designation_text = get_post_meta($post->ID, 'designation_text', true);
							echo '
							<!--LIST ITEM START-->
							<li>
								<div class="thumb">
									<a href="'.get_permalink().'">'.get_the_post_thumbnail($post_id, array(150,150)).'</a>
								</div>
								<div class="text">
									<h2><a href="'.esc_url(get_permalink()).'">'.esc_html(get_the_title()).'</a></h2>
									<p>'.substr(esc_html(get_the_content()),0,150).'</p>
									<a href="'.get_permalink().'" class="signature">'.$designation_text.'</a>
								</div>
							</li>
							<!--LIST ITEM END-->';
							endwhile;
							wp_reset_postdata();
						echo '</ul>
					
				</div>
				<!--HAPPY PARENTS END-->';
			}else{
			if ( have_posts() <> "" ) { ?>
				<div class="testimonial-contant">
					<script type="text/javascript">
					jQuery(document).ready(function ($) {
						"use strict";
						if ($('#testimonial-<?php echo esc_attr($counter)?>').length) {
							$('#testimonial-<?php echo esc_attr($counter)?>').bxSlider({
								pagerCustom: '#bx-pager-2',
							});
						}
					});
					</script>
					<?php if($header <> ''){ ?><h2><?php echo esc_html($header);?></h2><?php }?>
					<div class="testimonial-data">
						<ul id="testimonial-<?php echo esc_attr($counter);?>" class="bxslider2">
							<?php
							
							while ( have_posts() ): the_post();global $post,$post_id;
							$designation_text = get_post_meta($post->ID, 'designation_text', true);
							?>
							 <li>
								<div class="testimonial-text">
									<p><?php echo substr(esc_html(get_the_content()),0,150);?></p>
									<a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html(get_the_title());?></a>
								</div>
							</li>
							<?php 
							
							endwhile; ?>
						</ul>
						<div class="thumb_navi" id="bx-pager-2">				
							<?php 
							
							$testi_monial_slider = 0;
							while ( have_posts() ): the_post();
							global $post,$post_id;
							$designation_text = get_post_meta($post->ID, 'designation_text', true);
							
							?>
								<a data-slide-index="<?php echo $testi_monial_slider;?>" href="">
									<div class="thumb">								
										<?php echo get_the_post_thumbnail($post_id, array(80,80));?>
									</div>
									<p><?php echo esc_html(get_the_title());?></p>
									<p class="color"><?php echo esc_attr($designation_text);?></p>
								</a>
							<?php
							$testi_monial_slider++;
							endwhile;
							wp_reset_postdata();
							?>
						</div>					
					</div>
				<!--TESTIMONIALS ARTICLE END-->
				</div>
		<?php } //Has Posts
			} // Modern Style
		wp_reset_query();
		
		}
		
		// Print Testimonial
		public function print_testimonial($item_xml){

			$header = find_xml_value($item_xml, 'header');
			$category = find_xml_value($item_xml, 'category');
			$num_excerpt = find_xml_value($item_xml, 'num_excerpt');
			$pagination = find_xml_value($item_xml, 'pagination');
			$num_fetch = find_xml_value($item_xml, 'num-fetch');
			if(!empty($header)){
				echo '<h2 class="heading">' . $header . '</h2>';
			}
			
			if(empty($paged)){
				$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
			}
				
			$args = array(
				'posts_per_page'			=> $num_fetch,
				'paged'						=> $paged,
				'post_type'					=> 'testimonial',
				'testimonial-category'		=> $category,
				'post_status'				=> 'publish',
				'order'						=> 'DESC',
				);
			query_posts($args);
			if ( have_posts() ) { 
				echo '<div class="testimonials-list"><ul>';
					while ( have_posts() ): the_post();
						echo '
						<li>
							<h4>'.get_the_title().'</h4>
							<p>'.substr(get_the_content(),0,$num_excerpt).'</p>
						</li>';
					endwhile;			
					wp_reset_postdata();
				echo '
                    </ul>
                </div>                
				';
			}
			wp_reset_query();
		}
		
	}
}	