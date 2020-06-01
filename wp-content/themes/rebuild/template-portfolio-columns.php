<?php
//Template Name: Classic Portfolio
global $post;
get_header();
 ?>		
	
     <!-- BOF Main Content -->
    <div id="main" class="main">
        <div id="primary" class="content-area">
            <div class="container jx-rebuild-padding-medium">
            	<div id="post-<?php the_ID(); ?>" <?php post_class('jx-rebuild-portfolio-columns'); ?>>
       		   <div class="jx-rebuild-protfolio">       
                   <div class="jx-rebuild-portfolio-filter category-menu">
                        <ul>                                  
                            <?php 
                            $terms = get_terms('portfolio-categories'); 
                            $count = count($terms); 
                            ?>
                            
                            <li><a class="filter active" data-filter="*" href="#"><?php esc_html_e('همه','rebuild'); ?></a></li> 
                            
                            <?php 
                                if ( $count > 0 ){ 
                                foreach ( $terms as $term ) { 
                                    $termname = strtolower($term->name); 
                                    $termname = str_replace(' ', '-', $termname); 
                                    $termname = $term->slug;
                            ?>
                            
                            <li><a class="filter" data-filter=".<?php echo esc_attr( $termname ); ?>" href="#"><?php echo esc_attr( $term->name ); ?></a></li> 
                                
                            <?php }
                                }?>							 
                        </ul>
                   </div>
                   <!-- Filter -->           
                   
                   <div class="jx-rebuild-portfolio-columns-container">			
                       <?php
                       
                        $i=0;
                                        
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;          
                        $args = array('post_type' => 'portfolio','orderby' => 'date', 'order' => 'ASC','showposts' => 12,'paged'=>$paged );  
                        $loop = new WP_Query( $args ); 		
                        while ( $loop->have_posts() ) : $loop->the_post();  
                        
                            //Get Portfolio Categories			
                            
                            $terms_string = '';
                            $terms = get_the_terms(get_the_ID(), 'portfolio-categories'); 				 
                              
                            //build up comma delimited string 
                            if ($terms):
                                foreach($terms as $t){ 
                                    $terms_string .= $t->slug . ' '; 
                                } 
                            endif;
                            
                            $post_thumbnail_id = get_post_thumbnail_id();
                            $post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id,'large', true);
                            
                            if(get_post_meta(get_the_ID(),'rebuild_project_photos',false )):
                                
                                $image_url 	= 	wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');					
                                $image_path	=	get_post_meta(get_the_ID(),'rebuild_project_photos',false );					
                                $images 	= 	rwmb_meta( 'rebuild_project_photos', 'type=image_advanced' );
                                
                                foreach ( $images as $image ){
                                    $images_url=$image['full_url'];
                                }	
                            endif;
                            
                            if($i < 5):
                                $set_img_class='grid-item-width2 grid-item-height2';
                                $imagesize='rebuild_port-1';
                            else:
                                $set_img_class='';
                                $imagesize='rebuild_port-3';
                            endif;
                            ?>
                            
                                <div class="four columns portfolio-item jx-rebuild-image-wrapper <?php echo esc_attr( $terms_string ); ?> all">
                                    <?php the_post_thumbnail($imagesize); ?>
                                    <div class="jx-rebuild-portfolio-hoverlayer"></div>
                                    
                                        <div class="jx-rebuild-portfolio-hover">
                                           
                                            <div class="jx-rebuild-portfolio-top-hover">
                                               <div class="jx-rebuild-title jx-rebuild-uppercase"><?php the_title(); ?></div>                                                
                                            </div>
                                            <!-- Top Hover Title -->                                            
                                            
                                            <div class="jx-rebuild-portfolio-plus-hover">
                                                <a href="<?php echo esc_url(the_permalink()); ?>"><div class="jx-rebuild-portfolio-link"><i class="fa fa-link"></i></div></a>
                                            </div>
                                            <!-- Bottom Hover -->
                                            
                                        </div>
                                    
                                    <!-- EOF Hover -->
                              </div>
                        <?php
                        $i++;
                        endwhile;
                       
                        ?> 
                    	<div class="clearfix"></div>                        
                   </div>
                   <!-- Content -->
                   <div class="row"></div>
                   <div class="jx-rebuild-pagination">
                       <?php rebuild_pagination($loop->max_num_pages,$paged); ?>
                   </div>
                   <!-- Pagination -->
                   
               </div>      
                                      
            </div>
            </div>
            <!-- EOF Grid Portfolio -->
        </div><!-- #primary -->
    </div>
<?php get_footer(); ?>
