<?php 
	/* Partners  ---------------------------------------------*/
	
	add_shortcode('process_group', 'rebuild_process_group');
	
	function rebuild_process_group($atts, $content = null) { 
		extract(shortcode_atts(array(
				'type' => '',
				'title' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
			
			switch($type){ 
			case '1':
			$out  ='
			<div class="jx-rebuild-process">
				<div class="jx-rebuild-section-title-2">
					<div class="jx-rebuild-title jx-rebuild-uppercase">'.$title.'</div>
					<div class="jx-rebuild-seperator-hr"></div>
				</div>
				<!-- Section Title -->
					<ul>
					'.do_shortcode($content).'
					<li class="vertical-line"></li>
				</ul>
			</div>			
			'; 
			
			break;
			
			case '2':
			$out  ='
			<div class="jx-rebuild-process-2 jx-rebuild-default-bg">                
				<ul>'.do_shortcode($content).'</ul>
			</div>
			'; 
			
			break;
						
		}
	
			
			
		
		//return output
		return $out;
	}
	/* Partners  ---------------------------------------------*/
	
	add_shortcode('process', 'rebuild_process');
	
	function rebuild_process($atts, $content = null) { 
		extract(shortcode_atts(array(
				'step' => 'شماره مراحل',
				'title' => 'تنظیم عنوان',
				'description' => 'پاره ای از توضیحات',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		$out ='
			<li>
				<div class="jx-rebuild-process-item">
					<div class="jx-rebuild-process-step"><div>'.$step.'</div></div>
					<div class="jx-rebuild-process-content">
						<div class="jx-rebuild-process-title">'.$title.'</div>
						<div class="jx-rebuild-process-description">'.$description.'</div>
					</div>
				</div>
			</li>
			<!-- Item 01 -->
			
			
		'; 
			
		
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_process' );
	
	
	function vc_process() {	
		
		vc_map( array(
			"name" => __("گروه فرآیند", "TEXT_DOMAIN"),
			"base" => "process_group",
			"as_parent" => array('only' => 'process'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
				
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("انتخاب سبک",'rebuild'),
				 "param_name" => "type",
				 "value" => array(   
						__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
						__('سبک A', 'TEXT_DOMAIN') => '1',
						__('سبک B', 'TEXT_DOMAIN') => '2',
						),
				),
				
							
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"description" => __("افزودن عنوان بخش", "TEXT_DOMAIN")
				)
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("تک فرآیندی", "TEXT_DOMAIN"),
			"base" => "process",
			"content_element" => true,
			"as_child" => array('only' => 'process_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
				array(
					"type" => "textfield",
					"heading" => __("مرحله", "TEXT_DOMAIN"),
					"param_name" => "step",
					"description" => __("افزودن شماره مرحله", "TEXT_DOMAIN")
				),
								
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"description" => __("افزودن عنوان", "TEXT_DOMAIN")
				),
				
				
				array(
					 "type" => "textarea",
					 "holder" => "div",
					 "class" => "",
					 "heading" => __("محتوا",'rebuild'),
					 "param_name" => "description",
					 "value" => "",
				)	
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_process_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_process extends WPBakeryShortCode {
			}
		}
		
	}
?>