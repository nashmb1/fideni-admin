FROM ubuntu:16.04

RUN apt-get update && apt-get install -y php7.0 \
                      curl \
                      apache2 \
                      apache2-utils \
                      php7.0-mysql \
                      php7.0-curl


RUN curl -s https://getcomposer.org/installer | php

#COPY apache-foreground.sh /usr/local/bin/
EXPOSE 80

WORKDIR /var/www/app

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]