<?php
/*
Plugin Name: menu Widget
Plugin URI: http://janxcode.com/
Description: janxcode menu Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_rebuild_menu extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_rebuild_menu', 'description' => 'menu Info','category_id','show_date' );
    parent::__construct('widget_rebuild_menu', esc_html__('ReBuild menus','rebuild'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	$instance = wp_parse_args( (array) $instance, array('title' => 'menu Brochures', 'name' => '', 'link' => '') );
               
     }
 
    function update($new_instance, $old_instance) {
	
	$instance	=	$old_instance;
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
 	
	global $post;
	
	
    echo wp_kses_post( $before_widget );
    $title 			= empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	//$date = $instance['show_date'];
 
    if (!empty($title))
      //echo wp_kses_post( $before_title ) . sanitize_text_field( $title ) . wp_kses_post( $after_title );
 
  	
	$post_ancestors = get_ancestors($post->ID, 'page');
	$post_parent = end($post_ancestors);
                    
                     	if($post_parent): 
                                              
                            echo '<div class="jx-rebuild-sidebar-menu">
                                <ul>';    
                                   
								    
                                   $post_ancestors = get_ancestors($post->ID, 'page');                                   
                                   $post_parent = end($post_ancestors);
                                   
								   if(is_page($post_parent)): endif; 
                                   
                                   if($post_parent) {
                                    
                                    $args =array(
                                       'child_of'     => $post_parent,
                                       'link_after'   => '',
                                       'link_before'  => '',
                                       'post_type'    => 'page',
                                       'post_status'  => 'publish',
                                       'title_li'     => ''
                                       );
                                    
                                    $children = wp_list_pages($args);
                                    
                                   }
                                    else {
                                    
                                     $args =array(
                                       'child_of'     => $post->ID,
                                       'link_after'   => '',
                                       'link_before'  => '',
                                       'post_type'    => 'page',
                                       'post_status'  => 'publish',
                                       'title_li'     => ''
                                       );
                                    
                                    $children = wp_list_pages($args);
                                    
                                        
                                   }
                                   if ($children) {
                                     echo $children; 
                                    } 
                                  
								  echo '</ul>
                               </div>';
                        
                     endif;	 
    echo wp_kses_post($after_widget);
  }
  
 
}
// Add Widget
function widget_rebuild_menu_init() {
	register_widget('widget_rebuild_menu');
}
add_action('widgets_init', 'widget_rebuild_menu_init');
?>
