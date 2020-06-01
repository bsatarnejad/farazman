<?php
/*
Plugin Name: Quote Request Widget
Plugin URI: http://janxcode.com/
Description: janxcode Quote Request Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_rebuild_qrequest extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_rebuild_qrequest', 'description' => 'درخواست تماس','category_id','show_date' );
    parent::__construct('widget_rebuild_qrequest', esc_html__('اطلاعات تماس شما','rebuild'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	$instance = wp_parse_args( (array) $instance, array('title' => 'اطلاعات تماس', 'description' => '', 'tel' => '', 'link' => '', 'type' => '') );
 
	$title 			= esc_attr($instance['title']);
	$tel 			= $instance['tel'];
	$description 			= $instance['description'];
	$link 			= $instance['link'];
	$type 			= $instance['type'];
	
	?>
            	<p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان:</label>
                   <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                
                <p>
                <label for="<?php echo esc_attr($this->get_field_id('description')); ?>">توضیح مختصر:</label>
                   <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
                </p>
     		
            	<p>
                    <label for="<?php echo esc_attr($this->get_field_id('tel')); ?>">شماره تماس: (استایل اول و سوم)</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tel')); ?>" name="<?php echo esc_attr($this->get_field_name('tel')); ?>" type="text" value="<?php echo esc_attr( $tel ); ?>" />    
                </p>
                
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('link')); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />    
                </p>
                
                <p>
                <select id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>" class="widefat" style="width:100%;">
                    <option <?php selected( $instance['type'], '1'); ?> value="1">Style A</option>
                    <option <?php selected( $instance['type'], '2'); ?> value="2">Style B</option>
                    <option <?php selected( $instance['type'], '3'); ?> value="3">Style C</option> 
                </select>
                
                </p>
            
            	               
 
    <?php
    }
 
    function update($new_instance, $old_instance) {
	
	$instance	=	$old_instance;	
	$instance['title']			=$new_instance['title'];
	$instance['description']			=$new_instance['description'];
	$instance['tel']			=$new_instance['tel'];
	$instance['link']			=$new_instance['link'];
	$instance['type']			=$new_instance['type'];
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
	
    echo wp_kses_post( $before_widget );
    $title 				= empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$tel 				= $instance['tel'];
	$type 				= $instance['type'];	
	$link 				= $instance['link'];
	
	if(!empty($instance['description'])):
		$description 	= $instance['description'];
	endif;
	
    if (!empty($title))
      //echo wp_kses_post( $before_title ) . sanitize_text_field( $title ) . wp_kses_post( $after_title );
 
  	switch($type){
	
	case 1:
	echo '<div class="jx-rebuild-widget-request-quote">                            
			<div class="title">'.esc_html('اطلاعات تماس','rebuild').'</div>
			<div class="number">'.esc_attr( $tel ).'</div>
				<div class="jx-rebuild-left-border"></div>
					<div class="or">'.esc_html('یا','rebuild').'</div>
				<div class="jx-rebuild-right-border"></div>
			<div class="jx-rebuild-quote-button">
				<div class="jx-rebuild-big-iconed-button"><a href="'.esc_url($link).'">'.esc_html('ثبت درخواست','rebuild').'</a></div>                
			</div>			
		</div>';
	break;
	
	case 2:
		
	echo '<div class="jx-rebuild-quote-rquest">
			   <div class="jx-rebuild-title"><i class="line-icon icon-money"></i>'.esc_html('درخواست تماس','rebuild').'</div>
			   <p>'.esc_attr( $description ).'</p>
			   <div class="jx-rebuild-quote-button">
				   <div class="jx-rebuild-big-iconed-button"><a href="'.esc_url($link).'">'.esc_html('ثبت درخواست','rebuild').'</a></div>                
			   </div>            
		</div>
			';	
    break;
	
	case 3:
	echo '<div class="jx-rebuild-widget-request-quote jx-rebuild-smaller">                            
			<div class="title">'.esc_html('ارسال درخواست','rebuild').'</div>
			<div class="number">'.esc_attr( $tel ).'</div>
				<div class="jx-rebuild-left-border"></div>
					<div class="or">'.esc_html('یا','rebuild').'</div>
				<div class="jx-rebuild-right-border"></div>
			<div class="jx-rebuild-quote-button">
				<div class="jx-rebuild-big-iconed-button"><a href="'.esc_url($link).'">'.esc_html('ثبت درخواست','rebuild').'</a></div>                
			</div>			
		</div>';
	break;
	
	}
    echo wp_kses_post($after_widget);
  }
  
 
}
// Add Widget
function widget_rebuild_qrequest_init() {
	register_widget('widget_rebuild_qrequest');
}
add_action('widgets_init', 'widget_rebuild_qrequest_init');
?>
