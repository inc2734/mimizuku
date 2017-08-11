#!/usr/bin/env bash

set -e

if [[ "false" != "$TRAVIS_PULL_REQUEST" ]]; then
  echo "Not deploying pull requests."
  exit
fi

if [[ "master" != "$TRAVIS_BRANCH" ]]; then
  echo "Not on the 'master' branch."
  #exit
fi

if [[ "7" != "$TRAVIS_PHP_VERSION" ]]; then
	echo "deploy only PHP 7"
	exit
fi

git clone -b release --quiet git@github.com:inc2734/mimizuku.git release
cd release
ls | xargs rm -rf
ls -la
cd ../
yarn install
yarn run gulp release
cd release
composer install --no-dev
rm -rf composer.json composer.lock
ls -la

git add -A
git commit -m "[ci skip] release branch update from travis $TRAVIS_COMMIT"
git push origin release
