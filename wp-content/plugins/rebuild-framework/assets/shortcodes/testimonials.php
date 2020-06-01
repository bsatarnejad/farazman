<?php 
	/* Testimonials  ---------------------------------------------*/
	
	add_shortcode('testimonials', 'rebuild_testimonials');
	
	function rebuild_testimonials($atts, $content = null) { 
		extract(shortcode_atts(array(
				'type' => '',
				'style' => '',
				'size' => '',
				'post_count' => '',
				'border' => 'no'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$text_size='';
		$text_style='';
		$border_css='';
				
		if ($style=='light'):
		$text_style='jx-light';
		elseif($style=='dark'):
		$text_style='jx-dark';
		endif;
		
		if ($border=='yes'):
		$border_css='jx-rebuild-border-light';
		else:
		$border_css='';
		endif;
		
		//initial variables
		$out=''; 
		$args = array('post_type' => 'testimonials','orderby' => 'date', 'order' => 'ASC','showposts' => $post_count ); 
		switch($type){ 
		case '1':
		
			$out .='<div class="jx-rebuild-testimonial-slider jx-rebuild-flexslider"><ul class="slides">'; 
	
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();  
			
			//function code
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'rebuild_testimonial_business_name', true ); 	
				
				$out .='
					<li>
						<div class="jx-rebuild-tetimonials-1">                    	
							<div class="description">'.get_the_content().'</div>
							
							<div class="jx-rebuild-testimonial-details">
								<div class="jx-rebuild-testimonial-image">'.get_the_post_thumbnail(get_the_ID(),'rebuild_testimonial').'</div>
								<div class="name">'. get_the_title() .'</div>
								<div class="position">'.$testimonial_jobposition.'</div>
							</div>                        
						</div>
						<!-- EOF Testimonial #3-->
					</li>	
				';
							
				endwhile;
				
				$out .='</ul></div>';
			
			
			break;
			
			case '2':
	
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();  
			
			//function code
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'rebuild_testimonial_business_name', true ); 	
				
				$out .='
					<div class="jx-rebuild-tetimonials-column">
					<div class="jx-rebuild-tetimonials-1">                    	
						<div class="description">'.get_the_content().'</div>
						
						<div class="jx-rebuild-testimonial-details">
							<div class="jx-rebuild-testimonial-image">'.get_the_post_thumbnail(get_the_ID(),'rebuild_testimonial').'</div>
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>                        
					</div>
					<!-- EOF Testimonial #3-->
					</div>
				';
							
				endwhile;
			
			break;
			
			
			case '3':
 
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();
			//function code
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'rebuild_testimonial_business_name', true ); 	
				
				$out .='
					<div class="jx-rebuild-tetimonials-2 '.$text_style.' '.$border_css.'">                   	
						
						<div class="description"><i class="fa fa-quote-left"></i>'.get_the_content().'</div>
						
						<div class="jx-rebuild-testimonial-details">
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>                        
					</div>
					<!-- EOF Testimonial #2-->
				';
			endwhile;
			break;
			
			case '4':
 
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();
			//function code
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'rebuild_testimonial_business_name', true ); 	
				
				$out .='
					<div class="jx-rebuild-tetimonials-2 jx-rebuild-x2 '.$text_style.' '.$border_css.'">                   	
						
						<div class="description"><i class="fa fa-quote-left"></i>'.get_the_content().'</div>
						
						<div class="jx-rebuild-testimonial-details">
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>                        
					</div>
					<!-- EOF Testimonial #2-->
				';
			endwhile;
			break;
			
			
			case '5':
 
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();
			//function code
				
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'rebuild_testimonial_business_name', true ); 	
				
				$out .='
					<div class="jx-rebuild-tetimonials-3-column">
					<div class="jx-rebuild-tetimonials-3">                    	
						<div class="description">'.get_the_content().'</div>
						
						<div class="jx-rebuild-testimonial-details">
							<div class="jx-rebuild-testimonial-image">'.get_the_post_thumbnail(get_the_ID(),'rebuild_testimonial').'</div>
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>                        
					</div>
					<!-- EOF Testimonial #3-->
					</div>
				';
			endwhile;
			break;
			
			
			case '6':
 
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();
			//function code
				
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'rebuild_testimonial_business_name', true ); 	
				
				$out .='
					<div class="jx-rebuild-tetimonials-3-column">
					<div class="jx-rebuild-tetimonials-4 '.$text_style.'">                    	
						<div class="description">'.get_the_content().'</div>
						
						<div class="jx-rebuild-testimonial-details">
							<div class="jx-rebuild-testimonial-image">'.get_the_post_thumbnail(get_the_ID(),'rebuild_testimonial').'</div>
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>                        
					</div>
					<!-- EOF Testimonial #3-->
					</div>
				';
			endwhile;
			break;
			
			
			case '7':
 
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();
			//function code
				
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'rebuild_testimonial_business_name', true ); 	
				
				$out .='
					<div class="jx-rebuild-tetimonials-3-column">
					<div class="jx-rebuild-tetimonials-5">                    	
						<div class="description">'.get_the_content().'</div>
						
						<div class="jx-rebuild-testimonial-details">
							<div class="jx-rebuild-testimonial-image">'.get_the_post_thumbnail(get_the_ID(),'rebuild_testimonial').'</div>
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>                        
					</div>
					<!-- EOF Testimonial #3-->
					</div>
				';
			endwhile;
			break;
			
			
			case '8':
 
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();
			//function code
				
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'rebuild_testimonial_business_name', true ); 	
				
				$out .='
					<div class="jx-rebuild-tetimonials-3-column">
					<div class="jx-rebuild-tetimonials-6 '.$text_style.'">                    	
						<div class="description">'.get_the_content().'</div>
						
						<div class="jx-rebuild-testimonial-details">
							<div class="jx-rebuild-testimonial-image">'.get_the_post_thumbnail(get_the_ID(),'rebuild_testimonial').'</div>
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>                        
					</div>
					<!-- EOF Testimonial #3-->
					</div>
				';
			endwhile;
			break;
			
			}
			
			
			
			wp_reset_query(); 
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_testimonials' );
	
	
	function vc_testimonials() {	
		vc_map(array(
      "name" => esc_html__( "نظرات مشتریان", "TEXT_DOMAIN" ),
      "base" => "testimonials",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_testimonials.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن نظرات مشتریان','TEXT_DOMAIN'),
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
					__('سبک E', 'TEXT_DOMAIN') => '5',
					__('سبک F', 'TEXT_DOMAIN') => '6',
					__('سبک G', 'TEXT_DOMAIN') => '7',
					__('سبک H', 'TEXT_DOMAIN') => '8',
					),
		),
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب سبک رنگ",'TEXT_DOMAIN'),
			 "param_name" => "style",
			 "value" => array(   
					__('تیره/روشن', 'TEXT_DOMAIN') => 'انتخاب تیره/روشن',
					__('روشن', 'TEXT_DOMAIN') => 'light',
					__('تیره', 'TEXT_DOMAIN') => 'dark'
					),
		),
		
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب حاشیه",'TEXT_DOMAIN'),
			 "param_name" => "border",
			 "value" => array(   
					__('انتخاب حاشیه', 'TEXT_DOMAIN') => 'انتخاب حاشیه',
					__('بلی', 'TEXT_DOMAIN') => 'yes',
					__('خیر', 'TEXT_DOMAIN') => 'no'
					),
		),
						 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "تعداد نوشته ها", "TEXT_DOMAIN" ),
            "param_name" => "post_count",
			"value" => "4",
            "description" => esc_html__( "تنظیم تعداد نوشته ها", "TEXT_DOMAIN" )
         )
		 
		
      )
   )); 
	}
	
	
	
	
	
	
?>