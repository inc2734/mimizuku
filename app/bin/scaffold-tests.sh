#!/usr/bin/env bash

set -e;

theme=$(wp theme list --field=name --status=active)
themedir=$(wp theme path $theme --dir)

phar extract -f $(which wp) "$themedir/app/bin/wp.phar">/dev/null 2>&1
wpclidir="$themedir/app/bin/wp.phar$(which wp)"

if [ ! -e "$themedir/app/bin" ]; then
	mkdir -p "$themedir/app/bin"
fi

cp -f "$wpclidir/templates/install-wp-tests.sh" "$themedir/app/bin/install-wp-tests.sh"

cp -f "$wpclidir/templates/phpunit.xml.dist" "$themedir/phpunit.xml"

if [ ! -e "$themedir/tests" ]; then
	mkdir "$themedir/tests"
fi

cp -f "$wpclidir/templates/bootstrap.mustache" "$themedir/tests/bootstrap.mustache"
sed -e "s/require dirname( dirname( __FILE__ ) ) \. '\/{{plugin_slug}}\.php';/register_theme_directory( dirname( __FILE__ ) . '\/\.\.\/\.\.\/' ); switch_theme('$theme');/g" "$themedir/tests/bootstrap.mustache">"$themedir/tests/bootstrap.php"
rm -f "$themedir/tests/bootstrap.mustache"

cp -f "$wpclidir/templates/test-sample.mustache" "$themedir/tests/test-sample.php"

rm -rf "$themedir/app/bin/wp.phar"
echo "done!"
