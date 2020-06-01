<?php
/*
Plugin Name: Contact Widget
Plugin URI: http://janxcode.com/
Description: janxcode Contact Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_rebuild_contact extends WP_Widget
{
  public function __construct()
  {
    $widget_ops = array('classname' => 'widget_rebuild_contact', 'description' => 'Contact Info','category_id','show_date' );
    parent::__construct('widget_rebuild_contact', esc_html__('ReBuild Contacts','rebuild'), $widget_ops);
  }
 
 
 
 //Form
  public function form($instance) {
	$instance = wp_parse_args( (array) $instance, array('title' => 'Office Contacts', 'tel' => '', 'fax' => '', 'address' => '', 'email_info' => '') );
 
	$title 			= esc_attr($instance['title']);
	$tel 			= $instance['tel'];
	$fax 			= $instance['fax'];
	$address 		= $instance['address'];
	$email_info 	= $instance['email_info'];
	
	?>
            	<p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
                   <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
     		
            	<p>
                    <label for="<?php echo esc_attr($this->get_field_id('address')); ?>">Address:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />    
                </p>
            
            	<p>
                    <label for="<?php echo esc_attr($this->get_field_id('tel')); ?>">Tel:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tel')); ?>" name="<?php echo esc_attr($this->get_field_name('tel')); ?>" type="text" value="<?php echo esc_attr( $tel ); ?>" />
                </p>
                
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('fax')); ?>">Fax:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fax')); ?>" name="<?php echo esc_attr($this->get_field_name('fax')); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>" />
                </p>
 
     
                
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('email_info')); ?>">Email:</label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_info')); ?>" name="<?php echo esc_attr($this->get_field_name('email_info')); ?>" type="text" value="<?php echo esc_attr( $email_info ); ?>" />
     
                </p>
               
 
    <?php
    }
 
    public function update($new_instance, $old_instance) {
	
	$instance	=	$old_instance;
	
	$instance['title']			=$new_instance['title'];
	$instance['tel']			=$new_instance['tel'];
	$instance['fax']			=$new_instance['fax'];
	$instance['address']		=$new_instance['address'];
	$instance['email_info']		=$new_instance['email_info'];	
	return $instance;
    }
  
  
  //Output
  public function widget($args, $instance)
  {
    extract($args);	
	
    echo wp_kses_post( $before_widget );
    $title 			= empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$address 		= $instance['address'];
	$tel 			= $instance['tel'];
	$fax 			= $instance['fax'];
	$email_info	= $instance['email_info'];	
	//$date = $instance['show_date'];
 
    if (!empty($title))
      echo wp_kses_post( $before_title ) . sanitize_text_field( $title ) . wp_kses_post( $after_title );
 
  	echo'<div class="jx-rebuild-sidebar-address">
			<ul>
				<li>
				<i class="line-icon vc_li vc_li-location"></i>
				<div>'.esc_attr( $address ).'</div>
				</li>
				<li>
				<i class="line-icon vc_li vc_li-phone"></i>
				<div class="tel"><strong>'.esc_html__('Tel','rebuild').' :</strong>  '.esc_attr( $tel ).'</div>
				<div class="fax"><strong>'.esc_html__('Fax','rebuild').' :</strong> '.esc_attr( $fax ).'</div>
				</li>
				<li>
				<i class="line-icon vc_li vc_li-world"></i>
				<div class="email"><strong>'. esc_html__('Email','rebuild').' :</strong> '.esc_attr( $email_info ).'</div>
				</li>
			</ul>
		</div>';	 
 
    echo wp_kses_post($after_widget);
  }
  
 
}
// Add Widget
function widget_rebuild_contact_init() {
	register_widget('widget_rebuild_contact');
}
add_action('widgets_init', 'widget_rebuild_contact_init');
?>
