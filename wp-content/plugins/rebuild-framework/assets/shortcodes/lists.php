<?php 
	/* Accordion Group  ---------------------------------------------*/
	
	add_shortcode('lists_group', 'rebuild_lists_group');
	
	function rebuild_lists_group($atts, $content = null) { 
		extract(shortcode_atts(array(
			'type' => '',
			'list_style' => '',
			'font_size' => 'default',
			'icon_bg' => 'none',
			'color_style' => 'dark',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		
		
		$style = "";
		$font_size_class="";
		$icon_bg_class="";
		$color_style_class="";
		
		if($type =="1") {
		$style ="default";
		} elseif ($type =="2") {
		$style ="jx-rebuild-list-group";
		} elseif ($type =="3") {
		$style ="jx-rebuild-list-normal";
		}
		
		if($font_size =="default") {
			$font_size_class ="default";
		}elseif ($font_size =="x2") {
			$font_size_class ="x2";
		} 
		
		
		if($icon_bg =="circle") {
			$icon_bg_class ="circle";
		}elseif ($icon_bg =="square") {
			$icon_bg_class ="sqaure";
		}
		
		if($color_style =="light") {
			$color_style_class ="jx-light";
		}elseif ($color_style =="dark") {
			$color_style_class ="jx-dark";
		}  
		
		
		$out  ='
			<ul class="jx-rebuild-list '.$style.' '.$list_style.' '.$font_size_class.' '.$icon_bg_class.' '.$color_style_class.'">
			'.do_shortcode($content).'
			</ul>
		'; 
			
			
				
		//return output
		return $out;
	}
	/* Accordion  ---------------------------------------------*/
	
	add_shortcode('lists', 'rebuild_lists');
	
	function rebuild_lists($atts, $content = null) { 
		extract(shortcode_atts(array(
					'title' => '',
					'icon' => 'fa fa-check'
					
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$id = rand(0,100); 
		
		//function code
		
		$out ='
			<li><span class="'.$icon.'"></span> '.$title.'</li>
		';
		
	
		
		//return output
		return $out;
	}
	
		//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_lists' );
	
	
	function vc_lists() {	
		
		vc_map( array(
			"name" => __("گروه لیست ها", "TEXT_DOMAIN"),
			"base" => "lists_group",
			"as_parent" => array('only' => 'lists'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
				array(
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => __("انتخاب سبک رنگ",'rebuild'),
					 "param_name" => "color_style",
					 "value" => array(   
							__('انتخاب سبک رنگ', 'TEXT_DOMAIN') => 'none',
							__('روشن', 'TEXT_DOMAIN') => 'light',
							__('تیره', 'TEXT_DOMAIN') => 'dark'
							
							),
				),
				array(
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => __("انتخاب اندازه فونت",'rebuild'),
					 "param_name" => "font_size",
					 "value" => array(   
							__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
							__('کوچک', 'TEXT_DOMAIN') => 'default',
							__('بزرگ', 'TEXT_DOMAIN') => 'x2'
							
							),
				),
				
				array(
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => __("انتخاب پس زمینه",'rebuild'),
					 "param_name" => "icon_bg",
					 "value" => array(   
							__('بدون پس زمینه', 'TEXT_DOMAIN') => 'none',
							__('دایره', 'TEXT_DOMAIN') => 'circle',
							
							),
				)
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("تک لیست ها", "TEXT_DOMAIN"),
			"base" => "lists",
			"content_element" => true,
			"as_child" => array('only' => 'lists_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"description" => __("عنوان زبانه را تایپ کنید.", "TEXT_DOMAIN")
				),
				
				array(
					'type' => 'iconpicker',
					'heading' => __( 'آیکون', 'js_composer' ),
					'param_name' => 'icon',
					'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'fontawesome',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'save_always' => true,					
					'description' => __( 'انتخاب آیکون', 'js_composer' ),
				)
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_lists_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_lists extends WPBakeryShortCode {
			}
		}
		
	}
?>