FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y \
    vim \
    zlib1g-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    unzip \
    curl \
    git \
    libcurl4-openssl-dev \
    libxml2-dev \
    libicu-dev && \
    docker-php-ext-install pdo_mysql mysqli pdo intl mbstring xml
# Xdebug install
RUN pecl install xdebug-3.1.1 && docker-php-ext-enable xdebug


# Install MySQL client
RUN apt-get update && \
    apt-get install -y \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

EXPOSE 8080

