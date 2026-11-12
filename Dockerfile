# PHP Motors - PHP 8.3 + Apache
FROM php:8.3-apache

# PDO MySQL for the database, GD (jpeg/png/gif) for image thumbnails on upload
RUN apt-get update \
 && apt-get install -y --no-install-recommends libjpeg62-turbo-dev libpng-dev libfreetype6-dev \
 && docker-php-ext-configure gd --with-jpeg --with-freetype \
 && docker-php-ext-install -j"$(nproc)" pdo_mysql gd \
 && rm -rf /var/lib/apt/lists/*

COPY docker/php.ini /usr/local/etc/php/conf.d/phpmotors.ini
COPY docker/apache-phpmotors.conf /etc/apache2/conf-enabled/phpmotors.conf
COPY docker/entrypoint.sh /usr/local/bin/phpmotors-entrypoint
COPY docker/seed.php sql/phpmotors.sql /opt/phpmotors/
RUN chmod +x /usr/local/bin/phpmotors-entrypoint

# The app hard-codes /phpmotors/ in its links and includes, so it lives in
# that subfolder of the web root; "/" redirects there.
COPY docker/root-index.php /var/www/html/index.php
COPY . /var/www/html/phpmotors/
RUN chown -R www-data:www-data /var/www/html/phpmotors/images/vehicles

ENTRYPOINT ["phpmotors-entrypoint"]
CMD ["apache2-foreground"]
