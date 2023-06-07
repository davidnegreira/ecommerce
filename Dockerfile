FROM php:8.2-apache

ENV APP_ENV=prod

WORKDIR /var/www

RUN apt-get update \
  && apt-get install -y libzip-dev unzip zip --no-install-recommends \
  && apt-get clean

RUN docker-php-ext-install zip \
 && docker-php-ext-enable opcache

RUN a2enmod rewrite

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY docker/apache.conf /etc/apache2/sites-enabled/000-default.conf
COPY docker/ports.conf /etc/apache2/ports.conf

COPY . /var/www/
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN set -eux; \
    if [ -f composer.json ]; then \
		composer install; \
		composer clear-cache; \
        mkdir -p var/cache var/log; \
		composer dump-autoload --classmap-authoritative; \
		composer dump-env prod; \
		composer run-script --no-dev post-install-cmd; \
		chmod +x bin/console; sync; \
    fi

RUN set -eux; \
    if [ "$( find ./migrations -iname '*.php' -print -quit )" ]; then \
        php bin/console doctrine:migrations:migrate --no-interaction; \
        chmod -R 777 var; \
    fi

EXPOSE 80
CMD ["apache2-foreground"]
