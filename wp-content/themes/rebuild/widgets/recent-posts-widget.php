<?php
/*
Plugin Name: Recent Post Widget
Plugin URI: http://janxcode.com/
Description: janxcode Recent Post Widget 
Author: janXcode
Version: 1
Author URI: http://janxcode.com/
*/
class widget_recentpost extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_recentpost', 'description' => 'Displays Latest Posts','category_id','show_date' );
    parent::__construct('widget_recentpost', esc_html__('ReBuild Recent Posts','rebuild'), $widget_ops);
  }
 
 
 
 //Form
  function form($instance) {
	
	$instance = wp_parse_args( (array) $instance, array('title' => 'Recent Posts', 'number' => 5, 'categ_id' => '','btn' => '') );
 
	$title = esc_attr($instance['title']);
	$categ_id = $instance['categ_id'];
	$number = absint($instance['number']);
	$btn = $instance['btn'];
	
	?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                   Title:
                </label>
                        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
     		
            	 <p>
                    <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
                       Number of Photos:
                    </label>
                        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
                </p>
 
     
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('categ_id')); ?>">
                       Category ID:
                    </label>
                        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('categ_id')); ?>" name="<?php echo esc_attr($this->get_field_name('categ_id')); ?>" type="text" value="<?php echo esc_attr( $categ_id ); ?>" />
     
                </p>
                
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id('btn')); ?>">
                       Show Button:
                    </label>
                        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn')); ?>" name="<?php echo esc_attr($this->get_field_name('btn')); ?>" type="checkbox" value="1" <?php checked( '1',$btn); ?>" />
     
                </p>
     
                <p>   
               
 
    <?php
    }
 
    function update($new_instance, $old_instance) {
	
	$instance=$old_instance;
 
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['categ_id']=$new_instance['categ_id'];
	$instance['number']=$new_instance['number'];
	$instance['btn']=strip_tags($new_instance['btn']);
	return $instance;
    }
  
  
  //Output
 function widget($args, $instance)
  {
    extract($args);
 	
    echo wp_kses_post( $before_widget );
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$posts_count = $instance['number'];
	$category = $instance['categ_id'];
	$btn = $instance['btn'];
	//$date = $instance['show_date'];
 
    if (!empty($title))
      echo wp_kses_post( $before_title ) . sanitize_text_field( $title ) . wp_kses_post( $after_title );
 
  		 echo '<div class="jx-rebuild-widget-recent-post"><ul>';
		   if ($category):
				query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'posts_per_page' => $posts_count,'cat' => $category));
			else:
				query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'posts_per_page' => $posts_count));
			endif;
		$i=0;
		
		   if (have_posts()) :
			  while (have_posts()) : the_post();
			  
			  if ($category):
			   $cats = get_the_category();
			   $cat_name = $cats[0]->name;
			  endif;
			  
				echo'<li>
						<div class="image">'.get_the_post_thumbnail (get_the_ID(),'rebuild_small-thumbnail').'</div>
						<div class="post-content">
						<div class="title"><a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a></div>
						<div class="date">'.get_the_time('F j, Y').'</div>
					</div>
				</li>';	
				$i++;
			  endwhile;
			  wp_reset_postdata();
		   
		   endif;
		   echo '</ul>';
		   
		   if( $btn AND $btn == '1' ) :
		   echo'
		   <div class="jx-rebuild-btn jx-rebuild-black"> 
				<a href="'.esc_url(home_url('/blog')).'" class="jx-rebuild-btn-default">
						'.esc_html__('Read More','rebuild').'
				</a>
			</div>';
		   endif;		   
		   
		   echo'</div>';
		   
 
    echo wp_kses_post($after_widget);
  }
  
 
}
// Add Widget
function widget_recentpost_init() {
	register_widget('widget_recentpost');
}
add_action('widgets_init', 'widget_recentpost_init');
?>
