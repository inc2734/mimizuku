#!/usr/bin/env bash

rm -rf wprepository
yarn run gulp wprepository
cd wprepository
composer install --no-dev
cd ../
yarn run gulp zip
