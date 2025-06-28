# Pakai PHP 8.2 dengan Apache
FROM php:8.2-apache

# Salin semua file project ke folder Apache
COPY . /var/www/html/

# (Opsional) Install ekstensi PHP tambahan
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# Port default Apache
EXPOSE 80
