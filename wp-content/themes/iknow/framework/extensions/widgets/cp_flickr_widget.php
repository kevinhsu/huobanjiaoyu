<?php
class flickr_Widget extends WP_Widget
{
  function flickr_Widget()
  {
    $widget_ops = array('classname' => 'flicker', 'description' => 'Show Flickr Images' );
    $this->WP_Widget('flickr_Widget', 'CrunchPress : Flickr Gallery Widget', $widget_ops);
  }
 
  function form($instance)
  {

    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	
	$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$type = empty($instance['type']) ? ' ' : apply_filters('type', $instance['type']);
	$flickr_id = empty($instance['flickr_id']) ? ' ' : apply_filters('flickr_id', $instance['flickr_id']);
	$count = empty($instance['count']) ? ' ' : apply_filters('count', $instance['count']);
	$display = empty($instance['display']) ? ' ' : apply_filters('display', $instance['display']);
	$size = empty($instance['size']) ? ' ' : apply_filters('size', $instance['size']);
	$copyright = empty($instance['copyright']) ? ' ' : apply_filters('copyright', $instance['copyright']);
	
	
?>
  <p>
  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
	 <?php esc_html_e('Title:','crunchpress');?>  
	  <input class="title" size="30" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
  </p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('type')); ?>">
	  <?php esc_html_e('Select Type:','crunchpress');?>
	  <select id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>" style="width:225px">
			<option <?php if($type == 'user'){echo 'selected';}?> value="user" ><?php esc_html_e('User','crunchpress');?></option>
			<option <?php if($type == 'group'){echo 'selected';}?> value="group" ><?php esc_html_e('Group','crunchpress');?></option>
      </select>
  </label>
  </p>    
  <p>
  <label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>">
	  <?php esc_html_e('Flickr ID','crunchpress');?>
	<input class="title" size="30" id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" type="text" value="<?php echo esc_attr($flickr_id); ?>" />
  </label>
  </p>
  <p>
  <label for="<?php echo esc_attr($this->get_field_id('count')); ?>">
	  <?php esc_html_e('Number of Images','crunchpress');?>
	<input class="title" size="30" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>" type="text" value="<?php echo esc_attr($count); ?>" />
  </label>
  </p>
	<p>
  <label for="<?php echo esc_attr($this->get_field_id('display')); ?>">
	  <?php esc_html_e('Display Type:','crunchpress');?>
	  <select id="<?php echo esc_attr($this->get_field_id('display')); ?>" name="<?php echo esc_attr($this->get_field_name('display')); ?>" style="width:225px">
			<option <?php if($display == 'latest'){echo 'selected';}?> value="latest" ><?php esc_html_e('Latest','crunchpress');?></option>
			<option <?php if($display == 'random'){echo 'selected';}?> value="random" ><?php esc_html_e('Random','crunchpress');?></option>
      </select>
  </label>
  </p>
  <p>
  <label for="<?php echo esc_attr($this->get_field_id('size')); ?>">
	  <?php esc_html_e('Display Size:','crunchpress');?>
	  <select id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>" style="width:225px">
			<option <?php if($size == 's'){echo 'selected';}?> value="latest" ><?php esc_html_e('Standard','crunchpress');?></option>
			<option <?php if($size == 't'){echo 'selected';}?> value="random" ><?php esc_html_e('Thumbnail','crunchpress');?></option>
			<option <?php if($size == 'm'){echo 'selected';}?> value="random" ><?php esc_html_e('Medium','crunchpress');?></option>
      </select>
  </label>
  </p>
	<?php
	}
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['type'] = $new_instance['type'];
		$instance['flickr_id'] = $new_instance['flickr_id'];
		$instance['count'] = $new_instance['count'];
		$instance['display'] = $new_instance['display'];
		$instance['size'] = $new_instance['size'];
		$instance['copyright'] = $new_instance['copyright'];
		
    return $instance;
  }
 
	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$type = empty($instance['type']) ? ' ' : apply_filters('type', $instance['type']);
		$flickr_id = empty($instance['flickr_id']) ? ' ' : apply_filters('flickr_id', $instance['flickr_id']);
		$count = empty($instance['count']) ? ' ' : apply_filters('count', $instance['count']);
		$display = empty($instance['display']) ? ' ' : apply_filters('display', $instance['display']);
		$size = empty($instance['size']) ? ' ' : apply_filters('size', $instance['size']);
		$copyright = empty($instance['copyright']) ? ' ' : apply_filters('copyright', $instance['copyright']);
		echo $before_widget;
		// WIDGET display CODE Start
		if (!empty($title))
			echo $before_title;
			echo esc_attr($title);
			echo $after_title;
			?>

<!--<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=10&display=latest&size=t&layout=x&source=user&user=18867172%40N00"></script>-->
<!--<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $count;?>&display=<?php echo $display;?>&size=<?php echo $size;?>&layout=x&source=<?php echo $type;?>&$type=<?php echo $flickr_id;?>"></script>-->


		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $count;?>&#38;display=<?php echo $display;?>&#38;size=t&#38;layout=x&#38;source=<?php echo $type;?>&#38;user=<?php echo $flickr_id;?>"></script>

<!-- End of Flickr Badge -->
	<?php
		 
		wp_reset_query();
		echo $after_widget;
	}
		
}
add_action( 'widgets_init', create_function('', 'return register_widget("flickr_Widget");') );?>