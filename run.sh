#!/bin/bash

cp .env.example .env
composer install --no-interaction --prefer-dist
npm install && npm run build
php artisan key:generate
php artisan migrate --force
bash scheduler.sh &
php artisan serve --host=0.0.0.0 --port=8001
