#!/usr/bin/env bash

dir=`dirname $0`
phar extract -f $(which wp) "$dir/wp.phar">/dev/null 2>&1
wpdir="$dir/wp.phar$(which wp)"

cp -f "$wpdir/templates/install-wp-tests.sh" "$dir/install-wp-tests.sh"

cp -f "$wpdir/templates/phpunit.xml.dist" "$dir/../../phpunit.xml"

if [ ! -e "$dir/../../tests" ]; then
	mkdir "$dir/../../tests"
fi

cp -f "$wpdir/templates/bootstrap.mustache" "$dir/../../tests/bootstrap.mustache"
sed -e "s/require dirname( dirname( __FILE__ ) ) \. '\/{{plugin_slug}}\.php';/switch_theme('mimizuku');/g" "$dir/../../tests/bootstrap.mustache">"$dir/../../tests/bootstrap.php"
rm -f "$dir/../../tests/bootstrap.mustache"

cp -f "$wpdir/templates/test-sample.mustache" "$dir/../../tests/test-sample.php"

rm -rf "$dir/wp.phar"
echo "done!"
