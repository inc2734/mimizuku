'use strict';

import BasisDrawer from '../packages/getbasis-drawer/src/js/drawer.js';
new BasisDrawer({
  container    : '._p-drawer',
  drawer       : '._p-drawer__body',
  btn          : '._p-drawer__btn',
  toggleSubmenu: '._p-drawer__toggle'
});

import BasisMenu from '../packages/getbasis-menu/src/js/menu.js';
new BasisMenu();

import BasisStickyHeader from '../packages/getbasis-layout/src/js/sticky-header.js';
new BasisStickyHeader();

import FixAdminBar from './fix-adminbar.js';
new FixAdminBar();
