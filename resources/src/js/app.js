'use strict';

import $ from 'jquery';

import '../../assets/packages/slick-carousel';
import '../../vendor/inc2734/wp-basis/src/assets/packages/sass-basis/src/js/basis.js';
import '../../vendor/inc2734/wp-contents-outline/src/assets/packages/jquery.contents-outline/src/jquery.contents-outline.js';
import '../../vendor/inc2734/wp-awesome-widgets/src/assets/js/wp-awesome-widgets.js';
import '../../vendor/inc2734/wp-contents-outline/src/assets/js/wp-contents-outline.js';
import './_wpaw-pickup-slider.js';
import './_active-menu.js';

import BasisStickyHeader from '../../vendor/inc2734/wp-basis/src/assets/packages/sass-basis-layout/src/js/sticky-header.js';
new BasisStickyHeader();

import Inc2734_WP_Share_Buttons from '../../vendor/inc2734/wp-share-buttons/src/assets/js/wp-share-buttons.js';
new Inc2734_WP_Share_Buttons();

import FixAdminBar from './_fix-adminbar.js';
new FixAdminBar();

$('.wpaw-pickup-slider__canvas').WpawPickupSlider();
$('.wpaw-slider__canvas').WpawSlider();

$('.wpco-wrapper').wpContentsOutline();

$(window).on('elementor/frontend/init', () => {
  elementorFrontend.hooks.addAction('frontend/element_ready/widget', (scope) => {
    if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_slider')) {
      scope.find('.wpaw-slider__canvas').WpawSlider();
    } else if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_pickup_slider')) {
      scope.find('.wpaw-pickup-slider__canvas').MimizukuWpawPickupSlider();
    } else if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_showcase')) {
      scope.find('.wpaw-showcase').backgroundParallaxScroll();
    }
  });
});

$('.p-global-nav').MimizukuActiveMenu();
