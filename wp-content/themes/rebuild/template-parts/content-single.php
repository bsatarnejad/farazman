<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ReBuild
 */
 
 $rebuild_data['checkbox_slideshow']=true;
 $rebuild_data['text_slideshow_count']=2;
 $image_size ='rebuild_blog';
 
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
	
	$post_tags = wp_get_post_tags($post->ID);	
		
?>
		    <div id="post-<?php the_ID(); ?>" <?php post_class('jx-rebuild-blog'); ?>>
                   <div class="jx-rebuild-blog-1">                    
                    <div class="jx-rebuild-blog-item">
                        <div class="jx-rebuild-blog-title-metabox">
                            <div class="jx-rebuild-date">
                            	<div class="day"><?php echo get_the_time('d', $post); ?></div>
                                <div class="month"><?php echo get_the_time('M', $post); ?></div>
                            </div>                            
                            <div class="jx-rebuild-title"><?php echo the_title(); ?></div>
                            <div class="jx-rebuild-blog-meta">
                                <ul>
                                    <li class="jx-rebuild-author"><?php esc_html_e('By','rebuild');?> <?php the_author() ?></li>
                                    <li class="jx-rebuild-comments"><?php comments_number(esc_html__('0 Comments', 'rebuild'), esc_html__('1 Comment', 'rebuild'), '(%) '.esc_html__('Comments', 'rebuild'));?></li>
                                    <li class="jx-rebuild-category"><?php the_category(' , ') ?></li>
                                    <?php if(!empty($post_tags)) { ?>
                                    <li class="jx-rebuild-Tag"><?php the_tags( '', ', ' ); ?></li>
                                    <?php } ?>                                    
                                </ul>
                            </div>                    
                        </div>
                        <!-- EOF Title -->
                        
                        <div class="row"></div>
                        
                        <div class="jx-rebuild-image-holder">
                        
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php  if(get_post_meta( get_the_ID(), 'rebuild_video_code', true )): // Video Post ?>
                                        <li>
                                            <div class="jx-rebuild-blog-image jx-rebuild-image-wrapper">
                                            <div class="full-video">
                                                <div class="full-widthvideo">
                                                <?php 
                                                    global $wp_embed;
                                                    
													$post_embed = $wp_embed->run_shortcode('[embed height="330"]'.esc_url(get_post_meta(get_the_ID(), 'rebuild_video_code', true)).'[/embed]');															
                                                    echo $post_embed;
                                                 ?>
                                                 		
                                                </div><!-- EOF full-widthvideo-->
                                            </div><!-- EOF full-video-->
        
                                            </div>
                                        </li>
                                   <?php endif;?>                                     
                                   <?php if(has_post_thumbnail()): // Start of featuered image ?>
                                  
                                         <li>
                                            <div class="jx-rebuild-blog-image jx-rebuild-image-wrapper">
                                         <?php 
                                            $post_image_id = get_post_thumbnail_id(get_the_id());
                                            $image_url = wp_get_attachment_image_src($post_image_id, 'large');
                                            $image_small = wp_get_attachment_image_src($post_image_id, $image_size);
                                            $image_data = wp_get_attachment_metadata($post_image_id);
                                              the_post_thumbnail($image_size); ?>
                                              
                                              
                                             </div>
                                        </li> 
                                   
                                   <?php endif;?>                                     
                                   <?php if(kd_mfi_get_featured_image_id('featured-image-2', 'post')): ?>
                                   <?php
                                                                            
                                        $i = 2;
                                        while($i <= $rebuild_data['text_slideshow_count'] ):
                                        $attachment_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                                        
                                        echo'<li><div class="jx-rebuild-blog-image jx-rebuild-image-wrapper">';
                                        
                                        if($attachment_id):
                                        $image_url = wp_get_attachment_image_src($attachment_id, 'large');
										$image_small = wp_get_attachment_image_src($attachment_id, $image_size);
										$image_data = wp_get_attachment_metadata($attachment_id);
                                       // the_post_thumbnail($image_size);
                                        ?>									
                                    
                                        <img src="<?php echo esc_url($image_small[0]); ?>" alt="<?php echo esc_attr($image_data['image_meta']['title']); ?>" />									
                                        
                                            
                                    <?php
                                        echo'</div></li>';
                                    
                                        endif; $i++;
                                    endwhile;
                                        
                                    ?>
                                    
                                    
                                   <?php endif; // End of slideshow ?>                                  
                                </ul>
                            </div>
                        
                        </div>
                        <!-- EOF Blog Image -->
                        
                        <div class="jx-rebuild-description"><?php the_content(); ?></div>
                        <!-- EOF Description -->
                  		<!-- Tag -->
                        
                        <div class="jx-rebuild-blog-tag">
                        	<i class="fa fa-tag"></i>
                            <ul><?php the_tags( '<li>', '</li><li>', '</li>' ); ?></ul>
                        </div>                        
                        <!-- EOF Tag -->
                                        
                    </div>
                    <!-- Item 01 -->
                    
                    </div>
                    
                    
            </div>
                    <!-- EOF Blog -->
