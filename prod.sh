#!/bin/bash
git checkout master
git pull
php composer.phar self-update
php composer.phar install
yarn install
php bin/console cache:clear
yarn encore prod
php bin/console d:s:u --force
php bin/console d:s:v
