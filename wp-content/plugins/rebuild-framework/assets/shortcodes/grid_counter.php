<?php 
	add_shortcode('grid_counter', 'rebuild_grid_counter');
	
	function rebuild_grid_counter($atts, $content = null) { 
		extract(shortcode_atts(array(
		'style' => '',
		'text_1' => 'شرکای محبوب ما',
		'count_1' => '2,345',
		'text_2' => 'مشتریان محبوب ما',
		'count_2' => '1,872',
		'text_3' => 'قراردادهای بسته شده',
		'count_3' => '400',
		'text_4' => 'مشتریان ثبت نام شده',
		'count_4' => '1650',
		'text_5' => 'درآمد کلی',
		'count_5' => '2300',
		
		), $atts)); 
		 
		
		//initial variables
		$out='';
		$style_class='';
		 
		
		if ($style=='light'):
		  	$style_class='jx-light';
		else:
			$style_class='jx-dark';
		endif;
		//function code
		
		
		$out ='<div class="jx-rebuild-grid-counter '.$style_class.'">
			
			<div class="row-1 clearfix">
				<div class="jx-grid-counter frst-item eight columns alpha">
					<div class="count-text">'.$text_1.'</div>
					<div class="count-number jx-rebuild-counter-up-stat">'.$count_1.'</div>					
				</div>
				<!-- First Item -->
				
				<div class="jx-grid-counter scnd-item eight columns omega">
					<div class="count-text">'.$text_2.'</div>
					<div class="count-number jx-rebuild-counter-up-stat">'.$count_2.'</div>					
				</div>
				<!-- Second Item -->
			</div>
			<div class="row-2 clearfix">
				<div class="jx-grid-count one-third columns alpha">
					<div class="title">'.$text_3.'</div>
					<div class="count jx-rebuild-counter-up-stat">'.$count_3.'</div>
				</div>
				<!-- 1st Item -->
				
				<div class="jx-grid-count one-third columns">
					<div class="title">'.$text_4.'</div>
					<div class="count jx-rebuild-counter-up-stat">'.$count_4.'</div>
				</div>
				<!-- 2nd Item -->
				
				<div class="jx-grid-count one-third columns omega">
					<div class="title">'.$text_5.'</div>
					<div class="count jx-rebuild-counter-up-stat">'.$count_5.'</div>
				</div>
				<!-- 3rd Item -->
				
			</div>
		
		</div>
			
		'; 	
			
				
		//return output
		return $out;
	}
	//Visual Composer	
	
	add_action( 'vc_before_init', 'vc_grid_counter' );
	
	
	function vc_grid_counter() {	
		vc_map(array(
			  "name" => esc_html__( "شمارنده شبکه ای", "rebuild" ),
			  "base" => "grid_counter",
			  "class" => "",
			  "icon" => get_template_directory_uri().'/images/icon/vc_grid_counter.png',
			  "category" => esc_html__( "شرت کدهای ReBuild", "rebuild"),
			  "description" => __('افزودن شمارنده شبکه ای','rebuild'),
			  "params" => array(
			  
			  
			  array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("انتخاب سبک",'rebuild'),
				 "param_name" => "style",
				 "value" => array(   
						__('روشن/تیره', 'TEXT_DOMAIN') => 'انتخاب سبک',
						__('روشن', 'TEXT_DOMAIN') => 'light',
						__('تیره', 'TEXT_DOMAIN') => 'dark',
						),
				),
			  	array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "متن", "rebuild" ),
					"param_name" => "text_1",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن عنوان", "rebuild" )
					),
			 
			  	array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "شمارنده", "rebuild" ),
					"param_name" => "count_1",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن شماره", "rebuild" )
					),
				
			    array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "متن", "rebuild" ),
					"param_name" => "text_2",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن عنوان", "rebuild" )
					),
			 
			    array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "شمارنده", "rebuild" ),
					"param_name" => "count_2",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن شماره", "rebuild" )
					),
				
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "متن", "rebuild" ),
					"param_name" => "text_3",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن عنوان", "rebuild" )
					),
			 
			    array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "شمارنده", "rebuild" ),
					"param_name" => "count_3",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن شماره", "rebuild" )
					),
				
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "متن", "rebuild" ),
					"param_name" => "text_4",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن عنوان", "rebuild" )
					),
			 
			    array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "شمارنده", "rebuild" ),
					"param_name" => "count_4",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن شماره", "rebuild" )
					),
				
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "متن", "rebuild" ),
					"param_name" => "text_5",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن عنوان", "rebuild" )
					),
			 
			    array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( "شمارنده", "rebuild" ),
					"param_name" => "count_5",
					"value" => "", //Default Counter Up Text
					"description" => esc_html__( "افزودن شماره", "rebuild" )
					),			
					
		  )
   		)); 
	}
	
?>