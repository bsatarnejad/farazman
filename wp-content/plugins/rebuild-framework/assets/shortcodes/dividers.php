<?php 
	/* Dividers  ---------------------------------------------*/
	
	add_shortcode('dividers', 'rebuild_dividers');
	
	function rebuild_dividers($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$divider_type_class='';
		
		if ($type =='1'):
		$divider_type_class='jx-rebuild-divider-1';
		elseif ($type =='2'):
		$divider_type_class='jx-rebuild-divider-2';
		elseif ($type =='3'):
		$divider_type_class='jx-rebuild-divider-3';
		elseif ($type =='4'):
		$divider_type_class='jx-rebuild-divider-4';
		elseif ($type =='5'):
		$divider_type_class='jx-rebuild-divider-5';
		elseif ($type =='6'):
		$divider_type_class='jx-rebuild-divider-6';
		endif;
		//function code
			$out ='<div class="'.$divider_type_class.'"></div>';
			
		
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_dividers' );
	
	
	function vc_dividers() {	
	vc_map(array(
      "name" => esc_html__( "تقسیم کننده ها", "rebuild" ),
      "base" => "dividers",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_divider.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "rebuild"),
	  "description" => __('افزودن نظرات مشتریان','rebuild'),
      "params" => array(
	  
	  
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک تقسیم کننده",'rebuild'),
			 "param_name" => "type",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب سبک تقسیم کننده',
					__('تقسیم کننده 1', 'TEXT_DOMAIN') => '1',
					__('تقسیم کننده 2', 'TEXT_DOMAIN') => '2',
					__('تقسیم کننده 3', 'TEXT_DOMAIN') => '3',
					__('تقسیم کننده 4', 'TEXT_DOMAIN') => '4',
					__('تقسیم کننده 5', 'TEXT_DOMAIN') => '5',
					__('تقسیم کننده 6', 'TEXT_DOMAIN') => '6',
					),
		)
		 		 
    
		 
		
      )
   )); 
	}
	
	
?>