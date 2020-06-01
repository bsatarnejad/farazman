<?php $rebuild_data =  rebuild_globals(); ?>
    
    <!-- BOF FOOTER -->
    
    <footer class="jx-rebuild-footer-section">
		<div class="jx-rebuild-footer-1">
        
            <!-- BDF WEDGET FOOTER -->        
            <div class="jx-rebuild-footer jx-rebuild-container">
                <div class="container">
                
                    <!-- BOF Footer Wedget #1 -->
                    <div class="four columns">
						 <?php if($rebuild_data['rebuild_footer_logo']): ?>
                         <div class="jx-rebuild-footer-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr($rebuild_data['rebuild_footer_logo']); ?>" alt="" /></a>
                         </div>
						 <?php endif; ?>
                         
						<?php dynamic_sidebar( 'rebuild-footer-1' ); ?>                      
                        
                    </div>                
                    <!-- EOF Footer Wedget #1 -->
                    
                    <!-- BOF Footer Wedget #2-->
                    <div class="four columns">
						<?php dynamic_sidebar( 'rebuild-footer-2' ); ?>
                    </div>                
                    <!-- EOF Footer Wedget #2-->
                    
                    <!-- BOF Footer Wedget #3 -->
                    <div class="four columns">
						<?php dynamic_sidebar( 'rebuild-footer-3' ); ?>
                    </div>                
                    <!-- EOF Footer Wedget #3-->
                    
                    <!-- BOF Footer Wedget #4 -->
                    <div class="four columns">
						<?php dynamic_sidebar( 'rebuild-footer-4' ); ?>
                    </div>                  
                    <!-- EOF Footer Wedget #4 -->
                </div>
            </div>
            
            <!-- EDF WEDGET FOOTER -->
    
    
            <!-- BDF SUB FOOTER -->        
            <div class="jx-rebuild-sub-footer jx-rebuild-container">
                <div class="container"> 
                
                    <div class="eight columns">
                         <div class="jx-rebuild-copy-right"><?php printf(esc_html__( '%s', 'rebuild'),$rebuild_data['text_copyright']); ?> <a href="<?php esc_url(get_site_url()); ?>"><?php bloginfo('name'); ?></a></div>
                    </div>                
					<!-- Copyright Text -->
                    
                    <div class="eight columns">
                       
                       <div class="jx-rebuild-widget-social-icon">
                        <ul>
							<?php if($rebuild_data['text_facebook']): ?>
                            <li class="facebook"><a href="http://www.facebook.com/<?php echo esc_attr($rebuild_data['text_facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if($rebuild_data['text_twitter']): ?>
                            <li class="twitter"><a href="http://www.twitter.com/<?php echo esc_attr($rebuild_data['text_twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if($rebuild_data['text_youtube']): ?>
                            <li class="youtube"><a href="http://www.youtube.com/<?php echo esc_attr($rebuild_data['text_youtube']); ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php endif; ?>
                            <?php if($rebuild_data['text_googleplus']): ?>
                            <li class="googleplus"><a href="http://www.googleplus.com/<?php echo esc_attr($rebuild_data['text_googleplus']); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if($rebuild_data['text_dribbble']): ?>
                            <li class="dribbble"><a href="http://www.dribbble.com/<?php echo esc_attr($rebuild_data['text_dribbble']); ?>"><i class="fa fa-dribbble"></i></a></li>
                            <?php endif; ?>
                            <?php if($rebuild_data['text_instagram']): ?>
                            <li class="instagram"><a href="http://www.instagram.com/<?php echo esc_attr($rebuild_data['text_instagram']); ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if($rebuild_data['text_pinterest']): ?>
                            <li class="pinterest"><a href="http://www.pinterest.com/<?php echo esc_attr($rebuild_data['text_pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php endif; ?>
                            <?php if($rebuild_data['text_flickr']): ?>
                            <li class="flickr"><a href="http://www.flickr.com/<?php echo esc_attr($rebuild_data['text_flickr']); ?>"><i class="fa fa-flickr"></i></a></li>
                            <?php endif; ?>
                        </ul>
                     </div>
                       
                       
                    </div>
                    <!-- Social Icons -->                
                
                </div>
            </div>
            <!-- EDF SUB FOOTER -->        
		
        </div>        
    </footer>
