#!/usr/bin/env bash

set -e;

themedir=$(pwd)
if [ ! -e style.css ]; then
  echo 'Current directory is not a theme.'
  echo $(pwd)
  exit 1
fi

datetime=`date +%Y%m%d%H%M%S`
wp db export "$themedir/../../dump-$datetime.sql"

if [ -e "$themedir/../../dump-$datetime.sql" ]; then
  wp plugin is-installed wordpress-importer

  if [ $? -ne 0 ]; then
    wp plugin install --activate wordpress-importer
  fi

  if [ $? -eq 0 ]; then
    wp menu list --format=ids
    if [ $? -ne 0 ]; then
      wp menu delete $?
    fi

    wp post list --post_type=page,post --posts_per_page=-1 --format=ids
    if [ $? -ne 0 ]; then
      wp post delete $?
    fi

    wget https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml -P $themedir
    wp import "$themedir/theme-unit-test-data.xml" --authors=create --quiet
    wp menu location assign "All Pages" global-nav
    wp menu location assign "All Pages" drawer-nav
    rm -rf "$themedir/theme-unit-test-data.xml"
  fi
fi
