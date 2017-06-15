#!/usr/bin/env bash

if [ -e /tmp/wordpress-tests-lib ]; then

  themedir=$(pwd)
  if [ ! -e style.css ]; then
    echo 'Current directory is not a theme.'
    echo $(pwd)
    exit 1
  fi

  cd ${themedir};
  vendor/bin/phpunit --configuration= ${themedir}/tests/phpunit.xml
  exit 0
fi

dir=$(cd $(dirname $0) && pwd)
bash "${dir}/wpphpunit.sh"
