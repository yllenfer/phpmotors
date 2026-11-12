#!/bin/sh
# Hosts like Railway and Render tell the app which port to listen on via $PORT.
set -e
PORT="${PORT:-80}"

# mod_php needs exactly one Apache MPM: prefork. Switch off the others if present.
rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.*
[ -e /etc/apache2/mods-enabled/mpm_prefork.load ] || a2enmod -q mpm_prefork
sed -ri "s/^Listen [0-9]+/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf
# Load the sample data the first time the app meets an empty database
php /opt/phpmotors/seed.php || true

exec docker-php-entrypoint "$@"
