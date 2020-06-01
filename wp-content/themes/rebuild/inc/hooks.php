<?php 
	
		//Body Start Hook-----------------------------//
		function rebuild_header_start() {
			
		$rebuild_data =  rebuild_globals();	
			
		if (!is_page_template('template-blank.php')):
	
			if($rebuild_data['select_header']) {
				if(is_page('header-1')) {
					include_once get_template_directory().'/inc/header/header-1.php';
				}elseif(is_page('header-2')) {
					include_once get_template_directory().'/inc/header/header-2.php';
				} elseif(is_page('header-3')) {
					include_once get_template_directory().'/inc/header/header-3.php';
				}elseif(is_page('intro-page')) {
					include_once get_template_directory().'/inc/header/header-1.php';
				}elseif(is_page('header-4')) {
					include_once get_template_directory().'/inc/header/header-4.php';
				}elseif(is_page('header-5')) {
					include_once get_template_directory().'/inc/header/header-5.php';
				}else{
					include_once get_template_directory().'/inc/header/'.$rebuild_data['select_header'].'.php';
				}
			} else {
				if(is_page('header-1')) {
					include_once get_template_directory().'/inc/header/header-1.php';
				}elseif(is_page('header-2')) {
					include_once get_template_directory().'/inc/header/header-2.php';
				} elseif(is_page('header-3')) {
					include_once get_template_directory().'/inc/header/header-3.php';
				}elseif(is_page('intro-page')) {
					include_once get_template_directory().'/inc/header/header-1.php';
				}elseif(is_page('header-4')) {
					include_once get_template_directory().'/inc/header/header-4.php';
				}elseif(is_page('header-5')) {
					include_once get_template_directory().'/inc/header/header-5.php';
				}else{
					include_once get_template_directory().'/inc/header/header-1.php';
				}
			}
	
		endif;
		
		}
		
		add_action('rebuild_body_start', 'rebuild_header_start');
		
		//EOF Body Start Hook-----------------------------//
		

		//Body End Hook-----------------------------//
		function rebuild_footer_end() {
			
		$rebuild_data =  rebuild_globals();	

		if (!is_page_template('template-blank.php')):
	
			if($rebuild_data['select_footer']) {
				if(is_page('footer-1')) {
					include_once get_template_directory().'/inc/footer/footer-1.php';
				}elseif(is_page('footer-2')) {
					include_once get_template_directory().'/inc/footer/footer-2.php';
				}elseif(is_page('footer-3')) {
					include_once get_template_directory().'/inc/footer/footer-3.php';
				}elseif(is_page('intro-page')) {
					include_once get_template_directory().'/inc/footer/footer-intro.php';
				}else{
					include_once get_template_directory().'/inc/footer/'.$rebuild_data['select_footer'].'.php';
				}
			} else {
				if(is_page('footer-1')) {
					include_once get_template_directory().'/inc/footer/footer-1.php';
				}elseif(is_page('footer-2')) {
					include_once get_template_directory().'/inc/footer/footer-2.php';
				}elseif(is_page('footer-3')) {
					include_once get_template_directory().'/inc/footer/footer-3.php';
				}elseif(is_page('intro-page')) {
					include_once get_template_directory().'/inc/footer/footer-intro.php';
				}else{
					include_once get_template_directory().'/inc/footer/footer-1.php';
				}
			}
	
		endif;
		}
		
		add_action('rebuild_body_end', 'rebuild_footer_end');
		
		//EOF Body End Hook-----------------------------//
		
	
	?>