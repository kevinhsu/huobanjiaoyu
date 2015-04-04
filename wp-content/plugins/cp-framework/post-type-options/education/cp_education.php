<?php
//Condition for Parent Class
if(class_exists('function_library')){
	
	add_action( 'plugins_loaded', 'education_override' );
	function education_override() {
		$education_class = new cp_education_class;
	}

	class cp_education_class extends function_library{
		public $course_array = array(
		
			'image_icon' =>array(

				'type'=> 'image',
				
				'name'=> 'aa',

				'hr'=> 'none',

				'description'=> "fa fa-clipboard"),
			
			"top-bar-div4541-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div4541'),	

			'header'=>array(

				'title'=> 'HEADER TITLE',

				'name'=> 'page-option-item-course-header-title',

				'type'=> 'inputtext'),
				
			'layout'=>array(

				'title'=>'SELECT LAYOUT',

				'name'=>'page-option-item-course-layout',

				'type'=> 'combobox',

				'options'=>array('0'=>'Slider', '1'=>'Grid', '2'=>'Grid Simple'),

				'hr'=> 'none',

				'description'=>'Select course layout whether you want to show courese as slider or as grid view.'),	
				
			'category'=>array(

				'title'=>'CHOOSE CATEGORY',

				'name'=>'page-option-category-course',

				'options'=>array(),

				'type'=>'combobox_category',

				'hr'=> 'none',

				'description'=>'Choose the Course category you want to fetch the Projects.'),		
			
			
				
			"top-bar-div4541-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div4541'),		
			
			"top-bar-div4351-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div4351'),	
			
			'num_excerpt'=>array(

				'title'=>'NUMBER OF EXCERPT',

				'name'=>'page-option-item-course-excerpt',

				'type'=> 'inputtext',

				'default'=> 200,

				'description'=>'Number of words to show on each project, leaving black default set characters will be displayed.'),
			
			'pagination'=>array(

				'title'=>'ENABLE PAGINATION',

				'name'=>'page-option-item-course-pagination',

				'type'=> 'combobox',

				'options'=>array('0'=>'Wp-Default', '1'=>'Theme-Custom','2'=>'No-Pagination'),

				'hr'=> 'none',

				'description'=>'Pagination will only appear when the number of posts is greater than the number of fetched item in one page you can also select wordpress default pagination that can be added from settings.'),

			'num-fetch'=>array(					

				'title'=> 'NUM OF PROJECTS',

				'name'=> 'page-option-item-course-num-fetch',

				'type'=> 'inputtext',
				
				'class'=>'course-fetch-item',

				'default'=> 9,

				'description'=>'Set the number of courses to display on one page.'),
				
			"top-bar-div4351-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div4351'),			


		);	
		
		
		public $courses_topic = array(
		
			'image_icon' =>array(

				'type'=> 'image',
				
				'name'=> 'aa',

				'hr'=> 'none',

				'description'=> "fa fa-font"),
			
			"top-bar-div45411-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div45411'),	

			'header'=>array(

				'title'=> 'HEADER TITLE',

				'name'=> 'page-option-item-course-topic-header-title',

				'type'=> 'inputtext'),			
				
			'category'=>array(

				'title'=>'CHOOSE CATEGORY',

				'name'=>'page-option-category-course-topic',

				'options'=>array(),

				'type'=>'combobox_category',

				'hr'=> 'none',

				'description'=>'Choose the Course category you want to fetch the Projects.'),		
			
			'num_category'=>array(

				'title'=>'NUMBER OF CATEGORIES',

				'name'=>'page-option-num-course-topic-category',

				'type'=> 'inputtext',

				'default'=> 4,

				'description'=>'Number of words to show on each project, leaving black default set characters will be displayed.'),
				
			"top-bar-div4541-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div45411'),		
			
			"top-bar-div4351-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div43511'),	
			
			'num_excerpt'=>array(

				'title'=>'NUMBER OF EXCERPT',

				'name'=>'page-option-topic-course-topic-excerpt',

				'type'=> 'inputtext',

				'default'=> 200,

				'description'=>'Number of words to show on each project, leaving black default set characters will be displayed.'),
				
			'filterable_course'=>array(

				'title'=>'ENABLE FILTERABLE',

				'name'=>'page-option-topic-course-filterable',

				'type'=> 'combobox',

				'options'=>array('0'=>'Yes', '1'=>'No'),
				
				'class'=>'',

				'hr'=> 'none',

				'description'=>'Turn on Filterable from selecting yes from dropdown.'),

			'num-fetch'=>array(

				'title'=> 'NUM OF COURSES',

				'name'=> 'page-option-topic-course-num-fetch',

				'type'=> 'inputtext',
				
				'class'=>'course-filterable-item',

				'default'=> 9,

				'description'=>'Set the number of courses to display on each tab.'),
				
			"top-bar-div43511-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div43511'),			


		);	
		
		public $course_form = array(
		
			'image_icon' =>array(

				'type'=> 'image',
				
				'name'=> 'aa',

				'hr'=> 'none',

				'description'=> "fa fa-clipboard"),
			
			"top-bar-div45511-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div45511'),	

			'header'=>array(

				'title'=> 'HEADER TITLE',

				'name'=> 'page-option-item-course-form-header-title',

				'type'=> 'inputtext'),			
			
			'shortcodes'=>array(

				'title'=>'NUMBER OF CATEGORIES',

				'name'=>'page-option-num-form-topic-category',

				'type'=> 'inputtext',

				'default'=> 200,

				'description'=>'Number of words to show on each project, leaving black default set characters will be displayed.'),
				
			"top-bar-div4541-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div45411'),		
			
			"top-bar-div4351-open" => array( 'name'=>'div_start','type'=>'open' ,'class'=>'row-fluid','id'=>'cp-top-bar-div43511'),	
			
			'num_excerpt'=>array(

				'title'=>'NUMBER OF EXCERPT',

				'name'=>'page-option-item-course-topic-excerpt',

				'type'=> 'inputtext',

				'default'=> 200,

				'description'=>'Number of words to show on each project, leaving black default set characters will be displayed.'),

			'num-fetch'=>array(

				'title'=> 'NUM OF COURSES',

				'name'=> 'page-option-item-course-num-fetch',

				'type'=> 'inputtext',
				
				'class'=>'course-fetch-item',

				'default'=> 9,

				'description'=>'Set the number of courses to display on each tab.'),
				
			"top-bar-div45511-close" => array( 'name'=>'div_end','type'=>'close','id'=>'cp-top-bar-div45511'),			


		);	
		
		public $course_size_array =  array('element1-1'=>'1/1');
		
		public $courses_topic_size_array =  array('element1-1'=>'1/1');
		
	
		/**
		 * lesson_quiz_meta_box_content function.
		 *
		 * @access public
		 * @return void
		 */
		function page_builder_size_class(){
			global $div_size;
			$div_size['Courses'] = $this->course_size_array;	
			$div_size['Topics'] = $this->courses_topic_size_array;	

		}
		/**
		 * lesson_quiz_meta_box_content function.
		 *
		 * @access public
		 * @return void
		 */
		function page_builder_element_class(){
		global $page_meta_boxes;
			$page_meta_boxes['Page Item']['name']['Courses'] = $this->course_array;	
			$page_meta_boxes['Page Item']['name']['Topics'] = $this->courses_topic;	

			$page_meta_boxes['Page Item']['name']['Courses']['category']['options'] = function_library::get_category_list_array( 'courses-category' );			
			$page_meta_boxes['Page Item']['name']['Topics']['category']['options'] = function_library::get_category_list_array( 'courses-category' );			
			
		}
		
		function __construct(){
			
			//Add Action For Courses
			
			add_action( 'wp_ajax_nopriv_load-filter', array( $this, 'cp_load_courses_by_cat') );
			add_action( 'wp_ajax_load-filter', array( $this, 'cp_load_courses_by_cat') );
			
			add_action( 'wp_login', array( $this, 'edit_user_profile_update' ), 10, 2 );
			add_action( 'wp_login', array( $this, 'save_user_meta_by_lesson_id' ), 10, 2 );
			//add_action('init',array( $this, 'change_author_permalinks' ) );
			add_action( 'init', array( $this, 'create_courses' ) );
			add_action( 'init', array( $this, 'create_lesson_posttype' ) );
			add_action( 'init', array( $this, 'create_question_posttype' ) );
			add_action( 'init', array( $this, 'question_type_taxonomy' ) );
			
			add_action( 'init', array( $this, 'quiz_type_taxonomy' ) );
			add_action( 'init', array( $this, 'quiz_post_type' ) );
			
			add_action( 'add_meta_boxes', array( $this, 'add_courses_option' ) );	
			add_action( 'save_post', array( $this, 'save_courses_option_meta' ) );	
			
			add_action( 'save_post', array( $this, 'save_lesson_option_meta' ) );	
			
			
			//Adding Meta Boxes below Visual Editor
			add_action( 'add_meta_boxes', array( $this, 'add_lessons_option' ) );
			
			add_action('admin_menu', array( $this, 'cp_admin_menu_items_lesson' ), 100);
			
			//add_action('admin_menu', array( $this, 'cp_admin_menu_items' ), 60);
			
			// add_action( 'courses-category_add_form_fields',array( $this, 'cp_taxonomy_add_new_meta_field'), 10, 2 );
			
			// add_action( 'courses-category_edit_form_fields', array( $this, 'cp_taxonomy_edit_meta_field'), 10, 2 );
			
			// add_action( 'edited_courses-category', 'save_taxonomy_custom_meta', 10, 2 );  
			// add_action( 'create_courses-category', 'save_taxonomy_custom_meta', 10, 2 );
			
			add_filter('manage_courses_posts_columns', array( $this, 'courses_columns_add'));
			add_filter('manage_courses_posts_custom_column', array( $this, 'courses_columns'));
		}
		
		
				
		// Add term page
		function cp_taxonomy_add_new_meta_field() {
			// this will add the custom meta field to the add new term page
			?>
			<div class="form-field">
				<label for="term_meta[custom_term_meta]"><?php esc_html_e( 'FontAwesome Icon Class', 'crunchpress' ); ?></label>
				<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
				<p class="description"><?php esc_html_e( 'Please enter font awesome icon class name eg: fa fa-lock','crunchpress' ); ?></p>
			</div>
		<?php
		}
		
		// Edit term page
		function cp_taxonomy_edit_meta_field($term) {
		 
			// put the term ID into a variable
			$t_id = $term->term_id;
		 
			// retrieve the existing value(s) for this meta field. This returns an array
			$term_meta = get_option( "taxonomy_$t_id" ); 
			?>
			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="term_meta[custom_term_meta]"><?php _e( 'FontAwesome Icon Class', 'crunchpress' ); ?></label>
				</th>
				<td>
					<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="<?php echo esc_attr( $term_meta['custom_term_meta'] ); ?>">
					<p class="description"><?php _e( 'Please enter font awesome icon class name eg: fa fa-lock','crunchpress' ); ?></p>
				</td>
			</tr>
		<?php
		}
		
		
		function save_taxonomy_custom_meta( $term_id ) {
			if ( isset( $_POST['term_meta'] ) ) {
				$t_id = $term_id;
				$term_meta = get_option( "taxonomy_$t_id" );
				$cat_keys = array_keys( $_POST['term_meta'] );
				foreach ( $cat_keys as $key ) {
					if ( isset ( $_POST['term_meta'][$key] ) ) {
						$term_meta[$key] = esc_attr( $_POST['term_meta'][$key] ); // encoded text with HTML entities
					}
				}
				// Save the option array.
				update_option( "taxonomy_$t_id", $term_meta );
			}
		}  
		
		
		/**
		 * lesson_quiz_meta_box_content function.
		 *
		 * @access public
		 * @return void
		 */
		public function cp_admin_menu_items() {
			global $menu;
			
			add_submenu_page('edit.php?post_type=courses', __('Question Categories', 'crunchpress'),  __('Question Categories', 'crunchpress') , 'administrator', 'edit-tags.php?taxonomy=question-category&post_type=question' );
			
			

		} // End cp_admin_menu_items()
		
		public function cp_admin_menu_items_lesson() {
			global $menu;
			
			add_submenu_page('edit.php?post_type=courses', __('Lesson Categories', 'crunchpress'),  __('Lesson Categories', 'crunchpress') , 'administrator', 'edit-tags.php?taxonomy=lesson-category&post_type=lessons' );
			
			

		} // End cp_admin_menu_items()
		
		
		
		//adding columns start
		
			function courses_columns_add($columns) {
				$columns['plan'] = 'Price Plan';
				$columns['author'] = 'Author';
				return $columns;
		}
		
			function courses_columns($name) {
				global $post;
				switch ($name) {
					case 'plan':
						echo $course_id = get_post_meta($post->ID, 'product_selected', true);
						
						//$products->post_title;
					break;
					case 'author':
						echo get_the_author();
					break;
				}
			}
		//adding columns end

		/**
		 * quiz_post_type function.
		 *
		 * @access public
		 * @return void
		 */
		function quiz_post_type () {
			// "Quiz Types" Custom Taxonomy
			
			$labels = array(
				'name' => __('Quiz', 'crunchpress'),
				'singular_name' => __('Quiz', 'crunchpress'),
				'add_new' => _x('Add New Quiz', 'crunchpress'),				
				'menu_name' => __('Quiz LMS', 'crunchpress'),
				'add_new_item' => __('Add New Quiz', 'crunchpress'),
				'edit_item' => __('Edit Quiz', 'crunchpress'),
				'new_item' => __('New Quiz', 'crunchpress'),
				'view_item' => __('View Quiz', 'crunchpress'),
				'search_items' => __('Search Quiz', 'crunchpress'),
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
				'show_in_menu' => false,
				'show_in_nav_menus' => false,
				'menu_icon' => 'dashicons-vault',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 100,
				'supports' => array('title','editor','thumbnail'),
				'has_archive' => true,
				'rewrite' => array('slug' => '', 'with_front' => false)
			  ); 
			  
			register_post_type( 'quiz' , $args);	
			flush_rewrite_rules();
		} // End quiz_post_type()
		
		/**
		 * quiz_type_taxonomy function.
		 *
		 * @access public
		 * @return void
		 */
		function quiz_type_taxonomy () {
			// "Quiz Types" Custom Taxonomy
			$labels = array(
				'name' => _x( 'Quiz Types', 'taxonomy general name', 'crunchpress' ),
				'singular_name' => _x( 'Quiz Type', 'taxonomy singular name', 'crunchpress' ),
				'search_items' =>  __( 'Search Quiz Types', 'crunchpress' ),
				'all_items' => __( 'All Quiz Types', 'crunchpress' ),
				'parent_item' => __( 'Parent Quiz Type', 'crunchpress' ),
				'parent_item_colon' => __( 'Parent Quiz Type:', 'crunchpress' ),
				'edit_item' => __( 'Edit Quiz Type', 'crunchpress' ),
				'update_item' => __( 'Update Quiz Type', 'crunchpress' ),
				'add_new_item' => __( 'Add New Quiz Type', 'crunchpress' ),
				'new_item_name' => __( 'New Quiz Type Name', 'crunchpress' ),
				'menu_name' => __( 'Quiz Types', 'crunchpress' ),
				'popular_items' => null // Hides the "Popular" section above the "add" form in the admin.
			);

			$args = array(
				'hierarchical' => false,
				'labels' => $labels,
				'show_ui' => true, /* TO DO - future releases */
				'query_var' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array( 'slug' => esc_attr( apply_filters( 'sensei_quiz_type_slug', _x( 'quiz-type', 'taxonomy archive slug', 'crunchpress' ) ) ) )
			);

			register_taxonomy( 'quiz-type', array( 'quiz' ), $args );
			flush_rewrite_rules();
		} // End setup_quiz_type_taxonomy()
		
		
		/**
		 * question_type_taxonomy function.
		 *
		 * @access public
		 * @return void
		 */
		function question_type_taxonomy () {
			// "Question Types" Custom Taxonomy
			$labels = array(
				'name' => _x( 'Question Types', 'taxonomy general name', 'crunchpress' ),
				'singular_name' => _x( 'Question Type', 'taxonomy singular name', 'crunchpress' ),
				'search_items' =>  __( 'Search Question Types', 'crunchpress' ),
				'all_items' => __( 'All Question Types', 'crunchpress' ),
				'parent_item' => __( 'Parent Question Type', 'crunchpress' ),
				'parent_item_colon' => __( 'Parent Question Type:', 'crunchpress' ),
				'edit_item' => __( 'Edit Question Type', 'crunchpress' ),
				'update_item' => __( 'Update Question Type', 'crunchpress' ),
				'add_new_item' => __( 'Add New Question Type', 'crunchpress' ),
				'new_item_name' => __( 'New Question Type Name', 'crunchpress' ),
				'menu_name' => __( 'Question Types', 'crunchpress' ),
				'popular_items' => null // Hides the "Popular" section above the "add" form in the admin.
			);

			$args = array(
				'hierarchical' => false,
				'labels' => $labels,
				'show_ui' => false,
				'public' => false,
				'query_var' => false,
				'show_in_nav_menus' => false,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => esc_attr( apply_filters( 'cp_question_type_slug', _x( 'question-type', 'taxonomy archive slug', 'crunchpress' ) ) ) )
			);

			register_taxonomy( 'question-type', array( 'question' ), $args );
			flush_rewrite_rules();
		} // End setup_question_type_taxonomy()
		
		/**
		 * create_courses function.
		 *
		 * @access public
		 * @return void
		 */
		function create_courses() {
			
			$labels = array(
				'name' => __('Courses', 'crunchpress'),
				'singular_name' => __('Courses', 'crunchpress'),
				'add_new' => _x('Add New Course', 'crunchpress'),				
				'menu_name' => __('Course LMS', 'crunchpress'),
				'add_new_item' => __('Add New Course', 'crunchpress'),
				'edit_item' => __('Edit Course', 'crunchpress'),
				'new_item' => __('New Course', 'crunchpress'),
				'view_item' => __('View Course', 'crunchpress'),
				'search_items' => __('Search Course', 'crunchpress'),
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
				'menu_icon' => 'dashicons-list-view',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 100,
				'supports' => array('title','editor','thumbnail'),
				'has_archive' => true,
				'rewrite' => array('slug' => '', 'with_front' => false)
			  ); 
			  
			register_post_type( 'courses' , $args);	
		
			$labels_cat = array(
				'name' => _x( 'Course Categories', 'taxonomy general name', 'crunchpress' ),
				'singular_name' => _x( 'Course Category', 'taxonomy singular name', 'crunchpress' ),
				'search_items' =>  __( 'Search Course Categories', 'crunchpress' ),
				'all_items' => __( 'All Course Categories', 'crunchpress' ),
				'parent_item' => __( 'Parent Course Category', 'crunchpress' ),
				'parent_item_colon' => __( 'Parent Course Category:', 'crunchpress' ),
				'edit_item' => __( 'Edit Course Category', 'crunchpress' ),
				'update_item' => __( 'Update Course Category', 'crunchpress' ),
				'add_new_item' => __( 'Add New Course Category', 'crunchpress' ),
				'new_item_name' => __( 'New Course Category Name', 'crunchpress' ),
				'menu_name' => __( 'Course Categories', 'crunchpress' ),
				'popular_items' => null // Hides the "Popular" section above the "add" form in the admin.
			);
			
			$args_cat = array(
				'hierarchical' => true,
				'labels' => $labels_cat,
				'show_ui' => true,
				'query_var' => true,
				'show_in_nav_menus' => true,
				'rewrite' => array( 'slug' => esc_attr( apply_filters( 'cp_course_category_slug', _x( 'course-category', 'taxonomy archive slug', 'crunchpress' ) ) ) )
			);

			register_taxonomy( 'courses-category', array( 'courses' ), $args_cat );
			flush_rewrite_rules();
		}
		
		
				/**
		 * create_question_posttype function.
		 *
		 * @access public
		 * @return void
		 */
		function create_question_posttype() {		
			$labels = array(
				'name' => __('Question', 'crunchpress'),
				'singular_name' => __('Question', 'crunchpress'),
				'add_new' => _x('Add New', 'crunchpress'),
				'add_new_item' => __('Add New Question', 'crunchpress'),
				'edit_item' => __('Edit Question', 'crunchpress'),
				'new_item' => __('New Question', 'crunchpress'),
				'view_item' => __('View Question', 'crunchpress'),
				'search_items' => __('Search Question', 'crunchpress'),
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
				'menu_icon' => 'dashicons-vault',
				'rewrite' => true,
				'capability_type' => 'post',
				//'show_in_menu' => 'edit.php?post_type=courses',
				'hierarchical' => false,
				'menu_position' => 100,
				'supports' => array('title','thumbnail'),
				'has_archive' => true,
				'rewrite' => array('slug' => '', 'with_front' => false)
			  ); 
			  
			register_post_type( 'question' , $args);	
			flush_rewrite_rules();
			
			
			$labels_ques_tax = array(
				'name' => _x( 'Question Category', 'taxonomy general name', 'crunchpress' ),
				'singular_name' => _x( 'Question Category', 'taxonomy singular name', 'crunchpress' ),
				'search_items' =>  __( 'Search Question Category', 'crunchpress' ),
				'all_items' => __( 'All Question Categories', 'crunchpress' ),
				'parent_item' => __( 'Parent Question Category', 'crunchpress' ),
				'parent_item_colon' => __( 'Parent Question Category:', 'crunchpress' ),
				'edit_item' => __( 'Edit Question Category', 'crunchpress' ),
				'update_item' => __( 'Update Question Category', 'crunchpress' ),
				'add_new_item' => __( 'Add New Question Category', 'crunchpress' ),
				'new_item_name' => __( 'New Question Category Name', 'crunchpress' ),
				'menu_name' => __( 'Question Category', 'crunchpress' ),
				'popular_items' => null // Hides the "Popular" section above the "add" form in the admin.
			);

			$args_ques_tax = array(
				'hierarchical' => true,
				'labels' => $labels_ques_tax,
				'show_ui' => true,
				'query_var' => true,
				'show_in_nav_menus' => true,
				'rewrite' => array( 'slug' => esc_attr( apply_filters( 'cp_question_category_slug', _x( 'question-category', 'taxonomy archive slug', 'crunchpress' ) ) ) )
			);

			register_taxonomy( 'question-category', array( 'question' ), $args_ques_tax );
			
		}
		
		/**
		 * create_lesson_posttype function.
		 *
		 * @access public
		 * @return void
		 */
		function create_lesson_posttype() {	
			//Define Post Type Labels
			$labels = array(
				'name' => __('Lesson', 'crunchpress'),
				'singular_name' => __('Lesson', 'crunchpress'),
				'add_new' => _x('Add New', 'crunchpress'),
				'add_new_item' => __('Add New Lesson', 'crunchpress'),
				'edit_item' => __('Edit Lessons', 'crunchpress'),
				'new_item' => __('New Lessons', 'crunchpress'),
				'view_item' => __('View Lessons', 'crunchpress'),
				'search_items' => __('Search Lessons', 'crunchpress'),
				'not_found' =>  __('Nothing found', 'crunchpress'),
				'not_found_in_trash' => __('Nothing found in Trash', 'crunchpress'),
				'parent_item_colon' => ''
			);
			
			//Configure Post Type
			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_icon' => 'dashicons-editor-paste-text',
				'rewrite' => true,
				'show_in_menu' => 'edit.php?post_type=courses',
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 70,
				'supports' => array('title','editor','thumbnail','custom-fields'),
				'has_archive' => true,
				'rewrite' => array('slug' => '', 'with_front' => false)
			  ); 
			  
			//Register Lessons Post Type
			register_post_type( 'lessons' , $args);
			flush_rewrite_rules();
			
			
			$labels_ques_tax = array(
				'name' => _x( 'Lesson Category', 'taxonomy general name', 'crunchpress' ),
				'singular_name' => _x( 'Lesson Category', 'taxonomy singular name', 'crunchpress' ),
				'search_items' =>  __( 'Search Lesson Category', 'crunchpress' ),
				'all_items' => __( 'All Lesson Categories', 'crunchpress' ),
				'parent_item' => __( 'Parent Lesson Category', 'crunchpress' ),
				'parent_item_colon' => __( 'Parent Lesson Category:', 'crunchpress' ),
				'edit_item' => __( 'Edit Lesson Category', 'crunchpress' ),
				'update_item' => __( 'Update Lesson Category', 'crunchpress' ),
				'add_new_item' => __( 'Add New Lesson Category', 'crunchpress' ),
				'new_item_name' => __( 'New Lesson Category Name', 'crunchpress' ),
				'menu_name' => __( 'Lesson Category', 'crunchpress' ),
				'popular_items' => null // Hides the "Popular" section above the "add" form in the admin.
			);

			$args_ques_tax = array(
				'hierarchical' => true,
				'labels' => $labels_ques_tax,
				'show_ui' => true,
				'query_var' => true,
				'show_in_nav_menus' => true,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => esc_attr( apply_filters( 'cp_lesson_category_slug', _x( 'lesson-category', 'taxonomy archive slug', 'crunchpress' ) ) ) )
			);

			register_taxonomy( 'lesson-category', array( 'lessons' ), $args_ques_tax );
		}	
		

		
		
		
	
		function add_courses_option(){	
		
			add_meta_box('course-option', __('Courses Detail','crunchpress'),array($this,'add_course_option_element'),
				'courses', 'normal', 'high');
				
			add_meta_box('woo-product', __('Courses Options','crunchpress'),array($this,'add_course_product_option_side'),
				'courses', 'side', 'low');	
				
		}
		
		// function flush_rewrite_rules() {
			// create_post_type();

			// flush_rewrite_rules();
		// }
		// register_activation_hook( __FILE__, 'flush_rewrite_rules' );
				
		
		//Lesson Options Function
		function add_lessons_option(){	
		
			add_meta_box('lesson-option', __('Lesson Details','crunchpress'),array($this,'add_lesson_option_element'),
				'lessons', 'normal', 'high');
				
			add_meta_box('course-option', __('Lesson Options','crunchpress'),array($this,'add_lession_product_option_side'),
				'lessons', 'side', 'low');	
								
				
		}		
		
		function add_lesson_option_element(){
		
			$audio_url_type = '';
			$post_thumbnail = '';
			$video_url_type = '';
			$select_slider_type = '';
			$lesson_detail_xml = '';
			$lesson_caption = '';

			foreach($_REQUEST as $keys=>$values){
				$$keys = $values;
			}
			global $post,$countries;
		
			
			$sidebars_port = '';
			$right_sidebar_port = '';
			$left_sidebar_port = '';			
			$lesson_detail_xml = get_post_meta($post->ID, 'lesson_detail_xml', true);
			if($lesson_detail_xml <> ''){
				$cp_team_xml = new DOMDocument ();
				$cp_team_xml->loadXML ( $lesson_detail_xml );
				$sidebars_port = function_library::find_xml_value($cp_team_xml->documentElement,'sidebars_port');
				$right_sidebar_port = function_library::find_xml_value($cp_team_xml->documentElement,'right_sidebar_port');
				$left_sidebar_port = function_library::find_xml_value($cp_team_xml->documentElement,'left_sidebar_port');	
				$audio_url_type = find_xml_value($cp_team_xml->documentElement,'audio_url_type');
				$post_thumbnail = find_xml_value($cp_team_xml->documentElement,'post_thumbnail');
				$video_url_type = find_xml_value($cp_team_xml->documentElement,'video_url_type');
				$select_slider_type = find_xml_value($cp_team_xml->documentElement,'select_slider_type');
				$lesson_caption = find_xml_value($cp_team_xml->documentElement,'lesson_caption');
			} 
			
			?>
			<div class="event_options cp-wrapper">
				<div class="row-fluid">
					<ul class="recipe_class span3">
						<li class="panel-input">	
							<span class="panel-title">
								<h3 for="post_thumbnail"><?php _e('Select Type', 'crunchpress'); ?></h3>
							</span>
							<div class="combobox">
								<select name="post_thumbnail" id="event_thumbnail">
									<option class="Image" value="Image" <?php if( $post_thumbnail == 'Image' ){ echo 'selected'; }?>><?php echo __('Feature Image','crunchpress'); ?></option>
									<option class="Audio" value="Audio" <?php if( $post_thumbnail == 'Audio' ){ echo 'selected'; }?>><?php echo __('Audio','crunchpress'); ?></option>
									<option class="Video" value="Video" <?php if( $post_thumbnail == 'Video' ){ echo 'selected'; }?>><?php echo __('Video','crunchpress'); ?></option>
									<option class="Slider" value="Slider" <?php if( $post_thumbnail == 'Slider' ){ echo 'selected'; }?>><?php echo __('Slider','crunchpress'); ?></option>
								</select>
							</div>
							<p><?php _e('Please select your lesson type of content.', 'crunchpress'); ?></p></li>			
						</li>
						
					</ul>
					<ul class="video_class recipe_class span3">						
						<li class="panel-input">
							<span class="panel-title">
								<label for="video_url_type" > <?php _e('Video URL', 'crunchpress'); ?> </label>
							</span>		
							<input type="text" name="video_url_type" id="video_url_type" value="<?php if($video_url_type <> ''){echo esc_url($video_url_type);};?>" />
							<p><?php _e('Please paste Youtube or Vimeo url.', 'crunchpress'); ?></p>
						</li>
					</ul>
					<ul class="audio_class recipe_class span3">
						<li class="panel-input">
							<span class="panel-title">
								<h3> <?php _e('AUDIO MP3 URL', 'crunchpress'); ?> </h3>
							</span>
							<input type="text" name="audio_url_type" id="audio_url_type" value="<?php if($audio_url_type <> ''){echo esc_url($audio_url_type);};?>" />
							<p><?php _e('Please paste mp3 audio url.', 'crunchpress'); ?></p>
						</li>
					</ul>
					<ul class="select_slider_option recipe_class span3">				
						<li class="panel-input">	
							<span class="panel-title">
								<h3><?php _e('Select Images Slide', 'crunchpress'); ?></h3>
							</span>
							<div class="combobox">
								<select name="select_slider_type" id="select_slider_type">
									<?php foreach( get_title_list_array('cp_slider') as $values){?>
										<option value="<?php echo $values->ID;?>" <?php if($select_slider_type == $values->ID){echo 'selected';}?>><?php echo $values->post_title;?></option>
									<?php }?>
								</select>
							</div>
							<p><?php _e('Please select slide to show in post.', 'crunchpress'); ?></p>
						</li>
					</ul>
				</div>
				<div class="row-fluid">
					<ul class="courseid_class recipe_class span12">
						<li class="panel-input">
							<span class="panel-title">
								<h3><?php _e('Lesson Caption', 'crunchpress'); ?> </h3>
							</span>
							<input type="text" name="lesson_caption" id="lesson_caption" value="<?php if($lesson_caption <> ''){echo $lesson_caption;};?>" />
							<p><?php _e('Please add lesson caption.', 'crunchpress'); ?></p>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<input type="hidden" name="lesson_detail" value="lesson_detail" />
			<div class="clear"></div>
		<?php
		
		}
		
		
	//lesson Meta options to fetch course
	function add_lession_product_option_side(){ 
		
			$product_selected = '';
			
			foreach($_REQUEST as $keys=>$values){
				$$keys = $values;
			}
			$course_tutor = '';
			global $post,$countries;
			
			
			$course_selected = '';
			$lesson_prerequisite = '';
			$lesson_preview = '';
			$lesson_order = '';
			$lesson_detail_xml = get_post_meta($post->ID, 'lesson_detail_xml', true);
			$course_tutor = get_post_meta($post->ID, 'course_tutor', true);
			$course_selected = get_post_meta($post->ID, 'course_selected', true);
			$lesson_order = get_post_meta($post->ID, 'lesson_order', true);
			
			if($lesson_detail_xml <> ''){
				$cp_team_xml = new DOMDocument ();
				$cp_team_xml->loadXML ( $lesson_detail_xml );				
				$lesson_prerequisite = function_library::find_xml_value($cp_team_xml->documentElement,'lesson_prerequisite');
				$lesson_preview = function_library::find_xml_value($cp_team_xml->documentElement,'lesson_preview');
				
				
			} ?>

			<ul class="recipe_class">
				<li class="panel-input">	
					<div class="panel-title">
						<h4><?php _e('Select Course', 'crunchpress'); ?></h4>
					</div>
					<select name="course_selected" id="course_selected" class="chosen_select widefat">
						<option value="0" <?php if( 0 == $course_selected ){ echo 'selected'; }?>><?php _e('None','crunchpress');?></option>
						<?php foreach(get_title_list_array( 'courses' ) as $course){ ?>
							<option value="<?php echo $course->ID?>" <?php if( $course->ID == $course_selected ){ echo 'selected'; }?>><?php echo $course->post_title?></option>
						<?php }?>
					</select>					
					<p><?php _e('Please select course for this lession.', 'crunchpress'); ?></p>
				</li>
			</ul>
			<ul class="recipe_class">
				<li class="panel-input">	
					<div class="panel-title">
						<h4><?php _e('Prerequisite Lesson', 'crunchpress'); ?></h4>
					</div>
					<select id="lesson-prerequisite-options" name="lesson_prerequisite" class="chosen_select widefat">
						<option value="0" <?php if( 0 == $lesson_prerequisite ){ echo 'selected'; }?>><?php _e('None','crunchpress');?></option>
						<?php foreach(get_title_list_array( 'lessons' ) as $lesson){ ?>
							<option value="<?php echo $lesson->ID?>" <?php if( $lesson->ID == $lesson_prerequisite ){ echo 'selected'; }?>><?php echo $lesson->post_title?></option>
						<?php }?>
					</select>					
					<p><?php _e('Please select course for this lession.', 'crunchpress'); ?></p>
				</li>
			</ul>
			<ul class="event_social_class recipe_class row-fluid">
				<li class="panel-input span12">
					<div>
						<h4> <?php _e('Lesson Preview', 'crunchpress'); ?> </h4>
					</div>	
					<label for="lesson_preview"><div class="checkbox-switch <?php
					
					echo ($lesson_preview=='enable' || ($lesson_preview=='' && empty($default)))? 'checkbox-switch-on': 'checkbox-switch-off'; 

				?>"></div></label>
				<div class="clearfix clear"></div>
				<input type="checkbox" name="lesson_preview" class="checkbox-switch" value="disable" checked>
				<input type="checkbox" name="lesson_preview" id="lesson_preview" class="checkbox-switch" value="enable" <?php 
					
					echo ($lesson_preview=='enable' || ($lesson_preview=='' && empty($default)))? 'checked': ''; 
				
				?>>
				<p><?php _e('You can turn On/Off lesson preview for guest and non registered user.','crunchpress'); ?></p>
				</li>
			</ul>
			<ul class="lesson_order recipe_class" style="display:none;">
				<li class="panel-input">
					<span class="panel-title">
						<h3> <?php _e('Lesson Order', 'crunchpress'); ?> </h3>
					</span>
					<input type="text" name="lesson_order" id="lesson_order" value="<?php if($lesson_order <> ''){echo $lesson_order;};?>" />
					<p><?php _e('Please paste mp3 audio url.', 'crunchpress'); ?></p>
				</li>
			</ul>
			<input type="hidden" name="lesson_submit" value="lesson"/>
					
		
		<?php 	
			
	} // Function Ends
	
	function add_course_option_element(){
			
			$audio_url_type = '';
			$post_thumbnail = '';
			$video_url_type = '';
			$select_slider_type = '';
			$course_id = '';
			$duration_field = '';
			$course_detail_xml = '';
			$lesson_order = '';
			$page_caption = '';

			foreach($_REQUEST as $keys=>$values){
				$$keys = $values;
			}
			global $post,$countries;
		
			$event_social = '';
			$sidebars_port = '';
			$right_sidebar_port = '';
			$left_sidebar_port = '';			
			$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
			$lesson_order = get_post_meta($post->ID, 'lesson_order', true);
			
			if($course_detail_xml <> ''){
				$cp_course_xml = new DOMDocument ();
				$cp_course_xml->loadXML ( $course_detail_xml );
				$sidebars_port = function_library::find_xml_value($cp_course_xml->documentElement,'sidebars_port');
				$right_sidebar_port = function_library::find_xml_value($cp_course_xml->documentElement,'right_sidebar_port');
				$left_sidebar_port = function_library::find_xml_value($cp_course_xml->documentElement,'left_sidebar_port');	
				$audio_url_type = find_xml_value($cp_course_xml->documentElement,'audio_url_type');
				$post_thumbnail = find_xml_value($cp_course_xml->documentElement,'post_thumbnail');
				$video_url_type = find_xml_value($cp_course_xml->documentElement,'video_url_type');
				$select_slider_type = find_xml_value($cp_course_xml->documentElement,'select_slider_type');
				$course_id = find_xml_value($cp_course_xml->documentElement,'course_id');
				$duration_field = find_xml_value($cp_course_xml->documentElement,'duration_field');
				$select_slider_type = find_xml_value($cp_course_xml->documentElement,'select_slider_type');
				$page_caption = find_xml_value($cp_course_xml->documentElement,'page_caption');		
				
			} ?>
				<div class="event_options cp-wrapper">
					<ul class="event_social_class recipe_class row-fluid">
						<li class="panel-input span4">
							<div>
								<h3 for="event_social" > <?php _e('SOCIAL NETWORKING', 'crunchpress'); ?> </h3>
							</div>	
							<label for="event_social"><div class="checkbox-switch <?php
							
							echo ($event_social=='enable' || ($event_social=='' && empty($default)))? 'checkbox-switch-on': 'checkbox-switch-off'; 

						?>"></div></label>
						<input type="checkbox" name="event_social" class="checkbox-switch" value="disable" checked>
						<input type="checkbox" name="event_social" id="event_social" class="checkbox-switch" value="enable" <?php 
							
							echo ($event_social=='enable' || ($event_social=='' && empty($default)))? 'checked': ''; 
						
						?>>
						<div class="clearfix clear"></div>
						<p><?php _e('You can turn On/Off social sharing from event detail.','crunchpress'); ?></p>
						</li>
						
						<li class="panel-input span8">
							<span class="panel-title">
								<h3> <?php _e('Course Page Caption', 'crunchpress'); ?> </h3>
							</span>
							<input type="text" name="page_caption" id="page_caption" value="<?php if($page_caption <> ''){echo $page_caption;};?>" />
							<p><?php _e('Please Add Course Page Caption.', 'crunchpress'); ?></p>
						</li>
					</ul>
					
					<?php 
						//Condition for Library
						// if(class_exists('function_library')){
						// $function_library = new function_library();
							// echo $function_library->show_sidebar($sidebars_port,'right_sidebar_port','left_sidebar_port',$right_sidebar_port,$left_sidebar_port);
						// }	
					?>
					<div class="row-fluid">
						<ul class="recipe_class span3">
							<li class="panel-input">	
								<span class="panel-title">
									<h3 for="post_thumbnail"><?php _e('SELECT TYPE', 'crunchpress'); ?></h3>
								</span>
								<div class="combobox">
									<select name="post_thumbnail" id="event_thumbnail">
										<option class="Image" value="Image" <?php if( $post_thumbnail == 'Image' ){ echo 'selected'; }?>><?php echo __('Feature Image','crunchpress'); ?></option>
										<option class="Audio" value="Audio" <?php if( $post_thumbnail == 'Audio' ){ echo 'selected'; }?>><?php echo __('Audio','crunchpress'); ?></option>
										<option class="Video" value="Video" <?php if( $post_thumbnail == 'Video' ){ echo 'selected'; }?>><?php echo __('Video','crunchpress'); ?></option>
										<option class="Slider" value="Slider" <?php if( $post_thumbnail == 'Slider' ){ echo 'selected'; }?>><?php echo __('Slider','crunchpress'); ?></option>
									</select>
								</div>
								<p><?php _e('Please select your post type of content.', 'crunchpress'); ?></p>
							</li>
							
						</ul>
						<ul class="video_class recipe_class span3">						
							<li class="panel-input">								
								<span class="panel-title">
									<h3> <?php _e('VIDEO URL', 'crunchpress'); ?></h3>
								</span>								
								<input type="text" name="video_url_type" id="video_url_type" value="<?php if($video_url_type <> ''){echo esc_url($video_url_type);};?>" />
								<p><?php _e('Please paste Youtube or Vimeo url.', 'crunchpress'); ?></p>
							</li>
						</ul>
						<ul class="audio_class recipe_class span3">
							<li class="panel-input">
								<span class="panel-title">
									<h3> <?php _e('AUDIO MP3 URL', 'crunchpress'); ?> </h3>
								</span>
								<input type="text" name="audio_url_type" id="audio_url_type" value="<?php if($audio_url_type <> ''){echo esc_url($audio_url_type);};?>" />
								<p><?php _e('Please paste mp3 audio url.', 'crunchpress'); ?></p>
							</li>
						</ul>
						<ul class="select_slider_option recipe_class span3">				
							<li class="panel-input">	
								<span class="panel-title">
									<h3><?php _e('Select Images Slide', 'crunchpress'); ?></h3>
								</span>
								<div class="combobox">
									<select name="select_slider_type" id="select_slider_type">
										<?php foreach( get_title_list_array('cp_slider') as $values){?>
											<option value="<?php echo $values->ID;?>" <?php if($select_slider_type == $values->ID){echo 'selected';}?>><?php echo $values->post_title;?></option>
										<?php }?>
									</select>
								</div>
								<p><?php _e('Please select slide to show in post.', 'crunchpress'); ?></p>
							</li>
						</ul>
					</div>
					<div class="row-fluid">
						<ul class="duration_class recipe_class span6">						
							<li class="panel-input">								
								<span class="panel-title">
									<h3> <?php _e('DURATION', 'crunchpress'); ?></h3>
								</span>								
								<input type="text" name="duration_field" id="duration_field" value="<?php if($duration_field <> ''){echo $duration_field;};?>" />
								<p><?php _e('Please add duration of course.', 'crunchpress'); ?></p>
							</li>
						</ul>
						<ul class="courseid_class recipe_class span6">
							<li class="panel-input">
								<span class="panel-title">
									<h3> <?php _e('COURSE ID', 'crunchpress'); ?> </h3>
								</span>
								<input type="text" name="course_id" id="course_id" value="<?php if($course_id <> ''){echo $course_id;};?>" />
								<p><?php _e('Please add course ID.', 'crunchpress'); ?></p>
							</li>
						</ul>
					</div>
					
					<div class="lessons" id="add-question-metadata">
						<table id="sortable-questions" class="widefat ui-sortable">
							<thead>
								<tr>
									<th class="question-count-column">#</th>
									<th>Lessons</th>
									<th>Date</th>
									<th>Lesson ID</th>
								</tr>
							</thead>
							<?php echo $this->get_list_course_lessons($post);?>
						</table>
					</div>
					<?php
					
					//print_r($lesson_order);
						if( $lesson_order ) {
							//$order = array_filter( explode( ',', $lesson_order ) );
							$i = 1;
							foreach( $lesson_order as $lesson_id ) {
								if( $lesson_id ) {
									update_post_meta( $lesson_id, 'lesson_order', $i );
									++$i;
								}
							}
						}
					?>
					<input type="hidden" name="education_submit" value="education"/>
					<div class="clear"></div>
				</div>	
				<div class="clear"></div>
	<?php 
	}
	
	function get_list_course_lessons($course=''){
		
		$lesson_argu = array(
			'posts_per_page'=> -1,
			'post_type'   => 'lessons',
			'meta_query' => array(
				array(
					'key' => 'course_selected',
					'value' => intval( $course->ID ),
					'compare' => '='
				)
			),				
			'meta_key' => 'lesson_order',
			'orderby' => 'meta_value_num date',
			'order' => 'ASC',
			'suppress_filters' => 0,
			'post_status' => 'publish',
		);
		$course_lesson = '';
		$lesson_loop = new WP_Query($lesson_argu);
		$counter_loop = 0;
		if($lesson_loop->have_posts()){
			while ( $lesson_loop->have_posts() ) : 
				$lesson_loop->the_post();
				global $post;
				$counter_loop++;
				$course_lesson .= '
					<tbody>
						<tr>
							<td class="table-count question-number question-count-column">
								<span class="number">'.$counter_loop.'</span>
							</td>
							<td>'.esc_html(get_the_title()).'</th>
							<td>'.get_the_date().'</td>
							<td>'.esc_attr($post->ID).'</td>
						</tr>
						<input type="hidden" name="lesson_order[]" class="row_question_id" id="question_' . $counter_loop . '_id" value="' . $post->ID . '" />
					</tbody>
					
					';
					//update_post_meta ($post->ID, 'lesson_order', $counter_loop);
			endwhile; //End Foreach loop
			//End Reset Postdata
			wp_reset_postdata();
		}//End condition
		
	return $course_lesson;
	
	}

	function get_all_courses_with_product_selected($course_id =''){
		global $post;
		$current_product = get_post_meta($course_id, 'product_selected', true);
		$product_chunk = array();
		foreach($this->get_all_courses($course_id) as $id){
			if($course_id == $id){}else{
				$product_chunk[] = get_post_meta($id, 'product_selected', true);
			}			
		}
		
		return array_filter($product_chunk);
	}
	
	function add_course_product_option_side(){ 
		$course_tutor = '';
		$product_selected = '';
		$feature_course= '';
		
		foreach($_REQUEST as $keys=>$values){
			$$keys = $values;
		}
		
		global $post,$countries;
		$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
		$course_tutor = get_post_meta($post->ID, 'course_tutor', true);
		$product_selected = get_post_meta($post->ID, 'product_selected', true);
		if($course_detail_xml <> ''){
			$cp_team_xml = new DOMDocument ();
			$cp_team_xml->loadXML ( $course_detail_xml );
			$feature_course = function_library::find_xml_value($cp_team_xml->documentElement,'feature_course');
			
		}
		
		
		
		if(class_exists('function_library')){
			if(class_exists("Woocommerce")){
				$selected_products = $this->get_all_courses_with_product_selected($post->ID); ?>

		<ul class="recipe_class">
			<li class="panel-input">	
				<div class="panel-title">
					<h3><?php _e('Select Plan', 'crunchpress'); ?></h3>
				</div>					
				<div class="combobox">
					<select name="product_selected" id="product_selected" class="chosen_select">
						<option class="product_selected" value="0" <?php if( 0 == $product_selected ){ echo 'selected'; }?>>No Product</option>
						<?php 
						foreach(get_title_list_array( 'product' ) as $products){ 
							if(!in_array( $products->ID, $selected_products )){ ?>
								<option class="product_selected" value="<?php echo $products->ID?>" <?php if( $products->ID == $product_selected ){ echo 'selected'; }?>><?php echo $products->post_title?></option>
							<?php 
							}
						}?>
					</select>
				</div>
				<p><?php _e('Please select Woo product you want to add as price plan for this course.', 'crunchpress'); ?></p>
			</li>
		</ul>
		<?php
		}else{
	
				echo "<h4>".__('Please install WooCommerce in order to activate this option.','crunchpress')."</h4>";
	
		} //Function Exists
		?>
		<hr />
		<ul class="recipe_class">
			<li class="panel-input">	
				<div class="panel-title">
					<h4><?php _e('Select Tutor', 'crunchpress'); ?></h4>
				</div>
				<select name="course_tutor[]" id="course_tutor" class="chosen_select widefat" multiple>
					<option value="0" <?php if(!empty($course_tutor)){ echo  selected( in_array( 0, $course_tutor ), true, false ); }?>><?php _e('None','crunchpress');?></option>
					<?php foreach(get_title_list_array( 'team' ) as $team){ ?>
						<option value="<?php echo $team->ID?>" <?php if(!empty($course_tutor)){ echo  selected( in_array( $team->ID, $course_tutor ), true, false ); }?>><?php echo $team->post_title?></option>
					<?php }?>
				</select>					
				<p><?php _e('Please select course tutor for this lesson.', 'crunchpress'); ?></p>
			</li>
		</ul>
		<ul class="event_social_class recipe_class row-fluid">
			<li class="panel-input span12">
				<h4> <?php _e('Feature Course', 'crunchpress'); ?> </h4>
				<label for="feature_course"><div class="checkbox-switch <?php
				
				echo ($feature_course=='enable' || ($feature_course=='' && empty($default)))? 'checkbox-switch-on': 'checkbox-switch-off'; 

			?>"></div></label>
			<div class="clearfix clear"></div>
			<input type="checkbox" name="feature_course" class="checkbox-switch" value="disable" checked>
			<input type="checkbox" name="feature_course" id="feature_course" class="checkbox-switch" value="enable" <?php 
				
				echo ($feature_course=='enable' || ($feature_course=='' && empty($default)))? 'checked': ''; 
			
			?>>
			<p><?php _e('You can turn On/Off feature courses.','crunchpress'); ?></p>
			</li>
		</ul>
		
		<input type="hidden" name="course_submit" value="education"/>
				
	
	<?php 	
		} // Class Exists
	} // Function Ends
	
	function save_courses_option_meta($post_id){
	
		$product_selected = '';
		$audio_url_type = '';
		$post_thumbnail = '';
		$video_url_type = '';
		$select_slider_type = '';
		$course_tutor = '';
		$course_id = '';
		$duration_field = '';
		$sidebars = '';
		$right_sidebar_port = '';
		$left_sidebar_port = '';
		$feature_course = '';
		$lesson_order = '';
		$page_caption = '';
		
		
		foreach($_REQUEST as $keys=>$values){
			$$keys = $values;
		}
	
		if(defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return;
	
		if(isset($education_submit) AND $education_submit == 'education'){
		
			$new_data = '<course_detail>';
			$new_data = $new_data . function_library::create_xml_tag('sidebars_port',$sidebars);
			$new_data = $new_data . function_library::create_xml_tag('right_sidebar_port',$right_sidebar_port);
			$new_data = $new_data . function_library::create_xml_tag('left_sidebar_port',$left_sidebar_port);
			$new_data = $new_data . function_library::create_xml_tag('product_selected',$product_selected);
			$new_data = $new_data . function_library::create_xml_tag('feature_course',$feature_course);
			$new_data = $new_data . function_library::create_xml_tag('audio_url_type',esc_url($audio_url_type));
			$new_data = $new_data . function_library::create_xml_tag('post_thumbnail',$post_thumbnail);
			$new_data = $new_data . function_library::create_xml_tag('video_url_type',esc_url($video_url_type));
			$new_data = $new_data . function_library::create_xml_tag('select_slider_type',$select_slider_type);
			$new_data = $new_data . function_library::create_xml_tag('course_id',$course_id);
			$new_data = $new_data . function_library::create_xml_tag('page_caption',$page_caption);
			$new_data = $new_data . function_library::create_xml_tag('duration_field',$duration_field);
			$new_data = $new_data . '</course_detail>';
			//Saving Sidebar and Social Sharing Settings as XML
			$old_data = get_post_meta($post_id, 'course_detail_xml',true);
			function_library::save_meta_data($post_id, $new_data, $old_data, 'course_detail_xml');
			
			//save Tutor in array
			$old_data = get_post_meta($post_id, 'course_tutor',true);
			function_library::save_meta_data($post_id, $course_tutor, $old_data, 'course_tutor');
			
			$old_data = get_post_meta($post_id, 'product_selected',true);
			function_library::save_meta_data($post_id, $product_selected, $old_data, 'product_selected');
			
			
			$old_data = get_post_meta($post_id, 'lesson_order',true);
			function_library::save_meta_data($post_id, $lesson_order, $old_data, 'lesson_order');
			
		}
	}
	
	function save_lesson_option_meta($post_id){
		
		$lesson_detail_xml	= '';
		$course_tutor 		= '';
		$lesson_order 		= '';
		$sidebars_port 		= '';
		$right_sidebar_port = '';
		$left_sidebar_port	= '';	
		$audio_url_type		= '';
		$post_thumbnail		= '';
		$video_url_type		= '';
		$select_slider_type	= '';
		$course_selected	= '';
		$lesson_prerequisite= '';
		$lesson_preview		= '';
		$lesson_caption		= '';
		foreach($_REQUEST as $keys=>$values){
			$$keys = $values;
		}
	
		if(defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return;
	
		if(isset($lesson_submit) AND $lesson_submit == 'lesson'){
		
			$new_data = '<lesson_detail>';
			$new_data = $new_data . function_library::create_xml_tag('sidebars_port',$sidebars_port);
			$new_data = $new_data . function_library::create_xml_tag('right_sidebar_port',$right_sidebar_port);
			$new_data = $new_data . function_library::create_xml_tag('left_sidebar_port',$left_sidebar_port);
			$new_data = $new_data . function_library::create_xml_tag('audio_url_type',esc_url($audio_url_type));
			$new_data = $new_data . function_library::create_xml_tag('post_thumbnail',$post_thumbnail);
			$new_data = $new_data . function_library::create_xml_tag('video_url_type',esc_url($video_url_type));
			$new_data = $new_data . function_library::create_xml_tag('select_slider_type',$select_slider_type);
			$new_data = $new_data . function_library::create_xml_tag('course_selected',$course_selected);
			$new_data = $new_data . function_library::create_xml_tag('lesson_prerequisite',$lesson_prerequisite);
			$new_data = $new_data . function_library::create_xml_tag('lesson_preview',$lesson_preview);
			$new_data = $new_data . function_library::create_xml_tag('lesson_caption',$lesson_caption);
			
			$new_data = $new_data . '</lesson_detail>';
			
			//Saving Sidebar and Social Sharing Settings as XML
			$old_data = get_post_meta($post_id, 'lesson_detail_xml',true);
			function_library::save_meta_data($post_id, $new_data, $old_data, 'lesson_detail_xml');
			
			$old_data = get_post_meta($post_id, 'course_selected',true);
			function_library::save_meta_data($post_id, $course_selected, $old_data, 'course_selected');
			
			$old_data = get_post_meta($post_id, 'lesson_order',true);
			function_library::save_meta_data($post_id, $lesson_order, $old_data, 'lesson_order');
		
			//save Tutor in array
			$old_data = get_post_meta($post_id, 'course_tutor',true);
			function_library::save_meta_data($post_id, $course_tutor, $old_data, 'course_tutor');
		
		}
	}
		
		
	//Print Courses 
	function course_item_element($item_xml){
		global $counter,$current_user;
		//Fetch Elements from Pagebuilder
		$header = find_xml_value($item_xml, 'header');
		$layout = find_xml_value($item_xml, 'layout');
		
		$category = find_xml_value($item_xml, 'category');
		$num_excerpt = find_xml_value($item_xml, 'num_excerpt');
		$pagination = find_xml_value($item_xml, 'pagination');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		
		
		$cp_education_class = new cp_education_class;
		$get_all_pending = $cp_education_class->get_user_all_pending_orders_and_product_ids($current_user->ID);
		$pending_products = $get_all_pending['product_id'];
		
		$get_products_order = $cp_education_class->cp_completed_orders($current_user->ID);
		$completed_list = $get_products_order['product_list'];
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		$course_html = '';
		
		if($category == '0'){
			query_posts(array(
				'posts_per_page'=> $num_fetch,
				'paged'			=> $paged,
				'post_type'   	=> 'courses',
				'post_status'	=> 'publish',
				'order'			=> 'DESC',
			));
		}else{
			query_posts(array(
				'posts_per_page'=> $num_fetch,
				'paged'	=> $paged,
				'post_type'   => 'courses',
				'tax_query' => array(
					array(
						'taxonomy' => 'courses-category',
						'field' => 'term_id',
						'terms' => $category
					)
				),
				'post_status'      => 'publish',
				'order'						=> 'DESC',
			));
		}
		
		//Course Layout
		if($layout == 'Grid'){
			$course_html .= '<div class="featured-courses row-fluid">';
			$course_counter = 0;			
			while( have_posts() ){
				the_post();
				global $post,$post_id;				
				$product_selected = '';			
				$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
				if($course_detail_xml <> ''){
					$cp_team_xml = new DOMDocument ();
					$cp_team_xml->loadXML ( $course_detail_xml );					
					$product_selected = function_library::find_xml_value($cp_team_xml->documentElement,'product_selected');			
				}
				$regular_price = get_post_meta($product_selected, '_regular_price', true);
				if($regular_price == ''){
					$regular_price = get_post_meta($product_selected, '_max_variation_regular_price', true);
				}
				$sale_price = get_post_meta($product_selected, '_sale_price', true);
				if($sale_price == ''){
					$sale_price = get_post_meta($product_selected, '_min_variation_sale_price', true);
				}
				if($sale_price == ''){
					$sale_price = $regular_price;
				}
				
				
				$sku_num = get_post_meta($product_selected, '_sku', true);
				// $currency = get_woocommerce_currency_symbol();
				$item_class = '';
				$item_div = '';
				if($course_counter % 4 == 0 ){
					$item_class = 'first';
					$item_div = '<div class="clearfix"></div>';
				}else{
					$item_class = '';
					$item_div = '';
				}$course_counter++;
				$course_html .= $item_div.'
					<div class="span3 '.$item_class.'">
						<div class="cp_course_item">
							<div class="thumb">
								<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post_id, array(570,300)).'</a>
								<div class="price"><span>'.$currency.'</span>'.$regular_price.'</div>
							</div>
							<ul class="text">
								<li class="header">
									<h4>'.esc_html(get_the_title()).'</h4>
								</li>
								<li class="course-name">
									<p>'.substr(esc_html(get_the_content()),0,25).'</p>
									<span>'.$currency.' '.$sale_price.'</span>
								</li>
								<li>';
								
								$course_html .= '</li>
								<li class="course-detail-btn">';
								
									if(!in_array($product_selected, $completed_list) && !in_array($product_selected, $pending_products)){
									}
									$course_html .= '<a href="'.esc_url(get_permalink()).'"><i class="fa fa-plus"></i>'.__('更多','crunchpress').'</a>
								</li>
							</ul>
						</div>
					</div>';
				
			}
			wp_reset_postdata();
			$course_html .= '</div>';
			wp_reset_query();
			
		}else if($layout == 'Grid Simple'){
			if($category == '0'){
				query_posts(array(
					'posts_per_page'=> $num_fetch,
					'paged'			=> $paged,
					'post_type'   	=> 'courses',
					'post_status'	=> 'publish',
					'order'			=> 'DESC',
				));
			}else{
				query_posts(array(
					'posts_per_page'=> $num_fetch,
					'paged'	=> $paged,
					'post_type'   => 'courses',
					'tax_query' => array(
						array(
							'taxonomy' => 'courses-category',
							'field' => 'term_id',
							'terms' => $category
						)
					),
					'post_status'	=> 'publish',
					'order'	=> 'DESC',
				));
			}
			$course_counter = '';
			$course_html .= '<div class="row-fluid center-align">';
			while( have_posts() ){
			the_post();
			global $post,$post_id;				
			$product_selected = '';			
			$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
			if($course_detail_xml <> ''){
				$cp_team_xml = new DOMDocument ();
				$cp_team_xml->loadXML ( $course_detail_xml );					
				$product_selected = function_library::find_xml_value($cp_team_xml->documentElement,'product_selected');			
			}
			$regular_price = get_post_meta($product_selected, '_regular_price', true);
			if($regular_price == ''){
				$regular_price = get_post_meta($product_selected, '_max_variation_regular_price', true);
			}
			$sale_price = get_post_meta($product_selected, '_sale_price', true);
			if($sale_price == ''){
				$sale_price = get_post_meta($product_selected, '_min_variation_sale_price', true);
			}
			if($sale_price == ''){
				$sale_price = $regular_price;
			}
			
			
			$sku_num = get_post_meta($product_selected, '_sku', true);
			$currency = get_woocommerce_currency_symbol();
			$item_class = '';
			$item_div = '';
			if($course_counter % 4 == 0 ){
				$item_class = 'first';
				$item_div = '<div class="clearfix"></div>';
			}else{
				$item_class = '';
				$item_div = '';
			}$course_counter++;
			$course_html .= $item_div.'
				<div class="span3 '.$item_class.'">
					<div class="our-school">
						<div class="thumb">
							<a href="'.get_permalink().'">'.get_the_post_thumbnail($post_id, array(360,300)).'</a>
						</div>
						<div class="text">
							<h4>'.esc_html(get_the_title()).'</h4>
							<p>'.substr(esc_html(get_the_content()),0,25).'</p>
							<a href="'.get_permalink().'">'.esc_attr__('Read More','crunchpress').'</a>
						</div>
					</div>
				</div>';
			}
			wp_reset_postdata();
			$course_html .= '</div>';
			wp_reset_query();
		
		}else{
		
			if($category == '0'){
				query_posts(array(
					'posts_per_page'=> $num_fetch,
					'paged'			=> $paged,
					'post_type'   	=> 'courses',
					'post_status'	=> 'publish',
					'order'			=> 'DESC',
				));
			}else{
				query_posts(array(
					'posts_per_page'=> $num_fetch,
					'paged'	=> $paged,
					'post_type'   => 'courses',
					'tax_query' => array(
						array(
							'taxonomy' => 'courses-category',
							'field' => 'term_id',
							'terms' => $category
						)
					),
					'post_status'      => 'publish',
					'order'						=> 'DESC',
				));
			}
			$course_html .= '
			<div class="customNavigation">
				<a class="btn prev"><i class="fa fa-angle-left"></i></a>
				<a class="btn next"><i class="fa fa-angle-right"></i></a>
			</div>
			<script type="text/javascript">
					jQuery(document).ready(function ($) {
						"use strict";
						if ($("#courses-'.$counter.'").length) {							
 
								var owl = $("#courses-'.$counter.'");

								owl.owlCarousel({
								  items : 4, //10 items above 1000px browser width
								  itemsDesktop : [1000,3], //3 items between 1000px and 901px
								  itemsDesktopSmall : [900,3], // betweem 900px and 601px
								  itemsTablet: [600,2], //2 items between 600 and 0
								  itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option
								});

								// Custom Navigation Events
								$(".next").click(function(){
									owl.trigger("owl.next");
								});
								$(".prev").click(function(){
									owl.trigger("owl.prev");
								});
						}
					});
				</script>
			<div class="courses_class" id="courses-'.$counter.'">';	
			$course_html .= '';
			$course_counter = 0;
			while( have_posts() ){
				the_post();
				global $post,$post_id;
				$product_selected = '';			
				$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
				if($course_detail_xml <> ''){
					$cp_team_xml = new DOMDocument ();
					$cp_team_xml->loadXML ( $course_detail_xml );					
					$product_selected = function_library::find_xml_value($cp_team_xml->documentElement,'product_selected');			
				}
				$regular_price = get_post_meta($product_selected, '_regular_price', true);
				if($regular_price == ''){
					$regular_price = get_post_meta($product_selected, '_max_variation_regular_price', true);
				}
				$sale_price = get_post_meta($product_selected, '_sale_price', true);
				if($sale_price == ''){
					$sale_price = get_post_meta($product_selected, '_min_variation_sale_price', true);
				}
				if($sale_price == ''){
					$sale_price = $regular_price;
				}
				$sku_num = get_post_meta($product_selected, '_sku', true);
				$currency = '';
				
				$course_html .= '
				
				<div class="cp_course_item">
					<div class="thumb">
						<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post_id, array(360,300)).'</a>
						<div class="price"><span>'.$currency.'</span>'.$regular_price.'</div>
					</div>
					<ul class="text">
						<li class="header">
							<h4>'.esc_html(get_the_title()).'</h4>
						</li>
						<li class="course-name">
							<p>'.substr(esc_html(get_the_content()),0,25).'</p>
							<span>'.$currency.' '.$sale_price.'</span>
						</li>
						<li class="course-detail-btn">';

							$course_html .= '<a href="'.esc_url(get_permalink()).'"><i class="fa fa-plus"></i>'.__('更多','crunchpress').'</a>
						</li>
					</ul>
				</div>';
			}
			wp_reset_postdata();
			$course_html .= '</div>';
		}
				
		wp_reset_query();
		echo $course_html;
		
	}
	
	//Function Course Topic Start
	function cp_course_topics($item_xml){ 
	
		global $counter;
		$header = find_xml_value($item_xml, 'header');
		$num_category = find_xml_value($item_xml, 'num_category');
		$category = find_xml_value($item_xml, 'category');
		
		$num_excerpt = find_xml_value($item_xml, 'num_excerpt');
		$pagination = find_xml_value($item_xml, 'pagination');
		$filterable_course = find_xml_value($item_xml, 'filterable_course');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$html_topic = '';
		if($filterable_course == 'Yes'){
			$num_fetch = '-1';
			$html_topic .= '
			<script type="text/javascript">
				jQuery(window).load(function() {
					var filter_container = jQuery("#course-item-holder-'.$counter.'");

					filter_container.children().css("position","absolute");	
					filter_container.masonry({
						singleMode: true,
						itemSelector: ".course-item:not(.hide)",
						animate: true,
						animationOptions:{ duration: 800, queue: false }
					});	
					jQuery(window).resize(function(){
						var temp_width =  filter_container.children().filter(":first").width() + 20;
						filter_container.masonry({
							columnWidth: temp_width,
							singleMode: true,
							itemSelector: ".course-item:not(.hide)",
							animate: true,
							animationOptions:{ duration: 800, queue: false }
						});		
					});	
					jQuery("ul#course-item-filter-'.$counter.' a").click(function(e){	

						jQuery(this).addClass("active");
						jQuery(this).parents("li").siblings().children("a").removeClass("active");
						e.preventDefault();
						
						var select_filter = jQuery(this).attr("data-value");
						
						if( select_filter == "All" || jQuery(this).parent().index() == 0 ){		
							filter_container.children().each(function(){
								if( jQuery(this).hasClass("hide") ){
									jQuery(this).removeClass("hide");
									jQuery(this).fadeIn();
								}
							});
						}else{
							filter_container.children().not("." + select_filter).each(function(){
								if( !jQuery(this).hasClass("hide") ){
									jQuery(this).addClass("hide");
									jQuery(this).fadeOut();
								}
							});
							filter_container.children("." + select_filter).each(function(){
								if( jQuery(this).hasClass("hide") ){
									jQuery(this).removeClass("hide");
									jQuery(this).fadeIn();
								}
							});
						}
						
						filter_container.masonry();	
						
					});
				});
			</script>';
		}
		$cat_icon = '';
		$html_topic .= '
		<!--COURSES TOPIC SECTION START-->
        <div class="gray-bg tabs-section">
            <div class="course-tabs">';
               if($filterable_course == 'Yes'){
					$html_topic .= '<!-- Nav tabs -->
					<ul id="course-item-filter-'.$counter.'" class="nav nav-tabs">
						<li><a data-value="all" class="cp-button active" href="#"><i class="fa fa-list"></i>'. __("All","crunchpress").'</a></li>';					
						$categories = get_categories( array('child_of' => $category, 'taxonomy' => 'courses-category') );
						if($categories <> ""){
							foreach($categories as $values){
								$cat_icon = get_option("taxonomy_".$values->term_id);
								if($cat_icon == ''){
									$cat_icon = 'fa fa-lock';
								}else{
									$cat_icon = $cat_icon['custom_field'];
								}
								$html_topic .= '<li><a data-value="'.$values->term_id.'" class="cp-button" href="#"><i class="'.$cat_icon.'"></i>'.$values->name.'</a></li>';
							}
						}
					$html_topic .= '</ul>';
				}else{
					$html_topic .= '<!-- Nav tabs -->
					<ul id="course-item-filter-'.$counter.'" class="nav nav-tabs">';
						$categories = get_categories( array('child_of' => $category, 'taxonomy' => 'courses-category') );
						if($categories <> ""){
							foreach($categories as $values){
								$cat_icon = get_option("taxonomy_".$values->term_id);
								if($cat_icon == ''){
									$cat_icon = 'fa fa-lock';
								}else{
									$cat_icon = $cat_icon['custom_field'];
								}
								$html_topic .= '<li id="'.$values->term_id.'"><a onclick="cat_ajax_get('.$values->term_id.');" class="'.$values->slug.' ajax cp-button"><i class="'.$cat_icon.'"></i>'.$values->name.'</a></li>';
							}
						}
					$html_topic .= '</ul>';
					$html_topic .= '<script>
						function cat_ajax_get(catID) {
							jQuery("a.ajax").removeClass("current");
							jQuery("a.ajax").addClass("current"); //adds class current to the category menu item being displayed so you can style it with css
							jQuery("#course_animation_load").show();
							jQuery("#course_item_list").hide();
							jQuery("#readmore_btn").hide();
							var ajaxurl = "'.admin_url( 'admin-ajax.php' ).'";
							jQuery.ajax({
								type: "POST",
								url: ajaxurl,
								data: {"action": "load-filter", cat: catID },
								success: function(response) {
									jQuery("#course_item_list").html(response);
									jQuery("#course_item_list").show();
									jQuery("#readmore_btn").show();
									jQuery("#course_animation_load").hide();
									return false;
								}
							});
						}
					</script>';
				}
				if($filterable_course == 'Yes'){
					$html_topic .= '<!-- Tab panes -->
					<div id="course-item-holder-'.$counter.'" class="cp_course_container">';
				}else{
					$html_topic .= '<!-- Tab panes -->
					<div id="course_item_list" class="cp_course_container">';
				}
				if($category == '0'){
					query_posts(
						array( 
						'post_type' => 'courses',
						'posts_per_page'			=> $num_fetch,
						'orderby' => 'title',
						'order' => 'ASC' )
					);
				}else{
					query_posts(
						array( 
						'post_type' => 'courses',
						'posts_per_page'			=> $num_fetch,
						'tax_query' => array(
							array(
								'taxonomy' => 'courses-category',
								'terms' => $category,
								'field' => 'term_id',
							)
						),
						'orderby' => 'title',
						'order' => 'ASC' )
					);
				}
				while( have_posts() ){
					the_post();	
					global $post,$post_id;
					$product_selected = '';			
					$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
					if($course_detail_xml <> ''){
						$cp_team_xml = new DOMDocument ();
						$cp_team_xml->loadXML ( $course_detail_xml );					
						$product_selected = function_library::find_xml_value($cp_team_xml->documentElement,'product_selected');			
					}
					$regular_price = get_post_meta($product_selected, '_regular_price', true);
					if($regular_price == ''){
						$regular_price = get_post_meta($product_selected, '_max_variation_regular_price', true);
					}
					$sale_price = get_post_meta($product_selected, '_sale_price', true);
					if($sale_price == ''){
						$sale_price = get_post_meta($product_selected, '_min_variation_sale_price', true);
					}
					if($sale_price == ''){
						$sale_price = $regular_price;
					}
					$sku_num = get_post_meta($product_selected, '_sku', true);
					$currency = get_woocommerce_currency_symbol();
					$html_topic .= '
					<div id="cp_course-'.$post->ID.'" class="course-box all course-item item alpha '; 
					$categories = get_the_terms( $post->ID, 'courses-category' );
					if($categories <> ''){
						foreach ( $categories as $category ) {
							$html_topic .= $category->term_id." ";
						}
					}
					$html_topic .= '">
						<div class="thumb">
							<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post_id, array(350,350)).'</a>
						</div>
						<div class="text">
							<h4><a href="'.esc_url(get_permalink()).'">'.substr(esc_attr(get_the_title()),0,18).'</a></h4>
							<p>'.substr(esc_html(get_the_content()),0,30).'</p>
							<span>'.$currency.' '.$sale_price.'</span>
						</div>
					</div>';
				}	
				wp_reset_postdata();
                $html_topic .= '</div>
				<div class="clearfix clear"></div>
				<div id="course_animation_load"></div>
				<div id="readmore_btn" class="center-align">
				'.do_shortcode('[3dbutton icon="fa-long-arrow-right" size="medium" link="'.get_term_link( $values ).'" backgroundcolor="#00a685" target="_blank" textcolor="#ffffff"]View More[/3dbutton]').'
				</div>
            </div>
        </div>
        <!--COURSES TOPIC SECTION END-->';
		
		wp_reset_query();
		echo $html_topic;

	} //Function Course Topic Ends
	
	
	public function cp_load_courses_by_cat () {
		$cat_id = sanitize_text_field($_POST[ 'cat' ]);
	   
		$args = array( 
			'post_type' => 'courses',
			'posts_per_page'=> -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'courses-category',
					'terms' => $cat_id,
					'field' => 'term_id',
				)
			),
			'orderby' => 'title',
			'order' => 'ASC' );
		

		$posts = get_posts( $args );
				global $post;

		ob_start ();

		foreach ( $posts as $post ) {
		setup_postdata( $post ); 

		global $post,$post_id;
		$product_selected = '';			
		$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
		if($course_detail_xml <> ''){
			$cp_team_xml = new DOMDocument ();
			$cp_team_xml->loadXML ( $course_detail_xml );					
			$product_selected = find_xml_value($cp_team_xml->documentElement,'product_selected');			
		}
		$regular_price = get_post_meta($product_selected, '_regular_price', true);
		if($regular_price == ''){
			$regular_price = get_post_meta($product_selected, '_max_variation_regular_price', true);
		}
		$sale_price = get_post_meta($product_selected, '_sale_price', true);
		if($sale_price == ''){
			$sale_price = get_post_meta($product_selected, '_min_variation_sale_price', true);
		}
		if($sale_price == ''){
			$sale_price = $regular_price;
		}
		$sku_num = get_post_meta($product_selected, '_sku', true);
		$currency = get_woocommerce_currency_symbol();
		echo  '
		<div id="cp_course-'.$post->ID.'" class="course-box all course-item item alpha '; 
		$categories = get_the_terms( $post->ID, 'courses-category' );
		if($categories <> ''){
			foreach ( $categories as $category ) {
				echo $category->term_id." ";
			}
		}
		echo '">
			<div class="thumb">
				<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post_id, array(350,350)).'</a>
			</div>
			<div class="text">
				<h4><a href="'.esc_url(get_permalink()).'">'.substr(esc_html(get_the_title()),0,15).'</a></h4>
				<p>'.substr(esc_html(get_the_content()),0,30).'</p>
				<span>'.$currency.' '.$sale_price.'</span>
			</div>
		</div>';
	
		} 
		wp_reset_postdata();
		
		// echo '<div id="readmore_btn" class="center-align">
		// '.do_shortcode('[3dbutton icon="fa-long-arrow-right" size="medium" link="'.get_term_link( (int)$cat_id, 'course-category').'" backgroundcolor="#00a685" target="_blank" textcolor="#ffffff"]View More[/3dbutton]').'
		// </div>';
		$response = ob_get_contents();
		ob_end_clean();

		echo $response;
		die(1);
		
	}
	
		
	public function print_course_thumbnail( $postid, $item_size ){
		global $counter;
		
		//Get Post Meta Options
		$img_html = '';
		$thumbnail_types = '';
		$video_url_type = '';
		$select_slider_type = '';
		$course_detail_xml = get_post_meta($postid, 'course_detail_xml', true);
		if($course_detail_xml <> ''){
			$cp_post_xml = new DOMDocument ();
			$cp_post_xml->loadXML ( $course_detail_xml );
			$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
			$audio_url_type = find_xml_value($cp_post_xml->documentElement,'audio_url_type');
			$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
			$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');			
			//Print Image
			
			if( $thumbnail_types == "Image"){
				if(get_the_post_thumbnail($postid, $item_size) <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . get_the_post_thumbnail($postid, $item_size);
					$img_html = $img_html . '</div>';
				}
				//echo '<div class="mask"><a href="'.get_permalink().'"#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a><a href="'. get_permalink().'" class="anchor"> <i class="fa fa-link"></i></a></div>';
			}else if( $thumbnail_types == "Video" ){
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
			}else if ( $thumbnail_types == "Slider" ){
				//Print Slider
				$slider_xml = get_post_meta( intval($select_slider_type), 'cp-slider-xml', true); 				
				if($slider_xml <> ''){
					$slider_xml_dom = new DOMDocument();
					$slider_xml_dom->loadXML($slider_xml);
					$slider_name='bxslider'.$counter.$postid;
					$audio_counter = $counter.$postid;
					//Included Anything Slider Script/Style
					wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
					wp_enqueue_script('cp-bx-slider');	
					wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
					//Inline Style for Slider Width
					if(cp_get_width($item_size) == '175'){
						$img_html = "<style>#'". $slider_name."'{width:'".cp_get_width($item_size)."'px;height:'".cp_get_height($item_size)."'px;float:left;}</style>";
					}else{
						$img_html = "<style>#'". $slider_name."'{width:100%;height:350px;float:left;}</style>";
					}
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . print_bx_slider($slider_xml_dom->documentElement, $item_size,$slider_name);
					$img_html = $img_html . '</div>';
				}
			}else if($thumbnail_types == "Audio"){ 
				if($audio_url_type <> '' ){
				$audio_counter = $counter.$postid;
					//Jplayer Music Started	
					$img_html =  '<div class="audio_player song-list">';
					$audio_html = '';
					if(strpos($audio_url_type,'soundcloud')){
						$img_html = $img_html . get_audio_track($audio_url_type,$audio_counter);
					}else{
						$img_html = $img_html . get_audio_track($audio_url_type,$audio_counter) . get_the_post_thumbnail($postid, $item_size);
					}
					$img_html = $img_html . '</div>';
				} // No MP3 Song
			}else{				
				if(get_the_post_thumbnail($postid, $item_size) <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . get_the_post_thumbnail($postid, $item_size);
					$img_html = $img_html . '</div>';
				}
			}
		}
		return $img_html;
	}
	
	
	public function print_lesson_thumbnail( $postid, $item_size ){
		global $counter;
		
		//Get Post Meta Options
		$img_html = '';
		$thumbnail_types = '';
		$video_url_type = '';
		$select_slider_type = '';
		$lesson_detail_xml = get_post_meta($postid, 'lesson_detail_xml', true);
		if($lesson_detail_xml <> ''){
			$cp_post_xml = new DOMDocument ();
			$cp_post_xml->loadXML ( $lesson_detail_xml );
			$thumbnail_types = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
			$audio_url_type = find_xml_value($cp_post_xml->documentElement,'audio_url_type');
			$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
			$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');			
			//Print Image
			
			if( $thumbnail_types == "Image"){
				if(get_the_post_thumbnail($postid, $item_size) <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . get_the_post_thumbnail($postid, $item_size);
					$img_html = $img_html . '</div>';
				}
				//echo '<div class="mask"><a href="'.get_permalink().'"#comments" class="anchor"><span> </span> <i class="fa fa-comment"></i></a><a href="'. get_permalink().'" class="anchor"> <i class="fa fa-link"></i></a></div>';
			}else if( $thumbnail_types == "Video" ){
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
			}else if ( $thumbnail_types == "Slider" ){
				//Print Slider
				$slider_xml = get_post_meta( intval($select_slider_type), 'cp-slider-xml', true); 				
				if($slider_xml <> ''){
					$slider_xml_dom = new DOMDocument();
					$slider_xml_dom->loadXML($slider_xml);
					$slider_name='bxslider'.$counter.$postid;
					$audio_counter = $counter.$postid;
					//Included Anything Slider Script/Style
					wp_register_script('cp-bx-slider', CP_PATH_URL.'/frontend/js/bxslider.min.js', false, '1.0', true);
					wp_enqueue_script('cp-bx-slider');	
					wp_enqueue_style('cp-bx-slider',CP_PATH_URL.'/frontend/css/bxslider.css');
					//Inline Style for Slider Width
					if(cp_get_width($item_size) == '175'){
						$img_html = "<style>#'". $slider_name."'{width:'".cp_get_width($item_size)."'px;height:'".cp_get_height($item_size)."'px;float:left;}</style>";
					}else{
						$img_html = "<style>#'". $slider_name."'{width:100%;height:350px;float:left;}</style>";
					}
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . print_bx_slider($slider_xml_dom->documentElement, $item_size,$slider_name);
					$img_html = $img_html . '</div>';
				}
			}else if($thumbnail_types == "Audio"){ 
				if($audio_url_type <> '' ){
				$audio_counter = $counter.$postid;
					//Jplayer Music Started	
					$img_html =  '<div class="audio_player song-list">';
					$audio_html = '';
					if(strpos($audio_url_type,'soundcloud')){
						$img_html = $img_html . get_audio_track($audio_url_type,$audio_counter);
					}else{
						$img_html = $img_html . get_audio_track($audio_url_type,$audio_counter) . get_the_post_thumbnail($postid, $item_size);
					}
					$img_html = $img_html . '</div>';
				} // No MP3 Song
			}else{				
				if(get_the_post_thumbnail($postid, $item_size) <> ''){
					$img_html = '<div class="post_featured_image thumbnail_image">';
					$img_html = $img_html . get_the_post_thumbnail($postid, $item_size);
					$img_html = $img_html . '</div>';
				}
			}
		}
		return $img_html;
	}

	public function related_courses($course_id="",$num_fetch=""){

		//Fetch Categories
		$category = wp_get_post_terms($course_id, 'courses-category', array("fields" => "all"));		
		$related_cp = '';
		$paged = '';
		if(!empty($category)){
			$category_name = $category[0]->name;
			$category = $category[0]->term_id;
			query_posts(array(
				'posts_per_page'=> $num_fetch,
				'paged'	=> $paged,
				'post_type'   => 'courses',
				'post__not_in' => array( $course_id ) ,
				'tax_query' => array(
					array(
						'taxonomy' => 'courses-category',
						'field' => 'term_id',
						'terms' => $category
					)
				),
				'post_status'      => 'publish',
				'order'						=> 'DESC',
			));
		
			if(have_posts()){
				$related_cp .= '<!--RELATED COURSES START-->
				<div class="related-courses">
					<h2>'.$category_name.'</h2>
					<ul>';
						while( have_posts() ){
							the_post();
							global $post;
								$related_cp .= '
								<!--LIST ITEM START-->
								<li>
									<div class="thumb">
										<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, array(80,80)).'</a>
									</div>
									<div class="text">
										<h4>'.substr(esc_html(get_the_title()),0,22).'</h4>
										<p>'.get_the_date().'</p>
									</div>
								</li>
								<!--LIST ITEM END-->';
						}
						wp_reset_postdata();						
				$related_cp .= '
					</ul>
				</div>
				<!--RELATED COURSES END-->';
			}
			wp_reset_query();
		}

		return $related_cp;

	}

	public function get_course_lessons($course=''){

		$lesson_argu = array(
			'posts_per_page'=> -1,
			'post_type'   => 'lessons',
			'meta_query' => array(
				array(
					'key' => 'course_selected',
					'value' => $course,
					'compare' => '='
				)
			),
			'meta_key' => 'lesson_order',
			'orderby' => 'meta_value_num date',
			'order' => 'ASC',
			'suppress_filters' => 0,
			'post_status' => 'publish',
		);
		$course_lesson = '';
		$lesson_loop = new WP_Query($lesson_argu);
		if($lesson_loop->have_posts()){
			while ( $lesson_loop->have_posts() ) : 
				$lesson_loop->the_post();
				global $post;
				$cp_thumbnail_html = '';
				$cp_thumbnail = get_the_post_thumbnail($post->ID,array(150,150));
				if($cp_thumbnail <> ''){
					$cp_thumbnail_html = '
					<div class="thumb">
						<a href="'.esc_url(get_permalink()).'">'.$cp_thumbnail.'<i class="fa fa-play-circle"></i></a>
					</div>';
				}
				$course_lesson .= '
					<!--lesson video start-->
					<div class="lesson-vid">
						'.$cp_thumbnail_html.'
						<div class="text">
							<h4><a href="'.esc_url(get_permalink()).'">'.esc_html(get_the_title()).'</a></h4>
							<p>'.substr(esc_html(get_the_content()),0,255).'</p>
						</div>
					</div>
					<!--lesson video end-->';
			endwhile; //End Foreach loop
			//End Reset Postdata
			wp_reset_postdata();
		}//End condition
		
		return $course_lesson;

	}
	
	public function get_course_id_of_lessons(){
	
		$lesson_argu = array(
			'posts_per_page'=> -1,
			'post_type'   => 'lessons',			
			'post_status' => 'publish',
		);
		$course_selected = array();
		$lesson_loop = new WP_Query($lesson_argu);
		if($lesson_loop->have_posts()){
			while ( $lesson_loop->have_posts() ) : 
				$lesson_loop->the_post();
				global $post;
				$course_selected[] = get_post_meta($post->ID,'course_selected',true);
			endwhile; //End Foreach loop
			//End Reset Postdata
			wp_reset_postdata();
		}//End condition

		return array_filter($course_selected);

	}
	
	
	public function cp_get_approved_product($lesson=''){
	
		$course_selected = get_post_meta($lesson, 'course_selected', true);
		$product_selected = '';
		// Get Post Meta Elements detail 
		$course_detail_xml = get_post_meta($course_selected, 'course_detail_xml', true);
		if($course_detail_xml <> ''){
			$cp_course_xml = new DOMDocument ();
			$cp_course_xml->loadXML ( $course_detail_xml );			
			$product_selected = find_xml_value($cp_course_xml->documentElement,'product_selected');
		}
		
		return $product_selected;
		
	}
	
	public function cp_get_course_product_id(){
		
		$courses_ids = $this->get_course_id_of_lessons();
		foreach($courses_ids as $course){
			$product_id[] = get_post_meta($course,'product_selected',true);
		}
		
		return $product_id;
	}	
		
	//Lesson Question
	public function get_lesson_question($lesson_id=''){
		global $current_user;
		

		$html = '';
		$quizzes = array();
		if ( 0 < $lesson_id ) {
			$education_portal =  new education_portal;
			$quizzes = $education_portal->lesson_quizzes( $lesson_id, 'any' );
		}

		if ( $quizzes ) {
			foreach ( $quizzes as $quiz ) {
				$quiz_id = $quiz->ID;
				break;
			}
		}
		
		//$quiz_id = 0;
		$post_status = 'any';
		$orderby = 'meta_value_num title';
		$order = 'ASC';
		$questions = array();

		$quiz_id = (string) $quiz_id;
		// Get all questions and multiple questions
		$post_args = array(
			'post_type' 		=> array( 'question', 'multiple_question' ),
			'numberposts' 		=> -1,
			'meta_key'        	=> '_quiz_question_order' . $quiz_id,
			'orderby'         	=> $orderby,
			'order'           	=> $order,
			'meta_query'		=> array(
				array(
					'key'       => '_quiz_id',
					'value'     => $quiz_id,
				)
			),
			'post_status'		=> $post_status,
			'suppress_filters' 	=> 0
		);
		$questions_array = get_posts( $post_args );

		// Set return array to initially include all items
		$questions = $questions_array;
		
		$html .= '<div class="question">';
		wp_register_script('contact-validation', CP_PATH_URL.'/frontend/js/jquery.validate.js', false, '1.0', true);
		wp_enqueue_script('contact-validation');
		$html .= '
		<script>
			jQuery(document).ready(function($) {
				var textboxes  = $("#quiz_form_element").find(".css-checkbox").attr("name");
				$("#quiz_form_element").validate({
					errorElement:"span",
					
				});
				
			});
		</script>
		<h3>'. __('Questions','crunchpress').'</h3>';
			$html .= '<form id="quiz_form_element" action="" method="POST" enctype="multipart/form-data">';
				$question_counter = 0;
				foreach($questions as $question){
					//setup_postdata($question);
					$question_id = $question->ID;
					$question_counter++;
					
					$wrong_answers = get_post_meta($question->ID,'_question_wrong_answers',true);
					$right_answer = get_post_meta($question->ID,'_question_right_answer',true);
					$question_grade = get_post_meta($question->ID,'_question_grade',true);
					$wrong_answer_count = get_post_meta($question->ID,'_wrong_answer_count',true);
					$question_media = get_post_meta($question->ID,'_question_media',true);
					$random_order = get_post_meta($question->ID,'_random_order',true);
					
					$answers = array();
					$question_type = '';
					$question_types = wp_get_post_terms( $question->ID, 'question-type', array( 'fields' => 'names' ) );
					
					// Calculate total wrong answers available (defaults to 4)
					$total_wrong = 0;
					if( $question_id ) {
						$total_wrong = get_post_meta( $question_id, '_wrong_answer_count', true );
					}
					$question_class = '';
					if( 0 == intval( $total_wrong ) ) {
						$total_wrong = 4;
					}
					$counter_type = 0;
					$counter_main = 0;
					foreach($question_types as $question_type){
						$counter_type++;
						$counter_main++;										
						switch ( $question_type ) {
							//Multiple Choice
							case 'multiple-choice':
								
								//Multiple Choice Questions
								$question_category = get_post_meta( $question->ID, 'category', true );
								//$question_cat = get_term( $question_category, 'question-category' );

								$question_number = get_post_meta( $question->ID, 'number', true );
								$question_increment = $question_number;

								//$multiple_data = array( $question_cat->name, $question_number );
								$wrong_answers = get_post_meta($question->ID,'_question_wrong_answers',true);
								$right_answer = get_post_meta($question->ID,'_question_right_answer',true);
								$question_grade = get_post_meta($question->ID,'_question_grade',true);
								$wrong_answer_count = get_post_meta($question->ID,'_wrong_answer_count',true);
								$question_media = get_post_meta($question->ID,'_question_media',true);
								$random_order = get_post_meta($question->ID,'_random_order',true);
											
								$answer_covert_array = array(0=>$right_answer);
								$question_array = array_merge($wrong_answers,$answer_covert_array);
								shuffle($question_array);
								$html .= '<div class="questions-area">
										<div class="questions">
											<p>'.$question->post_title.'</p>';
								//echo '<h3>'.$question->post_title.'</h3>';
								
								$question_count = 0;
								
								foreach($question_array as $multiple_question){
									$education_portal = new education_portal;
									$all_answers = $education_portal->get_answer_id($multiple_question);
									$right_answer_cp = $education_portal->get_answer_id($right_answer);
									$html .= '
										<div class="css-checkbox-form">
											<label for="question_'.$question_count.$question->ID.'" class="css-label-cp">'.$multiple_question.'</label>
											<input value="'.$education_portal->get_answer_id($multiple_question).'" id="question_'.$question_count.$question->ID.'" class="css-checkbox-cp required" type="radio" name="multiple_'.$question->ID.'" />
										</div>	
									';
									$question_count++;
									$question_count_old = $question_count;
								}
								$html .= '</div>
									</div>';
								
							break;
							
							//Boolean
							case 'boolean':
							$html .= '<div class="questions-area">
								<div class="questions">
									<p>'.$question->post_title.'</p>
										<div class="css-checkbox-form">
											<label for="question_1'.$question->ID.'" class="css-label-cp">'.__('True','crunchpress').'</label>
											<input value="1" id="question_1'.$question->ID.'" class="css-checkbox-cp" type="radio" name="boolean_'.$question->ID.'" />
										</div>	
										<div class="css-checkbox-form">
											<input value="0" id="question_2'.$question->ID.'" class="css-checkbox-cp" type="radio" name="boolean_'.$question->ID.'" />
											<label for="question_2'.$question->ID.'" class="css-label-cp">'.__('False','crunchpress').'</label>
										</div>
								</div></div>';
							break;
							
							
							//Fill in the Blanks
							case 'gap-fill':
								$right_answer_array = explode( '|', $right_answer );
								if ( isset( $right_answer_array[0] ) ) { $gapfill_pre = $right_answer_array[0]; } else { $gapfill_pre = ''; }
								if ( isset( $right_answer_array[1] ) ) { $gapfill_gap = $right_answer_array[1]; } else { $gapfill_gap = ''; }
								if ( isset( $right_answer_array[2] ) ) { $gapfill_post = $right_answer_array[2]; } else { $gapfill_post = ''; }
							
							$html .= '<div class="questions-area blanks">
									<p>'.$gapfill_pre.'<input type="text" class="required" name="blanks_'.$question->ID.'" value="">'.$gapfill_post.'</p>
								</div>';
							break;
							
							//Multi Line
							case 'multi-line':
							$html .= '<div class="questions-area multi-line">
										<p>'.$question->post_title.'</p>
										<textarea name="question_area_'.$question->ID.'" class="required input-block-level"></textarea>
										
									</div>';
							break;
							
							//Single Line
							case 'single-line':
								$html .= '<div class="questions-area single-line">
										<p>'.$question->post_title.'</p>
										<input type="text" name="single_line_'.$question->ID.'" value="" class="required input-block-level">
										
									</div>';
							break;
							
							//File Upload
							case 'file-upload':
							
							break;
						} //Switch Condition Ends	
					
					} // Question Type End Here
						
				} //Question loop Ends
				
				wp_reset_query();
				wp_reset_postdata();
				
				$html .= '<input type="hidden" value="quiz_submit" name="quiz_submit" />';
				$html .= '<input type="submit" value="submit" class="btn-submit" />';
			$html .= '</form>'; //Form Div Ends
		$html .= '</div>'; //Question Div Ends
			
			$quiz_answers = '';
			//Check if Quiz is Submitted
			if(isset($_POST['quiz_submit'])){
				
				foreach($_REQUEST as $keys=>$values){
					$quiz_answers = $quiz_answers . function_library::create_xml_tag($keys,$values);
					$question_id = preg_replace("/[^0-9,.]/", "", $keys);
					if($question_id <> ''){
						$quiz_answers = $quiz_answers . function_library::create_xml_tag('question_id',$question_id);
					}
					$$keys = $values;
				}
				
				$quiz_answers = $quiz_answers . function_library::create_xml_tag('user_id',$current_user->ID);
			}
			//Fire the Function to save value
			if(isset($quiz_submit)){
						
				$new_data_quiz = '<quiz_detail>';				
				$new_data_quiz = $new_data_quiz . $quiz_answers;
				$new_data_quiz = $new_data_quiz . '</quiz_detail>';
				//Saving Sidebar and Social Sharing Settings as XML
				$old_data = get_post_meta($lesson_id, 'quiz_detail_'.$current_user->ID,true);
				function_library::save_meta_data($lesson_id, $new_data_quiz, $old_data, 'quiz_detail_'.$current_user->ID);
				$this->save_user_meta_by_lesson_id($lesson_id,$current_user->ID);
				
				$new_user = array();								
				$course_subscriber = get_option('_course_subscriber');
				if(is_serialized($course_subscriber)){
					$course_subscriber = maybe_unserialize(get_option('_course_subscriber'));
					$new_subscriber_id = array('0'=>$current_user->ID);
					$new_subscriber_data = array_merge($course_subscriber,$new_subscriber_id);
					foreach($new_subscriber_data as $val){
						$subscriber_data[] = $val;
					}
					$sub_data = array_unique($subscriber_data);
					save_option('_course_subscriber', get_option('_course_subscriber'), maybe_serialize($sub_data));
				}else{
					save_option('_course_subscriber', get_option('_course_subscriber'), maybe_serialize(array('0'=>$current_user->ID)));
				}				
				$html = '<h3>Your Quiz is submitted successfully!</h3>';
				//wp_redirect( get_permalink($lesson_id) );
			}
		//Return HTML
		return $html;
		
	} // End Get Lesson Function here
	
	function save_user_meta_by_lesson_id($lesson_id='',$user=''){
		$lesson_author_loop = unserialize(get_the_author_meta( '_lesson_id', $user ));
		if(!empty($lesson_author_loop)){
			$new_lesson_id = array(0=>$lesson_id);
			$new_lesson_data = array_merge($lesson_author_loop,$new_lesson_id);
			foreach($new_lesson_data as $val){
				$lesson_data[] = $val;
			}
			$lesson_data = array_unique($lesson_data);
			update_user_meta( $user, '_lesson_id', serialize( $lesson_data ));	
		}else{
			update_user_meta( $user, '_lesson_id', serialize( array($lesson_id) ));	
		}
	}
	
	
	//Profile Builder	
	private $user_id_being_edited, $avatar_upload_error, $remove_nonce;

	public $options;        

	public function unique_filename_callback( $dir, $name, $ext ) {
		$user = get_user_by( 'id', (int) $this->user_id_being_edited ); 
		$name = $base_name = sanitize_file_name( $user->display_name . '_avatar_' . time() );
		// ensure no conflicts with existing file names
		$number = 1;
		while ( file_exists( $dir . "/$name$ext" ) ) {
			$name = $base_name . '_' . $number;
			$number++;
		}

		return $name . $ext;
	}
	
	private function cp_add_new_user_avatar($attach_id, $user_id){
		$this->cp_avatar_delete( $user_id, $attach_id );   // delete old images if successful
		if($attach_id <> ''){
			update_user_meta( $user_id, 'cp_avatar', esc_attr($attach_id) );   // save user information (overwriting old)
		}
	}
	
	public function cp_avatar_delete($user_id,$attach_id){
		$old_attach_id = get_user_meta( $user_id, 'cp_avatar', true );
		if($old_attach_id == $attach_id){
			$this->avatar_upload_error = 'Image Already Exists.';
		}else{
			delete_user_meta( $user_id, 'cp_avatar' );
		}
	}

	public function edit_user_profile_update( $file , $user_id ) {
		
		if(isset($file['file'])){
			$_FILES['cp_user_avatar'] = $file['file'];
		}
		// check for uploaded files
		if ( ! empty( $_FILES['cp_user_avatar']['name'] ) ) :
			// front end (theme my profile etc) support
			if ( ! function_exists( 'wp_handle_upload' ) ){
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
			}	
			$this->user_id_being_edited = $user_id; // make user_id known to unique_filename_callback function
			$avatar = wp_handle_upload( $_FILES['cp_user_avatar'], array(
				'mimes'                     => array(
					'jpg|jpeg|jpe'  => 'image/jpeg',
					'gif'           => 'image/gif',
					'png'           => 'image/png',
				),
				'test_form'                 => false,
				'unique_filename_callback'  => array( $this, 'unique_filename_callback' )
			) );
			if ( empty($avatar['file']) ) {     // handle failures
				switch ( $avatar['error'] ) {
					case 'File type does not meet security guidelines. Try another.' :
						$this->avatar_upload_error = __('Please upload a valid image file for the avatar.','crunchpress');
						break;
					default :
						$this->avatar_upload_error = '<strong>' . __('There was an error uploading the avatar:','crunchpress') . '</strong> ' . esc_html( $avatar['error'] );
				}

				return;
			}
			$filename = $avatar['file'];
			//Get Filetype
			$filetype = wp_check_filetype( basename( $avatar['file'] ), null );
			
			$post_id = isset( $_REQUEST['post_id'] ) ? intval( $_REQUEST['post_id'] ) : 0;
			
			// Check the type of tile. We'll use this as the 'post_mime_type'.
			$filetype = wp_check_filetype( basename( $filename ), null );

			// Get the path to the upload directory.
			$wp_upload_dir = wp_upload_dir();

			// Prepare an array of post data for the attachment.
			$attachment = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			);

			// Insert the attachment.
			$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );

			// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
			require_once( ABSPATH . 'wp-admin/includes/image.php' );

			// Generate the metadata for the attachment, and update the database record.
			$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			wp_update_attachment_metadata( $attach_id, $attach_data );
			
			
			//$this->assign_new_user_avatar( $avatar['url'], $user_id );
			$this->cp_add_new_user_avatar( $attach_id, $user_id );
		endif;

	} //Profile Builder
	
	//Cp Get Only Field Data
	function cp_get_user_feild_data($lesson_id){
		global $current_user;
		$quiz_answered = array();
		$get_quiz = get_post_meta($lesson_id, 'quiz_detail_'.$current_user->ID,true);
		$index = '';
		
		$p = xml_parser_create();
		xml_parse_into_struct($p, $get_quiz, $vals, $index);
		xml_parser_free($p);
		
		$ui_element = array();
		$question = array();
		$user = '';
		
		foreach($vals as $v){
		
			if($v['type'] == 'open' || $v['type'] == 'close' || $v['value'] == 'take_quiz' || $v['value'] == 'quiz_submit' || $v['tag'] == 'LESSONS'){
				
			}elseif($v['tag'] == 'USER_ID'){
				$user = $v['value'];
			}else{
				if($v['tag'] == 'QUESTION_ID'){
					$question[] = $v['value'];
					//echo '<pre>';print_R($v);
				}else{
					$ui_element[$v['tag']] = $v['value'];
					//echo '<pre>';print_R($v);
				}
			}
				
		}
		
		return array('question'=>$question,'ui_element'=>array_filter($ui_element),'user'=>$user);
	}
	
	function cp_get_all_user_answered($lesson_id){
		$data = $this->cp_get_user_feild_data($lesson_id);
		$data_element = array_filter($data['ui_element']);
		$total_count = count($data['question']);
		
		
		for($i=0;$i<$total_count;$i++){
			echo $id = $data['question'][$i];

		}
		
	}
	
	function cp_get_value_by_key($key='',$lesson=''){
		global $current_user;
		$quiz_val = '';
		$cp_quiz_xml = get_post_meta($lesson, 'quiz_detail_'.$current_user->ID,true);
		if($cp_quiz_xml <> ''){
			$cp_quiz = new DOMDocument ();
			$cp_quiz->preserveWhiteSpace = FALSE;
			$cp_quiz->loadXML ( $cp_quiz_xml );
			$quiz_val = find_xml_value($cp_quiz->documentElement,$key);
		}
		return $quiz_val;
	}
	
	
	function get_full_quiz_score($user=''){
		if(function_exists('wc_get_order_statuses')){
			$product_id = $this->cp_get_course_product_id();
			
			$get_products_order = $this->cp_completed_orders($user);
			$product_list = $get_products_order['product_list'];;
			if(empty($product_list)){
				$product_list = array();
			}						
			
			$html_user = '';
			$lessons = unserialize(get_the_author_meta( '_lesson_id', $user ));
			if(!empty($lessons)){
				foreach($lessons as $lesson_id){
				$product_id = $this->cp_get_approved_product($lesson_id);
					if($lesson_id != '' AND in_array( $product_id, $product_list )){
					$html_user .= '<h2>'.esc_html(get_the_title($lesson_id)).' - Quiz Result</h2>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
								<td>'.__('Type','crunchpress').'</td>
								<td class="text_field_title">'.__('Student','crunchpress').'</td>
								<td>'.__('Grade','crunchpress').'</td>
								<td>'.__('Score','crunchpress').'</td>
							</tr>
						</thead>
						<tbody>';
					
						//$cp_get_user_feild_data = cp_get_user_feild_data($lesson_id);
						$data = $this->cp_get_user_feild_data($lesson_id);
						
						// $cp_get_user_data = cp_get_user_data($lesson_id);
						// $cp_get_user_data = cp_get_quiz_id($cp_get_user_data);		
						foreach($data['question'] as $id){
							//echo $cp_get_user_feild_data['multiple_'.$id];
							$right_answer = get_post_meta($id,'_question_right_answer',true);
							$question_types = wp_get_post_terms( $id, 'question-type', array( 'fields' => 'names' ) );
							$question_grade = get_post_meta($id,'_question_grade',true);
							foreach($question_types as $question_type){
								switch ( $question_type ) {
									//Multiple Choice
									case 'multiple-choice':
									$education_portal = new education_portal;
									$correct_answer = $education_portal->get_answer_id($right_answer);
									$user_answer = $this->cp_get_value_by_key('multiple_'.$id,$lesson_id);
									
									
										if($correct_answer ==  $user_answer){
											$html_user .= '<tr>
													<td>'.__('Multiple Choice','crunchpress').'</td>
													<td class="text_field_title"><a href="'.esc_url(get_permalink($lesson_id)).'">'.esc_html(get_the_title($id)).'</a></td>
													<td>'.$question_grade.'</td>
													<td>Correct</td>
												</tr>';
										}else{
											$html_user .= '<tr>
													<td>'.__('Multiple Choice','crunchpress').'</td>
													<td class="text_field_title"><a href="'.esc_url(get_permalink($lesson_id)).'">'.esc_html(get_the_title($id)).'</a></td>
													<td>'.$question_grade.'</td>
													<td>Wrong</td>
												</tr>';
										}
									
									break;
									//Boolean
									case 'boolean':
										$education_portal = new education_portal;
										$correct_answer = $education_portal->get_answer_id($right_answer);									
										$user_answer = $this->cp_get_value_by_key('boolean_'.$id,$lesson_id);
										if($correct_answer ==  $user_answer){
											$html_user .= '<tr>
													<td>'.__('Boolean','crunchpress').'</td>
													<td class="text_field_title"><a href="'.esc_url(get_permalink($lesson_id)).'">'.esc_html(get_the_title($id)).'</a></td>
													<td>'.$question_grade.'</td>
													<td>Correct</td>
												</tr>';
										}else{
											$html_user .= '<tr>
													<td >'.__('Boolean','crunchpress').'</td>
													<td class="text_field_title"><a href="'.esc_url(get_permalink($lesson_id)).'">'.esc_html(get_the_title($id)).'</a></td>
													<td>'.$question_grade.'</td>
													<td>Wrong</td>
												</tr>';
										}
									break;
									
									
									//Fill in the Blanks
									case 'gap-fill':
										$user_answer = $this->cp_get_value_by_key('blanks_'.$id,$lesson_id);
										$right_answer_array = explode( '|', $right_answer );
										if ( isset( $right_answer_array[0] ) ) { $gapfill_pre = $right_answer_array[0]; } else { $gapfill_pre = ''; }
										if ( isset( $right_answer_array[1] ) ) { $gapfill_gap = $right_answer_array[1]; } else { $gapfill_gap = ''; }
										if ( isset( $right_answer_array[2] ) ) { $gapfill_post = $right_answer_array[2]; } else { $gapfill_post = ''; }
										
										if( ! $user_answer ) {
											$user_answer = '______';
										}
										$right_answer = $gapfill_pre . ' <span class="highlight">' . $gapfill_gap . '</span> ' . $gapfill_post;
										$user_answer = $gapfill_pre . ' <span class="highlight">' . $user_answer . '</span> ' . $gapfill_post;
										if($gapfill_gap == $user_answer){
										$html_user .= '
											<tr>
												<td>'.__('Fill In The Blanks','crunchpress').'</td>
												<td class="text_field_title" ><a href="'.esc_url(get_permalink($lesson_id)).'">'.esc_html(get_the_title($id)).'</a></td>
												<td>'.$question_grade.'</td>
												<td>Right</td>
											</tr>';
										}else{
											$html_user .= '
											<tr>
												<td>'.__('Fill In The Blanks','crunchpress').'</td>
												<td class="text_field_title"><a href="'.esc_url(get_permalink($lesson_id)).'">'.esc_html(get_the_title($id)).'</a></td>
												<td>'.$question_grade.'</td>
												<td>Wrong</td>
											</tr>';
										}
									
									break;
									
									//Multi Line
									case 'multi-line':
										$html_user .= '
											<tr>
												<td>'.__('Multi Line','crunchpress').'</td>
												<td class="text_field_title"><a href="'.esc_url(get_permalink($lesson_id)).'">'.esc_html(get_the_title($id)).'</a></td>
												<td>'.$question_grade.'</td>
												<td>pending</td>
											</tr>';
									break;
									
									//Single Line
									case 'single-line':
										$html_user .= '
											<tr>
												<td>'.__('Single Line','crunchpress').'</td>
												<td class="text_field_title"><a href="'.esc_url(get_permalink($lesson_id)).'">'.esc_html(get_the_title($id)).'</a></td>
												<td>'.$question_grade.'</td>
												<td>pending</td>
											</tr>';
									break;
									
									//File Upload
									case 'file-upload':
									
									break;
							
								}
						
							}
						
						}
						
						$html_user .= '</tbody>
							<tfoot>
								<tr>
									<td>Total</td>
									<td>&nbsp;</td>
									<td>....</td>
									<td>....</td>
								</tr>
							</tfoot>
						</table>';
					}
				}
			}
			return $html_user;
		}else{
			echo '<p>Please install WooCommerce in order to access your data.</p>';
		}		
	}
	
	//Get Completed Ordered Product and ID
	function cp_completed_orders_and_product_ids($user = ''){
		$product_id = array();
		$the_order_ar = array();
		$order_ids = get_posts( array(
			'posts_per_page' => -1,
			'post_type'      => 'shop_order',
			'orderby'        => 'date',
			'order'          => 'desc',
			'post_status'    => array('wc-completed'),
			'meta_query' => array(
				array(
					'key'     => '_customer_user',
					'value'   => $user
				)
			),
			'fields' => 'ids'
		) );
		
		foreach($order_ids as $order){
			$the_order = wc_get_order( $order );
			$the_order_ar[] = wc_get_order( $order );
			$the_order->payment_method;
			$the_order->payment_method_title;
			$the_order->paid_date;
			$the_order->customer_ip_address;
			$the_order->customer_user_agent;
			$the_order->customer_user;
			$the_order->get_view_order_url();
			$the_order->customer_user;
			$user = $the_order->customer_user;
			
			foreach($the_order->get_items() as $item_id=>$item){
				$product = $the_order->get_product_from_item( $item );
				$product_id[] = $product->id;
				
			}
			
		}
		
		//get_order_number
		
		
		return array('user'=>$user,'product_id'=>array_unique($product_id),'orders'=>$the_order_ar);
	}
	
	//Get Ordered Product and ID
	function get_user_all_orders_and_product_ids($user = ''){
		//function exists
		if(function_exists('wc_get_order_statuses')){
		
			$product_id = array();
			$the_order_ar = array();
			$order_ids = get_posts( array(
				'posts_per_page' => -1,
				'post_type'      => 'shop_order',
				'orderby'        => 'date',
				'order'          => 'desc',
				'post_status'    => array_keys( wc_get_order_statuses() ),
				'meta_query' => array(
					array(
						'key'     => '_customer_user',
						'value'   => $user
					)
				),
				'fields' => 'ids'
			) );
			
			foreach($order_ids as $order){
				$the_order = wc_get_order( $order );
				$the_order_ar[] = wc_get_order( $order );
				$the_order->payment_method;
				$the_order->payment_method_title;
				$the_order->paid_date;
				$the_order->customer_ip_address;
				$the_order->customer_user_agent;
				$the_order->customer_user;
				$the_order->get_view_order_url();
				$the_order->customer_user;
				$user = $the_order->customer_user;
				
				foreach($the_order->get_items() as $item_id=>$item){
					$product = $the_order->get_product_from_item( $item );
					$product_id[] = $product->id;
				}
				
			}
		
		//get_order_number
		
		
			return array('user'=>$user,'product_id'=>array_unique($product_id),'orders'=>$the_order_ar);
		}else{
			return array('user'=>'','product_id'=>'','orders'=>'');
		}
	}
	
	//Get Ordered Product and ID
	function get_user_all_pending_orders_and_product_ids($user = ''){
		$product_id = array();
		$the_order_ar = array();
		$order_ids = get_posts( array(
			'posts_per_page' => -1,
			'post_type'      => 'shop_order',
			'orderby'        => 'date',
			'order'          => 'desc',
			'post_status'    => array('wc-pending','wc-processing','wc-on-hold','wc-cancelled','wc-refunded', 'wc-failed'),
			'meta_query' => array(
				array(
					'key'     => '_customer_user',
					'value'   => $user
				)
			),
			'fields' => 'ids'
		) );
		
		foreach($order_ids as $order){
			$the_order = wc_get_order( $order );
			$the_order_ar[] = wc_get_order( $order );
			$the_order->payment_method;
			$the_order->payment_method_title;
			$the_order->paid_date;
			$the_order->customer_ip_address;
			$the_order->customer_user_agent;
			$the_order->customer_user;
			$the_order->get_view_order_url();
			$the_order->customer_user;
			$user = $the_order->customer_user;
			
			foreach($the_order->get_items() as $item_id=>$item){
				$product = $the_order->get_product_from_item( $item );
				$product_id[] = $product->id;
			}
			
		}
		
		//get_order_number
		
		
		return array('user'=>$user,'product_id'=>array_unique($product_id),'orders'=>$the_order_ar);
	}
	
	//Get Ordered Product and ID
	function get_user_all_completed_orders_and_product_ids($user = ''){
		$product_id = array();
		$the_order_ar = array();
		$order_ids = get_posts( array(
			'posts_per_page' => -1,
			'post_type'      => 'shop_order',
			'orderby'        => 'date',
			'order'          => 'desc',
			'post_status'    => array('wc-completed'),
			'meta_query' => array(
				array(
					'key'     => '_customer_user',
					'value'   => $user
				)
			),
			'fields' => 'ids'
		) );
		
		foreach($order_ids as $order){
			$the_order = wc_get_order( $order );
			$the_order_ar[] = wc_get_order( $order );
			$the_order->payment_method;
			$the_order->payment_method_title;
			$the_order->paid_date;
			$the_order->customer_ip_address;
			$the_order->customer_user_agent;
			$the_order->customer_user;
			$the_order->get_view_order_url();
			$the_order->customer_user;
			$user = $the_order->customer_user;
			
			foreach($the_order->get_items() as $item_id=>$item){
				$product = $the_order->get_product_from_item( $item );
				$product_id[] = $product->id;
			}
			
		}
		
		//get_order_number
		
		
		return array('user'=>$user,'product_id'=>array_unique($product_id),'orders'=>$the_order_ar);
	}
	
	function cp_completed_orders($user=''){
		$get_item = array();
		$order_post = array();
		$orders = $this->cp_completed_orders_and_product_ids($user);
		$total =  count($orders['orders']);
		for($i=0;$i<$total;$i++){
			//Fetch Order ID
			$order_id = $orders['orders'][$i]->id;
			//Fetch Ordered Items
			$the_order = wc_get_order( $order_id );
			//Get Product Detail
			foreach($the_order->get_items() as $item){
				$get_item[] = $item['product_id'];
			}
			//Pass it to Post Loop
			$order_post[] = get_post($order_id)->ID;
			
		}
		
		return array('product_list'=>$get_item,'pro_ordered'=>$order_post);
	
	}
	
	function get_products_order_and_thier_ids($user=''){
		$get_item = array();
		$order_post = array();
		$orders = $this->get_user_all_orders_and_product_ids($user);
		$total =  count($orders['orders']);
		for($i=0;$i<$total;$i++){
			//Fetch Order ID
			$order_id = $orders['orders'][$i]->id;
			//Fetch Ordered Items
			$the_order = wc_get_order( $order_id );
			//Get Product Detail
			foreach($the_order->get_items() as $item){
				$get_item[] = $item['product_id'];
			}
			//Pass it to Post Loop
			$order_post[] = get_post($order_id)->ID;
			
		}
		
		return array('product_list'=>$get_item,'pro_ordered'=>$order_post);
	
	}
	
	function get_products_order_and_thier_ids_null($user=''){
		$get_item = array();
		$order_post = array();
		$orders = $this->get_user_all_orders_and_product_ids($user);
		$total =  count($orders['orders']);
		for($i=0;$i<$total;$i++){
			//Fetch Order ID
			$order_id = $orders['orders'][$i]->id;
			//Fetch Ordered Items
			$the_order = wc_get_order( $order_id );
			//Get Product Detail
			foreach($the_order->get_items() as $item){
				$get_item[][get_post($order_id)->ID] = $item['product_id'];
			}
		}
		
		return array('product_list'=>$get_item);
	
	}
	
	//Get Course ID
	function get_course_id($product_id=''){
		$order_ids = get_posts( array(
			'posts_per_page' => 1,
			'post_type'      => 'courses',
			'orderby'        => 'date',
			'order'          => 'desc',
			'meta_query' => array(
				array(
					'key'     => 'product_selected',
					'value'   => $product_id,
					'compare' => '='
				)
			),
			'fields' => 'ids'
		) );
		
		if(!empty($order_ids)){
			return $order_ids;
		}else{
			return array(0=>'51214786');
		}
	}
	
	//Get Course ID
	function get_all_courses($counse_id = ''){
		$order_ids = get_posts( array(
			'posts_per_page' => -1,
			'post_type'      => 'courses',
			'orderby'        => 'date',
			'order'          => 'desc',
			'post__not_in' => array($counse_id),
			'fields' => 'ids'
		));
		
		if(!empty($order_ids)){
			return $order_ids;
		}
	}
	
	public function current_user_edit_rights($logged_user=''){
		if($logged_user <> 0){
			$current_user_url =  get_author_posts_url($logged_user);
			get_currentuserinfo();

			/* Load the registration file. */
			//require_once( ABSPATH . WPINC . '/registration.php' );
			$error = array();    
			/* If profile was saved, update profile. */
			if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

				/* Update user password. */
				if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
					if ( $_POST['pass1'] == $_POST['pass2'] ){
						wp_update_user( array( 'ID' => $logged_user, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
					}else{
						$error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
					}	
				}

				/* Update user information. */
				if ( !empty( $_POST['url'] ) ){
					update_user_meta( $logged_user, 'user_url', esc_url( $_POST['url'] ) );
				}	
				if ( !empty( $_POST['email'] ) ){
					if (!is_email(sanitize_email( $_POST['email'] ))){
						$error[] = __('The Email you entered is not valid.  please try again.', 'profile');
					}elseif(email_exists(sanitize_email( $_POST['email'] )) != $logged_user ){
						$error[] = __('This email is already used by another user.  try a different one.', 'profile');
					}else{
						wp_update_user( array ('ID' => $logged_user, 'user_email' => sanitize_email( $_POST['email'] )));
					}
				}

				if ( !empty( $_POST['first_name'] ) ){
					update_user_meta( $logged_user, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
				}	
				if ( !empty( $_POST['last_name'] ) ){
					update_user_meta($logged_user, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
				}	
				if ( !empty( $_POST['description'] ) ){
					update_user_meta( $logged_user, 'description', sanitize_text_field( $_POST['description'] ) );			
				}
				if ( !empty( $_POST['billing_address_1'] ) ){
					update_user_meta( $logged_user, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
				}	
				if ( !empty( $_POST['user_meta_dob'] ) ){
					update_user_meta( $logged_user, 'user_meta_dob', sanitize_text_field( $_POST['user_meta_dob'] ) );
				}	
				if ( !empty( $_POST['user_meta_gender'] ) ){
					update_user_meta( $logged_user, 'user_meta_gender', sanitize_text_field( $_POST['user_meta_gender'] ) );
				}
				if ( !empty( $_POST['billing_phone'] ) ){
					update_user_meta( $logged_user, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
				}

				
				if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){					
					$result = $this->edit_user_profile_update($_FILES,$logged_user);
				}

				// if ( count($error) == 0 ) {
					// wp_redirect( $current_user_url );
				// }
			}
			$edit_pass = add_query_arg( 'cp_show', 'edit_pass', $current_user_url );
			$edit_profile = add_query_arg( 'cp_show', 'edit_profile', $current_user_url );
			$full_score = add_query_arg( 'cp_show', 'full_score', $current_user_url );
			$attended = add_query_arg( 'cp_show', 'attended_courses', $current_user_url );
			$confirmed_courses = add_query_arg( 'cp_show', 'confirmed_courses', $current_user_url );?>
			<!--CONTANT START-->
			<div class="contant">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="container">
						<div class="row">
							<div class="span4">
								<!--PROFILE IMAGE START-->
								<div class="profile-box profile-view">
									<div class="thumb">
										<a href="<?php echo $current_user_url;?>">
											<?php
												// retrieve our additional author meta info
												$attachment_id = get_the_author_meta( 'cp_avatar', $logged_user );
												$cp_avatar = wp_get_attachment_image_src( $attachment_id, array(80,80));
												// make sure the field is set
												if ( $cp_avatar <> '' ) {
											 
													// only display if function exists
													echo '<img alt="author photo two" src="'.$cp_avatar[0].'" />';
											 
												} 
											?>
										</a>	
										<?php if(isset($_GET['cp_show']) and  $_GET['cp_show'] == 'edit_profile'){ ?>
										<input type="hidden" name="post_id" id="post_id" value="<?php if(isset($post)){echo (int) $post_id;} ?>" />
										<a id="mybutton" class="thumb-pencil">
											<i class="fa fa-pencil"></i>
											<input type="file" value="" id="myfile" name="file"/>
										</a>
										<?php }?>
									</div>
									<div class="text">
										<p><?php _e('Welcome','crunchpress');?></p>
										<a href="<?php echo $current_user_url;?>" class="btn-style">
											<?php 									
												if(get_the_author_meta( 'first_name', $logged_user ) == ''){
													echo get_the_author_meta( 'nickname', $logged_user );
												}else{
													echo get_the_author_meta( 'first_name', $logged_user ) .' '.get_the_author_meta( 'last_name', $logged_user );
												}									
											?>
										</a>
									</div>
								</div>
								<!--PROFILE IMAGE END-->
								<!--EDIT PROFILE START-->
								<div class="profile-box edit-profile">
									<h2><?php _e('Account Setting','crunchpress');?></h2>
									<ul>
										<li><a href="<?php echo esc_url($edit_profile);?>"><?php _e('Edit Profile','crunchpress');?></a></li>
										<li><a href="<?php echo esc_url($edit_pass);?>"><?php _e('Edit Password','crunchpress');?></a></li>
										<?php if(function_exists('wc_get_order_statuses')){ ?>
											<li><a href="<?php echo esc_url($full_score);?>"><?php _e('View Quiz Scores','crunchpress');?></a></li>
											<li><a href="<?php echo esc_url($attended);?>"><?php _e('Attended Courses','crunchpress');?></a></li>
										<?php }?>
										<!--<li><a href="<?php echo esc_url($confirmed_courses);?>"><?php _e('Confirmed Courses','crunchpress');?></a></li>-->
									</ul>
									<div class="logout">
										<a class="btn-style" href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e('Log Out','crunchpress');?></a>
									</div>
								</div>
								<!--EDIT PROFILE END-->
							</div>				
							<div class="span8">
								<?php if(isset($_GET['cp_show']) and  $_GET['cp_show'] == 'edit_profile'){ ?>
								<!--EDIT PROFILE START-->
								<div class="profile-box editing">
									<h2><?php _e('Edit Profile','crunchpress');?></h2>
									<ul>
										<li>
											<label><?php _e('First Name','crunchpress');?></label>
											<input type="text" name="first_name" class="input-block-level"  value="<?php echo get_the_author_meta( 'first_name', $logged_user );?>" placeholder="Enter your First Name">
										</li>
										<li>
											<label><?php _e('Last Name','crunchpress');?></label>
											<input type="text" name="last_name" class="input-block-level" value="<?php echo get_the_author_meta( 'last_name', $logged_user );?>" placeholder="Enter your Last Name">
										</li>
										<li>
											<label><?php _e('Gender','crunchpress');?></label>
											<select class="input-block-level" name="user_meta_gender">
												<option <?php if(get_the_author_meta( 'user_meta_gender', $logged_user ) == 'Male'){echo 'selected';}?>><?php _e('Male','crunchpress');?></option>
												<option <?php if(get_the_author_meta( 'user_meta_gender', $logged_user ) == 'Female'){echo 'selected';}?>><?php _e('Female','crunchpress');?></option>
											</select>
										</li>
										<li>
											<label><?php _e('Date of Birth','crunchpress');?></label>
											<input type="text" class="input-block-level" name="user_meta_dob" value="<?php echo get_the_author_meta( 'user_meta_dob', $logged_user );?>">
										</li>
										<li>
											<label><?php _e('Email','crunchpress');?></label>
											<input type="text" class="input-block-level"  name="email" value="<?php echo get_the_author_meta( 'email', $logged_user );?>" placeholder="Enter your E-mail ID">
										</li>
										<li>
											<label><?php _e('Phone','crunchpress');?></label>
											<input type="text" class="input-block-level" name="billing_phone" value="<?php echo get_the_author_meta( 'billing_phone', $logged_user );?>" placeholder="Enter your Phone Number">
										</li>
										<li class="fw">
											<label><?php _e('Address','crunchpress');?></label>
											<textarea class="input-block-level" name="billing_address_1"><?php echo get_the_author_meta( 'billing_address_1', $logged_user );?></textarea>
											<input type="hidden" name="action" value="update-user">
										</li>
										<li class="fw">
											<input type="submit" value="update" class="btn-style" />
										</li>
									</ul>
								</div>
								<!--EDIT PROFILE END-->
								<?php }else{ ?>
								<!--EDIT PROFILE START-->
								<div class="profile-box editing">
									<h2><?php _e('Profile','crunchpress');?></h2>
									<ul>
										<li>
											<label><?php _e('First Name','crunchpress');?></label>
											<span><?php echo get_the_author_meta( 'first_name', $logged_user );?></span>
										</li>
										<li>
											<label><?php _e('Last Name','crunchpress');?></label>
											<span><?php echo get_the_author_meta( 'last_name', $logged_user );?></span>
										</li>
										<li>
											<label><?php _e('Nick Name','crunchpress');?></label>
											<span><?php echo get_the_author_meta( 'nickname', $logged_user );?></span>
										</li>
										<li>
											<label><?php _e('Gender','crunchpress');?></label>
											<span><?php echo get_the_author_meta( 'user_meta_gender', $logged_user );?></span>
										</li>
										<li>
											<label><?php _e('Date of Birth','crunchpress');?></label>
											<span><?php echo get_the_author_meta( 'user_meta_dob', $logged_user );?></span>
										</li>
										<li>
											<label><?php _e('Email','crunchpress');?></label>
											<span><?php echo get_the_author_meta( 'email', $logged_user );?></span>
										</li>
										<li>
											<label><?php _e('Phone','crunchpress');?></label>
											<span><?php echo get_the_author_meta( 'billing_phone', $logged_user );?></span>
										</li>
										<li>
											<label><?php _e('Address','crunchpress');?></label>
											<span><?php echo get_the_author_meta( 'billing_address_1', $logged_user );?></span>
										</li>
									</ul>
								</div>
								<!--EDIT PROFILE END-->
								<?php }
								if(isset($_GET['cp_show']) and  $_GET['cp_show'] == 'edit_pass'){ ?>
								<!--EDIT PASSWORD START-->
								<div class="profile-box editing">
									<h2><?php _e('Edit Password','crunchpress');?></h2>
									<ul>
										<li>
											<label><?php _e('New Password','crunchpress');?></label>
											<input type="password" name="pass1" class="input-block-level"  placeholder="Enter your New Password">
										</li>
										<li>
											<label><?php _e('Confirm Password','crunchpress');?></label>
											<input type="password" name="pass2" class="input-block-level" placeholder="Confirm Password">
											<input type="hidden" name="action" value="update-user">
										</li>
										<li class="fw">
											<input type="submit" value="update" class="btn-style" />
										</li>
									</ul>
								</div>
								<!--EDIT PASSWORD END-->
								<?php }
								if(isset($_GET['cp_show']) and  $_GET['cp_show'] == 'attended_courses'){ ?>
								 <!--Attended Courses-->
								<div class="profile-box editing">
									<h2><?php _e('Courses','crunchpress');?></h2>
									<?php 
									if(function_exists('wc_get_order_statuses')){
									$get_products_order = $this->get_products_order_and_thier_ids($logged_user);	
									$get_products_order_null = $this->get_products_order_and_thier_ids_null($logged_user);	

									if(!empty($get_products_order['pro_ordered'])){ ?>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<thead>
											<tr>
												<td><?php _e('Course Plan','crunchpress');?></td>
												<td><?php _e('Status','crunchpress');?></td>
												<td><?php _e('Course Name','crunchpress');?></td>
											</tr>
										</thead>
										<tbody>
											<?php 								
											$array_merge = $get_products_order_null['product_list'];
											foreach($array_merge as $products){
												foreach($products as $order=>$product){
													
													$the_order = wc_get_order( $order );
													$get_order = get_post($order);
													
														foreach($the_order->get_items() as $item){
															$get_item[] = $item['product_id'];
														}
													
													
												}
												$cp_order[] = $order;
												$cp_product[] = $product;
											}
											$exact = $cp_order;
											$cp_order_count = count($cp_order);
											$counter = 0;
											for($i=0;$i<$cp_order_count;$i++){
												$order_post = get_post($cp_order[$i]);
												$course_id = $this->get_course_id($cp_product[$i]);
												if(!empty($course_id)){
												$course_post = get_post($course_id[0]);
													echo '
														<tr>
															<td><a href="'.esc_url(get_permalink($cp_order[$i])).'">'.esc_html(get_the_title($cp_order[$i])).'</a></td>
															<td>'.$order_post->post_status.'</td>
															<td><a href="'.esc_url(get_permalink($course_id[0])).'">'.esc_html(get_the_title($course_id[0])).'</a></td>
														</tr>';
												}
											}
											?>
										</tbody>
										<!--<tfoot>
											<tr>
												<td>Total</td>
												<td>&nbsp;</td>
												<td>7.5/50</td>
											</tr>
										</tfoot>-->
									</table>
									<?php }else{ ?>
										<p>There is no course been ordered yet.</p>
									<?php }?>
									<?php }else{ ?>
										<p>Please enable install wooCommerce in order to view your data.</p>
									<?php }?>
								</div>
								<!--QUIZ SCORE END-->
								<?php }
								//<!--QUIZ SCORE START-->
								if(isset($_GET['cp_show']) and  $_GET['cp_show'] == 'full_score'){
									echo '<div class="profile-box editing">';
									echo $this->get_full_quiz_score($logged_user);
									echo '</div>';
								}									
								//<!--QUIZ SCORE END-->
								if(isset($_GET['cp_show']) and  $_GET['cp_show'] == 'confirmed_courses'){ ?>
								<!--Confirm Courses-->
								<div class="profile-box editing">
									<h2><?php esc_html_e('Confirmed Courses','crunchpress');?></h2>
									<?php 
									$get_products_order = $this->get_products_order_and_thier_ids($logged_user);
									$get_products_order_null = $this->get_products_order_and_thier_ids_null($logged_user);	
									if(!empty($get_products_order['pro_ordered'])){ ?>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<thead>
											<tr>
												<td><?php _e('Course Plan','crunchpress');?></td>
												<td><?php _e('Status','crunchpress');?></td>
												<td><?php _e('Course Name','crunchpress');?></td>
											</tr>
										</thead>
										<tbody>
											<?php 								
											//product_list
											//pro_ordered
											$array_merge = $get_products_order_null['product_list'];
											
											foreach($array_merge as $products){
												foreach($products as $order=>$product){
													
													$the_order = wc_get_order( $order );
													$get_order = get_post($order);
													
														foreach($the_order->get_items() as $item){
															$get_item[] = $item['product_id'];
														}
													
													
												}
												$cp_order[] = $order;
											}
											$exact = array_unique($get_item);
											$counter = 0;
											
											foreach($exact as $val){
												$counter++;													
												$order_post = get_post($cp_order[$counter]);													
												$course_id = $this->get_course_id($val);
												$course_post = get_post($course_id[0]);
												if($order_post->post_status == 'wc-completed'){												
													if(!empty($course_post)){
													echo '
														<tr>
															<td><a href="'.esc_url(get_permalink($cp_order[$counter])).'">'.esc_html(get_the_title($cp_order[$counter])).'</a></td>
															<td>'.esc_attr($order_post->post_status).'</td>
															<td><a href="'.esc_url($course_post->guid).'">'.esc_html($course_post->post_title).'</a></td>
														</tr>';
													}	
												}	
											}
											
											
											?>
										</tbody>
									</table>
									<?php }else{ ?>
										<p>There is no course been confirmed yet.</p>
									<?php }?>
								</div>
								<!--QUIZ SCORE END-->
								<?php }?>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--CONTANT END-->
		<?php } //Condition Ends if No usser Found
	} //Function Ends of User Having Edit Rights
	
	public function default_user_profile($logged_user=''){
		$current_user_url =  get_author_posts_url($logged_user); ?>
		<div class="container">
        	<div class="row">
            	<div class="span4">
                	<!--PROFILE IMAGE START-->
                	<div class="profile-box profile-view">
                        <div class="thumb">
                            <a href="<?php echo esc_url($current_user_url);?>">
								<?php
									// retrieve our additional author meta info
									$attachment_id = get_the_author_meta( 'cp_avatar', $logged_user );
									$cp_avatar = wp_get_attachment_image_src( $attachment_id, array(80,80));
									// make sure the field is set
									if ( $cp_avatar <> '' ) {
								 
										// only display if function exists
										echo '<img alt="author photo two" src="'.$cp_avatar[0].'" />';
								 
									} 
								?>
							</a>							
                        </div>
                        <div class="text">
                            <p><?php _e('Student','crunchpress');?></p>
                            <a href="<?php echo esc_url($current_user_url);?>" class="btn-style">
								<?php 									
									if(get_the_author_meta( 'first_name', $logged_user ) == ''){
										echo get_the_author_meta( 'nickname', $logged_user );
									}else{
										echo get_the_author_meta( 'first_name', $logged_user ) .' '.get_the_author_meta( 'last_name', $logged_user );
									}									
								?>
							</a>
                        </div>
                    </div>
                    <!--PROFILE IMAGE END-->
                </div>				
                <div class="span8">
					<!--EDIT PROFILE START-->
                	<div class="profile-box editing">
                    	<h2>Profile</h2>
                        <ul>
                        	<li>
                            	<label><?php _e('First Name','crunchpress');?></label>
                                <span><?php echo get_the_author_meta( 'first_name', $logged_user );?></span>
                            </li>
                            <li>
                            	<label><?php _e('Last Name','crunchpress');?></label>
                                <span><?php echo get_the_author_meta( 'last_name', $logged_user );?></span>
                            </li>
							<li>
                            	<label><?php _e('Nick Name','crunchpress');?></label>
                                <span><?php echo get_the_author_meta( 'nickname', $logged_user );?></span>
                            </li>
							<li>
                            	<label><?php _e('Gender','crunchpress');?></label>
                                <span><?php echo get_the_author_meta( 'user_meta_gender', $logged_user );?></span>
                            </li>
							<li>
                            	<label><?php _e('Date of Birth','crunchpress');?></label>
                                <span><?php echo get_the_author_meta( 'user_meta_dob', $logged_user );?></span>
                            </li>
							<li>
                            	<label><?php _e('Email','crunchpress');?></label>
                                <span><?php echo get_the_author_meta( 'email', $logged_user );?></span>
                            </li>
							<li>
                            	<label><?php _e('Phone','crunchpress');?></label>
                                <span><?php echo get_the_author_meta( 'billing_phone', $logged_user );?></span>
                            </li>
							<li>
                            	<label><?php _e('Address','crunchpress');?></label>
                                <span><?php echo get_the_author_meta( 'billing_address_1', $logged_user );?></span>
                            </li>
                        </ul>
                    </div>
                    <!--EDIT PROFILE END-->
				</div>
			</div>
		</div>	
	<?php
	} //Default User Profile Function Ends
	
	public function change_author_permalinks() {

		global $wp_rewrite;

		// Change the value of the author permalink base to whatever you want here
		$wp_rewrite->author_base = 'student';

		$wp_rewrite->flush_rules();
	}
		
} // Class ends here

	include_once('cp_questions.php'); //Manage Questions
	include_once('cp_lessons.php'); //Manage Less
	include_once('cp_custom_tax.php'); //Manage Less
	
	
}
