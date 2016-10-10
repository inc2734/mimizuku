<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Tags;

function get_template_part( $template, $vars = [] ) {
	$template_part = new \Mimizuku\Template_Part( $template );
	$template_part->set_vars( $vars );
	$template_part->render();
}
