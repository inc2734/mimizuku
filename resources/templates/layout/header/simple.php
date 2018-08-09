<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$header_type    = get_theme_mod( 'header-layout' ) . '-header';
$has_drawer_nav = has_nav_menu( 'drawer-nav' );
?>
<header class="l-header" role="banner">
	<div class=" l-<?php echo esc_attr( $header_type ); ?>">
		<div class="c-container">
			<div class="l-<?php echo esc_attr( $header_type ); ?>__row">
				<div class="c-row c-row--margin c-row--middle c-row--nowrap">
					<div class="c-row__col c-row__col--auto">
						<?php get_template_part( 'template-parts/site-branding' ); ?>
					</div>

					<?php if ( $has_drawer_nav ) : ?>
						<div class="c-row__col c-row__col--fit">
							<div class="c-row c-row--margin c-row--middle c-row--nowrap">
								<div class="c-row__col c-row__col--fit">
									<?php get_template_part( 'template-parts/hamburger-btn' ); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>
