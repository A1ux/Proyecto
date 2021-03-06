FROM php:7.0.0-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y iputils-ping \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip 
    
RUN a2enmod rewrite