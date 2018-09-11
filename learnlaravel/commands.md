/*
|--------------------------------------------------------------------------
| Install
|--------------------------------------------------------------------------
| composer create-project laravel/laravel login 5.2
| composer install --no-scripts
| composer install
| chmod -R 777 storage
| php artisan key:generate
*/
/*
|--------------------------------------------------------------------------
| Maintrance
|--------------------------------------------------------------------------
| php artisan down
| php artisan up
*/
/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
| php artisan route:list
*/
/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
| php artisan make:controller PostsController
| --resource - create controller with methods(index, create, store, show, edit, update,destroy)
*/
/*
|--------------------------------------------------------------------------
| Migrations
|--------------------------------------------------------------------------
| php artisan make:migration create_posts_table --create="posts"
| php artisan make:migration add_is_admin_column_to_posts_table --table="posts"
|
| * create user_role table foe many to many eloq rel
| php artisan make:migration create_users_roles_table --create=role_user

|
| php artisan migrate
| php artisan migrate:rollback
| php artisan migrate:reset
| php artisan migrate:refresh
| php artisan migrate:status
*/
/*
|--------------------------------------------------------------------------
| Seeds
|--------------------------------------------------------------------------
| php artisan make:seeder UsersTableSeeder
| php artisan db:seed
*/
/*
|--------------------------------------------------------------------------
| Factories
|--------------------------------------------------------------------------
|  php artisan db:seed
*/
/*
|--------------------------------------------------------------------------
| Model
|--------------------------------------------------------------------------
| php artisan make:model Post
| -m - create migration file
*/
/*
|--------------------------------------------------------------------------
| Request
|--------------------------------------------------------------------------
| php artisan make:request CreatePostRequest
*/
/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
| php artisan make:auth
*/
/*
|--------------------------------------------------------------------------
| Middleware
|--------------------------------------------------------------------------
| php artisan make:middleware RoleMiddleware
*/
/*
|--------------------------------------------------------------------------
| Git
|--------------------------------------------------------------------------
| git config --global user.name="Zarko"
| git config --global user.name="zarko.stanisic@live.com"
| git init
| git clone https://github.com/zarkostanisic/learngit
| git status
| git add .
| git commit -m "commands"
| git push origin master
| git pull
|
| git log
| git reset --hard 16daf50db8d79942d3d4325629c1e0be374bf8c6
|
| git checkout -b newcategory | create branch
| git checkout develop | switch branch
| git merge newcategory | merge
| git branch -d newcategory | delete branch
*/
/*
|--------------------------------------------------------------------------
| Sluggable
|--------------------------------------------------------------------------
| composer require cviebrock/eloquent-sluggable:^3.1
| php artisan sluggable:table posts slug
| composer update
| composer dump-autoload
| php artisan migrate
*/
/*
|--------------------------------------------------------------------------
| Update to Laravel 5.3
|--------------------------------------------------------------------------
| composer.json: 
|	"laravel/framework": "5.3.*",
| 	"laravelcollective/html": "^5.3.0",
|	"cviebrock/eloquent-sluggable": "^4.0"
| composer update
*/
/*
|--------------------------------------------------------------------------
| File Manager
|--------------------------------------------------------------------------
| composer.json: 
| 	"unisharp/laravel-filemanager": "~1.8",
|	"intervention/image": "^2.4"
| composer update
*/
|--------------------------------------------------------------------------
| Update to Laravel 5.4
|--------------------------------------------------------------------------
| composer.json: 
| 	"laravel/framework": "5.4.*",
|   "laravelcollective/html": "^5.4.0",
|	"phpunit/phpunit": "~5.7",
| composer update
| php artisan view:clear
| php artisan route:clear
| remove gulpfile.js
| create webpack.mix.js with paths from gulpfile.js
| change package.json
*/
*/
|--------------------------------------------------------------------------
| Update to Laravel 5.4
|--------------------------------------------------------------------------
| composer.json: 
|	"php": ">=7.0.0",
| 	"laravel/framework": "5.5.*",
|   "laravelcollective/html": "^5.5.0",
|	"cviebrock/eloquent-sluggable": "^4.3",
|	"phpunit/phpunit": "~6.0",
| composer update
*/
