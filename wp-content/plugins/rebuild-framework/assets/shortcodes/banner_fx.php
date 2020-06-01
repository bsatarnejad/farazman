<?php 
	/* Banner FX  ---------------------------------------------*/
	
	add_shortcode('banner_fx', 'rebuild_banner_fx');
	
	function rebuild_banner_fx($atts, $content = null) { 
		extract(shortcode_atts(array(
				'type' => '',
				'image' => '',
				'title_a' => 'NICE',
				'title_bold' => 'LILY',
				'readmore' => '',
				'link' => ''		
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$img = wp_get_attachment_image_src($image, "small-blog");
		$imgSrc = $img[0];
		
		//initial variables
		$out=''; 
	
			//function code
				$out ='				
				   <div class="jx-rebuild-banner-fx-grid">
						<figure class="'.$type.'">
							<img src="'.$imgSrc.'" alt="" />
							<figcaption>
								<div>
									<h2>'.$title_a.' <span>'.$title_bold.'</span></h2>
									<p>'.do_shortcode($content).'</p>
								</div>
								<a href="'.$link.'">'.$readmore.'</a>
							</figcaption>			
						</figure>
					</div>
				';
			
			 
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_banner_fx' );
	
	
	function vc_banner_fx() {	
		vc_map(array(
      "name" => esc_html__( "بنر FX", "TEXT_DOMAIN" ),
      "base" => "banner_fx",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_banner.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن بنر FX','TEXT_DOMAIN'),
      "params" => array(
	  
	  
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک افکت",'TEXT_DOMAIN'),
			 "param_name" => "type",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب سبک افکت',
					__('Effect Lily', 'TEXT_DOMAIN') => 'effect-lily',
					__('Effect Sarah', 'TEXT_DOMAIN') => 'effect-sarah',
					__('Effect Honey', 'TEXT_DOMAIN') => 'effect-honey',
					__('Effect Layla', 'TEXT_DOMAIN') => 'effect-layla',
					__('Effect Oscar', 'TEXT_DOMAIN') => 'effect-oscar',
					__('Effect Marley', 'TEXT_DOMAIN') => 'effect-marley',
					__('Effect Ruby', 'TEXT_DOMAIN') => 'effect-ruby',
					__('Effect Roxy', 'TEXT_DOMAIN') => 'effect-roxy',
					__('Effect Bubba', 'TEXT_DOMAIN') => 'effect-bubba',
					),
		),
		
		
		 array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__( "تصویر", "TEXT_DOMAIN" ),
			"param_name" => "image",
			"value" => "",
			"description" => esc_html__( "تصویر را اضافه کنید.", "TEXT_DOMAIN" )
		 ),	
		 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
            "param_name" => "title_a",
			"value" => "NICE",
            "description" => esc_html__( "عنوان خود را تایپ کنید.", "TEXT_DOMAIN" )
         ),
		 
       array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "عنوان پررنگ", "TEXT_DOMAIN" ),
            "param_name" => "title_bold",
			"value" => "JHON",
            "description" => esc_html__( "عنوان پررنگ را تایپ کنید.", "TEXT_DOMAIN" )
         ),
		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "متن ادامه مطلب", "TEXT_DOMAIN" ),
            "param_name" => "readmore",
			"value" => "بیشتر بخوانید.",
            "description" => esc_html__( "عنوان ادامه مطلب را اضافه کنید.", "TEXT_DOMAIN" )
         ),
		 
		  array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "URL", "TEXT_DOMAIN" ),
            "param_name" => "link",
			"value" => "#",
            "description" => esc_html__( "افزودن URL", "TEXT_DOMAIN" )
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