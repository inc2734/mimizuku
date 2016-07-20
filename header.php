<header role="banner">
	<div class="_c-container">
		<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ) ?></a></h1>
	</div>

	<div class="_u-hidden-sm _u-hidden-md">
		<?php get_template_part( 'template-parts/global-nav' ); ?>
	</div>

	<?php if ( has_nav_menu( 'drawer-nav' ) ) : ?>
	<div class="_u-hidden-lg">
		<div class="_c-drawer__btn _c-hamburger-btn">
			<div class="_c-hamburger-btn__bar"></div>
			<div class="_c-hamburger-btn__bar"></div>
			<div class="_c-hamburger-btn__bar"></div>
		</div>
	</div>
	<?php endif; ?>
</header>
