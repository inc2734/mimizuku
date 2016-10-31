#!/usr/bin/env bash

set -e;

if [[ $(pwd) =~ ^.+/wp-content/themes/([^/]+) ]]; then
  themedir=${BASH_REMATCH[0]}
else
  echo 'Current directory is not a theme.'
  echo $(pwd)
  exit 1;
fi

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
