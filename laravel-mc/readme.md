- SETUP
composer create-project laravel/laravel laravel-qa

- CREATE AUTH
php artisan make:auth

- SOCIALITE
composer require laravel/socialite

- GENERATOR
"infyomlabs/laravel-generator": "5.7.x-dev",
"laravelcollective/html": "^5.7.0",
"infyomlabs/adminlte-templates": "5.7.x-dev",
"infyomlabs/swagger-generator": "dev-master",
"jlapp/swaggervel": "dev-master",
"doctrine/dbal": "~2.3"
composer update
