<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$theme_link = sprintf(
	'<a href="https://2inc.org" target="_blank">%s</a>',
	__( 'Monkey Wrench', 'mimizuku' )
);

$wordpress_link = sprintf(
	'<a href="https://wordpress.org/" target="_blank">%s</a>',
	__( 'WordPress', 'mimizuku' )
);

$theme_by   = sprintf( __( 'Mimizuku theme by %s', 'mimizuku' ), $theme_link );
$powered_by = sprintf( __( 'Powered by %s', 'mimizuku' ), $wordpress_link );
$copyright  = $theme_by . ' ' . $powered_by;
?>

<div class="c-copyright">
	<?php echo wp_kses_post( apply_filters( 'mimizuku_copyright', $copyright ) ); ?>
</div>
