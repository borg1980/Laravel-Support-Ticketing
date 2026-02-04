FROM php:8.4.17-apache

USER root

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        unzip \
        curl \
        build-essential \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libgd-dev \
        jpegoptim optipng pngquant gifsicle

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install zip pdo_mysql mbstring exif pcntl bcmath gd
RUN docker-php-ext-install calendar && docker-php-ext-configure calendar

COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data
RUN usermod -G staff www-data
RUN a2enmod rewrite

ADD docker/custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini
COPY docker/entrypoint.sh /docker/entrypoint.sh
COPY . /var/www/html
ENTRYPOINT ["/docker/entrypoint.sh"]
