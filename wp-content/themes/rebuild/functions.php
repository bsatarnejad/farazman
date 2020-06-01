<?php
	/**
	 * rebuild functions and definitions
	 *
	 * @package rebuild
	 */
	 	 
	/* ======================================================================== */
	/* Includes																	*/
	/* ======================================================================== */		
		
		/* ------------------------------------------------------ */
		/* Include php files								      */
		/* -------------------------------------------------------*/
		require get_template_directory() . '/inc/enqueue.php'; // Includse JS and CSS 
		require get_template_directory() . '/inc/multi-post-image/multiple-featured-images.php'; // Include Multi Featuered Image 		
		require get_template_directory() . '/inc/breadcrumb.php'; //Breadcrumbs
		require get_template_directory() . '/inc/class-tgm-plugin-activation.php'; //Plugins activator
		require get_template_directory() . '/inc/custom_js.php'; // Load Custom JS
		require get_template_directory() . '/inc/custom_css.php'; // Load Custom CSS
		require get_template_directory() . '/inc/hooks.php'; // Hooks
		require get_template_directory() . '/inc/ajax_auth_function.php'; // Login & registeration
		require get_template_directory() . '/inc/menu-walker/walker_menu.php'; // Menu Walker
		
		/*------- Load Widget--------------------------------*/
		
		require get_template_directory() . '/widgets/recent-posts-widget.php'; // Recent Post
		require get_template_directory() . '/widgets/contact-widget.php'; // Contact
		require get_template_directory() . '/widgets/video-widget.php'; // Video
		require get_template_directory() . '/widgets/subscribe_widget.php'; // Flickr
		require get_template_directory() . '/widgets/quote-request-widget.php'; // Flickr
		require get_template_directory() . '/widgets/download-widget.php'; // Flickr
		require get_template_directory() . '/widgets/menu-widget.php'; // Flickr
		
		/*------- Implement the Custom Header feature--------*/
		require get_template_directory() . '/inc/custom-header.php';
		
		/*------- Custom template tags for this theme-------*/
		require get_template_directory() . '/inc/template-tags.php';
		
		/*------- Custom functions that act independently of the theme templates -------*/
		require get_template_directory() . '/inc/extras.php';
		
		/*-------- Customizer additions --------------------*/
		require get_template_directory() . '/inc/customizer.php';
		
		/*-------- Load Jetpack compatibility file ----------*/
		require get_template_directory() . '/inc/jetpack.php';
		
	
		/*-------- Woocommerce ----------*/
		require get_template_directory() . '/woocommerce/woocommerce.php';	
		
		
		/* Global Variables*/
		if (!function_exists('rebuild_globals')) {
		function rebuild_globals() {			
			global $rebuild_data;				
			return $rebuild_data;		
		}
		}
		
		/* ------------------------------------------------------ */
		/* Include Meta Box Script 								  */
		/* -------------------------------------------------------*/
		define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/inc/meta-box' ) );
		define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/inc/meta-box' ) );
	
		require_once get_template_directory() . '/inc/meta-box/meta-box.php';
		require get_template_directory() .'/inc/meta-boxes.php'; // SMOF
		
		$rebuild_data = rebuild_globals(); 
		
		/* ------------------------------------------------------ */
		/* Include Slightly Modified Options Framework (SMOF)     */
		/* -------------------------------------------------------*/
		include_once get_template_directory().'/admin/index.php'; // SMOF		
		
		
		/* ------------------------------------------------------ */
		/* Theme Updates 								  */
		/* -------------------------------------------------------*/
		
		if ((isset($rebuild_data['envato_username'])) & (isset($rebuild_data['envato_apikey']))): 
			$username = esc_attr($rebuild_data['envato_username']);
			$apikey = esc_attr($rebuild_data['envato_apikey']);
			
			require get_template_directory(). '/inc/updates/envato-wp-theme-updater.php';
			Envato_WP_Theme_Updater::init( $username, $apikey, 'janxcode' );
			
		endif;	
		
		
	/* ======================================================================== */
	/* TGM Plugin Activation							   		      	        */
	/* ======================================================================== */		
	
	add_action( 'tgmpa_register', 'rebuild_register_required_plugins' );
	
	function rebuild_register_required_plugins() {
			/**
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$plugins = array(
		
				array(
					'name' 					=> esc_html__('Rebuild Framework','rebuild'),
					'slug' 					=> 'rebuild-framework',
					'source'				=> get_template_directory() . '/plugins/rebuild-framework.zip',
					'required' 				=> true,
					'version'				=> '1.0',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				),
				array(
					'name' 					=> esc_html__('Revolution Slider','rebuild'),
					'slug' 					=> 'revslider',
					'source'				=> get_template_directory() . '/plugins/revslider.zip',
					'required' 				=> true,
					'version'				=> '5.2.3.5',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				),
				array(
					'name' 					=> esc_html__('Contact Form 7','rebuild'),
					'slug' 					=> 'contact-form-7',
					'source'				=> get_template_directory() . '/plugins/contact-form.zip',
					'required' 				=> true,
					'version'				=> '4.3.1',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				),				
				
				array(
					'name'               	=> esc_html__('WooCommerce','rebuild'),
					'slug'               	=> 'woocommerce', 
					'source'             	=> 'https://downloads.wordpress.org/plugin/woocommerce.2.5.5.zip', 
					'required'           	=> false, 
					'version'            	=> '2.5.2',
					'force_activation'   	=> false, 
					'force_deactivation' 	=> false, 
					'external_url'       	=> '', 
				),				
				
				array(
					'name' 					=> esc_html__( 'Visual Composer', 'rebuild' ),
					'slug' 					=> 'js-composer',
					'source'				=> get_template_directory() . '/plugins/js_composer.zip',
					'required' 				=> true,
					'version'				=> '4.11.2.1',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				),
				
				array(
					'name' 					=> esc_html__( 'Essential_Grid', 'rebuild' ),
					'slug' 					=> 'essential-grid',
					'source'				=> get_template_directory() . '/plugins/essential-grid.zip',
					'required' 				=> true,
					'version'				=> '2.0.9.1',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				),
				array(
					'name' 					=> esc_html__( 'VC Ultimate Addons', 'rebuild' ),
					'slug' 					=> 'vc-ultimate-addons',
					'source'				=> get_template_directory() . '/plugins/vc-ultimate-addons.zip',
					'required' 				=> true,
					'version'				=> '3.16.5',
					'force_activation' 		=> false,
					'force_deactivation'	=> false,
					'external_url' 			=> '',
				)	
										
			);
		
		
			/**
			 * Array of configuration settings. Amend each line as needed.
			 * If you want the default strings to be available under your own theme domain,
			 * leave the strings uncommented.
			 * Some of the strings are added into a sprintf, so see the comments at the
			 * end of each line for what each argument will be.
			 */
			$config = array(
				'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',                      // Default absolute path to bundled plugins.
				'menu'         => 'tgmpa-install-plugins', // Menu slug.
				'parent_slug'  => 'themes.php',            // Parent menu slug.
				'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  => true,                    // Show admin notices or not.
				'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => false,                   // Automatically activate plugins after installation or not.
				'message'      => '',                      // Message to output right before the plugins table.
				'strings'      		=> array(
				'page_title'                       			=> esc_html__( 'Install Required Plugins', 'rebuild' ),
				'menu_title'                       			=> esc_html__( 'Install Plugins', 'rebuild' ),
				'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'rebuild' ), // %1$s = plugin name
				'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'rebuild' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'rebuild'  ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'rebuild'), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'rebuild'), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'rebuild'), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'rebuild'), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'rebuild'), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'rebuild'), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'rebuild'), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'rebuild'),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'rebuild'),
				'return'                           			=> esc_html__( 'Return to Required Plugins Installer','rebuild'),
				'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'rebuild'),
				'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'rebuild'), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
				)
			);
		
			tgmpa( $plugins, $config );
		
		}
	
	
	/* ======================================================================== */
	/* Define Multiple Featuered Images			      	    					*/
	/* ======================================================================== */
		if (class_exists('kdMultipleFeaturedImages')) {
		
		$i = 2;
		$rebuild_data['posts_slideshow_number'] = 3;
		
			while($i <= $rebuild_data['posts_slideshow_number']) {
	        $args = array(
	                'post_type' => 'page',  
					'id' => 'featured-image-'.$i,    
	                'labels' => array(
	                    'name'      => esc_html__('Featured image ','rebuild').$i,
	                    'set'       => 'Set featured image '.$i,
	                    'remove'    => 'Remove featured image '.$i,
	                    'use'       => 'Use as featured image '.$i,
	                )
	        );
	        new kdMultipleFeaturedImages($args);
	        $args = array(
	                'post_type' => 'post',
					'id' => 'featured-image-'.$i,      
	                'labels' => array(
	                    'name'      => esc_html__('Featured image ','rebuild').$i,
	                    'set'       => 'Set featured image '.$i,
	                    'remove'    => 'Remove featured image '.$i,
	                    'use'       => 'Use as featured image '.$i,
	                )
	        );
	        new kdMultipleFeaturedImages($args);
	        $args = array(
	                'post_type' => 'portfolio',
					'id' => 'featured-image-'.$i,      
	                'labels' => array(
	                    'name'      => esc_html__('Featured image ','rebuild').$i,
	                    'set'       => 'Set featured image '.$i,
	                    'remove'    => 'Remove featured image '.$i,
	                    'use'       => 'Use as featured image '.$i,
	                )
	        );
	        new kdMultipleFeaturedImages($args);
	        $i++;
    	}
		
					 
		};
		
		
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}
	if ( ! function_exists( 'rebuild_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */ 
	 
	function rebuild_setup() {	
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on expo-test, use a find and replace
	 * to change 'expo-test' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rebuild', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// Declare WooCommerce support
	add_theme_support( 'woocommerce' );	
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	
	
	/*----------- Add post thumbnail functionality-----------------*/
	add_theme_support( 'post-thumbnails' );
	
	if ( function_exists( 'add_image_size' ) ) { 
		
		/*--------*/
		add_image_size( 'rebuild_max', 1500, false ); // Rebuild Max
		add_image_size( 'rebuild_blog', 890, 495, true ); // Blog Image
		add_image_size( 'rebuild_small-blog', 380, 256, true ); // Small Blog Image
		add_image_size( 'rebuild_testimonial', 176, 178, true ); // Testimonial
		add_image_size( 'rebuild_port-1', 390, 390, true ); // Portfolio Big
		add_image_size( 'rebuild_port-2', 218, 218, true ); // Portfolio Small
		add_image_size( 'rebuild_service', 887, 466, true ); // Big Service
		add_image_size( 'rebuild_small-thumbnail', 118, 87, true ); // Small thumnail
		add_image_size( 'rebuild_project-stat', 580, 347, true ); // project stats
		add_image_size( 'rebuild_project-statthumb', 180, 116, true ); // project stats thumb
		add_image_size( 'rebuild_service-slider', 886, 465, true ); // service slider
		add_image_size( 'rebuild_projects', 282, 176, true ); // small project
	}
	
	/*------------------ Register Navigation --------------------*/
	register_nav_menu('primary_navigation', 'Primary Navigation');
	register_nav_menu('onepage_navigation', 'One-Page Navigation');
	
	
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	add_theme_support( 'custom-background', apply_filters( 'rebuild_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	
	}
	
	endif; // rebuild_setup
	
	add_action( 'after_setup_theme', 'rebuild_setup' );
	 
	 
		 
	 
	 function rebuild_comment( $comment, $args, $depth ) {
	   $GLOBALS['comment'] = $comment; ?>
       
       
       <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment">
                <div class="img-thumbnail">
					<?php echo get_avatar($comment, $size = '50'); ?>
                </div>
                <div class="comment-block">
                    <div class="comment-arrow"></div>
                    <span class="comment-by">
                        <strong><?php printf( esc_html__( '%s', 'rebuild'), get_comment_author_link() ) ?></strong>
                        <span class="right">
                            <span> <a href="#"><i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></span>
                        </span>
                    </span>
                    <p><?php comment_text() ?></p>
                    
					<?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'rebuild' ) ?></em>
                    <br />
                    <?php endif; ?>
                    
                    <span class="date right"><?php printf(esc_html__('%1$s at %2$s', 'rebuild'), get_comment_date(),  get_comment_time() ) ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'rebuild'),'  ','' ) ?></span>
                </div>
            </div>
         </li>
        
	<?php
	}
	
	/* ======================================================================== */
	/* Soundcloud									           	    */
	/* ======================================================================== */
	function rebuild_add_oembed_soundcloud(){
		wp_oembed_add_provider( 'http://soundcloud.com/*', 'http://soundcloud.com/oembed' );
	}
	add_action('init','rebuild_add_oembed_soundcloud');
	
					
	/* ======================================================================== */
	/* Excerpt character limit									           	    */
	/* ======================================================================== */
	
		function rebuild_excerpt($limit) {
			$excerpt = explode(' ', get_the_excerpt(), $limit);
			if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
			} else {
			$excerpt = implode(" ",$excerpt);
			}	
			$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
			return $excerpt;
		}
			 
		function rebuild_content($limit) {
			$content = explode(' ', get_the_content(), $limit);
			if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'...';
			} else {
			$content = implode(" ",$content);
			}	
			$content = preg_replace('/\[.+\]/','', $content);
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			return $content.'<readmore class="cl-effect-1">
					<a href="'.esc_url(the_permalink()) .'" rel="bookmark" title="Permanent Link to '.the_title().'">'. esc_html_e('Read More', 'rebuild').'</a>
					</readmore>';
		}
			
	
	/* ======================================================================== */
	/* Regsiter Widgets										           	        */
	/* ======================================================================== */	
	
	///////////////////////Footer Widgets ////////////////////////////
	function rebuild_register_sidebars() {		
	
			///////////////////////Sidebar Widgets ////////////////////////////
			register_sidebar( 
			array(
				'name'          => esc_html__('General Widget','rebuild'),
				'id'            => 'general-sidebar',
				'before_widget' => '<div class="jx-rebuild-sidebar-block mb40 widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="jx-rebuild-section-title-2"><div class="jx-rebuild-title jx-rebuild-uppercase small-text">',
				'after_title'   => '</div><div class="jx-rebuild-seperator-hr"></div></div>',
			)
			);
			
			register_sidebar( 
			array(
				'name'          => esc_html__('Shop Sidebar','rebuild'),
				'id'            => 'rebuild-sidebar-shop',
				'before_widget' => '<div class="jx-rebuild-sidebar-block mb40 widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="jx-rebuild-section-title-2"><div class="jx-rebuild-title jx-rebuild-uppercase small-text">',
				'after_title'   => '</div><div class="jx-rebuild-seperator-hr"></div></div>',
			)
			);
			
			register_sidebar( 
			array(
				'name'          => esc_html__('Service Sidebar','rebuild'),
				'id'            => 'rebuild-sidebar-service',
				'before_widget' => '<div class="jx-rebuild-sidebar-block mb40 widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="jx-rebuild-section-title-2"><div class="jx-rebuild-title jx-rebuild-uppercase small-text">',
				'after_title'   => '</div><div class="jx-rebuild-seperator-hr"></div></div>',
			)
			);
			
			///////////////////////Footer Widgets ////////////////////////////
			register_sidebar( 
			array(
				'name'          => esc_html__('Footer Widget 01','rebuild'),
				'id'            => 'rebuild-footer-1',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="jx-rebuild-footer-title">',
				'after_title'   => '</div>',
			)
			);
			register_sidebar( 
			array(
				'name'          => esc_html__('Footer Widget 02','rebuild'),
				'id'            => 'rebuild-footer-2',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="jx-rebuild-footer-title">',
				'after_title'   => '</div>',
			)
			);
			register_sidebar( 
			array(
				'name'          => esc_html__('Footer Widget 03','rebuild'),
				'id'            => 'rebuild-footer-3',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="jx-rebuild-footer-title">',
				'after_title'   => '</div>',
			)
			);
			register_sidebar( 
			array(
				'name'          => esc_html__('Footer Widget 04','rebuild'),
				'id'            => 'rebuild-footer-4',
				'before_widget' => '<div class="widget"><div id="%1$s" class="%2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<div class="jx-rebuild-footer-title">',
				'after_title'   => '</div>',
			)
			);
	
			
	}
	add_action( 'widgets_init', 'rebuild_register_sidebars' );
	
	
	/* ====================================================== */
	/* Pagination 											  */
	/* ====================================================== */
	function rebuild_pagination($pages = '', $range = 4) {
		$showitems = ($range * 2)+1;
		
			
		global $paged;
		
		if(empty($paged)) $paged = 1;
		
		if($pages == '') {
			
			global $wp_query;
			
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}
		
		if(1 != $pages) {
			
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link(1))."'>&laquo; " . esc_html__('First', 'rebuild') . "</a>";
			if($paged > 1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($paged - 1))."'>&lsaquo; " . esc_html__('Previous', 'rebuild') . "</a>";
			
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? "<span class='page-numbers current'>".$i."</span>":"<a href='".esc_url(get_pagenum_link($i))."' class='page-numbers' >".$i."</a>";
				}
			}
		
			
		}
	}	
	
	
	//Retina Support
	add_filter( 'wp_generate_attachment_metadata', 'rebuild_retina_support_attachment_meta', 10, 2 );
	/**
	 * Retina images
	 *
	 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
	 */
	function rebuild_retina_support_attachment_meta( $metadata, $attachment_id ) {
		foreach ( $metadata as $key => $value ) {
			if ( is_array( $value ) ) {
				foreach ( $value as $image => $attr ) {
					if ( is_array( $attr ) )
					rebuild_retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true);
				}
			}
		}
	 
		return $metadata;
	}
	
	/**
	 * Create retina-ready images
	 *
	 * Referenced via retina_support_attachment_meta().
	 */
	function rebuild_retina_support_create_images( $file, $width, $height, $crop = false ) {
		if ( $width || $height ) {
			$resized_file = wp_get_image_editor( $file );
			if ( ! is_wp_error( $resized_file ) ) {
				$filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
	 
				$resized_file->resize( $width * 2, $height * 2, $crop );
				$resized_file->save( $filename );
	 
				$info = $resized_file->get_size();
	 
				return array(
					'file' => wp_basename( $filename ),
					'width' => $info['width'],
					'height' => $info['height'],
				);
			}
		}
		return false;
	}
	
	add_filter( 'delete_attachment', 'rebuild_delete_retina_support_images' );
		/**
		 * Delete retina-ready images
		 *
		 * This function is attached to the 'delete_attachment' filter hook.
		 */
	function rebuild_delete_retina_support_images( $attachment_id ) {
		$meta = wp_get_attachment_metadata( $attachment_id );
		if ( $meta ) {
		$upload_dir = wp_upload_dir();
		$path = pathinfo( $meta['file'] );
		foreach ( $meta as $key => $value ) {
			if ( 'sizes' === $key ) {
				foreach ( $value as $sizes => $size ) {
					$original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
					$retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
					if ( file_exists( $retina_filename ) )
						unlink( $retina_filename );
					}
				}
			}
		}
	}
	
	/*====================HEX to RGBA =====================*/
	function rebuild_hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
		   if(strlen($hex) == 3) {
			  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
			  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
			  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		   } else {
			  $r = hexdec(substr($hex,0,2));
			  $g = hexdec(substr($hex,2,2));
			  $b = hexdec(substr($hex,4,2));
		   }
		   $rgb = array($r, $g, $b);
		   //return implode(",", $rgb); // returns the rgb values separated by commas
		   return $rgb; // returns an array with the rgb values
	}
	
	
	//===========================================================================
	//======================Woocommerce
	//===========================================================================
	
	if ( class_exists( 'WooCommerce' ) ) {
	 	add_filter( 'loop_shop_columns', 'rebuild_product_columns', 5);
		add_filter('body_class', 'rebuild_body_class');
	}
	
	 
        function rebuild_product_columns($columns) {
            if ( is_shop() || is_product_category() || is_product_tag() ) {
                
				$rebuild_data = rebuild_globals(); 
								
				if(($rebuild_data['woo_layout'] == 'no-sidebar') & ($rebuild_data['woocoomerce_coulmns']=="3")):
				return 4;
				elseif (isset($rebuild_data['woocoomerce_coulmns']) & $rebuild_data['woocoomerce_coulmns']!='' ):
				return $rebuild_data['woocoomerce_coulmns'];
				else:
				return 4;
				endif;
            }
        }
		
	
		function rebuild_body_class($classes) {
			$rebuild_data = rebuild_globals(); 
			
			if ( is_woocommerce()) {				
				if($rebuild_data['woocoomerce_coulmns']=="3"):
					$classes[] = 'product-columns-3';				
				elseif ($rebuild_data['woocoomerce_coulmns']=="4"):
					$classes[] = 'product-columns-4';
				endif;
				
				
				if( $rebuild_data['woo_layout'] == 'no-sidebar' ):
					$classes[] = 'has-no-sidebar';
				elseif( $rebuild_data['woo_layout'] == 'right-sidebar' ):
					$classes[] = 'has-right-sidebar';
				elseif( $rebuild_data['woo_layout'] == 'left-sidebar' ):
					$classes[] = 'has-left-sidebar';
				endif;					
				
			}
			return $classes;
		}	

		
	//----------------------------------------------------------------------------
	//-----------Viusal Composer
	//----------------------------------------------------------------------------
	if(function_exists('vc_add_param')){
	
	  vc_add_param('vc_row',array(
			  "type" => "textfield",
			  "heading" => esc_html__('Section ID', 'rebuild'),
			  "param_name" => "el_id",
			  "value" => "",
			  "description" => esc_html__("Set ID section", 'rebuild'),   
		));  
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Container', 'rebuild'),
			"param_name" => "container",
			"value" => array(   
					esc_html__('Container', 'rebuild') => 'container',  
					esc_html__('no Container', 'rebuild') => 'no-container',
                                                                   
					),
			"description" => esc_html__("Select Container", 'rebuild'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Container Padding', 'rebuild'),
			"param_name" => "container_padding",
			"value" => array(   
					esc_html__('no Container Padding', 'rebuild') => 'no-container-padding',
					esc_html__('Container padding', 'rebuild') => 'container_padding'
                                                                   
					),
			"description" => esc_html__("Select Container Padding", 'rebuild'),      
		  ) 
		); 
		
		
		
		vc_add_param('vc_row',array(
			  "type" => "textfield",
			  "heading" => esc_html__('Badge Title', 'rebuild'),
			  "param_name" => "badge_title",
			  "value" => "",
			  "description" => esc_html__("Set conatiner badge title", 'rebuild'),   
		));
		
				
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Padding', 'rebuild'),
			"param_name" => "el_class",
			"value" => array(   
					esc_html__('Default Padding', 'rebuild') => 'jx-rebuild-padding',  
					esc_html__('Small Padding', 'rebuild') => 'jx-rebuild-padding-small',
					esc_html__('No Padding', 'rebuild') => 'no-padding',
					esc_html__('Top Padding Only', 'rebuild') => 'jx-rebuild-padding no-bottom-padding',
					esc_html__('Bottom Padding Only', 'rebuild') => 'jx-rebuild-padding no-top-padding'
					),
			"description" => esc_html__("Select Padding", 'rebuild'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Overlayer', 'rebuild'),
			"param_name" => "el_class_2",
			"value" => array(   
					esc_html__('No', 'rebuild') => 'no',  
					esc_html__('Default', 'rebuild') => 'jx-rebuild-tint',
					esc_html__('Black', 'rebuild') => 'jx-rebuild-tint-black',
					esc_html__('Black Light', 'rebuild') => 'jx-rebuild-tint-black-light',
					esc_html__('Grey', 'rebuild') => 'jx-rebuild-tint-grey',                                                                                
					),
			"description" => esc_html__("Select Padding", 'rebuild'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Pattern BG', 'rebuild'),
			"param_name" => "pattern_bg",
			"value" => array(   
					esc_html__('No', 'rebuild') => 'no',  
					esc_html__('Black Lozenge', 'rebuild') => 'jx-black-lozenge',
					esc_html__('Criss Xcross', 'rebuild') => 'jx-criss-cross',
					esc_html__('Type', 'rebuild') => 'jx-type',
					esc_html__('Use Your illusion', 'rebuild') => 'jx-use-your-illusion', 
					esc_html__('Stardust', 'rebuild') => 'jx-stardust', 
					esc_html__('Moulin', 'rebuild') => 'jx-moulin', 
					esc_html__('Escheresque', 'rebuild') => 'jx-escheresque-ste', 
					esc_html__('Maze Black', 'rebuild') => 'jx-pw-maze-black',
					esc_html__('Congruent Outline', 'rebuild') => 'jx-congruent',
					esc_html__('Black Lozenge', 'rebuild') => 'jx-black-lozenge', 
					esc_html__('Footer Lodyas', 'rebuild') => 'jx-footer-lodyas',                                                                                
					),
			"description" => esc_html__("Select Pattern", 'rebuild'),      
		  ) 
		);
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Container Slope Overlayer', 'rebuild'),
			"param_name" => "container_overlayer",
			"value" => array(   
					esc_html__('No Slope', 'rebuild') => 'No',
					esc_html__('Container Slope Overlay', 'rebuild') => 'Yes'
                                                                   
					),
			"description" => esc_html__("Set Slope Overlayer", 'rebuild'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			  "type" => "textfield",
			  "heading" => esc_html__('Class', 'rebuild'),
			  "param_name" => "rebuild_class",
			  "value" => "",
			  "description" => esc_html__("Add class name", 'rebuild'),   
		));
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Seperator Position', 'rebuild'),
			"param_name" => "sep_position",
			"value" => array(   
					esc_html__('Select', 'rebuild') => 'no',  
					esc_html__('Top', 'rebuild') => 'jx-seperator-top',
					esc_html__('Bottom', 'rebuild') => 'jx-seperator-bottom',
					esc_html__('Top and Bottom', 'rebuild') => 'jx-seperator-botom-top',
                                                                               
					),
			"description" => esc_html__("Select Padding", 'rebuild'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Row Seperators', 'rebuild'),
			"param_name" => "row_sep",
			"value" => array(   
					esc_html__('Select Row', 'rebuild') => 'Select Row',  
					esc_html__('Triangles', 'rebuild') => 'ss-style-triangles',
					esc_html__('Double Diagonal line', 'rebuild') => 'ss-style-doublediagonal',
					esc_html__('Half Circle', 'rebuild') => 'ss-style-halfcircle',
					esc_html__('Big Triangle', 'rebuild') => 'bigTriangleColor', 
					esc_html__('Clouds', 'rebuild') => 'clouds',
					esc_html__('Multi Triangles', 'rebuild') => 'ss-style-multitriangles',
					esc_html__('Rounded Corners', 'rebuild') => 'ss-style-roundedcorners',
					esc_html__('Rounded Split', 'rebuild') => 'ss-style-roundedsplit',    
					esc_html__('Inverted Rounded', 'rebuild') => 'ss-style-invertedrounded',
					esc_html__('Zigzag', 'rebuild') => 'ss-style-zigzag',  
					esc_html__('Roundedges', 'rebuild') => 'ss-style-roundedges',
					esc_html__('Slit', 'rebuild') => 'ss-style-slit',   
					esc_html__('Inczigzag', 'rebuild') => 'ss-style-inczigzag',
					esc_html__('Curve Down Color', 'rebuild') => 'curveDownColor',
					esc_html__('Curve Up Color', 'rebuild') => 'curveUpColor'
					),
			"description" => esc_html__("Select Row Seperator", 'rebuild'),      
		  ) 
		); 
	
	}
	//----------------------------------------------------------------------------
	//-----------Dynamic Generated css
	//----------------------------------------------------------------------------

	ob_start(); // Capture all output (output buffering)
	require get_template_directory() . '/inc/dynamic_skin.php'; // Generate CSS
	$css = ob_get_clean(); // Get generated CSS (output buffering)

	global $wp_filesystem;
		
	// Initialize the WP filesystem, no more using 'file-put-contents' function
	if (empty($wp_filesystem)) {
		require_once (ABSPATH . '/wp-admin/includes/file.php');
		WP_Filesystem();
	}
	
	if(!$wp_filesystem->put_contents( get_template_directory() . '/css/dynamic_rebuild.css', $css, 0644) ) {
		return esc_html__('Failed to create css file','rebuild');
	}
?>