<?php
namespace Mimizuku\Functions;

function comment_form_default_fields( $fields ) {
		foreach ( $fields as $key => $field ) {
			$fields[$key] = preg_replace( '/(id=".+?")/', '$1 class="_c-form-control"', $field );
		}
		return $fields;
}

add_action( 'comment_form_default_fields', __NAMESPACE__ . '\\comment_form_default_fields' );

function comment_form_field_comment( $comment_field ) {
		$comment_field = preg_replace( '/(id=".+?")/', '$1 class="_c-form-control"', $comment_field );
		return $comment_field;
}

add_action( 'comment_form_field_comment', __NAMESPACE__ . '\\comment_form_field_comment' );

function comment_form_submit_field( $submit_field ) {
		$submit_field = str_replace( 'class="submit"', 'class="_c-btn"', $submit_field );
		return $submit_field;
}

add_action( 'comment_form_submit_field', __NAMESPACE__ . '\\comment_form_submit_field' );
