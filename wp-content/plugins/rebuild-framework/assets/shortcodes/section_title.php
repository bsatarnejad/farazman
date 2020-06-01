<?php 
	/* Section Title  ---------------------------------------------*/
	
	add_shortcode('section_title', 'rebuild_section_title');
	
	function rebuild_section_title($atts, $content = null) { 
		extract(shortcode_atts(array(
			'type' => '',
			'color_style' => 'light',
			'title' => 'پروژه های جاری',
			'sub_title' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. '
			), $atts)); 
		 
		
		//initial variables
		$out=''; 
		//function code
		
		switch($type){ 
			case '1':
			$out  ='
				<div class="jx-rebuild-section-title-1 '.$color_style.'">            
				<div class="jx-rebuild-seperator-icon"><i class="fa fa-chevron-down"></i></div>
				<div class="jx-rebuild-title-position">
				<div class="jx-rebuild-left-border"></div>
				<div class="jx-rebuild-title jx-rebuild-uppercase">'.$title.'</div>
				<div class="jx-rebuild-right-border"></div>
				</div>
				<div class="jx-rebuild-subtitle">'.$sub_title.'</div>  
				</div> 
				<!-- Section Title -->		
			'; 
			break;
			
			case '2':
			$out  ='
				<div class="jx-rebuild-section-title-2 '.$color_style.'">
					<div class="jx-rebuild-title jx-rebuild-uppercase">'.$title.'</div>
					<div class="jx-rebuild-seperator-hr"></div>
				</div>
			'; 
			break;
			
			case '3':
			$out  ='
			<div class="jx-rebuild-section-title-3 '.$color_style.'">
				<div class="jx-rebuild-title">'.$title.'</div>
				<i class="fa fa-long-arrow-right"></i>
			</div>
			'; 
			break;
			
			case '4':
			$out  ='
			<div class="jx-rebuild-section-title-4 '.$color_style.'">
				<div class="jx-rebuild-title jx-rebuild-uppercase small-text">'.$title.'</div>
				<div class="jx-rebuild-seperator-hr"></div>
			</div>
			'; 
			
			break;
			
			case '5':
			$out  ='
				<div class="jx-rebuild-section-title-5 '.$color_style.'">            
				<div class="jx-rebuild-seperator-icon"><i class="fa fa-chevron-down"></i></div>
				<div class="jx-rebuild-title-position">
				<div class="jx-rebuild-left-border"></div>
				<div class="jx-rebuild-title jx-rebuild-uppercase">'.$title.'</div>
				<div class="jx-rebuild-right-border"></div>
				</div>
				<div class="jx-rebuild-subtitle">'.$sub_title.'</div>  
				</div> 
				<!-- Section Title -->	
			'; 
			
			break;
			
			case '6':
			$out  ='
				<div class="jx-rebuild-section-title-6 '.$color_style.'">            
				<div class="jx-rebuild-seperator-icon"><i class="fa fa-chevron-down"></i></div>
				<div class="jx-rebuild-title-position">
				<div class="jx-rebuild-title jx-rebuild-uppercase">'.$title.'</div>
				</div>
				<div class="jx-rebuild-subtitle">'.$sub_title.'</div>  
				</div> 
				<!-- Section Title -->	
			'; 
			
			break;
			
			
			case '7':
			$out  ='
				<div class="jx-rebuild-section-title-7 '.$color_style.'">            
				<div class="jx-rebuild-seperator-icon"><i class="fa fa-chevron-down"></i></div>
				<div class="jx-rebuild-title-position">
				<div class="jx-rebuild-title jx-rebuild-uppercase">'.$title.'</div>
				</div>
				<div class="jx-rebuild-subtitle">'.$sub_title.'</div>  
				</div> 
				<!-- Section Title -->	
			'; 
			
			break;
			
			
		}
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	add_action( 'vc_before_init', 'vc_section_title' );
	
	
	function vc_section_title() {	
		vc_map(array(
		  "name" => esc_html__( "عنوان بخش", "TEXT_DOMAIN" ),
		  "base" => "section_title",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_section_title.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن بخش','TEXT_DOMAIN'),
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
					__('سبک E', 'TEXT_DOMAIN') => '5',
					__('سبک F', 'TEXT_DOMAIN') => '6',
					__('سبک G', 'TEXT_DOMAIN') => '7',
						),
			),
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("انتخاب سبک رنگ",'TEXT_DOMAIN'),
				 "param_name" => "color_style",
				 "value" => array(   
						__('روشن', 'TEXT_DOMAIN') => 'light',
						__('تیره', 'TEXT_DOMAIN') => 'dark',
						),
			),
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
				"param_name" => "title",
				"value" => "پروژه های جاری",
				"description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
			 ),
			 
			array(
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__( "زیرعنوان", "TEXT_DOMAIN" ),
				"param_name" => "sub_title",
				"value" => "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. ",
				"description" => esc_html__( "افزودن زیرعنوان", "TEXT_DOMAIN" )
			 )
					 
		  )
	   ));
    
	}
?>