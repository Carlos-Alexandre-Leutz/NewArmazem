FROM php:7.2-apache

RUN apt-get update \
 && apt-get install -y  --no-install-recommends \
    libxml2-dev \
    libcurl4-openssl-dev \
    libzip-dev \
    openssl  \
    libjpeg-dev  \
    libpng-dev  \
    libxpm-dev \
    libfreetype6-dev \
    git \
 && docker-php-ext-configure gd \
     --with-freetype-dir=/usr/lib/x86_64-linux-gnu/ \
     --with-jpeg-dir=/usr/lib/x86_64-linux-gnu/ \
     --with-xpm-dir=/usr/lib/x86_64-linux-gnu/ \
     --with-vpx-dir=/usr/lib/x86_64-linux-gnu/ \
 && docker-php-ext-install gd \
 && docker-php-ext-install zip dom curl pdo_mysql \
 && a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
