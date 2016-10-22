<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Attachment extends Abstract_Breadcrumb {
	protected function set_items() {
		$this->set( get_the_title() );
	}
}
