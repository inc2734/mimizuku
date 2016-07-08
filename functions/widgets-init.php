<?php
namespace Mimizuku\Functions;

function widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mimizuku' ),
		'id'            => 'sidebar',
		'description'   => __( 'Sidebar', 'mimizuku' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="c-widget__title">',
		'after_title'   => '</h1>',
	) );
}

add_action( 'widgets_init', __NAMESPACE__ . '\\widgets_init' );
