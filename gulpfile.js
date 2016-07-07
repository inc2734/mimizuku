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

var dir = {
	src: {
		css: './src/scss/**/*.scss',
		js : './src/js/app.js'
	},
	dist: {
		css: './',
		js : './assets/js'
	}
}

gulp.task( 'sass', function() {
	return gulp.src( dir.src.css )
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

gulp.task( 'browserify', function() {
	return browserify( dir.src.js )
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

gulp.task( 'build', ['sass', 'browserify'] );

gulp.task( 'browsersync', function() {
	browser_sync.init( {
		proxy: '127.0.0.1:8080'
	} );
} );

gulp.task( 'default', ['build', 'browsersync'], function() {
	gulp.watch( [ dir.src.css ], ['sass'] );
	gulp.watch( [ dir.src.js ], ['browserify'] );
	gulp.watch( ['**/*.php', dir.src.js + '/*', 'style.min.css'], function() {
		browser_sync.reload();
	} );
} );
