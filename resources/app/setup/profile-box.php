<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Profile_Box\Profile_Box;

new Profile_Box();

add_filter( 'inc2734_wp_profile_box_sns_accounts', function( $accounts ) {
	foreach ( $accounts as $service => $label ) {
		switch ( $service ) {
			case 'url':
				$label = '<i class="fas fa-globe"></i>' . $label;
				break;
			case 'twitter':
				$label = '<i class="fab fa-twitter"></i>' . $label;
				break;
			case 'facebook':
				$label = '<i class="fab fa-facebook"></i>' . $label;
				break;
			case 'instagram':
				$label = '<i class="fab fa-instagram"></i>' . $label;
				break;
			case 'youtube':
				$label = '<i class="fab fa-youtube"></i>' . $label;
				break;
			case 'linkedin':
				$label = '<i class="fab fa-linkedin"></i>' . $label;
				break;
			case 'wordpress':
				$label = '<i class="fab fa-wordpress"></i>' . $label;
				break;
			case 'tumblr':
				$label = '<i class="fab fa-tumblr"></i>' . $label;
				break;
		}
		$accounts[ $service ] = $label;
	}
	return $accounts;
} );
