<?php get_header(); ?>
<?php 
	/** Template Name: One Page  */
		while(have_posts()): the_post();           
			the_content();
		endwhile;
?>
<?php get_footer(); ?>