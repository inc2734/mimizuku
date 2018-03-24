<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<div class="c-site-branding">
	<?php if ( is_front_page() || is_home() ) : ?>

		<h1 class="c-site-branding__title">
			<?php mimizuku_the_site_branding_title(); ?>
		</h1>

	<?php else : ?>

		<div class="c-site-branding__title">
			<?php mimizuku_the_site_branding_title(); ?>
		</div>

	<?php endif; ?>
</div>
