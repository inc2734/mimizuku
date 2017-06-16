<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter( 'inc2734_wp_basis_password_form_message', function( $message ) {
	return __( 'This content is password protected. To view it please enter your password below:', 'mimizuku' );
} );

add_filter( 'inc2734_wp_basis_password_form_label', function( $label ) {
	return __( 'Password:', 'mimizuku' );
} );

add_filter( 'inc2734_wp_basis_password_form_submit_label', function( $submit_label ) {
	return _x( 'Enter', 'post password form', 'mimizuku' );
} );
