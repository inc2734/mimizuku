# Mimizuku
Minizuku is a WordPress theme to develop the child theme.

* GitHub: https://github.com/inc2734/mimizuku/

## Required
* PHP 5.6+

## How to build
1. `$ npm install`
2. `$ npm run gulp build`

## Start up build-in server
```
$ bash app/bin/server.sh
```

## Import theme unit test data
```
$ bash app/bin/theme-unit-test.sh
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
