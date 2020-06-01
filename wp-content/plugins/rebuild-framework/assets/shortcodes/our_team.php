<?php 
	/* Teammember  ---------------------------------------------*/
	
	add_shortcode('teammember', 'rebuild_teammember');
	
	function rebuild_teammember($atts, $content = null) { 
		extract(shortcode_atts(array(
					'type' => '',
					'post_count' => ''
				), $atts)); 
		 
		
		//initial variables
		$out='';
		$teamsocial_code='';
			
		//function code
			$out .='<div class="container">';
			
			$args = array('post_type' => 'team','orderby' => 'date', 'order' => 'ASC','showposts' => $post_count ); 
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post(); 
			
			$teammember_jobposition = get_post_meta(get_the_id(),'rebuild_teammember_jobposition_name','rebuild');
			$teammember_facebook = get_post_meta(get_the_id(),'rebuild_teammember_fb','rebuild');
			$teammember_twitter = get_post_meta(get_the_id(),'rebuild_teammember_twitter','rebuild');
			$teammember_google_plus = get_post_meta(get_the_id(),'rebuild_teammember_linkedin','rebuild'); 
			
			if($teammember_facebook):
			$teamsocial_code ='<li><a href="'.$teammember_facebook.'"><i class="fa fa-facebook"></i></a></li>';
			endif;
			
			if($teammember_twitter):
			$teamsocial_code .='<li><a href="'.$teammember_twitter.'"><i class="fa fa-twitter"></i></a></li>';
			endif;
			
			if($teammember_google_plus):
			$teamsocial_code .='<li><a href="'.$teammember_google_plus.'"><i class="fa fa-google-plus"></i></a></li>';
			endif;
		switch($type){ 
		
			case '1': 
			
			$out .='	
                <div class="jx-rebuild-team-member-1">
                    <div class="four columns">    
						<div class="image"><a href="#">'.get_the_post_thumbnail(get_the_ID(),'team').'</a>
                        <!-- Image -->
                            <div class="team-content-box">
                                <div class="plus-icon">+</div>
                                <!-- Icon -->
                                <div class="content-position">
									<div class="name">'. get_the_title() .'</div>
									<div class="post">'.$teammember_jobposition.'</div>
                                </div>
                                <!-- Name -->
                                <div class="jx-rebuild-team-description">
								<p>'.get_the_content().'</p>
                                </div>
                                <div class="team-social">
                                    <ul>
										'.$teamsocial_code.'	
                                    </ul>
                                </div>
                                <!-- Social Icons -->
                            </div>
                        
                        </div>
                        <!-- info -->     
                    </div>          
                </div>
                <!-- Teammember 01 --> 	
					';
			
			break;
			case '2': 
			
			$out .='
			<div class="jx-rebuild-team-member-6 jx-rebuild-white-team-bg">	
			<div class="eight columns">                    
				<div class="team-member-item">                        
					<div class="background">
							<div class="plus-hover">
								<div class="team-image-overlay"></div>
								<div class="image"><a href="#">'.get_the_post_thumbnail(get_the_ID(),'team').'</a></div>
								<div class="team-hover-icon"><i class="team-plus-icons"></i>
							</div>
							</div>
							<!-- Image -->
							<div class="team-content-box">
								<div class="name">'. get_the_title() .'</div>
								<div class="post">'.$teammember_jobposition.'</div>								
								<div class="description">'.get_the_content().'</div>
								<!-- Description -->
								
								<div class="team-social">
									<ul>
										'.$teamsocial_code.'	
                                    </ul>
								</div>
								<!-- info -->
							</div>
					</div>                        
				</div>                        
			</div>
            <!-- Teammember 01 --> 	
			</div>
					';
			
			break;
			case '3': 
			
			$out .='	
				<div class="jx-rebuild-team-member-4">
				<div class="four columns">                    
				<div class="team-member-item">                        
					<div class="background">
							<div class="plus-hover">
								<div class="team-image-overlay"></div>
								<div class="image"><a href="#">'.get_the_post_thumbnail(get_the_ID(),'team').'</a></div>
								<div class="team-hover-icon"><i class="fa fa-plus"></i>
				</div>
							</div>
							<!-- Image -->
							<div class="team-content-box">
								<div class="name">'. get_the_title() .'</div>
								<div class="post">'.$teammember_jobposition.'</div>
								
								<div class="team-social">
									<ul>
										'.$teamsocial_code.'	
                                    </ul>
								</div>
								<!-- info -->
							</div>
					</div>                        
				</div>                        
				</div>
					<!-- Teammember 01 --> 	
				</div>
					';
			
			break;
			}
			endwhile;
			wp_reset_query();
			$out .='</div>';
		
		//return output
		return $out;
	}
	
	//Visual Composer	
	
	add_action( 'vc_before_init', 'vc_teammember' );
	
	
	function vc_teammember() {	
		vc_map(array(
      "name" => esc_html__( "اعضای تیم", "TEXT_DOMAIN" ),
      "base" => "teammember",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_teammember.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('افزودن اعضای تیم','TEXT_DOMAIN'),
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
					),
		),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "شمارش نوشته ها", "TEXT_DOMAIN" ),
            "param_name" => "post_count",
			"value" => "4",
            "description" => esc_html__( "تنظیم شمارش نوشته ها", "TEXT_DOMAIN" )
         )	 
		
      )
   )); 
	}
?>