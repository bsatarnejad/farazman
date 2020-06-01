<?php 
	/* Partners Logo  ---------------------------------------------*/
	
	add_shortcode('project_progress', 'rebuild_project_progress');
	
	function rebuild_project_progress($atts, $content = null) { 
		extract(shortcode_atts(array(
					'post_count' => '',
					'category' => ''
					), $atts)); 
		 
		
		//initial variables
		$out=''; 
		 
		
		global $wp_embed;
		global $data;
		
		$project_progress_client= ''; 
		$project_progress_area= ''; 
		$project_progress_year= '';
		$project_progress_location= '';
		$project_progress_stat= ''; 
		
		if ($category):
			
			
			$args = array(	'post_type' => 'portfolio',
							'orderby' => 'date', 
							'order' => 'ASC',
							'showposts' => 1
							//'portfolio-categories' => $category
							);			
			else:
			
			$args = array(	'post_type' => 'portfolio',
							'orderby' => 'date', 
							'order' => 'ASC',
							'showposts' => 1); 
			
			endif;
		$loop = new WP_Query( $args ); 
		
		
		$out .='<div class="jx-rebuild-project-progress"><div class="container">';	
		
		while ( $loop->have_posts() ) : $loop->the_post();  
			$project_progress_client= get_post_meta( get_the_ID(), 'rebuild_project_client', true ); 
			$project_progress_area= get_post_meta( get_the_ID(), 'rebuild_project_area', true ); 
			$project_progress_year= get_post_meta( get_the_ID(), 'rebuild_project_year', true );
			$project_progress_location= get_post_meta( get_the_ID(), 'rebuild_project_location', true );
			$project_progress_stat= get_post_meta( get_the_ID(), 'rebuild_project_stat', true ); 
			if(get_the_category()):
			$cats = get_the_category(); 
		    $cat_name = $cats[0]->name; 	
			endif;
		//function code
		$out .='
			<div class="eight columns">                
					
			<div class="jx-rebuild-project-view-image">
			<div class="image">'. get_the_post_thumbnail(get_the_ID(),'rebuild_project-stat') .'</div>
				<!-- Image -->
				<div class="image-hover"></div>
				   
				<div class="jx-rebuild-percentage">
					<div  class="jx-rebuild-count-up count-number">'.$project_progress_stat.'</div><span>%</span>
					<div class="progress">'.esc_html__('انجام شده','rebuild').'</div>
				</div>
				<!--  Image hover Progress -->
			</div>
			<!-- Project Hover Image -->
				
			</div>
			
			<div class="eight columns">                
				<div class="item">
					
					<div class="jx-rebuild-project-view-contents">
					
						<div class="title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>
						<!-- Title -->
						<div class="skillbar">
							<div class="percent-bg" style="width:60%;"></div>
						</div>
							
						<!-- Skillbar -->
						
						<div class="description">'.get_the_content().'</div>
		
						<ul class="jx-rebuild-bg-alternate">
							<li><strong>'.esc_html__('پیمانکار','rebuild').'  :</strong> '.$project_progress_client.'</li>
							<li><strong>'.esc_html__('مساحت','rebuild').'  :</strong> '.$project_progress_area.'</li>
							<li><strong>'.esc_html__('محل','rebuild').' :</strong> '.$project_progress_location.'</li>
							<li><strong>'.esc_html__('وضعیت تکمیل','rebuild').' :</strong> '.$project_progress_year.'</li>
						</ul>
						<!-- Details -->                               
					</div>
					<!-- Right Position -->
				 
				</div>                    
				<!--Item -->
			</div>
			
			<!-- Project in Progress View -->                    
			
			<div class="row"></div>
			<div class="row"></div>
		';
			endwhile;
			
			
			
		   	 $the_query = new WP_Query(array( 
				'post_type' => 'portfolio',
				//'portfolio-categories' => $category,
				'showposts' => 3
				)); 
			   while ( $the_query->have_posts() ) : 
			   $the_query->the_post(); 
			   
			   
			   $out .='
				<div class="one-third columns">
				
					<div class="item">
					
						<div class="jx-rebuild-project-image">
						
							<div class="image">'. get_the_post_thumbnail(get_the_ID(),'rebuild_project-statthumb') .'</div>
							<!-- Image -->
							<div class="image-hover"></div>
							   
							<div class="jx-rebuild-percentage">
								<div  class="jx-rebuild-count-up count-number">'.$project_progress_stat.'</div><span>%</span>
								<div class="progress">'.esc_html__(' تکمیل ','rebuild').'</div>
							</div>
							<!--  Image hover Progress -->
						</div>
						<!-- Project Hover Image -->
						
						<div class="jx-rebuild-project-contents">
						
							<div class="title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>
							<!-- Title -->
							<div class="skillbar">
								<div class="percent-bg" style="width:60%;"></div>
							</div>
								
							<!-- Skillbar -->
			
							<ul>
							<li><strong>'.esc_html__('پیمانکار','rebuild').' :</strong> '.$project_progress_client.'</li>
							<li><strong>'.esc_html__('مساحت','rebuild').' :</strong> '.$project_progress_area.'</li>
							<li><strong>'.esc_html__('سال تکمیل','rebuild').' :</strong> '.$project_progress_year.'</li>
							</ul>
							<!-- Details -->                               
						</div>
						<!-- Right Position -->
					 
					</div>                    
					<!--Item -->
				
				</div>
				
				<!-- Item #1 -->'; 
			   
			   
			   endwhile; 
			   wp_reset_postdata(); 
			   
			
			$out .='</div></div>';
			//wp_reset_query(); 
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_project_progress' );
	
	
	function vc_project_progress() {	
		vc_map(array(
      "name" => esc_html__( "روند پروژه", "TEXT_DOMAIN" ),
      "base" => "project_progress",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_progress.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن نظرات مشتریان','TEXT_DOMAIN'),
      "params" => array(
	  
	  
		 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "دسته بندی", "TEXT_DOMAIN" ),
            "param_name" => "category",
			"value" => "business,news,cars,sports", //Default Counter Up Text
            "description" => esc_html__( "افزودن نام دسته بندی", "TEXT_DOMAIN" )
         )
		 
		
      )
   )); 
	}
	
	
	
?>