# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Install necessary PHP extensions and MySQL client
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

# Expose port 80 (assuming Apache is running on this port on your EC2 instance)
EXPOSE 4000

# Start Apache in the foreground
CMD ["apache2-foreground"]
