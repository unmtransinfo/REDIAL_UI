FROM php:7.4-cli
#FROM php:7.2-apache (# Recommended: php-fpm)
WORKDIR /usr/src/myapp
COPY . .
# ENV REST_API_PROXY_SERVER localhost
EXPOSE 8000
CMD ["php","-S","0.0.0.0:8000"]
