<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ReBuild
 */
get_header(); ?>
    
    <!-- BOF Main Content -->
    <div class="main no-top-padding">     
        <div class="jx-rebuild-container jx-rebuild-padding-big">
        	
            <div class="container">
            	<div class="sixteen columns">                	
                    <div class="jx-rebuild-error-page">
                        <div class="jx-rebuild-error-msg"><h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rebuild' ); ?></h1></div>
                        <div class="jx-rebuild-error-code">404</div>
                    </div>                
                </div>
            </div>
        
        </div>        
    </div>
    <!-- EOF Main Content -->
<?php get_footer(); ?>
