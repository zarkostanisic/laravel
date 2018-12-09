- CREATE EXCEPTION
php artisan make:exception AuthFailedException

- CREATE SQLITE DATABASE
touch database/testing.sqlite

- RUN TEST
vendor/bin/phpunit --filter testUserPassingWrongCredentials

- CREATE MAIL
php artisan make:mail ConfirmYourEmail --markdown="emails.confirm"

- CREATE REQUEST
 php artisan make:request SeriesRequest

- STORAGE LINK
php artisan storage:link

- QUEUE
php artisan queue:table
php artisan queue:work