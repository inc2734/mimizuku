<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
$items = array_values( $breadcrumbs->get() );
?>
<ol class="_p-breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	<?php foreach ( $items as $key => $item ) : ?>
	<li class="_p-breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
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
