# Pakai PHP 8.2 dengan Apache
FROM php:8.2-apache

# Install MySQL/MariaDB server
RUN apt-get update && apt-get install -y mariadb-server && docker-php-ext-install mysqli pdo pdo_mysql

# Copy semua file project ke folder Apache
COPY . /var/www/html/

# Copy file SQL ke folder khusus
COPY db_penilaian.sql /docker-entrypoint-initdb.d/

# Jalankan MySQL saat container start
CMD service mysql start && apache2-foreground

# Expose port default Apache
EXPOSE 80
