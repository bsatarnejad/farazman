<?php 
	/* Tag Box  ---------------------------------------------*/
	add_shortcode('tag_box', 'rebuild_tag_box');
	function rebuild_tag_box($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'headline' => 'jx-rebuild-light',
					'tag_icon' => '',
					'tag_image' => '',
					'title' => '',
					'subtitle' => '',
					'button_text' => '',
					'button_link' => '',
					'bg' => ''
				), $atts)); 
		//initial variables
		$out=''; 
		$bg_class='';
		$icon_place='';
		//function code
			
			$img = wp_get_attachment_image_src($tag_image, "thumbnail");
	 		$imgSrc = $img[0];
			
			if ($tag_icon):
			$icon_place="<div class='tag_icon'><i class='".$tag_icon."'></i></div>";
			elseif($imgSrc):
			$icon_place=$imgSrc;
			else:
			$icon_place='';
			endif;
			
			
			switch($type){ 
			case '1':
			$out  ='
			<div class="jx-rebuild-tagline-box-1 '.$headline.'">
				<div class="container"> 
					<div class="thirteen columns">
						'.$icon_place.'
						<div class="box-content">
							<h2>'.$title.'</h2>
							<p>'.$subtitle.'</p>
						</div>
					<!-- Content -->
					</div>
					<div class="three columns">
						<div class="button"><a href="'.$button_link.'">'.$button_text.'</a></div>
						<!-- Button -->
					</div>            
				</div>
			</div>  
			'; 
			break;
			
			case '2':
			$out  ='
			<div class="jx-rebuild-tagline-box-slope jx-rebuild-bottom-slope jx-rebuild-right-slope"></div>
			<!-- container slope -->   
				<div class="jx-rebuild-container">
				<div class="sixteen columns">
					<div class="jx-rebuild-tagline-box-2 '.$headline.'">
						<div class="box-content">
							<h2>'.$title.'</h2>
							<p>'.$subtitle.'</p>				
						</div>				
						<!-- Content -->
						<div class="button"><a href="'.$button_link.'">'.$button_text.'</a></div>
						<!-- Button -->
					</div>          
				</div>  
			</div>
			'; 
			break;
			
			
			case '3':
			$out  ='			
			<div class="jx-rebuild-tagline-box-3 '.$headline.'">
				<div class="container"> 
					<div class="thirteen columns">
						<div class="box-content">
							<h2>'.$title.'</h2>
						</div>
					<!-- Content -->
					</div>
					<div class="three columns">
                        <div class="button"><a href="'.$button_link.'">'.$button_text.'</a></div>
						<!-- Button -->
					</div>            
				</div>
			</div>
			'; 
			break;
			
			case '4':
			$out  ='			
			<div class="jx-rebuild-tagline-box-4 '.$headline.'">
						<div class="box-content">
							<h1>'.$title.'</h1>
							<p>'.$subtitle.'</p>
							<div class="button"><a href="'.$button_link.'">'.$button_text.'</a></div>
						</div>
					<!-- Content -->
			</div>
			'; 
			break;
			
		}
		//return output
		return $out;
	}
	
	
	
	//Visual Composer
	add_action( 'vc_before_init', 'vc_tag_box' );
	
	function vc_tag_box() {	
		vc_map(array(
		  "name" => esc_html__( "کادر برچسب", "TEXT_DOMAIN" ),
		  "base" => "tag_box",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_tag.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن کادر برچسب','TEXT_DOMAIN'),
		  "params" => array(
					 
	
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("انتخاب سبک",'TEXT_DOMAIN'),
				 "param_name" => "type",
				 "value" => array( 
						__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
						__('سبک A', 'TEXT_DOMAIN') => '1',
						__('سبک B', 'TEXT_DOMAIN') => '2',
						__('سبک C', 'TEXT_DOMAIN') => '3',
						__('سبک D', 'TEXT_DOMAIN') => '4',
						),
			),
			
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("رنگ سرخط",'TEXT_DOMAIN'),
				 "param_name" => "headline",
				 "value" => array( 
						__('روشن', 'TEXT_DOMAIN') => 'jx-rebuild-light',
						__('تیره', 'TEXT_DOMAIN') => 'jx-rebuild-dark'
						),
			),
			
			array(
					'type' => 'iconpicker',
					'heading' => __( 'آیکون', 'TEXT_DOMAIN' ),
					'param_name' => 'tag_icon',
					'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => __( 'انتخاب آیکون', 'TEXT_DOMAIN' ),
					'save_always' => true
				),
				
			 array(
					"type" => "attach_image",
					"class" => "",
					"heading" => esc_html__( "تصویر", "TEXT_DOMAIN" ),
					"param_name" => "tag_image",
					"value" => "تنظیم تصویر",
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
				"heading" => esc_html__( "زیرعنوان", "TEXT_DOMAIN" ),
				"param_name" => "subtitle",
				"value" => "",
				"description" => esc_html__( "افزودن زیرعنوان", "TEXT_DOMAIN" )
			 ),
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "متن دکمه", "TEXT_DOMAIN" ),
				"param_name" => "button_text",
				"value" => "",
				"description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
			 ),
	
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "لینک دکمه", "TEXT_DOMAIN" ),
				"param_name" => "button_link",
				"value" => "",
				"description" => esc_html__( "افزودن زیرعنوان", "TEXT_DOMAIN" )
			 )		 
				
					 
		  )
	   ));
    
	}
	
	
	
	
?>