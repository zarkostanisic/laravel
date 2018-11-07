- SETUP
composer create-project laravel/laravel real-todo

- CONTROLLER
php artisan make:controller PagesController

- MODEL AND MIGRATION
php artisan make:model Todo  -m
php artisan migrate

- MODEL FACTORY
php artisan make:factory TodoFactory
php artisan make:seed TodosTableSeeder
php artisan db:seed