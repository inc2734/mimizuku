<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter( 'inc2734_wp_basis_searchform_label', function( $label ) {
	return _x( 'Search for:', 'label', 'mimizuku' );
} );

add_filter( 'inc2734_wp_basis_searchform_placeholder', function( $label ) {
	return _x( 'Search &hellip;', 'placeholder', 'mimizuku' );
} );

add_filter( 'inc2734_wp_basis_password_form_submit_label', function( $submit_label ) {
	return _x( 'Search', 'submit button', 'mimizuku' );
} );
