## World Book Challenge App 


#### Initial project:
[Laravel Sail](https://laravel.com/docs/8.x/sail)

1. Copy `.env.example` and save as `.env`
2. `composer install`
3. `./sail.sh up` - up docker services 
4. `docker-compose exec laravel.test bash` - enter to container
5. `php artisan key:generate`
6. `php artisan migrate`


#### Helpers for docker 
* `docker-compose ps` - list running services
* `docker-compose exec laravel.test bash` - enter to container


#### PHP Unit Testing 
1. `docker-compose exec laravel.test bash`
2. `php ./vendor/bin/phpunit` - for run testing
* Now it will refresh local db. 
