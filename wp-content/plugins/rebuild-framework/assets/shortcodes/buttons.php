<?php 
	/* Accordion Group  ---------------------------------------------*/
	add_shortcode('buttons', 'rebuild_buttons');
	function rebuild_buttons($atts, $content = null) { 
		extract(shortcode_atts(array(
		'type' => '',
		'icon' => 'fa-mail-forward',
		'button_text' => 'درخواست مشاوره رایگان',
		'button_size'=>'medium',
		'button_curve'=>'',
		'button_color'=>'',
		'url' => 'http://janxcode.com/rebuild/',
		'border'=>'no',
		'button_animation'=>''
			
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$animation_option='';
		$button_size_class='';
		$button_curve_class='';
		$button_color_class='';
		$button_border_class='';
		
		if($button_animation=="yes"):
		$animation_option ="jx-rebuild-animated-bt jx-rebuild-button-fx-5";
		endif;
		
		
		//Button Size
		
		if($button_size == 'xlarge'):
			$button_size_class='jx-rebuild-xlarge-bt';
		elseif($button_size == 'large'):
			$button_size_class='jx-rebuild-large-bt';
		elseif($button_size == 'medium'):
			$button_size_class='jx-rebuild-medium-bt';
		elseif($button_size == 'small'):
			$button_size_class='jx-rebuild-small-bt';
		endif;
		if($button_curve == 'fcurve'):
			$button_curve_class='jx-rebuild-fullcurve';
		elseif($button_curve == 'mcurve'):
			$button_curve_class='jx-rebuild-mediumcurve';
		elseif($button_curve == 'scurve'):
			$button_curve_class='jx-rebuild-smallcurve';
		endif;
		
		if($border == 'yes'):
			$button_border_class='jx-rebuild-border';
		else:
			$button_border_class='';
		endif;
		
		
		if($button_color == 'orange'):
			$button_color_class='jx-rebuild-orange';
		elseif($button_color == 'green'):
			$button_color_class='jx-rebuild-green';
		elseif($button_color == 'darkblue'):
			$button_color_class='jx-rebuild-dark-blue';
		elseif($button_color == 'red'):
			$button_color_class='jx-rebuild-red';
		endif;
		//function code
	
		switch($type){ 
			case '1':
			$out  ='
					<a href="'.$url.'" class="jx-rebuild-btn-default jx-rebuild-border">
						<span>	
							<i class="btn-icon-left fa '.$icon.'"></i>
							<span>'.$button_text.'</span>
							<i class="btn-icon-right fa '.$icon.'"></i>
						</span>
					</a>
			'; 
			break;
			
			case '2':
			$out  ='				
					<a href="'.$url.'" class="jx-rebuild-btn-default '.$button_border_class.' '.$button_size_class.'">
						<span>	
							<i class="btn-icon-left fa '.$icon.'"></i>
							<span>'.$button_text.'</span>
							<i class="btn-icon-right fa '.$icon.'"></i>
						</span>
					</a>
			'; 
			break;
			
			case '3':
			$out  ='<a href="'.$url.'" class="jx-rebuild-button '.$button_size_class.' '.$button_border_class.' '.$button_curve_class.' '.$button_color_class.' '.$animation_option.'" data-text="'.$button_text.'"><span><i class="fa '.$icon.'"></i>'.$button_text.'</span></a>'; 
			break;
			
			case '4':
			$out  ='<a href="'.$url.'" class="jx-rebuild-button '.$button_size_class.' '.$button_border_class.' '.$button_curve_class.' '.$button_color_class.' '.$animation_option.'" data-text="'.$button_text.'"><span>'.$button_text.'</span></a>'; 
			break;
			
			case '5':
			$out  ='<a href="'.$url.'" class="jx-rebuild-button '.$button_size_class.' '.$button_border_class.' '.$button_curve_class.' '.$button_color_class.' jx-rebuild-button-icon-1 '.$animation_option.'" data-text="'.$button_text.'"><i class="fa '.$icon.'"></i><span>'.$button_text.'</span></a>'; 
			break;
			
			
		}
		
				
		//return output
		return $out;
	}
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_buttons' );
	
	
	function vc_buttons() {	
		vc_map(array(
      "name" => esc_html__( "دکمه ها", "TEXT_DOMAIN" ),
      "base" => "buttons",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_button.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن دکمه ها','TEXT_DOMAIN'),
      "params" => array(
	  
	  
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک دکمه",'TEXT_DOMAIN'),
			 "param_name" => "type",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب سبک دکمه',
					__('دکمه بدون آیکون', 'TEXT_DOMAIN') => '4',
					__('دکمه آیکون اسلاید', 'TEXT_DOMAIN') => '2',
					__('دکمه با آیکون#1', 'TEXT_DOMAIN') => '5',
					__('دکمه با آیکون#2', 'TEXT_DOMAIN') => '3',				
					
					),
		),
		 		 
				 
		array(
			'type' => 'iconpicker',
			'heading' => __( 'آیکون', 'TEXT_DOMAIN' ),
			'param_name' => 'icon',
			'settings' => array(
			'emptyIcon' => false, // default true, display an "EMPTY" icon?
			'type' => 'linecons',
			'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'description' => __( 'انتخاب آیکون', 'TEXT_DOMAIN' ),
			'save_always' => true
		),	
				 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "متن دکمه", "TEXT_DOMAIN" ),
            "param_name" => "button_text",
			"value" => "درخواست مشاوره رایگان",
            "description" => esc_html__( "افزودن متن دکمه", "TEXT_DOMAIN" )
         ),
		 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "URL دکمه", "TEXT_DOMAIN" ),
            "param_name" => "url",
			"value" => "http://janxcode.com/rebuild/",
            "description" => esc_html__( "افزودن URL دکمه", "TEXT_DOMAIN" )
         ),
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب اندازه دکمه",'TEXT_DOMAIN'),
			 "param_name" => "button_size",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب اندازه دکمه',
					__('اندازه خیلی بزرگ', 'TEXT_DOMAIN') => 'xlarge',
					__('اندازه بزرگ', 'TEXT_DOMAIN') => 'large',
					__('اندازه متوسط', 'TEXT_DOMAIN') => 'medium',
					__('اندازه کوچک', 'TEXT_DOMAIN') => 'small',
					),
		),
		
		
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب منحنی دکمه",'TEXT_DOMAIN'),
			 "param_name" => "button_curve",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب منحنی دکمه',
					__('انحنای کوچک', 'TEXT_DOMAIN') => 'scurve',
					__('انحنای متوسط', 'TEXT_DOMAIN') => 'mcurve',
					__('تمام انحنا', 'TEXT_DOMAIN') => 'fcurve',
					),
		),
		
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب حاشیه",'TEXT_DOMAIN'),
			 "param_name" => "border",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب حاشیه',
					__('بلی', 'TEXT_DOMAIN') => 'yes',
					__('خیر', 'TEXT_DOMAIN') => 'no',
					),
		),
		
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب رنگ دکمه",'TEXT_DOMAIN'),
			 "param_name" => "button_color",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب رنگ دکمه',
					__('رنگ سبز', 'TEXT_DOMAIN') => 'green',
					__('رنگ قرمز', 'TEXT_DOMAIN') => 'red',
					__('رنگ آبی تیره', 'TEXT_DOMAIN') => 'darkblue',
					__('رنگ نارنجی', 'TEXT_DOMAIN') => 'orange',
					),
		),
		
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب انیمیشن",'TEXT_DOMAIN'),
			 "param_name" => "button_animation",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب انیمیشن',
					__('انیمیشن دکمه - بلی', 'TEXT_DOMAIN') => 'yes',
					__('انیمیشن دکه - خیر', 'TEXT_DOMAIN') => 'no',
					),
		)	 
		
      )
   )); 
	}
?>