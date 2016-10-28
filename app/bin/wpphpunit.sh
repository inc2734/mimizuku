#!/usr/bin/env bash

set -e;

themedir=$(wp theme path $(wp theme list --field=name --status=active) --dir)
cd $themedir

if [ -e $themedir/app/bin/install-wp-tests.sh ]; then
  echo 'DROP DATABASE IF EXISTS wordpress_test;' | mysql -u root

  if [ -e /tmp/wordpress ]; then
    rm -fr /tmp/wordpress
  fi

  if [ -e /tmp/wordpress-tests-lib ]; then
    rm -fr /tmp/wordpress-tests-lib
  fi

  bash "$themedir/app/bin/install-wp-tests.sh" wordpress_test root '' localhost latest;
  phpunit
else
  echo "$themedir/app/bin/install-wp-tests.sh not found."
fi;
