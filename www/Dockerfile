FROM php:7-apache



# Copia los archivos al directorio de trabajo del servidor web
COPY . /var/www/html/

EXPOSE 80

# Establecer permisos adecuados para el servidor web
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/