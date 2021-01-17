# image à utiliser
FROM php:8.0-fpm

# Quelques library necessaires
RUN apt-get update \
    && apt-get install -y --no-install-recommends rpm zip vim locales apt-utils git libzip-dev libicu-dev g++ libpng-dev;

# Creation du user star
ARG USER_ID
ARG GROUP_ID
RUN groupadd -g ${GROUP_ID} star
RUN useradd -s /bin/bash -u ${USER_ID} -g ${GROUP_ID} star
RUN mkdir /home/star
RUN chown -h star:star /home/star

RUN mkdir /home/star/codingame
RUN mkdir /home/star/codingame/var
RUN chmod 0777 -R /home/star/codingame/var

# les locales, toujours utiles
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# On copie le php.ini du repertoire actuel dans le contenaire
COPY php.ini /usr/local/etc/php/php.ini

# Xdebug
RUN pecl install xdebug-3.0.1 && docker-php-ext-enable xdebug \
#    && echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.client_host=localhost" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/xdebug.ini
#    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.discover_client_host=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/xdebug.ini

# on télécharge et deplace le composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

# Quelques extesnions de php utiles
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo mysqli pdo_mysql gd opcache intl zip calendar
RUN pecl install apcu-5.1.18 && docker-php-ext-enable apcu
