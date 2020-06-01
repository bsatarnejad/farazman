<?php 
	/* Partners Logo  ---------------------------------------------*/
	
	add_shortcode('partners_logo', 'rebuild_partners_logo');
	
	function rebuild_partners_logo($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'post_count' => '6',
					'border' => 'yes'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$images_url = '';
		
			if($type =="1") {
				
			if($border =="yes") {
			$border_class ="border";
			} else{
			$border_class ="no-border";
			}	
					
			$out .='<div class="jx-rebuild-partner-logo '.$border_class.'"><ul>';	
			$args = array('post_type' => 'partners','orderby' => 'date', 'order' => 'DESC','showposts' => $post_count ); 
			$loop = new WP_Query( $args ); 		
			
			while ( $loop->have_posts() ) : $loop->the_post();
		//function code
		
			$partner_logo_link = get_post_meta(get_the_id(),'rebuild_partner_link','rebuild');  
			
			$images = rwmb_meta( 'rebuild_partners_logo', 'type=image_advanced' );
			foreach ( $images as $image ){
				$images_url=$image['full_url'];
			}	
						
			$out .='<li><a href="'.$partner_logo_link.'"><img src="'.esc_url($images_url).'" alt=""><span>'. get_the_title() .'</span></a></li>';
			endwhile;
			wp_reset_query();
			$out .='</ul></div>';	
		
		} elseif ($type =="2") {
					
			$out .='<div class="jx-rebuild-partner-logo-list"><ul>';	
			$args = array('post_type' => 'partners','orderby' => 'date', 'order' => 'DESC','showposts' => $post_count ); 
			$loop = new WP_Query( $args ); 		
			
			while ( $loop->have_posts() ) : $loop->the_post();
		//function code
		
			$partner_logo_link = get_post_meta(get_the_id(),'rebuild_partner_link','rebuild');  
			
			$images = rwmb_meta( 'rebuild_partners_logo', 'type=image_advanced' );
			foreach ( $images as $image ){
				$images_url=$image['full_url'];
			}	
			
			$partner_logo_web_link = get_post_meta( get_the_ID(), 'rebuild_partner_link', true );  						
			$out .='<li>			
					<div class="jx-rebuild-partner-logo-list-item">
					
						<div class="logo-position">
							<div class="image"><a href="'.$partner_logo_link.'"><img src="'.esc_url($images_url).'" alt=""></a></div>
						</div>
						
						<div class="content-position">
							<div class="jx-rebuild-title"><span>'. get_the_title() .'</span></div>
							<div class="web_link"><a href="'.$partner_logo_web_link.'" target="_blank">'.$partner_logo_web_link.'</a></div>
							<div class="description">'.get_the_content().'</div>
						</div>
					
					</div>
					<div class="clear"></div>			
				</li>';
			endwhile;
			wp_reset_query();
			$out .='</ul></div>';
		
		}
					
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_partners_logo' );
	
	
	function vc_partners_logo() {	
		vc_map(array(
      "name" => esc_html__( "لوگوی شرکا", "TEXT_DOMAIN" ),
      "base" => "partners_logo",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_partner_logo.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن لوگوی شرکا','TEXT_DOMAIN'),
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
					),
		
		),
				 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "تعداد نوشته ها", "TEXT_DOMAIN" ),
            "param_name" => "post_count",
			"value" => "6",
            "description" => esc_html__( "تنظیم تعداد نوشته ها", "TEXT_DOMAIN" )
         ),
		 
		 array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("تنظیم حاشیه",'TEXT_DOMAIN'),
				 "param_name" => "border",
				 "value" => array(   
						__('بلی/خیر', 'TEXT_DOMAIN') => '',
						__('بلی', 'TEXT_DOMAIN') => 'yes',
						__('خیر', 'TEXT_DOMAIN') => 'no'
						),
				),
		
      )
   )); 
	}
?>