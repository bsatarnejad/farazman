<?php
//Template Name: Blank
get_header(); ?>						
	<main id="main" class="site-main">
    	<div id="primary" class="content-area">
			<div class="container container-no-margin">
					<?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'template-parts/content', 'page' ); ?>
        
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
        
                    <?php endwhile; // End of the loop. ?>
    		</div>
		</div><!-- #primary -->
    </main><!-- #main -->
    
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>
