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

* rename column
composer require doctrine/dbal
php artisan make:migration rename_answers_column_in_questions_table --table="questions"

- CREATE FACTORIES
php artisan make:factory QuestionFactory
php artisan migrate:fresh --seed

- CREATE SEED
php artisan make:seeder VotablesTableSeeder
php artisan db:seed --class=VotablesTableSeeder

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
