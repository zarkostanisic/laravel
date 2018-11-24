- RUN TEST
vendor/bin/phpunit
vendor/bin/phpunit --group formatted-date

- CREATE TEST
php artisan make:test PostTest
php artisan make:test PostTest --unit