<?php
/*
Plugin Name: Subscribe Widget
Plugin URI: http://janxcode.com/
Description: janxcode Subscribe Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_rebuild_subscribe extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_rebuild_subscribe', 'description' => 'subscribe','category_id','show_date' );
    parent::__construct('widget_rebuild_subscribe', esc_html__('ReBuild subscribe','rebuild'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	$instance = wp_parse_args( (array) $instance, array('title' => 'subscribe','intro_text' => '', 'subscribe_url' => '') );
 
	$title 						= esc_attr($instance['title']);
	$intro_text					= esc_attr($new_instance['intro_text']);
	$subscribe_url 				= $instance['subscribe_url'];
	
	?>
            	<p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
                   <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
     		
            	<p>
                    <label for="<?php echo esc_attr($this->get_field_id('intro_text')); ?>">Intro Text:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('intro_text')); ?>" name="<?php echo esc_attr($this->get_field_name('intro_text')); ?>" type="text" value="<?php echo esc_attr( $intro_text ); ?>" />    
                </p>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('subscribe_url')); ?>">Subscribe Url:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('subscribe_url')); ?>" name="<?php echo esc_attr($this->get_field_name('subscribe_url')); ?>" type="text" value="<?php echo esc_attr( $subscribe_url ); ?>" />    
                </p>
            	
    <?php
    }
 
    function update($new_instance, $old_instance) {
	
	$instance	=	$old_instance;
	
	$instance['title']			=$new_instance['title'];
	$instance['intro_text']		=$new_instance['intro_text'];
	$instance['subscribe_url']		=$new_instance['subscribe_url'];
	
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
 	
	global $wp_embed;
	
	
    echo wp_kses_post( $before_widget );
    $title 				= empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$subscribe_url 		= $instance['subscribe_url'];
	$intro_text 		= $instance['intro_text'];
 
    
 
		echo '<div class="jx-rebuild-widget-newsletter" id="mailchimp-sign-up">';
				
		if (!empty($title)){
		  echo wp_kses_post( $before_title ) . sanitize_text_field( $title ) . wp_kses_post( $after_title );	
		}
		echo' <!-- widget Title -->                         
				<p>'.esc_attr( $intro_text ).'</p>                             
			
				<form action="#" method="post" id="mailchimp" name="mc-embedded-subscribe-form" target="_blank" novalidate class="jx-rebuild-form-wrapper">                       
					<span class="ajax-loader"></span>									
					<div class="jx-rebuild-newsletter-box">
					<input type="email" name="email" placeholder="'.esc_html__('Email','rebuild').'" value="" data-validation="email" data-validation="required"/>
					</div>
					<div class="jx-rebuild-newsletter-submit" id="newsletter-submit">
					<button type="submit" name="subscribe" id="mc-embedded-subscribe" ><i class="fa fa-envelope-o"></i></button>
					</div>                    
				</form>		
				
				
				
			 </div>';
 
    echo wp_kses_post($after_widget);
  }
  
 
}
// Add Widget
function widget_rebuild_subscribe_init() {
	register_widget('widget_rebuild_subscribe');
}
add_action('widgets_init', 'widget_rebuild_subscribe_init');
?>
