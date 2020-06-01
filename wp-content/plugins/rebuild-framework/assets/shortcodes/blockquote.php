<?php 
	/* Dropcaps  ---------------------------------------------*/
	add_shortcode('blockquote', 'rebuild_blockquote');
	
	function rebuild_blockquote($atts, $content = null) { 
		extract(shortcode_atts(array(
			'type' => '',
			'author_name' => ''
		), $atts)); 
		
		//initial variables
		$out=''; 
		//function code
		switch($type){ 
		
			case '1':
			$out  ='
			<!-- Blockquote -->
			<div class="jx-rebuild-blockquote">
			
				<div class="quote-a quote-border" style="background:;  color: ; border-left-color: !important; font-size: 17px; text-align:center; font-style: italic; margin: 10px auto; padding: 20px 10px 2px 20px; width: 100%;border-right: 1px solid #DDD;">' .do_shortcode($content). '<br><br><div class="author_name">'.$author_name.'</div></div>
			
			</div>
			<!-- End Blockquote -->
			'; 
			break;
			
			case '2':
			$out  ='
			<div class="jx-rebuild-blockquote">
				<div class="quote-b">' .do_shortcode($content). '</div>			
			</div>
			'; 
			break;
			
			case '3':
			$out  ='
			<!-- Blockquote -->
			<div class="jx-rebuild-blockquote">
			<div class="quote-a quote-border" style="background:;  color: ; border-left-color: !important; font-size: 17px; text-align:center; font-style: italic; margin: 10px auto; padding: 20px 10px 2px 20px; width: 100%;border-right: 1px solid #DDD;">' .do_shortcode($content). '<br><br><div class="author_name">'.$author_name.'</div></div>
			</div>
			<!-- End Blockquote -->
			'; 
			break;
		}
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_blockquote' );
	
	
	function vc_blockquote() {	
		vc_map(array(
      "name" => esc_html__( "نقل قول", "rebuild" ),
      "base" => "blockquote",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_quote.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "rebuild"),
	  "description" => __('افزودن دراپ کپس','rebuild'),
      "params" => array(
	  
	  
		 		 
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک",'rebuild'),
			 "param_name" => "type",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'none',
					__('سبک A', 'TEXT_DOMAIN') => '1',
					__('سبک B', 'TEXT_DOMAIN') => '2',
					__('سبک C', 'TEXT_DOMAIN') => '3',
					),
		),
		
		
			
		array(
			"type" => "textfield",
			"heading" => __("نام نویسنده", "TEXT_DOMAIN"),
			"param_name" => "author_name",
			"description" => __("عنوان زبانه را وارد کنید.", "TEXT_DOMAIN")
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
   )); 
	}
?>