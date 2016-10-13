#!/usr/bin/env bash

set -ex;

dir=`dirname $0`

echo 'DROP DATABASE IF EXISTS wordpress_test;' | mysql -u root

if [ -e /tmp/wordpress ]; then
  rm -fr /tmp/wordpress
fi

if [ -e /tmp/wordpress-tests-lib ]; then
  rm -fr /tmp/wordpress-tests-lib
fi

bash "$dir/install-wp-tests.sh" wordpress_test root '' localhost latest;
phpunit
