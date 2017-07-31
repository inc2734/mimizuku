<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<header class="l-header" role="banner">
	<div class="c-container">
		<div class="c-row c-row--middle">
			<div class="c-row__col c-row__col--auto">
				<?php get_template_part( 'core/template-parts/site-branding' ); ?>
			</div>

			<?php if ( has_nav_menu( 'drawer-nav' ) ) : ?>
				<div class="c-row__col c-row__col--auto u-hidden-lg">
					<?php get_template_part( 'core/template-parts/hamburger-btn' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'global-nav' ) ) : ?>
				<div class="c-row__col c-row__col--auto u-hidden-sm u-hidden-md">
					<div class="u-pull-right">
						<?php get_template_part( 'core/template-parts/global-nav' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header>
