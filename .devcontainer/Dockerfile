FROM php:8.3-cli

# Cài thêm pdo_mysql
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql

# Cài composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
