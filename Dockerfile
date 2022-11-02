FROM nextcloud:24-apache

RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_16.x  | bash -
RUN apt-get -y install nodejs
WORKDIR 
COPY
RUN NODE_ENV=development
RUN npm install