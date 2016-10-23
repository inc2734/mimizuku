<?php
class BreadcrumbsTest extends WP_UnitTestCase {

	public function setup() {
		parent::setup();
	}

	public function test_front_page() {
		$this->go_to( home_url() );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$this->assertEquals(
			[
				[
					'title' => 'Home',
					'link'  => '',
				]
			],
			$breadcrumbs->get()
		);
	}
}
