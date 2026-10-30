# syntax=docker/dockerfile:1

# ---------------------------------------------------------------------------
# base: PHP 8.4 + Apache + the extensions the app needs
# (pdo_sqlite ships with the official image)
# ---------------------------------------------------------------------------
FROM php:8.4-apache AS base

COPY --from=mlocati/php-extension-installer:2 /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# pcntl: laravel/pail
RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip \
    && rm -rf /var/lib/apt/lists/* \
    && install-php-extensions intl opcache pcntl zip \
    && a2enmod rewrite headers remoteip

COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

ENV COMPOSER_HOME=/tmp/composer

WORKDIR /var/www/html

# ---------------------------------------------------------------------------
# dev: code is bind-mounted; www-data is remapped to the host user so files
# written by the app (logs, cache, sqlite) stay editable on the host
# ---------------------------------------------------------------------------
FROM base AS dev

ARG UID=1000
ARG GID=1000

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini" \
    && groupmod -o -g ${GID} www-data \
    && usermod -o -u ${UID} -g ${GID} www-data
