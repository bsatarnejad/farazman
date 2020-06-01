<?php 
	/* Subscribe  ---------------------------------------------*/
	
	add_shortcode('map', 'rebuild_map');
	
	function rebuild_map($atts, $content = null) { 
		extract(shortcode_atts(array(
			"lat" =>"40.6700",
			"lng" =>"-73.9400",
			"height" =>"400px",
			"marker_image"=>'',
			"google_map_style"=>'ROADMAP',
			"zoom_option"=>'9'
		
		), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		$map_id= 'map-'.rand(0,1000);
		
		//function code
	
			$out ='
			<div class="jx-rebuild-container">
				<div class="container"></div>
				<div class="jx-rebuild-google-map">
					<div id="'.$map_id.'" class="jx-rebuild-map" style="height:'.$height.';"></div>
				</div>
			</div>
			';
			$out.='
			<script type="text/javascript">
				// When the window has finished loading create our google map below
				google.maps.event.addDomListener(window, "load", init);
			
				function init() {
					// Basic options for a simple Google Map
					// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
					var mapOptions = {
						scrollwheel: false,
						// How zoomed in you want the map to start at (always required)
						zoom: '.$zoom_option.',
						// The latitude and longitude to center the map (always required)
						center: new google.maps.LatLng('.$lat.', '.$lng.'), // New York
						// How you would like to style the map. 
						mapTypeId: google.maps.MapTypeId.'.$google_map_style.',
						// This is where you would paste any style found on Snazzy Maps.
						styles: [{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#f49935"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#fad959"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#a1cdfc"},{"saturation":30},{"lightness":49}]}]
					};
					// Get the HTML DOM element that will contain your map 
					// We are using a div with id="map" seen below in the <body>
			
					var mapElement = document.getElementById("'.$map_id.'");
					// Create the Google Map using our element and options defined above
					var map = new google.maps.Map(mapElement, mapOptions);
					// Lets also add a marker while were at it
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng('.$lat.', '.$lng.'),
						map: map,
						title: "BUXCORP"
					});
				}
			</script>
			';
		//return output
		return $out;
	}
	//Visual Composer
	add_action( 'vc_before_init', 'vc_rebuild_map' );
	
	function vc_rebuild_map() {	
		vc_map(array(
		  "name" => esc_html__( "Google Map", "TEXT_DOMAIN" ),
		  "base" => "map",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_map.png',
		  "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
		  "description" => __('افزودن نقشه','TEXT_DOMAIN'),
		  "params" => array(
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("Select Your Google Map Style",'TEXT_DOMAIN'),
				 "param_name" => "google_map_style",
				 "value" => array(   
					__('Select Style', 'TEXT_DOMAIN') => 'none',
					__('ROADMAP', 'TEXT_DOMAIN') => 'ROADMAP',
					__('SATELLITE', 'TEXT_DOMAIN') => 'SATELLITE',
					__('HYBRID', 'TEXT_DOMAIN') => 'HYBRID',
					__('TERRAIN', 'TEXT_DOMAIN') => 'TERRAIN',
						),
			),
			
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("Select Your Google Map Zoom",'TEXT_DOMAIN'),
				 "param_name" => "zoom_option",
				 "value" => array(   
					__('Set Zoom Value', 'TEXT_DOMAIN') => 'Select Your Zoom',
					__('1', 'TEXT_DOMAIN') => '1',
					__('2', 'TEXT_DOMAIN') => '2',
					__('3', 'TEXT_DOMAIN') => '3',
					__('4', 'TEXT_DOMAIN') => '4',
					__('5', 'TEXT_DOMAIN') => '5',
					__('6', 'TEXT_DOMAIN') => '6',
					__('7', 'TEXT_DOMAIN') => '7',
					__('8', 'TEXT_DOMAIN') => '8',
					__('9', 'TEXT_DOMAIN') => '9',
					__('10', 'TEXT_DOMAIN') => '10',
					__('11', 'TEXT_DOMAIN') => '11',
					__('12', 'TEXT_DOMAIN') => '12',
					__('13', 'TEXT_DOMAIN') => '13',
					__('14', 'TEXT_DOMAIN') => '14',
					__('15', 'TEXT_DOMAIN') => '15',
					__('16', 'TEXT_DOMAIN') => '16',
					__('17', 'TEXT_DOMAIN') => '17',
					__('18', 'TEXT_DOMAIN') => '18',
					__('19', 'TEXT_DOMAIN') => '19',
						),
			),
			
					 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Lat", "TEXT_DOMAIN" ),
				"param_name" => "lat",
				"value" => "40.6700", 
				"description" => esc_html__( "افزودن lat", "TEXT_DOMAIN" )
			 ),	
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "lng", "TEXT_DOMAIN" ),
				"param_name" => "lng",
				"value" => "-73.9400",
				"description" => esc_html__( "افزودن lng", "TEXT_DOMAIN" )
			 ),
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "ارتفاع", "TEXT_DOMAIN" ),
				"param_name" => "height",
				"value" => "400px", 
				"description" => esc_html__( "تنظیم ارتفاع نقشه", "TEXT_DOMAIN" )
			 )
	
			 
		  )
	   )); 
	}
?>