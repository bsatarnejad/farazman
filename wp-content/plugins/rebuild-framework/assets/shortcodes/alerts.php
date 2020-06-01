<?php 
	/* Alerts  ---------------------------------------------*/
	
	add_shortcode('alerts', 'rebuild_alerts');
	
	function rebuild_alerts($atts, $content = null) { 
		extract(shortcode_atts(array(
				'type' => '',
				'alert' => '',
				'message' => 'پیام خود را تایپ کنید.',
				'button_a' => 'دریافت',
				'button_b' => 'ادامه مطلب',
				'link_a' => '#1',
				'link_b' => '#2'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//initial variables
		$alert_button = "";
		$alert_class='';
		
		if($alert =="danger") {
		$alert_class ="jx-rebuild-alert-danger";
		$alert_button ="btn-danger";
		} elseif ($alert =="success") {
		$alert_class ="jx-rebuild-alert-success";
		$alert_button ="btn-success";
		} elseif ($alert =="info") {
		$alert_class ="jx-rebuild-alert-info";
		$alert_button ="btn-info";
		} elseif ($alert =="warning") {
		$alert_class ="jx-rebuild-alert-warning";
		$alert_button ="btn-warning";
		}
		
		switch($type){ 
		case '1':
					
			//function code
				
				
				$out ='
				<div class="jx-rebuild-alert-notification">
					<div class="alert-with-icon '.$alert_class.'"><div class="jx-rebuild-close "><i class="fa fa-close"></i></div>'.$message.'</div>
				</div>
				';
			
			
			break;
			
			case '2':
			
			//function code
				$out ='
				<div class="jx-rebuild-alert-notification">
					<div class="alert-with-one-button '.$alert_class.'">
						<div class="message-position">'.$message.'</div>
						<div class="button-position"><a href="'.$link_a.'" class="alert-btn '.$alert_button.'">'.$button_a.'</a></div>
					</div>
				</div>
				';
			
			break;
			case '3':
			
			//function code
				$out ='
					<div class="jx-rebuild-alert-notification">
						<div class="alert-with-two-button '.$alert_class.'">
							<div class="jx-rebuild-close "><i class="fa fa-close"></i></div>
							<div class="jx-rebuild-alert-title"></div>
							<div class="jx-rebuild-alert-message">'.$message.'</div>
							<div class="jx-rebuild-button-position"><a href="'.$link_a.'" class="alert-btn '.$alert_button.'">'.$button_a.'</a><a href="'.$link_b.'" class="alert-btn '.$alert_button.'">'.$button_b.'</a></div>
						</div>
					</div>
				';
			
			break;
			
			}
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_alerts' );
	
	
	function vc_alerts() {	
		vc_map(array(
      "name" => esc_html__( "هشدارها", "TEXT_DOMAIN" ),
      "base" => "alerts",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_alert.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('اضافه کردن هشدار','TEXT_DOMAIN'),
      "params" => array(
	  
	  
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک کادر اطلاع رسانی",'TEXT_DOMAIN'),
			 "param_name" => "type",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب سبک کادر اطلاع رسانی',
					__('هشدار با آیکون', 'TEXT_DOMAIN') => '1',
					__('هشدار با یک دکمه', 'TEXT_DOMAIN') => '2',
					__('هشدار با دو دکمه', 'TEXT_DOMAIN') => '3',
					),
		),
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب اطلاع رسانی",'TEXT_DOMAIN'),
			 "param_name" => "alert",
			 "value" => array(   
					__('انتخاب سبک', 'TEXT_DOMAIN') => 'انتخاب اطلاع رسانی',
					__('خطر', 'TEXT_DOMAIN') => 'danger',
					__('موفقیت', 'TEXT_DOMAIN') => 'success',
					__('اطلاعات', 'TEXT_DOMAIN') => 'info',
					__('اخطار', 'TEXT_DOMAIN') => 'warning',
					),
		),
		 	
			
       array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "پیام اطلاع رسانی", "TEXT_DOMAIN" ),
            "param_name" => "message",
			"value" => "خطا! اشتباهی رخ داده است.", //Default Counter Up Text
            "description" => esc_html__( "پیام خود را در این قسمت وارد کنید.", "TEXT_DOMAIN" )
         ),
		 
		 
      array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "دکمه متن A", "TEXT_DOMAIN" ),
            "param_name" => "button_a",
			"value" => "دریافت", 
            "description" => esc_html__( "متن دکمه را اضافه کنید.", "TEXT_DOMAIN" )
         ),
      array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "دکمه متن إ", "TEXT_DOMAIN" ),
            "param_name" => "button_b",
			"value" => "ادامه مطلب",
            "description" => esc_html__( "متن دکمه را اضافه کنید.", "TEXT_DOMAIN" )
         ),
		 
    array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "دکمه لینک A", "TEXT_DOMAIN" ),
            "param_name" => "link_a",
			"value" => "http://rebuild.janxcode.com",
            "description" => esc_html__( "URL دکمه خود را وارد کنید.", "TEXT_DOMAIN" )
         ),
		 
		 
	   array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "دکمه لینک B", "TEXT_DOMAIN" ),
            "param_name" => "link_b",
			"value" => "http://rebuild.janxcode.com/",
            "description" => esc_html__( "URL دکمه خود را وارد کنید.", "TEXT_DOMAIN" )
         )
		
      )
   )); 
	}
	
	
	
	
	
	
?>