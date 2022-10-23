FROM php:8.1-apache

ARG TZ

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Set timezone for the image
RUN ln -sf /usr/share/zoneinfo/$TZ /etc/localtime

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
