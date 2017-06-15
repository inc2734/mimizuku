#!/usr/bin/env bash

set -e

if [[ "false" != "$TRAVIS_PULL_REQUEST" ]]; then
  echo "Not deploying pull requests."
  exit
fi

if [[ "master" != "$TRAVIS_BRANCH" ]]; then
  echo "Not on the 'master' branch."
  exit
fi

if [[ "7" != "$TRAVIS_PHP_VERSION" ]]; then
	echo "deploy only PHP 7"
	exit
fi

git clone -b wprepository --quiet https://github.com/inc2734/mimizuku.git wprepository
cd wprepository
ls | xargs rm -rf
ls -la
cd ../
yarn install
yarn run gulp wprepository
cd wprepository
composer install --no-dev
rm -rf composer.json composer.lock
ls -la

git add -A
git status
git commit -m "[ci skip] wprepository branch update from travis $TRAVIS_COMMIT"
git push "https://${GH_TOKEN}@github.com/${TRAVIS_REPO_SLUG}.git" wprepository > /dev/null 2>&1
git status
