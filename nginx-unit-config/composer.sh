#!/bin/sh

apt-get update && apt-get install -y unzip

cd /www

# Because this doesn't seem to work during container start up for some reason.
# https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md
curl https://getcomposer.org/download/2.8.6/composer.phar --output composer.phar

echo 'becc28b909d2cca563e7caee1e488063312af36b1f2e31db64f417723b8c402 composer.phar' | sha256sum --check

RESULT=$?

if [ $RESULT -ne 0 ]
then
    exit $RESULT
fi

php composer.phar install --no-dev
