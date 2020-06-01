<?php 
	/* Eight Columns  ---------------------------------------------*/
	
	add_shortcode('one_eight', 'rebuild_one_eight');
	
	function rebuild_one_eight($atts, $content = null) { 
		extract(shortcode_atts(array(
		'margin' =>'',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
			
			$out ='
			<div class="eight columns '.$margin.'">
				'.do_shortcode($content).'
			</div>
			';
			
		//return output
		return $out;
	}
	/* Four Columns  ---------------------------------------------*/
	
	add_shortcode('one_fourth', 'rebuild_one_fourth');
	
	function rebuild_one_fourth($atts, $content = null) { 
		extract(shortcode_atts(array(
			'margin' =>'',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
			
			$out ='
			<div class="four columns '.$margin.'">
				'.do_shortcode($content).'
			</div>
			';
			
		//return output
		return $out;
	}
	/* Four Columns  ---------------------------------------------*/
	
	add_shortcode('one_third', 'rebuild_one_third');
	
	function rebuild_one_third($atts, $content = null) { 
		extract(shortcode_atts(array(
			'margin' =>'',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
			
			$out ='
			<div class="one-third columns '.$margin.'">
				'.do_shortcode($content).'
			</div>
			';
			
		//return output
		return $out;
	}
	
	
	
	/* Two Thirds Columns  ---------------------------------------------*/
	
	add_shortcode('two_thirds', 'rebuild_two_thirds');
	
	function rebuild_two_thirds($atts, $content = null) { 
		extract(shortcode_atts(array(
			'margin' =>'',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
			
			$out ='
			<div class="ten columns  '.$margin.'">
				'.do_shortcode($content).'
			</div>
			';
			
		//return output
		return $out;
	}
	/* Two Thirds Columns  ---------------------------------------------*/
	
	add_shortcode('three_fourths', 'rebuild_three_fourths');
	
	function rebuild_three_fourths($atts, $content = null) { 
		extract(shortcode_atts(array(
			'margin' =>'',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
			
			$out ='
			<div class="twelve columns  '.$margin.'">
				'.do_shortcode($content).'
			</div>
			';
			
		//return output
		return $out;
	}
	
	
	
	/* One Six Columns  ---------------------------------------------*/
	
	add_shortcode('one_six', 'rebuild_one_six');
	
	function rebuild_one_six($atts, $content = null) { 
		extract(shortcode_atts(array(
			'margin' =>'',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
			
			$out ='
			<div class="six columns '.$margin.'">
				'.do_shortcode($content).'
			</div>
			';
			
		//return output
		return $out;
	}
	/* One Five Columns  ---------------------------------------------*/
	
	add_shortcode('one_five', 'rebuild_one_five');
	
	function rebuild_one_five($atts, $content = null) { 
		extract(shortcode_atts(array(
			'margin' =>'',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
			
			$out ='
			<div class="five columns '.$margin.'">
				'.do_shortcode($content).'
			</div>
			';
			
		//return output
		return $out;
	}
	/* One Eleven Columns  ---------------------------------------------*/
	
	add_shortcode('one_eleven', 'rebuild_one_eleven');
	
	function rebuild_one_eleven($atts, $content = null) { 
		extract(shortcode_atts(array(
			'margin' =>'',
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		
		//function code
			
			$out ='
			<div class="eleven columns '.$margin.'">
				'.do_shortcode($content).'
			</div>
			';
			
		//return output
		return $out;
	}
	
	/*row*/
	
	add_shortcode('row', 'rebuild_row');
	
	function rebuild_row($atts, $content = null) { 
		extract(shortcode_atts(array(
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		$out ='<div class="row"></div>';
		
		//return output
		return $out;
	}
	
	add_shortcode('clearfix', 'rebuild_clearfix');
	
	function rebuild_clearfix($atts, $content = null) { 
		extract(shortcode_atts(array(
		), $atts));		 
		
		//initial variables
		$out=''; 
		
		//function code
		$out ='<div class="clearfix"></div>';
		
		//return output
		return $out;
	}
?>