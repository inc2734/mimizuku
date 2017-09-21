<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->panel( 'seo-sns', array(
	'title' => __( 'SEO/SNS', 'mimizuku' ),
) );

$panel = $customizer->get_panel( 'seo-sns' );

/**
 * Google Analytics
 */
$customizer->section( 'google-analytics', array(
	'title' => __( 'Google Analytics', 'mimizuku' ),
) );

$customizer->control( 'text', 'mwt-google-analytics-tracking-id', array(
	'label'       => __( 'Tracking ID', 'mimizuku' ),
	'description' => __( 'e.g. UA-1111111-11', 'mimizuku' ),
	'type'        => 'option',
) );

$section = $customizer->get_section( 'google-analytics' );
$control = $customizer->get_control( 'mwt-google-analytics-tracking-id' );
$control->join( $section )->join( $panel );

/**
 * Google Search Console
 */
$customizer->section( 'google-search-console', array(
	'title' => __( 'Google Search Console', 'mimizuku' ),
) );

$customizer->control( 'text', 'mwt-google-site-verification', array(
	'label'       => __( 'Google site verification', 'mimizuku' ),
	'description' => sprintf(
		__( 'Please enter part %1$s of %2$s', 'mimizuku' ),
		'<code>xxxx</code>',
		'<code>&lt;meta name="google-site-verification" content="xxxxx" /&gt;</code>'
	),
	'type' => 'option',
) );

$section = $customizer->get_section( 'google-search-console' );
$control = $customizer->get_control( 'mwt-google-site-verification' );
$control->join( $section )->join( $panel );

/**
 * OGP
 */
$customizer->section( 'ogp', array(
	'title' => __( 'OGP', 'mimizuku' ),
) );

$customizer->control( 'checkbox', 'mwt-ogp', array(
	'label'   => __( 'Output OGP meta tag', 'mimizuku' ),
	'type'    => 'option',
	'default' => true,
) );

$customizer->control( 'image', 'mwt-default-og-image', array(
	'label'       => __( 'Default OGP image', 'mimizuku' ),
	'description' => __( 'If a featured image is set in an article, that the featured image is used, if not set, this image will be used.', 'mimizuku' ),
	'type'        => 'option',
) );

$section = $customizer->get_section( 'ogp' );
$control = $customizer->get_control( 'mwt-ogp' );
$control->join( $section )->join( $panel );
$control = $customizer->get_control( 'mwt-default-og-image' );
$control->join( $section )->join( $panel );

/**
 * Twitter Cards
 */
$customizer->section( 'twitter-cards', array(
	'title'       => __( 'Twitter Cards', 'mimizuku' ),
	'description' => sprintf(
		__( 'Application of URL is necessary for using Twitter Cards. %1$s', 'mimizuku' ),
		'<a href="https://cards-dev.twitter.com/validator" target="_blank">Card validator</a>'
	),
) );

$customizer->control( 'select', 'mwt-twitter-card', array(
	'label'       => __( 'twitter:card', 'mimizuku' ),
	'description' => __( 'Twitter Cards format', 'mimizuku' ),
	'default'     => 'summary',
	'type'        => 'option',
	'choices'     => array(
		''                    => __( 'Not use', 'mimizuku' ),
		'summary'             => 'Summary Card',
		'summary_large_image' => 'Summary Card with Large Image',
	),
) );

$customizer->control( 'text', 'mwt-twitter-site', array(
	'label'       => __( 'twitter:site', 'mimizuku' ),
	'description' => sprintf(
		__( 'The Twitter account name of the site. Please enter in the form %1$s.', 'mimizuku' ),
		'<code>@username</code>'
	),
	'default' => '@',
	'type'    => 'option',
) );

$section = $customizer->get_section( 'twitter-cards' );
$control = $customizer->get_control( 'mwt-twitter-card' );
$control->join( $section )->join( $panel );
$control = $customizer->get_control( 'mwt-twitter-site' );
$control->join( $section )->join( $panel );

/**
 * Like Me Box
 */
$customizer->section( 'like-me-box', [
	'title' => __( 'Like me box', 'mimizuku' ),
] );

$customizer->control( 'text', 'mwt-facebook-page-name', [
	'label'       => __( 'Facebook page name', 'mimizuku' ),
	'description' => sprintf(
		_x( 'Please enter %1$s of %2$s', 'facebook-page-name', 'mimizuku' ),
		'<code>xxxxx</code>',
		'<code>https://www.facebook.com/xxxxx</code>'
	),
	'type' => 'option',
] );

$section = $customizer->get_section( 'like-me-box' );
$control = $customizer->get_control( 'mwt-facebook-page-name' );
$control->join( $section )->join( $panel );

/**
 * Share Buttons
 */
$customizer->section( 'share-buttons', [
	'title' => __( 'Share buttons', 'mimizuku' ),
	'description' => sprintf(
		__( 'If you want to count of tweet then needs to register to %1$s.', 'mimizuku' ),
		'<a href="https://opensharecount.com/" target="_blank">OpenShareCount</a>'
	),
] );

$customizer->control( 'multiple-checkbox', 'mwt-share-buttons-buttons', [
	'label'   => __( 'Display buttons', 'mimizuku' ),
	'default' => '',
	'choices' => [
		'facebook' => __( 'Facebook', 'mimizuku' ),
		'twitter'  => __( 'Twitter', 'mimizuku' ),
		'hatena'   => __( 'Hatena Bookmark', 'mimizuku' ),
		'feedly'   => __( 'Feedly', 'mimizuku' ),
		'line'     => __( 'LINE', 'mimizuku' ),
		'pocket'   => __( 'Pocket', 'mimizuku' ),
		'feed'     => __( 'Feed', 'mimizuku' ),
	],
	'type' => 'option',
] );

$customizer->control( 'select', 'mwt-share-buttons-type', [
	'label'   => __( 'Type', 'mimizuku' ),
	'default' => 'balloon',
	'choices' => [
		'balloon'    => __( 'Balloon', 'mimizuku' ),
		'horizontal' => __( 'Horizontal', 'mimizuku' ),
		'icon'       => __( 'Icon', 'mimizuku' ),
		'block'      => __( 'Block', 'mimizuku' ),
		'official'   => __( 'Official', 'mimizuku' ),
	],
	'type' => 'option',
] );

$customizer->control( 'select', 'mwt-share-buttons-display-position', [
	'label'   => __( 'Display position', 'mimizuku' ),
	'default' => 'top',
	'choices' => [
		'top'    => __( 'Top of contents', 'mimizuku' ),
		'bottom' => __( 'Bottom of contents', 'mimizuku' ),
		'both'   => __( 'Both', 'mimizuku' ),
	],
	'type' => 'option',
] );

$customizer->control( 'text', 'mwt-share-buttons-cache-seconds', [
	'label'   => __( 'Share counts cache time (seconds)', 'mimizuku' ),
	'default' => 300,
	'type'    => 'option',
] );

$section = $customizer->get_section( 'share-buttons' );
$control = $customizer->get_control( 'mwt-share-buttons-buttons' );
$control->join( $section )->join( $panel );
$control = $customizer->get_control( 'mwt-share-buttons-type' );
$control->join( $section )->join( $panel );
$control = $customizer->get_control( 'mwt-share-buttons-display-position' );
$control->join( $section );
$control = $customizer->get_control( 'mwt-share-buttons-cache-seconds' );
$control->join( $section )->join( $panel );
