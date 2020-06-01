<?php 
	/* V Timeline  ---------------------------------------------*/
	
	add_shortcode('v_timeline', 'rebuild_v_timeline');
	
	function rebuild_v_timeline($atts, $content = null) { 
		extract(shortcode_atts(array(
			'date' => '1989',
			'title' => 'تاسیس شرکت'
			), $atts)); 
		 
		
		//initial variables
		$out=''; 
		//function code
		
			$out  ='
			<div class="jx-rebuild-v-timeline">
				<div class="jx-rebuild-v-timeline-item">
					<div class="date-position">
						<div class="date">'.$date.'</div>
					</div>
					<div class="item-position">
						<div class="jx-rebuild-title">'.$title.'</div>
						<div>'.do_shortcode($content).'</div>
					</div>
			
				</div>
			</div>
			'; 
			
		
		
		//return output
		return $out;
	}	
	
	
	//Visual Composer
	
	add_action( 'vc_before_init', 'vc_v_timeline' );
	
	
	function vc_v_timeline() {	
		vc_map(array(
		  "name" => esc_html__( "جدول زمانی V", "TEXT_DOMAIN" ),
		  "base" => "v_timeline",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_timeline.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن عنوان','TEXT_DOMAIN'),
		  "params" => array(
					 
	
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "تاریخ", "TEXT_DOMAIN" ),
				"param_name" => "date",
				"value" => "1989",
				"description" => esc_html__( "افزودن تاریخ", "TEXT_DOMAIN" )
			 ),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
				"param_name" => "title",
				"value" => "تاسیس شرکت",
				"description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
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