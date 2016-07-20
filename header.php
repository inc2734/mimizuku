<header role="banner">
	<div class="_c-container">
		<div class="_c-row">
			<div class="_c-row__col _c-row__col--auto _c-row__col--lg-1-1">
				<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ) ?></a></h1>
			</div>
			<?php if ( has_nav_menu( 'drawer-nav' ) ) : ?>
			<div class="_c-row__col _c-row__col--auto _u-hidden-lg _c-row _c-row--right _c-row--middle">
				<?php get_template_part( 'template-parts/hamburger-btn' ); ?>
			</div>
			<?php endif; ?>
	</div>

	<div class="_u-hidden-sm _u-hidden-md">
		<?php get_template_part( 'template-parts/global-nav' ); ?>
	</div>
</header>
