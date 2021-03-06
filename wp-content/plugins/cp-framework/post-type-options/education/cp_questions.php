<?php
if(class_exists('function_library')){
	
	add_action( 'plugins_loaded', 'education_portquiz_override' );
	function education_portquiz_override() {
		$education_portal_quiz = new education_portal_quiz;
	}
	
	class education_portal_quiz extends function_library{
		public $token = 'lessons';
		public $meta_fields;
		
		public function __construct () {
			$this->question_types = $this->question_types();
			$this->meta_fields = array( 'question_right_answer', 'question_wrong_answers' );
			if ( is_admin() ) {
				// Custom Write Panel Columns
				add_filter( 'manage_edit-question_columns', array( $this, 'add_column_headings' ), 10, 1 );
				add_action( 'manage_posts_custom_column', array( $this, 'add_column_data' ), 10, 2 );
				add_action( 'add_meta_boxes', array( $this, 'question_edit_panel_metabox' ), 10, 2 );

				// Quesitno list table filters
				add_action( 'restrict_manage_posts', array( $this, 'filter_options' ) );
				add_filter( 'request', array( $this, 'filter_actions' ) );

				add_action( 'save_post', array( $this, 'save_question' ), 10, 1 );
			} // End If Statement
		} // End __construct()
		
		
		/**
		 * PageBuilder Element Size define here.
		 * @access public
		 * @since  1.0
		 * @return array $div_size
		 */
		
		function page_builder_size_class(){
			global $div_size;
			//$div_size['Courses'] = $this->course_size_array;	
			//$div_size['Carousel'] = $this->course_size_array;	

		}// End page_builder_size_class()
		
		/**
		 * PageBuilder Element define here.
		 * @access public
		 * @since  1.0
		 * @return array $page_meta_boxes
		 */
		
		function page_builder_element_class(){
		global $page_meta_boxes;
			//$page_meta_boxes['Page Item']['name']['Courses'] = $this->course_array;	
			//$page_meta_boxes['Page Item']['name']['Carousel'] = $this->timeline_gal_array;	

			//$page_meta_boxes['Page Item']['name']['Courses']['category']['options'] = function_library::get_category_list_array( 'courses-category' );			
			//$page_meta_boxes['Page Item']['name']['Carousel']['category']['options'] = function_library::get_category_list_array( 'timeline-category' );			
			
		}// End page_builder_element_class()
		
		
		/**
		 * Define Multiple Questions Type.
		 * @access public
		 * @since  1.0
		 * @param  array $types
		 * @return array $types
		 */
		public function question_types() {
			$types = array(
				'multiple-choice' => __( 'Multiple Choice', 'crunchpress' ),
				'boolean' => __( 'True/False', 'crunchpress' ),
				'gap-fill' => __( 'Gap Fill', 'crunchpress' ),
				'single-line' => __( 'Single Line', 'crunchpress' ),
				'multi-line' => __( 'Multi Line', 'crunchpress' ),
				'file-upload' => __( 'File Upload', 'crunchpress' ),
			);

			return apply_filters( 'cp_question_types', $types );
		}// End question_types()

		/**
		 * Add column headings to the "lesson" post list screen.
		 * @access public
		 * @since  1.0
		 * @param  array $defaults
		 * @return array $new_columns
		 */
		public function add_column_headings ( $defaults ) {
			$new_columns['cb'] = '<input type="checkbox" />';
			$new_columns['title'] = _x( 'Question', 'column name', 'crunchpress' );
			$new_columns['question-type'] = _x( 'Type', 'column name', 'crunchpress' );
			$new_columns['question-category'] = _x( 'Categories', 'column name', 'crunchpress' );
			if ( isset( $defaults['date'] ) ) {
				$new_columns['date'] = $defaults['date'];
			}

			return $new_columns;
		} // End add_column_headings()

		/**
		 * Add data for our newly-added custom columns.
		 * @access public
		 * @since  1.0
		 * @param  string $column_name
		 * @param  int $id
		 * @return void
		 */
		public function add_column_data ( $column_name, $id ) {
			global $wpdb, $post;

			switch ( $column_name ) {
				case 'id':
					echo $id;
				break;
				case 'question-type':
					$question_type = strip_tags( get_the_term_list( $id, 'question-type', '', ', ', '' ) );
					if(!empty($question_type)){
					$output = $this->question_types[ $question_type ];
						if ( ! $output ) {
							$output = '&mdash;';
						} // End If Statement
						echo $output;
					}
				break;
				case 'question-category':
					$output = strip_tags( get_the_term_list( $id, 'question-category', '', ', ', '' ) );
					if( ! $output ) {
						$output = '&mdash;';
					}
					echo $output;
				break;
				default:
				break;
			}
		} // End add_column_data()

		public function question_edit_panel_metabox( $post_type, $post ) {
			if( in_array( $post_type, array( 'question', 'multiple_question' ) ) ) {

				$metabox_title = __( 'Question', 'crunchpress' );

				if( isset( $post->ID ) ) {
					$question_type = '';
					$question_types = wp_get_post_terms( $post->ID, 'question-type', array( 'fields' => 'names' ) );
					if ( isset( $question_types[0] ) && '' != $question_types[0] ) {
						$question_type = $question_types[0];
					} // End If Statement

					if( $question_type ) {
						$type = $this->question_types[ $question_type ];
						if( $type ) {
							$metabox_title = $type;
						}
					}
				}
				add_meta_box( 'question-edit-panel', $metabox_title, array( $this, 'question_edit_panel' ), 'question', 'normal', 'high' );
				add_meta_box( 'question-lessons-panel', __( 'Quizzes', 'crunchpress' ), array( $this, 'question_lessons_panel' ), 'question', 'side', 'default' );
				add_meta_box( 'multiple-question-lessons-panel', __( 'Quizzes', 'crunchpress' ), array( $this, 'question_lessons_panel' ), 'multiple_question', 'side', 'default' );
			}
		}

		public function question_edit_panel() {
			global $education_portal, $post, $pagenow;
			$education_portal = new education_portal;
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );

			$html = '<div id="lesson-quiz" class="single-question"><div id="add-question-main">';

			if( 'post-new.php' == $pagenow ) {

				$html .= '<div id="add-question-actions">';
					$html .= $education_portal->quiz_panel_add( 'question' );
				$html .= '</div>';

			} else {
				$question_id = $post->ID;

				$question_type = '';
				$question_types = wp_get_post_terms( $question_id, 'question-type', array( 'fields' => 'names' ) );
				if ( isset( $question_types[0] ) && '' != $question_types[0] ) {
					$question_type = $question_types[0];
				}

				if( ! $question_type ) {
					$question_type = 'multiple-choice';
				}
				
				$html .= '<div id="add-question-metadata"><table class="widefat">';
					$html .= $education_portal->quiz_panel_question( $question_type, 0, $question_id, 'question' );
				$html .= '</table></div>';
			}

			$html .= '</div></div>';

			echo $html;
		}

		public function question_lessons_panel() {
			global $post;

			$no_lessons = sprintf( __( '%1$sThis question does not appear in any quizzes yet.%2$s', 'crunchpress' ), '<em>', '</em>' );

			if( ! isset( $post->ID ) ) {
				echo $no_lessons;
				return;
			}

			$quizzes = get_post_meta( $post->ID, '_quizzes', true );

			if( ! $quizzes ) {
				echo $no_lessons;
				return;
			}

			$lessons = false;

			foreach( $quizzes as $quiz ) {

				$lesson_id = get_post_meta( $quiz, '_quiz_lesson', true );

				if( ! $lesson_id ) continue;

				$lessons[ $lesson_id ]['title'] = get_the_title( $lesson_id );
				$lessons[ $lesson_id ]['link'] = admin_url( 'post.php?post=' . $lesson_id . '&action=edit' );
			}

			if( ! $lessons ) {
				echo $no_lessons;
				return;
			}

			$html = '<ul>';

			foreach( $lessons as $id => $lesson ) {
				$html .= '<li><a href="' . esc_url( $lesson['link'] ) . '">' . esc_html( $lesson['title'] ) . '</a></li>';
			}

			$html .= '</ul>';

			echo $html;

		}

		public function save_question( $post_id = 0 ) {
			global $education_portal;

			if( ! isset( $_POST['post_type'] ) ) return;

			$data = $_POST;

			if ( 'question' != $data['post_type'] ) return;

			$data['quiz_id'] = 0;
			$data['question_id'] = $post_id;

			if ( ! wp_is_post_revision( $post_id ) ){

				// Unhook function to prevent infinite loops
				remove_action( 'save_post', array( $this, 'save_question' ) );
				//$education_portal = new education_portal;
				// Update question data
				$question_id = education_portal::lesson_save_question( $data, 'question' );

				// Re-hook same function
				add_action( 'save_post', array( $this, 'save_question' ) );
			}

			return;
		}

		/**
		 * Add options to filter the questions list table
		 * @return void
		 */
		public function filter_options() {
			global $typenow;

			if( is_admin() && 'question' == $typenow ) {

				$output = '';

				// Question type
				$selected = isset( $_GET['question_type'] ) ? $_GET['question_type'] : '';
				$type_options = '<option value="">' . __( 'All types', 'crunchpress' ) . '</option>';
				foreach( $this->question_types as $label => $type ) {
					$type_options .= '<option value="' . esc_attr( $label ) . '" ' . selected( $selected, $label, false ) . '>' . esc_html( $type ) . '</option>';
				}

				$output .= '<select name="question_type" id="dropdown_question_type">';
				$output .= $type_options;
				$output .= '</select>';

				// Question category
				$cats = get_terms( 'question-category', array( 'hide_empty' => false ) );
				if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
					$selected = isset( $_GET['question_cat'] ) ? $_GET['question_cat'] : '';
					$cat_options = '<option value="">' . __( 'All categories', 'crunchpress' ) . '</option>';
					foreach( $cats as $cat ) {
						$cat_options .= '<option value="' . esc_attr( $cat->slug ) . '" ' . selected( $selected, $cat->slug, false ) . '>' . esc_html( $cat->name ) . '</option>';
					}

					$output .= '<select name="question_cat" id="dropdown_question_cat">';
					$output .= $cat_options;
					$output .= '</select>';
				}

				echo $output;
			}
		}

		/**
		 * Filter questions list table
		 * @param  array $request Current request
		 * @return array          Modified request
		 */
		public function filter_actions( $request ) {
			global $typenow;

			if( is_admin() && 'question' == $typenow ) {

				// Question type
				$question_type = isset( $_GET['question_type'] ) ? $_GET['question_type'] : '';
				if( $question_type ) {
					$type_query = array(
						'taxonomy' => 'question-type',
						'terms' => $question_type,
						'field' => 'slug',
					);
					$request['tax_query'][] = $type_query;
				}

				// Question category
				$question_cat = isset( $_GET['question_cat'] ) ? $_GET['question_cat'] : '';
				if( $question_cat ) {
					$cat_query = array(
						'taxonomy' => 'question-category',
						'terms' => $question_cat,
						'field' => 'slug',
					);
					$request['tax_query'][] = $cat_query;
				}
			}

			return $request;
		}
	} // End Class
}	