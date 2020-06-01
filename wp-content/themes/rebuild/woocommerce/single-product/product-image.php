<?php
/**
 * Single Product Image
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.0.14
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
global $post, $woocommerce, $product,$rebuild_data;
wp_enqueue_script( 'rebuild-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
if(isset($rebuild_data['effects_images']) && $rebuild_data['effects_images'] =='zoom_out'){
	 wp_enqueue_script( 'rebuild-retina', get_template_directory_uri() . '/js/jquery.retina.min.js', array(), false, true );
 }
?>
<script type="text/javascript">
	jQuery(function ($) {
		<?php if(isset($rebuild_data['effects_images']) && $rebuild_data['effects_images'] =='zoom_out'){ ?>
		$(".retina").retina({preload: true});
		<?php }?>
 		if (jQuery().flexslider && jQuery(".woocommerce .images #carousel").length >= 1) {
			var e = 100;
			jQuery("body.woocommerce #sidebar").is(":visible") ? wooThumbWidth = 80 :wooThumbWidth  = 88;
			if (typeof jQuery(".woocommerce .images #carousel").data("flexslider") != "undefined") {
				jQuery(".woocommerce .images #carousel").flexslider("destroy");
				jQuery(".woocommerce .images #slider").flexslider("destroy")
			}
			jQuery(".woocommerce .images #carousel").flexslider({animation: "slide", controlNav: !1, directionNav: !1, animationLoop: !1, slideshow: !1, itemWidth: wooThumbWidth, itemMargin: 5, touch: !1, useCSS: !1, asNavFor: ".woocommerce .images #slider", smoothHeight: !1});
			jQuery(".woocommerce .images #slider").flexslider({animation: "slide", controlNav: !1, directionNav: !1, animationLoop: !1, slideshow: !1, smoothHeight: !0, touch: !0, useCSS: !1,sync: ".woocommerce .images #carousel"})
		}
	});
</script>
<div class="images">
	<!-- Place somewhere in the <body> of your page -->
	<div id="slider" class="flexslider">
		<ul class="slides">
			<?php
			if ( has_post_thumbnail() ) {
				$image_title      = esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_link       = wp_get_attachment_url( get_post_thumbnail_id() );
				$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
					'title' => $image_title
				) );
				$attachment_count = count( $product->get_gallery_attachment_ids() );
				if ( $attachment_count > 0 ) {
					$gallery = '[product-gallery]';
				} else {
					$gallery = '';
				}
				list( $magnifier_url, $magnifier_width, $magnifier_height ) = wp_get_attachment_image_src( get_post_thumbnail_id(), "shop_single" );
				echo '<li>';
				if(isset($rebuild_data['effects_images']) && $rebuild_data['effects_images'] =='zoom_out'){
					 echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="retina" title="%s" style="">%s</a>', $image_link, $image_title, $image ), $post->ID );
  				}else{
					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s<span class="glass-wrapper"><i class="fa fa-search"></i></span></a>', $image_link, $image_title, $image ), $post->ID );
				}
				echo '</li>';
			}
			$attachment_ids = $product->get_gallery_attachment_ids();
			?>
			<?php
			$loop = 0;
			foreach ( $attachment_ids as $attachment_id ) {
				$image_link = wp_get_attachment_url( $attachment_id );
				if ( ! $image_link ) {
					continue;
				}
				$classes[]   = 'image-' . $attachment_id;
				$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
				$image_class = esc_attr( implode( ' ', $classes ) );
				$image_title = esc_attr( get_the_title( $attachment_id ) );
				echo '<li>';
				if(isset($rebuild_data['effects_images']) && $rebuild_data['effects_images'] =='zoom_out'){
					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="retina" title="%s" style="">%s</a>', $image_link, $image_title, $image ), $post->ID );
				}else{
					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s<span class="glass-wrapper"><i class="fa fa-search"></i></span></a>', $image_link, $image_title, $image ), $post->ID );
				}
				echo '</li>';
				$loop ++;
			}
			?>
		</ul>
	</div>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
</div>
