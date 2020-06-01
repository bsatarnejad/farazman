<?php $rebuild_data =  rebuild_globals(); ?>

<!-- BDF HEADER #2 -->
<header>
        <!-- BOF Top Bar -->
        <div class="jx-rebuild-header-1">
            <div class="jx-rebuild-header header-line">
                <div class="container">
                
                    <div class="four columns">
                        <div class="jx-rebuild-header-logo">
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
                    <div class="twelve columns">
                    
                        <div class="header-info">                            
                            <ul>
                                <li class="top-space">
                                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                                    <div class="position">
                                    <div class="location"><?php echo esc_html_e('Location','rebuild'); ?></div>
                                    <div class="address"><?php echo esc_attr($rebuild_data['text_office_location']); ?></div>
                                    </div>
                                </li>                                
                                <li class="top-space">
                                    <div class="icon"><i class="fa fa-clock-o"></i></div>
                                    <div class="position">
                                    <div class="time"><?php echo esc_html_e('Office Timing','rebuild'); ?></div>
                                    <div class="date"><?php echo esc_attr($rebuild_data['text_office_time']); ?></div>
                                    </div>
                                </li>                                
                                <li>
                                	<div class="toll-free"><i class="fa fa-phone"></i><?php echo esc_html_e('Toll Free','rebuild'); ?></div>
                                    <div class="toll-free-number"><?php echo esc_attr($rebuild_data['text_contact_phone']); ?></div>
                                </li> 
                            </ul>
                        </div>
                        <!-- Header Info -->
                    </div>                
	            </div>
            </div>     
               
        </div>
        <!-- EOF Top Bar -->
        <!-- EDF Header -->
        
        <div class="jx-rebuild-menu-holder jx-rebuild-sticky">
        	<div class="container">
                
                    <div class="header-menu-left">
                    
                        <div class="nav_container">
                            <div id="jx-rebuild-main-menu" class="menu">
                                <?php
								
									if(is_page_template('template-onepage.php')):
										$menu_type='onepage_navigation';
									else:
										$menu_type='primary_navigation';
									endif;
										
									$default = array(
										'theme_location'  => $menu_type,
										'menu'            => '',
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
                        </div>
                        <!-- EOF Menu -->
                    </div>
                    
                    <!-- MENU -->
                
                
                    <div class="header-search-right">                    
                        <div class="jx-rebuild-header-search">                        
                            <form method="post" action="<?php echo esc_url(home_url( '/' )); ?>" id="ext-search" class="jx-rebuild-form-wrapper">
                                <div id="message-input-1" class="search-inline-block">
                                <input kl_virtual_keyboard_secure_input="on" id="s" placeholder="جستجو" class="jx-rebuild-form-name" type="search" name="s">
                                </div>
                                <div id="message-submit-1">
                                <button type="submit"><i class="fa fa-search"></i></button>
                                <!-- Submit Button -->	
                                </div>
                            </form>                        
                        </div>          
                    </div>
                    
                    <!-- SEARCH FORM -->
                    
                </div>
    	</div>
        <!-- BOF Main Menu -->
        
        <?php get_template_part('inc/titlebar'); ?>
        
	</header>
    
    
<!-- EDF HEADER #2 -->