#!/usr/bin/env bash

set -e;

themedir=$(pwd)
if [ ! -e style.css ]; then
  echo 'Current directory is not a theme.'
  echo $(pwd)
  exit 1
fi

cd ${themedir}

if [ -e ${themedir}/app/bin/install-wp-tests.sh ]; then
  echo 'DROP DATABASE IF EXISTS wordpress_test;' | mysql -u root

  if [ -e /tmp/wordpress ]; then
    rm -fr /tmp/wordpress
  fi

  if [ -e /tmp/wordpress-tests-lib ]; then
    rm -fr /tmp/wordpress-tests-lib
  fi

  bash "${themedir}/app/bin/install-wp-tests.sh" wordpress_test root '' localhost latest;
  vendor/bin/phpunit --configuration= ${themedir}/tests/phpunit.xml
else
  echo "${themedir}/app/bin/install-wp-tests.sh not found."
fi;
