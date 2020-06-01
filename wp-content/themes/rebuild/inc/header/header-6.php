<?php $rebuild_data =  rebuild_globals(); ?>
<header>
        <!-- BOF Top Bar -->
        <div class="jx-rebuild-header-6">
        
            <!-- BDF TOOLBAR -->
            <div class="jx-rebuild-topbar">
                <div class="container">
                
                    <div class="eight columns left">
                        <div class="jx-rebuild-left-topbar"><?php echo esc_attr($rebuild_data['text_welcome']); ?></div>
                    </div>
                    <!-- Left Items -->
                    <?php
						
						if ( class_exists( 'WooCommerce' ) ) {
						
							global $woocommerce;
							
							// get cart quantity
							$qty = $woocommerce->cart->get_cart_contents_count();
							
							// get cart total
							$total = $woocommerce->cart->get_cart_total();
							
							// get cart url
							$cart_url = $woocommerce->cart->get_cart_url();
						}
						?>
                    <div class="eight columns right">
                    	
                        <div class="jx-rebuild-right-topbar">
                            <div class="email left"><i class="fa fa-envelope"></i> <?php echo esc_attr($rebuild_data['text_email']); ?></div>
                            
                                <ul class="right">
                                   <?php if ( class_exists( 'WooCommerce' ) ) {?>
                                    <li><a href="<?php echo esc_url($cart_url); ?>"><i class="fa fa-shopping-cart"></i><span class="cart"><?php echo wp_kses_post($qty); ?></span></a></li>
                                    <li><a href="<?php echo esc_url($cart_url); ?>"><?php echo wp_kses_post($total); ?></a></li>
                                    <?php } ?>
                                    
                                    <li>
                                    
                                    <?php if (is_user_logged_in()) { ?>
                                            <a href="<?php echo wp_logout_url( esc_url(home_url('/')) ); ?>"><i class="fa fa-power-off"></i></a>
                                    <?php } else { ?>            	
                                            <a class="login_button show_login" id="show_login_button" href=""><i class="fa fa-user"></i></a>
                                    <?php } ?>
                                    </li>
                                    
									<?php if($rebuild_data['checkbox_social_header']): ?>
										<?php if($rebuild_data['text_facebook']): ?>
                                            <li><a href="http://www.facebook.com/<?php echo esc_attr($rebuild_data['text_facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($rebuild_data['text_twitter']): ?>
                                            <li><a href="http://www.twitter.com/<?php echo esc_attr($rebuild_data['text_twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($rebuild_data['text_googleplus']): ?>
                                            <li><a href="http://www.googleplus.com/<?php echo esc_attr($rebuild_data['text_googleplus']); ?>"><i class="fa fa-google-plus"></i></a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                                <!-- Social icons-->
                            </div>
                            
                    </div>
                    <!-- Right Items -->
                </div>
            </div>
            <!-- EDF TOOLBAR --> 
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
        <?php get_template_part('inc/ajax', 'auth'); ?>
        <?php get_template_part('inc/titlebar'); ?>
        
	</header>