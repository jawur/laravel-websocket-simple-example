FROM nginx:1.17-alpine

COPY ./docker/nginx/resources/site.conf /etc/nginx/conf.d/default.conf
COPY ./docker/nginx/resources/fastcgi_params /etc/nginx/fastcgi_params

ONBUILD WORKDIR /usr/share/nginx/html
ONBUILD COPY public/ .
