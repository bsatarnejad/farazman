<?php 
	/* Accordion Group  ---------------------------------------------*/
	
	add_shortcode('owl_group', 'rebuild_owl_group');
	
	function rebuild_owl_group($atts, $content = null) { 
		extract(shortcode_atts(array(
			'type' => '',
			'list_style' => '',
			'font_size' => 'default',
			'icon_bg' => 'none',
			'color_style' => 'dark',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		
		
		$style = "";
		$font_size_class="";
		$icon_bg_class="";
		$color_style_class="";
		
				
		$out  ='
			<div class="jx-rebuild-owl-slider owl-carousel owl-theme">
			'.do_shortcode($content).'
			</div>
		'; 
			
		
		$out .="<script>
		
			jQuery(document).ready(function(){
			  jQuery('.owl-carousel').owlCarousel();
			});
			
		</script>";	
				
		//return output
		return $out;
	}
	/* Accordion  ---------------------------------------------*/
	
	add_shortcode('owl', 'rebuild_owl');
	
	function rebuild_owl($atts, $content = null) { 
		extract(shortcode_atts(array(
					'title' => '',
					'subtitle' => '',
					'image' => '',
					'icon' => 'fa fa-check',
					'readmore_text' =>'',
					'readmore_link' =>''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$readmore_btn='';
		
		
		//function code
		$img = wp_get_attachment_image_src($image, "rebuild_small-blog");
	 	$imgSrc = $img[0];
		
		if($readmore_text):
			$readmore_btn='<div class="readmore"><a href="'.$readmore_link.'">'.$readmore_text.'</a></div>';
			endif;
		
		$out ='
			<div class="jx-rebuild-owl-slider-item vc_row wpb_row vc_inner vc_row-fluid" style="background-image:url('.$imgSrc.');">
				<div class="wpb_column vc_column_container vc_col-sm-12">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="vc_row wpb_row vc_inner vc_row-fluid">					
							<div class="wpb_column vc_column_container vc_col-sm-6">
								<div class="title">'.$title.'</div>
								<div class="title">'.$subtitle.'</div>
								<div class="description"><p>'.do_shortcode($content).'</p></div>
								<div class="button">'.$readmore_btn.'</div>
							</div>
							
							<div class="wpb_column vc_column_container vc_col-sm-6">
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>

		';
		
	
		
		//return output
		return $out;
	}
	
		//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_owl' );
	
	
	function vc_owl() {	
		
		vc_map( array(
			"name" => __("owl Group", "TEXT_DOMAIN"),
			"base" => "owl_group",
			"as_parent" => array('only' => 'owl'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
				
				array(
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => __("انتخاب سبک رنگ",'rebuild'),
					 "param_name" => "color_style",
					 "value" => array(   
							__('انتخاب سبک رنگ', 'TEXT_DOMAIN') => 'none',
							__('روشن', 'TEXT_DOMAIN') => 'light',
							__('تیره', 'TEXT_DOMAIN') => 'dark'
							
							),
				),
				
				
			),
			"js_view" => 'VcColumnView'
		)
		 );
		
		
		vc_map( array(
			"name" => __("چرخشی تکی", "TEXT_DOMAIN"),
			"base" => "owl",
			"content_element" => true,
			"as_child" => array('only' => 'owl_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
								
				
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
					"description" => __("عنوان زبانه را تایپ کنید.", "TEXT_DOMAIN")
				),
					 
								
				array(
					"type" => "textfield",
					"heading" => __("زیرعنوان", "TEXT_DOMAIN"),
					"param_name" => "subtitle",
					"value" =>"افزودن عنوان",
					"description" => __("افزودن زیرعنوان", "TEXT_DOMAIN")
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
					"description" => __("وارد کردن متن ادامه مطلب", "TEXT_DOMAIN")
				),
				
				array(
					"type" => "textfield",
					"heading" => __("لینک ادامه مطلب", "TEXT_DOMAIN"),
					"param_name" => "readmore_link",
					"value" => "#",
					"description" => __("افزودن لینک ادامه مطلب", "TEXT_DOMAIN")
				),
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_owl_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_owl extends WPBakeryShortCode {
			}
		}
		
	}
?>