<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ReBuild
 */
get_header(); ?>
	<?php
	$content_class = '';
	$sidebar_class = '';
	if(get_post_meta(get_the_ID(), 'rebuild_sidebar', true) == 'no-sidebar') {
		$content_class = 'has-no-sidebar';
		$sidebar_class = 'no-sidebar';
		$set_content_width ='';
	} elseif (get_post_meta(get_the_ID(),  'rebuild_sidebar', true) == 'right-sidebar') {
		$content_class = 'content-left alpha';
		$sidebar_class = 'sidebar-right omega';
		$set_content_width ='with-sidebar';
	} elseif (get_post_meta(get_the_ID(),  'rebuild_sidebar', true) == 'left-sidebar') {
		$content_class = 'content-right omega';
		$sidebar_class = 'sidebar-left alpha';
		$set_content_width ='with-sidebar';
	} elseif ( (get_post_meta(get_the_ID(),'rebuild_sidebar', true) == 'default') || (get_post_meta(get_the_ID(),  'rebuild_sidebar', true) == '') ) {
		if( $rebuild_data['sidebar_position'] == 'no-sidebar' ) {
			$content_class = 'has-no-sidebar';
			$sidebar_class = 'no-sidebar';
			$set_content_width ='';
		} elseif( $rebuild_data['sidebar_position'] == 'right-sidebar' ) {
			$content_class = 'content-left alpha';
			$sidebar_class = 'sidebar-right omega';
			$set_content_width ='with-sidebar';
		} elseif( $rebuild_data['sidebar_position'] == 'left-sidebar' ) {
			$content_class = 'content-right omega';
			$sidebar_class = 'sidebar-left alpha';
			$set_content_width ='with-sidebar';
		}
	}
	
	$bg_color='';
	
	if (get_post_meta(get_the_ID(),'rebuild_body_bg_color', true)!=''):
		$bg_color='style="background-color:'.get_post_meta(get_the_ID(),'rebuild_body_bg_color', true).'"';
	else:
		$bg_color='';
	endif;
	
	?>
    <main id="main" class="site-main" <?php echo esc_attr( $bg_color ); ?>>    
		<div id="primary" class="content-area">
            <div class="container <?php echo esc_attr( $set_content_width ); ?>">
                    <div class="sixteen columns jx-rebuild-padding <?php echo esc_attr( $content_class ); ?>">
                                        
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
