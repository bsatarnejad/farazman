<?php 
	/* Service Box Group  ---------------------------------------------*/
	
	add_shortcode('service_box_group', 'rebuild_service_box_group');
	
	function rebuild_service_box_group($atts, $content = null) { 
		extract(shortcode_atts(array(
					'color_style' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$dark_light_color = "";
		
		if($color_style =="light") {
		$dark_light_color ="jx-rebuild-light";
		} elseif ($color_style =="dark") {
		$dark_light_color ="jx-rebuild-dark";
		}
		
		//function code
		$out ='<div class="'.$dark_light_color.'">'.do_shortcode($content).'</div>'; 
			
		
		//return output
		return $out;
	}
	/* Service Box Group  ---------------------------------------------*/
	
	add_shortcode('service_box', 'rebuild_service_box');
	
	function rebuild_service_box($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'title' => '',
					'title_border' => 'yes',
					'icon' => '',
					'image' => '',
					'readmore' => '',
					'bg_color' => '',
					'box_padding' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$title_border_class ="";
		$background_color = "";
		
		if($bg_color =="yes") {
		$background_color ="bg_color";
		} elseif ($bg_color =="no") {
		$background_color ="";
		}
		
		if($title_border =="yes") {
		$title_border_class ="";
		} elseif ($bg_color =="no") {
		$title_border_class ="no-border";
		}
		
		
		if($box_padding =="yes") {
		$box_padding_class ="box_padding";
		} else{
		$box_padding_class ="";
		}
		
		//function code
		
		switch($type){ 
		
			case '1': 
			
			$out  ='						
			<div class="one-third columns">
				<div class="jx-rebuild-servicelist-1">
					<div class="servicelist-head">
						<div class="servicelist-item"> 
							<div class="icon"><div><i class="stream-icon '.$icon.'"></i></div></div>
							<!-- Servicelist Icon -->
							<div class="item-position">
							<div class="category '.$title_border_class.'">'.$title.'</div>
							<!-- Title -->
							<div class="discription">'.do_shortcode($content).'</div>
							</div>
							 <!-- Servicelist Content -->
						</div>
					</div>
				</div>
			</div>			
			';
			
			break;
			
			case '2':
			
			$out  ='
			<div class="jx-rebuild-servicebox-2 '.$box_padding_class.'">
			
				<div class="one-third columns">
					<div class="jx-rebuild-servicebox-item">
						<div class="jx-rebuild-image jx-rebuild-image-wrapper">
							<img src="'.$image.'" alt="" />
							<div class="jx-rebuild-image-title-over">
								<a href=""><div class="jx-rebuild-title">'.$title.' <span><i class="fa fa-chevron-right"></i></span></div></a>                            
							</div>
						
						</div>
						<!-- Image -->
						<div class="description">'.do_shortcode($content).'</div>
						<!-- Description -->
						<div class="readmore"><a href="'.$readmore.'"><div class="plus-icon">+</div></a></div>
						<!-- Readmore -->
					</div>
				</div>
				<!-- Item 01 -->
			
			</div>
			';
			
			
			break;
			
			case '3':
			
			$out ='
                <div class="jx-rebuild-servicebox-1 '.$background_color.'">
				<div class="four columns">
                	<div class="jx-rebuild-servicebox-item">
                        <div class="icon icon-center"><i class="line-icon '.$icon.'"></i></div>
                        <!-- Icon -->
                        <div class="title">'.$title.'</div>
                        <!-- Title -->
                        <div class="description">'.do_shortcode($content).'</div>
                        <!-- Description -->
                        <div class="readmore"><a href="'.$readmore.'"><div class="plus-icon">+</div></a></div>
                        <!-- Readmore -->
                    </div>
                </div>
				</div>
			'; 
			break;			
			
			case '4':
			
			$out  ='			                
			   <div class="jx-rebuild-servicelist-2">
					<div class="servicelist-head">
						<div class="servicelist-item"> 
							<div class="icon"><i class="line-icon '.$icon.'"></i></div>
							<!-- Servicelist Icon -->
							<div class="item-position">
							<div class="title">'.$title.'</div>
							<!-- Title -->
							<div class="discription">'.do_shortcode($content).'</div>
							</div>
							 <!-- Servicelist Content -->
						</div>
					</div>
				</div> 
				
				<!-- Item # 1 -->
			';
			
			break;
			
			case '5':
			
			$out  ='			                
			   <div class="jx-rebuild-servicebox-3">
					<div class="servicelist-head">
						<div class="servicelist-item"> 
							<div class="icon"><i class="line-icon '.$icon.'"></i></div>
							<!-- Servicelist Icon -->
							<div class="item-position">
							<div class="title">'.$title.'</div>
							<!-- Title -->
							<div class="discription">'.do_shortcode($content).'</div>
							</div>
							 <!-- Servicelist Content -->
						</div>
					</div>
				</div> 
				
				<!-- Item # 1 -->
			';
			
			break;
			
		}
		
		//return output
		return $out;
	}
	
	
	
	
	//Visual Composer
	
	
	add_shortcode('service_box_single', 'rebuild_service_box_single');
	
	function rebuild_service_box_single($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'color_style' => '',
					'title' => 'اسلایدر',
					'service_icon' => 'انتخاب آیکون',
					'image' => 'http://rebuild.janxcode.com/wp-content/uploads/2015/10/stock-small-1.jpg',
					'readmore_text' => '',
					'readmore_link' => '',
					'bg_color' => '',
					'box_style' => '',
					'icon_bg_color' => '',
					'icon_shape' => 'circle',
					'title_border' => 'yes',
					'box_padding' => 'no',
					'box_align' => '',
					'floated' => 'no',
					'last_item' => '',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$readmore_btn='';
		$title_border_class ="";
		$dark_light_color = "";
		$box_padding_class="";
		$icon_code="";
		$box_align_class="";
		$last_item_class='';
		
		
		if($color_style =="light") {
		$dark_light_color ="jx-rebuild-light";
		} elseif ($color_style =="dark") {
		$dark_light_color ="jx-rebuild-dark";
		}
		
		if($last_item =="yes") {
			$last_item_class ="last-item";
		}
		
		$background_color = "";
		
		if($bg_color =="yes") {
		$background_color ="bg_color";
		} elseif ($bg_color =="no") {
		$background_color ="";
		}
		
		
			
		
		if($title_border =="yes") {
		$title_border_class ="";
		} elseif ($title_border =="no") {
		$title_border_class ="no-border";
		}
		
		
		if($floated =="yes") {
		$floated_class ="jx-rebuild-float";
		} elseif ($floated =="no") {
		$floated_class ="";
		}
		
		if($box_padding =="yes") {
		$box_padding_class ="box_padding";
		} else{
		$box_padding_class ="";
		}
		
		if($box_align =="right") {
		$box_align_class ="jx-right";
		} elseif($box_align =="left") {
		$box_align_class ="jx-left";
		}elseif($box_align =="center") {
		$box_align_class ="jx-center";
		}
		
		
		$box_style_color = "";
		
		if($box_style =="top_grey") {
		$box_style_color ="top_grey";
		} elseif ($box_style =="bottom_grey") {
		$box_style_color ="bottom_grey";
		} elseif ($box_style =="top_grey_border") {
		$box_style_color ="top_grey_border";
		}
		//function code
		
		$img = wp_get_attachment_image_src($image, "rebuild_small-blog");
	 	$imgSrc = $img[0];
		
		if($service_icon):
		$icon_code ='<div class="icon '.$floated_class.' '.$icon_shape.'"><i class="stream-icon '.$service_icon.'" style="background-color:'.$icon_bg_color.'"></i></div>
							<!-- Servicelist Icon -->';
		endif;
			
		$out .='<div class="'.$dark_light_color.'">'; 					
					
		switch($type){ 
		
			case '1': 
			
			$out  .='						
				<div class="jx-rebuild-servicelist-1 '.$box_align_class.'">
					<div class="servicelist-head">
						<div class="servicelist-item"> 
							'.$icon_code.'
							<div class="item-position">
							<div class="category '.$title_border_class.'">'.$title.'</div>
							<!-- Title -->
							<div class="discription">'.do_shortcode($content).'</div>
							</div>
							 <!-- Servicelist Content -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			';
			
			break;
			
			case '2':
			if($readmore_link):
			$readmore_btn='<div class="readmore"><a href="'.$readmore_link.'"><div class="plus-icon">+</div></a></div>';
			endif;
			
			$out .='
			<div class="jx-rebuild-servicebox-2 '.$box_padding_class.' '.$box_align_class.'">			
					<div class="jx-rebuild-servicebox-item">
						<div class="jx-rebuild-image jx-rebuild-image-wrapper">
							<img src="'.$imgSrc.'" alt="" />
							<div class="jx-rebuild-image-title-over">
								<a href=""><div class="jx-rebuild-title">'.$title.' <span><i class="fa fa-chevron-right"></i></span></div></a>                            
							</div>
						
						</div>
						<!-- Image -->
						<div class="description">'.do_shortcode($content).'</div>
						<!-- Description -->
						'.$readmore_btn.'
						<!-- Readmore -->
					</div>
				<!-- Item 01 -->
			</div>
			';
			
			
			break;
			
			case '3':
			if($readmore_link):
			$readmore_btn='<div class="readmore"><a href="'.$readmore_link.'"><div class="plus-icon">+</div></a></div>';
			endif;
			
			$out .='
                <div class="jx-rebuild-servicebox-1 '.$background_color.' '.$box_align_class.'">
                	<div class="jx-rebuild-servicebox-item '.$box_style_color.'">
                        '.$icon_code.'
						<div class="content">
                        <div class="title">'.$title.'</div>
                        <!-- Title -->
                        <div class="description">'.do_shortcode($content).'</div>
                        <!-- Description -->
						</div>
                        '.$readmore_btn.'
                        <!-- Readmore -->
                    </div>
				</div>
			'; 
			break;			
			
			case '4':
			
			$out .='			                
			   <div class="jx-rebuild-servicelist-2 '.$box_align_class.' '.$last_item_class.'">
					<div class="servicelist-head">
						<div class="servicelist-item"> 
							'.$icon_code.'
							<div class="item-position">
							<div class="title">'.$title.'</div>
							<!-- Title -->
							<div class="discription">'.do_shortcode($content).'</div>
							</div>
							 <!-- Servicelist Content -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div> 
				
				<!-- Item # 1 -->
			';
			
			break;
			
			case '5':
			
			$out .='			                
			   <div class="jx-rebuild-servicelist-3 '.$box_align_class.' '.$box_align_class.'">
					<div class="servicelist-head">
						<div class="servicelist-item"> 
							'.$icon_code.'
							<div class="item-position">
							<div class="title">'.$title.'</div>
							<!-- Title -->
							<div class="discription">'.do_shortcode($content).'</div>
							</div>
							 <!-- Servicelist Content -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div> 
				
				<!-- Item # 1 -->
			';
			
			break;
			
			
			case '6':
			if($readmore_text):
			$readmore_btn='<div class="readmore"><a href="'.$readmore_link.'">'.$readmore_text.'</a></div>';
			endif;
			
			$out .='			                
			   <div class="jx-rebuild-servicelist-4 '.$box_align_class.'">
					<div class="servicelist-head">
						<div class="servicelist-item"> 
							'.$icon_code.'
							<div class="item-position">
							<div class="title">'.$title.'</div>
							<!-- Title -->
							'.$readmore_btn.'
                        	<!-- Readmore -->
							</div>
							 <!-- Servicelist Content -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div> 
				
				<!-- Item # 1 -->
			';
			
			break;
			
			
			case '7':			
			$out .='
                <div class="jx-rebuild-servicebox-3 '.$background_color.'  '.$box_align_class.'">
                	<div class="jx-rebuild-servicebox-item '.$box_style_color.'">
                        '.$icon_code.'
						<div class="content">
                        <div class="title">'.$title.'</div>
                        <!-- Title -->
						<div class="title-hr"></div>
                        <div class="description">'.do_shortcode($content).'</div>
                        <!-- Description -->
						</div>
                    </div>
				</div>
			'; 
			break;
			
			case '8':			
			$out .='
                <div class="jx-rebuild-servicebox-3 with-curvebg '.$background_color.'  '.$box_align_class.'">
                	<div class="jx-rebuild-servicebox-item '.$box_style_color.'">
                        '.$icon_code.'
						<div class="content">
                        <div class="title">'.$title.'</div>
                        <!-- Title -->
						<div class="title-hr"></div>
                        <div class="description">'.do_shortcode($content).'</div>
                        <!-- Description -->
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
	
	
	
	add_action( 'vc_before_init', 'vc_service_box_single' );
	
	
	function vc_service_box_single() {	
		vc_map(array(
		  "name" => esc_html__( "کادر خدمات", "TEXT_DOMAIN" ),
		  "base" => "service_box_single",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_service_box.png',
		  "category" => esc_html__( "Rebuild Shortcodes", "TEXT_DOMAIN"),
		  "description" => __('افزودن کادر خدمات تکی','TEXT_DOMAIN'),
		  "params" => array(
					 
	
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("انتخاب سبک رنگ",'TEXT_DOMAIN'),
				"param_name" => "color_style",
				"value" => array(   
					__('انتخاب سبک رنگ', 'TEXT_DOMAIN') => 'انتخاب سبک رنگ',
					__('روشن', 'TEXT_DOMAIN') => 'light',
					__('تیره', 'TEXT_DOMAIN') => 'dark'
					),
			),
								
			
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
						__('سبک E', 'TEXT_DOMAIN') => '5',
						__('سبک F', 'TEXT_DOMAIN') => '6',
						 __('سبک G', 'TEXT_DOMAIN') => '7',
						  __('سبک H', 'TEXT_DOMAIN') => '8'
						),
				),
				
				array(
					'type' => 'iconpicker',
					'heading' => __( 'آیکون', 'TEXT_DOMAIN' ),
					'param_name' => 'service_icon',
					'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => __( 'انتخاب آیکون', 'TEXT_DOMAIN' ),
					'save_always' => true
				),
				
				array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("انتخاب آیکون شناور",'TEXT_DOMAIN'),
				"param_name" => "floated",
				"value" => array(   
					__('انتخاب سیک', 'TEXT_DOMAIN') => 'none',
					__('بلی', 'TEXT_DOMAIN') => 'yes',
					__('خیر', 'TEXT_DOMAIN') => 'no'
					),
			),
				
				array(
					"type" => "colorpicker",
					"heading" => __("رنگ پس زمینه آیکون", "TEXT_DOMAIN"),
					"param_name" => "icon_bg_color",
					"description" => __("انتخاب رنگ پس زمینه آیکون", "TEXT_DOMAIN")
				),
				
				array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("شکل آیکون",'TEXT_DOMAIN'),
				 "param_name" => "icon_shape",
				 "value" => array(   
						__('انتخاب شکل آیکون', 'TEXT_DOMAIN') => 'انتخاب رنگ پس زمینه',
						__('دایره', 'TEXT_DOMAIN') => 'radius',
						__('مربعی', 'TEXT_DOMAIN') => 'no-radius'
						),
				),	
							
				 array(
					"type" => "attach_image",
					"class" => "",
					"heading" => esc_html__( "تصویر", "TEXT_DOMAIN" ),
					"param_name" => "image",
					"value" => "انتخاب تصویر", //Default Counter Up Text
					"description" => esc_html__( "افزودن تصویر", "TEXT_DOMAIN" )
				 ),	
								
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"value" =>"افزودن عنوان",
					"description" => __("افزودن عنوان", "TEXT_DOMAIN")
				),
				
				array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("تنظیم حاشیه عنوان (فقط برای سبک A)",'TEXT_DOMAIN'),
				 "param_name" => "title_border",
				 "value" => array(   
						__('بلی/خیر', 'TEXT_DOMAIN') => '',
						__('بلی', 'TEXT_DOMAIN') => 'yes',
						__('خیر', 'TEXT_DOMAIN') => 'no'
						),
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
					"heading" => __("متن ادامه مطلب", "TEXT_DOMAIN"),
					"param_name" => "readmore_text",
					"value" =>"ثبت سفارش",
					"description" => __("افزودن متن ادامه مطلب", "TEXT_DOMAIN")
				),
				
				array(
					"type" => "textfield",
					"heading" => __("لینک ادامه مطلب", "TEXT_DOMAIN"),
					"param_name" => "readmore_link",
					"value" => "#",
					"description" => __("افزودن لینک ادامه مطلب", "TEXT_DOMAIN")
				),
				
				array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("پس زمینه کادر (فقط برای سبک C)",'TEXT_DOMAIN'),
				 "param_name" => "bg_color",
				 "value" => array(   
						__('بلی/خیر', 'TEXT_DOMAIN') => '',
						__('بلی', 'TEXT_DOMAIN') => 'yes',
						__('خیر', 'TEXT_DOMAIN') => 'no'
						),
				),
				
				array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("انتخاب سبک کادر (فقط برای سبک C)",'TEXT_DOMAIN'),
				 "param_name" => "box_style",
				 "value" => array(   
						__('انتخاب سبک کادر', 'TEXT_DOMAIN') => '',
						__('بالا خاکستری', 'TEXT_DOMAIN') => 'top_grey',
						__('بالا خاکستری با حاشیه', 'TEXT_DOMAIN') => 'top_grey_border',
						__('پایین خاکستری', 'TEXT_DOMAIN') => 'bottom_grey'
						),
				),
				
				array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("پدینگ کادر محتوا (فقط برای سبک B)",'TEXT_DOMAIN'),
				 "param_name" => "box_padding",
				 "value" => array(   
						__('بلی/خیر', 'TEXT_DOMAIN') => '',
						__('بلی', 'TEXT_DOMAIN') => 'yes',
						__('خیر', 'TEXT_DOMAIN') => 'no'
						),
				),
				
				array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("تنظیم تراز کادر",'TEXT_DOMAIN'),
				 "param_name" => "box_align",
				 "value" => array(   
						__('چپ/راست', 'TEXT_DOMAIN') => '',
						__('چپ', 'TEXT_DOMAIN') => 'left',
						__('راست', 'TEXT_DOMAIN') => 'right',
						__('وسط', 'TEXT_DOMAIN') => 'center',
						),
				),
				
				array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("تنظیم حاشیه آیتم آخز",'TEXT_DOMAIN'),
				 "param_name" => "last_item",
				 "value" => array(   
						__('خیر', 'TEXT_DOMAIN') => 'no',
						__('بلی', 'TEXT_DOMAIN') => 'yes',
						),
				),
				
	
					 
		  )
	   ));
    
	}
	
	
	?>