# Use a Debian base image
FROM debian:bullseye-slim

# Install Apache2
RUN apt-get update && \
    apt-get install -y apache2 && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]

# Switch to PHP with Apache image
FROM php:7.4-apache

# Continue with installing PHP extensions and configuring PHP
RUN apt-get update && \
    apt-get install -y \
        libpq-dev \
        libzip-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libonig-dev \
        default-mysql-client \
        && rm -rf /var/lib/apt/lists/* \
        && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
        && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mysqli zip

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the current directory contents into the container
COPY . /var/www/html
