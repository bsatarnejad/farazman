<?php
/*
Plugin Name: Video Widget
Plugin URI: http://janxcode.com/
Description: janxcode Video Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_rebuild_video extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_rebuild_video', 'description' => 'Video','category_id','show_date' );
    parent::__construct('widget_rebuild_video', esc_html__('ReBuild Video','rebuild'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	$instance = wp_parse_args( (array) $instance, array('title' => 'Video', 'video_url' => '') );
 
	$title 			= esc_attr($instance['title']);
	$video_url 		= $instance['video_url'];
	
	?>
            	<p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
                   <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
     		
            	<p>
                    <label for="<?php echo esc_attr($this->get_field_id('video_url')); ?>">Address:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('video_url')); ?>" name="<?php echo esc_attr($this->get_field_name('video_url')); ?>" type="text" value="<?php echo esc_attr( $video_url ); ?>" />    
                </p>
            	
    <?php
    }
 
    function update($new_instance, $old_instance) {
	
	$instance	=	$old_instance;
	
	$instance['title']			=$new_instance['title'];
	$instance['video_url']		=$new_instance['video_url'];
	
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
 	
	global $wp_embed;
	
	
    echo wp_kses_post( $before_widget );
    $title 			= empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$video_url 		= $instance['video_url'];
	//$date = $instance['show_date'];
 
    if (!empty($title))
      echo wp_kses_post( $before_title ) . sanitize_text_field( $title ) . wp_kses_post( $after_title );
 
  	$post_embed = $wp_embed->run_shortcode('[embed width="280" height="160"]'.esc_url($video_url).'[/embed]');
	
	echo $post_embed;
 
    echo wp_kses_post($after_widget);
  }
  
 
}
// Add Widget
function widget_rebuild_video_init() {
	register_widget('widget_rebuild_video');
}
add_action('widgets_init', 'widget_rebuild_video_init');
?>
