<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Print meta description for sngular page
 *
 * @return void
 */
add_action( 'wp_head', function() {
	if ( ! is_singular() || is_home() || is_front_page() ) {
		return;
	}

	$meta_description = get_post_meta( get_the_ID(), 'wp-seo-meta-description', true );
	if ( ! $meta_description ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr( $meta_description ); ?>">
	<?php
} );

/**
 * Print meta description for front page
 *
 * @return void
 */
add_action( 'wp_head', function() {
	if ( ! is_front_page() ) {
		return;
	}

	$show_on_front = get_option( 'show_on_front' );
	$page_on_front = get_option( 'page_on_front' );

	if ( 'page' === $show_on_front && $page_on_front ) {
		$meta_description = get_post_meta( $page_on_front, 'wp-seo-meta-description', true );
		if ( empty( $meta_description ) ) {
			$meta_description = get_bloginfo( 'description' );
		}
	} else {
		$meta_description = get_bloginfo( 'description' );
	}

	if ( empty( $meta_description ) ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr( $meta_description ); ?>">
	<?php
} );

/**
 * Print meta description for home
 *
 * @return void
 */
add_action( 'wp_head', function() {
	if ( ! is_home() ) {
		return;
	}

	$show_on_front  = get_option( 'show_on_front' );
	$page_for_posts = get_option( 'page_for_posts' );

	if ( 'page' === $show_on_front && $page_for_posts ) {
		$meta_description = get_post_meta( $page_for_posts, 'wp-seo-meta-description', true );
		if ( empty( $meta_description ) ) {
			$meta_description = get_bloginfo( 'description' );
		}
	}

	if ( empty( $meta_description ) ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr( $meta_description ); ?>">
	<?php
} );
