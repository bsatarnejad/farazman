<?php 
	/* Portfolio Group  ---------------------------------------------*/
	
	add_shortcode('portfolio', 'rebuild_portfolio');
	
	function rebuild_portfolio($atts, $content = null) { 
		extract(shortcode_atts(array(
				'filter' =>'',
				'type' =>'1',
				'post_cols' =>'3',
				'post_count' =>'13',
				'category' =>''
				), $atts)); 
		 
		 
		//initial variables
		global $post;
		
		$out='';
		$id_filter=''; 
		$portfolio_type='';
		
		if ($type=='1'):
			$portfolio_type='portfolio_style_a';
		elseif($type=='2'):
			$portfolio_type='portfolio_style_b';
		elseif($type=='3'):
			$portfolio_type='portfolio_style_c';
		endif;
		
		$out .='<div class="jx-rebuild-protfolio '.$portfolio_type.'">'; 
		
		
		if ($filter=='true'): 
			$out .= '<div class="jx-rebuild-portfolio-filter category-menu"><ul>'; 
							 
			$terms = get_terms('portfolio-categories'); 
			$count = count($terms); 
			$out .='<li><a class="'.$id_filter.' filter active" data-filter="*" href="javascript:void(o)">'.esc_html__('همه','rebuild').'</a></li>'; 
			if ( $count > 0 ){ 
				foreach ( $terms as $term ) { 
					$termname = strtolower($term->name); 
					$termname = str_replace(' ', '-', $termname); 
					$out .='<li><a class="'.$id_filter.' filter" data-filter=".'.$termname.'" href="javascript:void(o)">'.$term->name.'</a></li>'; 
				} 
			} 
							 
			$out .='</ul></div>';		 
			 
		endif; 		
		
		//function code
		
		$out .='<div class="jx-rebuild-portfolio-grid">';
			$i=0;
			
			if ($category):
			
			
			$args = array(	'post_type' => 'portfolio',
							'orderby' => 'date', 
							'order' => 'ASC',
							'showposts' => $post_count,
							'portfolio-categories' => $category
							);			
			else:
			
			$args = array(	'post_type' => 'portfolio',
							'orderby' => 'date', 
							'order' => 'ASC',
							'showposts' => $post_count ); 
			
			endif;
			
			
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();  
			
				//Get Portfolio Categories			
				
				$terms_string = '';
				$terms = get_the_terms(get_the_ID(), 'portfolio-categories'); 				 
				  
 				//build up comma delimited string 
				if ($terms):
					foreach($terms as $t){ 
						$terms_string .= $t->slug . ' '; 
					} 
				endif;
				
				$post_thumbnail_id = get_post_thumbnail_id();
				$post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id,'large', true);
				
				if(get_post_meta(get_the_ID(),'rebuild_project_photos',false )):
					
					$image_url 	= 	wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');					
					$image_path	=	get_post_meta(get_the_ID(),'rebuild_project_photos',false );					
					$images 	= 	rwmb_meta( 'rebuild_project_photos', 'type=image_advanced' );
					
					foreach ( $images as $image ){
						$images_url=$image['full_url'];
					}	
				endif;
				
				if ($post_cols=='3'):
					$image_cols="grid-item-width3";				
				elseif ($post_cols=='4'):
					$image_cols="grid-item-width4";
				else:
					$image_cols="grid-item-width2";
				endif;
				
				if ($type=='1'):
							
					if($i < 5):
						$set_img_class='grid-item-width2 grid-item-height2';
						$imagesize='rebuild_port-1';
					else:
						$set_img_class='';
						$imagesize='rebuild_port-2';
					endif;
				
				elseif ($type=='2' || $type=='3'):
					$set_img_class=''.$image_cols.' grid-item-height2';
					$imagesize='rebuild_port-1';
				endif;
				
				
				$out .='
					<div class="grid-item '.$set_img_class.' jx-rebuild-image-wrapper '.$terms_string.' all">
						'. get_the_post_thumbnail(get_the_ID(),$imagesize) .'
						<div class="jx-rebuild-portfolio-hoverlayer"></div>
						
							<div class="jx-rebuild-portfolio-hover">
							   
								<div class="jx-rebuild-portfolio-top-hover">
								   <div class="jx-rebuild-title jx-rebuild-uppercase">'.get_the_title().'</div>                                                
								</div>
								<!-- Top Hover Title -->                                            
								
								<div class="jx-rebuild-portfolio-plus-hover">
									<a href="'.get_the_permalink().'"><div class="jx-rebuild-portfolio-link"><i class="fa fa-link"></i></div></a>
								</div>
								<!-- Bottom Hover -->
								
							</div>
						
						<!-- EOF Hover -->
				  </div>';
			$i++;
			endwhile;
			wp_reset_query(); 
		//return output
		
		$out .='</div></div>';
		
		return $out;
	}
	
	
		//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_portfolio' );
	
	
	function vc_portfolio() {	
		vc_map(array(
      "name" => esc_html__( "پروژه ها", "TEXT_DOMAIN" ),
      "base" => "portfolio",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_protfolio.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن پروژه','TEXT_DOMAIN'),
      "params" => array(
	  
	  
	  
	  	array(
		 "type" => "dropdown",
		 "class" => "",
		 "heading" => __("سبک نمایش پروژه",'TEXT_DOMAIN'),
		 "param_name" => "type",
		 "value" => array(   
				__('انتخاب سبک نمایش پروژه', 'TEXT_DOMAIN') => 'انتخاب فیلتر',
				__('شبکه ای میکس', 'TEXT_DOMAIN') => '1',
				__('شبکه ای بزرگ', 'TEXT_DOMAIN') => '2',
				__('کلاسیک', 'TEXT_DOMAIN') => '3',
				),
		),
		array(
		 "type" => "dropdown",
		 "class" => "",
		 "heading" => __("انتخاب فیلتر",'rebuild'),
		 "param_name" => "filter",
		 "value" => array(   
				__('نمایش فیلتر پروژه ها', 'TEXT_DOMAIN') => 'انتخاب فیلتر',
				__('بلی', 'TEXT_DOMAIN') => 'true',
				__('خیر', 'TEXT_DOMAIN') => 'false',
				),
		),
		 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "تعداد نوشته ها", "TEXT_DOMAIN" ),
            "param_name" => "post_count",
			"value" => "13",
            "description" => esc_html__( "تنظیم تعداد نوشته ها", "TEXT_DOMAIN" )
         ),
		 
		  array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "ستون های نوشته", "TEXT_DOMAIN" ),
            "param_name" => "post_cols",
			"value" => "3",
            "description" => esc_html__( "تنظیم تعداد ستون", "TEXT_DOMAIN" )
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "دسته بندی", "TEXT_DOMAIN" ),
            "param_name" => "category",
			"value" => "",
            "description" => esc_html__( "دسته بندی نوشته را وارد کنید.", "TEXT_DOMAIN" )
         )		 
		
      )
   )); 
	}
	
	
	
?>