<?php 
	/* Container  ---------------------------------------------*/
	
	add_shortcode('container', 'rebuild_container');
	
	function rebuild_container($atts, $content = null) { 
		extract(shortcode_atts(array(
			'bg_color' => '',
			'bg_image' => '',
			'bg_image_pos' => '',
			'class' => '',
			'tint' => '',
			'id' => '',
			'badge_title' => '',
			'container_class' => '',
			'bg_left_shape' => '',
			'bg_right_shape'=> '',
			'parallax'=> ''
			
		), $atts)); 
		 
		
		//initial variables
		$out='';
		$container_padding ='';
		$sub_container_padding ='';
		$parallax_class='';		
		$background_color ="";
		$bg_image_pos_class='';
		
		if($bg_color =="white") {
			$background_color ="jx-rebuild-white-bg";
		} elseif ($bg_color =="grey") {
			$background_color ="jx-rebuild-grey-bg";
		} elseif ($bg_color =="darkgrey") {
			$background_color ="jx-rebuild-darkgrey-bg";
		} elseif ($bg_color =="default") {
			$background_color ="jx-rebuild-default-bg";
		}
		
		if ($parallax){
			$parallax_class="parallax";
		}else{
			$parallax_class="parallax-no";
		}
		
		
		
		if($bg_image_pos =="top") {
			$bg_image_pos_class ="bg-pos-top";
		} else if($bg_image_pos =="center") {
			$bg_image_pos_class ="bg-pos-middle";
		} else if($bg_image_pos =="bottom") {
			$bg_image_pos_class ="bg-pos-bottom";
		}
		
		if($bg_image =="") {
			$parallax_image ="";
		} else {
			$parallax_image ="<div class='".$parallax_class.' '.$tint.' '.$bg_image_pos_class."' style='background-image: url(".$bg_image.");'></div>";
		}
		
		if($badge_title =="") {
			$container_badge_title ="";
			$container_badge_class ="";
			$container_padding=$class;
			
		} else {
			$container_badge_title ="
				<div class='jx-rebuild-row-badge'>
					<div class='jx-rebuild-badge-text'>$badge_title</div>
					<div class='jx-rebuild-badge-shape'></div>
				</div>
			";
			$container_badge_class ="jx-rebuild-container-badge";
			$sub_container_padding=$class;
		}
		
		$left_shape="";
		
		if($bg_left_shape =="no") {
			$left_shape ="";
		} elseif($bg_left_shape =="yes") {
			$left_shape ="<div class='jx-rebuild-shape-left jx-rebuild-shape-small'></div>";
		}
		
		$right_shape ="";
		
		if($bg_right_shape =="no") {
			$right_shape ="";
		} elseif($bg_right_shape =="yes") {
			$right_shape ="<div class='jx-rebuild-shape-right jx-rebuild-shape-small'></div>";
		}
		
		
		if ($id=''):
			$id_value='id='.$id;
		else:
			$id_value='';
		endif;
		
		//function code
			
			$out ='
			<div '.$id_value.' class="jx-rebuild-container '.$background_color.' '.$container_padding.' '.$container_badge_class.'">
				'.$parallax_image.'
				<!-- Background Image -->
				
				'.$container_badge_title.'				
				<!-- Badge Title -->
				
				'.$left_shape.''.$right_shape.'            
				<!-- Background Shape -->
			<div class="container '.$container_class.' '.$sub_container_padding.'">'.do_shortcode($content).'</div>
			</div>
			';
			
		//return output
		return $out;
	}
?>