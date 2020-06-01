<?php 
	/* Mark  ---------------------------------------------*/
	add_shortcode('mark', 'rebuild_mark');
	function rebuild_mark($atts, $content = null) { 
		extract(shortcode_atts(array(
		'color_style' => '', 
		), $atts)); 
		
		//initial variables
		$out=''; 
		//function code
		
		$out ='
		 <mark class="'.$color_style.'">' .do_shortcode($content). '</mark>
		'; 
		//return output
		return $out;
	}
?>