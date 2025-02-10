#!/bin/bash

composer update

#php artisan migrate:fresh --seed
php artisan cache:clear
php artisan config:clear
php artisan route:cache

mkdir -p /var/www/html/storage/app/documents
chown -R www-data:www-data /var/www/html/storage/app/documents

mkdir -p /var/www/html/storage/app/elements
mkdir -p /var/www/html/storage/app/elements/thumbs
chown -R www-data:www-data /var/www/html/storage/app/elements

mkdir -p /var/www/html/storage/app/empik
mkdir -p /var/www/html/storage/app/empik/thumbs
chown -R www-data:www-data /var/www/html/storage/app/empik

mkdir -p /var/www/html/storage/app/images
mkdir -p /var/www/html/storage/app/images/thumbs
chown -R www-data:www-data /var/www/html/storage/app/images

mkdir -p /var/www/html/storage/app/options
mkdir -p /var/www/html/storage/app/options/thumbs
chown -R www-data:www-data /var/www/html/storage/app/options

chown -R www-data:www-data /var/www/html/storage/framework
chown -R www-data:www-data /var/www/html/vendor

cp -p /var/www/html/.env.docker /var/www/html/.env

exec docker-php-entrypoint apache2-foreground