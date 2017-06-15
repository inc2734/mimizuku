<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

include_once( get_stylesheet_directory() . '/vendor/inc2734/wp-breadcrumbs/src/wp-breadcrumbs.php' );
$breadcrumbs = new Inc2734_WP_Breadcrumbs();
$items = apply_filters( 'mimizuku_breadcrumbs', $breadcrumbs->get() );
?>
<ol class="_c-breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	<?php foreach ( $items as $key => $item ) : ?>
	<li class="_c-breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<?php if ( empty( $item['link'] ) ) : ?>
		<span itemscope itemtype="http://schema.org/Thing" itemprop="item">
			<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
		</span>
		<?php else : ?>
		<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="<?php echo esc_url( $item['link'] ); ?>">
			<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
		</a>
		<?php endif; ?>
		<meta itemprop="position" content="<?php echo esc_attr( $key + 1 ); ?>" />
	</li>
	<?php endforeach; ?>
</ol>
