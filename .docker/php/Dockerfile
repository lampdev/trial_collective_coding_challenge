FROM php:8.0-fpm-alpine

# Install extensions
RUN docker-php-ext-install pdo_mysql bcmath

RUN apk add --update nodejs npm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Create user based on provided user ID
ARG HOST_UID
RUN adduser --disabled-password --gecos "" --uid $HOST_UID trial

# Switch to that user
USER trial