#!/usr/bin/env bash

yarn run gulp wprepository
cd wprepository
composer install --no-dev
yarn run gulp zip
