<?php 

$rebuild_data =  rebuild_globals();

$theme_color=$rebuild_data['theme_color'];
$theme_color_hex=rebuild_hex2rgb($theme_color);
// ----------- STYLES -----------
if($theme_color && $theme_color!="#ffb300"): ?>
/* ------------------------------------------------------------------------ */
/* Color
/* ------------------------------------------------------------------------ */
.jx-rebuild-section-title-1 .jx-rebuild-seperator-icon i , .jx-rebuild-servicelist-2 .servicelist-item:hover .icon i , .jx-rebuild-protfolio .category-menu ul li a:hover , 
.jx-rebuild-newsletter .white-column .title , .jx-rebuild-footer-1 .jx-rebuild-footer h3.jx-rebuild-section-title-1 .jx-rebuild-seperator-icon i , .jx-rebuild-servicelist-2 .servicelist-item:hover .icon i , .jx-rebuild-protfolio .category-menu ul li a:hover , .jx-rebuild-newsletter .white-column .title , .jx-rebuild-footer-1 .jx-rebuild-footer h3 , .jx-rebuild-widget-recent-post .jx-rebuild-btn-default:hover , .jx-rebuild-footer-section .jx-rebuild-about .jx-rebuild-btn-default:hover , .jx-rebuild-topbar .jx-rebuild-right-topbar li span , .jx-rebuild-topbar .jx-rebuild-right-topbar li a:hover i , .menu > li > a:hover , .jx-rebuild-widget-recent-post ul li a:hover , ul.default li::before , .jx-rebuild-page-subhead .breadcrumb , .menu .submenu li:hover > a,.sbOptions a:hover, .sbOptions a:focus, .sbOptions a.sbFocus,.jx-rebuild-blog-more a:hover , .jx-rebuild-header .header-info ul , .jx-rebuild-tetimonials-1 .description::before , .jx-rebuild-blog-tag li:hover a , .jx-rebuild-sercvice-list li::before , .menu li.has-child > a::after,.jx-rebuild-servicebox-item:hover .jx-rebuild-image-title-over a i,.jx-rebuild-servicebox-item:hover .jx-rebuild-image-title-over a , .jx-rebuild-blog-2 .readmore i , .jx-rebuild-protfolio .jx-rebuild-portfolio-filter a.current , .jx-rebuild-tetimonials-2 i , #wp-calendar a , .jx-rebuild-author-name a , .jx-rebuild-section-title-6 .jx-rebuild-seperator-icon i , .jx-rebuild-section-title-5 .jx-rebuild-seperator-icon i , .jx-rebuild-section-title-7 .jx-rebuild-seperator-icon i , .jx-rebuild-flipbox-2 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover , .jx-rebuild-flipbox-1 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover , .jx-rebuild-flipbox-3 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover , .jx-rebuild-blockquote .quote-b::before , .menu .submenu li.menu-item-has-children > a::after , .woocommerce .star-rating span , .eg-rebuild-portfolio-element-0:hover , .eg-rebuild-portfolio-element-1:hover , .woocommerce a.button:hover , .woocommerce ul.products li.product .price , #sidebar .widget_product_search input[type="submit"]:hover , .woocommerce button.button:hover , .sbSelector:link , .jx-rebuild-mainmenu .submenu li.menu-item-has-children > a::after , .jx-rebuild-servicebox-item:hover .icon , .jx-rebuild-tetimonials-5 .description::before,.jx-rebuild-tetimonials-4.jx-dark .description::before {
	color: <?php echo esc_attr( $theme_color ) ?> !important;
}

.jx-rebuild-blog-1 .jx-rebuild-blog-title-metabox .jx-rebuild-date .day , .jx-rebuild-project-nav .jx-rebuild-project-nav-icons li i:hover , ul li span.fa {
	color: <?php echo esc_attr( $theme_color ) ?> !important;
}


.jx-rebuild-page-title a  , .jx-rebuild-breadcrumb a , .jx-rebuild-team-member-4 .team-social li a i , .jx-rebuild-partner-logo-list .content-position .web_link a , .jx-rebuild-blog-1 .jx-rebuild-blog-title-metabox .jx-rebuild-blog-meta li a , .nav-previous a , .jx-rebuild-copy-right a , .jx-rebuild-blog-image .jx-rebuild-blog-btns-hover i , .jx-rebuild-servicebox-item:hover .icon  , .contact-submit button:hover , .contact-submit button:hover i , .jx-rebuild-servicelist-4 .icon i , .jx-rebuild-partner-logo li:hover a span , .jx-rebuild-related-title a:hover , #sidebar .widget_categories li a , .woocommerce .pagination .page-numbers li .page-numbers , .jx-rebuild-pagination .page-numbers , .jx-rebuild-image-placholder .title:hover,.jx-rebuild-sidebar-address li i {
	color: <?php echo esc_attr( $theme_color ) ?>!important;
}
/* ------------------------------------------------------------------------ */
/* Background
/* ------------------------------------------------------------------------ */
::selection 
{
	background:<?php  echo esc_attr( $theme_color ) ?> !important;
}
::-moz-selection
{
	background:<?php echo esc_attr( $theme_color ) ?> !important;
}
.jx-rebuild-servicebox-2 .jx-rebuild-servicebox-item .jx-rebuild-image-wrapper .jx-rebuild-image-title-over a , .shortcode_tab_e.jx-rebuild-white-tab.jx-rebuild-arrow-tab ul li , .jx-rebuild-list-group.square-light span , .jx-rebuild-list-group.circle-light span , .jx-rebuild-single-point > a , .jx-rebuild-flipbox-2 .jx-rebuild-flipbox-item , .jx-rebuild-flipbox-3 .jx-rebuild-flipbox-item , .jx-rebuild-quote-smallbox form input.wpcf7-submit:hover , .jx-rebuild-quote-smallbox .jx-heading , .contact-submit button , .jx-rebuild-servicebox-2 .readmore .plus-icon , .jx-rebuild-tagline-box-2 .button , .jx-rebuild-servicelist-4 .readmore , .woocommerce ul.products .item-product .add_to_cart_button , .jx-rebuild-page-title span , .jx-rebuild-blog-more a , #sidebar .widget_product_search input[type="submit"] , .woocommerce-page .woocommerce button.button , .jx-rebuild-big-iconed-button a:hover , .wpcf7-form-control.wpcf7-submit , .woocommerce ul.products .item-product .add_to_cart_button , .jx-rebuild-image-placholder .title , .jx-default-bg , .jx-defualt-bg , .jx-rebuild-servicebox-3 .title-hr {
	background:<?php echo esc_attr( $theme_color ) ?>;
}
.jx-rebuild-container.jx-rebuild-darkgrey-bg .jx-rebuild-tagline-box-slope , .jx-rebuild-skillsbar-1 .skillbar-bar , .jx-rebuild-accordion-3 .circle .open .title, .jx-rebuild-accordion-3 .circle .title:hover , .jx-rebuild-team-member-1 .plus-icon , .jx-rebuild-team-member-1 .team-social li i , .jx-rebuild-newsletter .darkgrey-column .form .jx-rebuild-submit , .jx-rebuild-price-1 .jx-rebuild-button .price-btn , .jx-rebuild-footer-newsletter .jx-rebuild-form-wrapper button , .jx-rebuild-container.jx-rebuild-grey-bg .jx-rebuild-subhead-slope , .jx-rebuild-contact-form input.jx-rebuild-submit,.jx-rebuild-tags-footer ul li:hover,.grid-item,.jx-rebuild-sidebar-menu ul li.active,.jx-rebuild-quote-box .contact-submit button,.jx-rebuild-pagination .page-number.current,.jx-rebuild-pagination .page-number:hover,.search-input button,.jx-rebuild-sidebar-tags li:hover , .jx-rebuild-header-search , .jx-rebuild-tetimonials-1 .jx-rebuild-testimonial-details , .jx-rebuild-counter-up-box span , .jx-rebuild-process .jx-rebuild-process-step , .menu .submenu li:hover > a , .jx-rebuild-btn-default:hover i.btn-icon-right , .grid-item .jx-rebuild-portfolio-plus-hover i, .portfolio-item .jx-rebuild-portfolio-plus-hover i , .jx-rebuild-page-title .jx-rebuild-breaducrumb span , .jx-rebuild-completed-prjcts-info , .jx-rebuild-project-progress .skillbar .percent-bg , .jx-rebuild-project-progress .jx-rebuild-project-image .image-hover , .jx-rebuild-sidebar-menu ul li:hover a , .jx-rebuild-sidebar-menu ul li.current_page_item a , .woocommerce .pagination .page-numbers li span.current , .woocommerce ul.products li.product .onsale::after , .woocommerce .pagination .page-numbers li a:hover , .woocommerce-page #sidebar .product-categories li:hover , .jx-rebuild-accordion .none .open > .title .jx-rebuild-accordion-icon::after , .style_b tr:hover , .jx-rebuild-servicebox-1.bg_color , .jx-rebuild-pagination span.page-numbers.current , .jx-rebuild-pagination .page-numbers:hover , .jx-rebuild-servicelist-1 .icon > div , .jx-rebuild-blog-2 .date-position , .jx-rebuild-quote-smallbox .jx-heading , .style_b tr:hover , .jx-rebuild-gredient-1 , .jx-rebuild-mainmenu .submenu li:hover > a , .woocommerce-page .woocommerce input.button , .jx-rebuild-tetimonials-4 .description , .jx-rebuild-tetimonials-3 , .jx-rebuild-price-2 .title , .jx-rebuild-price-3 .title , .jx-rebuild-price-5 .title , .jx-rebuild-price-5 .price
{
	background:<?php echo esc_attr( $theme_color ) ?> !important;
}
tr:hover , .woocommerce-page.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
	background:<?php  echo esc_attr( $theme_color ) ?> !important;
}
#sidebar .widget_search input.search-submit , #sidebar .widget_tag_cloud a:hover , .jx-rebuild-accordion .circle .open .title, .jx-rebuild-accordion .circle .title:hover , .jx-rebuild-md-content h3 {
	background:<?php  echo esc_attr( $theme_color ) ?> !important;
}
	
/* ------------------------------------------------------------------------ */
/* Background Color
/* ------------------------------------------------------------------------ */
.jx-rebuild-section-title-4 .jx-rebuild-seperator-hr , .dropcap.dark {
	background-color: <?php  echo esc_attr( $theme_color ) ?> !important;
}
.jx-rebuild-default-bg , .countup_hr , .jx-rebuild-blog-1 .hr-line , table th,.jx-rebuild-caption-big-icon i,.jx-rebuild-quote-rquest .jx-rebuild-button a,.jx-rebuild-content-box .jx-rebuild-item:hover,.jx-rebuild-request-quote .jx-rebuild-seperator-hr , .jx-rebuild-row-badge ,.jx-rebuild-section-title-3 .jx-rebuild-seperator-hr , .jx-rebuild-section-title-4 .jx-rebuild-seperator-hr , .woocommerce-page.woocommerce .widget_price_filter .ui-slider .ui-slider-handle , .jx-rebuild-quote-rquest .jx-rebuild-quote-button a , .jx-rebuild-widget-request-quote .jx-rebuild-quote-button a , .jx-rebuild-price-form .jx-rebuild-price-more-info , .jx-rebuild-price-form input[type="submit"],.jx-rebuild-price-4 .price
{
	background-color: <?php  echo esc_attr( $theme_color ) ?> !important;
}
.jx-rebuild-flipbox-1 .jx-rebuild-flipbox-backitem , .jx-rebuild-section-title-2 .jx-rebuild-seperator-hr , .jx-rebuild-blog-2 .hr-line , .jx-rebuild-skillsbar-4 .skillbar-bar , .eg-rebuild-style-1-element-2 , .eg-rebuild-portfolio-container,.rebuild-tp-shape {
    background-color: <?php  echo esc_attr( $theme_color ) ?> !important;
}
.shortcode_tab_e.jx-rebuild-white-tab li.resp-tab-active , .woocommerce-cart.woocommerce-page .woocommerce a.button.alt , .woocommerce-checkout.woocommerce-page .woocommerce input.button.alt {
    background-color: <?php  echo esc_attr( $theme_color ) ?>;
}
.eg-rebuild-style-1-element-2:hover {
    background-color: #333333 !important;
}
/* ------------------------------------------------------------------------ */
/* Background RGBA Color
/* ------------------------------------------------------------------------ */
.jx-rebuild-tint:before , .jx-rebuild-project-progress .jx-rebuild-project-view-image .image-hover , .tp-rightarrow.custom.tparrows , .tp-leftarrow.custom.tparrows:hover,.jx-overlayer-slope,.grid-item .jx-rebuild-portfolio-hoverlayer,.jx-default-bg-transparent {
	background: rgba(<?php echo esc_attr( $theme_color_hex[0] ); ?>, <?php echo esc_attr( $theme_color_hex[1] ); ?>, <?php echo esc_attr( $theme_color_hex[2] ); ?>, 0.90) !important;
}
.jx-rebuild-blog-image .jx-rebuild-image-hoverlay , .jx-rebuild-team-member-6 .plus-hover .team-image-overlay , .jx-rebuild-team-member-4 .team-member-item:hover .team-image-overlay , .jx-rebuild-price-2 .price {
	background: rgba(<?php echo esc_attr( $theme_color_hex[0] ); ?>, <?php echo esc_attr( $theme_color_hex[1] ); ?>, <?php echo esc_attr( $theme_color_hex[2] ); ?>, 0.80) !important;	
}
/* ------------------------------------------------------------------------ */
/* Border Color
/* ------------------------------------------------------------------------ */
.jx-rebuild-servicebox-item:hover .readmore .plus-icon , .jx-rebuild-servicebox-item:hover .icon i::after , .jx-rebuild-servicelist-2 .servicelist-item:hover .icon i::after , .jx-rebuild-skillsbar-1 .skillbar , .menu > li > a:hover , .jx-rebuild-servicelist-1 .icon , .grid-item .jx-rebuild-portfolio-plus-hover i::after , .jx-rebuild-small-point.jx-rebuild-single-point > a , .jx-rebuild-section-title-7 .jx-rebuild-title , .jx-rebuild-widget-request-quote .jx-rebuild-quote-button a , .jx-rebuild-headline.jx-rebuild-border , .jx-rebuild-image-placholder .title:hover , .jx-rebuild-servicebox-3 .jx-rebuild-servicebox-item:hover .icon
{
	border-color:<?php  echo esc_attr( $theme_color ) ?> !important;
}

.jx-rebuild-tetimonials-4 .description::after , .jx-rebuild-price-2 .price::after {
	border-color: <?php  echo esc_attr( $theme_color ) ?> transparent transparent transparent;
}


/* ------------------------------------------------------------------------ */
/* Border Left Color
/* ------------------------------------------------------------------------ */
.jx-rebuild-blockquote .quote-a.quote-border , .jx-rebuild-row-badge .jx-rebuild-badge-shape , .jx-rebuild-section-title-6 .jx-rebuild-title {
	border-left-color:<?php  echo esc_attr( $theme_color ) ?> !important;
}
/* ------------------------------------------------------------------------ */
/* Border Right Color
/* ------------------------------------------------------------------------ */
.jx-rebuild-row-badge .jx-rebuild-badge-shape , .jx-rebuild-section-title-6 .jx-rebuild-title {
	border-right-color:<?php  echo esc_attr( $theme_color ) ?> !important;
}
/* ------------------------------------------------------------------------ */
/* Border Top Color
/* ------------------------------------------------------------------------ */
.menu > li:hover , .shortcode_tab_e li.resp-tab-active , .jx-rebuild-mainmenu > li:hover,.jx-rebuild-price-4 .price::after {
	border-top-color:<?php  echo esc_attr( $theme_color ) ?> !important;
}
/* ------------------------------------------------------------------------ */
/* Border Bottom Color
/* ------------------------------------------------------------------------ */
.jx-rebuild-section-title-1 .jx-rebuild-left-border , .jx-rebuild-section-title-1 .jx-rebuild-right-border , .jx-rebuild-servicelist-1 .category::after , .menu li .submenu li.col , .jx-rebuild-section-title-5 .jx-rebuild-left-border , .jx-rebuild-section-title-5 .jx-rebuild-right-border , .jx-rebuild-servicebox-1 .top_grey_border .top
 {
	border-bottom-color:<?php  echo esc_attr( $theme_color ) ?> !important;
 }

   
<?php		
endif;
?>

 
 
<?php 

$theme_base_color=$rebuild_data['theme_base_color'];
$theme_base_color_hex=rebuild_hex2rgb($theme_base_color); 
 
if($theme_base_color && ($theme_base_color!="#333" or $theme_base_color!="#333333")): ?>
 
 
 /* ------------------------------------------------------------------------ */
/* Base Skin - Color
/* ------------------------------------------------------------------------ */

.minimal-light .esg-filterbutton,
.minimal-light .esg-navigationbutton,
.minimal-light .esg-sortbutton,
.minimal-light .esg-cartbutton a , .jx-rebuild-contact-form input , .jx-rebuild-contact-form textarea , .jx-rebuild-more-info p 
{
	color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}

.jx-rebuild-tagline-box-1.jx-rebuild-dark .box-content p , .jx-rebuild-tagline-box-3.jx-rebuild-dark h2 , .jx-rebuild-tagline-box-4 .box-content .button:hover a , .jx-rebuild-tagline-box-4.jx-rebuild-dark h1 , .jx-rebuild-tagline-box-4.jx-rebuild-dark .box-content p , .jx-rebuild-counter-up .count_number , .jx-rebuild-counter-up .counter_text , .jx-rebuild-counter-up-box span , .jx-rebuild-counter-up-box span.comma , .jx-rebuild-counter-up-2 .title , .jx-rebuild-counter-up-2 .jx-rebuild-title i , .jx-rebuild-price-1 .price , .jx-rebuild-price-1 .jx-rebuild-price-footer.jx-rebuild-button , .jx-rebuild-servicebox-1 .title , .jx-rebuild-servicebox-1 .readmore .plus-icon , .jx-rebuild-servicebox-2 .jx-rebuild-servicebox-item .jx-rebuild-image-wrapper .jx-rebuild-image-title-over span i , .jx-rebuild-servicebox-3 .title , .jx-rebuild-servicebox-3 .icon , .jx-rebuild-servicebox-3 .readmore .plus-icon , .jx-rebuild-servicelist-1 .category , .jx-rebuild-servicelist-1 .icon {} .jx-rebuild-servicelist-1 .icon i , .jx-rebuild-servicelist-2 .title , .jx-rebuild-dark .jx-rebuild-servicelist-3 div , .jx-rebuild-servicelist-3.jx-dark .discription , .jx-rebuild-servicelist-4 .readmore:hover a , .jx-rebuild-team-member-1 .team-social li i , .jx-rebuild-newsletter .white-column .sub-title , .jx-rebuild-blog-2 .title a , .jx-rebuild-btn-default , .jx-rebuild-btn-default i.btn-icon-left, .jx-rebuild-btn-default i.btn-icon-right , .jx-rebuild-btn-default > span > span , .jx-rebuild-skillsbar-1 .skillbar-title , .jx-rebuild-process .jx-rebuild-process-step , .jx-rebuild-process .jx-rebuild-process-step div:after , .jx-rebuild-process .jx-rebuild-process-content .jx-rebuild-process-title , .jx-rebuild-process-2 .jx-rebuild-process-title , .jx-rebuild-process-2 .jx-rebuild-process-description , .jx-rebuild-accordion-3 .circle .jx-rebuild-accordion-icon::after , .jx-rebuild-accordion-3 .circle.right_icon .jx-rebuild-accordion-icon::after , .jx-rebuild-accordion-3 .circle.plus_sign .jx-rebuild-accordion-icon::after , .jx-rebuild-accordion-3 .circle.plus_sign.right_icon .jx-rebuild-accordion-icon::after , .jx-rebuild-accordion-3.jx-doubled-width .title , .jx-rebuild-accordion-3.jx-doubled-width .circle .title .jx-rebuild-accordion-icon::after , .jx-rebuild-protfolio .jx-rebuild-portfolio-filter a.current , .jx-rebuild-protfolio .jx-rebuild-portfolio-filter ul li a , .jx-rebuild-tetimonials-2 .description , .jx-rebuild-tetimonials-2 .name , .jx-rebuild-tetimonials-1 .jx-rebuild-testimonial-details .position , .jx-rebuild-blockquote .quote-a .author_name , .jx-rebuild-blockquote .quote-b .author_name , .jx-rebuild-content-box .jx-rebuild-item h5 , .jx-rebuild-content-box .jx-rebuild-item:hover a , .jx-rebuild-content-box .jx-rebuild-item:hover h5 , .jx-rebuild-quote-smallbox form input.wpcf7-submit:hover , .jx-rebuild-project-progress .title , .jx-rebuild-project-progress .jx-rebuild-project-view-contents .title a , .jx-rebuild-project-progress .title a , .jx-rebuild-button , .jx-rebuild-xlarge-bt.jx-rebuild-button-icon-1 i , .jx-rebuild-large-bt.jx-rebuild-button-icon-1 i , .jx-rebuild-medium-bt.jx-rebuild-button-icon-1 i , .jx-rebuild-small-bt.jx-rebuild-button-icon-1 i , .jx-rebuild-btn-default.jx-rebuild-small-bt > span > span , .jx-rebuild-btn-default.jx-rebuild-medium-bt > span > span , .jx-rebuild-btn-default.jx-rebuild-large-bt > span > span , .jx-rebuild-button-fx-11:hover , .resp-tabs-list li , .shortcode_tab_a .resp-vtabs .resp-tabs-list li , .shortcode_tab_e ul li , .shortcode_tab_e.jx-rebuild-white-tab.jx-rebuild-arrow-tab li.resp-tab-active , .shortcode_tab_e.jx-rebuild-white-tab .resp-tabs-list li.resp-tab-active:hover , .jx-rebuild-alert-notification .alert-with-one-button.jx-rebuild-alert-danger , .jx-rebuild-alert-notification .alert-with-one-button.jx-rebuild-alert-info , .jx-rebuild-alert-notification .alert-with-one-button.jx-rebuild-alert-warning , .jx-rebuild-alert-notification .alert-with-one-button.jx-rebuild-alert-success , .jx-rebuild-alert-notification .alert-with-two-button.jx-rebuild-alert-danger , .jx-rebuild-alert-notification .alert-with-two-button.jx-rebuild-alert-info , .jx-rebuild-alert-notification .alert-with-two-button.jx-rebuild-alert-warning , .jx-rebuild-alert-notification .alert-with-two-button.jx-rebuild-alert-success , .jx-rebuild-skillsbar-3 .skillbar-title , .jx-rebuild-skillsbar-3 .percenttext , .jx-rebuild-skillsbar-3.jx-rebuild-light .skillbar-title , .jx-rebuild-skillsbar-4 .skillbar-title , .jx-rebuild-skillsbar-4 .percenttext , .jx-rebuild-skillsbar-6 .skillbar-title , .jx-rebuild-skillsbar-6 .percenttext , .jx-rebuild-md-content , .jx-rebuild-v-timeline .date-position .date , .jx-rebuild-grid-counter .count-number , .jx-grid-count .count , .jx-rebuild-image-placholder .title , .jx-rebuild-image-placholder .title:hover,
.jx-rebuild-tetimonials-4 .description::before {
	color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}

 
/* ------------------------------------------------------------------------ */
/* Base Skin - Background
/* ------------------------------------------------------------------------ */

.jx-rebuild-tagline-box-1 .button , .jx-rebuild-tagline-box-4 .box-content .button , .jx-rebuild-price-1 .jx-rebuild-button .price-btn , .jx-rebuild-price-1 .jx-rebuild-button .price-btn:hover , .jx-rebuild-servicebox-1 .icon , .jx-rebuild-servicebox-item:hover .readmore .plus-icon , .jx-rebuild-servicebox-item:hover .readmore .plus-icon , .jx-rebuild-servicelist-2 .icon.radius , .jx-rebuild-servicelist-2 .icon.no-radius , .jx-rebuild-servicelist-3:after , .jx-rebuild-team-member-6 .team-social li i , .jx-rebuild-newsletter .darkgrey-column , .jx-rebuild-blog-image .flex-control-paging li a:hover , .jx-rebuild-skillsbar-1 .percenttext , .jx-rebuild-process .vertical-line , .portfolio-item , .contact-submit button:hover , .contact-submit button:hover i , .jx-rebuild-partner-logo li a span , .jx-rebuild-protfolio-details .flexslider .flex-control-paging li > a , .jx-rebuild-service-flexslider .flexslider .flex-control-paging li > a , .wpcf7-form-control.wpcf7-submit:hover , .jx-rebuild-quote-box .contact-submit button:hover , .jx-rebuild-quote-smallbox form input.wpcf7-submit , .jx-rebuild-project-progress .skillbar , .jx-rebuild-project-progress .skillbar , .jx-rebuild-btn-default:hover , .jx-rebuild-button:hover , .jx-rebuild-normal-bt:hover , .jx-rebuild-outline:hover , .jx-rebuild-button-fx-1::after , .jx-rebuild-button-fx-2::before , .jx-rebuild-button-fx-3::before , .jx-rebuild-button--nuka::before,
.jx-rebuild-button--nuka::after , .jx-rebuild-button-fx-6::before , .jx-rebuild-button-fx-9::before , .jx-rebuild-button-fx-9::after , .jx-rebuild-button-fx-10::before , .jx-rebuild-button-fx-11::before , .jx-rebuild-button-fx-12:hover , .jx-rebuild-flipbox-1 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover , .jx-rebuild-flipbox-2 .jx-rebuild-flipbox-item i:before , .jx-rebuild-flipbox-2 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover , .jx-rebuild-flipbox-3 .jx-rebuild-flipbox-item i:before , .jx-rebuild-flipbox-3 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover , .jx-rebuild-skillsbar-6 .skillbar-bar ,.jx-rebuild-price-4 .title , .jx-rebuild-servicebox-3.with-curvebg
{
	background:<?php echo esc_attr( $theme_base_color ) ?> !important;
}


/* ------------------------------------------------------------------------ */
/* Base Skin - Background Color
/* ------------------------------------------------------------------------ */


.jx-rebuild-button-fx-3:hover::before , .jx-rebuild-button-fx-7:hover , .jx-rebuild-button-fx-8:hover , .jx-rebuild-alert-notification .alert-btn:hover , .jx-rebuild-flipbox-2 .jx-rebuild-flipbox-backitem , .jx-rebuild-flipbox-3 .jx-rebuild-flipbox-backitem ,.jx-rebuild-tetimonials-4.jx-dark .description
{
	background-color:<?php echo esc_attr( $theme_base_color ) ?> !important;
}
 
 
.grid-item .jx-rebuild-portfolio-hoverlayer,.jx-default-base-transparent {
	background: rgba(<?php echo esc_attr( $theme_base_color_hex[0] ); ?>, <?php echo esc_attr( $theme_base_color_hex[1] ); ?>, <?php echo esc_attr( $theme_base_color_hex[2] ); ?>, 0.90) !important;
}
/* ------------------------------------------------------------------------ */
/* Base Skin - Border Color
/* ------------------------------------------------------------------------ */

.jx-rebuild-tagline-box-4 .box-content .button:hover , .jx-rebuild-servicebox-1 .readmore .plus-icon , .jx-rebuild-servicebox-3 .readmore .plus-icon , .jx-rebuild-process .jx-rebuild-process-step div:after , .jx-rebuild-process-2 .jx-rebuild-process-title::after , .jx-rebuild-protfolio-details .flexslider .flex-control-paging li > a.flex-active , .jx-rebuild-service-flexslider .flexslider .flex-control-paging li > a.flex-active , .jx-rebuild-normal-bt:hover , .jx-rebuild-outline:hover , .jx-rebuild-outline-animated:hover , .jx-rebuild-button-fx-3:hover , .jx-rebuild-button-fx-12:hover , .jx-rebuild-flipbox-1 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover , .jx-rebuild-flipbox-2 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover , .jx-rebuild-flipbox-3 .jx-rebuild-flipbox-backitem .readmore a .plus-icon:hover
{
	border-color:<?php echo esc_attr( $theme_base_color ) ?> !important;
}

.jx-rebuild-skillsbar-1 .percenttext:before
{
	border-color: <?php echo esc_attr( $theme_base_color ) ?> transparent;
} 
 
 
/* ------------------------------------------------------------------------ */
/* Base Skin - Border Left Color
/* ------------------------------------------------------------------------ */


.jx-rebuild-process-2 .jx-rebuild-process-description
{
	border-left-color:<?php echo esc_attr( $theme_base_color ) ?> !important;
}
 
 
/* ------------------------------------------------------------------------ */
/* Base Skin - Border Right Color
/* ------------------------------------------------------------------------ */


.jx-rebuild-tagline-box .jx-rebuild-line-seperator
{
    border-right-color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}



  
/* ------------------------------------------------------------------------ */
/* Base Skin - Box Shaidow
/* ------------------------------------------------------------------------ */


.jx-rebuild-button-fx-13:hover::before
{
    box-shadow: inset 0 0 0 1px <?php echo esc_attr( $theme_base_color ) ?> !important;
} 





/* ------------------------------------------------------------------------ */
/* Base Skin 2 - Color
/* ------------------------------------------------------------------------ */

.woocommerce-page #sidebar .product-categories li a:hover , .single-product .woocommerce-variation-price .price .amount , .jx-rebuild-mainmenu .submenu li:hover > a , .jx-rebuild-mainmenu li a:hover i.menu-icon , ul.jx-rebuild-list.circle.jx-light span 
{
    color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}

body .woocommerce-checkout.woocommerce-page .woocommerce table.shop_table th , .woocommerce-cart.woocommerce-page .woocommerce #respond input#submit.alt,
.woocommerce-cart.woocommerce-page .woocommerce a.button.alt,
.woocommerce-cart.woocommerce-page .woocommerce button.button.alt,
.woocommerce-checkout.woocommerce-page .woocommerce input.button.alt , .woocommerce-cart.woocommerce-page .cart_totals table th , .woocommerce-cart.woocommerce-page .woocommerce table.shop_table th , 
.woocommerce-page.woocommerce div.product form.cart .button , .shop_attributes th , .single-product.woocommerce div.product p.price, .woocommerce div.product span.price , .woocommerce .pagination .page-numbers li:hover a , .woocommerce .pagination .page-numbers li .page-numbers.current , .woocommerce .pagination .page-numbers li span.current , .woocommerce ul.products .item-product .add_to_cart_button , .woocommerce-page .woocommerce #respond input#submit,
.woocommerce-page .woocommerce a.button,
.woocommerce-page .woocommerce button.button,
.woocommerce-page .woocommerce input.button , 
.jx-rebuild-sidebar-recent-post .title , .jx-rebuild-sidebar-recent-post ul li a , .jx-rebuild-footer-section .widget_tag_cloud a:hover , .jx-rebuild-footer-section .widget_meta li:hover a , #sidebar .widget_pages ul li a , #sidebar .widget_pages ul li , #sidebar .jx-rebuild-widget-recent-post .title , #sidebar .jx-rebuild-widget-recent-post ul li a , #sidebar .widget_recent_entries li a , #sidebar .widget_archive li a , #sidebar .widget_categories li a , #sidebar .widget_tag_cloud a:hover , .jx-rebuild-auth h1,
.jx-rebuild-auth h3 , .jx-rebuild-project-nav .jx-rebuild-project-nav-icons li i , 
.jx-rebuild-share-box-icon .share-title , .comment-form input[type="submit"]:hover , .comments span a , .jx-rebuild-blog-tag li a , .jx-rebuild-blog-tag i , .jx-rebuild-blog-image .jx-rebuild-blog-btns-hover , .jx-rebuild-blog-1 .jx-rebuild-blog-title-metabox .jx-rebuild-title a:hover , .jx-rebuild-blog-1 .jx-rebuild-blog-title-metabox .jx-rebuild-title a , .jx-rebuild-blog-1 .jx-rebuild-blog-title-metabox .jx-rebuild-title , .jx-rebuild-blog-1 .jx-rebuild-blog-title-metabox .jx-rebuild-date .month , .jx-rebuild-pagination .page-numberss:hover a , .jx-rebuild-pagination span.page-numbers.current , 
.jx-rebuild-pagination span.page-numbers.current , .jx-rebuild-big-iconed-button a:hover , .jx-rebuild-section-title-7 .jx-rebuild-subtitle , .jx-rebuild-section-title-7.dark .jx-rebuild-title , .jx-rebuild-section-title-7 .jx-rebuild-title , .jx-rebuild-section-title-6 .jx-rebuild-subtitle , .jx-rebuild-section-title-6.dark .jx-rebuild-title , .jx-rebuild-section-title-6 .jx-rebuild-title , .jx-rebuild-section-title-5 .jx-rebuild-subtitle , .jx-rebuild-section-title-5.dark .jx-rebuild-title , .jx-rebuild-section-title-5 .jx-rebuild-title , .jx-rebuild-section-title-4 .jx-rebuild-title , .jx-rebuild-section-title-3 .jx-rebuild-title , 
.jx-rebuild-section-title-2 .jx-rebuild-title , .jx-rebuild-section-title-1 .jx-rebuild-subtitle , .jx-rebuild-section-title-1.dark .jx-rebuild-title , .jx-rebuild-section-title-1 .jx-rebuild-title , .jx-rebuild-service-footer-box > i , .jx-rebuild-service-footer-box .jx-rebuild-title , .jx-rebuild-service-content h4 , .jx-caption-big-icon i , .jx-rebuild-mainmenu li.has-child > a:hover:after , .jx-rebuild-page-subhead .title , .jx-rebuild-page-subhead .breadcrumb a:hover , .jx-rebuild-page-subhead .breadcrumb a , table th a , .jx-rebuild-fontawesome-icon-list li i , pre
{
    color: <?php echo esc_attr( $theme_base_color ) ?> !important;
} 


/* ------------------------------------------------------------------------ */
/* Base Skin 2 - Background
/* ------------------------------------------------------------------------ */

.jx-rebuild-grid li .title:hover , .woocommerce-page.woocommerce-checkout .woocommerce #respond input#submit:hover, .woocommerce-page.woocommerce-checkout .woocommerce a.button:hover, .woocommerce-page.woocommerce-checkout .woocommerce button.button:hover, .woocommerce-page.woocommerce-checkout .woocommerce input.button:hover , #sidebar .widget_product_search input[type="submit"]:hover , .item-product .added_to_cart:hover , .woocommerce .pagination .page-numbers li .page-numbers , .widget_nav_menu ul > li:hover , .jx-rebuild-footer-section .search-input button:hover , .jx-rebuild-page-title , 
.widget_nav_menu ul > li.active:hover , .jx-rebuild-project-nav .jx-rebuild-project-nav-icons li i:hover , .comment-form input[type="submit"], .comment-form #comment-submit , .jx-rebuild-blog-tag li:hover , .jx-rebuild-blog-more a:hover , .jx-rebuild-blog-image .jx-rebuild-blog-btns-hover i , .jx-rebuild-blog-item .flexslider .flex-control-paging li > a , .jx-rebuild-pagination .page-numbers , .jx-rebuild-sidebar-menu ul li:hover , .jx-rebuild-sidebar-menu ul li.active:hover , .jx-rebuild-completed-prjcts-item:hover .jx-rebuild-completed-prjcts-info , .jx-rebuild-footer-section .jx-rebuild-about .jx-rebuild-btn-default:hover , 
.jx-rebuild-header-5 .jx-rebuild-menu-holder.jx-rebuild-sticky.fixed , .jx-rebuild-header-4 .jx-rebuild-menu-holder.jx-rebuild-sticky.fixed , .slicknav_nav , .jx-rebuild-mainmenu .submenu li li ul , .jx-rebuild-header-search .jx-rebuild-form-wrapper button , .jx-rebuild-list.x2.circle li span,.jx-rebuild-footer-1 .jx-rebuild-footer
{
    background: <?php echo esc_attr( $theme_base_color ) ?> !important;
}


/* ------------------------------------------------------------------------ */
/* Base Skin 2 - Background Color
/* ------------------------------------------------------------------------ */

.jx-rebuild-quote-rquest .jx-rebuild-quote-button a:hover , .jx-rebuild-darkgrey-bg
{
	background-color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}


.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover , .login_overlay , .jx-rebuild-widget-request-quote .jx-rebuild-quote-button a:hover , .jx-rebuild-mainmenu li .submenu , .jx-rebuild-header.header-line
{
	background-color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}


/* ------------------------------------------------------------------------ */
/* Base Skin 2 - Border Color
/* ------------------------------------------------------------------------ */

.woocommerce-page .flexslider li .glass-wrapper , .jx-rebuild-footer-section table td , .jx-rebuild-footer-section .jx-footer-intro  .jx-rebuild-widget-social-icon ul li , .button:active,
button:active,
input[type="submit"]:active,
input[type="reset"]:active,
input[type="button"]:active
{
   border-color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}



/* ------------------------------------------------------------------------ */
/* Base Skin 2 - Border Bottom
/* ------------------------------------------------------------------------ */

.jx-rebuild-footer-section .widget_archive li , .jx-rebuild-footer-section .widget_recent_entries li , .jx-rebuild-footer-section .widget_categories li , .jx-rebuild-dark .jx-rebuild-mainmenu li .submenu li.col ul li
{
    border-bottom-color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}


/* ------------------------------------------------------------------------ */
/* Base Skin 2 - Border Right
/* ------------------------------------------------------------------------ */

.jx-rebuild-dark .jx-rebuild-mainmenu li .submenu li.col
{
    border-right-color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}


/* ------------------------------------------------------------------------ */
/* Base Skin 2 - Border Top
/* ------------------------------------------------------------------------ */

.jx-rebuild-mainmenu .submenu li li ul
{
    border-top-color: <?php echo esc_attr( $theme_base_color ) ?> !important;
}

 
<?php		
endif;
?>

