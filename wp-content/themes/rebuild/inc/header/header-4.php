<?php $rebuild_data =  rebuild_globals(); ?>

<?php //Header-4 ?>
	
    <header>
        <div class="jx-rebuild-header-4 jx-rebuild-header">
        <!-- EDF Header -->
            <div class="jx-rebuild-menu-holder jx-rebuild-sticky">        
                <div class="container">
    
                    <div class="header-menu-right">
                    
                        <div class="nav_container">
                            <?php
								
									if(is_page_template('template-onepage.php')):
										$menu_type='onepage_navigation';
										$menu='';
									elseif(is_page('intro-page')):
										$menu_type='';
										$menu='Intro';
									else:
										$menu_type='primary_navigation';
										$menu='';
									endif;
										
									$default = array(
										'theme_location'  => $menu_type,
										'menu'            => $menu,
										'container'       => 'div',
										'menu_class'      => 'jx-rebuild-mainmenu',
										'echo'            => true,
										'fallback_cb'     => '__return_false',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => new rebuild_mega_menu()
									);
									
									wp_nav_menu($default);									
									
									
								?>                  	                  
                        </div>
                        <!-- EOF Menu -->
                    </div>
                    <!-- MENU -->
                    <div class="jx-rebuild-header-logo left">
                        <?php if($rebuild_data['rebuild_logo'] != ""): ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($rebuild_data['rebuild_logo']); ?>" alt="<?php bloginfo('name'); ?>" class="logo_standard"/></a>
                                <?php if($rebuild_data['logo_retina'] != '') : ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($rebuild_data['logo_retina']); ?>" width="<?php echo esc_attr($rebuild_data['logo_width']); ?>" height="<?php echo esc_attr($rebuild_data['logo_height']); ?>" alt="<?php bloginfo('name'); ?>" class="logo_retina"/></a>				
                                <?php endif; ?>
                                <!-- EOF Retina -->                    
                            <?php endif ?>     
                    </div>
                    <!-- Logo -->
    
                </div>
           </div>
        <!-- BOF Main Menu -->
        </div>
        
        <?php get_template_part('inc/titlebar'); ?>
        
	</header>