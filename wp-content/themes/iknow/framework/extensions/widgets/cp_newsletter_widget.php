<?php
class newsletter_widget extends WP_Widget
{
  function newsletter_widget()
  {
    $widget_ops = array('classname' => 'newsletter newsletter-box footer-box-1', 'description' => 'Newsletter and google feed widget to subscribe on website' );
    $this->WP_Widget('newsletter_widget', 'CrunchPress : Newsletter/Google Feed Widget', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	$title = $instance['title'];
	$show_name = isset( $instance['show_name'] ) ? esc_attr( $instance['show_name'] ) : '';	
	$news_letter_des = isset( $instance['news_letter_des'] ) ? esc_attr( $instance['news_letter_des'] ) : '';	
?>
  <p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
	 <?php esc_attr_e('Title:','crunchpress');?>  
	  <input class="widefat"  id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </label>
  </p>
  <!--<p>
  <label for="<?php echo $this->get_field_id('show_name'); ?>">
	  <?php esc_attr_e('Show Name:','crunchpress');?>
	  <select id="<?php echo $this->get_field_id('show_name'); ?>" name="<?php echo $this->get_field_name('show_name'); ?>" class="widefat">
			<option <?php if($show_name == 'Yes'){echo 'selected';}?>><?php esc_attr_e('Yes','crunchpress');?></option>
			<option <?php if($show_name == 'No'){echo 'selected';}?>><?php esc_attr_e('No','crunchpress');?></option>
      </select>
  </label>
  </p>-->  
  <p>
  <label for="<?php echo $this->get_field_id('news_letter_des'); ?>">
	 <?php esc_attr_e('Description:','crunchpress');?>
	  <textarea rows="2"  cols="35" class="widefat" id="<?php echo esc_textarea($this->get_field_id('news_letter_des')); ?>" name="<?php echo esc_textarea($this->get_field_name('news_letter_des')); ?>"><?php echo esc_textarea($news_letter_des); ?></textarea>
  </label>
  </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['show_name'] = $new_instance['show_name'];
		$instance['news_letter_des'] = $new_instance['news_letter_des'];
    return $instance;
  }
 
	function widget($args, $instance)
	{
		
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$show_name = isset( $instance['show_name'] ) ? esc_attr( $instance['show_name'] ) : '';
		$news_letter_des = isset( $instance['news_letter_des'] ) ? esc_attr( $instance['news_letter_des'] ) : '';		
		
		echo $before_widget;	
		// WIDGET display CODE Start
		
			echo $before_title;
			echo esc_html($title);
			echo $after_title;

			$newsletter_config = '';
			$feed_burner_text = '';
			$cp_newsletter_settings = get_option('newsletter_settings');
			if($cp_newsletter_settings <> ''){
				$cp_newsletter = new DOMDocument ();
				$cp_newsletter->loadXML ( $cp_newsletter_settings );
				$newsletter_config = find_xml_value($cp_newsletter->documentElement,'newsletter_config');
				$feed_burner_text = find_xml_value($cp_newsletter->documentElement,'feed_burner_text');
			}
			?>
		<form class="newsletter get-touch-form" id="frm_newsletter" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feed_burner_text ?>', 'popupwindow', 'scrollbars=yes,width=600,height=550');return true">
			<p>
			<?php 
				if($news_letter_des != ''){ 
					echo substr(esc_html($news_letter_des), 0, 120); 
					if ( strlen($news_letter_des) > 120 ) echo "..."; 
				}
			?>
			</p>
			<div class="field-set-section"> <input type="text" class="input-newsletter feedemail-input" name="email" onblur="this.value=this.value==''?'Enter your email':this.value;" onfocus="this.value=this.value=='Enter your email'?'':this.value" value="Enter your email" />
				<input type="hidden" value="<?php echo esc_attr($feed_burner_text) ?>" name="uri"/>
				<input type="hidden" name="loc" value="en_US"/>
				<button class="btn-search btn-submit-news" id="btn_newsletter" ><i class="fa fa-angle-double-right"></i></button>
			</div>
		</form>
	
	<?php 
	
	echo $after_widget;
	}
		
}
add_action( 'widgets_init', create_function('', 'return register_widget("newsletter_widget");') );?>