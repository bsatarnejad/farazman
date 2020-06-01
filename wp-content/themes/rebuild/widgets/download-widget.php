<?php
/*
Plugin Name: download Widget
Plugin URI: http://janxcode.com/
Description: janxcode download Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_rebuild_download extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_rebuild_download', 'description' => 'download Info','category_id','show_date' );
    parent::__construct('widget_rebuild_download', esc_html__('ReBuild Downloads','rebuild'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	$instance = wp_parse_args( (array) $instance, array('title' => 'Download Brochures', 'name' => '', 'link' => '') );
 
	$title 			= esc_attr($instance['title']);
	$name 			= $instance['name'];
	$link 			= $instance['link'];
	
	?>
            	<p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
                   <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
     		
            	<p>
                    <label for="<?php echo esc_attr($this->get_field_id('name')); ?>">Name:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('name')); ?>" name="<?php echo esc_attr($this->get_field_name('name')); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />    
                </p>
            
            	<p>
                    <label for="<?php echo esc_attr($this->get_field_id('link')); ?>">link:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
                </p>
               
 
    <?php
    }
 
    function update($new_instance, $old_instance) {
	
	$instance	=	$old_instance;
	
	$instance['title']			=$new_instance['title'];
	$instance['link']			=$new_instance['link'];
	$instance['name']			=$new_instance['name'];
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
 	
	
	
	
    echo wp_kses_post( $before_widget );
    $title 			= empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$name 		= $instance['name'];
	$link 			= $instance['link'];
	//$date = $instance['show_date'];
 
    if (!empty($title))
      //echo wp_kses_post( $before_title ) . sanitize_text_field( $title ) . wp_kses_post( $after_title );
 
  	echo'<div class="jx-rebuild-section-title-2">
                            <div class="jx-rebuild-title jx-rebuild-uppercase small-text">'.esc_attr( $title ).'</div>
                            <div class="jx-rebuild-seperator-hr"></div>
                        </div>
                        <!-- Section title -->
                        <div class="jx-rebuild-button">
                            <div class="jx-rebuild-big-iconed-button"><a href="'.esc_url($link).'"><i class="fa fa-file-pdf-o"></i>'.esc_attr( $name ).'</a></div>                
                        </div>';	 
 
    echo wp_kses_post($after_widget);
  }
  
 
}
// Add Widget
function widget_rebuild_download_init() {
	register_widget('widget_rebuild_download');
}
add_action('widgets_init', 'widget_rebuild_download_init');
?>
