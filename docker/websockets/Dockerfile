FROM php:7.4-fpm

RUN apt-get update \
    && apt-get install -y \
    iproute2 \
    libzip-dev \
    libicu-dev \
    wget \
    zip \
    git \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    gd \
    zip \
    bcmath \
    pdo_mysql \
    intl

COPY ./docker/php/resources/conf.d/ /usr/local/etc/php/conf.d/
COPY ./docker/php/resources/local-bin/ /usr/local/bin/

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

EXPOSE 6001

CMD ["php", "artisan", "websockets:serve"]
