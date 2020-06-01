<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */
/********************* META BOX DEFINITIONS ***********************/
add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes()
{
	
	global $meta_boxes;
	global $data;
	global $wpdb;
	$prefix = 'rebuild_';
	$meta_boxes = array();		
	
	
	// REVSLIDER ARRAY
	$revolutionslider = array();
	$layersliders_array = array();
	
	if(class_exists('RevSlider')){
		$revolutionslider[0] = 'Select a Slider';
	    $slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		
		foreach($arrSliders as $revSlider) { 
			$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
		}
	}
	else{
		$revolutionslider[0] = 'You have to install RevolutionSlider Plugin';
	}
				
	
	/* ----------------------------------------------------- */
	// Post Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
		// HEADING of Post Option 
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Post Options', 'rebuild' ).'</h2>',
			'id' => 'heading_004', // Not used but needed for plugin
			),
			array(
						'name'		=> 'Video Embed Code',
						'id'   => $prefix."video_code",
						'type' => 'text',
						'desc'	=> 'Paste your video or audio link (<strong>E.g. http://www.youtube.com/watch?v=HUTXbBx765</strong>) to play.',
					
			),
			array(
						'name'		=> 'Image Hover Effect',
						'id'		=> $prefix."img_hover",
						'type'		=> 'select',
						'options'	=> array(
							'link'							=> 'Link',
							'Zoom'							=> 'Zoom',
							'Zoom_link'						=> 'Zoom and Link',
							'none'							=> 'None'
						),
						'multiple'	=> false,
						'desc'		=> 'Set image hover effect.',
						'std'		=> true
			),
			
				
			// Title Bar Heading
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Title Bar Options', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			array(
					'name'		=> 'Title Bar',
					'id'		=> $prefix."title_bar",
					'type'		=> 'select',
					'options'	=> array(
						'select_title_bar'	=> 'Select Title Bar',
						'titlebar'			=> 'Title Bar',
						'flexslider'		=> 'Flexslider'
					),
					'desc'		=> 'Set Title Bar style.',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),
			array(
				'name'		=> 'Show Breadcrumbs?',
				'id'		=> $prefix."breadcrumbs",
				'type'		=> 'checkbox',
				'desc'		=> 'Show / Hide Breadcrumbs.',
				'std'		=> true
			)
			
		)
	);
	
	/* ----------------------------------------------------- */
	// Page Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
			// Title Bar Heading
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Title Bar Options', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			array(
					'name'		=> 'Title Bar',
					'id'		=> $prefix."title_bar",
					'type'		=> 'select',
					'options'	=> array(
						'select_title_bar'	=> 'Select Title Bar',
						'titlebar'			=> 'Title Bar',
						'featuredimage'			=> 'Featured Image',
						'revolutionslider'	=> 'Revolution Slider',
						'video'				=> 'Video',
						'no-title-bar' 		=> 'No Title Bar'
					),
					'desc'		=> 'Set Title Bar style.',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),
			
						
			array(
				'name'		=> 'Show Breadcrumbs?',
				'id'		=> $prefix."breadcrumbs",
				'type'		=> 'checkbox',
				'desc'		=> 'Show / Hide Breadcrumbs.',
				'std'		=> true
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Revolution Slider Title Bar', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Revolution Slider',
				'id'		=> $prefix . "revolutionslider",
				'type'		=> 'select',
				'options'	=> $revolutionslider,
				'multiple'	=> false
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Select Sidebar', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			
			array(
					'name'		=> 'Sidebar',
					'id'		=> $prefix."sidebar",
					'type'		=> 'select',
					'options'	=> array(
						'no-sidebar'		=> 'No Sidebar',
						'left-sidebar'		=> 'Left Sidebar',
						'right-sidebar'		=> 'Right Sidebar'						
					),
					'desc'		=> 'Set sidebar side.',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),				
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Select Background', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Background Image',
				'id'		=> "{$prefix}bg_image",
				'type'      => 'image_advanced',
				'desc'		=> 'Select Background Image.',
				'max_file_uploads' => 1,
					
			),
			
			array(
					'name'		=> 'Background Image Position',
					'id'		=> $prefix."titlebar_bg_pos",
					'type'		=> 'select',
					'options'	=> array(
						'top'		=> 'Top',
						'center'		=> 'Center',
						'bottom'		=> 'Bottom'						
					),
					'desc'		=> 'Set background image position',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),				
			
			array(
						'name' => 'Titlebar Background Color',
						'id'   => $prefix."titlebar_bg_color",
						'desc'		=> 'Select Titlebar Background color.',
						'type' => 'color',
			),
			
			array(
						'name' => 'Body Background Color',
						'id'   => $prefix."body_bg_color",
						'desc'		=> 'Select Body Background color.',
						'type' => 'color',
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'PreFooter Content', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name' => 'Text Content',
				'id'   => "{$prefix}prefooter_text",
				'desc'		=> 'Type your text.',
				'type' 	=> 'textarea',
				'std' 	=> "",
				'cols' 	=> "40",
				'rows' 	=> "8"					
			)				
		)
	);
	
	
	
		
	
	/* ----------------------------------------------------- */
	// Testimonial Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'testimonial_info',
		'title' => 'Testimonials',
		'pages' => array( 'testimonials' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			array(
				'type' => 'heading',
				'name' => '<h2>'.esc_html__( 'Testimonials Details', 'rebuild' ).'</h2>',
				'id' => 'heading_002', // Not used but needed for plugin
			),
					
			array(
				'name'		=> 'Business / Site Name',
				'id'		=> $prefix . 'testimonial_business_name',
				'type'		=> 'text',
				'std'		=> ''
			),
			array(
				'name'		=> 'link',
				'id'		=> $prefix . 'testimonial_link',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			),
			// HEADING of Page Options 
			array(
				'type' => 'heading',
				'name' => '<h2>'.esc_html__( 'Sidebar Options', 'rebuild' ).'</h2>',
				'id' => 'heading_002', // Not used but needed for plugin
			),
			array(
				'name'		=> 'SideBar',
				'id'		=> $prefix."sidebar",
				'type'		=> 'select',
				'options'	=> array(
					'default'					=> 'Default',
					'nosidebar'					=> 'No Sidebar - Full Width',
					'leftsidebar'				=> 'Left Sidebar',
					'rightsidebar'				=> 'Right Sidebar',
				),
				'multiple'	=> false,
				'desc'		=> 'Select sidebar position Left or Right or Full width page.',
				'std'		=> array( 'title' )
			),
			
			
		)
	);
	
	
	/* ----------------------------------------------------- */
	// Portfolio
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'portfolio' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
			// Title Bar Heading
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Title Bar Options', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			array(
					'name'		=> 'Title Bar',
					'id'		=> $prefix."title_bar",
					'type'		=> 'select',
					'options'	=> array(
						'select_title_bar'	=> 'Select Title Bar',
						'titlebar'			=> 'Title Bar',
						'revolutionslider'	=> 'Revolution Slider',
						'video'				=> 'Video',
						'no-title-bar' 		=> 'No Title Bar'
					),
					'desc'		=> 'Set Title Bar style.',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),
			
						
			array(
				'name'		=> 'Show Breadcrumbs?',
				'id'		=> $prefix."breadcrumbs",
				'type'		=> 'checkbox',
				'desc'		=> 'Show / Hide Breadcrumbs.',
				'std'		=> true
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Revolution Slider Title Bar', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Revolution Slider',
				'id'		=> $prefix . "revolutionslider",
				'type'		=> 'select',
				'options'	=> $revolutionslider,
				'multiple'	=> false
			),
			array(
				'name'		=> 'Client Name',
				'id'		=> $prefix . 'project_client',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Virtus Co.'
			),
			
			array(
				'name'		=> 'Projet Value',
				'id'		=> $prefix . 'projet_value',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> '$400,000'
			),
			
			array(
				'name'		=> 'Location',
				'id'		=> $prefix . 'project_location',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Paradise View CA 9403'
			),
			
			array(
				'name'		=> 'Area',
				'id'		=> $prefix . 'project_area',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> '500,435 m2'
			),
			
			array(
				'name'		=> 'Contractor',
				'id'		=> $prefix . 'project_contractor',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Vacation Ltd'
			),
			
			array(
				'name'		=> 'Completed Year',
				'id'		=> $prefix . 'project_year',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> '2015'
			),
			
			array(
				'name'		=> 'Completed Status',
				'id'		=> $prefix . 'project_stat',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> '70%, dont add %, only number'
			),
			
			
			
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Video', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),			
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Project Photos', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Paste Video Link',
				'id'		=> $prefix . 'video_link',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=>'',
				'desc'		=> 'http://www.youtube.com/?v=ew4342rq21'
			),
			
			array(
				'name'		=> 'Project Photos',
				'id'		=> "{$prefix}project_photos",
				'type'      => 'image_advanced',
				'desc'		=> 'Select Project Photos.',
				'max_file_uploads' => 15,
					
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Partners Logo', 'rebuild' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			
			
			array(
				'name'		=> 'Partners Logo',
				'id'		=> "{$prefix}partners_logo",
				'type'      => 'image_advanced',
				'desc'		=> 'Select Partners Logo.',
				'max_file_uploads' => 6,
					
			),
			
			
					
		)
	);
	
	
	
	/* ----------------------------------------------------- */
	// Team Member Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'teammember_info',
		'title' => 'Add Team Member Information',
		'pages' => array( 'team' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
			array(
				'name'		=> 'Job Position',
				'id'		=> $prefix . 'teammember_jobposition_name',
				'type'		=> 'text',
				'desc'			=> 'What is you job title?'
			),
			array(
				'name'		=> 'Email',
				'id'		=> $prefix . 'teammember_email',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your work email address'
			),
			array(
				'name'		=> 'Telephone',
				'id'		=> $prefix . 'teammember_tel',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your contact number'
			),
			array(
				'name'		=> 'Facebook',
				'id'		=> $prefix . 'teammember_fb',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your facebook id'
			),
			array(
				'name'		=> 'Twitter',
				'id'		=> $prefix . 'teammember_twitter',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Twitter id'
			),
			array(
				'name'		=> 'Linkedin',
				'id'		=> $prefix . 'teammember_linkedin',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Linkedin id'
			),
			array(
				'name'		=> 'Skype',
				'id'		=> $prefix . 'teammember_skype',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Skype id'
			),
			array(
				'name'		=> 'Website',
				'id'		=> $prefix . 'teammember_website',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Website Url'
			)		
			
		)
	);
	
	
	
	
	/* ----------------------------------------------------- */
	// Team Member Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'partners_info',
		'title' => 'Add Partners Information',
		'pages' => array( 'partners' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
			array(
				'name'		=> 'Comapny Link',
				'id'		=> $prefix . 'partner_link',
				'type'		=> 'text',
				'desc'			=> 'type partner url link'
			),
			array(
				'name'		=> 'Partner Logo',
				'id'		=> "{$prefix}partners_logo",
				'type'      => 'image_advanced',
				'desc'		=> 'Select Partners Logo.',
				'max_file_uploads' => 1,
					
			)
			
		)
	);
	
	
	
	
	foreach ( $meta_boxes as $meta_box ) {
		new RW_Meta_Box( $meta_box );
	}
}
	
