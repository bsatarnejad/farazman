<?php 
	/* Partners  ---------------------------------------------*/
	
	add_shortcode('progress_bar_group', 'rebuild_progress_bar_group');
	
	function rebuild_progress_bar_group($atts, $content = null) { 
		extract(shortcode_atts(array(
				'type' => '',
				'padding' => '0'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		
		switch($type){ 
		case '1':
		
		$out ='
		<div class="jx-rebuild-skillsbar-2" style="padding:'.$padding.'px">
			<div class="skillsbar-head">
				<div class="left"></div>
				<div class="item-position">'.do_shortcode($content).'</div>
			</div>
		</div>
		'; 
			
		break;
		
		case '2':
		
		$out ='
		<div class="jx-rebuild-skillsbar-3 jx-rebuild-bar-border" style="padding:'.$padding.'px">
			<div class="skillsbar-head">
			<div class="left"></div>
				<div class="item-position"> '.do_shortcode($content).'</div>
			</div>
		</div>
		'; 
			
		break;
		
		case '3':
		
		$out ='
	   <div class="jx-rebuild-skillsbar-4 jx-rebuild-bar-border jx-rebuild-stripes jx-rebuild-animated-stripes" style="padding:'.$padding.'px" data-appear-progress-animation>
		<div class="skillsbar-head">
		<div class="left"></div>
			<div class="item-position">'.do_shortcode($content).'</div>
			</div>
		</div>
		'; 
			
		break;
		
		case '4':
		
		$out ='
	  <div class="jx-rebuild-skillsbar-6" style="padding:'.$padding.'>
		<div class="skillsbar-head">
		<div class="left"></div>
			<div class="item-position">  '.do_shortcode($content).'</div>
			</div>
		</div>
		'; 
			
		break;
		
		
		case '5':
		
		$out ='
			<div class="jx-rebuild-skillsbar-1 jx-rebuild-bar-border jx-rebuild-stripes jx-rebuild-animated-stripes"  style="padding:'.$padding.'px" data-appear-progress-animation>
					<div class="item-position">'.do_shortcode($content).'</div>
					
				</div>
		'; 
			
		break;
		}
		
		//return output
		return $out;
	}
	/* Partners  ---------------------------------------------*/
	
	add_shortcode('progress_bar', 'rebuild_progress_bar');
	
	function rebuild_progress_bar($atts, $content = null) { 
		extract(shortcode_atts(array(
					'title' => 'HTML',
					'percentage' => '90'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
			$out ='
			<div class="skillbar clearfix" data-percent="'.$percentage.'%">
                <div class="skillbar-title">
                    <span>'.$title.'</span>
                </div>
				<div class="skillbar-bar jx-rebuild-gredient-1" data-progress-animate="'.$percentage.'%">
                    <span class="percenttext">'.$percentage.'%</span>
                </div>
            </div> 
			';
						
		
		//return output
		return $out;
	}
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_progress_bar' );
	
	
	function vc_progress_bar() {	
		
		vc_map( array(
			"name" => __("گروه نوار پروژه", "TEXT_DOMAIN"),
			"base" => "progress_bar_group",
			"as_parent" => array('only' => 'progress_bar'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
				
							
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("انتخاب سبک",'TEXT_DOMAIN'),
				 "param_name" => "type",
				 "value" => array(   
						__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
						__('Skills Bar - 1', 'TEXT_DOMAIN') => '1',
						__('Skills Bar - 2', 'TEXT_DOMAIN') => '2',
						__('Skills Bar - 3', 'TEXT_DOMAIN') => '3',
						__('Skills Bar - 4', 'TEXT_DOMAIN') => '4',
						__('Skills Bar - 5', 'TEXT_DOMAIN') => '5',
						),
			),
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "پدینگ", "TEXT_DOMAIN" ),
				"param_name" => "padding",
				"value"=> "20",
				"description" => esc_html__( "افزودن مقدار پدینگ", "TEXT_DOMAIN" )
			),
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("نوار تک پروژه ای", "TEXT_DOMAIN"),
			"base" => "progress_bar",
			"content_element" => true,
			"as_child" => array('only' => 'progress_bar_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
				"param_name" => "title",
				"value"=> "HTML",
				"description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "شماره درصد", "TEXT_DOMAIN" ),
				"param_name" => "percentage",
				"value"=> "90",
				"description" => esc_html__( "افزودن شماره درصد", "TEXT_DOMAIN" )
			)
				
				
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_progress_bar_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_progress_bar extends WPBakeryShortCode {
			}
		}
		
	}
?>