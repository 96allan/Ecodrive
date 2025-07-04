FROM php:8.2-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

#change apache to listen to port 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf && \
    sed -i 's/:80/:8080/' /etc/apache2/sites-available/000-default.conf
COPY app/ /var/www/html/

EXPOSE 8080
# change from EXPOSE 80 to EXPOSE 8080
