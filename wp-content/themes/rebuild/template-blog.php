<?php
//Template Name: Blog
get_header(); ?>		
	
    
    <?php
	$rebuild_data =  rebuild_globals();
	
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
	
	?>
    <!-- BOF Main Content -->
    <div id="main" class="main">
        <div id="primary" class="content-area">
                <div class="container <?php echo esc_attr( $set_content_width ); ?>">
                    <div class="sixteen columns jx-rebuild-padding <?php echo esc_attr( $content_class ); ?>">
                        <div class="theiaStickySidebar">
						<?php if ( have_posts() ) : ?>
                
               
                            <?php query_posts('post_type=post&post_status=publish&"&paged='. get_query_var('paged')); ?>
                            
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                
                                <?php
                
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', get_post_format() );
                                ?>
                
                            <?php endwhile; ?>
                            <div class="row"></div>
                            <div class="jx-rebuild-pagination">
                                <?php the_posts_pagination(); ?>
                            </div>
                        <?php else : ?>
                
                            <?php get_template_part( 'template-parts/content', 'none' ); ?>
                
                        <?php endif; ?>
                    	</div>
                    </div>
                    <!-- EOF Body Content -->
                    
                    <div id="sidebar" class="four columns jx-rebuild-padding <?php echo esc_attr( $sidebar_class ); ?>">
                		<div class="theiaStickySidebar">
							<?php dynamic_sidebar( 'general-sidebar' ); ?>
                        </div>
                	</div>
                	<!-- EOF sidebar -->
                </div>
        </div><!-- #primary -->
    </div>
<?php get_footer(); ?>
