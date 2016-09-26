<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$theme_url     = 'http://2inc.org';
$wordpress_url = 'http://wordpress.org/';
$theme_link = sprintf(
	'<a href="%s" target="_blank">%s</a>',
	esc_url( $theme_url ),
	__( 'Monkey Wrench', 'mimizuku' )
);
$wordpress_link = sprintf(
	'<a href="%s" target="_blank">%s</a>',
	esc_url( $wordpress_url ),
	__( 'WordPress', 'mimizuku' )
);
$theme_by   = sprintf( __( 'Mimizuku theme by %s', 'mimizuku' ), $theme_link );
$powered_by = sprintf( __( 'Powered by %s', 'mimizuku' ), $wordpress_link );
$copyright  = sprintf(
	'%s&nbsp;%s',
	$theme_by,
	$powered_by
);
?>
<div class="_p-copyright">
	<?php echo wp_kses_post( apply_filters( 'mimizuku_copyright', $copyright ) ); ?>
</div>
