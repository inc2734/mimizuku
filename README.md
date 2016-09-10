# Mimizuku
Minizuku is a WordPress theme to develop the child theme.

* GitHub: https://github.com/inc2734/mimizuku/

## How to build
1. `$ npm install`
2. `$ npm run gulp build`

## Start up build-in server
* `$ bash bin/server.sh`

## Import theme unit test data
* `bash bin/theme-unit-test.sh`

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

### mimizuku_has_sidebar

Filtering displaying sidebar.

```
add_filter( 'mimizuku_has_sidebar', function( $boolean ) {
	return $boolean;
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
