<?php
//Template Name: Fullwidth
get_header(); ?>			
	<main id="main" class="site-main">
        <div id="primary" class="content-area">
    
                                            
                        <?php while ( have_posts() ) : the_post(); ?>
            
                            <?php get_template_part( 'template-parts/content', 'page' ); ?>
            
                        <?php endwhile; // End of the loop. ?>
                    
                    <!-- EOF Body Content -->
    
    
        </div><!-- #primary -->
    </main><!-- #main -->
    
<?php get_footer(); ?>
