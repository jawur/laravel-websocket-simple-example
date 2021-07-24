FROM nginx:1.17-alpine

COPY ./docker/nginx/resources/site.conf /etc/nginx/conf.d/default.conf
COPY ./docker/nginx/resources/fastcgi_params /etc/nginx/fastcgi_params
COPY ./docker/nginx/resources/local-bin/ /usr/local/bin/

ONBUILD WORKDIR /usr/share/nginx/html
ONBUILD COPY public/ .

ENTRYPOINT ["docker-nginx-entrypoint"]
CMD ["nginx", "-g", "daemon off;"]
