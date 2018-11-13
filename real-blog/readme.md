-CREATE PROJECT
composer create-project laravel/laravel real-blog

- MAKE AUTH
php artisan make:auth

- CREATE MODEL
php artisan make:model Post -m

- CREATE MIGRATION
php artisan make:migration add_user_column_into_posts_table --table=posts

- CREATE CONTROLLER
php artisan make:controller PostsController --resource

- CREATE MIDDLEWARE
php artisan make:middleware Admin

- CREATE POLICY
php artisan make:policy UserPolicy --model=Post