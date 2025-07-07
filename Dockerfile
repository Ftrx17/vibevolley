FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql mysqli pdo_pgsql pgsql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev

# Set permissions for writable directory
RUN chown -R www-data:www-data /var/www/html/writable

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]