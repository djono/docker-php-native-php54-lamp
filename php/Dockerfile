FROM php:5.4-fpm
RUN apt update; \
    apt upgrade;
# Backup and clean source.list file
RUN cp /etc/apt/sources.list /etc/apt/sources.list.old && \
    cat /dev/null > /etc/apt/sources.list

# Fix the source.list for jessie
RUN printf "deb http://archive.debian.org/debian/ jessie main\n" > /etc/apt/sources.list && \
    printf "deb-src http://archive.debian.org/debian/ jessie main\n" >>  /etc/apt/sources.list && \
    printf "deb http://archive.debian.org/debian-security jessie/updates main\n" >>  /etc/apt/sources.list && \
    printf "deb-src http://archive.debian.org/debian-security jessie/updates main" >>  /etc/apt/sources.list

RUN apt-get -y --allow-unauthenticated update && apt-get upgrade -y --allow-unauthenticated

RUN docker-php-ext-install mysqli mbstring pdo pdo_mysql
# RUN apt add freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev
# Install tools && libraries
RUN apt-get -y --allow-unauthenticated install --fix-missing apt-utils nano wget dialog \
    build-essential git curl libcurl3 libcurl3-dev zip \
    libmcrypt-dev libsqlite3-dev libsqlite3-0 mysql-client \
    zlib1g-dev libicu-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    libapache2-mod-rpaf libpng12-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install iconv
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ 
RUN docker-php-ext-install gd
COPY php.ini /usr/local/etc/php/php.ini