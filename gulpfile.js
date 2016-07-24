'use strict';

var gulp         = require( 'gulp' );
var sass         = require( 'gulp-sass' );
var postcss      = require( 'gulp-postcss' );
var cssnano      = require( 'cssnano' );
var rename       = require( 'gulp-rename' );
var uglify       = require( 'gulp-uglify' );
var browserify   = require( 'browserify' );
var babelify     = require( 'babelify' );
var source       = require( 'vinyl-source-stream' );
var browser_sync = require( 'browser-sync' );
var autoprefixer = require( 'autoprefixer' );
var rimraf       = require( 'rimraf' );
var runSequence  = require( 'run-sequence' );

var dir = {
	src: {
		css     : './src/scss',
		js      : './src/js',
		packages: './node_modules'
	},
	dist: {
		css     : './',
		js      : './assets/js',
		packages: './src/packages',
		vendor  : './assets/vendor'
	}
}

/**
 * The font-awesome moved to assets directory
 */
gulp.task( 'font-awesome', function() {
	return gulp.src( dir.src.packages + '/font-awesome/**', { base: 'node_modules' } )
		.pipe( gulp.dest( dir.dist.vendor ) );
} );

/**
 * Remove directory for copied node modules
 */
gulp.task( 'remove-packages-dir', function( cb ) {
	rimraf( dir.dist.packages, cb );
} );

/**
 * Copy dependencies node modules to src directory
 */
gulp.task( 'copy-packages', ['remove-packages-dir'], function( cb ) {
	var packages = [
		dir.src.packages + '/sass-basis/**',
		dir.src.packages + '/sass-basis-drawer/**',
		dir.src.packages + '/sass-basis-hamburger-btn/**',
		dir.src.packages + '/sass-basis-layout/**',
		dir.src.packages + '/sass-basis-menu/**'
	];
	return gulp.src( packages, { base: 'node_modules' } )
		.pipe( gulp.dest( dir.dist.packages ) );
} );

/**
 * Build sass
 */
gulp.task( 'sass', function() {
	return gulp.src( dir.src.css + '/*.scss' )
		.pipe( sass() )
		.pipe( postcss( [
			autoprefixer( {
				browsers: ['last 2 versions'],
				cascade: false
			})
		] ) )
		.pipe( gulp.dest( dir.dist.css ) )
		.pipe( postcss( [cssnano()] ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( dir.dist.css ) );
} );

/**
 * Build javascript
 */
gulp.task( 'browserify', function() {
	return browserify( dir.src.js + '/app.js' )
		.transform( 'babelify', { presets: ['es2015'] } )
		.transform( 'browserify-shim' )
		.bundle()
		.pipe( source( 'app.js' ) )
		.pipe( gulp.dest( dir.dist.js ) )
		.on( 'end', function() {
			gulp.src( [ dir.dist.js + '/app.js' ] )
				.pipe( uglify() )
				.pipe( rename( { suffix: '.min' } ) )
				.pipe( gulp.dest( dir.dist.js ) );
		} );
} );

/**
 * Build Mimizuku
 */
gulp.task( 'build', ['copy-packages'], function() {
	return runSequence( 'sass', 'font-awesome', 'browserify' );
} );

/**
 * browsersync
 */
gulp.task( 'browsersync', function() {
	browser_sync.init( {
		proxy: '127.0.0.1:8080'
	} );
} );

/**
 * Auto build and browsersync
 */
gulp.task( 'default', ['build', 'browsersync'], function() {
	gulp.watch( [dir.src.css + '/*.scss'], ['sass'] );
	gulp.watch( [dir.src.js + '/app.js'] , ['browserify'] );
	gulp.watch(
		[
			'./**/*.php',
			dir.dist.js + '/app.min.js',
			'style.min.css'
		],
		function() {
			browser_sync.reload();
		}
	);
} );
