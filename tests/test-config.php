<?php
class ConfigTest extends WP_UnitTestCase {

	public function setup() {
		parent::setup();
	}

	public function test_get() {
		$config = \Mimizuku\App\Models\Config::get( 'app/config/directory' );
		$this->assertTrue( is_array( $config ) );

		$config = \Mimizuku\App\Models\Config::get( 'app/config/directory', 'layout' );
		$this->assertEquals( 'layout/wrapper', $config );

		$config = \Mimizuku\App\Models\Config::get( 'app/config/directory', 'no-match-key' );
		$this->assertNull( $config );
	}
}
