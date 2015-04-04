<?php session_start();?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
	<![endif]-->
	<?php
		//Favicon
		$header_favicon = get_themeoption_value('header_favicon','general_settings');
		$header_fav_link = get_themeoption_value('header_fav_link','general_settings');
		if($header_favicon <> ''){ 
			echo '<link rel="shortcut icon" href="'.esc_url($header_fav_link).'" />';
		}
	
	wp_head(); ?>
</head>
<?php $layout_class = ''; $select_layout_cp = ''; $select_layout_cp = get_themeoption_value('select_layout_cp','general_settings'); if($select_layout_cp == 'boxed_layout'){$layout_class = 'boxed_v_cp';}?>
<body id="home" <?php body_class($layout_class); ?>>
<!--Wrapper Start-->
<div class="wrapper" id="wrapper"> 
	
	<?php 
	//CP_SIGN_IN();
	//CP_SIGN_UP();
		//Print Header
		global $post, $post_id;
		if(isset($post)){
			$header_style = get_post_meta ( $post->ID, "page-option-top-header-style", true );
			print_header_html($header_style);
		}else{
			$header_style = '';
			print_header_html($header_style);
		}
		?>