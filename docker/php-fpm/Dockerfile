FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    php83-pdo_mysql \
    php83-opcache \
    php83-session \
    php83-mbstring \
    php83-dom \
    php83-xml \
    php83-simplexml \
    php83-json \
    php83-phar \
    php83-zip \
    php83-gd \
    php83-curl \
    php83-iconv \
    php83-ctype \
    php83-tokenizer \
    php83-xmlreader \
    php83-xmlwriter \
    php83-zlib \
    php83-fileinfo \
    php83-fpm

WORKDIR /var/www/html

EXPOSE 9000
