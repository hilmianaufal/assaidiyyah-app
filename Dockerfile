FROM node:20-alpine AS frontend-builder
WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build

FROM php:8.3-fpm-alpine

WORKDIR /var/www

RUN apk add --no-cache \
    curl \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    oniguruma-dev \
    linux-headers \
    sqlite-dev

RUN docker-php-ext-install pdo_sqlite pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

COPY --from=frontend-builder /app/public/build ./public/build
COPY --from=frontend-builder /app/node_modules ./node_modules

RUN mkdir -p database storage bootstrap/cache && \
    touch database/database.sqlite && \
    chmod -R 775 database storage bootstrap/cache && \
    chown -R www-data:www-data database storage bootstrap/cache

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/database/database.sqlite

RUN composer install --no-interaction --optimize-autoloader --no-dev && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan key:generate

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
