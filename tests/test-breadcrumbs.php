<?php
class BreadcrumbsTest extends WP_UnitTestCase {

	public function setup() {
		parent::setup();

		$this->author_id     = $this->factory->user->create();
		$this->post_ids      = $this->factory->post->create_many( 20, [ 'post_author' => $this->author_id ] );
		$this->front_page_id = $this->factory->post->create( [ 'post_type' => 'page', 'post_title' => 'HOME' ] );
		$this->blog_page_id  = $this->factory->post->create( [ 'post_type' => 'page', 'post_title' => 'BLOG' ] );
		$this->tag_id        = $this->factory->term->create( array( 'taxonomy' => 'post_tag' ) );
		$this->post_type     = rand_str( 12 );
		$this->taxonomy      = rand_str( 12 );

		register_post_type(
			$this->post_type,
			[
				'public'      => true ,
				'taxonomies'  => ['category'],
				'has_archive' => true
			]
		);

		register_taxonomy(
			$this->taxonomy,
			$this->post_type,
			[
				'public' => true,
			]
		);

		foreach( $this->post_ids as $post_id ) {
			wp_set_object_terms( $post_id, get_term( $this->tag_id, 'post_tag' )->slug, 'post_tag' );
		}

		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%year%/%monthnum%/%day%/%postname%/' );
	}

	public function tearDown() {
		parent::tearDown();

		update_option( 'show_on_front', 'posts' );
		update_option( 'page_on_front', 0 );
		update_option( 'page_for_posts', 0 );
		_unregister_post_type( $this->post_type );
		_unregister_taxonomy( $this->taxonomy, $this->post_type );
	}

	public function test_front_page() {
		$this->go_to( home_url() );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link'  => '' ]
			],
			$breadcrumbs->get()
		);
	}

	public function test_blog() {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $this->front_page_id );
		update_option( 'page_for_posts', $this->blog_page_id );

		$this->go_to( get_permalink( $this->blog_page_id ) );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$this->assertEquals(
			[
				[ 'title' => 'HOME', 'link' => 'http://example.org' ],
				[ 'title' => 'BLOG', 'link' => '' ]
			],
			$breadcrumbs->get()
		);
	}

	public function test_category() {
		$category = get_terms( 'post_tag' )[0];
		$this->go_to( get_term_link( $category ) );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $category->name, 'link' => '' ]
			],
			$breadcrumbs->get()
		);
	}

	public function test_post_tag() {
		$post_tag = get_terms( 'post_tag' )[0];
		$this->go_to( get_term_link( $post_tag ) );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $post_tag->name, 'link' => '' ]
			],
			$breadcrumbs->get()
		);
	}

	public function test_year() {
		$newest_post = get_post( $this->post_ids[0] );
		$year = date( 'Y', strtotime( $newest_post->post_date ) );
		$this->go_to( get_year_link( $year ) );
		$breadcrumbs     = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$breadcrumb_year = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumb_Year();
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $breadcrumb_year->year( $year ), 'link' => '' ]
			],
			$breadcrumbs->get()
		);
	}

	public function test_month() {
		$newest_post = get_post( $this->post_ids[0] );
		$year  = date( 'Y', strtotime( $newest_post->post_date ) );
		$month = date( 'm', strtotime( $newest_post->post_date ) );
		$this->go_to( get_month_link( $year, $month ) );
		$breadcrumbs      = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$breadcrumb_month = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumb_Month();
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $breadcrumb_month->year( $year ), 'link' => "http://example.org/$year/" ],
				[ 'title' => $breadcrumb_month->month( $month ), 'link' => '' ]
			],
			$breadcrumbs->get()
		);
	}

	public function test_day() {
		$newest_post = get_post( $this->post_ids[0] );
		$year  = date( 'Y', strtotime( $newest_post->post_date ) );
		$month = date( 'm', strtotime( $newest_post->post_date ) );
		$day   = date( 'd', strtotime( $newest_post->post_date ) );
		$this->go_to( get_day_link( $year, $month, $day ) );
		$breadcrumbs    = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$breadcrumb_day = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumb_Day();
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $breadcrumb_day->year( $year ), 'link' => "http://example.org/$year/" ],
				[ 'title' => $breadcrumb_day->month( $month ), 'link' => "http://example.org/$year/$month/" ],
				[ 'title' => $breadcrumb_day->day( $day ), 'link' => '' ]
			],
			$breadcrumbs->get()
		);
	}

	public function test_author() {
		$newest_post = get_post( $this->post_ids[0] );
		$author = $newest_post->post_author;
		$this->go_to( get_author_posts_url( $author ) );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => get_the_author_meta( 'user_login', $this->author ), 'link' => '' ],
			],
			$breadcrumbs->get()
		);
	}

	public function test_single() {
		// Post
		$newest_post = get_post( $this->post_ids[0] );
		$categories = get_the_category( $newest_post );
		$this->go_to( get_permalink( $newest_post ) );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $categories[0]->name, 'link' => get_term_link( $categories[0] ) ],
				[ 'title' => get_the_title( $newest_post ), 'link' => '' ],
			],
			$breadcrumbs->get()
		);

		// Custom post
		$custom_post_type_id = $this->factory->post->create( [ 'post_type' => $this->post_type ] );
		$custom_post = get_post( $custom_post_type_id );
		$this->go_to( get_permalink( $custom_post_type_id ) );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$post_type_object = get_post_type_object( $custom_post->post_type );
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $post_type_object->label, 'link' => get_post_type_archive_link( $custom_post->post_type ) ],
				[ 'title' => get_the_title( $custom_post_type_id ), 'link' => '' ],
			],
			$breadcrumbs->get()
		);
	}

	public function test_post_type_archive() {
		// No posts
		$this->go_to( get_post_type_archive_link( $this->post_type ) );
		$this->assertFalse( get_post_type() );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$post_type_object = get_post_type_object( $this->post_type );
		$this->assertFalse( get_post_type() );
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $post_type_object->label, 'link' => '' ],
			],
			$breadcrumbs->get()
		);

		// Has posts
		$custom_post_type_id = $this->factory->post->create( [ 'post_type' => $this->post_type ] );
		$this->go_to( get_post_type_archive_link( $this->post_type ) );
		$breadcrumbs = new \Mimizuku\App\Models\Breadcrumbs\Breadcrumbs();
		$post_type_object = get_post_type_object( $this->post_type );
		$this->assertNotFalse( get_post_type() );
		$this->assertEquals(
			[
				[ 'title' => 'Home', 'link' => 'http://example.org' ],
				[ 'title' => $post_type_object->label, 'link' => '' ],
			],
			$breadcrumbs->get()
		);
	}
}
