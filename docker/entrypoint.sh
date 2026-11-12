#!/bin/sh
# Hosts like Railway and Render tell the app which port to listen on via $PORT.
set -e
PORT="${PORT:-80}"
sed -ri "s/^Listen [0-9]+/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf
exec docker-php-entrypoint "$@"
