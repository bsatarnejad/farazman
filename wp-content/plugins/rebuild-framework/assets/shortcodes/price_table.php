<?php 
	/* Price Table Group  ---------------------------------------------*/
	
	add_shortcode('price_table_group', 'rebuild_price_table_group');
	
	function rebuild_price_table_group($atts, $content = null) { 
		extract(shortcode_atts(array(), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		$out ='
		
		<div class="jx-rebuild-price-1">
		<ul class="jx-rebuild-price">'.do_shortcode($content).'</ul>
		
		<div class="jx-rebuild-price-form">
		
		<div class="jx-rebuild-price-plan-info">
		<!-- content will be loaded using jQuery - according to the selected plan -->
		</div>
		
		<div class="jx-rebuild-price-more-info">
		<h3>Need help?</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		
		<form action="">
		<fieldset>
		<legend>Account Info</legend>
		
		<div class="half-width">
			<label for="userName">Name</label>
			<input type="text" id="userName" name="userName">
		</div>
		
		<div class="half-width">
			<label for="userEmail">Email</label>
			<input type="email" id="userEmail" name="userEmail">
		</div>
		
		<div class="half-width">
			<label for="userPassword">Password</label>
			<input type="password" id="userPassword" name="userPassword">
		</div>
		
		<div class="half-width">
			<label for="userPasswordRepeat">Repeat Password</label>
			<input type="password" id="userPasswordRepeat" name="userPasswordRepeat">
		</div>
		</fieldset>
		
		<fieldset>
		<legend>Payment Method</legend>
		
		<div>
			<ul class="jx-rebuild-price-payment-getways">
				<li>
					<input type="radio" name="payment-method" id="paypal" value="paypal">
					<label for="paypal">Paypal</label>
				</li>
				
				<li>
					<input type="radio" name="payment-method" id="card" value="card" checked>
					<label for="card">Card</label>
				</li>
			</ul> <!-- .jx-rebuild-price-payment-getways -->
		</div>
		
		<div class="jx-rebuild-price-credit-card">
			<div>
				<p class="half-width">
					<label for="cardNumber">Card Number</label>
					<input type="text" id="cardNumber" name="cardNumber">
				</p>
		
				<p class="half-width">
					<label>Expiration date</label>
					<b>
						<span class="cd-select">
							<select name="card-expiry-month" id="card-expiry-month">
								<option value="1">1</option>
								<option value="1">2</option>
								<option value="1">3</option>
								<option value="1">4</option>
								<option value="1">5</option>
								<option value="1">6</option>
								<option value="1">7</option>
								<option value="1">8</option>
								<option value="1">9</option>
								<option value="1">10</option>
								<option value="1">11</option>
								<option value="1">12</option>
							</select>
						</span>
		
						<span class="cd-select">
					  <select name="card-expiry-year" id="card-expiry-year">
								<option value="2015">2015</option>
								<option value="2015">2016</option>
								<option value="2015">2017</option>
								<option value="2015">2018</option>
								<option value="2015">2019</option>
								<option value="2015">2020</option>
							</select>
						</span>
					</b>
				</p>
				
				<p class="half-width">
					<label for="cardCvc">Card CVC</label>
					<input type="text" id="cardCvc" name="cardCvc">
				</p>
			</div>
		</div> <!-- .jx-rebuild-price-credit-card -->
		</fieldset>
		
		<fieldset>
		<div>
			<input type="submit" value="Get started">
		</div>
		</fieldset>
		</form>
		
		<a href="#0" class="jx-rebuild-price-close"></a></div> 
			<!-- .jx-rebuild-price-form -->
			
			<div class="jx-rebuild-price-overlay"></div>
			<!-- shadow layer -->
		
		</div>
		'; 
			
		
		//return output
		return $out;
	}
	/* Price Table  ---------------------------------------------*/
	
	add_shortcode('price_table', 'rebuild_price_table');
	
	function rebuild_price_table($atts, $content = null) { 
		extract(shortcode_atts(array(
					'title' => '',
					'currency_type' => '',
					'price' => '',
					'after_dot_price' => '',
					'text_a' => '',
					'sub_text_a' => '',
					'text_b' => '',
					'sub_text_b' => '',
					'text_c' => '',
					'sub_text_c' => '',
					'text_d' => '',
					'sub_text_d' => '',
					'price_button' => ''
				
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		 
		
		//function code
			
			$out ='	
			<li>                
			<!-- BDF Price Table -->
				<div class="title">'.$title.'</div>
				<!-- Title -->
				<div class="price">'.$price.'<span class="top">'.$currency_type.'</span><span></span></div>
				<!-- Price -->
				<ul class="list">
				<li><strong>'.$sub_text_a.'</strong> '.$text_a.'</li>
				<li><strong>'.$sub_text_b.'</strong> '.$text_b.'</li>
				<li><strong>'.$sub_text_c.'</strong> '.$text_c.'</li>
				<li><strong>'.$sub_text_d.'</strong> '.$text_d.'</li>
				</ul>
				<!-- List -->
				<div class="jx-rebuild-price-footer jx-rebuild-button"><a href="'.$after_dot_price.'" class="price-btn">'.$price_button.'</a></div>
				<!-- Button -->
			<!-- EDF Price Table -->
			</li>
				';
		
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_shortcode('price_table_single', 'rebuild_price_table_single');
	
	function rebuild_price_table_single($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'color_style' => '',
					'title' => 'پایه',
					'subtitle' => 'برای مبتدیان',
					'currency_type' => 'تومان',
					'price' => '15',
					'after_dot_price' => '',
					'text_a' => 'حافظه',
					'sub_text_a' => 'خارجی',
					'text_b' => 'زیردامنه',
					'sub_text_b' => 'نامحدود',
					'text_c' => 'پشتیبانی',
					'sub_text_c' => 'مشتریان',
					'text_d' => 'پهنای باند',
					'sub_text_d' => 'نامحدود',
					'price_button' => 'سفارش'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		 
		$id= '-'.rand(0,1000);
		
		$dark_light_color = "";
		
		if($color_style =="light") {
		$dark_light_color ="jx-rebuild-light";
		} elseif ($color_style =="dark") {
		$dark_light_color ="jx-rebuild-dark";
		}
		
		//function code
		
		switch($type){ 
		
		case '1': 
			
		$out .='<div class="jx-rebuild-price-1 '.$dark_light_color.'"><div class="jx-rebuild-price">';
		
		
			$out .='	              
			<!-- BDF Price Table -->
				<div class="title">'.$title.'</div>
				<!-- Title -->
				<div class="price">'.$price.'<span class="top">'.$currency_type.'</span><span></span></div>
				<!-- Price -->
				<ul class="list">
				<li><strong>'.$sub_text_a.'</strong> '.$text_a.'</li>
				<li><strong>'.$sub_text_b.'</strong> '.$text_b.'</li>
				<li><strong>'.$sub_text_c.'</strong> '.$text_c.'</li>
				<li><strong>'.$sub_text_d.'</strong> '.$text_d.'</li>
				</ul>
				<!-- List -->
				<div class="jx-rebuild-price-footer jx-rebuild-button"><a href="'.$after_dot_price.'" class="price-btn">'.$price_button.'</a></div>
				<!-- Button -->
			<!-- EDF Price Table -->
			';
		
		$out .='</div></div>'; 
				
		
		break;
		
		case '2':
		
		$out .='<div class="jx-rebuild-price-2 '.$dark_light_color.'"><div class="jx-rebuild-price">';
		
		
			$out .='               
			<!-- BDF Price Table -->
				<div class="title">'.$title.'</div>
				<!-- Title -->
				<div class="price">
					<span class="top">'.$price.'</span>'.$currency_type.'<span></span>
					<div class="subtitle">'.$subtitle.'</div>
				</div>
				<!-- Price -->
				<ul class="list">
				<li>'.$sub_text_a.' '.$text_a.'</li>
				<li>'.$sub_text_b.' '.$text_b.'</li>
				<li>'.$sub_text_c.' '.$text_c.'</li>
				<li>'.$sub_text_d.' '.$text_d.'</li>
				</ul>
				<!-- List -->
				<div class="jx-rebuild-price-footer jx-rebuild-button"><a href="'.$after_dot_price.'" class="price-btn">'.$price_button.'</a></div>
				<!-- Button -->
			<!-- EDF Price Table -->
			';
		
		$out .='</div></div>';
					

		break;
		
		case '3':

		$out .='<div class="jx-rebuild-price-3 '.$dark_light_color.'"><div class="jx-rebuild-price">';
		
		
			$out .='	              
			<!-- BDF Price Table -->
				<div class="title">'.$title.'</div>
				<!-- Title -->
				<div class="price">
				<div class="startfrom">START FROM</div>
				<span class="top">'.$price.'</span>'.$currency_type.'<span></span>
				<div class="permonth">PER MONTH</div>
				</div>
				<!-- Price -->
				<ul class="list">
				<li><strong>'.$sub_text_a.'</strong> '.$text_a.'</li>
				<li><strong>'.$sub_text_b.'</strong> '.$text_b.'</li>
				<li><strong>'.$sub_text_c.'</strong> '.$text_c.'</li>
				<li><strong>'.$sub_text_d.'</strong> '.$text_d.'</li>
				</ul>
				<!-- List -->
				<div class="jx-rebuild-price-footer jx-rebuild-button"><a href="'.$after_dot_price.'" class="price-btn">'.$price_button.'</a></div>
				<!-- Button -->
			<!-- EDF Price Table -->
			';
		
		$out .='</div></div>';
		

		break;
		
		case '4':
		
		$out .='<div class="jx-rebuild-price-4 '.$dark_light_color.'"><div class="jx-rebuild-price">';
		
		
			$out .='             
			<!-- BDF Price Table -->
				<div class="title">'.$title.'</div>
				<!-- Title -->
				<div class="price">
					<span class="top">'.$price.'</span>'.$currency_type.'<span></span>
					<div class="permonth">'.$subtitle.'</div>
				</div>
				<!-- Price -->
				<ul class="list">
				<li><strong>'.$sub_text_a.'</strong> '.$text_a.'</li>
				<li><strong>'.$sub_text_b.'</strong> '.$text_b.'</li>
				<li><strong>'.$sub_text_c.'</strong> '.$text_c.'</li>
				<li><strong>'.$sub_text_d.'</strong> '.$text_d.'</li>
				</ul>
				<!-- List -->
				<div class="jx-rebuild-price-footer jx-rebuild-button"><a href="'.$after_dot_price.'" class="price-btn">'.$price_button.'</a></div>
				<!-- Button -->
			<!-- EDF Price Table -->
			';
		
		$out .='</div></div>';
		
			
		break;
		
		case '5':
		
		
		$out .='<div class="jx-rebuild-price-5 '.$dark_light_color.'"><div class="jx-rebuild-price">';
		
		
			$out .='	          
			<!-- BDF Price Table -->
				<div class="title">'.$title.'</div>
				<!-- Title -->
				<div class="price">
					<span class="top">'.$price.'</span>'.$currency_type.'<span></span>
					<div class="subtitle">'.$subtitle.'</div>
				</div>
				<!-- Price -->
				<ul class="list">
				<li>'.$sub_text_a.' '.$text_a.'</li>
				<li>'.$sub_text_b.' '.$text_b.'</li>
				<li>'.$sub_text_c.' '.$text_c.'</li>
				<li>'.$sub_text_d.' '.$text_d.'</li>
				</ul>
				<!-- List -->
				<div class="jx-rebuild-price-footer jx-rebuild-button"><a href="'.$after_dot_price.'" class="price-btn">'.$price_button.'</a></div>
				<!-- Button -->
			<!-- EDF Price Table -->			';
		
		$out .='</div></div>';
				
		break;
				
		}
		
		//return output
		return $out;
	}
	
	
	
	add_action( 'vc_before_init', 'vc_price_table_single' );
	
	
	function vc_price_table_single() {	
		vc_map(array(
		  "name" => esc_html__( "جدول قیمت تکی", "TEXT_DOMAIN" ),
		  "base" => "price_table_single",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_price.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن جدول قیمت تکی','TEXT_DOMAIN'),
		  "params" => array(
					 
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
					__('سبک E', 'TEXT_DOMAIN') => '5'
					),
			),
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("انتخاب سبک رنگ",'TEXT_DOMAIN'),
				"param_name" => "color_style",
				"value" => array(   
					__('انتخاب سبک رنگ', 'TEXT_DOMAIN') => 'انتخاب سبک رنگ',
					__('روشن', 'TEXT_DOMAIN') => 'light',
					__('تیره', 'TEXT_DOMAIN') => 'dark'
					),
			),		 
					 
	        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
            "param_name" => "title",
			"value" => "پایه",
            "description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
         ),
		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "زیرعنوان", "TEXT_DOMAIN" ),
            "param_name" => "subtitle",
			"value" => "برای مبتدیان",
            "description" => esc_html__( "افزودن زیرعنوان", "TEXT_DOMAIN" )
         ),
		 
	        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "واحد پول رایج", "TEXT_DOMAIN" ),
            "param_name" => "currency_type",
			"value" => "تومان",
            "description" => esc_html__( "افزودن واحد پول رایج", "TEXT_DOMAIN" )
         ),
		 
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "قیمت", "TEXT_DOMAIN" ),

            "param_name" => "price",
			"value" => "15",
            "description" => esc_html__( "افزودن قیمت", "TEXT_DOMAIN" )
         ),
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "لینک دکمه (اختیاری)", "TEXT_DOMAIN" ),
            "param_name" => "after_dot_price",
			"value" => "",
            "description" => esc_html__( "لینکی که کاربر به آن هدایت شود", "TEXT_DOMAIN" )
         ),
		 
		 
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "متن A", "TEXT_DOMAIN" ),
            "param_name" => "text_a",
			"value" => "حافظه",
            "description" => esc_html__( "افزود« متن", "TEXT_DOMAIN" )
         ),
		 
			array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "زیر متن A", "TEXT_DOMAIN" ),
            "param_name" => "sub_text_a",
			"value" => "خارجی",
            "description" => esc_html__( "افزودن متن", "TEXT_DOMAIN" )
         ),
		 
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "متن B", "rebuild" ),
            "param_name" => "text_b",
			"value" => "زیردامنه",
            "description" => esc_html__( "افزودن متن", "TEXT_DOMAIN" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "زیر متن B", "TEXT_DOMAIN" ),
            "param_name" => "sub_text_b",
			"value" => "نامحدود",
            "description" => esc_html__( "افزودن متن", "TEXT_DOMAIN" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "متن C", "TEXT_DOMAIN" ),
            "param_name" => "text_c",
			"value" => "پشتیبانی",
            "description" => esc_html__( "افزودن متن", "TEXT_DOMAIN" )
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "زیر متن c", "rebuild" ),
            "param_name" => "sub_text_c",
			"value" => "مشتریان",
            "description" => esc_html__( "افزودن متن", "TEXT_DOMAIN" )
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "متن D", "TEXT_DOMAIN" ),
            "param_name" => "text_d",
			"value" => "پهنای باند",
            "description" => esc_html__( "افزودن متن", "TEXT_DOMAIN" )
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "زیر متن D", "TEXT_DOMAIN" ),
            "param_name" => "sub_text_d",
			"value" => "نامحدود",
            "description" => esc_html__( "افزودن متن", "TEXT_DOMAIN" )
         ),
		 
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "دکمه قیمت", "TEXT_DOMAIN" ),
            "param_name" => "price_button",
			"value" => "سفارش",
            "description" => esc_html__( "افزودن متن دکمه", "TEXT_DOMAIN" )
         )
					 
		  )
	   ));
    
	}
?>