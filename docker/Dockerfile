FROM ubuntu:16.04

RUN apt-get update && apt-get install -y php7.0 \
                      curl \
                      apache2 \
                      apache2-utils \
                      php7.0-mysql \
                      php7.0-curl \
                      libapache2-mod-php7.0 \
                      php7.0-xml

RUN apt-get install -y mysql-server

RUN a2enmod php7.0
RUN a2enmod rewrite

RUN curl -s https://getcomposer.org/installer | php

#ENV APACHE_RUN_USER www-data
#ENV APACHE_RUN_GROUP www-data
#ENV APACHE_LOG_DIR /var/log/apache2
#ENV APACHE_LOCK_DIR /var/lock/apache2
#ENV APACHE_PID_FILE /var/run/apache2.pid
#COPY apache-foreground.sh /usr/local/bin/
EXPOSE 80

WORKDIR /var/www/app

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]