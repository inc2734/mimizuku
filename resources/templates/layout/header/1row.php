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
?>
<header class="l-header" role="banner">
	<div class=" l-<?php echo esc_attr( $header_type ); ?>">
		<div class="c-container">
			<?php if ( $has_header_sub_nav ) : ?>
				<div class="u-hidden u-visible-lg-up">
					<?php get_template_part( 'template-parts/header-sub-nav' ); ?>
				</div>
			<?php endif; ?>

			<div class="c-row c-row--margin c-row--middle c-row--between c-row--nowrap">
				<div class="c-row__col c-row__col--auto c-row__col--lg-fit">
					<div class="l-<?php echo esc_attr( $header_type ); ?>__branding">
						<?php get_template_part( 'template-parts/site-branding' ); ?>
					</div>
				</div>

				<?php if ( $has_global_nav ) : ?>
					<div class="c-row__col c-row__col--fit u-hidden u-visible-lg-up">
						<div class="c-row c-row--margin c-row--middle c-row--nowrap">
							<div class="c-row__col c-row__col--auto">
								<?php get_template_part( 'template-parts/global-nav' ); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $has_drawer_nav ) : ?>
					<div class="c-row__col c-row__col--fit u-pull-right u-hidden-lg-up">
						<?php get_template_part( 'template-parts/hamburger-btn' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>
