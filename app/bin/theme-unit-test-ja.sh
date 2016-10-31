#!/usr/bin/env bash

set -e;

if [[ $(pwd) =~ ^.+/wp-content/themes/([^/]+) ]]; then
  themedir=${BASH_REMATCH[0]}
else
  echo 'Current directory is not a theme.'
  exit 1;
fi

datetime=`date +%Y%m%d%H%M%S`
wp db export "$themedir/../../dump-$datetime.sql"

if [ -e "$themedir/../../dump-$datetime.sql" ]; then
	wp plugin install --activate wordpress-importer
	wp plugin is-installed wordpress-importer

	if [ $? -eq 0 ]; then
		wp menu delete $(wp menu list --fields=term_id) --quiet
		wp post delete $(wp post list --post_type=page,post --posts_per_page=-1 --format=ids) --force --quiet

		wget https://raw.githubusercontent.com/jawordpressorg/theme-test-data-ja/master/wordpress-theme-test-date-ja.xml -P $themedir
		wp import "$themedir/wordpress-theme-test-date-ja.xml" --authors=create --quiet
		wp menu location assign "All Pages" global-nav
		wp menu location assign "All Pages" drawer-nav
		rm -rf "$themedir/wordpress-theme-test-date-ja.xml"
	fi
fi
