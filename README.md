## About

This is a simple api that enables users to register, login and view their profile details. An admin is also able to login into their dashboard and view the list of registered users and their particular details

## Installation
Follow through the following steps setting up the application on your local development environment
```
git clone https://github.com/odera-dickens/pesakit.git <your_preffered_app_name>
cd <your_preffered_app_name>
composer install
```
## Set Up a database
```
cp .env.example .env
Create a database at your local db server then at the created .env file, add the following 
DB_DATABASE=<your_new_db>
```
## Run Configurations
```
php artisan:key generate
php artisan migrate
```
## npm Set Up
```
npm install
npm run dev
```
## The API Description
This project uses [Laravel Passport](https://laravel.com/docs/8.x/passport) for the API Authentication
