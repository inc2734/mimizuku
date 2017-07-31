#!/usr/bin/env bash

set -e;

themedir=$(pwd)

if [ -z "$(ls $themedir/resources/)" ]; then
  cp -r "$themedir/core/.resources/." "$themedir/resources/"
  echo "Success ! Expanded to $themedir/resources/"
else
  echo "$themedir/resources/* already exsist !"
fi
