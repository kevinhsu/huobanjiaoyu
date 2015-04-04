<?php

	/*	
	*	Crunchpress Portfolio Option File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		Crunchpress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) Crunchpress
	*	---------------------------------------------------------------------
	*	This file create and contains the portfolio post_type meta elements
	*	---------------------------------------------------------------------
	*/
	
	//FRONT END RECIPE LAYOUT
	$wooproduct_class = array("Full-Image" => array("index"=>"1", "class"=>"sixteen ", "size"=>array(1170,420), "size2"=>array(770, 400), "size3"=>array(570,300)));

	
	// Print Recipe item
	function print_ignition_item($item_xml){
		wp_reset_query();
		global $paged,$sidebar,$wooproduct_class,$post,$wp_query,$counter;
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		$sidebar_class = '';
		$layout_set_ajax = '';
		$item_type = 'Full-Image';
		// get the item class and size from array
		$item_class = $wooproduct_class[$item_type]['class'];
		$item_index = $wooproduct_class[$item_type]['index'];
		$full_content = find_xml_value($item_xml, 'show-full-news-post');
		if( $sidebar == "no-sidebar" ){
			$item_size = $wooproduct_class[$item_type]['size'];
			$sidebar_class = 'no_sidebar';
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$sidebar_class = 'one_sidebar';
			$item_size = $wooproduct_class[$item_type]['size2'];
		}else{
			$sidebar_class = 'two_sidebar';
			$item_size = $wooproduct_class[$item_type]['size3'];
		}
		
				
		// get the product meta value
		$header = find_xml_value($item_xml, 'header');
		$category = find_xml_value($item_xml, 'category');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');		
		
		$pagination = find_xml_value($item_xml, 'pagination');
		$category_name = '';
	
		// page header
		//if(!empty($header)){
			//echo '<h2>' . $header . '</h2><span class="border-line m-bottom"></span>';
		//}
		
	
		$quan = array();
		$quantity = '';
		$total = '';
		$currency = '';
		if($header <> ''){?><h2 class="h-style"><?php echo $header;?></h2><?php } ?>
			<div class="row-fluid">
			<?php
				if($category == '0'){
					query_posts(array(
						'posts_per_page'=> $num_fetch,
						'paged'			=> $paged,
						'post_type'   	=> 'ignition_product',
						'post_status'	=> 'publish',
						'order'			=> 'DESC',
					));
				}else{
					query_posts(array(
						'posts_per_page'=> $num_fetch,
						'paged'	=> $paged,
						'post_type'   => 'ignition_product',
						'tax_query' => array(
								array(
									'taxonomy' => 'project_category',
									'field' => 'term_id',
									'terms' => $category
								)
						),
						'post_status'      => 'publish',
						'order'						=> 'DESC',
					));
				}
				$counter_ignition = 0;
				while( have_posts() ){
					global $post;
					the_post();	
					
					$ignition_date = get_post_meta($post->ID, 'ign_fund_end', true);
					$ignition_datee = date('d-m-Y h:i:s',strtotime($ignition_date));
					
					$ign_project_id = get_post_meta($post->ID, 'ign_project_id', true);
					
					$ign_fund_goal = get_post_meta($post->ID, 'ign_fund_goal', true);
					
					$ign_product_image1 = get_post_meta($post->ID, 'ign_product_image1', true);
					
					$getPledge_cp = getPledge_cp($ign_project_id);
					$current_date = date('d-m-Y h:i:s');
					$project_date = new DateTime($ignition_datee);
					$current = new DateTime($current_date);
					$days = round(($project_date->format('U') - $current->format('U')) / (60*60*24));
					$item_class = '';
					if($counter_ignition % 4 == 0){ $item_class = 'first';}else{$item_class = "";}$counter_ignition++; ?>
					<!--Crowdfunding START-->
					<div class="span3 <?php echo esc_attr($item_class);?>">
						<div class="funding">
							<figure>
								<a href="<?php echo esc_url(get_permalink());?>"><img src="<?php echo esc_url($ign_product_image1);?>" alt=""></a>
							</figure>
							<div class="text">
								<h2><?php echo esc_html(get_the_title());?></h2>
								<p><?php 
									$ign_project_description = get_post_meta( $post->ID, "ign_project_description", true );
									echo substr(esc_html($ign_project_description),0,$num_excerpt);	
								?></p>
							</div>
							<div class="make-donation">
								<div class="funded">
									<p><?php esc_html_e('$','crunchpress');?><?php echo esc_attr(getTotalProductFund_cp($ign_project_id));?> <?php esc_html_e('Donated','crunchpress');?></p>
									<p class="funded-btn pull-right"><?php echo esc_attr(getPercentRaised_cp($ign_project_id));?>% <?php esc_html_e('Funded','crunchpress');?></p>
								</div>
								<div class="progress progress-info">
									<div class="bar" style="width: <?php echo esc_attr(getPercentRaised_cp($ign_project_id));?>%"></div>
								</div>
								<div class="donation-detail">
									<a href="<?php echo esc_url(get_permalink());?>" class="detail-btn"><?php esc_html_e('More Detail','crunchpress');?></a>
									<p class="or"><?php esc_html_e('Or','crunchpress');?></p>
									<?php if($days < 1){ echo '<a class="donate" href="'.esc_url(get_permalink()).'">'.esc_html__('Completed','crunchpress').'</a>';}else{ ?> <a class="donate" href="<?php echo esc_url(get_permalink());?>"><?php echo esc_attr($days).' ';  esc_html_e('Days Left','crunchpress') ;?></a><?php }?>
								</div>
							</div>
						</div>
					</div>
					<!--Crowdfunding END-->
				<?php
				} // End While 
				wp_reset_postdata();
				?>
			</div>		
			<!--Crowdfunding ROW END-->
		<div class="clear"></div>
		<?php
		if( find_xml_value($item_xml, "pagination") == "Yes"){	
			pagination();
		}
		wp_reset_query();		
	 }	

	function getTotalProductFund_cp($productid) {
		global $wpdb;		
		
		$sql = "Select SUM(prod_price) AS prod_price from ".$wpdb->prefix . "ign_pay_info where product_id='".$productid."'";
		
		$result = $wpdb->get_row($sql);
		if ($result->prod_price != NULL || $result->prod_price != 0)
			return $result->prod_price;
		else
			return 0;
	}

	function getProjectGoal_cp($project_id) {
		global $wpdb;
		$goal_return = array('');
		$goal_query = $wpdb->prepare('SELECT goal FROM '.$wpdb->prefix.'ign_products WHERE id=%d', $project_id);
		$goal_return = $wpdb->get_row($goal_query);
		if($goal_return <> ''){
			return $goal_return->goal;
		}
	}
	function getPledge_cp($project_id) {
		global $wpdb;

		$p_query = "SELECT count(*) as p_number FROM ".$wpdb->prefix . "ign_pay_info where product_id='".$project_id."'";
		//$goal_query = $wpdb->prepare('SELECT goal FROM '.$wpdb->prefix.'ign_products WHERE id=%d', $project_id);
		$p_counts = $wpdb->get_results($p_query);
		return $p_counts;
	}


	function getPercentRaised_cp($project_id) {
		global $wpdb;
		$total = getTotalProductFund_cp($project_id);
		$goal = getProjectGoal_cp($project_id);
		$percent = 0;
		if ($total > 0) {
			$percent = number_format($total/$goal*100, 2, '.', '');
		}
		return $percent;
	}
	
?>