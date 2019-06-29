#!/bin/sh

while :
do
	php artisan log:summary
	sleep 86400
done
