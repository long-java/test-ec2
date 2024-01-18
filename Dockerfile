FROM php:8.1-apache

WORKDIR /var/www/html

# RUN apt-get update -y && apt-get install -y libmariadb-dev
# RUN docker-php-ext-install mysqli
# RUN chmod -R 777 ./data/mysql/ca.pem
# RUN chmod -R 777 ./data/mysql/private_key.pem.temp



# COPY . .

# EXPOSE 80

# ENV MYSQL_HOST=mysql
# ENV MYSQL_USER=root
# ENV MYSQL_PASSWORD=pwd12345
# ENV MYSQL_DATABASE=db1

# CMD ["sh", "-c", "until nc -z $MYSQL_HOST 3306; do sleep 1; done; apache2-foreground"]