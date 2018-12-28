- CREATE MODEL WITH MIGRATION, FACTORY, RESOURCE CONTROLLER
php artisan make:model Model/Question -mfr
- CREATE API CONTROLLER
php artisan make:controller ReplyController --api
- CREATE RESOURCE
php artisan make:resource QuestionResource
- JWT
composer require tymon/jwt-auth
- NOTIFICATIONS
php artisan notifications:table
php artisan migrate
- PUSHER
composer require pusher/pusher-php-server "~3.0"
- GENERATE EVENT
php artisan event:generate
