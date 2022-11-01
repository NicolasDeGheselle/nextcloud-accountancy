FROM nextcloud:24-apache

RUN apt-get update
    && apt-get -y install curl gnupg
    && curl -sL https://deb.nodesource.com/setup_16.x  | bash -
    && apt-get -y install nodejs
    && cd custom_apps/accountancy
    && npm install