# docker/php/Dockerfile
FROM php:8.1-fpm

RUN apt-get update
RUN apt-get install -y autoconf pkg-config libssl-dev

# MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# MongoDB
RUN pecl install mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

# Xdebug
RUN pecl install xdebug-3.1.2
ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini