FROM php:8.3-apache

WORKDIR /var/www/html

# Configure Apache to serve the public front controller
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Enable rewrite for .htaccess (RewriteEngine)
RUN a2enmod rewrite

# Remove ServerName warning
RUN echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

COPY . /var/www/html

EXPOSE 80