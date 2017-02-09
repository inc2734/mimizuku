'use strict';

import '../packages/sass-basis/src/js/basis.js';

import BasisStickyHeader from '../packages/sass-basis-layout/src/js/sticky-header.js';
new BasisStickyHeader();

import FixAdminBar from './fix-adminbar.js';
new FixAdminBar();
