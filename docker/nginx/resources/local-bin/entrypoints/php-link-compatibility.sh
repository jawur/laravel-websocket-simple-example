#!/bin/sh

# if php link not defined
if ! getent hosts php; then
  # find what php-fpm resolves to
  PHP_FPM_IP="$(getent hosts php-fpm | cut -d' ' -f1)"

  # and if that's defined, we'll copy it over so that php resolves as well
  if [ $PHP_FPM_IP ]; then
    echo "$PHP_FPM_IP    php" | tee -a /etc/hosts > /dev/null
  fi
fi
