#!/usr/bin/env bash

dir=`dirname $0`
datetime=`date +%Y%m%d%H%M%S`
wp db export "$dir/../../dump-$datetime.sql"

if [ -e "$dir/../../dump-$datetime.sql" ]; then
	wp plugin install --activate wordpress-importer
	wp plugin is-installed wordpress-importer

	if [ $? -eq 0 ]; then
		wp menu delete $(wp menu list --fields=term_id) --quiet
		wp post delete $(wp post list --post_type=page,post --posts_per_page=-1 --format=ids) --force --quiet

		wget https://raw.githubusercontent.com/jawordpressorg/theme-test-data-ja/master/wordpress-theme-test-date-ja.xml -P $dir
		wp import "$dir/wordpress-theme-test-date-ja.xml" --authors=create --quiet
		wp menu location assign "All Pages" global-nav
		wp menu location assign "All Pages" drawer-nav
		rm -rf "$dir/wordpress-theme-test-date-ja.xml"
	fi
fi
