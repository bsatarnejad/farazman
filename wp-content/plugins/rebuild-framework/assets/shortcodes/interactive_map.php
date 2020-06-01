<?php 
	/* Accordion Group  ---------------------------------------------*/
	
	add_shortcode('interactive_map_group', 'rebuild_interactive_map_group');
	
	function rebuild_interactive_map_group($atts, $content = null) { 
		extract(shortcode_atts(array(
		'image' => ''
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
			$img='';
			$img = wp_get_attachment_image_src($image, "large");
			$imgSrc = $img[0];
		
		//function code
		
		
		$out ='
			<div class="jx-rebuild-interactive-map">
				<div class="jx-rebuild-inter-map">
					'.get_the_post_thumbnail($image).'
					<img src="'.$imgSrc.'" alt="">
					<ul>'.do_shortcode($content).'</ul>
				</div>
			</div>
		'; 	
			
				
		//return output
		return $out;
	}
	/* Accordion  ---------------------------------------------*/
	
	add_shortcode('interactive_point', 'rebuild_interactive_point');
	
	function rebuild_interactive_point($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'image' => 'http://janxcode.com/rebuild/images/exhibition-floor.png',
					'title' => '',
					'description' => '',
					'point_position' => '',
					'pop_image' => '',
					'point_x' => '10%',
					'point_y' => '40%'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 	
		
			$pop_img='';
			$pop_img = wp_get_attachment_image_src($pop_image, "small-blog");
			$pop_imgSrc = $pop_img[0];
			
		
		//function code
		
			if($type =="1") {
			$out ='				
			<li class="jx-rebuild-single-point" style="top:'.$point_y.'; left:'.$point_x.';">
			<a class="jx-rebuild-img-replace" href="#0"></a>
			<div class="jx-rebuild-more-info jx-rebuild-top">
			<h2>'.$title.'</h2>
			<p>'.$description.'</p>
			<a href="#0" class="jx-rebuild-close-info jx-rebuild-img-replace">Close</a>
			</div>
			</li> 
			<!-- single-point -->
			';	
			
			} elseif ($type =="2") {
			$out ='				
			<li class="jx-rebuild-small-point jx-rebuild-single-point" style="top:'.$point_y.'; left:'.$point_x.';">
				<a class="jx-rebuild-img-replace" href="#0"></a>
				<div class="jx-rebuild-more-info jx-rebuild-top">
					
					<div class="jx-rebuild-point-item">
	
						<div class="jx-rebuild-image-position">
						<img src="'.$pop_imgSrc.'" alt="">
						</div>
	
						<div class="jx-rebuild-text-position">
							'.$description.'
						</div>
	
					</div>
					
				<a href="#0" class="jx-rebuild-close-info jx-rebuild-img-replace">Close</a>
				</div>
			</li> 
			<!-- single-point -->
			';	
			}		
		//return output
		return $out;
	}
	
		//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_interactive_point' );
	
	
	function vc_interactive_point() {	
		
		vc_map( array(
			"name" => __("گروه نقشه های تعاملی", "TEXT_DOMAIN"),
			"base" => "interactive_map_group",
			"as_parent" => array('only' => 'interactive_point'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html__( "تصویر", "TEXT_DOMAIN" ),
				"param_name" => "image",
				"value" => "انتخاب تصویر", //Default Counter Up Text
				"description" => esc_html__( "افزودن تصویر", "TEXT_DOMAIN" )
			 )
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("نقاط", "TEXT_DOMAIN"),
			"base" => "interactive_point",
			"content_element" => true,
			"as_child" => array('only' => 'interactive_map_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
		array(
		 "type" => "dropdown",
		 "class" => "",
		 "heading" => __("انتخاب سبک",'TEXT_DOMAIN'),
		 "param_name" => "type",
		 "value" => array(   
				__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
				__('سبک A', 'TEXT_DOMAIN') => '1',
				__('سبک B', 'TEXT_DOMAIN') => '2',
				),
		),		 
				 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
            "param_name" => "title",
			"value" => "عنوان بخش", //Default Counter Up Text
            "description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
         ),
		 
        array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__( "توضیحات", "TEXT_DOMAIN" ),
            "param_name" => "description",
			"value" => "افزودن توضیحات",
            "description" => esc_html__( "افزودن توضیحات", "TEXT_DOMAIN" )
         ),
		 
       array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__( "تصویر", "TEXT_DOMAIN" ),
            "param_name" => "pop_image",
			"value" => "انتخاب تصویر",
            "description" => esc_html__( "افزودن تصویر پاپ", "TEXT_DOMAIN" )
         ),
		 
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "موقعیت سمت چپ نقطه", "TEXT_DOMAIN" ),
            "param_name" => "point_x",
			"value" => "20%",
            "description" => esc_html__( "تنظیم موقعیت سمت چپ نقطه", "TEXT_DOMAIN" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "موقعیت بالای نقطه", "TEXT_DOMAIN" ),
            "param_name" => "point_y",
			"value" => "40%",
            "description" => esc_html__( "تنظیم موقعیت بالای نقطه", "TEXT_DOMAIN" )
         )			 
		 
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_interactive_map_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_interactive_point extends WPBakeryShortCode {
			}
		}
		
	}
?>