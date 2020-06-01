<?php



/* rebuild Custom Post Type */

add_action('init', 'rebuild_cpt_portfolio');
add_action('init', 'rebuild_cpt_faq');
add_action('init', 'rebuild_cpt_testimonial');
add_action('init', 'rebuild_cpt_team');
add_action('init', 'rebuild_cpt_partners');


 
function rebuild_cpt_portfolio(){
			global $data; 
			
			$labels = array(
			'name' => _x('پروژه / نمونه کار','portfolio','rebuild'),
			'singular_name' => _x('پروژه / نمونه کار','portfolio','rebuild'),
			'add_new' => esc_html__('افزودن پروژه', 'rebuild'),
			'add_new_item' => esc_html__('افزودن پروژه جدید','rebuild'),
			'edit_item' => esc_html__('ویرایش','rebuild'),
			'new_item' => esc_html__('افزودن جدید','rebuild'),
			'view_item' => esc_html__('مشاهده آیتم','rebuild'),
			'search_items' => esc_html__('جستجو','rebuild'),
			'not_found' =>  esc_html__('پروژه ای یافت نشد','rebuild'),
			'not_found_in_trash' => esc_html__('پروژه ای یافت نشد','rebuild'), 
			'parent_item_colon' => ''
			);
			$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'menu_position' => 20,
			'supports' => array('title','editor','thumbnail')
			); 
			
			register_post_type('portfolio',$args);
			
			
			register_taxonomy( "portfolio-categories", 
			array( 	"portfolio" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"دسته بندی",'add_new_item'=>"افزودن"), 
			"singular_label" => esc_html__('زمینه ها','rebuild'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));

			
}// EOF portfolio CPT


function rebuild_cpt_faq(){
			
			global $data; 

			$labels = array(
			'name' => _x('سوالات متداول','سوالات متداول', 'rebuild'),
			'singular_name' => _x('سوالات متداول','سوالات متداول','rebuild'),
			'add_new' => esc_html__('Add New', 'rebuild'),
			'add_new_item' => esc_html__('افزودن سوالات','rebuild'),
			'edit_item' => esc_html__('ویرایش','rebuild'),
			'new_item' => esc_html__('افزودن جدید','rebuild'),
			'view_item' => esc_html__('مشاهده سوالات متداول','rebuild'),
			'search_items' => esc_html__('جستجو','rebuild'),
			'not_found' =>  esc_html__('چیزی یافت نشد','rebuild'),
			'not_found_in_trash' => esc_html__('چیزی یافت نشد','rebuild'),
			'parent_item_colon' => ''
		  );
		  $args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title','editor','thumbnail')
		  );
		
		   
		  register_post_type('faq',$args);
		  
		  
		  register_taxonomy( "faq-categories", 
			array( 	"faq" ), 
			array( 	"hierarchical" => true,
			"labels" => array('name'=>"دسته بندی",'add_new_item'=>"افزودن زمینه جدید"), 
			"singular_label" => esc_html__('زمینه','rebuild'), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
			'with_front' => false)
			));

}//EOF FAQ CPT


function rebuild_cpt_testimonial(){
			global $data; 
			$labels = array(
				'name' => esc_html__('گواهینامه ها','گواهینامه ها','rebuild'),
				'singular_name' => esc_html__('هینامه ها','Testimonials','rebuild'),
				'add_new' => esc_html__('افزودن','rebuild'),
				'add_new_item' => esc_html__('افزودن گواهینامه جدید','rebuild'),
				'edit_item' => esc_html__('ویرایش گواهینامه','rebuild'),
				'new_item' => esc_html__('گواهینامه جدید','rebuild'),
				'view_item' => esc_html__('مشاهده','rebuild'),
				'search_items' => esc_html__('جستجو','rebuild'),
				'not_found' =>  esc_html__('گواهینامه ای یافت نشد','rebuild'),
				'not_found_in_trash' => esc_html__('گواهینامه ای یافت نشد','rebuild'),
				'parent_item_colon' => '',
			);
		 
			$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title','editor','thumbnail')
		  );
		  
		  register_post_type('testimonials',$args);
		  
}//EOF Testimonial CPT


function rebuild_cpt_team(){
			global $data; 
 			$labels = array(
			'name' => _x('اعضای تیم','team', 'rebuild'),
			'singular_name' => _x('اعضای تیم','Team', 'rebuild'),
			'add_new' => esc_html__('افزودن', 'rebuild'),
			'add_new_item' => esc_html__('افزودن عضو جدید','rebuild'),
			'edit_item' => esc_html__('ویرایش عضو','rebuild'),
			'new_item' => esc_html__('عضو جدید','rebuild'),
			'view_item' => esc_html__('مشاهده تیم','rebuild'),
			'search_items' => esc_html__('جستجو','rebuild'),
			'not_found' =>  esc_html__('یافت نشد','rebuild'),
			'not_found_in_trash' => esc_html__('چیزی یافت نشد','rebuild'),
			'parent_item_colon' => ''
		  );
		  $args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title','editor','thumbnail')
		  );
		  
		  register_post_type('team',$args);
		 
}//EOF Team-Member CPT		


function rebuild_cpt_partners(){
			global $data; 
			
			$labels = array(
			'name' => _x('شرکا و همکاران','partners','rebuild'),
			'singular_name' => _x('شرکا و همکاران','partners','rebuild'),
			'add_new' => esc_html__('افزودن جدید', 'rebuild'),
			'add_new_item' => esc_html__('افزودن شریک / همکار جدید','rebuild'),
			'edit_item' => esc_html__('ویرایش','rebuild'),
			'new_item' => esc_html__('آیتم جدید','rebuild'),
			'view_item' => esc_html__('مشاهده آیتم','rebuild'),
			'search_items' => esc_html__('جستجو','rebuild'),
			'not_found' =>  esc_html__('چیزی یافت نشد','rebuild'),
			'not_found_in_trash' => esc_html__('چیزی یافت نشد','rebuild'), 
			'parent_item_colon' => ''
			);
			$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'menu_position' => 20,
			'supports' => array('title','editor','thumbnail')
			); 
			
			register_post_type('partners',$args);

			
}// EOF Registered Users

			

?>