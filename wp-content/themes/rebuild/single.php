<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ReBuild
 */
$rebuild_data =  rebuild_globals();
get_header(); ?>
	<?php
	$content_class = '';
	$sidebar_class = '';
	if( $rebuild_data['single_sidebar_position'] == 'no-sidebar' ) {
		$content_class = 'has-no-sidebar';
		$sidebar_class = 'no-sidebar';
		$set_content_width ='';
	} elseif( $rebuild_data['single_sidebar_position'] == 'right-sidebar' ) {
		$content_class = 'content-left alpha';
		$sidebar_class = 'sidebar-right omega';
		$set_content_width ='with-sidebar';
	} elseif( $rebuild_data['single_sidebar_position'] == 'left-sidebar' ) {
		$content_class = 'content-right omega';
		$sidebar_class = 'sidebar-left alpha';
		$set_content_width ='with-sidebar';
	}
	
	?>
    <main id="main" class="site-main">
        <div id="primary" class="content-area">		
            <div class="container <?php echo esc_attr( $set_content_width ); ?>">
                    <div class="sixteen columns jx-rebuild-padding <?php echo esc_attr( $content_class ); ?>">
                    <?php while ( have_posts() ) : the_post(); ?>
            
                        <?php get_template_part( 'template-parts/content', 'single' ); ?>
					
                        
						<?php
                        //Get Share Box                        
                        if ($rebuild_data['checkbox_sharebox']):			
                        get_template_part('inc/sharebox');
                        endif;
                        //End of Share Box
                        ?>
                            <hr></hr>
                            
                            <!-- BDF Autor Box -->
                            <?php 
							
							$authordesc = get_the_author_meta( 'user_description' );
							
							if( ! empty ( $authordesc )): ?>
                             <div class="jx-rebuild-author-box jx-rebuild-border-thick">
                                
                                <div class="jx-rebuild-author-image">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '100', '' ); ?></a>
                                </div>
                                
                                <div class="jx-rebuild-author-details">
                                    <div class="jx-rebuild-author-name jx-rebuild-black"><a href="<?php esc_url(the_author_link()); ?>"> <?php the_author(); ?> </a></div>
                                    <div class="jx-rebuild-author-details"><?php echo esc_attr($authordesc); ?></div>
                                </div>
                                
                                
                            </div>
							<?php endif; ?>                        
                            <!-- EDF Autor Box -->
                           
                        <div class="row"></div>
                        
                        
						<?php 
                        //Get Related Posts 
                        if ($rebuild_data['checkbox_relatedposts']):
                        get_template_part('inc/related_posts');
                        endif;
                        //End of related posts
                        ?>
                        
                        <div class="row"></div>
                    
                        <?php the_post_navigation(); ?>
            
                        <?php
                            if($rebuild_data['checkbox_comments']):
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endif;							
                        ?>
            
                    <?php endwhile; // End of the loop. ?>
                    
                    
                </div>
                <!-- EOF Body Content -->
                
                <div id="sidebar" class="four columns jx-rebuild-padding <?php echo esc_attr( $sidebar_class ); ?>">
					<?php dynamic_sidebar( 'general-sidebar' ); ?>
                </div>
                <!-- EOF sidebar -->
                
            </div>
            <!-- EOF container -->
        </div><!-- #primary -->
    </main><!-- #main -->
<?php get_footer(); ?>
