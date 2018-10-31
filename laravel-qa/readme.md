- SETUP PROJECT
laravel new laravel-qa
git
node
npm install
php artisan make:auth
php artisan migrate[:fresh]
php artisan serve

- CREATE SCHEMA
php artisane make:model Question -m

- CREATE FACTORIES
php artisan make:factory QuestionFactory
php artisan migrate:fresh --seed