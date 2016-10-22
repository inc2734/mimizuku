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
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="<?php echo esc_url( $item['link'] ); ?>">
			<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
		</a>
		<meta itemprop="position" content="<?php echo esc_attr( $key + 1 ); ?>" />
	</li>
	<?php endforeach; ?>
</ol>
