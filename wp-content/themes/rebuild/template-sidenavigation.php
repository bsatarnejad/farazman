<?php
//Template Name: Side Navigation
get_header(); 
$image_size='rebuild_service';
?>		
	
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
	} 
	?>
    
    <!-- BOF Main Content -->
    <div class="main no-top-padding">
    
   		<!-- Service Details -->
        <div class="jx-rebuild-container">
            <div class="container <?php echo esc_attr( $set_content_width) ?>">
    
                <div class="sixteen columns right jx-rebuild-padding no-bottom-padding <?php echo esc_attr( $content_class ); ?>">                   
                    <!-- BDF PAGE CONTENT -->
                    <div class="jx-rebuild-service-content"> 
                    <?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
                    <?php endwhile; // End of the loop. ?>
                    </div>
                    <!-- EDF PAGE CONTENT -->                    
                </div>
     
                <!-- EDF Main Content -->
                
                <div id="sidebar" class="four columns left jx-rebuild-padding <?php echo esc_attr( $sidebar_class ); ?>">                    
                    <?php dynamic_sidebar( 'rebuild-sidebar-service' ); ?>
                </div>               
                  
                          
                <!-- EDF Side Bar Content -->
                
            </div>
        </div>
        <!-- EOF Service Details-->
        <?php echo do_shortcode(get_post_meta(get_the_ID(),'rebuild_prefooter_text',true)); ?>
    </div>
    <!-- EOF Main Content -->
<?php get_footer(); ?>
