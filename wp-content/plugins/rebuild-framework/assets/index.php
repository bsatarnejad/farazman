<?php
require_once($get_plugin_dir_path.'/assets/tinymce_button.php');
require_once($get_plugin_dir_path.'/assets/inc/cpt.php');
require_once($get_plugin_dir_path.'/assets/inc/functions.php');

//One-Click Importer
require_once($get_plugin_dir_path.'/one-click-importer/rebuild-importer.php');


function the_content_filter($content) {
// array of custom shortcodes requiring the fix
$block = join("|",array("media_center_group","media_center","counter_up_group","counter_up","testimonials","service_box_group","service_box","partners","partners_logo","subscribe","section_title_group","section_title","contact_us","map","tabs_group","tabs","tabs_title","tabs_content","countdown","container",'one_eight','one_fourth','one_third' ,'two_thirds' , 'three_fourths' , 'one_six' , 'one_five' , 'one_eleven' ,'image_placeholder' ,'accordion_group' ,'accordion' ,'request_quote_form' , 'price_table_group' , 'price_table' , 'teammember' , 'process' , 'process_group' , 'buttons' , "lists_group" , "lists" , "progress" , "progress_group" , "table" , "tr" , "td" , "project_progress_group" , "project_progress" , "tag_box" , "dropcaps" , "mark" , "blockquote" , "flexslider_group" , "flexslider" , "table"  , "tr"  , "td" , "projects" , "content_box" , "contact_details","gridimage","gridimage_group","alerts" ,"dividers" ,"banner_fx","event" ,"interactive_map" , "progress_bar" ,"modalbox" ,"v_timeline"));
// opening tag
$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
// closing tag
$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
return $rep;
} 

add_filter("the_content", "the_content_filter");
//Shortcodes Include
include('shortcodes/media_center.php');
include('shortcodes/counter_up.php');
include('shortcodes/price_table.php');
include('shortcodes/testimonials.php');
include('shortcodes/service_box.php');
include('shortcodes/partners_logo.php');
include('shortcodes/subscribe.php');
include('shortcodes/section_title.php');
include('shortcodes/container.php');
include('shortcodes/tabs.php');
include('shortcodes/portfolio.php');
include('shortcodes/columns.php');
include('shortcodes/tag_box.php');
include('shortcodes/map.php');
include('shortcodes/image_placeholder.php');
include('shortcodes/accordion.php');
include('shortcodes/our_team.php');
include('shortcodes/process.php');
include('shortcodes/buttons.php');
include('shortcodes/lists.php');
include('shortcodes/project_progress.php');
include('shortcodes/dropcaps.php');
include('shortcodes/mark.php');
include('shortcodes/blockquote.php');
include('shortcodes/flexslider.php');
include('shortcodes/table.php');
include('shortcodes/projects.php');
include('shortcodes/content_box.php');
include('shortcodes/contact_us.php');
include('shortcodes/contact_details.php');
include('shortcodes/grid-image.php');
include('shortcodes/alerts.php');
include('shortcodes/dividers.php');
include('shortcodes/banner_fx.php');
include('shortcodes/interactive_map.php');
include('shortcodes/flipbox.php');
include('shortcodes/progress_bar.php');
include('shortcodes/modalbox.php');
include('shortcodes/animated_title.php');
include('shortcodes/v-timeline.php');
include('shortcodes/grid_counter.php');
include('shortcodes/quote_box.php');
include('shortcodes/owl-slider.php');

?>