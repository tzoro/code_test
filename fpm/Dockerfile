FROM bitnami/php-fpm:latest
RUN apt-get update
RUN apt-get install -y git \
                        libmcrypt-dev \
                        libfreetype6-dev \
                        libjpeg62-turbo-dev

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include
RUN docker-php-ext-install mbstring zip gd pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN mkdir -p /var/www/symfony-app
WORKDIR /var/www/symfony-app

ADD install-symfony.sh /install-symfony.sh
RUN chmod a+x /install-symfony.sh