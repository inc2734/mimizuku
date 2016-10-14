# Mimizuku

[![Build Status](https://travis-ci.org/inc2734/mimizuku.svg?branch=master)](https://travis-ci.org/inc2734/mimizuku)
[![Latest Stable Version](https://poser.pugx.org/inc2734/mimizuku/v/stable)](https://packagist.org/packages/inc2734/mimizuku)
[![License](https://poser.pugx.org/inc2734/mimizuku/license)](https://packagist.org/packages/inc2734/mimizuku)

Minizuku is a WordPress theme to develop the child theme.

* GitHub: https://github.com/inc2734/mimizuku/
* Packagist: https://packagist.org/packages/inc2734/mimizuku

## Required
* PHP 5.6+
* WP-CLI

## Get Started
### Install
Mimizuku is a parent theme. So you should download the Mimizuku child theme. See https://github.com/inc2734/mimizuku-child. If you build this child theme, aloso downloaded Mimizuku by composer.

```
$ cd /PATH/TO/wp-content/themes
$ git clone https://github.com/inc2734/mimizuku-child.git
$ cd mimizuku-child
$ composer install
```

### update
```
$ cd /PATH/TO/wp-content/themes/mimizuku-child
$ composer update mimizuku
```

## How to build
```
$ npm install
$ npm run gulp build
$ composer install
```

## Start up built-in server
```
$ bash app/bin/server.sh
```

## Import theme unit test data
```
$ bash app/bin/theme-unit-test.sh
```

## Generate files needed for running PHPUnit tests.
```
$ bash app/bin/scaffold-tests.sh
```

## Run PHPUnit tests
### Generate WordPress tests environment and run phpunit
```
$ bash app/bin/wpphpunit.sh
```

### Run phpunit only
```
$ phpunit
```

## Directory structure

### Directory for layout templates
```
/layout/wrapper
```

### Directory for header templates
```
/layout/header
```

### Directory for footer templates
```
/layout/footer
```

### Directory for view templates
```
/views
```

### Directory for static view templates
```
/views/static
```

Mimizuku tries to load the view template according to the URL. For example when URL is http://example.com/foo/bar, tries to laod from `/views/static/foo/bar.php`.

## Using view controller
```
$controller = new \Mimizuku\App\Controllers\Controller();
$controller->layout( 'right-sidebar' );
$controller->render( 'content/content', 'news' );
```

## Template tags

### \\Mimizuku\\App\\Tags\\get_template_part()

This is a function which to pass the variables to WordPress's `get_template_part()`.

```
// The caller
\Mimizuku\App\Tags\get_template_part( 'path/to/template-parts', [
	'_foo' => 'bar',
	'_baz' => 'qux',
] );

// The called template. path/to/template-parts.php
<ul>
	<li><?php echo esc_html( $_foo ); // bar ?></li>
	<li><?php echo esc_html( $_baz ); // qux ?></li>
</ul>
```

## Filter hooks

### mimizuku_layout

Filtering layout file.

```
add_filter( 'mimizuku_layout', function( $layout ) {
	return $layout;
} );
```

### mimizuku_view

Filtering view file.

```
add_filter( 'mimizuku_view', function( $view ) {
	return $view;
} );
```

### mimizuku_header

Filtering header layout file.

```
add_filter( 'mimizuku_header', function( $header ) {
	return $header;
} );
```

### mimizuku_footer

Filtering footer layout file.

```
add_filter( 'mimizuku_footer', function( $footer ) {
	return $footer;
} );
```

### mimizuku_content_width

Filtering `$content_width` of WordPress.

```
add_filter( 'mimizuku_content_width', function( $content_width ) {
	return $content_width;
} );
```

### mimizuku_support_ie9

Filtering loading `basis-ie9.css`.

```
add_filter( 'mimizuku_support_ie9', function( $boolean ) {
	return $boolean;
} );
```
