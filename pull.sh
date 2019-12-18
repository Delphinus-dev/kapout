#!/usr/bin/bash
git checkout dev
git pull
php composer.phar self-update
php composer.phar install
yarn install
php bin/console cache:clear
yarn encore dev
yarn encore prod
php bin/console d:s:u --force
php bin/console d:s:v
