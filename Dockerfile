FROM php:8.1-fpm-alpine

ENV APP_ROOT /mnt
ENV LANG ja_JP.utf8
ENV LC_ALL ja_JP.utf8
WORKDIR $APP_ROOT

# Add mirror repo
RUN echo "https://alpine.cs.nctu.edu.tw/v3.16/main" >> /etc/apk/repositories; \
    echo "https://alpine.cs.nctu.edu.tw/v3.16/community" >> /etc/apk/repositories; \
    echo "http://alpine.northrepo.ca/v3.16/main" >> /etc/apk/repositories; \
    echo "http://alpine.northrepo.ca/v3.16/community" >> /etc/apk/repositories;

# Setup UTC+9
RUN apk --update add tzdata && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    apk del tzdata && \
    rm -rf /var/cache/apk/*

# install packages
RUN apk update && \
    apk upgrade && \
    apk add --update --no-cache \
    bash \
    busybox-extras \
    git \
    mailx \
    postfix

RUN echo "relayhost = [sendgrid-maildev]:1025" >> /etc/postfix/main.cf
