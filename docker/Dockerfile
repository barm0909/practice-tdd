FROM php:8.0-apache

RUN sed -i 's!/var/www/html!/var/www/html/laravel/public/!g' /etc/apache2/sites-available/000-default.conf

RUN apt-get update \
&& apt-get install -y \
zip \
unzip \
&& docker-php-ext-install pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite