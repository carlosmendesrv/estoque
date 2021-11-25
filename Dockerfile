FROM php:8.0-fpm-alpine

RUN apk add --no-cache  --virtual .ext-deps \
        openssl-dev \
        bash \
        mysql-client \
        nodejs \
        npm \
        git \
        autoconf \
        g++ \
        make \
        libpng-dev \
        postgresql-dev


RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql gd 

RUN apk add --no-cache tzdata
ENV TZ America/Sao_Paulo

RUN echo 'memory_limit = -1' >> /usr/local/etc/php/php.ini
RUN echo 'upload_max_filesize = 40M' >> /usr/local/etc/php/php.ini
RUN echo 'post_max_size = 40M' >> /usr/local/etc/php/php.ini
# RUN echo 'extension=pdo_pgsql' >> /usr/local/etc/php/php.ini
# RUN echo 'extension=pgsql' >> /usr/local/etc/php/php.ini

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
RUN rm -rf /var/www/html

COPY . /var/www
RUN ln -s public html

EXPOSE 9000
