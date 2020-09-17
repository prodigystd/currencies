FROM php:7.4-fpm

RUN apt update && apt install -y --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev git  \
        libzip-dev \
        wget \
        zlib1g-dev \
        libpq-dev \
    && docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j$(nproc) iconv pgsql pdo pdo_pgsql\
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install bcmath \
    && rm -r /var/lib/apt/lists/*

COPY yii2.pool.conf  /usr/local/etc/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN usermod -u 1000 www-data

WORKDIR /var/www/html
EXPOSE 9000
CMD ["php-fpm", "-F"]

