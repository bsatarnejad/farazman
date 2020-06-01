<?php 
	/* Modal Box  ---------------------------------------------*/
	
	add_shortcode('modalbox', 'rebuild_modalbox');
	
	function rebuild_modalbox($atts, $content = null) { 
		extract(shortcode_atts(array(
				'style' => 'jx-rebuild-md-effect-1',
				'title' => 'گفتگوی مودال',
				'button_text' => 'مقیاس محو شدن',
				'close_icon' =>'button',
				'button_close' => 'بستن',
				'button_2' => 'ثبت سفارش',
				'button_2_link' => '#'
				), $atts)); 
		 
		
		//initial variables
		$out='';
		$show_title=''; 
		$show_button_1='';
		$show_button_2='';		
		$button_effect = "";
		$show_closeicon='';
		
		$modal_id= 'modal-'.rand(0,999999);
		
		
		//function code
		
		if($title):
		$show_title='<h3>'.$title.'</h3>';
		endif;
		
		if($close_icon == 'icon'):
			$show_closeicon='<a class="jx-rebuild-md-close jx-rebuild-close-icon"><i class="fa fa-times"></i></a>';	
			$show_button_1='';	
		elseif($close_icon == 'button'):
			$show_button_1='<a class="jx-rebuild-md-close jx-rebuild-btn-default jx-rebuild-small-bt">'.$button_close.'</a>';
			$show_closeicon='';
		else:
			$show_button_1='';			
		endif;
		
		
		if($button_2):
		$show_button_2='<a href="'.$button_2_link.'" class="jx-rebuild-md-close jx-rebuild-btn-default jx-rebuild-small-bt">'.$button_2.'</a>';
		endif;
			$out ='					
     		<div class="jx-rebuild-md-modal '.$style.'" id="'.$modal_id.'">
				<div class="jx-rebuild-md-content">
					'.$show_title.'
					'.$show_closeicon.'
					<div>
						<p>'.do_shortcode($content).'</p>
						'.$show_button_1.'
						'.$show_button_2.'						
					</div>
				</div>
			</div>
			
			<a class="jx-rebuild-md-trigger jx-rebuild-xlarge-bt jx-rebuild-btn-default" data-modal="'.$modal_id.'">'.$button_text.'</a>
			<div class="jx-rebuild-md-overlay"></div>
			';			
		
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_modalbox' );
	
	
	function vc_modalbox() {	
	vc_map(array(
      "name" => esc_html__( "باکس مودال", "TEXT_DOMAIN" ),
      "base" => "modalbox",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_modalbox.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن باکس مودال','TEXT_DOMAIN'),
      "params" => array(
	  
	  
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب افکت باکس مودال",'TEXT_DOMAIN'),
			 "param_name" => "style",
			 "value" => array(   
				__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب سبک تقسیم کننده',
				__('Fade in & Scale', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-1',
				__('Slide in (right)', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-2',
				__('Slide in (bottom)', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-3',
				__('Newspaper', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-4',					
				__('Fall', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-5',
				__('Side Fall', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-6',
				__('Sticky Up', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-7',
				__('3D Flip (horizontal)', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-8',
				__('3D Flip (vertical)', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-9',
				__('3D Sign', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-10',
				__('Super Scaled', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-11',
				__('Just Me', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-12',
				__('3D Slit', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-13',
				__('3D Rotate Bottom', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-14',
				__('3D Rotate In Left', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-15',
				__('Blur', 'TEXT_DOMAIN') => 'jx-rebuild-md-effect-16',
				),
		),
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("نمایش آیکون بستن",'TEXT_DOMAIN'),
			 "param_name" => "close_icon",
			 "value" => array(   
				__('') => 'نمایش دکمه بستن',
				__('Icon') => 'icon',
				__('Button') => 'button'
				),
		),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
					"param_name" => "title",
					"value" => "گفتگوی مودال",
					"description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
				 ),
				array(
					 "type" => "textarea_html",
					 "holder" => "div",
					 "class" => "",
					 "heading" => __("محتوا",'TEXT_DOMAIN'),
					 "param_name" => "content",
					 "value" => "افزودن محتوا",
					 "description" => __( "وارد کردن محتوا", "TEXT_DOMAIN" ),
					 'save_always' => true,
				),		 		 
    
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "متن دکمه", "TEXT_DOMAIN" ),
					"param_name" => "button_text",
					"value" => "مقیاس محو شدن",
					"description" => esc_html__( "افزودن متن دکمه", "TEXT_DOMAIN" )
					
				 ),
				 
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "متن دکمه #2", "TEXT_DOMAIN" ),
					"param_name" => "button_2",
					"value" => "ثبت سفارش",
					"description" => esc_html__( "افزودن متن دکمه #2", "TEXT_DOMAIN" )
				 ),
				 				 
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "لینک دکمه #2", "TEXT_DOMAIN" ),
					"param_name" => "button_2_link",
					"value" => 'http://rebuild.janxcode.com',
					"description" => esc_html__( "افزودن لینک دکمه #2", "TEXT_DOMAIN" )
				 )
      )
   )); 
	}
	
	
?>