<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eight_Sec
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'چیزی یافت نشد', 'eight-sec' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'eight-sec' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'با عرض پوزش، اما هیچ چیز مطابق با شرایط جستجوی شما نبود. لطفا با برخی از کلمات کلیدی مختلف دوباره امتحان کنید.', 'eight-sec' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'به نظر می رسد ما نمی توانیم آنچه را دنبال می کنید پیدا کنیم. شاید جستجو بتواند کمک کند.', 'eight-sec' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->