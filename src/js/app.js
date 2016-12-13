'use strict';

import '../packages/getbasis/src/js/basis.js';

import BasisStickyHeader from '../packages/getbasis-layout/src/js/sticky-header.js';
new BasisStickyHeader();

import FixAdminBar from './fix-adminbar.js';
new FixAdminBar();
