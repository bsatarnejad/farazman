<?php
/**
 * The template for displaying all single portfolio.
 *
 * @package ReBuild
 */
get_header();
global $post;

$parentId = $post->post_parent;
$prev_post = get_previous_post();
$next_post = get_next_post();
 ?>
	<div id="primary" class="content-area">
        <div class="jx-rebuild-container jx-rebuild-padding">
        	<div class="container">
            	<!-- Project Nav -->
                <div class="sixteen columns">
                    <div class="jx-rebuild-project-nav">
                        <div class="jx-rebuild-project-title left"><?php the_title(); ?></div>
                        <div class="jx-rebuild-project-nav-icons right">
                        <ul>
                            <li><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                        </div>
                        
                    </div>
                </div>
            	<!-- EOF Project Nav -->
                
                <?php 
					$images_url='';					
					$images = rwmb_meta( 'rebuild_project_photos', 'type=image_advanced' );
					$logo_images = rwmb_meta( 'rebuild_partners_logo', 'type=image_advanced' );			
				?>
            	<!-- Portfolio Slider-->
                <div class="eleven columns">               		
                   <div class="jx-rebuild-protfolio-details">                            
                	<div id="slider" class="flexslider">
                    	<ul class="slides">
                        	<?php 
							foreach ( $images as $image ){
								$images_url=$image['full_url'];
								$images_big_size = str_replace('.jpg', '-805x369.jpg', $images_url);
								?>
								<li><img src="<?php echo esc_url($images_big_size); ?>" alt=""></li>
                            <?php 
							}
							?>
                        </ul>
                    </div>
                    
                    <div id="carousel" class="flexslider">
                    	<ul class="slides">
                        	<?php 
							foreach ( $images as $image_small ){
								$images_small_url=$image_small['full_url'];
								$images_small_size = str_replace('.jpg', '-210x160.jpg', $images_small_url);
								?>
								<li><img src="<?php echo esc_url($images_small_size); ?>" alt=""></li>
                            <?php 
							}
							?>
                        </ul>
                    </div>
                    
               </div>                       
           		</div>
           		<!-- EOF Portfolio Slider-->
                
                <!-- Project Details -->
                <div class="five columns">
                	<div class="jx-rebuild-portfolio-short-details">
                    	
                        <div class="jx-rebuild-section-title-2">
                            <div class="jx-rebuild-title jx-rebuild-uppercase small-text"><?php echo esc_html_e('Project Description','rebuild'); ?></div>
                            <div class="jx-rebuild-seperator-hr"></div>
                        </div>
                        <!-- Section title -->
                         
                        <p>
                        <?php echo wp_kses_post($post->post_content); ?>
                        </p>
                    </div>
                    
                    <div class="jx-rebuild-portfolio-details-box">
                    	<div class="jx-rebuild-section-title-2">
                            <div class="jx-rebuild-title jx-rebuild-uppercase small-text"><?php echo esc_html_e('Details','rebuild'); ?></div>
                            <div class="jx-rebuild-seperator-hr"></div>
                        </div>
                        <!-- Section title -->
                        
                        <ul class="project-description-list">
                        	<li><?php echo esc_html_e('Client:','rebuild'); ?><span><?php echo get_post_meta(get_the_ID(),'rebuild_project_client',true);?></span></li>
                            <li><?php echo esc_html_e('Value:','rebuild'); ?><span><?php echo get_post_meta(get_the_ID(),'rebuild_projet_value',true);?></span></li>
                            <li><?php echo esc_html_e('Location:','rebuild'); ?><span><?php echo get_post_meta(get_the_ID(),'rebuild_project_location',true);?></span></li>
                            <li><?php echo esc_html_e('Area:','rebuild'); ?><span><?php echo get_post_meta(get_the_ID(),'rebuild_project_area',true);?><sup>><?php echo esc_html_e('2','rebuild'); ?></sup></span></li>
                            <li><?php echo esc_html_e('Contractor:','rebuild'); ?><span><?php echo get_post_meta(get_the_ID(),'rebuild_project_contractor',true);?></span></li>
                            <li><?php echo esc_html_e('Completed Year:','rebuild'); ?><span><?php echo get_post_meta(get_the_ID(),'rebuild_project_year',true);?></span></li>                        
                        </ul>
                    </div> 
                </div>
                <!-- EOF Project Details -->
                <div class="row"></div>
                <div class="sixteen columns">
                	<div class="jx-rebuild-partner-logo">
                 
                 	<div class="jx-rebuild-section-title-2">
                        <div class="jx-rebuild-title jx-rebuild-uppercase small-text"><?php echo esc_html_e('Project Partners','rebuild'); ?></div>
                        <div class="jx-rebuild-seperator-hr"></div>
               		</div>
                
                     <ul>
                        <?php 
							foreach ( $logo_images as $logo_image ){
								$logo_url=$logo_image['full_url'];
								?>
								<li><img src="<?php echo esc_url($logo_url); ?>" alt=""></li>
                            <?php 
							}
							?>
                     </ul>
                 </div>
                </div>
            </div>
        </div>
	</div><!-- #primary -->
<?php get_footer(); ?>
