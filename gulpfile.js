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
		css   : ['./src/scss/**/*.scss', '!./src/scss/style.scss', '!./src/scss/editor-style.scss'],
		wpcss : ['./src/scss/style.scss', './src/scss/editor-style.scss'],
		js    : './src/js/app.js'
	},
	dist: {
		css   : './assets/css',
		wpcss : './',
		js    : './assets/js'
	}
}

gulp.task( 'css', function() {
	return sass_compile( dir.src.css, dir.dist.css );
} );

gulp.task( 'wpcss', function() {
	return sass_compile( dir.src.wpcss, dir.dist.wpcss );
} );

gulp.task( 'sass', ['css', 'wpcss'] );

function sass_compile( src, dist ) {
	return gulp.src( src )
		.pipe( sass() )
		.pipe( postcss( [
			autoprefixer( {
				browsers: ['last 2 versions'],
				cascade: false
			})
		] ) )
		.pipe( gulp.dest( dist ) )
		.pipe( postcss( [cssnano()] ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( dist ) );
}

gulp.task( 'font-awesome', function() {
	return gulp.src( './node_modules/font-awesome/**/*' )
		.pipe( gulp.dest( './assets/css/font-awesome/' ) );
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

gulp.task( 'build', ['css', 'wpcss', 'font-awesome', 'browserify'] );

gulp.task( 'browsersync', function() {
	browser_sync.init( {
		proxy: '127.0.0.1:8080'
	} );
} );

gulp.task( 'default', ['build', 'browsersync'], function() {
	gulp.watch( [ dir.src.css ], ['css'] );
	gulp.watch( [ dir.src.wpcss ], ['wpcss'] );
	gulp.watch( [ dir.src.js ], ['browserify'] );
	gulp.watch(
		[
			'**/*.php',
			dir.dist.js + '/**.*',
			dir.dist.css + '/**.*',
			'style.min.css'
		],
		function() {
			browser_sync.reload();
		}
	);
} );
