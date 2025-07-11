FROM php:8.1-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Configure Apache
RUN a2enmod rewrite && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    chown -R www-data:www-data /var/www/html

COPY . /var/www/html/
EXPOSE 80
# Additional debug steps
RUN echo "<?php phpinfo(); ?>" > /var/www/html/info.php && \
    chmod 644 /var/www/html/.htaccess
