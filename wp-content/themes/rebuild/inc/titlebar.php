<?php 
	$rebuild_data =  rebuild_globals();
	$title_bg='';
	$bg_image_class='';
	$header_5_titlebar_class='';
	
	if (get_post_meta(get_the_ID(),'rebuild_titlebar_bg_color', true)!=''):
		$title_bg='background-color:'.get_post_meta(get_the_ID(),'rebuild_titlebar_bg_color', true).';';
	else:
		$title_bg='';
	endif;
	
	if (rwmb_meta( 'rebuild_bg_image', 'type=image_advanced' )):
	$images = rwmb_meta( 'rebuild_bg_image', 'type=image_advanced' );
					
	foreach ( $images as $image ){
		$images_url=$image['full_url'];
		if($images_url):
			$bg_pos=get_post_meta(get_the_ID(),'rebuild_titlebar_bg_pos', true);
			
			$bg_image_class='background-image:url('.esc_url($images_url).'); background-position:'.$bg_pos.'';
		endif;
	}	
	endif;
	
	$title_bg='style="'.$title_bg.''.$bg_image_class.'"';
	
	// Title bar header 5
    if ($rebuild_data['select_header']=='header-5'):
		$header_5_titlebar_class='header-5-titlebar';
	else:
		$header_5_titlebar_class='';
	endif;
					
	if((get_post_meta( get_the_ID(), 'rebuild_title_bar', true )) and (get_post_meta( get_the_ID(), 'rebuild_title_bar', true ) !='select_title_bar') and (!is_search())):?>
			
            
			<?php if(get_post_meta( get_the_ID(), 'rebuild_title_bar', true ) == 'featuredimage'): ?>
                 <!-- BOF Titlebar -->
                <div class="jx-rebuild-titlebar jx-rebuild-double-height" <?php echo esc_attr( $title_bg ); ?>> 
                	<?php 
					$post_thumbnail_id = get_post_thumbnail_id();
                    $post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id,'full', true);
					?>
                    
                    <div class="parallax bg-pos-middle jx-rebuild-tint-black-light" data-velocity="-0.3"  style="background-image:url('<?php echo esc_url( $post_thumbnail_url[0] ); ?>');"></div>  
                    <!-- Background -->
                    <div class="container">
                        <div class="sixteen columns alpha">
                            <div class="jx-rebuild-breadcrumb"><?php rebuild_breadcrumbs(); ?></div>
                            <div class="jx-rebuild-page-title"><span><a href="<?php esc_url(home_url('/')); ?>"><?php esc_html_e('خانه','rebuild'); ?></a></span>
                            <span><?php echo single_post_title();?></span>                           
                            <!-- Page Title -->
                            
                            </div>
                        </div>          
                    </div>                 
                </div>    
                <!-- EOF Titlebar -->
             <?php elseif(get_post_meta( get_the_ID(), 'rebuild_title_bar', true ) == 'titlebar'): ?>
                 <!-- BOF Titlebar -->
               
                <div class="jx-rebuild-titlebar <?php echo esc_attr( $header_5_titlebar_class ); ?>" <?php echo esc_attr( $title_bg ); ?>> 
                    <div class="container">
                        <div class="sixteen columns alpha">
                            <div class="jx-rebuild-breadcrumb"><?php rebuild_breadcrumbs(); ?></div>
                            <div class="jx-rebuild-page-title"><span><a href="<?php esc_url(home_url('/')); ?>"><?php esc_html_e('خانه','rebuild'); ?></a></span>
                            <span><?php echo single_post_title();?></span>                           
                            <!-- Page Title -->
                            
                            </div>
                        </div>         
                    </div>                 
                </div>  
                <!-- EOF Titlebar -->
                			
			<?php elseif(get_post_meta( get_the_ID(), 'rebuild_title_bar', true ) == 'revolutionslider'): ?>
                
                <!-- BOF Slider -->
                <div class="jx-rebuild-slider">        
                    <div class="jx-rebuild-rev-slider-holder">
                            <?php if(class_exists('RevSlider')){                                 
                                 if(get_post_meta( get_the_ID(), 'rebuild_revolutionslider', true )):
								 	putRevSlider(get_post_meta( get_the_ID(), 'rebuild_revolutionslider', true ));
                             	 endif;
                             } ?>
                        </div>                 
                </div>    
                <!-- BOF Slider -->
            <?php elseif(get_post_meta( get_the_ID(), 'rebuild_title_bar', true ) == 'no-title-bar'): ?>
            
            	<!-- Do Nothing -->
            
            <?php endif; ?>
        
		<?php elseif (is_home() or  is_front_page() or is_single()or is_archive() or is_search() or is_404()):?>
				
                
                 <!-- BOF Titlebar -->
                <div class="jx-rebuild-titlebar <?php echo esc_attr( $header_5_titlebar_class ); ?>" <?php echo esc_attr( $title_bg ); ?>> 
                    <div class="container">
                        <div class="sixteen columns alpha">
                            <div class="jx-rebuild-breadcrumb"><?php rebuild_breadcrumbs(); ?></div>
                            <div class="jx-rebuild-page-title"><span><a href="<?php esc_url(home_url('/')); ?>"><?php esc_html_e('خانه','rebuild'); ?></a></span>
                            <?php rebuild_short_breadcrumbs();?>                           
                            <!-- Page Title -->
                            </div>
                        </div>       
                    </div>                 
                </div>    
                <!-- EOF Titlebar -->
                
                
        
		<?php else:?>
				
                
                 <!-- BOF Titlebar -->
                <div class="jx-rebuild-titlebar <?php echo esc_attr( $header_5_titlebar_class ); ?>" <?php echo esc_attr( $title_bg ); ?>> 
                    <div class="container">
                        <div class="sixteen columns alpha">
                            <div class="jx-rebuild-breadcrumb"><?php rebuild_breadcrumbs(); ?></div>
                            <div class="jx-rebuild-page-title"><span><a href="<?php esc_url(home_url('/')); ?>"><?php esc_html_e('خانه','rebuild'); ?></a></span>
                            <span><?php echo single_post_title();?></span>                           
                            <!-- Page Title -->                            
                            </div>
                        </div>       
                    </div>                 
                </div>    
                <!-- EOF Titlebar -->
	
		<?php endif; ?>