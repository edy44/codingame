# image à utiliser
FROM php:8.0-fpm

# Quelques library necessaires
RUN apt-get update \
    && apt-get install -y --no-install-recommends rpm zip vim locales apt-utils git libzip-dev libicu-dev g++ libpng-dev;

# CHangement du password du user root
ARG ROOT_PASSWORD
RUN echo 'root:${ROOT_PASSWORD}' | chpasswd

# Creation du user star
ARG USER_NAME
ARG USER_ID
ARG GROUP_ID
RUN groupadd -g ${GROUP_ID} ${USER_NAME}
RUN useradd -s /bin/bash -u ${USER_ID} -g ${GROUP_ID} ${USER_NAME}
RUN mkdir /home/${USER_NAME}
RUN chown -h ${USER_NAME}:${USER_NAME} /home/${USER_NAME}

ARG PATH_DOCKER
RUN mkdir ${PATH_DOCKER}
RUN mkdir ${PATH_DOCKER}/var
RUN chmod 0777 -R ${PATH_DOCKER}/var

# les locales, toujours utiles
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# Xdebug
RUN pecl install xdebug-3.0.1 && docker-php-ext-enable xdebug

# on télécharge et deplace le composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

# Quelques extesnions de php utiles
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo mysqli pdo_mysql gd opcache intl zip calendar
RUN pecl install apcu-5.1.18 && docker-php-ext-enable apcu
