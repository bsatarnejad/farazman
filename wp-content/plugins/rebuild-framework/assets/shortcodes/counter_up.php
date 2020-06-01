<?php 
	/* Counter Up Group  ---------------------------------------------*/
	
	add_shortcode('counter_up_group', 'rebuild_counter_up_group');
	
	function rebuild_counter_up_group($atts, $content = null) { 
		extract(shortcode_atts(array(
					'color_style' => '',
					'style' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$dark_light_color = "";
		
		if($color_style == "light") {
		$dark_light_color = "light";
		} elseif ($color_style == "dark") {
		$dark_light_color = "dark";
		}
		$counter_up_style = "";
		
		if($style == "styleA") {
		$counter_up_style = "jx-rebuild-counter-up";
		} elseif ($style == "styleB") {
		$counter_up_style = "jx-rebuild-counter-up-2";
		}
		
		//function code
		$out ='<div class="'.$counter_up_style.' '.$dark_light_color.'">'.do_shortcode($content).'</div>'; 
			
		
		//return output
		return $out;
	}
	/* Counter Up  ---------------------------------------------*/
	
	add_shortcode('counter_up', 'rebuild_counter_up');
	
	function rebuild_counter_up($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'count_up' => '',
					'count_up_text' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		 
		
		//function code			
			
		$id= '-'.rand(0,1000);	
			
		switch($type){ 
			case '1':
			$out ='
			<div class="four columns">
				<div class="jx-rebuild-countup">            
					<div id="count'.$id.'" class="count_number jx-rebuild-count-up">'.$count_up.'</div>            
					<div class="countup_hr"></div>            
					<div class="counter_text">'.$count_up_text.'</div>                     
				</div>            
			</div>
			<!--Count up #1 -->     
			';
			break;
			
			case '2':
			$out  ='
			<div class="jx-rebuild-title"><i class="fa fa-clock-o"></i><span class="title">'.$count_up_text.'</span></div>
			<div class="jx-rebuild-counter-up-box">'.$count_up.'</div>
			'; 
			break;
			
		}
			
		
		//return output
		return $out;
	}
	
	
	
	
	
		/* Counter Up  ---------------------------------------------*/
	
	add_shortcode('vc_counter_up', 'vc_rebuild_counter_up');
	
	function vc_rebuild_counter_up($atts, $content = null) { 
		extract(shortcode_atts(array(
					'color_style' => '',
					'style' => '',
					'type' => '',
					'count_up' => '',
					'count_up_text' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$dark_light_color = "";
		
		if($color_style == "light") {
		$dark_light_color = "light";
		} elseif ($color_style == "dark") {
		$dark_light_color = "dark";
		}
		 
		
		//function code
		
 			$id= '-'.rand(0,1000);
			switch($type){ 
				case '1':
				$out .='
				<div class="jx-rebuild-counter-up '.$dark_light_color.'">
					<div class="jx-rebuild-countup">            
						<div id="count'.$id.'" class="count_number jx-rebuild-count-up">'.$count_up.'</div>            
						<div class="countup_hr"></div>            
						<div class="counter_text">'.$count_up_text.'</div>                     
					</div>            
				<!--Count up #1 -->     
				</div>
				';
				break;
				
				case '2':
				$out .='
				<div class="jx-rebuild-counter-up-2 '.$dark_light_color.'">
					<div class="jx-rebuild-title"><i class="fa fa-clock-o"></i><span class="title">'.$count_up_text.'</span></div>
					<div class="jx-rebuild-counter-up-box">'.$count_up.'</div>
				</div>
				'; 
				break;				
			}
 
		//return output
		return $out;
	}
	
	add_action( 'vc_before_init', 'vc_count_up' );
	
	
	function vc_count_up() {	
		vc_map(array(
		  "name" => esc_html__( "شمارش", "TEXT_DOMAIN" ),
		  "base" => "vc_counter_up",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_count.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن حداکثر مقدار شمارش','TEXT_DOMAIN'),
		  "params" => array(
					 	
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("انتخاب سبک رنگ",'TEXT_DOMAIN'),
				"param_name" => "color_style",
				"value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب سبک رنگ',
					__('روشن', 'TEXT_DOMAIN') => 'light',
					__('تیره', 'TEXT_DOMAIN') => 'dark'
					),
				"description" => esc_html__( "انتخاب سبک رنگ", "TEXT_DOMAIN" )
			),
			
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("انتخاب سبک شمارنده",'TEXT_DOMAIN'),
				 "param_name" => "type",
				 "value" => array(   
						__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب سبک شمارنده',
						__('سبک A', 'TEXT_DOMAIN') => '1',
						__('سبک B', 'TEXT_DOMAIN') => '2',
						),
				"description" => esc_html__( "انتخاب سبک شمارنده", "TEXT_DOMAIN" )
			),
				
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "عدد شمارش شده", "TEXT_DOMAIN" ),
				"param_name" => "count_up",
				"value"=> "",
				"description" => esc_html__( "افزودن حداکثر عدد شمارش", "TEXT_DOMAIN" )
			 ),
			 
			 array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "متن شمارش", "TEXT_DOMAIN" ),
				"param_name" => "count_up_text",
				"value"=> "",
				"description" => esc_html__( "افزودن متن شمارنده", "TEXT_DOMAIN" )
			 )					 
		  )
	   ));
    
	}
?>