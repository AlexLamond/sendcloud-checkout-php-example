FROM php:8.1.18-apache

RUN apt-get update && apt-get install -y git

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --check && \
    export COMPOSER_MEMORY_LIMIT=-1 && \
    composer self-update --1 && \
    composer install --no-interaction --optimize-autoloader

RUN a2enmod rewrite && service apache2 restart