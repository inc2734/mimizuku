<?php
namespace Mimizuku\Functions\Widgets;

/**
 * Register sidebar
 *
 * @return void
 */
function register_sidebars() {
	register_sidebar( [
		'name'          => __( 'Sidebar', 'mimizuku' ),
		'id'            => 'sidebar',
		'description'   => __( 'Sidebar', 'mimizuku' ),
		'before_widget' => '<section id="%1$s" class="_c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="_c-widget__title">',
		'after_title'   => '</h1>',
	] );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\register_sidebars' );
