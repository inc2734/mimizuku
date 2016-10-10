<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<header <?php \Mimizuku\App\Tags\header_class(); ?> role="banner">
	<div class="_c-container">
		<div class="_c-row">
			<div class="_c-row__col _c-row__col--auto _c-row _c-row--middle">
				<?php get_template_part( 'template-parts/site-branding' ); ?>
			</div>

			<?php if ( has_nav_menu( 'drawer-nav' ) ) : ?>
			<div class="_c-row__col _c-row__col--auto _u-hidden-lg _c-row _c-row--right _c-row--middle">
				<?php get_template_part( 'template-parts/hamburger-btn' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'global-nav' ) ) : ?>
			<div class="_c-row__col _c-row__col--auto _u-hidden-sm _u-hidden-md _c-row _c-row--right">
				<?php get_template_part( 'template-parts/global-nav' ); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</header>
