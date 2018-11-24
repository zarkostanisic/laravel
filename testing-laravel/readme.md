- RUN TEST
vendor/bin/phpunit
vendor/bin/phpunit --group formatted-date

- CREATE TEST
php artisan make:test PostTestw
php artisan make:test PostTest --unit

- DUSK CREATE TEST
php artisan dusk:make LoginTest

- DUSK RUN TEST
php artisan dusk
php artisan dusk --group login