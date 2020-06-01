<?php 
	/* Accordion Group  ---------------------------------------------*/
	
	add_shortcode('accordion_group', 'rebuild_accordion_group');
	
	function rebuild_accordion_group($atts, $content = null) { 
		extract(shortcode_atts(array(
		'type' => '',
		'acco_size' => 'normal',
		'single_open' => 'yes'
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
	
		if($single_open=='yes'):
		$single_open_class='accordion';
		else:
		$single_open_class='accordion-open';
		endif;
		
		if($acco_size=='normal'):
		$acco_size_class='';
		else:
		$acco_size_class='jx-doubled-width';
		endif;
		
		switch($type){ 
			case '1':
			$out  ='
			<div class="jx-rebuild-accordion-3 '.$acco_size_class.' '.$single_open_class.'">  
				<div  class="circle" data-accordion-group="">'.do_shortcode($content).'</div>
			</div>
			<!-- According -->		
			'; 
			break;
			
			case '2':
			$out  ='
			<div class="jx-rebuild-accordion-3 '.$acco_size_class.'  '.$single_open_class.'">  
				<div  class="circle plus_sign" data-accordion-group="">'.do_shortcode($content).'</div>
			</div>
			<!-- According -->				
			'; 
			break;
			case '3':
			$out  ='
			<div class="jx-rebuild-accordion-3 '.$acco_size_class.'  '.$single_open_class.'">  
				<div  class="circle right_icon" data-accordion-group="">'.do_shortcode($content).'</div>
			</div>
			<!-- According -->				
			'; 
			break;
			
			case '4':
			$out  ='
			<div class="jx-rebuild-accordion-3 '.$acco_size_class.'  '.$single_open_class.'">  
				<div  class="circle plus_sign right_icon" data-accordion-group="">'.do_shortcode($content).'</div>
			</div>
			<!-- According -->				
			'; 
			break;
			
			case '5':
			$out  ='
			<div class="jx-rebuild-accordion '.$acco_size_class.'  '.$single_open_class.'">            
				<div  class="none jx-rebuild-toggle" data-accordion-group>'.do_shortcode($content).'</div>
			</div>
			<!-- According -->				
			'; 
			break;
			
			case '6':
			$out  ='
			<div class="jx-rebuild-accordion '.$acco_size_class.'  '.$single_open_class.'">                  
				<div class="circle" data-accordion-group>'.do_shortcode($content).'</div>
			</div>
			<!-- According -->				
			'; 
			break;
			
			
			case '7':
			$out  ='
			<div class="jx-rebuild-accordion '.$acco_size_class.'  jx-rebuild-accordion-border '.$single_open_class.'">                  
				<div class="circle" data-accordion-group>'.do_shortcode($content).'</div>
			</div>
			<!-- According -->				
			'; 
			break;			
		}				
		//return output
		return $out;
	}
	/* Accordion  ---------------------------------------------*/
	
	add_shortcode('accordion', 'rebuild_accordion');
	
	function rebuild_accordion($atts, $content = null) { 
		extract(shortcode_atts(array(
					'title' => 'عنوان را بنویسید.',
					'description' => 'محتوا را بنویسید.',
					'image' => '',
					'open' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$img_html='';
		
		$id = rand(0,1000); 
		
		//function code
		$img = wp_get_attachment_image_src($image, "small-blog");
	 	$imgSrc = $img[0];	
		if ($imgSrc):
		$img_html='<img src="'.$imgSrc.'" alt="" />';
		endif;
			$out ='
				<div id="'.$id.'" data-accordion="" class="jx-rebuild-accordion-item head '.$open.' engine all">
					<div class="title" data-control=""><span class="jx-rebuild-accordion-icon"></span>'.$title.'</div>
					<!-- According Title -->
					<div style="max-height: 0px; overflow: hidden;" data-content="">
					<div class="description">'.$img_html.$description.'</div>
					</div>
					<!-- According Content -->
					<div class="accordion-border"></div>
				</div>
			';		
		//return output
		return $out;
	}
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_accordion' );
	
	
	function vc_accordion() {	
		
		vc_map( array(
			"name" => __("گروه آکاردئون", "TEXT_DOMAIN"),
			"base" => "accordion_group",
			"as_parent" => array('only' => 'accordion'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
				
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
				 "heading" => __("سایز آکاردئون را انتخاب کنید.",'TEXT_DOMAIN'),
				 "param_name" => "acco_size",
				 "value" => array(   
						__('انتخاب سبک', 'TEXT_DOMAIN') => 'سایز آکاردئون را انتخاب کنید.',
						__('معمولی', 'TEXT_DOMAIN') => 'normal',
						__('بزرگ', 'TEXT_DOMAIN') => 'large',
						),
			),
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("تنها باز شود؟",'TEXT_DOMAIN'),
				 "param_name" => "single_open",
				 "value" => array(   
						__('انتخاب گزینه', 'TEXT_DOMAIN') => 'انتخاب گزینه',
						__('بلی', 'TEXT_DOMAIN') => 'yes',
						__('خیر', 'TEXT_DOMAIN') => 'no'
						),
			)
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("آکاردئون تکی", "TEXT_DOMAIN"),
			"base" => "accordion",
			"content_element" => true,
			"as_child" => array('only' => 'accordion_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("سبک آکاردئون را انتخاب کنید.",'TEXT_DOMAIN'),
				 "param_name" => "open",
				 "value" => array(   
						__('انتخاب سبک', 'TEXT_DOMAIN') => 'سبک آکاردئون را انتخاب کنید.',
						__('باز', 'TEXT_DOMAIN') => 'open',
						__('بسته', 'TEXT_DOMAIN') => 'close',
						),
			),	
			
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"description" => __("عنوان زبانه را تایپ کنید.", "TEXT_DOMAIN")
				),
				
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => esc_html__( "تصویر", "TEXT_DOMAIN" ),
					"param_name" => "image",
					"value" => "http://janxcode.com/rebuild/images/exhibition-floor.png", //Default Counter Up Text
					"description" => esc_html__( "تصویر را در این قسمت اضافه کنید.", "TEXT_DOMAIN" )
				 ),	
				
				array(
					 "type" => "textarea",
					 "holder" => "div",
					 "class" => "",
					 "heading" => __("محتوا",'TEXT_DOMAIN'),
					 "param_name" => "description",
					 "value" => "",
				)
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_accordion_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_accordion extends WPBakeryShortCode {
			}
		}
		
	}
	
	//EOF
	
	
?>