<?php 
	/* Partners  ---------------------------------------------*/
	
	add_shortcode('progress_group', 'rebuild_progress_group');
	
	function rebuild_progress_group($atts, $content = null) { 
		extract(shortcode_atts(array(
				'title' => '',
				'description' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
			
			$out  ='
			<div class="jx-rebuild-skill-level">
				<!-- Skillsbar #1 -->
				<div class="jx-rebuild-skillsbar-1">                                				
				'.do_shortcode($content).'
				</div>
				<!-- Skillsbar#1 -->		
				</div>				
			'; 
		
		//return output
		return $out;
	}
	/* Partners  ---------------------------------------------*/
	
	add_shortcode('progress', 'rebuild_progress');
	
	function rebuild_progress($atts, $content = null) { 
		extract(shortcode_atts(array(
				'title' => '',
				'percent_number' => '',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		$out ='											
		<div class="jx-rebuild-progress-item">
			<div class="skillbar-title left jx-rebuild-uppercase">'.$title.'</div>
			<div class="percent-number right">'.$percent_number.'<span class="jx-rebuild-percent-posttext">%</span></div>    
			<div class="clearfix"></div>
			<div class="skillbar" data-percent="'.$percent_number.'%">                                
				<div class="skillbar-bar" data-progress-animate="'.$percent_number.'%"></div>
			</div>
		</div>
		<!-- item#01 -->
		'; 
			
		
		//return output
		return $out;
	}
	
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_progress' );
	
	
	function vc_progress() {	
		
		vc_map( array(
			"name" => __("گروه پروژه ها", "TEXT_DOMAIN"),
			"base" => "progress_group",
			"as_parent" => array('only' => 'progress'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
				
							
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"description" => __("افزودن عنوان بخش", "TEXT_DOMAIN")
				),
				
				array(
					 "type" => "textarea",
					 "holder" => "div",
					 "class" => "",
					 "heading" => __("محتوا",'rebuild'),
					 "param_name" => "description",
					 "value" => "",
				)	
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("تک پروژه ای", "TEXT_DOMAIN"),
			"base" => "progress",
			"content_element" => true,
			"as_child" => array('only' => 'progress_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"description" => __("افزودن عنوان", "TEXT_DOMAIN")
				),
				array(
					"type" => "textfield",
					"heading" => __("شماره درصد", "TEXT_DOMAIN"),
					"param_name" => "percent_number",
					"description" => __("افزودن شماره درصد", "TEXT_DOMAIN")
				)
				
				
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_progress_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_progress extends WPBakeryShortCode {
			}
		}
		
	}
?>