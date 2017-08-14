#!/usr/bin/env bash

open http://127.0.0.1:8080
wp server --host=127.0.0.1 --port=8080 --docroot=`dirname $0`/../../../../../
