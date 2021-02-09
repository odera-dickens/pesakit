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
## API Authentication Support
This project uses [Laravel Passport](https://laravel.com/docs/8.x/passport) for the API Authentication
### Passport Accest Tokens
To create client access tokens for accessing the api endpoints when testing, run the following command
```
php artisan passport:install
```
# API Endpoints
### User Registration
```
METHOD: POST
Endpoint: /api/v1/user/register
Params: 
1. name (required)
2. email (required)
3. phone (required)
4. password (required)
5. password_confirmation (required)
```
### User Login
```
METHOD : POST
Endpoint: /api/v1/user/login
Params:  
1. email (required)
2. password (required)
```
### User Logout
```
METHOD : POST
Endpoint: /api/v1/user/logout
Params:  
1. Bearer-Token
```
### User Profile Details
```
METHOD : POST
Endpoint: /api/v1/user/profile
Params:  
1. Bearer-Token
```
## ADMIN Endpoints (Web)
```
/login
/admin/dashboard
/admin/users
/admin/users/{user}/profile
```