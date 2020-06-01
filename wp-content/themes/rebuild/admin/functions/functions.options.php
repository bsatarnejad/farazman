<?php
add_action('init','of_options');
if (!function_exists('of_options'))
{
	function of_options()
	{
		
       
		
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "یک دسته را انتخاب کنید:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "یک برگه را انتخاب کنید:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "یک","two" => "دو","three" => "سه","four" => "چهار","five" => "پنج");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "بلوک اول",
				"block_two"		=> "بلوک دوم",
				"block_three"	=> "بلوک سوم",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "بلوک چهارم",
			),
		);
		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}
		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		
		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("یک عدد انتخاب کنید:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "چپ","alignright" => "راست","aligncenter" => "مرکز"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "تصویر","post" => "نوشته"); 
		$list_of_google_fonts = array(
					"0" => "یک فونت انتخاب کنید",
					"ABeeZee" => "ABeeZee",
					"Abel" => "Abel",
					"Abril Fatface" => "Abril Fatface",
					"Aclonica" => "Aclonica",
					"Acme" => "Acme",
					"Actor" => "Actor",
					"Adamina" => "Adamina",
					"Advent Pro" => "Advent Pro",
					"Aguafina Script" => "Aguafina Script",
					"Akronim" => "Akronim",
					"Aladin" => "Aladin",
					"Aldrich" => "Aldrich",
					"Alef" => "Alef",
					"Alegreya" => "Alegreya",
					"Alegreya SC" => "Alegreya SC",
					"Alegreya Sans" => "Alegreya Sans",
					"Alegreya Sans SC" => "Alegreya Sans SC",
					"Alex Brush" => "Alex Brush",
					"Alfa Slab One" => "Alfa Slab One",
					"Alice" => "Alice",
					"Alike" => "Alike",
					"Alike Angular" => "Alike Angular",
					"Allan" => "Allan",
					"Allerta" => "Allerta",
					"Allerta Stencil" => "Allerta Stencil",
					"Allura" => "Allura",
					"Almendra" => "Almendra",
					"Almendra Display" => "Almendra Display",
					"Almendra SC" => "Almendra SC",
					"Amarante" => "Amarante",
					"Amaranth" => "Amaranth",
					"Amatic SC" => "Amatic SC",
					"Amethysta" => "Amethysta",
					"Anaheim" => "Anaheim",
					"Andada" => "Andada",
					"Andika" => "Andika",
					"Angkor" => "Angkor",
					"Annie Use Your Telescope" => "Annie Use Your Telescope",
					"Anonymous Pro" => "Anonymous Pro",
					"Antic" => "Antic",
					"Antic Didone" => "Antic Didone",
					"Antic Slab" => "Antic Slab",
					"Anton" => "Anton",
					"Arapey" => "Arapey",
					"Arbutus" => "Arbutus",
					"Arbutus Slab" => "Arbutus Slab",
					"Architects Daughter" => "Architects Daughter",
					"Archivo Black" => "Archivo Black",
					"Archivo Narrow" => "Archivo Narrow",
					"Arimo" => "Arimo",
					"Arizonia" => "Arizonia",
					"Armata" => "Armata",
					"Artifika" => "Artifika",
					"Arvo" => "Arvo",
					"Asap" => "Asap",
					"Asset" => "Asset",
					"Astloch" => "Astloch",
					"Asul" => "Asul",
					"Atomic Age" => "Atomic Age",
					"Aubrey" => "Aubrey",
					"Audiowide" => "Audiowide",
					"Autour One" => "Autour One",
					"Average" => "Average",
					"Average Sans" => "Average Sans",
					"Averia Gruesa Libre" => "Averia Gruesa Libre",
					"Averia Libre" => "Averia Libre",
					"Averia Sans Libre" => "Averia Sans Libre",
					"Averia Serif Libre" => "Averia Serif Libre",
					"Bad Script" => "Bad Script",
					"Balthazar" => "Balthazar",
					"Bangers" => "Bangers",
					"Basic" => "Basic",
					"Battambang" => "Battambang",
					"Baumans" => "Baumans",
					"Bayon" => "Bayon",
					"Belgrano" => "Belgrano",
					"Belleza" => "Belleza",
					"BenchNine" => "BenchNine",
					"Bentham" => "Bentham",
					"Berkshire Swash" => "Berkshire Swash",
					"Bevan" => "Bevan",
					"Bigelow Rules" => "Bigelow Rules",
					"Bigshot One" => "Bigshot One",
					"Bilbo" => "Bilbo",
					"Bilbo Swash Caps" => "Bilbo Swash Caps",
					"Bitter" => "Bitter",
					"Black Ops One" => "Black Ops One",
					"Bokor" => "Bokor",
					"Bonbon" => "Bonbon",
					"Boogaloo" => "Boogaloo",
					"Bowlby One" => "Bowlby One",
					"Bowlby One SC" => "Bowlby One SC",
					"Brawler" => "Brawler",
					"Bree Serif" => "Bree Serif",
					"Bubblegum Sans" => "Bubblegum Sans",
					"Bubbler One" => "Bubbler One",
					"Buda" => "Buda",
					"Buenard" => "Buenard",		
					"Butcherman" => "Butcherman",
					"Butterfly Kids" => "Butterfly Kids",
					"Cabin" => "Cabin",
					"Cabin Condensed" => "Cabin Condensed",
					"Cabin Sketch" => "Cabin Sketch",
					"Caesar Dressing" => "Caesar Dressing",
					"Cagliostro" => "Cagliostro",
					"Calligraffitti" => "Calligraffitti",
					"Cambo" => "Cambo",
					"Candal" => "Candal",
					"Cantarell" => "Cantarell",
					"Cantata One" => "Cantata One",
					"Cantora One" => "Cantora One",
					"Capriola" => "Capriola",
					"Cardo" => "Cardo",
					"Carme" => "Carme",
					"Carrois Gothic" => "Carrois Gothic",
					"Carrois Gothic SC" => "Carrois Gothic SC",
					"Carter One" => "Carter One",
					"Caudex" => "Caudex",
					"Cedarville Cursive" => "Cedarville Cursive",
					"Ceviche One" => "Ceviche One",
					"Changa One" => "Changa One",
					"Chango" => "Chango",
					"Chau Philomene One" => "Chau Philomene One",
					"Chela One" => "Chela One",
					"Chelsea Market" => "Chelsea Market",
					"Chenla" => "Chenla",
					"Cherry Cream Soda" => "Cherry Cream Soda",
					"Cherry Swash" => "Cherry Swash",
					"Chewy" => "Chewy",
					"Chicle" => "Chicle",
					"Chivo" => "Chivo",
					"Cinzel" => "Cinzel",
					"Cinzel Decorative" => "Cinzel Decorative",
					"Clicker Script" => "Clicker Script",
					"Coda" => "Coda",
					"Coda Caption" => "Coda Caption",
					"Codystar" => "Codystar",
					"Combo" => "Combo",
					"Comfortaa" => "Comfortaa",
					"Coming Soon" => "Coming Soon",
					"Concert One" => "Concert One",
					"Condiment" => "Condiment",
					"Content" => "Content",
					"Contrail One" => "Contrail One",
					"Convergence" => "Convergence",
					"Cookie" => "Cookie",
					"Copse" => "Copse",
					"Corben" => "Corben",
					"Courgette" => "Courgette",
					"Cousine" => "Cousine",
					"Coustard" => "Coustard",
					"Covered By Your Grace" => "Covered By Your Grace",
					"Crafty Girls" => "Crafty Girls",
					"Creepster" => "Creepster",
					"Crete Round" => "Crete Round",
					"Crimson Text" => "Crimson Text",
					"Croissant One" => "Croissant One",
					"Crushed" => "Crushed",
					"Cuprum" => "Cuprum",
					"Cutive" => "Cutive",
					"Cutive Mono" => "Cutive Mono",
					"Damion" => "Damion",
					"Dancing Script" => "Dancing Script",
					"Dangrek" => "Dangrek",
					"Dawning of a New Day" => "Dawning of a New Day",
					"Days One" => "Days One",
					"Delius" => "Delius",
					"Delius Swash Caps" => "Delius Swash Caps",
					"Delius Unicase" => "Delius Unicase",
					"Della Respira" => "Della Respira",
					"Denk One" => "Denk One",
					"Devonshire" => "Devonshire",
					"Didact Gothic" => "Didact Gothic",
					"Diplomata" => "Diplomata",
					"Diplomata SC" => "Diplomata SC",
					"Domine" => "Domine",
					"Donegal One" => "Donegal One",
					"Doppio One" => "Doppio One",
					"Dorsa" => "Dorsa",
					"Dosis" => "Dosis",
					"Dr Sugiyama" => "Dr Sugiyama",
					"Droid Sans" => "Droid Sans",
					"Droid Sans Mono" => "Droid Sans Mono",
					"Droid Serif" => "Droid Serif",
					"Duru Sans" => "Duru Sans",
					"Dynalight" => "Dynalight",
					"EB Garamond" => "EB Garamond",
					"Eagle Lake" => "Eagle Lake",
					"Eater" => "Eater",
					"Economica" => "Economica",
					"Electrolize" => "Electrolize",
					"Elsie" => "Elsie",
					"Elsie Swash Caps" => "Elsie Swash Caps",
					"Emblema One" => "Emblema One",
					"Emilys Candy" => "Emilys Candy",
					"Engagement" => "Engagement",
					"Englebert" => "Englebert",
					"Enriqueta" => "Enriqueta",
					"Erica One" => "Erica One",
					"Esteban" => "Esteban",
					"Euphoria Script" => "Euphoria Script",
					"Ewert" => "Ewert",
					"Exo" => "Exo",
					"Exo 2" => "Exo 2",
					"Expletus Sans" => "Expletus Sans",
					"Fanwood Text" => "Fanwood Text",
					"Fascinate" => "Fascinate",
					"Fascinate Inline" => "Fascinate Inline",
					"Faster One" => "Faster One",
					"Fasthand" => "Fasthand",
					"Fauna One" => "Fauna One",
					"Federant" => "Federant",
					"Federo" => "Federo",
					"Felipa" => "Felipa",
					"Fenix" => "Fenix",
					"Finger Paint" => "Finger Paint",
					"Fjalla One" => "Fjalla One",
					"Fjord One" => "Fjord One",
					"Flamenco" => "Flamenco",
					"Flavors" => "Flavors",
					"Fondamento" => "Fondamento",
					"Fontdiner Swanky" => "Fontdiner Swanky",
					"Forum" => "Forum",
					"Francois One" => "Francois One",
					"Freckle Face" => "Freckle Face",
					"Fredericka the Great" => "Fredericka the Great",
					"Fredoka One" => "Fredoka One",
					"Freehand" => "Freehand",
					"Fresca" => "Fresca",
					"Frijole" => "Frijole",
					"Fruktur" => "Fruktur",
					"Fugaz One" => "Fugaz One",
					"GFS Didot" => "GFS Didot",
					"GFS Neohellenic" => "GFS Neohellenic",
					"Gabriela" => "Gabriela",
					"Gafata" => "Gafata",
					"Galdeano" => "Galdeano",
					"Galindo" => "Galindo",
					"Gentium Basic" => "Gentium Basic",
					"Gentium Book Basic" => "Gentium Book Basic",
					"Geo" => "Geo",
					"Geostar" => "Geostar",
					"Geostar Fill" => "Geostar Fill",
					"Germania One" => "Germania One",
					"Gilda Display" => "Gilda Display",
					"Give You Glory" => "Give You Glory",
					"Glass Antiqua" => "Glass Antiqua",
					"Glegoo" => "Glegoo",
					"Gloria Hallelujah" => "Gloria Hallelujah",
					"Goblin One" => "Goblin One",
					"Gochi Hand" => "Gochi Hand",
					"Gorditas" => "Gorditas",
					"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
					"Graduate" => "Graduate",
					"Grand Hotel" => "Grand Hotel",
					"Gravitas One" => "Gravitas One",
					"Great Vibes" => "Great Vibes",
					"Griffy" => "Griffy",
					"Gruppo" => "Gruppo",
					"Gudea" => "Gudea",
					"Habibi" => "Habibi",
					"Hammersmith One" => "Hammersmith One",
					"Hanalei" => "Hanalei",
					"Hanalei Fill" => "Hanalei Fill",
					"Handlee" => "Handlee",
					"Hanuman" => "Hanuman",
					"Happy Monkey" => "Happy Monkey",
					"Headland One" => "Headland One",
					"Henny Penny" => "Henny Penny",
					"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
					"Holtwood One SC" => "Holtwood One SC",
					"Homemade Apple" => "Homemade Apple",
					"Homenaje" => "Homenaje",
					"IM Fell DW Pica" => "IM Fell DW Pica",
					"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
					"IM Fell Double Pica" => "IM Fell Double Pica",
					"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
					"IM Fell English" => "IM Fell English",
					"IM Fell English SC" => "IM Fell English SC",
					"IM Fell French Canon" => "IM Fell French Canon",
					"IM Fell French Canon SC" => "IM Fell French Canon SC",
					"IM Fell Great Primer" => "IM Fell Great Primer",
					"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
					"Iceberg" => "Iceberg",
					"Iceland" => "Iceland",
					"Imprima" => "Imprima",
					"Inconsolata" => "Inconsolata",
					"Inder" => "Inder",
					"Indie Flower" => "Indie Flower",
					"Inika" => "Inika",
					"Irish Grover" => "Irish Grover",
					"Istok Web" => "Istok Web",
					"Italiana" => "Italiana",
					"Italianno" => "Italianno",
					"Jacques Francois" => "Jacques Francois",
					"Jacques Francois Shadow" => "Jacques Francois Shadow",
					"Jim Nightshade" => "Jim Nightshade",
					"Jockey One" => "Jockey One",
					"Jolly Lodger" => "Jolly Lodger",
					"Josefin Sans" => "Josefin Sans",
					"Josefin Slab" => "Josefin Slab",
					"Joti One" => "Joti One",
					"Judson" => "Judson",
					"Julee" => "Julee",
					"Julius Sans One" => "Julius Sans One",
					"Junge" => "Junge",
					"Jura" => "Jura",
					"Just Another Hand" => "Just Another Hand",
					"Just Me Again Down Here" => "Just Me Again Down Here",
					"Kameron" => "Kameron",
					"Kantumruy" => "Kantumruy",
					"Karla" => "Karla",
					"Kaushan Script" => "Kaushan Script",
					"Kavoon" => "Kavoon",
					"Kdam Thmor" => "Kdam Thmor",
					"Keania One" => "Keania One",
					"Kelly Slab" => "Kelly Slab",
					"Kenia" => "Kenia",
					"Khmer" => "Khmer",
					"Kite One" => "Kite One",
					"Knewave" => "Knewave",
					"Kotta One" => "Kotta One",
					"Koulen" => "Koulen",
					"Kranky" => "Kranky",
					"Kreon" => "Kreon",
					"Kristi" => "Kristi",
					"Krona One" => "Krona One",
					"La Belle Aurore" => "La Belle Aurore",
					"Lancelot" => "Lancelot",
					"Lato" => "Lato",
					"League Script" => "League Script",
					"Leckerli One" => "Leckerli One",
					"Ledger" => "Ledger",
					"Lekton" => "Lekton",
					"Lemon" => "Lemon",
					"Libre Baskerville" => "Libre Baskerville",
					"Life Savers" => "Life Savers",
					"Lilita One" => "Lilita One",
					"Lily Script One" => "Lily Script One",
					"Limelight" => "Limelight",
					"Linden Hill" => "Linden Hill",
					"Lobster" => "Lobster",
					"Lobster Two" => "Lobster Two",
					"Londrina Outline" => "Londrina Outline",
					"Londrina Shadow" => "Londrina Shadow",
					"Londrina Sketch" => "Londrina Sketch",
					"Londrina Solid" => "Londrina Solid",
					"Lora" => "Lora",
					"Love Ya Like A Sister" => "Love Ya Like A Sister",
					"Loved by the King" => "Loved by the King",
					"Lovers Quarrel" => "Lovers Quarrel",
					"Luckiest Guy" => "Luckiest Guy",
					"Lusitana" => "Lusitana",
					"Lustria" => "Lustria",
					"Macondo" => "Macondo",
					"Macondo Swash Caps" => "Macondo Swash Caps",
					"Magra" => "Magra",
					"Maiden Orange" => "Maiden Orange",
					"Mako" => "Mako",
					"Marcellus" => "Marcellus",
					"Marcellus SC" => "Marcellus SC",
					"Marck Script" => "Marck Script",
					"Margarine" => "Margarine",
					"Marko One" => "Marko One",
					"Marmelad" => "Marmelad",
					"Marvel" => "Marvel",
					"Mate" => "Mate",
					"Mate SC" => "Mate SC",
					"Maven Pro" => "Maven Pro",
					"McLaren" => "McLaren",
					"Meddon" => "Meddon",
					"MedievalSharp" => "MedievalSharp",
					"Medula One" => "Medula One",
					"Megrim" => "Megrim",
					"Meie Script" => "Meie Script",
					"Merienda" => "Merienda",
					"Merienda One" => "Merienda One",
					"Merriweather" => "Merriweather",
					"Merriweather Sans" => "Merriweather Sans",
					"Metal" => "Metal",
					"Metal Mania" => "Metal Mania",
					"Metamorphous" => "Metamorphous",
					"Metrophobic" => "Metrophobic",
					"Michroma" => "Michroma",
					"Milonga" => "Milonga",
					"Miltonian" => "Miltonian",
					"Miltonian Tattoo" => "Miltonian Tattoo",
					"Miniver" => "Miniver",
					"Miss Fajardose" => "Miss Fajardose",
					"Modern Antiqua" => "Modern Antiqua",
					"Molengo" => "Molengo",
					"Molle" => "Molle",
					"Monda" => "Monda",
					"Monofett" => "Monofett",
					"Monoton" => "Monoton",
					"Monsieur La Doulaise" => "Monsieur La Doulaise",
					"Montaga" => "Montaga",
					"Montez" => "Montez",
					"Montserrat" => "Montserrat",
					"Montserrat Alternates" => "Montserrat Alternates",
					"Montserrat Subrayada" => "Montserrat Subrayada",
					"Moul" => "Moul",
					"Moulpali" => "Moulpali",
					"Mountains of Christmas" => "Mountains of Christmas",
					"Mouse Memoirs" => "Mouse Memoirs",
					"Mr Bedfort" => "Mr Bedfort",
					"Mr Dafoe" => "Mr Dafoe",
					"Mr De Haviland" => "Mr De Haviland",
					"Mrs Saint Delafield" => "Mrs Saint Delafield",
					"Mrs Sheppards" => "Mrs Sheppards",
					"Muli" => "Muli",
					"Mystery Quest" => "Mystery Quest",
					"Neucha" => "Neucha",
					"Neuton" => "Neuton",
					"New Rocker" => "New Rocker",
					"News Cycle" => "News Cycle",
					"Niconne" => "Niconne",
					"Nixie One" => "Nixie One",
					"Nobile" => "Nobile",
					"Nokora" => "Nokora",
					"Norican" => "Norican",
					"Nosifer" => "Nosifer",
					"Nothing You Could Do" => "Nothing You Could Do",
					"Noticia Text" => "Noticia Text",
					"Noto Sans" => "Noto Sans",
					"Noto Serif" => "Noto Serif",
					"Nova Cut" => "Nova Cut",
					"Nova Flat" => "Nova Flat",
					"Nova Mono" => "Nova Mono",
					"Nova Oval" => "Nova Oval",
					"Nova Round" => "Nova Round",
					"Nova Script" => "Nova Script",
					"Nova Slim" => "Nova Slim",
					"Nova Square" => "Nova Square",
					"Numans" => "Numans",
					"Nunito" => "Nunito",
					"Odor Mean Chey" => "Odor Mean Chey",
					"Offside" => "Offside",
					"Old Standard TT" => "Old Standard TT",
					"Oldenburg" => "Oldenburg",
					"Oleo Script" => "Oleo Script",
					"Oleo Script Swash Caps" => "Oleo Script Swash Caps",
					"Open Sans" => "Open Sans",
					"Open Sans Condensed" => "Open Sans Condensed",
					"Oranienbaum" => "Oranienbaum",
					"Orbitron" => "Orbitron",
					"Oregano" => "Oregano",
					"Orienta" => "Orienta",
					"Original Surfer" => "Original Surfer",
					"Oswald" => "Oswald",
					"Over the Rainbow" => "Over the Rainbow",
					"Overlock" => "Overlock",
					"Overlock SC" => "Overlock SC",
					"Ovo" => "Ovo",
					"Oxygen" => "Oxygen",
					"Oxygen Mono" => "Oxygen Mono",
					"PT Mono" => "PT Mono",
					"PT Sans" => "PT Sans",
					"PT Sans Caption" => "PT Sans Caption",
					"PT Sans Narrow" => "PT Sans Narrow",
					"PT Serif" => "PT Serif",
					"PT Serif Caption" => "PT Serif Caption",
					"Pacifico" => "Pacifico",
					"Paprika" => "Paprika",
					"Parisienne" => "Parisienne",
					"Passero One" => "Passero One",
					"Passion One" => "Passion One",
					"Pathway Gothic One" => "Pathway Gothic One",
					"Patrick Hand" => "Patrick Hand",
					"Patrick Hand SC" => "Patrick Hand SC",
					"Patua One" => "Patua One",
					"Paytone One" => "Paytone One",
					"Peralta" => "Peralta",
					"Permanent Marker" => "Permanent Marker",
					"Petit Formal Script" => "Petit Formal Script",
					"Petrona" => "Petrona",
					"Philosopher" => "Philosopher",
					"Piedra" => "Piedra",
					"Pinyon Script" => "Pinyon Script",
					"Pirata One" => "Pirata One",
					"Plaster" => "Plaster",
					"Play" => "Play",
					"Playball" => "Playball",
					"Playfair Display" => "Playfair Display",
					"Playfair Display SC" => "Playfair Display SC",
					"Podkova" => "Podkova",
					"Poiret One" => "Poiret One",
					"Poller One" => "Poller One",
					"Poly" => "Poly",
					"Pompiere" => "Pompiere",
					"Pontano Sans" => "Pontano Sans",
					"Port Lligat Sans" => "Port Lligat Sans",
					"Port Lligat Slab" => "Port Lligat Slab",
					"Prata" => "Prata",
					"Preahvihear" => "Preahvihear",
					"Press Start 2P" => "Press Start 2P",
					"Princess Sofia" => "Princess Sofia",
					"Prociono" => "Prociono",
					"Prosto One" => "Prosto One",
					"Puritan" => "Puritan",
					"Purple Purse" => "Purple Purse",
					"Quando" => "Quando",
					"Quantico" => "Quantico",
					"Quattrocento" => "Quattrocento",
					"Quattrocento Sans" => "Quattrocento Sans",
					"Questrial" => "Questrial",
					"Quicksand" => "Quicksand",
					"Quintessential" => "Quintessential",
					"Qwigley" => "Qwigley",
					"Racing Sans One" => "Racing Sans One",
					"Radley" => "Radley",
					"Raleway" => "Raleway",
					"Raleway Dots" => "Raleway Dots",
					"Rambla" => "Rambla",
					"Rammetto One" => "Rammetto One",
					"Ranchers" => "Ranchers",
					"Rancho" => "Rancho",
					"Rationale" => "Rationale",
					"Redressed" => "Redressed",
					"Reenie Beanie" => "Reenie Beanie",
					"Revalia" => "Revalia",
					"Ribeye" => "Ribeye",
					"Ribeye Marrow" => "Ribeye Marrow",
					"Righteous" => "Righteous",
					"Risque" => "Risque",
					"Roboto" => "Roboto",
					"Roboto Condensed" => "Roboto Condensed",
					"Roboto Slab" => "Roboto Slab",
					"Rochester" => "Rochester",
					"Rock Salt" => "Rock Salt",
					"Rokkitt" => "Rokkitt",
					"Romanesco" => "Romanesco",
					"Ropa Sans" => "Ropa Sans",
					"Rosario" => "Rosario",
					"Rosarivo" => "Rosarivo",
					"Rouge Script" => "Rouge Script",
					"Ruda" => "Ruda",
					"Rufina" => "Rufina",
					"Ruge Boogie" => "Ruge Boogie",
					"Ruluko" => "Ruluko",
					"Rum Raisin" => "Rum Raisin",
					"Ruslan Display" => "Ruslan Display",
					"Russo One" => "Russo One",
					"Ruthie" => "Ruthie",
					"Rye" => "Rye",
					"Sacramento" => "Sacramento",
					"Sail" => "Sail",
					"Salsa" => "Salsa",
					"Sanchez" => "Sanchez",
					"Sancreek" => "Sancreek",
					"Sansita One" => "Sansita One",
					"Sarina" => "Sarina",
					"Satisfy" => "Satisfy",
					"Scada" => "Scada",
					"Schoolbell" => "Schoolbell",
					"Seaweed Script" => "Seaweed Script",
					"Sevillana" => "Sevillana",
					"Seymour One" => "Seymour One",
					"Shadows Into Light" => "Shadows Into Light",
					"Shadows Into Light Two" => "Shadows Into Light Two",
					"Shanti" => "Shanti",
					"Share" => "Share",
					"Share Tech" => "Share Tech",
					"Share Tech Mono" => "Share Tech Mono",
					"Shojumaru" => "Shojumaru",
					"Short Stack" => "Short Stack",
					"Siemreap" => "Siemreap",
					"Sigmar One" => "Sigmar One",
					"Signika" => "Signika",
					"Signika Negative" => "Signika Negative",
					"Simonetta" => "Simonetta",
					"Sintony" => "Sintony",
					"Sirin Stencil" => "Sirin Stencil",
					"Six Caps" => "Six Caps",
					"Skranji" => "Skranji",
					"Slackey" => "Slackey",
					"Smokum" => "Smokum",
					"Smythe" => "Smythe",
					"Sniglet" => "Sniglet",
					"Snippet" => "Snippet",
					"Snowburst One" => "Snowburst One",
					"Sofadi One" => "Sofadi One",
					"Sofia" => "Sofia",
					"Sonsie One" => "Sonsie One",
					"Sorts Mill Goudy" => "Sorts Mill Goudy",
					"Source Code Pro" => "Source Code Pro",
					"Source Sans Pro" => "Source Sans Pro",
					"Special Elite" => "Special Elite",
					"Spicy Rice" => "Spicy Rice",
					"Spinnaker" => "Spinnaker",
					"Spirax" => "Spirax",
					"Squada One" => "Squada One",
					"Stalemate" => "Stalemate",
					"Stalinist One" => "Stalinist One",
					"Stardos Stencil" => "Stardos Stencil",
					"Stint Ultra Condensed" => "Stint Ultra Condensed",
					"Stint Ultra Expanded" => "Stint Ultra Expanded",
					"Stoke" => "Stoke",
					"Strait" => "Strait",
					"Sue Ellen Francisco" => "Sue Ellen Francisco",
					"Sunshiney" => "Sunshiney",
					"Supermercado One" => "Supermercado One",
					"Suwannaphum" => "Suwannaphum",
					"Swanky and Moo Moo" => "Swanky and Moo Moo",
					"Syncopate" => "Syncopate",
					"Tangerine" => "Tangerine",
					"Taprom" => "Taprom",
					"Tauri" => "Tauri",
					"Telex" => "Telex",
					"Tenor Sans" => "Tenor Sans",
					"Text Me One" => "Text Me One",
					"The Girl Next Door" => "The Girl Next Door",
					"Tienne" => "Tienne",
					"Tinos" => "Tinos",
					"Titan One" => "Titan One",
					"Titillium Web" => "Titillium Web",
					"Trade Winds" => "Trade Winds",
					"Trocchi" => "Trocchi",
					"Trochut" => "Trochut",
					"Trykker" => "Trykker",
					"Tulpen One" => "Tulpen One",
					"Ubuntu" => "Ubuntu",
					"Ubuntu Condensed" => "Ubuntu Condensed",
					"Ubuntu Mono" => "Ubuntu Mono",
					"Ultra" => "Ultra",
					"Uncial Antiqua" => "Uncial Antiqua",
					"Underdog" => "Underdog",
					"Unica One" => "Unica One",
					"UnifrakturCook" => "UnifrakturCook",
					"UnifrakturMaguntia" => "UnifrakturMaguntia",
					"Unkempt" => "Unkempt",
					"Unlock" => "Unlock",
					"Unna" => "Unna",
					"VT323" => "VT323",
					"Vampiro One" => "Vampiro One",
					"Varela" => "Varela",
					"Varela Round" => "Varela Round",
					"Vast Shadow" => "Vast Shadow",
					"Vibur" => "Vibur",
					"Vidaloka" => "Vidaloka",
					"Viga" => "Viga",
					"Voces" => "Voces",
					"Volkhov" => "Volkhov",
					"Vollkorn" => "Vollkorn",
					"Voltaire" => "Voltaire",
					"Waiting for the Sunrise" => "Waiting for the Sunrise",
					"Wallpoet" => "Wallpoet",
					"Walter Turncoat" => "Walter Turncoat",
					"Warnes" => "Warnes",
					"Wellfleet" => "Wellfleet",
					"Wendy One" => "Wendy One",
					"Wire One" => "Wire One",
					"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
					"Yellowtail" => "Yellowtail",
					"Yeseva One" => "Yeseva One",
					"Yesteryear" => "Yesteryear",
					"Zeyada" => "Zeyada",
				);
		/*-----------------------------------------------------------------------------------*/
		/* The Options Array */
		/*-----------------------------------------------------------------------------------*/
		// Set the Options Array
		global $of_options;
		$of_options = array();
						
							
		//////// General Options//////////////
				$of_options[] = array( "name" => "تنظیمات دمو",
					"type" => "heading");
									
				$of_options[] = array( "name" => "محتوای دمو",
					"desc" => "",
					"id" => "header_info",
					"std" => "<h3 style='margin: 0'>نصب دمو با یک کلیک</h3>",
					"icon" => false,
					"type" => "info");
				
				$of_options[] = array( "name" => "نصب محتوای دمو",
					"id" => "of_demo",
					"std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true",
					"type" => "button",
					"desc" => 'با کلیک بر روی این دکمه تمامی محتویات دمو برای شما نصب خواهد شد. سرعت روند این کار بستگی به سرعت هاست شما دارد. تمامی تصاویر از سرور های ما دانلود خواهند شد. در صورتی که پس از ده دقیقه این کار انجام نشد مجددا تلاش کنید.',
					);				
								
				$of_options[] = array( "name" => "ریسپانسیو",
						"desc" => "تنظیمات ریسپانسیو برای موبایل",
						"id" => "check_responsive",
						"std" => 1,
						"type" => "checkbox");				
				$of_options[] = array( "name" => "تنظیمات فیوآیکون",
					"desc" => "",
					"id" => "favicons",
					"std" => "<h3 style='margin: 0;'>تنظیمات فیوآیکون</h3>",
					"icon" => false,
					"type" => "info");
					
				$of_options[] = array( "name" => "فیوآیکون",
					"desc" => "فیوآیکون وبسایت شما (16px x 16px).",
					"id" => "favicon",
					"std" => get_template_directory_uri()."/images/favicon.ico",
					"type" => "upload");
					
				$of_options[] = array( "name" => "آپلود فیوآیکون آیفون اپل",
					"desc" => "فیوآیکون آیفون اپل (57px x 57px).",
					"id" => "iphone_icon",
					"std" => get_template_directory_uri()."/images/apple-touch-icon-57x57.png",
					"type" => "upload");
				$of_options[] = array( "name" => "آپلود آیکون رتینا برای آیفون اپل",
					"desc" => "فیوآیکون برای نسخه رتینا آیفون اپل (114px x 114px).",
					"id" => "iphone_icon_retina",
					"std" => get_template_directory_uri()."/images/apple-touch-icon-114x114.png",
					"type" => "upload");
				$of_options[] = array( "name" => "آپلود آیکون آیپد اپل",
					"desc" => "فیوآیکون برای آیپد اپل (72px x 72px).",
					"id" => "ipad_icon",
					"std" => get_template_directory_uri()."/images/apple-touch-icon-72x72.png",
					"type" => "upload");
				$of_options[] = array( "name" => "آپلود آیکون رتینا برای آیپد اپل",
					"desc" => "فیوآیکون برای نسخه رتینا آیپد اپل (144px x 144px).",
					"id" => "ipad_icon_retina",
					"std" => get_template_directory_uri()."/images/apple-touch-icon-144x144.png",
					"type" => "upload");

					
				$of_options[] = array( "name" =>  "رنگ قالب",
					"desc" => "رنگ قالب خود را انتخاب کنید.",
					"id" => "theme_color",
					"std" => "#ffb300",
					"type" => "color");
					
				
				$of_options[] = array( "name" =>  "رنگ پایه قالب",
					"desc" => "رنگ قالب خود را انتخاب کنید.",
					"id" => "theme_base_color",
					"std" => "#333",
					"type" => "color");
					
				
		//////// Header Options//////////////
		$of_options[] = array( 	"name" 		=> "تنظیمات هدر",
								"type" 		=> "heading"
						);
						
						
		$of_options[] = array( "name" => "طرح هدر ",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>تنظیمات هدر</h3>",
							"icon" => false,
							"type" => "info");
							
					
		$of_options[] = array( "name" => "انتخاب طرح هدر",
					"desc" => "طرح هدر را انتخاب کنید.",
					"id" => "select_header",
					"std" => "header-1",
					"type" => "images",
					"options" => array(
						"header-1" => get_template_directory_uri()."/images/headers/header-1.jpg",
						"header-2" => get_template_directory_uri()."/images/headers/header-2.jpg",
						"header-3" => get_template_directory_uri()."/images/headers/header-3.jpg",
						"header-4" => get_template_directory_uri()."/images/headers/header-4.jpg",
						"header-5" => get_template_directory_uri()."/images/headers/header-5.jpg"
						)
				); //Done Change
		
		//Header V1				
			
		$of_options[] = array( "name" => "لوگو",
							"desc" => "یک فایل تصویری برای لوگوی خود انتخاب کنید.",
							"id" => "rebuild_logo",
							"std" => get_template_directory_uri()."/images/logo.png",
							"mod" => "",
							"type" => "media");
							
		$of_options[] = array( "name" => "لوگو نسخه رتینا",
							"desc" => "یک فایل تصویری برای نسخه رتینا لوگو انتخاب کنید. اندازه آن باید دقیقا دو برابر لوگوی اصلی باشد.",
							"id" => "logo_retina",
							"std" => get_template_directory_uri()."/images/logo@2x.png",
							"mod" => "",
							"type" => "media");
		
		$of_options[] = array( "name" => "عرض لوگوی رتینا",
							"desc" => "عرض لوگوی رتینا را تنظیم کنید.",
							"id" => "logo_width",
							"std" => "",
							"type" => "text"); //Done Change
		
		$of_options[] = array( "name" => "ارتفاع لوگوی رتینا",
							"desc" => "ارتفاع لوگوی رتینا را تنظیم کنید.",
							"id" => "logo_height",
							"std" => "",
							"type" => "text"); //Done Change
				
		$of_options[] = array( "name" => "هدر چسبان",
							"desc" => "برای فعالسازی هدر چسبان تیک را بزنید.",
							"id" => "check_sticky_header",
							"std" => 1,
							"type" => "checkbox");					
		
		//Header Info
		
		
		
		$of_options[] = array( "name" => "پیام خوشامدگویی",
							"desc" => "تنظیم پیامد خوشامدگویی",
							"id" => "text_welcome",
							"std" => "به ReBuild خوش آمدید. قالب فوق العاده HTML.",
							"type" => "text"); //Done Change
							
		$of_options[] = array( "name" => "ایمیل",
							"desc" => "تنظیم آدرس ایمیل",
							"id" => "text_email",
							"std" => "info@example.com",
							"type" => "text"); //Done Change
							
		$of_options[] = array( "name" => "مکان",
							"desc" => "تنظیم مکان شرکت",
							"id" => "text_office_location",
							"std" => "SOUTH REVEN, USA",
							"type" => "text"); //Done Change
							
		$of_options[] = array( "name" => "زمان کاری شرکت",
							"desc" => "تنظیم زمان کاری شرکت",
							"id" => "text_office_time",
							"std" => "SUN - FRI 8:00 - 22:00",
							"type" => "text"); //Done Change
							
		$of_options[] = array( "name" => "تلفن تماس",
							"desc" => "تنظیم تلفن تماس",
							"id" => "text_contact_phone",
							"std" => "801 21 7600",
							"type" => "text"); //Done Change
							
		//////// Header Options//////////////
		$of_options[] = array( 	"name" 		=> "تنظیمات فوتر",
								"type" 		=> "heading"
						);
						
						
		$of_options[] = array( "name" => "طرح هدر ",
							"desc" => "",
							"id" => "footer_info",
							"std" => "<h3 style='margin: 0'>تنظیمات فوتر</h3>",
							"icon" => false,
							"type" => "info");
		
									
					
		$of_options[] = array( "name" => "انتخاب فوتر",
					"desc" => "سبک فوتر را انتخاب کنید.",
					"id" => "select_footer",
					"std" => "footer-1",
					"type" => "images",
					"options" => array(
						"footer-1" => get_template_directory_uri()."/images/footers/footer-1.jpg",
						"footer-2" => get_template_directory_uri()."/images/footers/footer-2.jpg"
						)
				); //Done Change
				
		
		$of_options[] = array( "name" => "لوگو فوتر",
							"desc" => "یک فایل تصویری برای لوگو فوتر خود انتخاب کنید.",
							"id" => "rebuild_footer_logo",
							"std" => get_template_directory_uri()."/images/logo.png",
							"mod" => "",
							"type" => "media");
							
		$of_options[] = array( "name" => "لوگو فوتر، نسخه رتینا",
							"desc" => "یک فایل تصویری برای نسخه رتینا لوگو انتخاب کنید. اندازه آن باید دقیقا دو برابر لوگوی اصلی باشد.",
							"id" => "footer_logo_retina",
							"std" => "",
							"mod" => "",
							"type" => "media");		
		
		
		$of_options[] = array( "name" => "کپی رایت",
					"desc" => "متن کپی رایت را تایپ کنید.",
					"id" => "text_copyright",
					"std" => "کپی رایت 2026 - طراحی توسط",
					"type" => "text"); //Done Change
		
							
		//////// Background Options//////////////
		$of_options[] = array( 	"name" 		=> "تنظیمات پس زمینه",
								"type" 		=> "heading"
						);
						
						
		$of_options[] = array( "name" => "طرح جعبه ای / گسترده ",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>تنظیمات طرح جعبه ای / گسترده</h3>",
							"icon" => false,
							"type" => "info");
							
		$of_options[] = array( "name" => "طرح جعبه ای / گسترده را انتخاب کنید",
							"desc" => "حالت طرح را انتخاب کنید.",
							"id" => "select_layout",
							"std" => "wide",
							"type" => "select",
							"options" => array(
									"wide" 	=>"گسترده",
									"boxed"  	=>"جعبه ای",
									)
						); //Done Change	
		$of_options[] = array( "name" => "فقط برای حالت طرح جعبه ای ",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>تنظیمات فقط برای طرح جعبه ای</h3>",
							"icon" => false,
							"type" => "info");
						
		$of_options[] = array( "name" => "تصویر پس زمینه",
					"desc" => "تصویر پس زمینه را انتخاب و یا مسیر تصویر را وارد کنید.",
					"id" => "meida_bg_boxbody_image",
					"std" => "",
					"mod" => "",
					"type" => "media");
					
					
		$of_options[] = array( "name" => "تکرار پس زمینه",
							"desc" => "تنظیم گزینه تکرار پس زمینه",
							"id" => "select_bg_repeat",
							"std" => "repeat",
							"type" => "select",
							"options" => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat')
						
						); //Done Change
							
		$of_options[] = array( "name" => "تصویر پس زمینه تمام عرض (100%)",
					"desc" => "برای داشتن تصویر پس زمینه تمام عرض تیک بزنید.",
					"id" => "check_bg_fullwidth",
					"std" => 0,
					"type" => "checkbox");				
			
					
		$of_options[] = array( "name" =>  "رنگ پس زمینه",
					"desc" => "رنگ پس زمینه را انتخاب کنید.",
					"id" => "bg_boxbody_color",
					"std" => "",
					"type" => "color");
									
						
		
		//////// Typography Options//////////////
		$of_options[] = array( "name" => "تایپوگرافی",
							"type" => "heading");
							
							$of_options[] = array( "name" => "فونت های گوگل",
								"desc" => "",
								"id" => "general_heading",
								"std" => "<h3 style='margin: 0'>فونت های گوگل</h3>",
								"icon" => false,
								"type" => "info");
					
							$of_options[] = array( "name" => "فونت های متن اصلی",
								"desc" => "فونت متن اصلی را انتخاب کنید.",
								"id" => "google_body_font",
								"std" => "Open Sans",
								"type" => "select_google_font",
								"preview" 	=> array(
												"text" => "این متن پیش نمایش من است!", //this is the text from preview box
												"size" => "30px" //this is the text size from preview box
								),
								"options" => $list_of_google_fonts);
					
							$of_options[] = array( "name" => "فونت منو",
								"desc" => "فونت منو را انتخاب کنید.",
								"id" => "google_menu_font",
								"std" => "Roboto",
								"type" => "select_google_font",
								"preview" 	=> array(
												"text" => "این متن پیش نمایش من است!", //this is the text from preview box
												"size" => "30px" //this is the text size from preview box
								),
								"options" => $list_of_google_fonts);
					
							$of_options[] = array( "name" => "فونت عنوان",
								"desc" => "فونت عنوان کلی را انتخاب کنید(h1,h2,h3,h4,h5,h6)",
								"id" => "google_headings_font",
								"std" => "Raleway",
								"type" => "select_google_font",
								"preview" 	=> array(
												"text" => "این متن پیش نمایش من است!", //this is the text from preview box
												"size" => "30px" //this is the text size from preview box
								),
								"options" => $list_of_google_fonts);
							
							$of_options[] = array( "name" => "فونت زیرعنوان",
								"desc" => "فونت زیرعنوان کلی را انتخاب کنید.",
								"id" => "google_subheadings_font",
								"std" => "Open Sans",
								"type" => "select_google_font",
								"preview" 	=> array(
												"text" => "این متن پیش نمایش من است!", //this is the text from preview box
												"size" => "30px" //this is the text size from preview box
								),
							"options" => $list_of_google_fonts);
								
					
							$of_options[] = array( "name" => "فونت عنوان فوتر",
								"desc" => "فونت عنوان فوتر را انتخاب کنید.",
								"id" => "google_footer_headings_font",
								"std" => "Open Sans",
								"type" => "select_google_font",
								"preview" 	=> array(
												"text" => "این متن پیش نمایش من است!", //this is the text from preview box
												"size" => "30px" //this is the text size from preview box
								),
								"options" => $list_of_google_fonts);
								
								
							$of_options[] = array( "name" => "بارگذاری فونت سفارشی 1",
								"desc" => "یک فونت برای استفاده در استایل css انتخاب کنید.",
								"id" => "google_font_manual_load",
								"std" => "Montserrat",
								"type" => "select_google_font",
								"preview" 	=> array(
												"text" => "این متن پیش نمایش من است!", //this is the text from preview box
												"size" => "30px" //this is the text size from preview box
								),
								"options" => $list_of_google_fonts);
								
							$of_options[] = array( "name" => "بارگذاری فونت سفارشی 2",
								"desc" => "یک فونت برای استفاده در استایل css انتخاب کنید.",
								"id" => "google_font_manual_load_2",
								"std" => "Oswald",
								"type" => "select_google_font",
								"preview" 	=> array(
												"text" => "این متن پیش نمایش من است!", //this is the text from preview box
												"size" => "30px" //this is the text size from preview box
								),
								"options" => $list_of_google_fonts);
											
		$of_options[] = array( "name" => "",
							"desc" => "",
							"id" => "general_heading",
							"std" => "<h3 style='margin: 0'>متن اصلی و عنوان ها</h3>",
							"icon" => false,
							"type" => "info");
		$of_options[] = array( "name" => "فونت متن اصلی",
							"desc" => "تنظیمات فونت اصلی",
							"id" => "body_font",
							"std" => array(
							'size' => '15px',
							'face' => 'Helvetica',
							'style' => 'normal',
							'color' => ''
							),
							"type" => "typography");
							
		$of_options[] = array( "name" => "",
							"desc" => "",
							"id" => "general_heading",
							"std" => "عنوان ها (H1,H2,H3,H4,H5,H6)",
							"icon" => false,
							"type" => "info");
						
		$of_options[] = array( "name" => "H1 - فونت عنوان",
							"desc" => "تنظیمات فونت عنوان H1",
							"id" => "h1_font",
							"std" => array(
							'size' => '32px',
							'face' => 'Helvetica',
							'style' => 'normal',
							'color' => ''
							),
							"type" => "typography"); 
		$of_options[] = array( "name" => "H2 - فونت عنوان",
							"desc" => "تنظیمات فونت عنوان H2",
							"id" => "h2_font",
							"std" => array(
							'size' => '23px',
							'face' => 'Helvetica',
							'style' => 'normal',
							'color' => ''
							),
							"type" => "typography");
		$of_options[] = array( "name" => "H3 - فونت عنوان",
							"desc" => "تنظیمات فونت عنوان H3",
							"id" => "h3_font",
							"std" => array(
							'size' => '18px',
							'face' => 'Helvetica',
							'style' => 'normal',
							'color' => ''
							),
							"type" => "typography");
							
		$of_options[] = array( "name" => "H4 - فونت عنوان",
							"desc" => "تنظیمات فونت عنوان H4",
							"id" => "h4_font",
							"std" => array(
							'size' => '16px',
							'face' => 'Helvetica',
							'style' => 'normal',
							'color' => ''
							),
							"type" => "typography");
							
		$of_options[] = array( "name" => "H5 - فونت عنوان",
							"desc" => "تنظیمات فونت عنوان H5",
							"id" => "h5_font",
							"std" => array(
							'size' => '15px',
							'face' => 'Helvetica',
							'style' => 'normal',
							'color' => ''
							),
							"type" => "typography");
							
		$of_options[] = array( "name" => "H6 - فونت عنوان",
							"desc" => "تنظیمات فونت عنوان H6",
							"id" => "h6_font",
							"std" => array(
							'size' => '14px',
							'face' => 'Helvetica',
							'style' => 'normal',
							'color' => ''
							),
							"type" => "typography");
		
							
		
		//////// Blog Options//////////////
		$of_options[] = array( 	"name" 		=> "تنظیمات وبلاگ",
								"type" 		=> "heading"
						);
						
						
		$of_options[] = array( "name" => "صفحه آرشیو وبلاگ",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>تنظیمات آرشیو وبلاگ</h3>",
							"icon" => false,
							"type" => "info");
		
		$of_options[] = array( "name" => "انتخاب طرح",
					"desc" => "طرح را انتخاب کنید.",
					"id" => "sidebar_position",
					"std" => "right-sidebar",
					"type" => "images",
					"options" => array(
						"left-sidebar" => get_template_directory_uri()."/images/view/sidebar-left.png",
						"right-sidebar" => get_template_directory_uri()."/images/view/sidebar-right.png",
						"no-sidebar" => get_template_directory_uri()."/images/view/body-full.png"
						)
				); //Done Change						
							
		
		
		$of_options[] = array( "name" => "صفحه توضیحات وبلاگ",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>تنظیمات توضیحات وبلاگ</h3>",
							"icon" => false,
							"type" => "info");
		
		$of_options[] = array( "name" => "انتخاب طرح",
					"desc" => "طرح را انتخاب کنید.",
					"id" => "single_sidebar_position",
					"std" => "right-sidebar",
					"type" => "images",
					"options" => array(
						"left-sidebar" => get_template_directory_uri()."/images/view/sidebar-left.png",
						"right-sidebar" => get_template_directory_uri()."/images/view/sidebar-right.png",
						"no-sidebar" => get_template_directory_uri()."/images/view/body-full.png"
						)
				); //Done Change										
					
		
		$of_options[] = array( "name" =>  "رنگ عکس هاور",
							"desc" => "رنگ پوشش تصویر هاور را انتخاب کنید.",
							"id" => "image_hoverlay",
							"std" => "",
							"type" => "color");	
							
		$of_options[] = array( "name" => "آیکون های تصویر هاور",
					"desc" => "آیکون های پوشش تصویر هاور را انتخاب کنید.",
					"id" => "select_img_hovericons",
					"std" => "زوم+لینک",
					"type" => "select",
					"options" => array(
							"zoom_link" =>"زوم+لینک",
							"zoom" =>"زوم",
							"link" 	 =>"لینک",
							"none" =>"none"
							)
							);							
					
		$of_options[] = array( "name" => "فعالسازی تاریخ",
							"desc" => "برای فعالسازی تاریخ تیک را بزنید.",
							"id" => "checkbox_date_info",
							"std" => 1,
							"type" => "checkbox"); //Done Change
							
		$of_options[] = array( "name" => "فعالسازی مکان",
							"desc" => "برای فعالسازی لینک نظرات تیک را بزنید.",
							"id" => "checkbox_location",
							"std" => 1,
							"type" => "checkbox"); //Done Change
							
		$of_options[] = array( "name" => "صفحه توضیحات وبلاگ",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>تنظیمات توضیحات وبلاگ</h3>",
							"icon" => false,
							"type" => "info");
		$of_options[] = array( "name" => "تصویر/اسلاید شاخص",
							"desc" => "فعالسازی تصویر یا اسلاید شاخص در صفحه وبلاگ",
							"id" => "checkbox_slideshowall",
							"std" => 1,
							"type" => "checkbox"); //Done Change						
							
		$of_options[] = array( "name" => "اسلاید شاخص",
							"desc" => "فعالسازی اسلاید شاخص در صفحه وبلاگ",
							"id" => "checkbox_slideshow",
							"std" => 1,
							"type" => "checkbox"); //Done Change
							
		$of_options[] = array( "name" => "شمارش های اسلاید شاخص",
							"desc" => "تنظیم تعداد محدود اسلاید",
							"id" => "text_slideshow_count",
							"std" => "2",
							"type" => "text"); //Done Change									
		
		$of_options[] = array( "name" => "فعالسازی نظرات",
							"desc" => "برای فعالسازی نظرات تیک را بزنید.",
							"id" => "checkbox_comments",
							"std" => 1,
							"type" => "checkbox"); //Done Change					
		
		$of_options[] = array( "name" => "فعالسازی اشتراک گذاری محتوا",
							"desc" => "برای فعالسازی اشتراک گذاری محتوا تیک را بزنید.",
							"id" => "checkbox_sharebox",
							"std" => 1,
							"type" => "checkbox"); //Done Change
							
		$of_options[] = array( "name" => "فعالسازی مطالب مرتبط",
							"desc" => "برای فعالسازی مطالب مرتبط تیک را بزنید.",
							"id" => "checkbox_relatedposts",
							"std" => 1,
							"type" => "checkbox"); //Done Change
					
		//////// Woocommerce Options//////////////
		$of_options[] = array( 	"name" 		=> "ووکامرس",
								"type" 		=> "heading"
						);
						
		$of_options[] = array( "name" => "تنظیمات نمایش",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>تنظیمات نمایش</h3>",
							"icon" => false,
							"type" => "info");
							
		$of_options[] = array( "name" => "انتخاب طرح",
					"desc" => "طرح را انتخاب کنید.",
					"id" => "woo_layout",
					"std" => "right-sidebar",
					"type" => "images",
					"options" => array(
						"left-sidebar" => get_template_directory_uri()."/images/view/sidebar-left.png",
						"right-sidebar" => get_template_directory_uri()."/images/view/sidebar-right.png",
						"no-sidebar" => get_template_directory_uri()."/images/view/body-full.png"
						)
				); //Done Change					
		
		
		$of_options[] = array( "name" => "تعداد ستون محصولات",
								"desc" => "تنظیم تعداد ستون ها",
								"id" => "woocoomerce_coulmns",
								"type" => "select",
								"options" => array(
										"4" 	=>"4",
										"3" 	=>"3"
										)
								);
		
		$of_options[] = array( "name" => "تعداد محصولات در هر صفحه",
								"desc" => "تعداد محصولات برای نمایش در هر صفحه را وارد کنید.",
								"id" => "woo_number_per_page",
								"std" => "12",
								"type" => "text"); //Done Change
								
		$of_options[] = array( "name" => "عدم نمایش مسیر صفحه?",
							"desc" => "نمایش/عدم نمایش مسیر صفحه",
							"id" => "checkbox_woo_breadcrumbs",
							"std" => 1,
							"type" => "checkbox"); //Done Change
							
		$of_options[] = array( "name" => "عدم نمایش عنوان",
							"desc" => "نمایش/عدم نمایش عنوان",
							"id" => "checkbox_woo_title",
							"std" => 1,
							"type" => "checkbox"); //Done Change
							
							
		$of_options[] = array( "name" => "تصویر محصول",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>افکت تصویر محصول</h3>",
							"icon" => false,
							"type" => "info");
		
		
		$of_options[] = array( "name" => "تصویر هاور",
					"desc" => "انتخاب افکت تصویر هاور",
					"id" => "woo_image_hover",
					"std" => "stat",
					"type" => "select",
					"options" => array(
							"stat" 	=>"Stat",
							"flip" 	=>"Flip"
							)
					);
		
		
		
		//////// PrettyPhoto Lightbox Options//////////////
		$of_options[] = array( 	"name" 		=> "تنظیمات لایت باکس",
								"type" 		=> "heading"
						);
						
						
		$of_options[] = array( "name" => "تنظیمات لایت باکس",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>تنظیمات لایت باکس</h3>",
							"icon" => false,
							"type" => "info");
		$of_options[] = array( "name" => "فعالسازی لایت باکس Pretty Photo",
					"desc" => "برای فعالسازی لایت باکس Pretty Photo تیک را بزنید.",
					"id" => "prettyphoto_auto_link",
					"std" => 1,
					"type" => "checkbox");
					
		$of_options[] = array( "name" => "نمایش خودکار اسلاید",
					"desc" => "برای فعالسازی نمایش خودکار اسلاید تیک را بزنید.",
					"id" => "autoplay_slideshow",
					"std" => 1,
					"type" => "checkbox");
					
		$of_options[] = array( "name" => "نمایش عنوان",
					"desc" => "برای نمایش عنوان تیک را بزنید.",
					"id" => "lightbox_show_title",
					"std" => 1,
					"type" => "checkbox");
		$of_options[] = array( "name" => "فعالسازی پوشش",
					"desc" => "برای فعالسازی پوشش گالری تیک را بزنید.",
					"id" => "overlay_gallery",
					"std" => 1,
					"type" => "checkbox");			
							
		$of_options[] = array( "name" => "لایت باکس قالب",
							"desc" => "لایت باکس قالب را انتخاب کنید.",
							"id" => "slideshow_theme",
							"std" => "facebook",
							"type" => "select",
							"options" => array(
									"light_rounded" =>"گرد و روشن",
									"dark_rounded"=>"گرد و تیره",
									"light_square"=>"مربعی و روشن",
									"dark_square"=>"مربعی و تیره",
									"facebook"=>"Facebook"));	//Done Change
		$of_options[] = array( "name" => "شفافیت لایت باکس",
							"desc" => "تنظیم شفافیت لایت باکس",
							"id" => "lightbox_opacity",
							"std" => "0.8",
							"min" => "0.1",
							"step"	=> "1",
							"max" => "1",
							"type" => "sliderui");	
		$of_options[] = array( "name" => "سرعت انیمیشن لایت باکس",
							"desc" => "تنظیم سرعت انیمیشن",
							"id" => "animation_speed",
							"std" => "fast",
							"type" => "select",
							"options" => array(
									"fast" =>"سریع",
									"slow"=>"آرام",
									"normal"=>"معمولی"));	//Done Change					
							
		
		//////// Social Network Options//////////////
		$of_options[] = array( 	"name" 		=> "تنظیمات شبکه اجتماعی",
								"type" 		=> "heading"
						);
		$of_options[] = array( "name" => "فعالسازی/غیرفعالسازی شبکه اجتماعی",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>فعالسازی/غیرفعالسازی شبکه اجتماعی</h3>",
							"icon" => false,
							"type" => "info");
							
		$of_options[] = array( "name" => "نمایش در هدر",
							"desc" => "نمایش شبکه اجتماعی در هدر",
							"id" => "checkbox_social_header",
							"std" => 1,
							"type" => "checkbox"); //Done Change
							
		$of_options[] = array( "name" => "نمایش در فوتر",
							"desc" => "نمایش شبکه اجتماعی در فوتر",
							"id" => "checkbox_social_footer",
							"std" => 1,
							"type" => "checkbox"); //Done Change							
									
		$of_options[] = array( "name" => "تنظیمات شبکه اجتماعی",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>حساب کاربری شبکه اجتماعی</h3>",
							"icon" => false,
							"type" => "info");
		$of_options[] = array( "name" => "Facebook",
								"desc" => "Ex: rebuild",
								"id" => "text_facebook",
								"std" => "rebuild",
								"type" => "text"); //Done Change
		$of_options[] = array( "name" => "Twitter",
								"desc" => "Ex: rebuild",
								"id" => "text_twitter",
								"std" => "rebuild",
								"type" => "text"); //Done Change		
		$of_options[] = array( "name" => "Youtube",
								"desc" => "Ex: rebuild",
								"id" => "text_youtube",
								"std" => "rebuild",
								"type" => "text"); //Done Change	
		$of_options[] = array( "name" => "Google +",
								"desc" => "Ex: rebuild",
								"id" => "text_googleplus",
								"std" => "rebuild",
								"type" => "text"); //Done Change	
		$of_options[] = array( "name" => "Dribbble",
								"desc" => "Ex: rebuild",
								"id" => "text_dribbble",
								"std" => "rebuild",
								"type" => "text"); //Done Change	
		$of_options[] = array( "name" => "Instagram",
								"desc" => "Ex: rebuild",
								"id" => "text_instagram",
								"std" => "rebuild",
								"type" => "text"); //Done Change	
		$of_options[] = array( "name" => "Pinterest",
								"desc" => "Ex: rebuild",
								"id" => "text_pinterest",
								"std" => "rebuild",
								"type" => "text"); //Done Change	
		$of_options[] = array( "name" => "Flickr",
								"desc" => "Ex: rebuild",
								"id" => "text_flickr",
								"std" => "rebuild",
								"type" => "text"); //Done Change	
		
		
		//Sharebox
$of_options[] = array( "name" => "تنظیمات اشتراک گذاری محتوا",
						"type" => "heading"
						//"icon"	=> ADMIN_IMAGES . "icon-slider.png"
						);
$of_options[] = array( "name" => "فعالسازی شبکه اشتراک گذاری محتوا",
					"desc" => "",
					"id" => "header_info",
					"std" => "<h3 style='margin: 0'>فعالسازی شبکه اشتراک گذاری محتوا</h3>",
					"icon" => false,
					"type" => "info");
$of_options[] = array( "name" => "Twitter",
						"desc" => "فعالسازی اشتراک گذاری در Twitter",
						"id" => "sharebox_twitter",
						"std" => "1",
						"type" => "checkbox"); //Done Change	
$of_options[] = array( "name" => "Facebook",
						"desc" => "فعالسازی اشتراک گذاری در facebook",
						"id" => "sharebox_facebook",
						"std" => "1",
						"type" => "checkbox"); //Done Change
$of_options[] = array( "name" => "Google +",
						"desc" => "فعالسازی اشتراک گذاری در google +",
						"id" => "sharebox_googleplus",
						"std" => "1",
						"type" => "checkbox"); //Done Change	
						
$of_options[] = array( "name" => "Linkedin",
						"desc" => "فعالسازی اشتراک گذاری در linkedin",
						"id" => "sharebox_linkedin",
						"std" => "1",
						"type" => "checkbox"); //Done Change						
						
$of_options[] = array( "name" => "Delicious",
						"desc" => "فعالسازی اشتراک گذاری در delicious",
						"id" => "sharebox_delicious",
						"std" => "1",
						"type" => "checkbox"); //Done Change	
$of_options[] = array( "name" => "Digg",
						"desc" => "فعالسازی اشتراک گذاری در digg",
						"id" => "sharebox_digg",
						"std" => "1",
						"type" => "checkbox"); //Done Change	
$of_options[] = array( "name" => "Reddit",
						"desc" => "فعالسازی اشتراک گذاری در reddit",
						"id" => "sharebox_reddit",
						"std" => "1",
						"type" => "checkbox"); //Done Change	
$of_options[] = array( "name" => "Email",
						"desc" => "فعالسازی اشتراک گذاری توسط email",
						"id" => "sharebox_email",
						"std" => "1",
						"type" => "checkbox"); //Done Change	
		
		
		//Extra
		//////// Theme Updates Options//////////////
		$of_options[] = array( 	"name" 		=> "اضافی",
								"type" 		=> "heading"
						);
		
		$of_options[] = array( "name" => "به روزرسانی قالب",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>به روزرسانی قالب</h3>",
							"icon" => false,
							"type" => "info");
		$of_options[] = array( "name" => "نام کاربری تم فارست",
								"desc" => "Ex: janxcode",
								"id" => "envato_username",
								"std" => "",
								"type" => "text"); //Done Change
								
		$of_options[] = array( "name" => "کد API تم فارست",
								"desc" => "Ex: XXXXXXXXXXXXXXXXXXXXXX",
								"id" => "envato_apikey",
								"std" => "",
								"type" => "text"); //Done Change
								
								
		$of_options[] = array( "name" => "Mailchimp",
							"desc" => "",
							"id" => "header_info",
							"std" => "<h3 style='margin: 0'>Mailchimp</h3>",
							"icon" => false,
							"type" => "info");
		$of_options[] = array( "name" => "کد Api",
								"desc" => "کد Api افزونه Mailchimp را تایپ کنید., <a href='http://kb.mailchimp.com/accounts/management/about-api-keys'>کد خود را دریافت کنید.</a>",
								"id" => "mailchimp_apikey",
								"std" => "",
								"type" => "text"); //Done Change
								
		$of_options[] = array( "name" => "ID لیست",
								"desc" => "id لیست Mailchimp را تایپ کنید, <a href='http://kb.mailchimp.com/article/how-can-i-find-my-list-id'>کد خود را دریافت کنید.</a>",
								"id" => "mailchimp_id",
								"std" => "",
								"type" => "text"); //Done Change
		
		
		
		// Custom Css
								
		 $of_options[] = array( "name" => "css سفارشی",
					"type" => "heading");
				$of_options[] = array( "name" => "سبک css سفارشی",
					"desc" => "",
					"id" => "advanced_css_intro",
					"std" => "<h3 style='margin: 0;'>سبک css سفارشی</h3>",
					"icon" => false,
					"type" => "info");
				$of_options[] = array( "name" => "کد css",
					"desc" => "سبک css سفارشی خود را در این کادر وارد کنید، ممکن است شما به استفاده از آن نیاز داشته باشید! در برخی موارد برای نادیده گرفتن css پیش فرض ضروری است.",
					"id" => "custom_css_style",
					"std" => "",
					"type" => "textarea");
					
		
		// Backup Options
		$of_options[] = array( "name" => "تنظیمات بکاپ",
								"type" => "heading"
								);
		$of_options[] = array( "name" => "تنظیمات بکاپ و بازیابی",
								"id" => "of_backup",
								"std" => "",
								"type" => "backup",
								"desc" => 'شما می توانید از دو دکمه زیر برای تهیه نسخه پشتیبان تنظیمات کنونی خود استفاده کنید، و سپس در زمان آتی آن را بازگردانی نمایید. این مورد در مواقعی که شما نیاز به تست تنظیمات هستید اما مایل به باگردانی تنظیمات قدیمی می باشید مفید خواهد بود.',
								);
		$of_options[] = array( "name" => "انتقال اطلاعات تنظیمات قالب",
								"id" => "of_transfer",
								"std" => "",
								"type" => "transfer",
								"desc" => 'شما می توانید اطلاعات تنظیمات ذخیره شده را به وسیله کپی کردن متن درون کادر، بین موارد نصب شده مختلف انتقال دهید. برای وارد کردن اطلاعات از یک نسخه نصب شده به نسخه دیگر کافی است اطلاعات قبلی درون کادر را با اطلاعات جدید جایگزین کرده و بر روی "تنظیمات ورود" کلیک کنید.',
								);
								
			}//End function: of_options()
		}//End chack if function exists: of_options()
?>
