FROM base-mapagoiano:latest

# Define the ENV variable
ENV nginx_vhost /etc/nginx/sites-available/default
ENV nginx_conf /etc/nginx/conf.d/default.conf

# Enable PHP-fpm on nginx virtualhost configuration
COPY compose/production/nginx.conf ${nginx_vhost}
COPY compose/production/nginx.conf ${nginx_conf}

RUN mkdir -p /run/php && \
    chown -R www-data:www-data /var/www/html && \
    chown -R www-data:www-data /run/php

# Copy source
COPY src/index.php /var/www/html/index.php
COPY --chown=www-data:www-data src/protected /var/www/html/protected

RUN mkdir -p /var/www/html/protected/vendor /var/www/.composer/ && \
    chown -R www-data:www-data /var/www/html/protected/vendor/ /var/www/.composer/

RUN ln -s /var/www/html/protected/application/lib/postgis-restful-web-service-framework /var/www/html/geojson

WORKDIR /var/www/html/protected
RUN composer.phar install

WORKDIR /var/www/html/protected/application/themes/

RUN find . -maxdepth 1 -mindepth 1 -exec echo "compilando sass do tema " {} \; -exec sass {}/assets/css/sass/main.scss {}/assets/css/main.css -E "UTF-8" \;

RUN mkdir /var/www/html/assets
RUN mkdir /var/www/html/files
RUN mkdir /var/www/private-files
RUN mkdir /var/log/php-fpm

COPY scripts /var/www/scripts
COPY compose/production/php.ini /usr/local/etc/php/php.ini
COPY compose/production/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY compose/config.php /var/www/html/protected/application/conf/config.php
COPY compose/config.d /var/www/html/protected/application/conf/config.d

COPY version.txt /var/www/version.txt
COPY compose/recreate-pending-pcache-cron.sh /recreate-pending-pcache-cron.sh
COPY compose/entrypoint.sh /entrypoint.sh

RUN chmod -R 775 /var/www/

RUN chmod -R 777 /var/log/nginx /var/lib/nginx

RUN chmod -R 777 /var/log/php-fpm

RUN sed -i 's/\/run/\/var\/log\/nginx/g' /etc/nginx/nginx.conf

RUN chown -R www-data. /var/www/* && chmod -R ugo+w /var/www/*

ENTRYPOINT ["/entrypoint.sh"]

WORKDIR /var/www/html/

EXPOSE 80 443

RUN ln -s /var/www/html /var/www/src

CMD ["php-fpm"]
