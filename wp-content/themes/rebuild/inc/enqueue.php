<?php
function rebuild_scripts() {  
	
		/*---------------- Register JS Script ------------------------*/		
		
		wp_enqueue_script('rebuild-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-respond', get_template_directory_uri() . '/vendor/respond.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-appear', get_template_directory_uri() . '/vendor/jquery.appear.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-prettyPhoto', get_template_directory_uri() . '/vendor/prettyPhoto/jquery.prettyPhoto.js', 'jquery','null',false);
		wp_enqueue_script('rebuild-form-validator', get_template_directory_uri() . '/vendor/form-validator/jquery.form-validator.min.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-flexslider', get_template_directory_uri() . '/vendor/flexslider/jquery.flexslider.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-isotope', get_template_directory_uri() . '/vendor/isotope/jquery.isotope.min.js', 'jquery','null',true);		
		wp_enqueue_script('rebuild-modernizr', get_template_directory_uri() . '/vendor/modernizr.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-velocity', get_template_directory_uri() . '/vendor/velocity.min.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-owl', get_template_directory_uri() . '/vendor/owl/owl.carousel.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-plugins', get_template_directory_uri() . '/js/plugins.js', 'jquery','null',true);
		wp_enqueue_script('rebuild-theme', get_template_directory_uri() . '/js/theme.js', 'jquery','null',true);		
		wp_enqueue_script('rebuild-google-maps','https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false', array(), null, false);		

		/*---------------- Enqueue JS Script ------------------------*/

		
		$ajaxurl = admin_url('admin-ajax.php');
		$ajax_nonce = wp_create_nonce('MailChimp');
		wp_localize_script( 'jquery-core', 'ajaxVars', array( 'ajaxurl' => $ajaxurl, 'ajax_nonce' => $ajax_nonce ) );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
}


//Google Font Enqueue

function rebuild_google_fonts() {
	
	$rebuild_data =  rebuild_globals();
	
	$fonts_url = '';
	
	
	/*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */

    if ( 'off' !== _x( 'on', 'Google Body font: on or off', 'rebuild' ) ) :
		$font_families[]= esc_attr($rebuild_data['google_body_font']). ":400,400italic,700,700italic";
	endif;
	
	if ( 'off' !== _x( 'on', 'Google Menu font: on or off', 'rebuild' ) ) :
		$font_families[]= esc_attr($rebuild_data['google_menu_font']). ':400,400italic,700,700italic';
	endif;
    
	if ( 'off' !== _x( 'on', 'Google Headings font: on or off', 'rebuild' ) ) :
    	$font_families[]= esc_attr($rebuild_data['google_headings_font']). ':400,400italic,700,700italic';
	endif;
    
	if ( 'off' !== _x( 'on', 'Google Footer Headings font: on or off', 'rebuild' ) ) :
    	$font_families[]= esc_attr($rebuild_data['google_body_font']). ':400,400italic,700,700italic';
	endif;
    
    if ( 'off' !== _x( 'on', 'Google Manual font: on or off', 'rebuild' ) ) :
		$font_families[]= esc_attr($rebuild_data['google_font_manual_load']). ':400,400italic,700,700italic'; 
	endif;
	
	 if ( 'off' !== _x( 'on', 'Google Manual font 2: on or off', 'rebuild' ) ) :
		$font_families[]= esc_attr($rebuild_data['google_font_manual_load_2']). ':400,400italic,700,700italic'; 
	endif;
		
		
		 
	$query_args = array(
	'family' => urlencode( implode( '|', $font_families ) ),
	'subset' => urlencode( 'latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' ),
	);
		 
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
	 
	return esc_url_raw( $fonts_url );
}

//EOF


function rebuild_styles()  
{  
	$rebuild_data =  rebuild_globals();
	$theme_color=esc_attr($rebuild_data['theme_color']);
	$theme_base_color=esc_attr($rebuild_data['theme_base_color']);

	/*---------------- Register CSS Styles ------------------------*/
	wp_enqueue_style( 'rebuild-skeleton', get_template_directory_uri() . '/css/skeleton.css', array(), '1', 'all' );
	wp_enqueue_style( 'rebuild-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css', array(), '1', 'all' );	
	wp_enqueue_style( 'rebuild-theme-elements', get_template_directory_uri() . '/css/theme-elements.css', array(), '1', 'all' );
	wp_enqueue_style( 'rebuild-theme-responsive', get_template_directory_uri() . '/css/theme-responsive.css', array(), '1', 'all' );
	wp_enqueue_style( 'rebuild-plugins', get_template_directory_uri() . '/css/plugins.css', array(), '1', 'all' );	
	wp_enqueue_style( 'rebuild-flexslider', get_template_directory_uri() . '/vendor/flexslider/flexslider.css', array(), '1', 'all' );
	wp_enqueue_style( 'rebuild-prettyPhoto', get_template_directory_uri() . '/vendor/prettyPhoto/prettyPhoto.css', array(), '1', 'all' );
	wp_enqueue_style( 'rebuild-owl', get_template_directory_uri() . '/vendor/owl/owl.carousel.min.css', array(), '1', 'all' );
	wp_enqueue_style( 'rebuild-vc-style', get_template_directory_uri() . '/css/vc_style.css', array(), '1', 'all' );
	wp_enqueue_style( 'rebuild-google-fonts', rebuild_google_fonts(), array(), null );
	
	
	if (($theme_color && $theme_color!="#ffb300") or ($theme_base_color && $theme_base_color!="#333") ):
		wp_enqueue_style( 'rebuild-dynamic', get_template_directory_uri() . '/css/dynamic_rebuild.css', array(), '1', 'all' );
		
		if($theme_color=="#ffb300"):
		wp_enqueue_style( 'rebuild-skin', get_template_directory_uri() . '/css/skins/sun.css', array(), '1', 'all' );
		endif;
		
	else:

		if(is_page('home-cleaner')) {
			wp_enqueue_style( 'rebuild-skyblue', get_template_directory_uri() . '/css/skins/skyblue.css', array(), '1', 'all' );
		}elseif(is_page('home-carpenter')) {
			wp_enqueue_style( 'rebuild-orange', get_template_directory_uri() . '/css/skins/orange.css', array(), '1', 'all' );
		}elseif(is_page('home-green')) {
			wp_enqueue_style( 'rebuild-green', get_template_directory_uri() . '/css/skins/green.css', array(), '1', 'all' );
		}elseif(is_page('home-consult')) {
			wp_enqueue_style( 'rebuild-blue', get_template_directory_uri() . '/css/skins/blue.css', array(), '1', 'all');
		/*}elseif(is_page('home-other')) {
			wp_enqueue_style( 'rebuild-orange', get_template_directory_uri() . '/css/skins/orange.css', array(), '1', 'all' );
		}elseif(is_page('home-other')) {
			wp_enqueue_style( 'rebuild-orangebright', get_template_directory_uri() . '/css/skins/orangebright.css', array(), '1', 'all' );
		}elseif(is_page('header-other')) {
			wp_enqueue_style( 'rebuild-lightgreen', get_template_directory_uri() . '/css/skins/lightgreen.css', array(), '1', 'all' );
		}elseif(is_page('header-4')) {
			wp_enqueue_style( 'rebuild-torquze', get_template_directory_uri() . '/css/skins/torquze.css', array(), '1', 'all' );
		}elseif(is_page('home-other')) {
			wp_enqueue_style( 'rebuild-greenish', get_template_directory_uri() . '/css/skins/greenish.css', array(), '1', 'all' );*/
		}else{
			wp_enqueue_style( 'rebuild-skin', get_template_directory_uri() . '/css/skins/sun.css', array(), '1', 'all' );
		}
		
		
	endif;
	
	
	//Skin Color
	
	
	
	//EOF
	
	
	if (!wp_is_mobile()):
		wp_enqueue_style( 'rebuild-theme-animate', get_template_directory_uri() . '/css/theme-animate.css', array(), '1', 'all' );
	endif;
	
	function rebuild_ie_style_sheets () {
	wp_enqueue_style( 'rebuild-ie8', get_template_directory_uri() . '/css/ie.css'  );
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'lte IE 9' );
	}
	
	add_action ('wp_enqueue_scripts','rebuild_ie_style_sheets');
	
		
	// Main Stylesheet
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' ); 
	
}  
add_action( 'wp_enqueue_scripts', 'rebuild_styles', 1 ); 
add_action( 'wp_enqueue_scripts', 'rebuild_scripts' ); 
	//----------------------------------------------------------------------------
	//-----------Admin Colorpicker 
	//----------------------------------------------------------------------------
	add_action( 'admin_enqueue_scripts', 'rebuild_enqueue_color_picker' );
	function rebuild_enqueue_color_picker( $hook_suffix ) {
		// first check that $hook_suffix is appropriate for your admin page		
    	wp_enqueue_script( 'rebuild-walker-menu', get_template_directory_uri().'/inc/menu-walker/walker_menu.js', false, true );
		wp_enqueue_style( 'rebuild-walker-menu', get_template_directory_uri().'/inc/menu-walker/walker_menu.css', false, true );
		wp_enqueue_style( 'rebuild-font-awesome-loader', get_template_directory_uri() . '/fonts/font-awesome.min.css', array(), '1', 'all' );
		
	}
	
	add_action( 'init', 'rebuild_add_editor_styles' );
	function rebuild_add_editor_styles() {
		add_editor_style( get_stylesheet_uri() );
	}
		
 
?>