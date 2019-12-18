#!/usr/bin/bash
php composer.phar self-update
php composer.phar install
yarn install
php bin/console translation:update --dump-messages fr --domain=messages
php bin/console translation:update --dump-messages en --domain=messages
php bin/console translation:update --force fr --domain=messages
php bin/console translation:update --force en --domain=messages
php bin/console cache:clear
yarn encore dev
php bin/console make:migration
php bin/console d:s:u --force
php bin/console doctrine:schema:validate
git add .
