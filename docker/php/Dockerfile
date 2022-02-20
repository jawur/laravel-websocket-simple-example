FROM php:7.4-fpm

RUN apt-get update \
    && apt-get install -y \
    #a collection of userspace utilities for controlling and monitoring various aspects of networking in the Linux kernel
    iproute2 \
    #a C library for reading, creating, and modifying zip archives
    libzip-dev \
    #Development files for International Components for Unicode
    libicu-dev \
    # a computer program that retrieves content from web servers
    wget \
    #a compression and file packaging utility for Unix
    zip \
    #a library for handling JPEG files
    libjpeg62-turbo-dev \
    #GD requirenment
    libfreetype6-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    #a driver that implements the PHP Data Objects (PDO)
    pdo \
    #is an open-source library that allows users to create and manipulate images easily
    gd \
    zip \
    bcmath \
    pdo_mysql \
    #a wrapper for the ICU library
    intl

COPY ./docker/php/resources/conf.d/ /usr/local/etc/php/conf.d/

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php --  --version 1.10.16 --install-dir=/usr/local/bin --filename=composer
RUN composer global require hirak/prestissimo

USER root
RUN chown www-data:www-data /var/www

RUN mkdir /var/logs
RUN chmod 777 /var/logs

ONBUILD USER www-data
ONBUILD COPY --chown=www-data:www-data . .
ONBUILD RUN composer install --no-dev

ONBUILD USER root

# Ensure storage and cache are writable (silently fails incase we're not using Laravel in the final image)
ONBUILD RUN chmod -R 777 /var/www/storage/ 2> /dev/null \
    && chmod -R 777 /var/www/bootstrap/cache/  2> /dev/null
