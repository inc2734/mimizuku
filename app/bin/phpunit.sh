#!/usr/bin/env bash

if [ -e /tmp/wordpress-tests-lib ]; then
  themedir=$(wp theme path $(wp theme list --field=name --status=active) --dir)
  cd $themedir;
  phpunit
  exit 0
fi

dir=$(cd $(dirname $0) && pwd)
bash "$dir/wpphpunit.sh"
