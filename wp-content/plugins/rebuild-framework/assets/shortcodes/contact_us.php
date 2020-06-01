<?php 
	/* Contact Us  ---------------------------------------------*/
	add_shortcode('contact_us', 'rebuild_contact_us');
	
	function rebuild_contact_us($atts, $content = null) { 
		extract(shortcode_atts(array(
		
		'email' => ''
		
		), $atts)); 
		
		$headers='';
		$status='';
		$status_class='';
		$id = rand(0,100);
		 				
		//If the form is submitted
		if(isset($_POST['submit-contact'])) {
			
			//Subject field is not required
			$subject = trim($_POST['subject']);
			
			$name    = sanitize_text_field( $_POST["contact_name"] );
			$email   = sanitize_email( $_POST["email"] );
			$subject = sanitize_text_field( $_POST["subject"] );
			$message = esc_textarea( $_POST["msg"] );			
		
			//If there is no error, send the email
			$emailTo = get_option( 'admin_email' ); //Put your own email address here 
			$body = __('نام :', 'expobiz')." $name \n\n"; 
			$body .= __('پست الکترونیکی :', 'expobiz')." $email \n\n"; 
			$body .= __('موضوع :', 'expobiz')." $subject \n\n"; 
			$body .= __('پیام :', 'expobiz')."\n $message"; 
			$headers= 'پاسخ به : ' . $name . ' <' . $email . '>' . "\r\n"; 
			
			if ( wp_mail($emailTo, $subject, $body, $headers) ) {
				$status= 'ممنون از تماس شما. به زودی منتظر پاسخ باشید.';
				$status_class="jx-rebuild-success";
			} else {
				$status = 'خطایی غیرمنتظره رخ داده است.';
				$status_class="jx-rebuild-error";
			}
		
		}
		
		$out ='
					<div class="jx-rebuild-contact-form">
                        
                        <form action="contactForm" id="contactForm" method="post">
                            <div class="row-1">
                                <div class="contact-full-name">
                                    <input type="text" id="full-name-contact" name="full_name" placeholder="'.esc_html__('نام کامل','rebuild').'" class="jx-rebuild-form-text" data-validation="required" />
                                    <!-- First Name Textbox -->
                                </div>
                                <div class="contact-email">
                                    <input type="text" id="email-contact" name="email" placeholder="'.esc_html__('آدرس پست الکترونیکی','rebuild').'" class="jx-rebuild-form-text" data-validation="required" validation="email"/>
                                    <!-- Email Name Textbox -->
                                </div>
                            </div>
                            
                            <div class="row-1">
                                <div class="contact-subject">
                                    <input type="text" id="subject-contact" name="subject" placeholder="'.esc_html__('موضوع','rebuild').'" class="jx-rebuild-form-text" data-validation="required" />
                                    <!-- Subject Textbox -->
                                </div>
                            </div>
                            
                            <div class="row-1">
                                <div class="contact-message">
                                    <textarea id="message-contact" name="message" class="jx-rebuild-form-textarea" rows="5" cols="30" placeholder="'.esc_html__('پیام خود را در این قسمت وارد کنید...','rebuild').'" data-validation="required"></textarea>
                                    <!-- Message Box -->
                                </div>  
                                <div class="contact-submit">
                                    
                                    <button type="submit"><i class="vc_li vc_li-paperplane"></i> '.esc_html__('ارسال','rebuild').'</button>
                                    <!-- Submit Button -->
                                </div>
                            </div> 
                        </form>
                        
                        </div>
		'; 
			
		
		//return output
		return $out;
	}
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_contact_us' );
	
	
	function vc_contact_us() {	
		vc_map(array(
      "name" => esc_html__( "ارتباط با ما", "rebuild" ),
      "base" => "contact_us",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_contact.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "rebuild"),
	  "description" => __('افزودن ارتباط با ما','rebuild'),
      "params" => array(
	 
		
      )
   )); 
	}
	
	
	
?>