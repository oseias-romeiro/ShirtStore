# ShirtStore

ShirtStore is a web application built with Laravel for managing an online shirt store. It provides features for managing products, categories, and users.

## Requirements

- PHP >= 7.3
- Composer
- SQLite (or other database system)

## Installation

```sh
git clone https://github.com/oseias-romeiro/ShirtStore.git
cd ShirtStore
composer install
cp .env.example .env
php artisan key:generate
php artisan config:cache
```

### SQLite database config
```sh
touch db.sqlite
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=ProductSeeder
```

### Start server
```sh
php artisan serve
```
