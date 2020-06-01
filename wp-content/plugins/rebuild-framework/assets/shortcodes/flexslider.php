<?php 
	/* Flexslider Group  ---------------------------------------------*/
	
	add_shortcode('flexslider_group', 'rebuild_flexslider_group');
	
	function rebuild_flexslider_group($atts, $content = null) { 
		extract(shortcode_atts(array(
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
	
			$out  ='
			<div class="jx-rebuild-container jx-rebuild-service-flexslider">
				<div class="flexslider">
					<ul class="slides">
					'.do_shortcode($content).'							
					</ul>
				</div>                
			</div>
			'; 
		
				
		//return output
		return $out;
	}
	/* Flexslider  ---------------------------------------------*/
	
	add_shortcode('flexslider', 'rebuild_flexslider');
	
	function rebuild_flexslider($atts, $content = null) { 
		extract(shortcode_atts(array(
			'image' => 'http://rebuild.janxcode.com/wp-content/uploads/2015/10/stock-10-887x466.jpg'
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$id = rand(0,100); 
		
		//function code
		
		$img = wp_get_attachment_image_src($image, "rebuild_service-slider");
		$imgSrc = $img[0];
	
		$out ='<li><img src="'.$imgSrc.'" alt="" /></li>';
	
		
		//return output
		return $out;
	}
	//Visual Composer	
	add_action( 'vc_before_init', 'vc_flexslider' );
	
	function vc_flexslider() {	
		
		vc_map( array(
			"name" => __("گروه فلکس اسلایدر", "TEXT_DOMAIN"),
			"base" => "flexslider_group",
			"as_parent" => array('only' => 'flexslider'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("تک فلکس اسلایدر", "TEXT_DOMAIN"),
			"base" => "flexslider",
			"content_element" => true,
			"as_child" => array('only' => 'flexslider_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
			 array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html__( "تصویر", "TEXT_DOMAIN" ),
				"param_name" => "image",
				"value" => "http://rebuild.janxcode.com/wp-content/uploads/2015/10/stock-10-887x466.jpg",
				"description" => esc_html__( "افزودن تصویر", "TEXT_DOMAIN" )
			 )			 
			 				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_flexslider_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_flexslider extends WPBakeryShortCode {
			}
		}
		
	}
	
	
	
	
?>