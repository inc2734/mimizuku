<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$header_type        = get_theme_mod( 'header-layout' ) . '-header';
$has_global_nav     = has_nav_menu( 'global-nav' );
$has_drawer_nav     = has_nav_menu( 'drawer-nav' );
$has_header_sub_nav = has_nav_menu( 'header-sub-nav' );

$class_for_site_branding_col[] = ( $has_drawer_nav ) ? 'c-row__col--4-6' : 'c-row__col--1-1';
$class_for_site_branding_col   = implode( ' ', $class_for_site_branding_col );
?>
<header class="l-header" role="banner">
	<div class=" l-<?php echo esc_attr( $header_type ); ?>">
		<div class="c-container">
			<?php if ( $has_header_sub_nav ) : ?>
				<div class="u-hidden u-visible-lg-up">
					<?php get_template_part( 'template-parts/header-sub-nav' ); ?>
				</div>
			<?php endif; ?>

			<div class="l-<?php echo esc_attr( $header_type ); ?>__row">
				<div class="c-row c-row--margin-s c-row--middle c-row--between c-row--nowrap">
					<?php if ( $has_drawer_nav ) : ?>
						<div class="c-row__col c-row__col--1-6 u-hidden-lg-up"></div>
					<?php endif; ?>

					<div class="c-row__col <?php echo esc_attr( $class_for_site_branding_col ); ?> u-text-center">
						<?php get_template_part( 'template-parts/site-branding' ); ?>
					</div>

					<?php if ( $has_drawer_nav ) : ?>
						<div class="c-row__col c-row__col--1-6 u-hidden-lg-up">
							<div class="u-pull-right">
								<?php get_template_part( 'template-parts/hamburger-btn' ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( $has_global_nav ) : ?>
				<div class="l-<?php echo esc_attr( $header_type ); ?>__row u-hidden u-visible-lg-up">
					<?php get_template_part( 'template-parts/global-nav' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header>
