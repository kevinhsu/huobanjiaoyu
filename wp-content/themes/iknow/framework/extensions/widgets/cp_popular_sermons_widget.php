<?php
class popular_sermons extends WP_Widget
{
  function popular_sermons()
  {
    $widget_ops = array('classname' => 'popular_sermons', 'description' => 'Select Category to show its Popular Sermons' );
    $this->WP_Widget('popular_sermons', 'CrunchPress : Show Popular Sermons', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
	$get_cate_posts = isset( $instance['get_cate_posts'] ) ? esc_attr( $instance['get_cate_posts'] ) : '';
	$nop = isset( $instance['nop'] ) ? esc_attr( $instance['nop'] ) : '';
?>
  <p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
	 <?php esc_html_e('Title:','crunchpress');?>  
	  <input class="widefat"  id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
  </p>   
  <p>
  <label for="<?php echo $this->get_field_id('nop'); ?>">
	 <?php esc_html_e('Number of Sermons To Display:','crunchpress');?> 
	  <input class="widefat" size="2" id="<?php echo esc_attr($this->get_field_id('nop')); ?>" name="<?php echo esc_attr($this->get_field_name('nop')); ?>" type="text" value="<?php echo esc_attr($nop); ?>" />
  </label>
  </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
  
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['get_cate_posts'] = $new_instance['get_cate_posts'];	
	$instance['nop'] = $new_instance['nop'];
    return $instance;
  }
 
	function widget($args, $instance)
	{
		
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$get_cate_posts = isset( $instance['get_cate_posts'] ) ? esc_attr( $instance['get_cate_posts'] ) : '';		
		$nop = isset( $instance['nop'] ) ? esc_attr( $instance['nop'] ) : '';	
	
		if($nop == ""){$nop = '-1';}
		echo $before_widget;	
		// WIDGET display CODE Start
		echo '<div class="popular-sermons">';
		
		if (!empty($title))
			echo $before_title;
			echo esc_html($title);
			echo $after_title;
			global $wpdb, $post;
			?>
			<ul>
			<?php
				$category_array = get_term_by('id', $get_cate_posts, 'sermons-category');
				$popularpost = new WP_Query( array( 'ignore_sticky_posts' => true,'posts_per_page' => $nop, 'post_type'=> 'post', 'meta_key' => 'popular_post_views_count', 'orderby' => 'popular_post_views_count meta_value_num', 'order' => 'DESC'  ) );
					while ( $popularpost->have_posts() ) : $popularpost->the_post();
					global $post;
					$post_social = '';
					$sidebars = '';
					$right_sidebar_post = '';
					$left_sidebar_post = '';
					$post_thumbnail = '';
					$video_url_type = '';
					$select_slider_type = '';
					$post_detail_xml = get_post_meta($post->ID, 'post_detail_xml', true);
					if($post_detail_xml <> ''){
						$cp_post_xml = new DOMDocument ();
						$cp_post_xml->loadXML ( $post_detail_xml );
						$post_social = find_xml_value($cp_post_xml->documentElement,'post_social');
						$sidebars = find_xml_value($cp_post_xml->documentElement,'sidebar_post');
						$right_sidebar_post = find_xml_value($cp_post_xml->documentElement,'right_sidebar_post');
						$left_sidebar_post = find_xml_value($cp_post_xml->documentElement,'left_sidebar_post');
						$post_thumbnail = find_xml_value($cp_post_xml->documentElement,'post_thumbnail');
						$video_url_type = find_xml_value($cp_post_xml->documentElement,'video_url_type');
						$select_slider_type = find_xml_value($cp_post_xml->documentElement,'select_slider_type');			
					}
					?>
					<!-- Church Widget Popular Sermons Code -->
					<li> 
						<a class="play" href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-play-circle"></i></a>
						<div class="text-box"> 
							<strong class="title"><?php echo esc_html(get_the_title());?></strong>
							<a class="user" href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-user"></i><?php esc_attr(get_the_author()); ?></a>
							<a class="calendar" href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-calendar"></i><?php the_date();?></a>
						</div>
                    </li>
					<!-- Church Widget Code Popular Sermons END -->

				<?php endwhile;
				wp_reset_postdata();
				?>
			</ul>
<?php 
	echo '</div>';
	echo $after_widget;
	wp_reset_query();
		}
	}
add_action( 'widgets_init', create_function('', 'return register_widget("popular_sermons");') );?>