FROM php:8.2-fpm AS dase
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    &&  rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_pgsql

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 9000
