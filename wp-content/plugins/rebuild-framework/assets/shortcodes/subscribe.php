<?php 
	/* Subscribe  ---------------------------------------------*/
	
	add_shortcode('subscribe', 'rebuild_subscribe');
	
	function rebuild_subscribe($atts, $content = null) { 
		extract(shortcode_atts(array(
			'call_title' => 'دریافت مشاوره رایگان',
			'subscribe_title' => 'اشتراک در خبرنامه',
			'action'=>'//janxcode.us11.list-manage.com/subscribe/post?u=140e167e4ceaac2863e22db9e&amp;id=fcd462ebc8',
			'number' => '800 8080 1876'
		), $atts)); 
		 
		$name='';
		
		$parts = parse_url($action);
		parse_str($parts['query'], $query);
		
		//$name=$query['u'].'_'.$query['id'];
		
		//initial variables
		$out=''; 
		
		//function code
			
			$out ='
			
			
			<div class="jx-rebuild-tagline-box">
                <div class="container"> 
                        <div class="five columns box-content">
							<h2>'.$call_title.'</h2>
							<h3>'.$number.'</h3>
                        </div>
                    <!-- Content -->
                    	<div class="jx-rebuild-line-seperator"></div>
                    	<div class="eleven columns jx-rebuild-subscribeletter" id="mailchimp-sign-up">
                        
							<h2>'.$subscribe_title.'</h2>
                        	<p></p>
                        	<form action="'.$action.'"  method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>                       
								<span class="ajax-loader"></span>									
								<div class="jx-rebuild-newsletter-box">
								<input type="text" name="نام" placeholder="'.esc_html__('نام','rebuild').'" data-validation="required"/>
								</div>
								<div class="jx-rebuild-newsletter-box">
                                <input type="email" name="پست الکترونیکی" placeholder="'.esc_html__('پست الکترونیکی','rebuild').'" value="" data-validation="email" data-validation="required" id="mce-EMAIL"/>
                                </div>
								<div style="position: absolute; left: -5000px;"><input type="text" name="'.$name.'" tabindex="-1" value=""></div>
								<div class="jx-rebuild-newsletter-submit">
								<input type="submit" name="subscribe" value="'.esc_html__('ادامه','rebuild').'" id="mc-embedded-subscribe"/>
								</div>                    
							</form>							
                        
                        </div>
          
                </div>
            </div>
			
			';
			
		//return output
		return $out;
	}
	//Visual Composer
	add_action( 'vc_before_init', 'vc_subscribe' );
	
	function vc_subscribe() {	
		vc_map(array(
		  "name" => esc_html__( "اشتراک", "TEXT_DOMAIN" ),
		  "base" => "subscribe",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_subscribe.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن اشتراک','TEXT_DOMAIN'),
		  "params" => array(
				
	
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "عنوان تماس", "TEXT_DOMAIN" ),
				"param_name" => "call_title",
				"value" => "دریافت مشاوره رایگان", //Default Counter Up Text
				"description" => esc_html__( "افزودن عنوان تماس", "TEXT_DOMAIN" )
			 ),
	
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "عنوان اشتراک", "TEXT_DOMAIN" ),
				"param_name" => "subscribe_title",
				"value" => "اشتراک در خبرنامه", //Default Counter Up Text
				"description" => esc_html__( "افزودن عنوان اشتراک", "TEXT_DOMAIN" )
			 ),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "شماره", "TEXT_DOMAIN" ),
				"param_name" => "number",
				"value" => "800 8080 1876", //Default Counter Up Text
				"description" => esc_html__( "افزودن شماره تماس", "TEXT_DOMAIN" )
			 )
					 
		  )
	   ));
    
	}
?>