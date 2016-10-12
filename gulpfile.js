'use strict';

var gulp         = require('gulp');
var stylus       = require('gulp-stylus');
var postcss      = require('gulp-postcss');
var cssnano      = require('cssnano');
var rename       = require('gulp-rename');
var uglify       = require('gulp-uglify');
var browserify   = require('browserify');
var babelify     = require('babelify');
var source       = require('vinyl-source-stream');
var browser_sync = require('browser-sync');
var autoprefixer = require('autoprefixer');
var rimraf       = require('rimraf');
var runSequence  = require('run-sequence');
var zip          = require('gulp-zip');

var dir = {
  src: {
    css     : 'src/stylus',
    js      : 'src/js',
    packages: 'node_modules',
    vendor  : 'src/vendor'
  },
  dist: {
    css     : './',
    js      : 'assets/js',
    packages: 'src/packages',
    vendor  : 'assets/vendor'
  }
}

/**
 * The font-awesome moved to assets directory
 */
gulp.task('font-awesome', function() {
  return gulp.src(dir.src.packages + '/font-awesome/**', {base: 'node_modules'})
    .pipe(gulp.dest(dir.dist.vendor));
});

/**
 * Remove directory for copied node modules
 */
gulp.task('remove-packages-dir', function(cb) {
  rimraf(dir.dist.packages, cb);
});

/**
 * Copy dependencies node modules to src directory
 */
gulp.task('copy-packages', ['remove-packages-dir'], function(cb) {
  var packages = [
    dir.src.packages + '/getbasis/**',
    dir.src.packages + '/getbasis-drawer/**',
    dir.src.packages + '/getbasis-hamburger-btn/**',
    dir.src.packages + '/getbasis-layout/**',
    dir.src.packages + '/getbasis-menu/**'
  ];
  return gulp.src(packages, {base: 'node_modules'})
    .pipe(gulp.dest(dir.dist.packages))
    .on('end', function() {
      var files = [
        dir.src.packages + '/getbasis/vendor/html5.js'
      ];
      return gulp.src(files)
        .pipe(gulp.dest(dir.dist.vendor));
    });
});

/**
 * Build CSS
 */
gulp.task('css', function() {
  return stylusCompile(dir.src.css + '/*.styl', dir.dist.css)
    .on('end', function() {
      return stylusCompile(dir.src.vendor + '/**/*.styl', dir.dist.vendor);
    });
});

function stylusCompile(src, dest) {
  return gulp.src(src)
    .pipe(stylus({
      'resolve url nocheck': true
    }))
    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      })
    ]))
    .pipe(gulp.dest(dest))
    .pipe(postcss([
      cssnano({
        'zindex': false
      })
    ]))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(dest))
}

/**
 * Build javascript
 */
gulp.task('js', function() {
  return browserify(dir.src.js + '/app.js')
    .transform('babelify', {presets: ['es2015']})
    .transform('browserify-shim')
    .bundle()
    .pipe(source('app.js'))
    .pipe(gulp.dest(dir.dist.js))
    .on('end', function() {
      gulp.src([dir.dist.js + '/app.js'])
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dir.dist.js));
    });
});

/**
 * Build Mimizuku
 */
gulp.task('build', ['copy-packages'], function() {
  return runSequence('css', 'font-awesome', 'js');
});

/**
 * browsersync
 */
gulp.task('browsersync', function() {
  browser_sync.init({
    proxy: '127.0.0.1:8080'
  });
});

/**
 * Creates directory for wprepository
 */
gulp.task('wprepository', ['build'], function(){
  return gulp.src(
      [
        '**/*',
        '!node_modules',
        '!node_modules/**',
        '!vendor',
        '!vendor/**',
        '!app/bin',
        '!app/bin/**',
        '!wprepository',
        '!wprepository/**',
        '!.git',
        '!codesniffer.ruleset.xml',
        '!gulpfile.js',
        '!package.json',
        '!phpmd.ruleset.xml',
        '!.gitignore',
        '!.travis.yml',
        '!tests',
        '!tests/**',
        '!phpunit.xml',
        '!**/.DS_Store'
      ],
      {base: './'}
    )
    .pipe(gulp.dest('wprepository'));
});

/**
 * Creates the zip file
 */
gulp.task('zip', ['wprepository'], function(){
  return gulp.src(
      [
        'wprepository/**',
        '!wprepository/composer.json',
        '!wprepository/composer.lock',
        '!wprepository/.git'
      ]
      , {base: './wprepository'}
    )
    .pipe(zip('mimizuku.zip'))
    .pipe(gulp.dest('./'));
});

/**
 * Auto build and browsersync
 */
gulp.task('default', ['build', 'browsersync'], function() {
  gulp.watch([dir.src.css + '/**/*.styl'], ['css']);
  gulp.watch([dir.src.js + '/**/*.js'] , ['js']);
  gulp.watch(
    [
      '**/*.php',
      dir.dist.js + '/app.min.js',
      dir.dist.css + 'style.min.css'
    ],
    function() {
      browser_sync.reload();
    }
  );
});
