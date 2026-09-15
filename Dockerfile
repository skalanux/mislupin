# PHP 7.4 (CLI) + mysqli.
#
# La app original corria sobre PHP 5.4 con la extension mysql_* (eliminada en
# PHP 7). Las funciones mysql_* se emulan sobre mysqli en
# app/funciones/conectar.php, sin tocar las queries del resto de la app.
# Los archivos que usan etiqueta corta (<?) se cubren activando
# short_open_tag en el arranque (php -d short_open_tag=On).
FROM php:7.4-cli

RUN apt-get update && apt-get install -y libzip-dev \
 && docker-php-ext-install bcmath zip mysqli \
 && rm -rf /var/lib/apt/lists/*

# Copia de respaldo de la app; en docker-compose el volumen ./app:/app prevalece.
ADD app /app
WORKDIR /app
EXPOSE 80
CMD ["php", "-d", "short_open_tag=On", "-S", "0.0.0.0:80", "-t", "/app"]