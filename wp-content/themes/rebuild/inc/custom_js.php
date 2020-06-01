<?php function rebuild_custom_js(){
	$rebuild_data =  rebuild_globals(); ?>
<script type="text/javascript">
 
    jQuery(document).ready(function($){				
		var prettyPhoto_parameters = {
            <?php if($rebuild_data["animation_speed"]): ?>
			animation_speed: '<?php echo strtolower($rebuild_data["animation_speed"]); ?>',
			<?php endif; ?>
            slideshow: false, /* false OR interval time in ms */
            //autoplay_slideshow: <?php if($rebuild_data["autoplay_slideshow"]) { echo 'true'; } else { echo 'false'; } ?>, /* true/false */
            <?php if($rebuild_data["lightbox_opacity"]): ?>
			opacity: <?php echo esc_attr($rebuild_data['lightbox_opacity']); ?>,
			<?php endif; ?>
            show_title: <?php if($rebuild_data["lightbox_show_title"]) { echo 'true'; } else { echo 'false'; } ?>, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            default_width: 920,
            default_height: 540,
           counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            <?php if($rebuild_data["slideshow_theme"]): ?>
			theme: '<?php echo esc_attr($rebuild_data['slideshow_theme']); ?>', 
			<?php endif; ?>
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: <?php if($rebuild_data["overlay_gallery"]) { echo 'true'; } else { echo 'false'; } ?>
		};	
		
		        
		<?php if($rebuild_data["prettyphoto_auto_link"]): ?>
			jQuery('a[href$=jpg], a[href$=JPG], a[href$=jpeg], a[href$=JPEG], a[href$=png], a[href$=gif], a[href$=bmp]:has(img),a[class^="prettyPhoto"],a[rel^="prettyPhoto"]').prettyPhoto(prettyPhoto_parameters);
		<?php endif; ?>
		
		jQuery('a[class^="prettyPhoto"],a[rel^="prettyPhoto"]').prettyPhoto(prettyPhoto_parameters); //prettyPhoto_parameters
			
	 });
		
	
</script>
	
<?php }
add_action( 'wp_head', 'rebuild_custom_js', 100 );
?>