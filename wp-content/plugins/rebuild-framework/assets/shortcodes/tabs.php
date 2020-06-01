<?php 
	/* Tabs Group  ---------------------------------------------*/
	
	add_shortcode('tabs_group', 'rebuild_tabs_group');
	
	function rebuild_tabs_group($atts, $content = null) { 
		extract(shortcode_atts(array(
		'type' => '',
		), $atts)); 
		 
		global $tabs_divs;
    	$tabs_divs = '';
	
		//initial variables
		$out=''; 
		
		//function code
		
		switch($type){ 
		case '1':
	
		$out ='
		<div class="shortcode_tab_e jx-rebuild-white-tab jx-rebuild-arrow-tab">				
			<div id="horizontalTab-5">
				<ul class="resp-tabs-list jx-rebuild-tab-parent">'.do_shortcode($content).'</ul>
				<div class="resp-tabs-container jx-rebuild-tab-parent">'.$tabs_divs.'</div>	
				<div class="mb60"></div>
			</div>
		</div>
		';
		break;
		case '2':
		
		//function code	
			
			$out ='
			<div class="shortcode_tab_e">
				<div id="horizontalTab-1">
					<ul class="resp-tabs-list">'.do_shortcode($content).'</ul>
					<div class="resp-tabs-container jx-rebuild-tab-parent">'.$tabs_divs.'</div>	
					<div class="mb60"></div>
				</div>
			</div>
			';
					
		
		break;
		
		
		case '3':
		
		//function code	
			
			$out ='
			<div class="shortcode_tab_e">
				<div id="horizontalTab-2">
			 		 <ul class="resp-tabs-list">'.do_shortcode($content).'</ul>
					<div class="resp-tabs-container jx-rebuild-tab-parent">'.$tabs_divs.'</div>	
					<div class="mb60"></div>
				</div>
			</div>
			';
					
		
		break;
		
		
		case '4':
		
		//function code	
			
			$out ='
			<div class="shortcode_tab_e jx-rebuild-white-tab">
				<div id="horizontalTab-3">
				  	<ul class="resp-tabs-list">'.do_shortcode($content).'</ul>
					<div class="resp-tabs-container jx-rebuild-tab-parent">'.$tabs_divs.'</div>	
					<div class="mb60"></div>
				</div>
			</div>
			';
					
		
		break;
		case '5':
		
		//function code	
			
			$out ='
			<div class="shortcode_tab_a">
			   <div class="resp-vtabs" id="verticalTab-1">
				    <ul class="resp-tabs-list">'.do_shortcode($content).'</ul>
					<div class="resp-tabs-container jx-rebuild-tab-parent">'.$tabs_divs.'</div>	
					<div class="mb60"></div>
				</div>
			</div>
			';
					
		
		break;
		case '6':
		
		//function code	
			
			$out ='
			<div class="shortcode_tab_b">
				<div class="resp-vtabs" id="verticalTab-2">
					<ul class="resp-tabs-list">'.do_shortcode($content).'</ul>
					<div class="resp-tabs-container jx-rebuild-tab-parent">'.$tabs_divs.'</div>	
					<div class="mb60"></div>
				</div>
			</div>
			';
					
		
		break;
		
		
		
		case '7':
		
		//function code	
			
			$out ='
			<div class="shortcode_tab_e jx-rebuild-white-tab jx-rebuild-shadow-tab">
				<div id="horizontalTab-4">
				  	<ul class="resp-tabs-list">'.do_shortcode($content).'</ul>
					<div class="resp-tabs-container jx-rebuild-tab-parent">'.$tabs_divs.'</div>	
					<div class="mb60"></div>
				</div>
			</div>
			';
					
		
		break;		
		}		
				
		//return output
		return $out;
	}
	
	
	/* Tabs  ---------------------------------------------*/	
	add_shortcode('tabs', 'rebuild_tabs');	
	
	function rebuild_tabs($atts, $content = null) { 
		
		global $tabs_divs;
		
		extract(shortcode_atts(array(
			'id' => '',
        	'image' => 'انتخاب تصویر',
			'icon' => 'انتخاب آیکون', 
			'title' => 'عنوان', 		
		), $atts)); 
		 
		if(empty($id)){
			$id = 'side-tab'.rand(100,999); 
		}
		
		$out='';
		
				
		//initial variables
		$out.='<li class="resp-tab-item">';
		
        $img = wp_get_attachment_image_src($image, "small-blog");
	 	$imgSrc = $img[0];
		if($icon==''):
		
		else: 
		$out .='<div class="jx-rebuild-tab-icon"><i class="fa '.$icon.'"></i></div>';
		endif;
		
		if($imgSrc):    
			$out .='<div class="jx-rebuild-tab-bubble"><img src="'.$imgSrc.'" alt="" /></div>';
		endif;
			
		$out .='<div id="'.$id.'" class="jx-rebuild-tab-title">'.$title.'</div></li>'; 
		
		//function code
		$tabs_divs.= '
		 <div class="tab-content resp-tab-content">
			<p>'.$content.'</p>
		 </div>';
		
				
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_tab' );
	
	
	function vc_tab() {	
		
		vc_map( array(
			"name" => __("گروه زبانه ها", "TEXT_DOMAIN"),
			"base" => "tabs_group",
			"as_parent" => array('only' => 'tabs'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"show_settings_on_create" => false,
			"is_container" => true,
			"params" => array(
				// add params same as with any other content element
			
			array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک زبانه",'rebuild'),
			 "param_name" => "type",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب سبک',
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
					"type" => "textfield",
					"heading" => __("نام کلاس اضافی", "TEXT_DOMAIN"),
					"param_name" => "el_class",
					"description" => __("اگر شما سبک خاص و متفاوتی برای المان محتوا در نظر دارید، نام آن را در این قسمت وارد کرده و سپس برای به فایل cc خود ارجاع دهید.", "TEXT_DOMAIN")
				)
			),
			"js_view" => 'VcColumnView'
		) );
		vc_map( array(
			"name" => __("تک زبانه", "TEXT_DOMAIN"),
			"base" => "tabs",
			"content_element" => true,
			"as_child" => array('only' => 'tabs_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
				array(
					"type" => "textfield",
					"heading" => __("نام کلاس اضافی", "TEXT_DOMAIN"),
					"param_name" => "id",
					"value" => "",
					"description" => __("افزودن شناسه زبانه", "TEXT_DOMAIN")
				),
				
				array(
					'type' => 'iconpicker',
					'heading' => __( 'آیکون', 'TEXT_DOMAIN' ),
					'param_name' => 'icon',
					'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'fontawesome',
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
					"value" => "",
					"description" => esc_html__( "افزودن تصویر", "TEXT_DOMAIN" )
				 ),		
				
				array(
					"type" => "textfield",
					"heading" => __("عنوان", "TEXT_DOMAIN"),
					"param_name" => "title",
					"value" => "افزودن عنوان",
					"description" => __("افزودن عنوان زبانه", "TEXT_DOMAIN")
				),
				
				array(
					 "type" => "textarea",
					 "holder" => "div",
					 "class" => "",
					 "heading" => __("محتوا",'rebuild'),
					 "param_name" => "content",
					 "value" => "",
				)
				
			)
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_tabs_group extends WPBakeryShortCodesContainer {
			}
		}
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_tabs extends WPBakeryShortCode {
			}
		}
		
	}
	
	
?>