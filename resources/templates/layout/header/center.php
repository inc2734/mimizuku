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
			<div class="c-row__col c-row__col--auto c-row__col--lg-1-1">
				<?php get_template_part( 'resources/template-parts/site-branding' ); ?>
			</div>

			<?php if ( has_nav_menu( 'drawer-nav' ) ) : ?>
				<div class="c-row__col c-row__col--auto u-hidden-lg u-text-right">
					<?php get_template_part( 'resources/template-parts/hamburger-btn' ); ?>
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
						'menu_class'      => 'c-navbar',
					] );
				}
				return $args;
			} );
			get_template_part( 'resources/template-parts/global-nav' );
			?>
		</div>
	<?php endif; ?>
</header>
