FROM php:${PHP_VERSION:+${PHP_VERSION}-}fpm-alpine
RUN apk update && apk upgrade

RUN docker-php-ext-install pdo pdo_mysql 