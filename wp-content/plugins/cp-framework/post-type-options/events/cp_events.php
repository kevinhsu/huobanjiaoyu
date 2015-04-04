<?php
if(class_exists('function_library')){

	add_action( 'plugins_loaded', 'event_fun_override' );

	function event_fun_override() {
		// your code here
		$events_class = new cp_events_class;
	}

	//Include the Widget
	//include_once('cp_event_countdown_widget.php');
	
	class cp_events_class extends function_library{
				public $events_array = array(
					
					'image_icon' =>array(

						'type'=> 'image','name'=> '',

						'hr'=> 'none',

						'description'=> "fa fa-calendar-o"),
						
					"top-bar-div2-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div2'),	

					'header'=>array(

						'title'=> 'EVENT HEADER TITLE',

						'name'=> 'page-option-item-event-header-title',
						
						'description'=>'Please add header title here it will be shown at top of this element.',

						'type'=> 'inputtext'),
						
					'eventview'=>array(

						'title'=>'SELECT EVENT VIEW',

						'name'=>'page-option-item-event-view',

						'type'=> 'combobox',

						'options'=>array('0'=>'Listing View','1'=>'Grid View', '2'=>'Calendar View','3'=>'Event Gallery'),

						'description'=>'This option enable the events show as in listing and in calendar view.'),	
						
					'category'=>array(

						'title'=>'SELECT EVENT CATEGORY',

						'name'=>'page-option-item-event-category',

						'options'=>array(),

						'type'=>'combobox_category',

						'hr'=> 'none',

						'description'=>'Choose the event category you want to fetch its events.'),
					
					"top-bar-div2-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div2'),	

					"top-bar-div3-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div3'),	
					
					'eventtype'=>array(

						'title'=>'SELECT EVENT TYPE',

						'name'=>'page-option-item-event-type',

						'type'=> 'combobox',

						'options'=>array('0'=>'All Events', '1'=>'Upcoming Events','2'=>'Past Events'),

						'description'=>'This option enable the category events that helps you filter the event from past Or future.'),	
						
					'num-excerpt'=>array(					

						'title'=> 'LENGHT OF EXCERPT',

						'name'=> 'page-option-item-event-num-excerpt',

						'type'=> 'inputtext',
						
						'class'=> 'event-type-item',

						'default'=> 100,

						'description'=>'Set the event description content character length to each event.'),

					'pagination'=>array(

						'title'=>'ENABLE PAGINATION',

						'name'=>'page-option-item-event-pagination',

						'type'=> 'combobox',
						
						'class'=> 'event-type-item',

						'options'=>array('0'=>'Wp-Default', '1'=>'Theme-Custom','2'=>'No-Pagination'),

						'hr'=> 'none',

						'description'=>'Pagination will only appear when the number of posts is greater than the number of fetched item in one page you can also select wordpress default pagination that can be added from settings.'),
					
					"top-bar-div3-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div3'),	

					"top-bar-div4-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div4'),					
					
					'num-fetch'=>array(					

						'title'=> 'NUMBER OF EVENTS TO SHOW',

						'name'=> 'page-option-item-event-num-fetch',

						'type'=> 'inputtext',
						
						'class'=>'event-fetch-item',

						'default'=> 5,

						'description'=> 'Set the number of events you want to fetch on one page.'),	
						
					'event-layout'=>array(

						'title'=>'SELECT EVENT LAYOUT',

						'name'=>'page-option-item-event-layout',

						'type'=> 'combobox',
						
						'class'=>'event-fetch-item',

						'options'=>array('1'=>'1 Column','2'=>'2 Columns','3'=>'3 Columns','4'=>'4 Columns'),

						'description'=>'You can manage your event layout here, grid or full width.'),
					
					"top-bar-div4-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div4'),

				);

				public $upcomming_event = array(
				
					'image_icon' =>array(

						'type'=> 'image','name'=> '',

						'hr'=> 'none',

						'description'=> "fa fa-calendar"),
					
					"top-bar-div5-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div5'),	

					'header'=>array(

						'title'=> 'EVENT HEADER TITLE',

						'name'=> 'page-option-item-event-counter-counter',
						
						'description'=>'Please add header title here it will be shown at top of this element.',

						'type'=> 'inputtext'),
						
					'category'=>array(

						'title'=>'CHOOSE EVENT CATEGORY',

						'name'=>'page-option-item-event-category-counter',

						'options'=>array(),

						'type'=>'combobox_category',

						'hr'=> 'none',

						'description'=>'Choose the event category you want to fetch its events.'),	
						
					'num-fetch'=>array(					

						'title'=> 'NUMBER OF EVENTS TO SHOW',

						'name'=> 'page-option-upcoming-event-num-fetch',

						'type'=> 'inputtext',
						
						'class'=>'',

						'default'=> 5,

						'description'=> 'Set the number of events you want to fetch in slider.'),		
					
					"top-bar-div5-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div5'),
					
				);	

				public $next_events = array(
			
				"top-bar-div6-open" => array( 'type'=>'open' ,'name'=>'div_start','class'=>'row-fluid','id'=>'cp-top-bar-div6'),
				
					'image_icon' =>array(

						'type'=> 'image','name'=> '',

						'hr'=> 'none',

						'description'=> "fa fa-sliders"),

					'header'=>array(

						'title'=> 'HEADER TITLE',

						'name'=> 'page-option-item-event-next-name',
						
						'description'=>'Please add header title here it will be shown at top of this element.',

						'type'=> 'inputtext'),
						
					'category'=>array(

						'title'=>'CHOOSE CATEGORY',

						'name'=>'page-option-item-event-category-next',

						'options'=>array(),

						'type'=>'combobox_category',

						'hr'=> 'none',

						'description'=>'Choose the event category you want the events to be fetched.'),			
					
					"top-bar-div6-close" => array( 'name'=>'div_end','type'=>'close' ,'id'=>'cp-top-bar-div6'),
					
				);		
		
		
		public $events_size = array('element1-1'=>'1/1','element2-3'=>'2/3');
		public $events_counter_size = array('element2-3'=>'2/3');
		public $next_events_size = array('element1-1'=>'1/1');
		public $upcom_event_size = array('element1-1'=>'1/1');
		
		
		
		
		//Define Sizes of Pagebuilder elements here	
		public function page_builder_size_class(){
		global $div_size;
			$div_size['Events'] = $this->events_size;	 
			$div_size['Event-Slider'] = $this->upcom_event_size;	 
			//$div_size['Event-Calendar'] = $this->events_counter_size;
			//$div_size['Venue'] = $this->venue_size_array;
			$div_size['Next-Events'] = $this->next_events_size;
			
		}
		
		//Define Parameters of Page Builder Here
		public function page_builder_element_class(){
		global $page_meta_boxes;
			$page_meta_boxes['Page Item']['name']['Events'] = $this->events_array;
			$page_meta_boxes['Page Item']['name']['Event-Slider'] = $this->upcomming_event;
			//$page_meta_boxes['Page Item']['name']['Event-Calendar'] = $this->events_counter;
			//$page_meta_boxes['Page Item']['name']['Venue'] = $this->events_loc_array;
			$page_meta_boxes['Page Item']['name']['Next-Events'] = $this->next_events;

			$page_meta_boxes['Page Item']['name']['Events']['category']['options'] = function_library::get_category_list_array( 'event-categories' );
			$page_meta_boxes['Page Item']['name']['Event-Slider']['category']['options'] = function_library::get_category_list_array( 'event-categories'  );
			//$page_meta_boxes['Page Item']['name']['Event-Calendar']['category']['options'] = function_library::get_category_list_array( 'event-categories'  );
			//$page_meta_boxes['Page Item']['name']['Venue']['location']['options'] = function_library::get_title_list_array( 'event_location' );
			$page_meta_boxes['Page Item']['name']['Next-Events']['category']['options'] = function_library::get_category_list_array( 'event-categories'  );
		}
		
		public function __construct(){
			//add_action( 'init', array( $this, 'create_events' ) );
			add_action( 'add_meta_boxes', array( $this, 'add_events_option' ) );
			add_action( 'save_post', array( $this, 'save_event_option_meta' ) );
			//add_action( 'save_post', array( $this, 'save_event_location_meta' ) );
		}

		
		public function create_events() {
			//$portfolio_translation = get_option(THEME_NAME_S.'_cp_portfolio_slug','portfolio');
			
			$labels = array(
				'name' => _x('Events', 'Event General Name', 'crunchpress'),
				'singular_name' => _x('Event Item', 'Event Singular Name', 'crunchpress'),
				'add_new' => _x('Add New', 'Add New Event Name', 'crunchpress'),
				'add_new_item' => __('Add New Event', 'crunchpress'),
				'edit_item' => __('Edit Event', 'crunchpress'),
				'new_item' => __('New Event', 'crunchpress'),
				'view_item' => __('View Event', 'crunchpress'),
				'search_items' => __('Search Event', 'crunchpress'),
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
				'menu_icon' => CP_PATH_URL . '/framework/images/calendar-icon.png',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 5,
				'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
				'rewrite' => array('slug' => 'events', 'with_front' => false)
			  ); 
			  
			register_post_type( 'events' , $args);
			
			// adding Manage Location start
					$labels = array(
						'name' => __('Manage Location', 'crunchpress'),
						'add_new_item' => __('Add New Location (Venue Title)', 'crunchpress'),
						'edit_item' => __('Edit Location', 'crunchpress'),
						'new_item' => __('New Location Item', 'crunchpress'),
						'add_new' => __('Add New Location', 'crunchpress'),
						'view_item' => __('View Location Item', 'crunchpress'),
						'search_items' => __('Search Location', 'crunchpress'),
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
						//'menu_icon' => get_stylesheet_directory_uri() . '/images/calendar.png',
						'show_in_menu' => 'edit.php?post_type=events',
						'show_in_nav_menus'=>true,
						'rewrite' => true,
						'capability_type' => 'post',
						'hierarchical' => false,
						'menu_position' => null,
						'supports' => array('title')
					); 
					register_post_type( 'event_location' , $args );  
				// adding Manage Location end
			
			
			register_taxonomy(
				"event-category", array("events"), array(
					"hierarchical" => true,
					"label" => "Event Categories", 
					"singular_label" => "Event Categories", 
					"rewrite" => true));
			register_taxonomy_for_object_type('events-categories', 'events');
			
			register_taxonomy(
				"event-tag", array("events"), array(
					"hierarchical" => false, 
					"label" => "Event Tag", 
					"singular_label" => "Event Tag", 
					"rewrite" => true));
			register_taxonomy_for_object_type('events-tag', 'events');
			
		}
		
		
		
		public function add_events_option(){	
		
			add_meta_box('event-option', __('Event Options','crunchpress'), array($this,'add_event_option_element'),
				'event', 'normal', 'high');
				
		}
		
		public function add_event_option_element(){

			$event_detail_xml = '';
			$event_social = '';
			$sidebar_event = '';
			$right_sidebar_event = '';
			$left_sidebar_event = '';
			$event_start_date = '';
			$event_end_date = '';
			$event_start_time = '';
			$event_end_time = '';
			$additional_info = '';
			$entry_level = '';
			$booking_url = '';
			$event_thumbnail = '';
			$video_url_type = '';
			$select_slider_type = '';
			$event_location_select = '';
			$schedule_head = '';
			$schedule_descrip = '';
			$team_parti_head = '';
			$team_parti_descrip = '';
			$name_post_schedule = '';
			$title_post_schedule = '';
			$des_post_schedule = '';
			$sch_select_organizer = '';
			$page_caption = '';
			
			foreach($_REQUEST as $keys=>$values){
				$$keys = $values;
			}
			global $post,$EM_Event;
			
			$event_detail_xml = get_post_meta($EM_Event->ID, 'event_detail_xml', true);
			if($event_detail_xml <> ''){
				$cp_event_xml = new DOMDocument ();
				$cp_event_xml->loadXML ( $event_detail_xml );
				$event_social = find_xml_value($cp_event_xml->documentElement,'event_social');
				$sidebar_event = find_xml_value($cp_event_xml->documentElement,'sidebar_event');
				$left_sidebar_event = find_xml_value($cp_event_xml->documentElement,'left_sidebar_event');
				$right_sidebar_event = find_xml_value($cp_event_xml->documentElement,'right_sidebar_event');
				$event_thumbnail = find_xml_value($cp_event_xml->documentElement,'event_thumbnail');
				$video_url_type = find_xml_value($cp_event_xml->documentElement,'video_url_type');
				$select_slider_type = find_xml_value($cp_event_xml->documentElement,'select_slider_type');
				$page_caption = find_xml_value($cp_event_xml->documentElement,'page_caption');
				
			}
		?>
			<div class="event_options cp-wrapper" id="event_backend_options" >
				<!--<?php if($post->ID <> ''){?>
				<div class="short_code">
					<p class="shortcode_placeholder">[Event event_id="<?php echo esc_attr($post_id);?>" showImage="false" showTitle="false" showContent="false" first_event_in_row="false"]</p>
				</div>
				<?php }?>-->
				<ul class="event_social_class recipe_class row-fluid">
					<li class="panel-input span4">
						<span class="panel-title">
							<h3 for="event_social" > <?php esc_html_e('SOCIAL NETWORKING', 'crunchpress'); ?> </h3>
						</span>
						<label for="event_social"><div class="checkbox-switch <?php
						
						echo ($event_social=='enable' || ($event_social=='' && empty($default)))? 'checkbox-switch-on': 'checkbox-switch-off'; 

					?>"></div></label>
					<input type="checkbox" name="event_social" class="checkbox-switch" value="disable" checked>
					<input type="checkbox" name="event_social" id="event_social" class="checkbox-switch" value="enable" <?php 
						
						echo ($event_social=='enable' || ($event_social=='' && empty($default)))? 'checked': ''; 
					
					?>>
						<p><?php esc_html_e('You can turn On/Off social sharing from event detail.','crunchpress'); ?></p>
					</li>
					<li class="panel-input span8">
						<span class="panel-title">
							<h3> <?php esc_html_e('Event Page Caption', 'crunchpress'); ?> </h3>
						</span>
						<input type="text" name="page_caption" id="page_caption" value="<?php if($page_caption <> ''){echo esc_attr($page_caption);};?>" />
						<p><?php esc_html_e('Please Add Event Page Caption.', 'crunchpress'); ?></p>
					</li>
				</ul>
				<div class="clear"></div>
				<?php echo function_library::show_sidebar($sidebar_event,'right_sidebar_event','left_sidebar_event',$right_sidebar_event,$left_sidebar_event);?>
				<div class="clear"></div>
				<!--<div class="row-fluid">
					<ul class="recipe_class span4">
						<li class="panel-input">	
							<span class="panel-title">
								<h3 for="event_thumbnail"><?php _e('Select Type', 'crunchpress'); ?></h3>
							</span>
							<div class="combobox">
								<select name="event_thumbnail" id="event_thumbnail">
									<option class="Image" value="Image" <?php if( $event_thumbnail == 'Image' ){ echo 'selected'; }?>>Feature Image</option>
									<option class="Video" value="Video" <?php if( $event_thumbnail == 'Video' ){ echo 'selected'; }?>>Video</option>
									<option class="Slider" value="Slider" <?php if( $event_thumbnail == 'Slider' ){ echo 'selected'; }?>>Slider</option>
								</select>
							</div>
							<p><?php _e('Please select your post type of content.', 'crunchpress'); ?></p>
						</li>
					</ul>
					<ul class="video_class recipe_class span4">						
						<li class="panel-input">
							<span class="panel-title">
								<h3 for="video_url_type" > <?php _e('Video URL', 'crunchpress'); ?> </h3>
							</span>
							<input type="text" name="video_url_type" id="video_url_type" value="<?php if($video_url_type <> ''){echo $video_url_type;};?>" />
							<p><?php _e('Please paste Youtube or Vimeo url.', 'crunchpress'); ?></p>
						</li>
					</ul>
					<ul class="select_slider_option recipe_class span4">					
						<li class="panel-input">	
							<span class="panel-title">
								<h3 for="event_thumbnail"><?php _e('Select Images Slide', 'crunchpress'); ?></h3>
							</span>
							<div class="combobox">
								<select name="select_slider_type" id="select_slider_type">
									<?php foreach( function_library::get_title_list_array('cp_slider') as $values){?>
										<option value="<?php echo $values->ID;?>" <?php if($select_slider_type == $values->ID){echo 'selected';}?>><?php echo $values->post_title;?></option>
									<?php }?>
								</select>
							</div>
							<p><?php _e('Please select slide to show in post.', 'crunchpress'); ?></p>
						</li>
					</ul>
				</div>-->
				<div class="clear"></div>
				<input type="hidden" name="event_submit" value="events"/>
				<div class="clear"></div>
			</div>	
			<div class="clear"></div>
			
		<?php }
		
		public function save_event_option_meta($post_id){
			
			$event_social = '';
			$sidebars = '';
			$right_sidebar_event = '';
			$left_sidebar_event = '';
			$event_detail_xml = '';
			$event_thumbnail = '';
			$video_url_type = '';
			$select_slider_type = '';
			$page_caption = '';
			
			
			foreach($_REQUEST as $keys=>$values){
				$$keys = $values;
			}
		
			if(defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return;
		
				if(isset($event_submit) AND $event_submit == 'events'){
					$new_data = '<event_detail>';
					$new_data = $new_data . function_library::create_xml_tag('event_social',$event_social);
					$new_data = $new_data . function_library::create_xml_tag('sidebar_event',$sidebars);
					$new_data = $new_data . function_library::create_xml_tag('right_sidebar_event',$right_sidebar_event);
					$new_data = $new_data . function_library::create_xml_tag('left_sidebar_event',$left_sidebar_event);
					$new_data = $new_data . function_library::create_xml_tag('left_sidebar_event',$left_sidebar_event);
					$new_data = $new_data . function_library::create_xml_tag('page_caption',$page_caption);
					// $new_data = $new_data . function_library::create_xml_tag('event_thumbnail',$event_thumbnail);
					// $new_data = $new_data . function_library::create_xml_tag('video_url_type',$video_url_type);
					// $new_data = $new_data . function_library::create_xml_tag('select_slider_type',$select_slider_type);
					$new_data = $new_data . '</event_detail>';
					//Saving Sidebar and Social Sharing Settings as XML
					$old_data = get_post_meta($post_id, 'event_detail_xml',true);
					function_library::save_meta_data($post_id, $new_data, $old_data, 'event_detail_xml');
					
				}
		}
		
		

		
	
		//Next Event Section
		public function print_next_events_item($item_xml){
			global $counter;
			$header = find_xml_value($item_xml, 'header');
			$category = find_xml_value($item_xml, 'category');
			if($category == '0'){$category='';} ?>
			<script>
				jQuery(document).ready(function ($) {
					"use strict";
					if ($('#next_event-<?php echo $counter?>').length) {
						$('#next_event-<?php echo $counter?>').bxSlider({
							minSlides: 1,
							maxSlides: 1
						});
					}
				});
			</script>
			<?php
			//Bx Slider Script Calling
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');	
				wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
			?>
			
		<!--TESTIMONIALS SECTION START-->
        <div class="upcoming-events">
        	<h2 class="bg-purple"><?php echo esc_html($header);?></h2>
            	<ul id="next_event-<?php echo esc_attr($counter)?>">
				<?php
					global $EM_Events,$bp;
					$order = 'DESC';
					$limit = 5;//Default limit
					$offset = '';
					$rowno = 0;
					$event_count = 0;
					$EM_Events = EM_Events::get( array('category'=>$category, 'group'=>'this','scope'=>'future', 'limit' => $limit, 'order' => $order) );
					$events_count = count ( $EM_Events );	
					foreach ( $EM_Events as $event ) {
						
						//Print Event Manager Elements
						$localised_start_date = date_i18n(get_option('dbem_date_format'), $event->start);
						$localised_end_date = date_i18n(get_option('dbem_date_format'), $event->end);
						$style = "";
						$today = date ( "Y-m-d" );
						
						if(!empty($event->location_id->name)){
							$location_summary = "<b>" . $event->get_location()->name . "</b><br/>" . $event->get_location()->address . " - " . $event->get_location()->town;
						}else{
							$location_summary = '';
						}
						
						if ($event->start_date < $today && $event->end_date < $today){
							$class .= " past";
						}
						
						//Check pending approval events
						if ( !$event->status ){
							$class .= " pending";
						}	
						//echo $event->start;
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						
						
						//Get Date in Parts
						$event_year = date('Y',$event->start);
						$event_month = date('m',$event->start);
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						
						//Change time format
						if($event->start_time <> ''){
							$event_start_time_count = date("G,i,s", strtotime($event->start_time));
						}
						$thumbnail_id = get_post_thumbnail_id( $event->post_id );
						$thumbnail = wp_get_attachment_image_src( $thumbnail_id , array(260,300));
						
						$event_element_id = $counter.$event->event_id;  ?>
						<!--LIST ITEM START-->
						<li>
							<div class="event-contant">
								<div class="thumb">
									<a href="<?php echo esc_url($event->guid);?>"><?php echo get_the_post_thumbnail($event->post_id, array(150,150));?></a>
								</div>
								<div class="text">
									<h2><a href="<?php echo esc_url($event->guid);?>"><?php echo esc_html($event->post_title);?></a></h2>
									<h4><?php echo esc_attr($event->start_date);?> - <?php echo esc_attr($event->start_date);?></h4>
									<p><?php echo strip_tags(mb_substr(esc_html($event->post_content),0,250));?></p>
								</div>
							</div>
						</li>
						<!--LIST ITEM END-->
					<?php
					} //End Foreach Loop
					?>
                </ul>
			</div>
	<?php
		}
		
		//Event CountDown Function Start
		public function print_upcomming_event($item_xml){ 
			$header = find_xml_value($item_xml, 'header');
			$category = find_xml_value($item_xml, 'category');
			if($category == '0'){$category='';}
			global $EM_Events,$bp,$counter;
			?>
			<script>
				jQuery(document).ready(function ($) {
					"use strict";
					if ($('#upcoming_event-<?php echo esc_attr($counter)?>').length) {
						$('#upcoming_event-<?php echo esc_attr($counter)?>').bxSlider({
							minSlides: 3,
							maxSlides: 4,
							slideWidth: 375,
							slideMargin: 20,
							controls:true,
						});
					}
				});
			</script>
			<?php
			//Bx Slider Script Calling
				wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
				wp_enqueue_script('cp-bx-slider');	
				wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
			?>
			<?php
			echo '
				<div class="upcoming-heading">
					<h3>'.$header.'</h3>
					<ul class="" id="upcoming_event-'.$counter.'">';
			
			$order = 'DESC';
			$limit = 10;//Default limit
			$offset = '';		
			$rowno = 0;
			$event_count = 0;
			$EM_Events = EM_Events::get( array('category'=>'', 'group'=>'this','scope'=>'future', 'limit' => '10', 'order' => $order) );
			$events_count = count ( $EM_Events );	
			foreach ( $EM_Events as $event ) {
				/* @var $event EM_Event */
				if( ($rowno < $limit || empty($limit)) && ($event_count >= $offset || $offset === 0) ) {
					$rowno++;
					$class = ($rowno % 2) ? 'alternate' : '';
					// FIXME set to american
					$localised_start_date = date_i18n(get_option('dbem_date_format'), $event->start);
					$localised_end_date = date_i18n(get_option('dbem_date_format'), $event->end);
					$style = "";
					$today = date ( "Y-m-d" );
					if(!empty($event->location_id->name)){
							$location_summary = "<b>" . $event->get_location()->name . "</b><br/>" . $event->get_location()->address . " - " . $event->get_location()->town;
						}else{
							$location_summary = '';
						}
					if ($event->start_date < $today && $event->end_date < $today){
						$class .= " past";
					}
					//Check pending approval events
					if ( !$event->status ){
						$class .= " pending";
					}	
					//echo $event->start;
					$event_month_alpha = date('M',$event->start);
					$event_day = date('d',$event->start);
					
					
					//Get Date in Parts
					$event_year = date('Y',$event->start);
					$event_month = date('m',$event->start);
					$event_month_alpha = date('M',$event->start);
					$event_day = date('d',$event->start);
					
					//Change time format
					$event_start_time_count = date("G,i,s", strtotime($event->start_time));
					$event_element_id = $counter.$event->event_id;?>
					
					<li class="event-box-slider">
						<script>
							jQuery(function () {
								var austDay = new Date();
								austDay = new Date(<?php echo esc_attr($event_year);?>, <?php echo esc_attr($event_month);?>-1, <?php echo esc_attr($event_day);?>,<?php echo esc_attr($event_start_time_count);?>)
								jQuery('.countdown-<?php echo esc_attr($event_element_id);?>').countdown({
									labels: ['<?php esc_html_e('Years','crunchpress');?>', '<?php esc_html_e('Months','crunchpress');?>', '<?php esc_html_e('Weeks','crunchpress');?>', '<?php esc_html_e('Days','crunchpress');?>', '<?php esc_html_e('Hours','crunchpress');?>', '<?php esc_html_e('Minutes','crunchpress');?>', '<?php esc_html_e('Seconds','crunchpress');?>'],
									until: austDay
								});
								jQuery('#year').text(austDay.getFullYear());
							});                
						</script>
						<div class="upcoming-box">
							<div class="frame"><a href="<?php echo esc_url($event->guid);?>"><?php echo get_the_post_thumbnail($event->post_id, array(570,300));?></a></div>
							<div class="caption">
								<div class="timer-box">
									<div class="countdown-<?php echo esc_attr($event_element_id);?> defaultCountdown"></div>
								</div>
								<strong class="title"><a href="<?php echo esc_attr($event->guid);?>"><?php echo esc_html($event->post_title);?></a></strong> 
								<strong class="mnt"><span><?php echo esc_attr(date(get_option('date_format'),$event->start));?></span></strong>
							</div>
						</div>					
					</li>
			   
			<?php   
				}
			}
			echo ' </ul>		
      </div>';
		}
		
		
		
		//EVENT FRONTEND AREA START
		public $event_div_listing_num_class = array(
			"Listing View" => array("index"=>"1", "class"=>"listing ", "size"=>array(570,300), "size2"=>array(350, 350), "size3"=>array(570,300)),
			"Grid View" => array("index"=>"2", "class"=>"grid", "size"=>array(175,155), "size2"=>array(175,155), "size3"=>array(175,155)),
			"Calendar View" => array("index"=>"2", "class"=>"calendar", "size"=>array(175,155), "size2"=>array(175,155), "size3"=>array(175,155)),
			"Event Gallery" => array("index"=>"2", "class"=>"event_gal", "size"=>array(570,300), "size2"=>array(360,300), "size3"=>array(360,300))
		);
		
		public function page_event_manager_plugin($item_xml){
			global $counter,$sidebar,$event_div_listing_num_class;
			// get the blog meta value		
			$header = find_xml_value($item_xml, 'header');
			$eventview = find_xml_value($item_xml, 'eventview');
			$event_layout = find_xml_value($item_xml, 'event-layout');
			$num_fetch = find_xml_value($item_xml, 'num-fetch');
			$category = find_xml_value($item_xml, 'category');
			$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
			$event_type = find_xml_value($item_xml, 'eventtype');

			if(empty($paged)){
				$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
			}
			$event_div_listing_num_class = $this->event_div_listing_num_class;
			// get the item class and size from array
			$item_type = 'Full-Image';
			$item_class = $event_div_listing_num_class[$eventview]['class'];
			$item_index = $event_div_listing_num_class[$eventview]['index'];
			if( $sidebar == "no-sidebar" ){
				$item_size = $event_div_listing_num_class[$eventview]['size'];
			}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
				$item_size = $event_div_listing_num_class[$eventview]['size2'];
			}else{
				$item_size = $event_div_listing_num_class[$eventview]['size3'];
				$item_class = 'both_sidebar_class';
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
			
			//Event Type Condition
			if($event_type == 'All Events'){$event_type = 'all';}else if($event_type == 'Upcoming Events'){$event_type = 'future';}else if($event_type == 'Past Events'){$event_type = 'past';}else{}
			
			//Category All
			if($category == '0'){$category = '';}
			if($header <> ''){
				echo '<h2 class="h-style">'.$header.'</h2>';
			}
			//Event View
			if($eventview == 'Listing View'){
			
				global $EM_Events,$bp;				
				$limit = $num_fetch;	//Default limit
				$page = ( !empty($_GET['pno']) ) ? $_GET['pno']:1;
				$offset = ( $page > 1 ) ? ($page-1)*$limit : 0;
				$order = ( !empty($_REQUEST ['order']) ) ? $_REQUEST ['order']:'ASC';
				$EM_Events = EM_Events::get( array('category'=>$category, 'group'=>'this','scope'=>$event_type, 'limit'=>$limit, 'order' => $order,'pagination'=>'1',) );
				$events_count = count ( $EM_Events );	
				$rowno = 0;
				$event_count = 0;
				$prev_month = null;
				
				echo '  <div class="event-page">';
				foreach ( $EM_Events as $event ) {
					/* @var $event EM_Event */
					//if($prev_month){}
					$this_month = date('F,Y',$event->start);
					if($prev_month != $this_month){
					//echo $this_month;
					//echo ' <div class="event-heading"><a href="#">'.$this_month.'</a></div>';
						if(!is_null($prev_month)){
							
						}
						// echo '<li class="event-heading"><a href="#">'.$this_month.'</a></li>';
					}
					$prev_month = $this_month;
					if( ($rowno < $limit || empty($limit)) && ($event_count >= $offset || $offset === 0) ) {
						$rowno++;
						$class = ($rowno % 2) ? 'alternate' : '';
						// FIXME set to american
						$localised_start_date = date_i18n(get_option('dbem_date_format'), $event->start);
						$localised_end_date = date_i18n(get_option('dbem_date_format'), $event->end);
						//print_r($event);
						$style = "";
						$today = date ( "Y-m-d" );
						//print_R($event);
						if(!empty($event->location_id->name)){
							$location_summary = "<b>" . $event->get_location()->name . "</b><br/>" . $event->get_location()->address . " - " . $event->get_location()->town;
						}else{
							$location_summary = '';
						}
						if ($event->start_date < $today && $event->end_date < $today){
							$class .= " past";
						}
						//Check pending approval events
						if ( !$event->status ){
							$class .= " pending";
						}	
						//echo $event->start;
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						$event_element_id = $counter.$event->event_id;
						//condition for event location lat long
						
						//echo $event->start;
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						
						
						//Get Date in Parts
						$event_year = date('Y',$event->start);
						$event_month = date('m',$event->start);
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						
						//Change time format
						$event_start_time_count = date("G,i,s", strtotime($event->start_time));
						//'options'=>array('1'=>'1 Column','2'=>'2 Columns','3'=>'3 Columns','4'=>'4 Columns'),
						//Empty Classes
						$span_class = '';
						$count_val = '1';
						$first_class = '';
						$clear_class = '';
						//if not Column 1 or Full Width then!
						//if($event_layout <> '1 Column'){
							//Condition to manage Event Layouts
							if($event_layout == '2 Columns'){
								$span_class		= 	"span6";
								$count_val		=	2;
							}else if($event_layout == '3 Columns'){								
								$span_class		= 	"span4";
								$count_val		=	3;
							}else if($event_layout == '4 Columns'){								
								$span_class		= 	"span3";
								$count_val		=	4;
							}else{
							
							}
							//Count the events in row then break the line
							if($event_count % $count_val == 0){
								$first_class = 'first';
								$clear_class="<div class='clear'></div>";
							}else{} 
							$thumbnail_id = get_post_thumbnail_id( $event->post_id );
							$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
							?>
							<div class="row-events">			
								<div class="span6">
									<div class="thumb">
										<a href="<?php echo esc_url($event->guid);?>">
											<?php echo get_the_post_thumbnail($event->post_id, $item_size);?>
										</a>
									</div>
								</div>
								<!--EVENT CONTANT START-->
								<div class="span6">
									<div class="text">
										<!--EVENT HEADER START-->
										<div class="event-header">
											<span><?php echo date('D M m',$event->start);?> </span>
											<h2><a href="<?php echo esc_url($event->guid);?>"><?php echo substr(esc_html($event->event_name),0,40);?></a></h2>
											<div class="data-tags">
											<?php 
												$event_tags = wp_get_post_terms($event->post_id, 'event-categories');
												if(!empty($event_tags)){
													foreach($event_tags as $tag){
														echo '<a href="'.esc_url(get_term_link( $tag->term_id, 'event-categories' )).'">'.esc_attr($tag->name).'</a>';												
													}
												}
											?>												
											</div>
										</div>
										<!--EVENT HEADER END-->
										<!--EVENT BODY START-->
										<div class="event-body">
											<p><?php echo strip_tags(mb_substr(esc_html($event->post_content),0,$num_excerpt));?></p>
										</div>
										<!--EVENT BODY END-->
										<!--EVENT VANUE START-->
										<div class="event-vanue">
											<table cellspacing="0" cellpadding="0" border="0">
											  <tbody>
											  <tr>
												<td><p class="color"><?php esc_html_e('Date:', 'crunchpress') ; ?></p></td>
												<td>
													<a href="<?php echo esc_url($event->guid);?>"><i class="fa fa-calendar-o"></i>
														<?php echo esc_attr(date(get_option('date_format'),$event->start));?> 
														- 
														<?php echo esc_attr(date(get_option('date_format'),$event->end));?>
													</a>
													<a href="<?php echo esc_url($event->guid);?>">
														<i class="fa fa-clock-o"></i>
														<?php echo esc_attr($event->start_time);?> - <?php echo esc_attr($event->end_time);?>
													</a>
												</td>
											  </tr>
											  <tr>
												<td><p class="color"><?php esc_html_e('Venue:', 'crunchpress'); ?></p></td>
												<td>
													<?php if(!empty($event->location_id->name)){ ?>
														<a href="<?php echo esc_url($event->guid);?>"><?php echo esc_html($event->get_location()->address);?></a>
													<?php }?>
												</td>
												
											  </tr>
											</tbody></table>
										</div>
										<!--EVENT VANUE END-->
										<!--EVENT FOOTER START-->
										<div class="event-footer">
											<a class="btn-style" href="<?php echo esc_url($event->guid);?>"><?php esc_html_e('Register', 'crunchpress'); ?></a>
										</div>
										<!--EVENT FOOTER END-->
									</div>
								</div>
							</div>
                    <!--EVENT CONTANT END-->                
                <?php
					}
					$event_count++;
				}
				echo '</div>';

			}else if($eventview == 'Grid View'){
			
				global $EM_Events,$bp;				
				$limit = $num_fetch;	//Default limit
				$page = ( !empty($_GET['pno']) ) ? $_GET['pno']:1;
				$offset = ( $page > 1 ) ? ($page-1)*$limit : 0;
				$order = ( !empty($_REQUEST ['order']) ) ? $_REQUEST ['order']:'ASC';
				$EM_Events = EM_Events::get( array('category'=>$category, 'group'=>'this','scope'=>$event_type, 'limit'=>$limit, 'order' => $order) );
				$events_count = count ( $EM_Events );	
				$rowno = 0;
				$event_count = 0;
				$prev_month = null;
				
				echo '  <div class="latest-events-section"><div class="row-fluid events">';
				foreach ( $EM_Events as $event ) {
					/* @var $event EM_Event */
					//if($prev_month){}
					$this_month = date('F,Y',$event->start);
					if($prev_month != $this_month){
					//echo $this_month;
					//echo ' <div class="event-heading"><a href="#">'.$this_month.'</a></div>';
						if(!is_null($prev_month)){
							
						}
						// echo '<li class="event-heading"><a href="#">'.$this_month.'</a></li>';
					}
					$prev_month = $this_month;
					if( ($rowno < $limit || empty($limit)) && ($event_count >= $offset || $offset === 0) ) {
						$rowno++;
						$class = ($rowno % 2) ? 'alternate' : '';
						// FIXME set to american
						$localised_start_date = date_i18n(get_option('dbem_date_format'), $event->start);
						$localised_end_date = date_i18n(get_option('dbem_date_format'), $event->end);
						//print_r($event);
						$style = "";
						$today = date ( "Y-m-d" );
						//print_R($event);
						if(!empty($event->location_id->name)){
							$location_summary = "<b>" . $event->get_location()->name . "</b><br/>" . $event->get_location()->address . " - " . $event->get_location()->town;
						}else{
							$location_summary = '';
						}
						if ($event->start_date < $today && $event->end_date < $today){
							$class .= " past";
						}
						//Check pending approval events
						if ( !$event->status ){
							$class .= " pending";
						}	
						//echo $event->start;
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						$event_element_id = $counter.$event->event_id;
						//condition for event location lat long
						
						//echo $event->start;
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						
						
						//Get Date in Parts
						$event_year = date('Y',$event->start);
						$event_month = date('m',$event->start);
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						
						//Change time format
						$event_start_time_count = date("G,i,s", strtotime($event->start_time));
						//'options'=>array('1'=>'1 Column','2'=>'2 Columns','3'=>'3 Columns','4'=>'4 Columns'),
						//Empty Classes
						$span_class = '';
						$count_val = '2';
						$first_class = '';
						$clear_class = '';
						$event_layout = '2 Columns';
						//if not Column 1 or Full Width then!
						//if($event_layout <> '1 Column'){
							//Condition to manage Event Layouts
							if($event_layout == '2 Columns'){
								$span_class		= 	"span6";
								$count_val		=	2;
							}else if($event_layout == '3 Columns'){								
								$span_class		= 	"span4";
								$count_val		=	3;
							}else if($event_layout == '4 Columns'){								
								$span_class		= 	"span3";
								$count_val		=	4;
							}else{
							
							}
							//Count the events in row then break the line
							if($event_count % $count_val == 0){
								$first_class = 'first';
								$clear_class = "<div class='clear'></div>";
							}else{} 
							$thumbnail_id = get_post_thumbnail_id( $event->post_id );
							$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);
							echo $clear_class; ?>
							<!--EVENT CONTANT START-->
							<div class="<?php echo $span_class.' '.$first_class?>">
								<div class="text">
									<!--EVENT HEADER START-->
									<div class="event-header">
										<span><?php echo date('D M m',$event->start);?> </span>
										<h2><a href="<?php echo esc_url($event->guid);?>"><?php echo substr(esc_html($event->event_name),0,40);?></a></h2>
										<div class="data-tags">
										<?php 
											$event_tags = wp_get_post_terms($event->post_id, 'event-categories');
											if(!empty($event_tags)){
												foreach($event_tags as $tag){
													echo '<a href="'.esc_url(get_term_link( $tag->term_id, 'event-categories' )).'">'.esc_attr($tag->name).'</a>';												
												}
											}
										?>												
										</div>
									</div>
									<!--EVENT HEADER END-->
									<!--EVENT BODY START-->
									<div class="event-body">
										<p><?php echo strip_tags(mb_substr(esc_html($event->post_content),0,$num_excerpt));?></p>
									</div>
									<!--EVENT BODY END-->
									<!--EVENT VANUE START-->
									<div class="event-vanue">
										<table>
											<tbody>
											  <tr>
												<td><p class="color"><?php esc_html_e('Date:', 'crunchpress') ; ?></p></td>
												<td>
													<a href="<?php echo esc_url($event->guid);?>"><i class="fa fa-calendar-o"></i>
														<?php echo esc_attr(date(get_option('date_format'),$event->start));?> 
														- 
														<?php echo esc_attr(date(get_option('date_format'),$event->end));?>
													</a>
													<a href="<?php echo esc_url($event->guid);?>">
														<i class="fa fa-clock-o"></i>
														<?php echo esc_attr($event->start_time);?> - <?php echo esc_attr($event->end_time);?>
													</a>
												</td>
											  </tr>
											  <tr>
												<td><p class="color"><?php esc_html_e('Venue:', 'crunchpress'); ?></p></td>
												<td><a href="<?php echo esc_url($event->guid);?>"><?php echo esc_html($event->get_location()->address);?></a></td>
											  </tr>
											</tbody>
										</table>
									</div>
									<!--EVENT VANUE END-->
									<!--EVENT FOOTER START-->
									<div class="event-footer">
										<a class="btn-style" href="<?php echo esc_url($event->guid);?>"><?php esc_html_e('Register', 'crunchpress'); ?></a>
									</div>
									<!--EVENT FOOTER END-->
								</div>
							</div>
							<!--EVENT CONTANT END--> 
						<?php }
					$event_count++;
				}
				echo '</div></div>';
				
			}else if($eventview == 'Event Gallery'){
				
				global $EM_Events,$bp;				
				$limit = $num_fetch;	//Default limit
				$page = ( !empty($_GET['pno']) ) ? $_GET['pno']:1;
				$offset = ( $page > 1 ) ? ($page-1)*$limit : 0;
				$order = ( !empty($_REQUEST ['order']) ) ? $_REQUEST ['order']:'ASC';
				$EM_Events = EM_Events::get( array('category'=>$category, 'group'=>'this','scope'=>$event_type, 'limit'=>$limit, 'order' => $order) );
				$events_count = count ( $EM_Events );	
				$rowno = 0;
				$event_count = 0;
				$prev_month = null;
				
				echo '  <div class="cp-event-gallery"><div class="cp-gallery-container">';
				foreach ( $EM_Events as $event ) {
					$this_month = date('F,Y',$event->start);
					if($prev_month != $this_month){
						if(!is_null($prev_month)){
							
						}
					}
					$prev_month = $this_month;
					if( ($rowno < $limit || empty($limit)) && ($event_count >= $offset || $offset === 0) ) {
						$rowno++;
						$class = ($rowno % 2) ? 'alternate' : '';
						// FIXME set to american
						$localised_start_date = date_i18n(get_option('dbem_date_format'), $event->start);
						$localised_end_date = date_i18n(get_option('dbem_date_format'), $event->end);
						
						$style = "";
						$today = date ( "Y-m-d" );
						
						if(!empty($event->location_id->name)){
							$location_summary = "<b>" . $event->get_location()->name . "</b><br/>" . $event->get_location()->address . " - " . $event->get_location()->town;
						}else{
							$location_summary = '';
						}
						if ($event->start_date < $today && $event->end_date < $today){
							$class .= " past";
						}
						//Check pending approval events
						if ( !$event->status ){
							$class .= " pending";
						}	
						//echo $event->start;
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						$event_element_id = $counter.$event->event_id;
						//condition for event location lat long
						
						//echo $event->start;
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						
						
						//Get Date in Parts
						$event_year = date('Y',$event->start);
						$event_month = date('m',$event->start);
						$event_month_alpha = date('M',$event->start);
						$event_day = date('d',$event->start);
						
						//Change time format
						$event_start_time_count = date("G,i,s", strtotime($event->start_time));
						
						$span_class = '';
						$count_val = '2';
						$first_class = '';
						$clear_class = '';
						$event_layout = '2 Columns';
						if($event_layout == '2 Columns'){
							$span_class		= 	"span6";
							$count_val		=	2;
						}else if($event_layout == '3 Columns'){								
							$span_class		= 	"span4";
							$count_val		=	3;
						}else if($event_layout == '4 Columns'){								
							$span_class		= 	"span3";
							$count_val		=	4;
						}else{
						
						}
						//Count the events in row then break the line
						if($event_count % $count_val == 0){
							$first_class = 'first';
							$clear_class = "<div class='clear'></div>";
						}else{} 
						$thumbnail_id = get_post_thumbnail_id( $event->post_id );
						$image_thumb = wp_get_attachment_image_src($thumbnail_id, $item_size);?>
						<!--EVENT CONTANT START-->							
						<div class="cp-gallery-item">
							<?php echo get_the_post_thumbnail($event->post_id, $item_size);?>
							<div class="caption">
								<h4><a href="<?php echo esc_url($event->guid);?>"><?php echo substr(esc_html($event->event_name),0,40);?></a></h4>
								<p><?php echo strip_tags(mb_substr(esc_html($event->post_content),0,$num_excerpt));?></p>
								<a data-rel="prettyphoto[]" href="<?php echo $image_thumb[0];?>"><i class="fa fa-search"></i></a>
								<a href="<?php echo esc_url($event->guid);?>"><i class="fa fa-link"></i></a>
							</div>
						</div>            
					<?php }
					$event_count++;
				}
				echo '</div></div>';
			
			}else{
				global $EM_Events,$bp;
				$order = ( !empty($_REQUEST ['order']) ) ? $_REQUEST ['order']:'ASC';
				$limit = $num_fetch;//Default limit
				$offset = ( $paged > 1 ) ? ($paged-1)*$limit : 0;
				$EM_Events = EM_Events::get( array('group'=>'this','scope'=>'all', 'limit' => '100', 'order' => 'ASC') );
				$events_count = count ( $EM_Events );	
				$rowno = 0;
				$event_count = 0;
				wp_enqueue_style('cp-calender-view', CP_PATH_URL.'/framework/javascript/fullcalendar/fullcalendar.css');?>
				<script>
					jQuery(document).ready(function($) {
						var date = new Date();
					
						$('#calendar_view-<?php echo $counter;?>').fullCalendar({
							editable: false,
							header: {
								left: 'prev,next',
								center: 'title',
								right: ''
							},
							buttonText: {
								prev: "<span class='fc-text-arrow'>Previous Month</span>",
								next: "<span class='fc-text-arrow'>Next Month</span>",
							},
							disableDragging: true,
							events: [
								<?php 
								foreach ( $EM_Events as $event ) {
									// FIXME set to american
									$localised_start_date = date_i18n(get_option('dbem_date_format'), $event->start);
									$localised_end_date = date_i18n(get_option('dbem_date_format'), $event->end);
									$style = "";
									$today = date ( "Y-m-d" );
									
									
									//echo $event->start;
									$event_month_alpha = date('M',$event->start);
									$event_day = date('d',$event->start);
									$hour_start = date("H", strtotime($event->start_time));
									$mint_start = date("i", strtotime($event->start_time));					
									
									$hour_end = date("H", strtotime($event->end_time));
									$mint_end = date("i", strtotime($event->end_time));					
					
										//Start From
										$year_from = date("Y", $event->start);
										$month_from = date("m", $event->start);
										$day_from = date("d", $event->start);
										
										//Ends on 
										$year_to = date("Y", $event->end);
										$month_to = date("m", $event->end);
										$day_to = date("d", $event->end);
										
									
									?>
										{
										title: '<?php echo html_entity_decode(mb_substr(esc_html($event->event_name), 0, 30)).'....'?>',
										start: new Date(<?php echo esc_attr($year_from);?>, <?php echo esc_attr($month_from);?>-1, <?php echo esc_attr($day_from);?>, <?php echo esc_attr($hour_start)?>, <?php echo esc_attr($mint_start);?>),
										end: new Date(<?php echo esc_attr($year_to);?>, <?php echo esc_attr($month_to);?>-1, <?php echo esc_attr($day_to);?>, <?php echo esc_attr($hour_end);?>, <?php echo esc_attr($mint_end);?>),
										url: '<?php echo html_entity_decode(esc_url($event->guid)); ?>',
										allDay: false

										},
								<?php 
									$event_count++;
								}	
								?>
							]
						});
					});	
				</script>
				<div id="calendar_view-<?php echo esc_attr($counter);?>"></div>
		<?php 
			}	
		}

		// print the blog thumbnail
		public function print_event_thumbnail( $post_id, $item_size ){
			
			global $counter;
			//Get Post Meta Options
			$img_html = '';
			$event_thumbnail = '';
			$video_url_type = '';
			$select_slider_type = '';
			$event_detail_xml = get_post_meta($post_id, 'event_detail_xml', true);
			if($event_detail_xml <> ''){
				$cp_event_xml = new DOMDocument ();
				$cp_event_xml->loadXML ( $event_detail_xml );
				$event_thumbnail = find_xml_value($cp_event_xml->documentElement,'event_thumbnail');
				$video_url_type = find_xml_value($cp_event_xml->documentElement,'video_url_type');
				$select_slider_type = find_xml_value($cp_event_xml->documentElement,'select_slider_type');		
				//Print Image
				if( $event_thumbnail == "Image" || empty($event_thumbnail) ){
					if(get_the_post_thumbnail($post_id, $item_size) <> ''){
						$img_html = '<div class="post_featured_image thumbnail_image">';
						$img_html = $img_html . get_the_post_thumbnail($post_id, $item_size);
						$img_html = $img_html . '</div>';
					}
					//echo '<div class="mask"><a href="'.get_permalink().'"#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a><a href="'. get_permalink().'" class="anchor"> <i class="fa fa-link"></i></a></div>';
				}else if( $event_thumbnail == "Video" ){
					//Print Video
					if($video_url_type <> ''){
						$img_html = '<div class="post_featured_image thumbnail_image">';
						$img_html = $img_html . '<div class="blog-thumbnail-video">';
						//echo cp_get_width($item_size);
						if(cp_get_width($item_size) == '175'){
							$img_html = $img_html . get_video($video_url_type, cp_get_width($item_size), cp_get_height($item_size));
						}else{
							$img_html = $img_html . get_video($video_url_type, '100%', cp_get_height($item_size));
						}
						$img_html = $img_html . '</div></div>';
					}
				}else if ( $event_thumbnail == "Slider" ){
					//Print Slider
					$slider_xml = get_post_meta( intval($select_slider_type), 'cp-slider-xml', true); 				
					if($slider_xml <> ''){
						$slider_xml_dom = new DOMDocument();
						$slider_xml_dom->loadXML($slider_xml);
						$slider_name='bxslider'.$counter.$post_id;				
						//Included Anything Slider Script/Style
						wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
						wp_enqueue_script('cp-bx-slider');	
						wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
						if(cp_get_width($item_size) == '175'){
							$img_html = "<style>#'". $slider_name."'{width:'".cp_get_width($item_size)."'px;height:'".cp_get_height($item_size)."'px;float:left;}</style>";
						}else{
							$img_html = "<style>#'". $slider_name."'{width:100%;height:350px;float:left;}</style>";
						}
						$img_html = '<div class="post_featured_image thumbnail_image">';
						$img_html = $img_html . print_bx_slider($slider_xml_dom->documentElement, $item_size,$slider_name);
						$img_html = $img_html . '</div>';
					}
				}
			}
			return $img_html;	
			
		}
		
		
	}
}