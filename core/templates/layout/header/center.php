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
			<div class="c-row__col c-row__col--3-5 c-row__col--offset-1-5 c-row__col--lg-1-1 c-row__col--lg-offset-0">
				<div class="u-text-center">
					<?php get_template_part( '../core/template-parts/site-branding' ); ?>
				</div>
			</div>

			<?php if ( has_nav_menu( 'drawer-nav' ) ) : ?>
				<div class="c-row__col c-row__col--1-5 u-hidden-lg">
					<div class="u-pull-right">
						<?php get_template_part( '../core/template-parts/hamburger-btn' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( has_nav_menu( 'global-nav' ) ) : ?>
		<div class="u-hidden-sm u-hidden-md">
			<?php
			add_filter( 'wp_nav_menu_args', function( $args ) {
				if ( 'global-nav' === $args['theme_location'] ) {
					$args = array_merge( $args, [
						'container'       => 'div',
						'container_class' => 'c-container',
					] );
				}
				return $args;
			} );
			get_template_part( '../core/template-parts/global-nav' );
			?>
		</div>
	<?php endif; ?>
</header>
