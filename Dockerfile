FROM mlocati/php-extension-installer AS php-extension-installer

FROM php:8.4-cli-alpine3.19 AS base

ENV TZ=UTC

COPY --from=php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions @composer gd curl xml zip mbstring

RUN apk add --update --no-cache \
    zip git curl bash \
    su-exec

# Set up App user
RUN mkdir -p /var/app/www \
    && addgroup -g 1000 app \
    && adduser -u 1000 -G app -h /var/app/ -s /bin/sh -D app \
    && addgroup app www-data \
    && mkdir -p /var/app/www /var/app/www_tmp \
    && chown -R app:app /var/app

WORKDIR /var/app/www
