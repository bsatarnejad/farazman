<?php 
/* Grid Image  ---------------------------------------------*/
	
	add_shortcode('gridimage_group', 'rebuild_gridimage_group');
	
	function rebuild_gridimage_group($atts, $content = null) { 
		extract(shortcode_atts(array(
				), $atts)); 
		 
		 
		//initial variables
	
		$out='';
			
		//function code
		
		$out .='<div class="jx-rebuild-grid"><ul>'.do_shortcode($content).'</ul></div>';
		
		return $out;
	}
	
	
	
	add_shortcode('gridimage', 'rebuild_gridimage');
	
	function rebuild_gridimage($atts, $content = null) { 
		extract(shortcode_atts(array(
				'image' =>'',
				'title' =>'',
				'link' =>'',
				), $atts)); 
		 
		 
		//initial variables
	
		$out='';
			
		//function code
		
		$out .='<li><a href="'.$link.'"><img src="'.$image.'" alt=""></a>
				<a href="'.$link.'"><div class="title">'.$title.'</div></a>
		</li>';
		
		return $out;
	}
	
	
    
    ?>