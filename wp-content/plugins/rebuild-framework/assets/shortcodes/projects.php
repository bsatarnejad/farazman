<?php 
	/* projects  ---------------------------------------------*/
	
	add_shortcode('projects', 'rebuild_projects');
	
	function rebuild_projects($atts, $content = null) { 
		extract(shortcode_atts(array(
				'title' => 'پروژه های تکمیل شده',
				'post_count' => '3'
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//initial variables
		$out=''; 
		$args = array('post_type' => 'portfolio','orderby' => 'date', 'order' => 'ASC','showposts' => $post_count ); 
		
			$out .='
			<div class="jx-rebuild-section-title-4">
				<div class="jx-rebuild-title jx-rebuild-uppercase small-text">'.$title.'</div>
				<div class="jx-rebuild-seperator-hr"></div>
			</div>
			<!-- Section Title -->
			<div class="jx-rebuild-service-completed-prjcts">'; 
	
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();  
			
			//function code
				
				$out .='
					<div class="jx-rebuild-completed-prjcts-item">
					'.get_the_post_thumbnail(get_the_ID(),'rebuild_projects').'
					<div class="jx-rebuild-completed-prjcts-info"><a href="'.get_the_permalink().'">'. get_the_title() .' <i class="fa fa-angle-right"></i></a></div>
					</div>
				';
							
				endwhile;
				
				$out .='</div>';			
			
			wp_reset_query(); 
		
		//return output
		return $out;
	}
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_projects' );
	
	
	function vc_projects() {	
		vc_map(array(
      "name" => esc_html__( "پروژه ها", "TEXT_DOMAIN" ),
      "base" => "projects",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_projects.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('Add Projects','TEXT_DOMAIN'),
      "params" => array(
	  
	  
		 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
            "param_name" => "title",
			"value" => "پروژه های تکمیل شده",
            "description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
         ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "تعداد نوشته ها", "TEXT_DOMAIN" ),
            "param_name" => "post_count",
			"value" => "3",
            "description" => esc_html__( "تنظیم تعداد نوشته ها", "TEXT_DOMAIN" )
         )
		 
		
      )
   )); 
	}
	
	
	
	
	
	
?>