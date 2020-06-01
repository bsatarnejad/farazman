<?php 
	/* Media Box  ---------------------------------------------*/
	
	add_shortcode('blog', 'rebuild_blog');
	
	function rebuild_blog($atts, $content = null) { 
		extract(shortcode_atts(array(
					'post_count' => ''
					
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$image_size ='rebuild_small-blog';
		global $wp_embed;
		global $data;
		
		$out .='<div class="jx-rebuild-blog-2"><div class="container">'; 		
		$args = array('post_type' => 'post','orderby' => 'date', 'order' => 'نزولی','showposts' => 3 ); 
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();  
		
			$cats = get_the_category(); 
		    $cat_name = $cats[0]->name; 	
		//function code
		
		switch(get_post_format()) {
		case 'link':
			$format_post_class = 'link';
			break;
		case 'image':
			$format_post_class = 'photo';
			break;
		case 'quote':
			$format_post_class = 'quote-left';
			break;
		case 'video':
			$format_post_class = 'video-camera';
			break;
		case 'audio':
			$format_post_class = 'volume-up';
			break;
		case 'Aside':
			$format_post_class = 'comments';
			break;
		default:
			$format_post_class = 'file-text-o';
			break;
	}
		
			
			$out .='
			<div class="one-third columns">
				<div class="blog-item">';
				
				 $out .='
				 <div class="jx-rebuild-blog-image flexslider small-blog">
                    <ul class="slides"> ';
						   if(get_post_meta( get_the_ID(), 'rebuild_video_code', true )):							
							$out .='<li>
                                    <div class="image jx-rebuild-image-wrapper">
                                    <div class="full-video">
                                        <div class="full-widthvideo">
                                        '.$wp_embed->run_shortcode('[embed width="380"]'.esc_url(get_post_meta(get_the_ID(), 'rebuild_video_code', true)).'[/embed]').'
                                        </div><!-- EOF full-widthvideo-->
                                    </div><!-- EOF full-video-->
                                    </div>
                                </li>';
						   endif;                                
                           if(has_post_thumbnail()):
							  $post_image_id = get_post_thumbnail_id(get_the_id());
							  $image_url = wp_get_attachment_image_src($post_image_id, 'large');
							  $image_small = wp_get_attachment_image_src($post_image_id, $image_size);
							  $image_data = wp_get_attachment_metadata($post_image_id);
                           $out .='<li>
                                    <div class="image jx-rebuild-image-wrapper">
                                    '.get_the_post_thumbnail(get_the_id(),$image_size).'
									</div>
                                </li>';
                           endif;                           
                           if(kd_mfi_get_featured_image_id('featured-image-2', 'post')):
						                        
                                $i = 2;
                                while($i <= $data['text_slideshow_count'] ):
                                $attachment_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                                $out .='<li><div class="image jx-rebuild-image-wrapper">';
									if($attachment_id):
										$image_url = wp_get_attachment_image_src($attachment_id, 'large');
										$image_small = wp_get_attachment_image_src($attachment_id, $image_size);
										$image_data = wp_get_attachment_metadata($attachment_id);
										
										$out .='
										<img src="'.$image_small[0].'" alt="'.$image_data['image_meta']['title'].'" />	
										</div></li>';
									endif; $i++;
                            	endwhile;
							endif; // End of slideshow 
                                                  
             $out .='</ul><!-- end #slider -->
					 <div class="blog-format">						
						<div class="blog-icon"><i class="fa fa-'.$format_post_class.'"></i></div>
					 </div>
					 
					 <div class="date-position">						
						<div class="date">'.get_the_time('j').'</div>
						<div class="date_month">'.get_the_time('M').'</div>
					 </div>
                 </div><!-- end of Flexslider -->
				 ';
					$out .='<div class="hr-line"></div>
					<div class="title"><a href="'.esc_url(get_permalink()).'">'. get_the_title() .'</a></div>
					<div class="content-box">
						<div class="description">' .rebuild_excerpt('20'). '</div>
						<div class="readmore"><a href="'.esc_url(get_permalink()).'"><i class="fa fa-genderless"></i><i class="fa fa-genderless"></i><i class="fa fa-genderless"></i></a></div>
					</div>
				</div>
			</div>
			<!-- Blog # 1 -->
			';
			endwhile;
			
			//wp_reset_query(); 
		$out .='</div>
		<div class="row"></div>
		<div class="row"></div>		
		<div class="jx-rebuild-btn jx-rebuild-colored jx-rebuild-btn-center"> 
					<a href="/blog" class="jx-rebuild-btn-default jx-rebuild-border jx-rebuild-medium-bt">
						<span>	
							<i class="btn-icon-left fa  fa-mail-forward"></i>
							<span>'.esc_html__('ادامه مطلب','rebuild').'</span>
							<i class="btn-icon-right fa fa-mail-forward"></i>
						</span>
					</a>
				</div>
		
		</div>
		<!-- Blog Button -->
		'; 		
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_blog' );
	
	
	function vc_blog() {	
		vc_map(array(
      "name" => esc_html__( "بلاگ", "TEXT_DOMAIN" ),
      "base" => "blog",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_news.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن بلاگ','TEXT_DOMAIN'),
      "params" => array(
		 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "شمارش نوشته", "TEXT_DOMAIN" ),
            "param_name" => "post_count",
			"value" => "3",
            "description" => esc_html__( "تنظیم تعداد نوشته ها", "TEXT_DOMAIN" )
         )
		 
		
      )
   )); 
	}
?>