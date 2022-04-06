FROM php:8.0-apache

# PHP extensions
RUN apt-get -y update
RUN apt-get -y install git
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install zip