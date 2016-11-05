<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Tags;

/**
 * A template tag that is get_template_part() using variables
 *
 * @param string $template
 * @param array $vars
 * @return void
 */
function get_template_part( $template, $vars = [] ) {
	$template_part = new \Mimizuku\App\Models\Template_Part( $template );
	$template_part->set_vars( $vars );
	$template_part->render();
}
