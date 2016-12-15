'use strict';

import $ from 'jquery';

export default class FixAdminBar {
  constructor() {
    this.min       = 599;
    this.container = $('[data-l="container"]');
    this.header    = $('[data-l="header"]');
    this.contents  = $('[data-l="contents"]');

    $(() => {
      this.adminBar  = $('#wpadminbar');

      if (this.adminBar.length) {
        this.fixHeaderPosition();
        this.fixStickyFooter();
        this.fixDisableWindowScroll();
        this.setListener();
      }
    });
  }

  setListener() {
    $(window).resize(() => {
      this.fixHeaderPosition();
      this.fixStickyFooter();
      this.fixDisableWindowScroll();
    });

    $(window).scroll(() => {
      this.fixHeaderPosition();
    });
  }

  fixHeaderPosition() {
    if (-1 !== $.inArray(this.header.attr('data-l-header-type'), ['sticky', 'overlay'])) {
      const scroll = $(window).scrollTop();

      if (this.min > $(window).outerWidth()) {
        if (scroll >= this.adminBar.outerHeight()) {
          this.header.css('top', 0);
        } else {
          this.header.css('top', '');
          $('html').attr('data-scrolled', false);
          this.contents.css('padding-top', 0);
        }
      } else {
        this.header.css('top', '');
      }
    }
  }

  fixStickyFooter() {
    if ('true' == $('html').attr('data-sticky-footer')) {
      const adminbar_height = parseInt(this.adminBar.outerHeight());
      this.container.css('min-height', `calc(100vh - ${adminbar_height}px)`);
    }
  }

  fixDisableWindowScroll() {
    if ('false' == $('html').attr('data-window-scroll')) {
      const adminbar_height = parseInt(this.adminBar.outerHeight());
      this.container.css('max-height', `calc(100vh - ${adminbar_height}px)`);
    }
  }
}
