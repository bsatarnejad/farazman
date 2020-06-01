<?php 
	/* Tag Box  ---------------------------------------------*/
	add_shortcode('quote_box', 'rebuild_quote_box');
	function rebuild_quote_box($atts, $content = null) { 
		extract(shortcode_atts(array(
					'icon' => '',
					'title' => 'افزودن عنوان',
					'form' =>'دریافت کد فرم',
					'border' => 'no'
				), $atts)); 
		//initial variables
		$out=''; 
		$icon_div='';
		$icon_class='';
		$border_class='';
		
		if($border =='yes'):
		$border_class='border';
		endif;
		
		//function code
		if($icon):
		$icon_div='<div class="icon"><i class="vc_li vc_li-'.$icon.'"></i></div>';	
		$icon_class='has-icon';
		endif;
		
			$out  ='
			<div class="jx-rebuild-quote-smallbox '.$icon_class.' '.$border_class.'">
				<div class="jx-heading">
					'.$icon_div.'
					<h4>'.$title.'</h4>
				</div>
				<!-- Heading -->
				
				<div class="">'.do_shortcode($content).'</div>
			</div>
			'; 
			
		//return output
		return $out;
	}
	
	
	//Visual Composer
	add_action( 'vc_before_init', 'vc_quote_box' );
	
	function vc_quote_box() {	
		vc_map(array(
		  "name" => esc_html__( "کادر مشاوره رایگان", "TEXT_DOMAIN" ),
		  "base" => "quote_box",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_quotebox.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن کادر مشاوره رایگان','TEXT_DOMAIN'),
		  "params" => array(
						
			array(
				'type' => 'iconpicker',
				'heading' => __( 'آیکون', 'js_composer' ),
				'param_name' => 'icon',
				'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'انتخاب آیکون', 'js_composer' ),
				'save_always' => true
			),
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
				"param_name" => "title",
				"value" => "",
				"description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
			 ),
			 
			 array(
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => __("تنظیم حاشیه",'TEXT_DOMAIN'),
					 "param_name" => "border",
					 "value" => array(   
							__('تنظیم حاشیه بلی / خیر', 'TEXT_DOMAIN') => 'border-yes-no',
							__('بلی', 'TEXT_DOMAIN') => 'yes',
							__('خیر', 'TEXT_DOMAIN') => 'no',
							),
				),
					
			 array(
					 "type" => "textarea",
					 "holder" => "div",
					 "class" => "",
					 "heading" => __("شرت کد فرم",'TEXT_DOMAIN'),
					 "param_name" => "content",
					 "value" => "",
				)
					 
		  )
	   ));
    
	}	
	
?>