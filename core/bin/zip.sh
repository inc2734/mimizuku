#!/usr/bin/env bash

git clone -b release --quiet git@github.com:inc2734/mimizuku.git release
cd release
yarn run gulp zip
mv mimizuku.zip ../
