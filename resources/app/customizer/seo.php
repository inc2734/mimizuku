<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->panel( 'seo', array(
	'title' => __( 'SEO', 'mimizuku' ),
) );

$customizer->section( 'google-analytics', array(
	'title' => __( 'Google Analytics', 'mimizuku' ),
) );

$customizer->section( 'google-search-console', array(
	'title' => __( 'Google Search Console', 'mimizuku' ),
) );

$customizer->section( 'ogp', array(
	'title' => __( 'OGP', 'mimizuku' ),
) );

$customizer->section( 'twitter-cards', array(
	'title'       => __( 'Twitter Cards', 'mimizuku' ),
	'description' => sprintf(
		__( 'Application of URL is necessary for using Twitter Cards. %1$s', 'mimizuku' ),
		'<a href="https://cards-dev.twitter.com/validator" target="_blank">Card validator</a>'
	),
) );

$customizer->control( 'text', 'google-analytics-tracking-id', array(
	'label'       => __( 'Tracking ID', 'mimizuku' ),
	'description' => __( 'e.g. UA-1111111-11', 'mimizuku' ),
) );

$customizer->control( 'text', 'google-site-verification', array(
	'label'       => __( 'Google site verification', 'mimizuku' ),
	'description' => sprintf(
		__( 'Please enter part %1$s of %2$s', 'mimizuku' ),
		'<code>xxxx</code>',
		'<code>&lt;meta name="google-site-verification" content="xxxxx" /&gt;</code>'
	),
) );

$customizer->control( 'image', 'default-og-image', array(
	'label'       => __( 'Default OGP image', 'mimizuku' ),
	'description' => __( 'If a featured image is set in an article, that the featured image is used, if not set, this image will be used.', 'mimizuku' ),
) );

$customizer->control( 'select', 'twitter-card', array(
	'label'       => __( 'twitter:card', 'mimizuku' ),
	'description' => __( 'Twitter Cards format', 'mimizuku' ),
	'default'     => 'summary',
	'choices'     => array(
		'summary'             => 'Summary Card',
		'summary_large_image' => 'Summary Card with Large Image',
	),
) );

$customizer->control( 'text', 'twitter-site', array(
	'label'       => __( 'twitter:site', 'mimizuku' ),
	'description' => sprintf(
		__( 'The Twitter account name of the site. Please enter in the form %1$s.', 'mimizuku' ),
		'<code>@username</code>'
	),
	'default' => '@',
) );

$panel   = $customizer->get_panel( 'seo' );
$section = $customizer->get_section( 'google-analytics' );
$control = $customizer->get_control( 'google-analytics-tracking-id' );
$control->join( $section )->join( $panel );

$section = $customizer->get_section( 'google-search-console' );
$control = $customizer->get_control( 'google-site-verification' );
$control->join( $section )->join( $panel );

$section = $customizer->get_section( 'ogp' );
$control = $customizer->get_control( 'default-og-image' );
$control->join( $section )->join( $panel );

$section = $customizer->get_section( 'twitter-cards' );
$control = $customizer->get_control( 'twitter-card' );
$control->join( $section )->join( $panel );
$control = $customizer->get_control( 'twitter-site' );
$control->join( $section )->join( $panel );
