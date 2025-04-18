FROM php:8.2-apache

ARG UNAME=www-data
ARG UGROUP=www-data
ARG UID=1000
ARG GID=1000
RUN usermod  --uid $UID $UNAME
RUN groupmod --gid $GID $UGROUP

RUN apt-get update \
  && apt-get install -y  \
    wget \
    git \
    curl \
    zip \
    unzip \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nodejs \
    npm \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# 🟢 Installer Yarn (via corepack recommandé)
RUN npm install --global corepack && corepack enable && corepack prepare yarn@stable --activate
RUN docker-php-ext-install pdo mysqli pdo_mysql zip;
RUN mkdir -p /var/www/.cache && chown -R www-data:www-data /var/www/

# Install the latest Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

RUN a2enmod rewrite

WORKDIR /var/www

COPY . /var/www

EXPOSE 81

RUN usermod -u 1000 www-data

COPY ./docker/php/apache.conf /etc/apache2/sites-available/000-default.conf

CMD ["apache2-foreground"]