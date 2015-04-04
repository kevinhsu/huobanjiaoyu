<?php
class courses extends WP_Widget
{
  function courses()
  {
    $widget_ops = array('classname' => 'courses', 'description' => 'Display Courses Using Widget' );
    $this->WP_Widget('courses', 'CrunchPress : Courses', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
	$get_cate_posts = isset( $instance['recent_post_category'] ) ? esc_attr( $instance['recent_post_category'] ) : '';
	$nop = isset( $instance['nop'] ) ? esc_attr( $instance['nop'] ) : '';
?>
  <p>
	  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
		 <?php esc_html_e('Title:','crunchpress');?>  
		  <input class="widefat"  id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	  </label>
  </p> 
  <p>
	  <label for="<?php echo esc_attr($this->get_field_id('nop')); ?>">
		 <?php esc_html_e('Number of Courses To Display:','crunchpress');?> 
		  <input class="widefat" size="2" id="<?php echo esc_attr($this->get_field_id('nop')); ?>" name="<?php echo esc_attr($this->get_field_name('nop')); ?>" type="text" value="<?php echo esc_attr($nop); ?>" />
	  </label>
  </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
  
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['recent_post_category'] = $new_instance['recent_post_category'];	
	$instance['nop'] = $new_instance['nop'];
    return $instance;
  }
 
	function widget($args, $instance)
	{
		
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$get_cate_posts = isset( $instance['recent_post_category'] ) ? esc_attr( $instance['recent_post_category'] ) : '';		
		$nop = isset( $instance['nop'] ) ? esc_attr( $instance['nop'] ) : '';	
	
		if($nop == ""){$nop = '-1';}
		echo $before_widget;	
		// WIDGET display CODE Start
		echo '<div class="widget-top-rated">';
		
		if (!empty($title))
			echo $before_title;
			echo esc_attr($title);
			echo $after_title;
			global $wpdb, $post;
			?>
			<ul>
			<?php
				//$category_array = get_term_by('id', $get_cate_posts, 'recipe-category');
				$popularpost = new WP_Query( array( 'ignore_sticky_posts' => true,'posts_per_page' => $nop, 'post_type'=> 'courses', 'order' => 'rand'  ) );
					while ( $popularpost->have_posts() ) : $popularpost->the_post();
					global $post;
					$post_social = '';
					$sidebars = '';
					$right_sidebar_post = '';
					$left_sidebar_post = '';
					$post_thumbnail = '';
					$video_url_type = '';
					$select_slider_type = '';
					// Get Post Meta Elements detail 
					$course_detail_xml = get_post_meta($post->ID, 'course_detail_xml', true);
					$product_selected = array();
					$course_tutor = get_post_meta($post->ID, 'course_tutor', true);
					
					if($course_detail_xml <> ''){
						$cp_course_xml = new DOMDocument ();
						$cp_course_xml->loadXML ( $course_detail_xml );
						$sidebar = find_xml_value($cp_course_xml->documentElement,'sidebars_port');
						$right_sidebar = find_xml_value($cp_course_xml->documentElement,'right_sidebar_port');
						$left_sidebar = find_xml_value($cp_course_xml->documentElement,'left_sidebar_port');	
						$audio_url_type = find_xml_value($cp_course_xml->documentElement,'audio_url_type');
						$post_thumbnail = find_xml_value($cp_course_xml->documentElement,'post_thumbnail');
						$video_url_type = find_xml_value($cp_course_xml->documentElement,'video_url_type');
						$select_slider_type = find_xml_value($cp_course_xml->documentElement,'select_slider_type');
						$course_id = find_xml_value($cp_course_xml->documentElement,'course_id');
						$duration_field = find_xml_value($cp_course_xml->documentElement,'duration_field');
						$product_selected = find_xml_value($cp_course_xml->documentElement,'product_selected');
						$feature_course = find_xml_value($cp_course_xml->documentElement,'feature_course');
					}
					
						global $post,$post_id,$product,$product_url;
						$regular_price = get_post_meta($product_selected, '_regular_price', true);
						if($regular_price == ''){
							$regular_price = get_post_meta($product_selected, '_max_variation_regular_price', true);
						}
						$sale_price = get_post_meta($product_selected, '_sale_price', true);
						if($sale_price == ''){
							$sale_price = get_post_meta($product_selected, '_min_variation_sale_price', true);
						}
						if($sale_price == ''){$sale_price = $regular_price;}else{}
						$sku_num = get_post_meta($product_selected, '_sku', true);
						$currency = get_woocommerce_currency_symbol();
					?>

					<!-- Widget Popular Post Code -->
					<li>
						<div class="thumb">
							<a href="<?php echo esc_url(get_permalink());?>"><?php echo get_the_post_thumbnail($post->ID, array(80,80));?></a>
						</div>
						<div class="text">
							<p>
								<a href="<?php echo esc_url(get_permalink());?>">
								<?php echo strip_tags(substr(esc_html(get_the_content()), 0, 40));?>
								</a>
							</p>	
							<span><?php echo esc_attr($currency);?><?php echo esc_attr($sale_price);?></span>	
							<span>(<?php echo esc_attr($duration_field); ?>)</span>	
							<!--<strong class=""><?php echo strip_tags(substr(esc_attr(get_the_content()), 0, 30));?>...</strong>
							<a class="mnt" href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-clock-o"></i> <?php echo esc_attr(get_the_date()); ?></a>-->
						</div>
                    </li>
					<!--Widget Code Popular Post END -->

				<?php endwhile;?>
			</ul>
		
					
<?php 
	wp_reset_query();
	wp_reset_postdata();
	echo '</div>';
	echo $after_widget;
		}
	}
add_action( 'widgets_init', create_function('', 'return register_widget("courses");') );?>