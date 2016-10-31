#!/usr/bin/env bash

if [ -e /tmp/wordpress-tests-lib ]; then

  if [[ $(pwd) =~ ^.+/wp-content/themes/([^/]+) ]]; then
    themedir=${BASH_REMATCH[0]}
  else
    echo 'Current directory is not a theme.'
    echo $(pwd)
    exit 1;
  fi

  cd $themedir;
  phpunit
  exit 0
fi

dir=$(cd $(dirname $0) && pwd)
bash "$dir/wpphpunit.sh"
