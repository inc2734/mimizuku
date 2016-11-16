'use strict';

import $ from 'jquery';

export default class FixAdminBar {
	constructor() {
		this.min       = 599;
		this.container = $('[data-bs-container-layout="sticky-footer"]');
		this.header    = $('[data-bs-layout="header"]');
		this.contents  = $('[data-bs-layout="contents"]');

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
		if (-1 !== $.inArray(this.header.attr('data-bs-header-layout'), ['sticky', 'overlay'])) {
			const scroll = $(window).scrollTop();

			if (this.min > $(window).outerWidth()) {
				if (scroll >= this.adminBar.outerHeight()) {
					this.header.css('top', 0);
				} else {
					this.header.css('top', '');
					this.header.attr('data-bs-header-scrolled', false);
					this.contents.css('padding-top', 0);
				}
			} else {
				this.header.css('top', '');
			}
		}
	}

	fixStickyFooter() {
		const adminbar_height = parseInt( this.adminBar.outerHeight() ) + 'px';
		this.container.css('min-height', 'calc(100vh - ' + adminbar_height + ')');
	}
}
