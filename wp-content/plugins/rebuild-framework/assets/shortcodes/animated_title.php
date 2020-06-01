<?php 
	/* Animated Head  ---------------------------------------------*/
	add_shortcode('animated_head', 'rebuild_animated_headline');
	
	function rebuild_animated_headline($atts, $content = null) { 
		extract(shortcode_atts(array(
			"fx_style" =>"push",
			"title" =>"عنوان را در این قسمت تایپ کنید.",
			"word_1" =>"اولین کلمه",
			"word_2" =>"دومین کلمه",
			"word_3" =>"سومین کلمه",
			"text_alignment" =>"center",
			"font_size" =>"",
			"font_color" =>"#333",
			"border" =>"",		
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
	
		//function code
	
			$out ='
			<div class="jx-rebuild-animated-heading" style="text-align:'.$text_alignment.'">
				<h1 class="jx-rebuild-headline '.$fx_style.' '.$border.'" style="font-size:'.$font_size.'!important;color:'.$font_color.';">
					<span>'.$title.'</span>
					<span class="jx-rebuild-words-wrapper">
						<b class="is-visible">'.$word_1.'</b>
						<b>'.$word_2.'</b>
						<b>'.$word_3.'</b>
					</span>
				</h1>
			</div>
			';
			
		//return output
		return $out;
	}
	//Visual Composer
	add_action( 'vc_before_init', 'vc_rebuild_animated_heading' );
	
	function vc_rebuild_animated_heading() {	
		vc_map(array(
		  "name" => esc_html__( "عنوان متحرک", "TEXT_DOMAIN" ),
		  "base" => "animated_head",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_map.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('اضافه کردن متن متحرک','TEXT_DOMAIN'),
		  "params" => array(
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("انتخاب سبک google map",'TEXT_DOMAIN'),
				 "param_name" => "fx_style",
				 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
					__('چرخش', 'TEXT_DOMAIN') => 'rotate-1',
					__('نوع', 'TEXT_DOMAIN') => 'letters type',
					__('چرخش 2', 'TEXT_DOMAIN') => 'letters rotate-2',
					__('نوار بارگذاری', 'TEXT_DOMAIN') => 'loading-bar',
					__('اسلاید', 'TEXT_DOMAIN') => 'slide',
					__('بزرگ نمایی', 'TEXT_DOMAIN') => 'zoom',
					__('چرخش 3', 'TEXT_DOMAIN') => 'letters rotate-3',
					__('مقیاس', 'TEXT_DOMAIN') => 'letters scale',
					__('فشار', 'TEXT_DOMAIN') => 'push',
					__('کلیپ', 'TEXT_DOMAIN') => 'clip is-full-width',
						),
			),
					 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
				"param_name" => "title",
				"value" => "",
				"description" => esc_html__( "عنوان اصلی را تایپ کنید.", "TEXT_DOMAIN" )
			 ),	
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "کلمه#1", "TEXT_DOMAIN" ),
				"param_name" => "word_1",
				"value" => "Sushi",
				"description" => esc_html__( "اولین کلمه را تایپ کنید.", "TEXT_DOMAIN" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "کلمه#2", "TEXT_DOMAIN" ),
				"param_name" => "word_2",
				"value" => "Block",
				"description" => esc_html__( "دومین کلمه را تایپ کنید.", "TEXT_DOMAIN" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "کلمه#3", "TEXT_DOMAIN" ),
				"param_name" => "word_3",
				"value" => "Futch",
				"description" => esc_html__( "سومین کلمه را تایپ کنید.", "TEXT_DOMAIN" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "اندازه فونت", "TEXT_DOMAIN" ),
				"param_name" => "font_size",
				"value" => "25px",
				"description" => esc_html__( "اندازه فونت را وارد کنید.", "TEXT_DOMAIN" )
			 ),
			 
			 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__( "رنگ فونت", "TEXT_DOMAIN" ),
				"param_name" => "font_color",
				"value" => "25px", 
				"description" => esc_html__( "انتخاب رنگ فونت", "TEXT_DOMAIN" )
			 ),		
			 
			 
			 array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("تنظیم تراز متن",'TEXT_DOMAIN'),
				 "param_name" => "text_alignment",
				 "value" => array(   
					__('تنظیم تراز', 'TEXT_DOMAIN') => 'تنظیم تراز',
					__('چپ', 'TEXT_DOMAIN') => 'left',
					__('وسط', 'TEXT_DOMAIN') => 'center',
					__('راست', 'TEXT_DOMAIN') => 'right',
						),
			),
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("تنظیم حاشیه",'TEXT_DOMAIN'),
				 "param_name" => "border",
				 "value" => array(   
					__('تنظیم حاشیه', 'TEXT_DOMAIN') => 'تنظیم حاشیه',
					__('بدون حاشیه', 'TEXT_DOMAIN') => '',
					__('حاشیه', 'TEXT_DOMAIN') => 'jx-rebuild-border'
						),
			),
			 
		  )
	   )); 
	}
?>