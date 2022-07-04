FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

RUN apt-get update

RUN apt-get install -y libzip-dev

RUN docker-php-ext-configure zip

RUN docker-php-ext-install zip

RUN apt-get install -y \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-install bcmath \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

CMD ["php-fpm"]

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user && \
    chown -R www-data:www-data /var/www

# Set working directory
WORKDIR /var/www

USER $user
