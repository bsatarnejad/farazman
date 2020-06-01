<?php 
	/* content_box  ---------------------------------------------*/
	
	add_shortcode('content_box', 'rebuild_content_box');
	
	function rebuild_content_box($atts, $content = null) { 
		extract(shortcode_atts(array(
				'title' => 'دانلود',
				'file_name' => 'بروشور.pdf',
				'file_link' => '#1',
				'icon' => 'fa-diamond',
				'file_type' => ''
				), $atts)); 
		 
		
		//initial variables
		$out='';
		
		
		$file_type_icon = "";
		
		if($file_type =="pdf") {
		$file_type_icon ="fa-file-pdf-o";
		} elseif ($file_type =="word") {
		$file_type_icon ="fa-file-word-o";
		}
		
		
		//initial variables
		$out='
		<div class="jx-rebuild-content-box">
			<div class="jx-rebuild-item">
				<a href="'.$file_link.'">
					<i class="fa '.$icon.' bg-icon"></i>
					<h5>'.$title.'</h5>                           
					<div class="jx-rebuild-link-attachment"><i class="file-icon fa '.$file_type_icon.'"></i>'.$file_name.'</div>
				</a>
			</div>
		</div>
		'; 
			
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_content_box' );
	
	
	function vc_content_box() {	
		vc_map(array(
      "name" => esc_html__( "کادر محتوا", "TEXT_DOMAIN" ),
      "base" => "content_box",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_content.png',
      "category" => esc_html__( "شرت کدهای ReBuild", "TEXT_DOMAIN"),
	  "description" => __('Add content_box','TEXT_DOMAIN'),
      "params" => array(
	  
	  
		 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "عنوان", "TEXT_DOMAIN" ),
            "param_name" => "title",
			"value" => "دانلود",
            "description" => esc_html__( "افزودن عنوان", "TEXT_DOMAIN" )
         ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "نام فایل", "TEXT_DOMAIN" ),
            "param_name" => "file_name",
			"value" => "بروشور.pdf",
            "description" => esc_html__( "افزودن نام فایل", "TEXT_DOMAIN" )
         ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "لینک فایل", "TEXT_DOMAIN" ),
            "param_name" => "file_link",
			"value" => "#",
            "description" => esc_html__( "افزودن لینک فایل", "TEXT_DOMAIN" )
         ),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'آیکون', 'TEXT_DOMAIN' ),
			'param_name' => 'icon',
			'settings' => array(
			'emptyIcon' => false, // default true, display an "EMPTY" icon?
			'type' => 'linecons',
			'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'description' => __( 'انتخاب آیکون', 'TEXT_DOMAIN' ),
			'save_always' => true
		),	
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("انتخاب نوع فایل",'rebuild'),
			 "param_name" => "file_type",
			 "value" => array(   
					__('انتخاب نوع فایل', 'TEXT_DOMAIN') => 'file-type',
					__('PDF', 'TEXT_DOMAIN') => 'pdf',
					__('فایل WORD', 'TEXT_DOMAIN') => 'word',
					),
		)
		 
		
      )
   )); 
	}
	
	
	
	
	
	
?>