'use strict';

import $ from 'jquery';

export default class FixAdminBar {
	constructor() {
		this.min       = 599;
		this.container = $('._l-container--sticky-footer');
		this.header    = $('._l-header');
		this.contents  = $('._l-contents');

		$(() => {
			this.adminBar  = $('#wpadminbar');

			if (this.adminBar.length) {
				this.fixHeaderPosition();
				this.fixStickyFooter();
				this.setListener();
			}
		});
	}

	setListener() {
		$(window).resize(() => {
			this.fixHeaderPosition();
			this.fixStickyFooter();
		});

		$(window).scroll(() => {
			this.fixHeaderPosition();
		});
	}

	fixHeaderPosition() {
		const scroll = $(window).scrollTop();

		if ($(window).outerWidth() < this.min) {
			if (this.adminBar.outerHeight() <= scroll) {
				this.header.css('top', 0);
			} else {
				this.header.removeClass('_l-header--overlay');
				this.header.css('top', '');
				this.header.next().css('padding-top', 0);
			}
		} else {
			this.header.css('top', '');
		}
	}

	fixStickyFooter() {
		const adminbar_height = parseInt( this.adminBar.outerHeight() ) + 'px';
		this.container.css('min-height', 'calc(100vh - ' + adminbar_height + ')');
	}
}
