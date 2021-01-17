#!/usr/bin/env bash

bin/phpcbf
bin/phpcs --report=checkstyle --report-file=var/checkstyle.xml --standard=phpcs.xml

exit 0
