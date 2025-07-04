FROM php:8.2-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY app/ /var/www/html/
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 8080 # change from EXPOSE 80 to EXPOSE 8080
