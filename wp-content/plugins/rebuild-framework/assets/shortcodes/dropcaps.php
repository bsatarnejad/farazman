<?php 
	/* Dropcaps  ---------------------------------------------*/
	add_shortcode('dropcaps', 'rebuild_dropcaps');
	
	function rebuild_dropcaps($atts, $content = null) { 
		extract(shortcode_atts(array(
		'color_style' => '', 
		'letter' => '',
		'style' => ''
		), $atts)); 
		
		//initial variables
		$out=''; 
		//function code
		
		$out ='
		<span class="dropcap '.$color_style.' '.$style.'">'.$letter.'</span>
		'.do_shortcode($content); 
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_dropcaps' );
	
	
	function vc_dropcaps() {	
		vc_map(array(
      "name" => esc_html__( "دراپ کپس", "TEXT_DOMAIN" ),
      "base" => "dropcaps",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_dropcaps.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن دراپ کپس','TEXT_DOMAIN'),
      "params" => array(
	  
	  
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک",'TEXT_DOMAIN'),
			 "param_name" => "color_style",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
					__('روشن', 'TEXT_DOMAIN') => 'light',
					__('تیره', 'TEXT_DOMAIN') => 'dark',
					),
		),
		 		 
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک",'TEXT_DOMAIN'),
			 "param_name" => "style",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
					__('مربعی', 'TEXT_DOMAIN') => 'square',
					__('دایره ای', 'TEXT_DOMAIN') => 'circle',
					),
		),
		
		array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "کاراکتر برجسته", "TEXT_DOMAIN" ),
				"param_name" => "letter",
				"value" => "A", 
				"description" => esc_html__( "کاراکتر برجسته را در این قسمت تایپ کنید.", "TEXT_DOMAIN" )
			),		
		array(
			 "type" => "textarea",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("محتوا",'TEXT_DOMAIN'),
			 "param_name" => "content",
			 "value" => "",
		)	 
		
      )
   )); 
	}
?>