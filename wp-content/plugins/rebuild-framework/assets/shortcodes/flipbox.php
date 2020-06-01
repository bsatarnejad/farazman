<?php 
	
	//Flip Box
	
	add_shortcode('flipbox', 'rebuild_flipbox_single');
	
	function rebuild_flipbox_single($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'title' => 'اسلایدر',
					'box_icon' => 'انتخاب آیکون',
					'image' => 'http://rebuild.janxcode.com/wp-content/uploads/2015/10/stock-small-1.jpg',
					'readmore' => '',
					'bg_color' => '',
					'front_box_color' => '',
					'back_box_color' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$readmore_btn='';
		
		if($readmore):
			$readmore_btn='<div class="readmore"><a href="'.$readmore.'"><div class="plus-icon">+</div></a></div>';
		endif;
		//function code
		
		$img = wp_get_attachment_image_src($image, "rebuild_small-blog");
	 	$imgSrc = $img[0];
		
			
		$out .='<div class="jx-rebuild-main-flip">'; 					
					
		switch($type){ 
		
			case '1': 
			
			$out .='						
				<div class="jx-rebuild-flipbox-1 jx-rebuild-flipbox">
					<div class="hover panel">
					  <div class="jx-rebuild-flipbox-front">
						<div class="jx-rebuild-flipbox-item" style="background-color:'.$front_box_color.'">
							<div class="jx-rebuild-image jx-rebuild-image-wrapper">
								<img src="'.$imgSrc.'" alt="" />						
							</div>
							<!-- Image -->							
						</div>
					  </div>
					  
					  <div class="jx-rebuild-flipbox-back">
						<div class="jx-rebuild-flipbox-backitem" style="background-color:'.$back_box_color.'">
						  	<div class="jx-rebuild-title"><a href="">'.$title.'</a></div>
							<div class="description">'.do_shortcode($content).'</div>
							<!-- Description -->
							'.$readmore_btn.'
							<!-- Readmore -->
						</div>
					  </div>
					</div>
				</div>
			';
			
			break;
			
			case '2': 
			
			$out .='						
				<div class="jx-rebuild-flipbox-2 jx-rebuild-flipbox">
					<div class="hover panel">
					  <div class="jx-rebuild-flipbox-front">
						<div class="jx-rebuild-flipbox-item" style="background-color:'.$front_box_color.'">
							<div class="icon icon-center"><i class="line-icon '.$box_icon.'"></i></div>
							<div class="jx-rebuild-title"><a href="">'.$title.'</a></div>
							<!-- Image -->							
						</div>
					  </div>
					  
					  <div class="jx-rebuild-flipbox-back">
						<div class="jx-rebuild-flipbox-backitem" style="background-color:'.$back_box_color.'">
							<div class="description">'.do_shortcode($content).'</div>
							<!-- Description -->
							'.$readmore_btn.'
							<!-- Readmore -->
						</div>
					  </div>
					</div>
				</div>
			';
			
			break;		
			
			case '3': 
			
			$out .='						
				<div class="jx-rebuild-flipbox-3 jx-rebuild-flipbox">
					<div class="hover panel">
					  <div class="jx-rebuild-flipbox-front">
						<div class="jx-rebuild-flipbox-item " style="background-color:'.$front_box_color.'">
							<div class="icon icon-center"><i class="line-icon '.$box_icon.'"></i></div>
							<div class="jx-rebuild-title"><a href="">'.$title.'</a></div>
							<!-- Image -->							
						</div>
					  </div>
					  
					  <div class="jx-rebuild-flipbox-back">
						<div class="jx-rebuild-flipbox-backitem" style="background-color:'.$back_box_color.'">
							<div class="description">'.do_shortcode($content).'</div>
							<!-- Description -->
							'.$readmore_btn.'
							<!-- Readmore -->
						</div>
					  </div>
					</div>
				</div>
			';
			
			break;					
			
			
		}
			
		$out .='</div>'; 
		
		//return output
		return $out;
	}
	
	
	
	add_action( 'vc_before_init', 'vc_flipbox' );
	
	
	function vc_flipbox() {	
		vc_map(array(
		  "name" => esc_html__( "فلیپ باکس", "TEXT_DOMAIN" ),
		  "base" => "flipbox",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_service_box.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن فلیپ باکس','TEXT_DOMAIN'),
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
					'type' => 'iconpicker',
					'heading' => __( 'آیکون', 'TEXT_DOMAIN' ),
					'param_name' => 'box_icon',
					'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
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
					"param_name" => "image",
					"value" => "http://janxcode.com/rebuild/images/exhibition-floor.png", //Default Counter Up Text
					"description" => esc_html__( "افزودن تصویر", "TEXT_DOMAIN" )
				 ),
				 
				 array(
					"type" => "colorpicker",
					"heading" => __("رنگ کادر جلو", "TEXT_DOMAIN"),
					"param_name" => "front_box_color",
					"description" => __("انتخاب رنگ کادر جلو", "TEXT_DOMAIN")
				),
				
				 array(
					"type" => "colorpicker",
					"heading" => __("رنگ کادر پشت", "TEXT_DOMAIN"),
					"param_name" => "back_box_color",
					"description" => __("انتخاب رنگ کادر پشت", "TEXT_DOMAIN")
				),
								
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"value" => "Title Goes Here",
					"description" => __("افزودن عنوان", "TEXT_DOMAIN")
				),
				
				
				array(
					 "type" => "textarea",
					 "holder" => "div",
					 "class" => "",
					 "heading" => __("محتوا",'TEXT_DOMAIN'),
					 "param_name" => "content",
					 "value" => "",
				),
				
				array(
					"type" => "textfield",
					"heading" => __("ادامه مطلب", "TEXT_DOMAIN"),
					"param_name" => "readmore",
					"value" => "#",
					"description" => __("افزودن لینک ادامه مطلب", "TEXT_DOMAIN")
				)
			
		  )
	   ));
    
	}
	
	
	?>