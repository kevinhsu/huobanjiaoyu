<?php
	/*
	 * This file will generate 404 error page.
	 */	
get_header(); 


//Get Theme Options for Page Layout
$select_layout_cp = '';
$cp_general_settings = get_option('general_settings');
if($cp_general_settings <> ''){
	$cp_logo = new DOMDocument ();
	$cp_logo->loadXML ( $cp_general_settings );
	$select_layout_cp = find_xml_value($cp_logo->documentElement,'select_layout_cp');
}
?>

  
    <!--BANNER START-->
    <div class="page-heading">
    	<div class="container">
            <h2><?php esc_html_e('Error 404','crunchpress');?></h2>
            <p><?php esc_html_e('It seems we can not find what you are looking for.','crunchpress');?></p>
        </div>
    </div>
    <!--BANNER END
	
	
    <!--CONTANT START-->
    <div class="contant">
    	<div class="container">
        	<div class="error center-align">
                <p class="error-404">4<span><img src="<?php echo CP_PATH_URL?>/images/error.png" alt=""></span>4</p>
                <p class="ohh"><?php esc_html_e('Uh Oh! Looks like something broke.','crunchpress');?></p>
                <p class="away"><?php esc_html_e('Take me away','crunchpress');?> <span class="color"><?php esc_html_e('or','crunchpress');?></span> <?php esc_html_e('Report This','crunchpress');?></p>
            </div>
        </div>
    </div>
    <!--CONTANT END-->


<?php get_footer();?>
