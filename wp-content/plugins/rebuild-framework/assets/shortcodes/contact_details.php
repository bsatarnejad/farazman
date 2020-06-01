<?php 
	/* Contact Derails  ---------------------------------------------*/
	
	add_shortcode('contact_details', 'rebuild_contact_details');
	
	function rebuild_contact_details($atts, $content = null) { 
		extract(shortcode_atts(array(
					'icon' => 'icon-location',
					'title' => 'آدرس حقیقی',
					'address' => 'خیابان ولی عصر، تقاطع طالقانی، پلاک 12',
					'tel' => 'تلفن تماس : 5678 1234 021',
					'fax' => 'فکس : 5678 1234 021',
					'opening_days_a' => 'دوشنبه- شنبه: 8:00 Am – 18:00 Pm',
					'opening_days_b' => 'یکشنبه: تعطیل'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
		$out ='
		<!-- BDF CONTACT LINKS -->
			<div class="jx-rebuild-contact-info">
			
				<div class="icon"><i class="line-icon '.$icon.'"></i></div>
											
				<div class="item-position">
					<div class="title">'.$title.'</div>
					<div class="address">'.$address.'</div>                           
					<div class="phone">'.$tel.'</div>
					<div class="fax">'.$fax.'</div>  
					<div class="date-time">'.$opening_days_a.'</div>
					<div class="date-time">'.$opening_days_b.'</div>
				</div>
								
			</div>
        <!-- EDF CONTACT LINKS -->
		'; 
			
		
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_contact_details' );
	
	
	function vc_contact_details() {	
		vc_map(array(
      "name" => esc_html__( "اطلاعات تماس", "TEXT_DOMAIN" ),
      "base" => "contact_details",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_contact_detail.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن اطلاعات تماس','TEXT_DOMAIN'),
      "params" => array(
	  
		 		 
		array(
			'type' => 'iconpicker',
			'heading' => __( 'آیکون', 'TEXT_DOMAIN' ),
			'param_name' => 'icon',
			'settings' => array(
			'emptyIcon' => false, // default true, display an "EMPTY" icon?
			'type' => 'linecons',
			'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'description' => __( 'انتخاب آیکون', 'TEXT_DOMAIN' ),
			'save_always' => true
		),		
				 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
            "param_name" => "title",
			"value" => "آدرس حقیقی",
            "description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "آدرس", "TEXT_DOMAIN" ),
            "param_name" => "address",
			"value" => "خیابان ولی عصر، تقاطع طالقانی، پلاک 12",
            "description" => esc_html__( "افزودن آدرس", "TEXT_DOMAIN" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "شماره تلفن", "TEXT_DOMAIN" ),
            "param_name" => "tel",
			"value" => "021-123-456-7890",
            "description" => esc_html__( "افزودن شماره تلفن", "TEXT_DOMAIN" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "شماره فکس", "TEXT_DOMAIN" ),
            "param_name" => "fax",
			"value" => "021-123-456-7890",
            "description" => esc_html__( "افزودن شماره فکس", "TEXT_DOMAIN" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "روزهای کاری A", "TEXT_DOMAIN" ),
            "param_name" => "opening_days_a",
			"value" => "دوشنبه - جمعه : 8:00AM - 18:00PM",
            "description" => esc_html__( "افزودن ساعات کاری", "TEXT_DOMAIN" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "روزهای کاری B", "TEXT_DOMAIN" ),
            "param_name" => "opening_days_b",
			"value" => "یکشنبه - پنجشنبه : 8:00AM - 15:00PM",
            "description" => esc_html__( "افزودن ساعات کاری", "TEXT_DOMAIN" )
         )
		 
		
      )
   )); 
	}
	
	
	
?>