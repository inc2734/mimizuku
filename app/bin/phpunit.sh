#!/usr/bin/env bash

if [ -e /tmp/wordpress-tests-lib ]; then
  phpunit
  exit 0
fi

dir=`dirname $0`
bash "$dir/wpphpunit.sh"
