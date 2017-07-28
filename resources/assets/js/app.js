(function ($) {
'use strict';

$ = 'default' in $ ? $['default'] : $;

var classCallCheck = function (instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
};

var createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);
    if (staticProps) defineProperties(Constructor, staticProps);
    return Constructor;
  };
}();









var inherits = function (subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function, not " + typeof superClass);
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      enumerable: false,
      writable: true,
      configurable: true
    }
  });
  if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass;
};











var possibleConstructorReturn = function (self, call) {
  if (!self) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return call && (typeof call === "object" || typeof call === "function") ? call : self;
};

var BasisHamburgerBtn = function () {
  function BasisHamburgerBtn() {
    var args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    classCallCheck(this, BasisHamburgerBtn);

    this.args = $.extend({
      btn: '.c-hamburger-btn'
    }, args);
    this.hamburgerBtn = $(this.args.btn);
    this.setListener();
  }

  createClass(BasisHamburgerBtn, [{
    key: 'setListener',
    value: function setListener() {
      this.hamburgerBtn.each(function (i, e) {
        var hamburgerBtn = $(e);
        var target = $('#' + hamburgerBtn.attr('aria-controls'));

        hamburgerBtn.click(function (event) {
          event.preventDefault();
          event.stopPropagation();

          if ('false' === hamburgerBtn.attr('aria-expanded')) {
            hamburgerBtn.attr('aria-expanded', 'true');
            target.attr('aria-hidden', 'false');
          } else {
            hamburgerBtn.attr('aria-expanded', 'false');
            target.attr('aria-hidden', 'true');
          }
        });
      });
    }
  }]);
  return BasisHamburgerBtn;
}();

var BasisDrawer = function () {
  function BasisDrawer() {
    var args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    classCallCheck(this, BasisDrawer);

    this.args = $.extend({
      drawer: '.c-drawer',
      toggle: '.c-drawer__toggle',
      submenu: '.c-drawer__submenu'
    }, args);
    this.drawer = $(this.args.drawer);
    this.setListener();
  }

  createClass(BasisDrawer, [{
    key: 'setListener',
    value: function setListener() {
      var _this = this;

      this.drawer.each(function (i, e) {
        var drawer = $(e);
        _this.setIdForSubmenu(drawer);

        var container = drawer.parent();
        var btn = $('#' + drawer.attr('aria-labeledby'));
        var toggleBtns = drawer.find(_this.args.toggle + '[aria-controls]');

        container.on('click', function (event) {
          _this.close(btn);
          _this.hidden(drawer);
          _this.close(drawer.find(_this.args.toggle));
          _this.hidden(drawer.find(_this.args.submenu));
        });

        drawer.on('click', function (event) {
          event.stopPropagation();
        });

        $(window).on('resize', function (event) {
          _this.hidden(drawer);
          _this.close(btn);
        });

        toggleBtns.each(function (i, e) {
          var toggleBtn = $(e);
          var submenu = $('#' + toggleBtn.attr('aria-controls'));
          toggleBtn.on('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            _this.toggleMenu(toggleBtn);
          });
        });
      });
    }
  }, {
    key: 'toggleMenu',
    value: function toggleMenu(btn) {
      var menu = $('#' + btn.attr('aria-controls'));
      if ('false' == btn.attr('aria-expanded')) {
        this.open(btn);
        this.show(menu);
      } else {
        this.close(btn);
        this.hidden(menu);
        this.close(menu.find(this.args.toggle));
        this.hidden(menu.find(this.args.submenu));
      }
    }
  }, {
    key: 'open',
    value: function open(target) {
      target.attr('aria-expanded', 'true');
    }
  }, {
    key: 'close',
    value: function close(target) {
      target.attr('aria-expanded', 'false');
    }
  }, {
    key: 'show',
    value: function show(target) {
      target.attr('aria-hidden', 'false');
    }
  }, {
    key: 'hidden',
    value: function hidden(target) {
      target.attr('aria-hidden', 'true');
    }
  }, {
    key: 'setIdForSubmenu',
    value: function setIdForSubmenu(drawer) {
      var _this2 = this;

      drawer.find(this.args.submenu + '[aria-hidden]').each(function (i, e) {
        var random = Math.floor(Math.random() * (9999999 - 1000000) + 1000000);
        var time = new Date().getTime();
        var id = 'drawer-' + time + random;
        var submenu = $(e);
        var toggleBtn = submenu.siblings(_this2.args.toggle);
        if (submenu.length && toggleBtn.length) {
          submenu.attr('id', id);
          toggleBtn.attr('aria-controls', '' + id);
        }
      });
    }
  }]);
  return BasisDrawer;
}();

var BasisNavbar = function () {
  function BasisNavbar() {
    var args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    classCallCheck(this, BasisNavbar);

    this.args = $.extend({
      item: '.c-navbar__item',
      submenu: '.c-navbar__submenu',
      subitem: '.c-navbar__subitem'
    }, args);
    this.items = $(this.args.item + '[aria-haspopup="true"], ' + this.args.subitem + '[aria-haspopup="true"]');
    this.setListener();
  }

  createClass(BasisNavbar, [{
    key: 'setListener',
    value: function setListener() {
      var _this = this;

      this.items.each(function (i, e) {
        var item = $(e);
        item.on('mouseover focus', function (event) {
          _this.show(item.children(_this.args.submenu));
        });

        item.on('mouseleave', function (event) {
          _this.hidden(item.children(_this.args.submenu));
        });
      });
    }
  }, {
    key: 'show',
    value: function show(submenu) {
      submenu.attr('aria-hidden', 'false');
    }
  }, {
    key: 'hidden',
    value: function hidden(submenu) {
      submenu.attr('aria-hidden', 'true');
    }
  }]);
  return BasisNavbar;
}();

var BasisPageEffect = function () {
  function BasisPageEffect() {
    var args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    classCallCheck(this, BasisPageEffect);

    this.args = $.extend({
      pageEffect: '.c-page-effect',
      duration: 200
    }, args);
    this.container = $(this.args.pageEffect);
    this.pageOutObject = $('[data-page-effect-link="true"], a[href]:not([target="_blank"], [href^="#"], [href*="javascript"], [href*=".jpg"], [href*=".jpeg"], [href*=".gif"], [href*=".png"], [href*=".mov"], [href*=".swf"], [href*=".mp4"], [href*=".flv"], [href*=".avi"], [href*=".mp3"], [href*=".pdf"], [href*=".zip"], [href^="mailto:"], [data-page-effect-link="false"])');
    this.setListener();
  }

  createClass(BasisPageEffect, [{
    key: 'setListener',
    value: function setListener() {
      var _this = this;

      $(window).on('load', function (event) {
        _this.hide();
      });

      this.pageOutObject.each(function (i, e) {
        var link = $(e);
        link.on('click', function (event) {
          if (event.shiftKey || event.ctrlKey || event.metaKey) {
            return;
          }

          event.preventDefault();
          _this.show();
          var url = link.attr('href');
          _this.moveLocation(url);
        });
      });
    }
  }, {
    key: 'moveLocation',
    value: function moveLocation(url) {
      setTimeout(function () {
        location.href = url;
      }, this.args['duration']);
    }
  }, {
    key: 'hide',
    value: function hide() {
      this.container.attr('aria-hidden', 'true').attr('data-page-effect', 'fadein');
    }
  }, {
    key: 'show',
    value: function show() {
      this.container.attr('aria-hidden', 'false').attr('data-page-effect', 'fadeout');
    }
  }]);
  return BasisPageEffect;
}();

var BasisSelect = function BasisSelect() {
  var _this = this;

  var args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
  classCallCheck(this, BasisSelect);

  this.args = $.extend({
    select: '.c-select',
    label: '.c-select__label'
  }, args);
  this.select = $(this.args.select);
  this.select.each(function (i, e) {
    var selectWrapper = $(e);
    var select = selectWrapper.find('select');
    var label = selectWrapper.find(_this.args.label);
    label.text(select.children('option:selected').text());

    select.on('change', function (event) {
      label.text($(select[0].selectedOptions).text());
    });

    select.on('focusin', function (event) {
      selectWrapper.attr('aria-selected', 'true');
    });

    select.on('focusout', function (event) {
      selectWrapper.attr('aria-selected', 'false');
    });
  });
};

new BasisHamburgerBtn();

new BasisDrawer();

new BasisNavbar();

new BasisPageEffect();

new BasisSelect();

/**
 * This is for the sticky header.
 */

var BasisStickyHeader = function () {
  function BasisStickyHeader() {
    var args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    classCallCheck(this, BasisStickyHeader);

    this.args = $.extend({
      container: '.l-container',
      header: '.l-header',
      contents: '.l-contents'
    }, args);

    this.windowScroll = $('html').attr('data-window-scroll');

    this.setScroll();
    this.setSticky();
    this.setListener();
  }

  createClass(BasisStickyHeader, [{
    key: 'setListener',
    value: function setListener() {
      var _this = this;

      var target = this.getScrollTarget();

      target.on('scroll resize', function (event) {
        _this.setScroll();
        _this.setSticky();
      });
    }
  }, {
    key: 'setScroll',
    value: function setScroll() {
      var scroll = this.getScrollTop();

      if (scroll > 0) {
        $('html').attr('data-scrolled', 'true');
      } else {
        $('html').attr('data-scrolled', 'false');
      }
    }
  }, {
    key: 'setSticky',
    value: function setSticky() {
      if ('sticky' !== $(this.args.header).attr('data-l-header-type')) {
        return;
      }
      var headerHeight = $(this.args.header).outerHeight();
      $(this.args.contents).css('marginTop', headerHeight + 'px');
    }
  }, {
    key: 'getScrollTarget',
    value: function getScrollTarget() {
      if ('false' == this.windowScroll) {
        return $(this.args.container);
      } else {
        return $(window);
      }
    }
  }, {
    key: 'getScrollTop',
    value: function getScrollTop() {
      return this.getScrollTarget().scrollTop();
    }
  }]);
  return BasisStickyHeader;
}();

var Inc2734_WP_Share_Buttons_Button = function () {
  function Inc2734_WP_Share_Buttons_Button(button) {
    var _this = this;

    var params = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
    classCallCheck(this, Inc2734_WP_Share_Buttons_Button);

    $(function () {
      _this.button = button;
      _this.params = $.extend({
        post_id: _this.button.data('wp-share-buttons-postid')
      }, params);

      if (!_this.button.data('wp-share-buttons-has-cache')) {
        if (_this.button.find('.wp-share-button__count').length) {
          _this.count();
        }
      }
      _this.popup();
    });
  }

  createClass(Inc2734_WP_Share_Buttons_Button, [{
    key: 'count',
    value: function count() {}
  }, {
    key: 'popup',
    value: function popup() {}
  }]);
  return Inc2734_WP_Share_Buttons_Button;
}();

var Inc2734_WP_Share_Buttons_Share_Count = function () {
  function Inc2734_WP_Share_Buttons_Share_Count(target) {
    var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'jsonp';
    var data = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
    classCallCheck(this, Inc2734_WP_Share_Buttons_Share_Count);

    this.target = target;
    this.type = type;
    this.data = data;
  }

  createClass(Inc2734_WP_Share_Buttons_Share_Count, [{
    key: 'request',
    value: function request() {
      return $.ajax({
        url: this.target,
        dataType: this.type,
        data: this.data
      });
    }
  }]);
  return Inc2734_WP_Share_Buttons_Share_Count;
}();

var Inc2734_WP_Share_Buttons_Popup = function () {
  function Inc2734_WP_Share_Buttons_Popup(target, title, width, height) {
    classCallCheck(this, Inc2734_WP_Share_Buttons_Popup);

    this.target = target;
    this.title = title;
    this.width = parseInt(width);
    this.height = parseInt(height);
    this.setListener();
  }

  createClass(Inc2734_WP_Share_Buttons_Popup, [{
    key: 'setListener',
    value: function setListener() {
      var _this = this;

      this.target.on('click', function (event) {
        event.preventDefault();
        window.open(_this.target.attr('href'), _this.title, 'width=' + _this.width + ', height=' + _this.height + ', menubar=no, toolbar=no, scrollbars=yes');
      });
    }
  }]);
  return Inc2734_WP_Share_Buttons_Popup;
}();

var Inc2734_WP_Share_Buttons_Facebook = function (_Inc2734_WP_Share_But) {
  inherits(Inc2734_WP_Share_Buttons_Facebook, _Inc2734_WP_Share_But);

  function Inc2734_WP_Share_Buttons_Facebook(button, params) {
    classCallCheck(this, Inc2734_WP_Share_Buttons_Facebook);
    return possibleConstructorReturn(this, (Inc2734_WP_Share_Buttons_Facebook.__proto__ || Object.getPrototypeOf(Inc2734_WP_Share_Buttons_Facebook)).call(this, button, params));
  }

  createClass(Inc2734_WP_Share_Buttons_Facebook, [{
    key: 'count',
    value: function count() {
      var _this2 = this;

      new Inc2734_WP_Share_Buttons_Share_Count(inc2734_wp_share_buttons_facebook.endpoint, 'json', {
        action: inc2734_wp_share_buttons_facebook.action,
        _ajax_nonce: inc2734_wp_share_buttons_facebook._ajax_nonce,
        post_id: this.params.post_id,
        url: this.params.url
      }).request().done(function (json) {
        _this2.button.find('.wp-share-button__count').text(json.count);
      });
    }
  }, {
    key: 'popup',
    value: function popup() {
      new Inc2734_WP_Share_Buttons_Popup(this.button.find('.wp-share-button__button'), 'Share on Facebook', 670, 400);
    }
  }]);
  return Inc2734_WP_Share_Buttons_Facebook;
}(Inc2734_WP_Share_Buttons_Button);

var Inc2734_WP_Share_Buttons_Twitter = function (_Inc2734_WP_Share_But) {
  inherits(Inc2734_WP_Share_Buttons_Twitter, _Inc2734_WP_Share_But);

  function Inc2734_WP_Share_Buttons_Twitter(button, params) {
    classCallCheck(this, Inc2734_WP_Share_Buttons_Twitter);
    return possibleConstructorReturn(this, (Inc2734_WP_Share_Buttons_Twitter.__proto__ || Object.getPrototypeOf(Inc2734_WP_Share_Buttons_Twitter)).call(this, button, params));
  }

  createClass(Inc2734_WP_Share_Buttons_Twitter, [{
    key: 'count',
    value: function count() {
      var _this2 = this;

      new Inc2734_WP_Share_Buttons_Share_Count(inc2734_wp_share_buttons_twitter.endpoint, 'json', {
        action: inc2734_wp_share_buttons_twitter.action,
        _ajax_nonce: inc2734_wp_share_buttons_twitter._ajax_nonce,
        post_id: this.params.post_id,
        url: this.params.url
      }).request().done(function (json) {
        _this2.button.find('.wp-share-button__count').text(json.count);
      });
    }
  }, {
    key: 'popup',
    value: function popup() {
      new Inc2734_WP_Share_Buttons_Popup(this.button.find('.wp-share-button__button'), 'Share on Twitter', 550, 400);
    }
  }]);
  return Inc2734_WP_Share_Buttons_Twitter;
}(Inc2734_WP_Share_Buttons_Button);

var Inc2734_WP_Share_Buttons_Hatena = function (_Inc2734_WP_Share_But) {
  inherits(Inc2734_WP_Share_Buttons_Hatena, _Inc2734_WP_Share_But);

  function Inc2734_WP_Share_Buttons_Hatena(button, params) {
    classCallCheck(this, Inc2734_WP_Share_Buttons_Hatena);
    return possibleConstructorReturn(this, (Inc2734_WP_Share_Buttons_Hatena.__proto__ || Object.getPrototypeOf(Inc2734_WP_Share_Buttons_Hatena)).call(this, button, params));
  }

  createClass(Inc2734_WP_Share_Buttons_Hatena, [{
    key: 'count',
    value: function count() {
      var _this2 = this;

      new Inc2734_WP_Share_Buttons_Share_Count(inc2734_wp_share_buttons_hatena.endpoint, 'json', {
        action: inc2734_wp_share_buttons_hatena.action,
        _ajax_nonce: inc2734_wp_share_buttons_hatena._ajax_nonce,
        post_id: this.params.post_id,
        url: this.params.url
      }).request().done(function (json) {
        _this2.button.find('.wp-share-button__count').text(json.count);
      });
    }
  }, {
    key: 'popup',
    value: function popup() {
      new Inc2734_WP_Share_Buttons_Popup(this.button.find('.wp-share-button__button'), 'Hatena Bookmark', 510, 420);
    }
  }]);
  return Inc2734_WP_Share_Buttons_Hatena;
}(Inc2734_WP_Share_Buttons_Button);

var Inc2734_WP_Share_Buttons_Line = function (_Inc2734_WP_Share_But) {
  inherits(Inc2734_WP_Share_Buttons_Line, _Inc2734_WP_Share_But);

  function Inc2734_WP_Share_Buttons_Line(button, params) {
    classCallCheck(this, Inc2734_WP_Share_Buttons_Line);
    return possibleConstructorReturn(this, (Inc2734_WP_Share_Buttons_Line.__proto__ || Object.getPrototypeOf(Inc2734_WP_Share_Buttons_Line)).call(this, button, params));
  }

  createClass(Inc2734_WP_Share_Buttons_Line, [{
    key: 'popup',
    value: function popup() {
      new Inc2734_WP_Share_Buttons_Popup(this.button.find('.wp-share-button__button'), 'Send to LINE', 670, 530);
    }
  }]);
  return Inc2734_WP_Share_Buttons_Line;
}(Inc2734_WP_Share_Buttons_Button);

var Inc2734_WP_Share_Buttons_Pocket = function (_Inc2734_WP_Share_But) {
  inherits(Inc2734_WP_Share_Buttons_Pocket, _Inc2734_WP_Share_But);

  function Inc2734_WP_Share_Buttons_Pocket(button, params) {
    classCallCheck(this, Inc2734_WP_Share_Buttons_Pocket);
    return possibleConstructorReturn(this, (Inc2734_WP_Share_Buttons_Pocket.__proto__ || Object.getPrototypeOf(Inc2734_WP_Share_Buttons_Pocket)).call(this, button, params));
  }

  createClass(Inc2734_WP_Share_Buttons_Pocket, [{
    key: 'popup',
    value: function popup() {
      new Inc2734_WP_Share_Buttons_Popup(this.button.find('.wp-share-button__button'), 'Pocket', 550, 350);
    }
  }]);
  return Inc2734_WP_Share_Buttons_Pocket;
}(Inc2734_WP_Share_Buttons_Button);

var Inc2734_WP_Share_Buttons_Feedly = function (_Inc2734_WP_Share_But) {
  inherits(Inc2734_WP_Share_Buttons_Feedly, _Inc2734_WP_Share_But);

  function Inc2734_WP_Share_Buttons_Feedly(button, params) {
    classCallCheck(this, Inc2734_WP_Share_Buttons_Feedly);
    return possibleConstructorReturn(this, (Inc2734_WP_Share_Buttons_Feedly.__proto__ || Object.getPrototypeOf(Inc2734_WP_Share_Buttons_Feedly)).call(this, button, params));
  }

  createClass(Inc2734_WP_Share_Buttons_Feedly, [{
    key: 'count',
    value: function count() {
      var _this2 = this;

      new Inc2734_WP_Share_Buttons_Share_Count(inc2734_wp_share_buttons_feedly.endpoint, 'json', {
        action: inc2734_wp_share_buttons_feedly.action,
        _ajax_nonce: inc2734_wp_share_buttons_feedly._ajax_nonce,
        post_id: this.params.post_id,
        url: this.params.url
      }).request().done(function (json) {
        _this2.button.find('.wp-share-button__count').text(json.count);
      });
    }
  }]);
  return Inc2734_WP_Share_Buttons_Feedly;
}(Inc2734_WP_Share_Buttons_Button);

var Inc2734_WP_Share_Buttons = function Inc2734_WP_Share_Buttons() {
  classCallCheck(this, Inc2734_WP_Share_Buttons);

  $(function () {
    $('.wp-share-button--facebook').each(function (i, e) {
      new Inc2734_WP_Share_Buttons_Facebook($(e));
    });

    $('.wp-share-button--twitter').each(function (i, e) {
      new Inc2734_WP_Share_Buttons_Twitter($(e));
    });

    $('.wp-share-button--hatena').each(function (i, e) {
      new Inc2734_WP_Share_Buttons_Hatena($(e));
    });

    $('.wp-share-button--line').each(function (i, e) {
      new Inc2734_WP_Share_Buttons_Line($(e));
    });

    $('.wp-share-button--pocket').each(function (i, e) {
      new Inc2734_WP_Share_Buttons_Pocket($(e));
    });

    $('.wp-share-button--feedly').each(function (i, e) {
      new Inc2734_WP_Share_Buttons_Feedly($(e));
    });
  });
};

var FixAdminBar = function () {
  function FixAdminBar() {
    var _this = this;

    classCallCheck(this, FixAdminBar);

    this.min = 599;
    this.container = $('[data-l="container"]');
    this.header = $('[data-l="header"]');
    this.contents = $('[data-l="contents"]');

    $(function () {
      _this.adminBar = $('#wpadminbar');

      if (_this.adminBar.length) {
        _this.fixHeaderPosition();
        _this.fixStickyFooter();
        _this.fixDisableWindowScroll();
        _this.setListener();
      }
    });
  }

  createClass(FixAdminBar, [{
    key: 'setListener',
    value: function setListener() {
      var _this2 = this;

      $(window).resize(function () {
        _this2.fixHeaderPosition();
        _this2.fixStickyFooter();
        _this2.fixDisableWindowScroll();
      });

      $(window).scroll(function () {
        _this2.fixHeaderPosition();
      });
    }
  }, {
    key: 'fixHeaderPosition',
    value: function fixHeaderPosition() {
      if (-1 !== $.inArray(this.header.attr('data-l-header-type'), ['sticky', 'overlay'])) {
        var scroll = $(window).scrollTop();
        var adminbar_height = parseInt(this.adminBar.outerHeight());

        if (this.min > $(window).outerWidth()) {
          if (scroll >= this.adminBar.outerHeight()) {
            this.header.css('top', 0);
            this.header.css('position', '');
          } else {
            if ('sticky' === this.header.attr('data-l-header-type')) {
              this.header.css('position', 'relative');
              this.header.css('top', '');
            } else {
              this.header.css('top', adminbar_height + scroll * -1);
            }
            $('html').attr('data-scrolled', false);
            this.contents.css('margin-top', 0);
          }
        } else {
          this.header.css('top', '');
          this.header.css('position', '');
        }
      }
    }
  }, {
    key: 'fixStickyFooter',
    value: function fixStickyFooter() {
      if ('true' == $('html').attr('data-sticky-footer')) {
        var adminbar_height = parseInt(this.adminBar.outerHeight());
        this.container.css('min-height', 'calc(100vh - ' + adminbar_height + 'px)');
      }
    }
  }, {
    key: 'fixDisableWindowScroll',
    value: function fixDisableWindowScroll() {
      if ('false' == $('html').attr('data-window-scroll')) {
        var adminbar_height = parseInt(this.adminBar.outerHeight());
        this.container.css('max-height', 'calc(100vh - ' + adminbar_height + 'px)');
      }
    }
  }]);
  return FixAdminBar;
}();

new BasisStickyHeader();

new Inc2734_WP_Share_Buttons();

new FixAdminBar();

}(jQuery));
