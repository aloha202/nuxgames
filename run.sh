#!/bin/bash

composer install --no-interaction --prefer-dist
npm install && npm run build
php artisan migrate --force
bash scheduler.sh &
php artisan serve --host=0.0.0.0 --port=8000
