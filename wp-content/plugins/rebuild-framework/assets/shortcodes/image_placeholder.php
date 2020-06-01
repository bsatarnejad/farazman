<?php 
	/* Image Placeholder  ---------------------------------------------*/
	
	add_shortcode('image_placeholder', 'rebuild_image_placeholder');
	
	function rebuild_image_placeholder($atts, $content = null) { 
		extract(shortcode_atts(array(
					'image' => '',
					'title' => '',
					'link' => '',
					'icon' => 'fa-play',
					'center' => 'no',
					'shadow' => 'no',
					'inline_css' => 'width:200',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$image_link='';
		$center_class='';
		$set_title='';
		$shadow_class='';
		
		if ($center=='yes'):
		$center_class="jx-center";
		else:
		$center_class="";
		endif;
		
		if ($shadow=='yes'):
		$shadow_class="jx-shadow";
		else:
		$shadow_class="";
		endif;
		
		
		
		if($title):
		$set_title='<a href="'.$link.'" class="title">'.$title.'</a>';
		elseif($link):
		$image_link='<div class="jx-rebuild-image-over">
					<div class="jx-rebuild-play-btn"><a href="'.$link.'" data-rel="prettyPhoto"><i class="fa '.$icon.'"></i></a></div>
				</div>';
		endif;
		
		$img = wp_get_attachment_image_src($image,'rebuild-max');
	 	$imgSrc = $img[0];
		 
		//function code
			
			$out ='
			<div class="jx-rebuild-image-placholder jx-rebuild-image-wrapper '.$center_class.' '.$shadow_class.'">
				<img src="'.$imgSrc.'" alt="" style="'.$inline_css.'">
				'.$image_link.'
				'.$set_title.'
				</div>
			';
			
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_image_placeholder' );
	
	
	function vc_image_placeholder() {	
		vc_map(array(
      "name" => esc_html__( "متن نگهدارنده تصویر", "TEXT_DOMAIN" ),
      "base" => "image_placeholder",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_image_placeholder.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن متن نگهدارنده تصویر','TEXT_DOMAIN'),
      "params" => array(
	 
		 
         array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__( "تصویر", "TEXT_DOMAIN" ),
            "param_name" => "image",
			"value" => "انتخاب تصویر",
            "description" => esc_html__( "افزودن تصویر", "TEXT_DOMAIN" )
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
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "لینک", "TEXT_DOMAIN" ),
            "param_name" => "link",
			"value" => "#",
            "description" => esc_html__( "لینک تصویر", "TEXT_DOMAIN" )
         ),
		 
		  array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__( "سایه", "TEXT_DOMAIN" ),
            "param_name" => "shadow",
			"value" => array(   
						__('خیر', 'TEXT_DOMAIN') => 'none',
						__('بلی', 'TEXT_DOMAIN') => 'yes',
						
						),
         ),
		 
		  array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__( "تنظیم مرکز", "TEXT_DOMAIN" ),
            "param_name" => "center",
			"value" => array(   
						__('خیر', 'TEXT_DOMAIN') => 'none',
						__('بلی', 'TEXT_DOMAIN') => 'yes',
						
						),
         ),
		  array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "CSS", "TEXT_DOMAIN" ),
            "param_name" => "inline_css",
			"value" => '',
            "description" => esc_html__( "CSS درون خطی", "TEXT_DOMAIN" )
         )
		 
		
      )
   )); 
	}
?>