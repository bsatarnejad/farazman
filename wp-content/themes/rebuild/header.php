<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ReBuild
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<?php $rebuild_data =  rebuild_globals(); ?>
      
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
   	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
    <!-- Mobile Specific Metas
  ================================================== -->
    
	<?php
		// If WP4.3+ and no site_icon is set - show custom
		if ( function_exists( 'has_site_icon' ) && !has_site_icon() ) { ?>
			<link rel="shortcut icon" href="<?php echo esc_attr($rebuild_data['favicon']); ?>" type="image/x-icon">	
		<?php }
		// If before WP4.3 - show custom
		if ( ! function_exists( 'wp_site_icon' ) ) { ?>
			<link rel="shortcut icon" href="<?php echo esc_attr($rebuild_data['favicon']); ?>" type="image/x-icon">
	<?php } ?>
	
	<?php if($rebuild_data['check_responsive'] == 1) { ?><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"><?php } ?>    
  	<?php if($rebuild_data['iphone_icon'] != "") { ?><link rel="apple-touch-icon" href="<?php echo esc_attr($rebuild_data['iphone_icon']); ?>"><?php } ?>    
    <?php if($rebuild_data['iphone_icon_retina'] != "") { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo  esc_attr($rebuild_data['iphone_icon_retina']); ?>"><?php } ?>   
    <?php if($rebuild_data['ipad_icon'] != "") { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo  esc_attr($rebuild_data['ipad_icon']); ?>"><?php } ?>    
    <?php if($rebuild_data['ipad_icon_retina'] != "") { ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo  esc_attr($rebuild_data['ipad_icon_retina']); ?>"><?php } ?>
	<!-- CSS
  ================================================== -->  
    
    <style>
	<?php echo esc_attr($rebuild_data['custom_css_style']); // Space for custom css code ?>
	</style>
    
    <?php wp_head(); ?>
    
</head>  

<body <?php body_class(); ?>>

	
	<?php 
	//Body Start Hook------------------------------------//
	do_action("rebuild_body_start");	
	//EOF------------------------------------------------//
	?>