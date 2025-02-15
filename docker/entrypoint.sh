#!/bin/bash

composer update

#php artisan migrate:fresh --seed
#php artisan storage:link
php artisan optimize

chown -R www-data:www-data /var/www/html/storage/framework
chown -R www-data:www-data /var/www/html/vendor

cp -p /var/www/html/.env.docker /var/www/html/.env

exec docker-php-entrypoint apache2-foreground