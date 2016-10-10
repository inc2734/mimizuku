#!/usr/bin/env bash

dir=`dirname $0`
datetime=`date +%Y%m%d%H%M%S`
wp db export "$dir/dump-$datetime.sql"

if [ -e "$dir/dump-$datetime.sql" ]; then
	wp plugin install --activate wordpress-importer
	wp plugin is-installed wordpress-importer

	if [ $? -eq 0 ]; then
		wp menu delete $(wp menu list --fields=term_id) --quiet
		wp post delete $(wp post list --post_type=page,post --posts_per_page=-1 --format=ids) --force --quiet

		wget https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml -P $dir
		wp import "$dir/theme-unit-test-data.xml" --authors=create --quiet
		wp menu location assign "All Pages" global-nav
		wp menu location assign "All Pages" drawer-nav
		rm -rf "$dir/theme-unit-test-data.xml"
	fi
fi
