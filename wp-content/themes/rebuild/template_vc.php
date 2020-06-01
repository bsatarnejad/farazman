<?php get_header(); ?>
<?php 
	/** Template Name: VC Page  */
	
	
	$bg_color='';
	
	if (get_post_meta(get_the_ID(),'rebuild_body_bg_color', true)!=''):
		$bg_color='style="background-color:'.get_post_meta(get_the_ID(),'rebuild_body_bg_color', true).'"';
	else:
		$bg_color='';
	endif;?>
    
    <main id="main" class="site-main" <?php echo esc_attr( $bg_color ); ?>>
        <div id="primary" class="content-area">
    
        <?php
        
            while(have_posts()): the_post();           
                the_content();
            endwhile;
        ?>
        </div>
    </main>
<?php get_footer(); ?>