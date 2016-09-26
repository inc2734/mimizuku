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

cd wprepository

git add -A
git status
git commit -m "[ci skip] wprepository branch update from travis $TRAVIS_COMMIT"
git push "https://${GH_TOKEN}@github.com/${TRAVIS_REPO_SLUG}.git" wprepository 2> /dev/null
git status
