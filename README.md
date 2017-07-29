# Mimizuku

[![Build Status](https://travis-ci.org/inc2734/mimizuku.svg?branch=master)](https://travis-ci.org/inc2734/mimizuku)
[![Latest Stable Version](https://poser.pugx.org/inc2734/mimizuku/v/stable)](https://packagist.org/packages/inc2734/mimizuku)
[![License](https://poser.pugx.org/inc2734/mimizuku/license)](https://packagist.org/packages/inc2734/mimizuku)

Mimizuku is a WordPress starter theme or theme framework for child themes development.

<img src="https://cdn.rawgit.com/inc2734/mimizuku/develop/src/img/mimizuku.svg" alt="Mimizuku" width="96px">

* GitHub: https://github.com/inc2734/mimizuku/
* Packagist: https://packagist.org/packages/inc2734/mimizuku

## Requirements
* WordPress 4.7
* PHP 5.6+
* WP-CLI
* Composer
* Node.js

## Browser support
* IE10 + Modern browser

## Get Started
### Using as starter theme
```
$ cd /PATH/TO/wp-content/themes
$ git clone https://github.com/inc2734/mimizuku.git your-theme-name
$ cd your-theme-name
$ composer install (and auto building)
$ wp theme activate your-theme-name
```

* Replace `mimizuku` to `your_theme_name` in \*\*.php and \*\*.js
* Replace `Mimizuku` to `Your_Theme_Name` in \*\*.php and \*\*.js

### Using as parent theme
See https://github.com/inc2734/mimizuku-child

## Theme features
* Having layout and view templates
* and having filter hooks filtered these templates
* Using view controller
* The function which to pass the variables to WordPress's `get_template_part()`.
* Usuful scripts
* CI
* See more https://github.com/inc2734/mimizuku-child

## Directory structure
```
themes/mimizuku
├─ core                    # Mimizuku core
│  ├─ bin                  # Useful commands (shell script)
│  ├─ composer-packages    # Loads composer packages
│  ├─ controller           # View controller
│  ├─ setup                # Setup mimizuku
│  └─ customizer           # Theme customizer
├─ resources               # Theme resources. Templates and assets that you normally use for themes are included here.
│  ├─ app                  # Setup theme (customizable)
│  ├─ templates
│  │  ├─ layout            # Layout templates
│  │  └─ view              # View templates
│  ├─ index.php
│  ├─ functions.php
│  ├─ ...
├─ functions.php           # Mimizuku bootstrap
├─ style.css               # Theme meta information
```

## Third-party resources

### Font Awesome (Web fonts)
* Font License: SIL OFL 1.1
* Code License: MIT License
* Source: https://fortawesome.github.io/Font-Awesome/

### Basis (Sass/CSS framework)
* License: MIT License
* Source: https://sass-basis.github.io/

### FLOCSS
* Source: https://github.com/hiloki/flocss

### inc2734/wp-breadcrumbs
* Source: https://github.com/inc2734/wp-breadcrumbs

### inc2734/wp-ogp
* Source: https://github.com/inc2734/wp-ogp

### inc2734/wp-oembed-blog-card
* Source: https://github.com/inc2734/wp-oembed-blog-card

### inc2734/wp-view-controller
* Source: https://github.com/inc2734/wp-view-controller

### inc2734/wp-basis
* Source: https://github.com/inc2734/wp-basis

### inc2734/wp-customizer-framework
* Source: https://github.com/inc2734/wp-customizer-framework

### inc2734/wp-github-theme-updater
* Source: https://github.com/inc2734/wp-github-theme-updater

### inc2734/wp-share-buttons
* Source: https://github.com/inc2734/wp-share-buttons

### inc2734/wp-seo
* Source: https://github.com/inc2734/wp-seo

### inc2734/wp-like-me-box
* Source: https://github.com/inc2734/wp-like-me-box

### inc2734/wp-pure-css-gallery
* Source: https://github.com/inc2734/wp-pure-css-gallery

## Official goods store
https://suzuri.jp/inc2734/products
