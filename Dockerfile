# Use the official PHP 8.2 image
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/lib/apt/lists/*

# Set the working directory
WORKDIR /var/www/html

# Copy the composer.json and composer.lock first to optimize caching
COPY composer.json composer.lock /var/www/html/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Copy the application files
COPY . /var/www/html

# Set the user to match the www-data group
ARG WWWUSER
ARG WWWGROUP
RUN groupadd -g ${WWWGROUP} www-data && useradd -u ${WWWUSER} -g www-data -m www-data

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose ports
EXPOSE 80

# Configure the entrypoint to run the PHP server in foreground
CMD ["php-fpm"]

