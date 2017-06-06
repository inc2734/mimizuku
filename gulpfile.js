'use strict';

var gulp         = require('gulp');
var sass         = require('gulp-sass');
var postcss      = require('gulp-postcss');
var cssnano      = require('cssnano');
var rename       = require('gulp-rename');
var uglify       = require('gulp-uglify');
var browser_sync = require('browser-sync');
var autoprefixer = require('autoprefixer');
var rimraf       = require('rimraf');
var runSequence  = require('run-sequence');
var zip          = require('gulp-zip');
var rollup       = require('gulp-rollup');
var nodeResolve  = require('rollup-plugin-node-resolve');
var commonjs     = require('rollup-plugin-commonjs');
var babel        = require('rollup-plugin-babel');

var dir = {
  src: {
    css     : 'src/css',
    js      : 'src/js',
    images  : 'src/images',
    packages: 'node_modules'
  },
  dist: {
    css     : 'assets/css',
    js      : 'assets/js',
    images  : 'assets/images',
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
    dir.src.packages + '/sass-basis/**',
    dir.src.packages + '/sass-basis-*/**'
  ];
  return gulp.src(packages, {base: 'node_modules'})
    .pipe(gulp.dest(dir.dist.packages))
    .on('end', function() {
      var files = [
        dir.src.packages + '/sass-basis/vendor/html5.js'
      ];
      return gulp.src(files)
        .pipe(gulp.dest(dir.dist.vendor));
    });
});

/**
 * Remove images in assets directory
 */
gulp.task('remove-images', function(cb) {
  rimraf(dir.dist.images, cb);
});

/**
 * Copy images to assets directory
 */
gulp.task('copy-images',['remove-images'], function() {
  return gulp.src(dir.src.images + '/**/*')
    .pipe(gulp.dest(dir.dist.images));
});

/**
 * Build CSS
 */
gulp.task('css', function() {
  return sassCompile(dir.src.css + '/*.scss', dir.dist.css);
});

function sassCompile(src, dest) {
  return gulp.src(src)
    .pipe(sass({
      includePaths: require('node-normalize-scss').includePaths
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
  gulp.src(dir.src.js + '/**/*.js')
    .pipe(rollup({
      allowRealFiles: true,
      entry: dir.src.js + '/app.js',
      format: 'iife',
      external: ['jquery', '_', 'Backbone'],
      globals: {
        jquery: "jQuery"
      },
      plugins: [
        nodeResolve({ jsnext: true }),
        commonjs(),
        babel({
          presets: ['es2015-rollup'],
          babelrc: false
        })
      ]
    }))
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
gulp.task('build', ['copy-packages', 'copy-images', 'font-awesome'], function() {
  return runSequence('css', 'js');
});

/**
 * browsersync
 */
gulp.task('browsersync', function() {
  browser_sync.init({
    proxy: '127.0.0.1:8080',
		files: [
      '**/*.php',
      dir.dist.js + '/app.min.js',
      dir.dist.css + '/style.min.css'
		]
  });
});

/**
 * Creates directory for wprepository
 */
gulp.task('wprepository', ['build'], function(){
  return gulp.src(
      [
        '**',
        '!README.md',
        '!package.json',
        '!yarn.lock',
        '!gulpfile.js',
        '!codesniffer.ruleset.xml',
        '!phpmd.ruleset.xml',
        '!phpunit.xml',
        '!tests',
        '!tests/**',
        '!node_modules',
        '!node_modules/**',
        '!vendor',
        '!vendor/**',
        '!app/bin',
        '!app/bin/**',
        '!wprepository',
        '!wprepository/**',
        '!mimizuku.zip'
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
        '!wprepository/composer.lock'
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
  gulp.watch([dir.src.css + '/**/*.scss'], ['css']);
  gulp.watch([dir.src.js + '/**/*.js'] , ['js']);
  gulp.watch([dir.src.images + '/**'] , ['copy-images']);
});
