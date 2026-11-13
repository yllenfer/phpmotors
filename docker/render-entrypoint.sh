#!/bin/sh
# Starts the bundled MariaDB, creates the app database/user, then hands over
# to the normal PHP Motors entrypoint (which seeds sample data and starts Apache).
set -e
mkdir -p /run/mysqld && chown mysql:mysql /run/mysqld
mysqld_safe --user=mysql --bind-address=127.0.0.1 >/dev/null 2>&1 &
for i in $(seq 1 30); do mysqladmin ping --silent 2>/dev/null && break; sleep 1; done
mysql -uroot <<SQL
CREATE DATABASE IF NOT EXISTS \`${DB_NAME}\`;
CREATE USER IF NOT EXISTS '${DB_USER}'@'127.0.0.1' IDENTIFIED BY '${DB_PASSWORD}';
CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASSWORD}';
GRANT ALL ON \`${DB_NAME}\`.* TO '${DB_USER}'@'127.0.0.1';
GRANT ALL ON \`${DB_NAME}\`.* TO '${DB_USER}'@'localhost';
FLUSH PRIVILEGES;
SQL
exec phpmotors-entrypoint "$@"
