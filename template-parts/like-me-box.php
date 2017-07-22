<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! get_theme_mod( 'facebook-page-name' ) ) {
	return;
}
?>

<div class="c-like-me-box">
	<?php
	if ( get_post_thumbnail_id() ) {
		$image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' );
	} elseif ( get_site_icon_url() ) {
		$image = get_site_icon_url();
	} elseif ( get_theme_mod( 'default-og-image' ) ) {
		$image = get_theme_mod( 'default-og-image' );
	} else {
		$image = '';
	}
	?>
	<div class="c-like-me-box__figure" style="background-image: url(
		<?php echo esc_url( $image ); ?>
	)"></div>
	<div class="c-like-me-box__body">
		<h3 class="c-like-me-box__title">Let's press like button<br>if you like this article</h3>

		<div class="c-like-me-box__like">
			<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo urlencode( esc_url( 'https://www.facebook.com/' . get_theme_mod( 'facebook-page-name' ) . '/' ) ); ?>&amp;width=106&amp;layout=button_count&amp;action=like&amp;size=small&amp;show_faces=false&amp;share=false&amp;height=21" width="106" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		</div>

		<div class="c-like-me-box__lead">
			We will deliver up-to-date information for you
		</div>
	</div>
</div>
