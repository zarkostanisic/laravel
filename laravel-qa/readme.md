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

- CREATE CONTROLLER
php artisan make:controller QuestionsController --resource --model="Question"

- CHANGE PAGINATION
php artisan vendor:publish --tag=laravel-pagination

- barryvdh/laravel-debugbar
composer require barryvdh/laravel-debugbar --dev

- ROUTE LIST
php artisan route:list --name=questions

- CREATE REQUEST
php artisan make:request AskQuestionRequest

- CREATE POLICY
php artisan make:policy QuestionPolicy --model=Question
