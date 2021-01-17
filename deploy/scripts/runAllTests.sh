#!/usr/bin/env bash

PHP_SUPPORTED_VERSION=${1:-php}

#Run phpunit tests with coverage
$(dirname $(which php))/$PHP_SUPPORTED_VERSION bin/phpunit --coverage-html=var/coverage/html/ --configuration phpunit.xml  --log-junit=var/unitreport.xml --coverage-clover=var/coverage/clover.xml # --coverage-text --testdox

bin/coverage-check var/coverage/clover.xml 70

bin/behat
