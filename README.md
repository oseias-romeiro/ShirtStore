# ShirtStore


Try: [SHIRTSORE](http://shirtstore.freevar.com/)

## Execute
```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan config:cache
touch db.sqlite
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=ProductSeeder
php artisan serve
```
