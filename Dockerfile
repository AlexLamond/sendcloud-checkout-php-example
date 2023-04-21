FROM php:8.1-apache

RUN apt-get update && apt-get install -y git

COPY ./app /var/www/html

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN alias composer='php /usr/bin/composer'

WORKDIR /var/www/html
RUN composer update && composer install

RUN a2enmod rewrite && service apache2 restart  