<?php
class ConfigTest extends WP_UnitTestCase {

	public function setup() {
		parent::setup();
	}

	public function test_get() {
		$config = mimizuku_config( 'app/config/directory' );
		$this->assertTrue( is_array( $config ) );

		$config = mimizuku_config( 'app/config/directory', 'layout' );
		$this->assertEquals( 'layout/wrapper', $config );

		$config = mimizuku_config( 'app/config/directory', 'no-match-key' );
		$this->assertNull( $config );
	}
}
