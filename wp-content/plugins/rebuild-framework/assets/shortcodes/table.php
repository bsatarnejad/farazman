<?php 
	/* Table  ---------------------------------------------*/
	
	add_shortcode('table', 'rebuild_table');
	
	function rebuild_table($atts, $content = null) { 
		extract(shortcode_atts(array(
		'class'=>''
		), $atts)); 
		
		//initial variables
		$out=''; 
		//function code
		$out ='<table class="style_b">'.do_shortcode($content).'</table>'; 
		
		//return output
		return $out;
	}
	/* Table TR  ---------------------------------------------*/
	
	add_shortcode('tr', 'rebuild_tr');
	function rebuild_tr($atts, $content = null) { 
		extract(shortcode_atts(array( ), $atts)); 
		//initial variables
		$out=''; 
		//function code
			$out ='<tr>'.do_shortcode($content).'</tr>';
		//return output
		
		
		return $out;
	}
	
	/* Table TD  ---------------------------------------------*/
	add_shortcode('td', 'rebuild_td');
	function rebuild_td($atts, $content = null) { 
		extract(shortcode_atts(array(
				), $atts)); 
		//initial variables
		$out=''; 
		//function code
			$out ='	<td>'.do_shortcode($content).'</td>';
		//return output
		return $out;
	}
	//Visual Composer
	
	add_action( 'vc_before_init', 'vc_table' );
	
	function vc_table() {	
		
		vc_map( array(
			"name" => __("جدول", "TEXT_DOMAIN"),
			"base" => "table",
			"as_parent" => array('only' => 'tr'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
				
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("تک ردیف", "TEXT_DOMAIN"),
			"base" => "tr",
			"as_parent" => array('only' => 'td'),
			"content_element" => true,
			"as_child" => array('only' => 'table'),
			"params" => array(
				// add params same as with any other content element				
			)
		) );
		
		
		
		vc_map( array(
			"name" => __("تک ستون", "TEXT_DOMAIN"),
			"base" => "td",
			"content_element" => true,
			"as_child" => array('only' => 'tr'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
				array(
					 "type" => "textarea",
					 "holder" => "div",
					 "class" => "",
					 "heading" => __("محتوا",'rebuild'),
					 "param_name" => "content",
					 "value" => "",
				)
				
				
			)
		) );
		
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_table extends WPBakeryShortCodesContainer {
			}
		}
		
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_tr extends WPBakeryShortCode {
			}
			class WPBakeryShortCode_td extends WPBakeryShortCode {
			}
		}
		
	}
?>