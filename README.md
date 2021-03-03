

## Stock Management System

This is a simple single database multi tenancy stock management system.

## How to install and use this project locally

 - Clone this project to your computer
 - Navigate to the created laravel project folder
 - Run composer install
 - Setup a new database and configure your db connection on .env file
 - Optional: Setup Redis and configure your .env file
 - Run php artisan migrate:fresh --seed
 - Run php artisan serve
 - If you are not using Redis, run php artisan queue:work in a separate terminal
 - Optional: Configure a local enviroment on your Postman App containing ip and token variables. Import the Postman Collection (postman/Turnover.postman_collection) to your Postman app.
 ![Image of Database Diagram](https://i.ibb.co/qBBF9G1/postman-local-enviroment.jpg)

## Database Diagram

![Image of Database Diagram](https://i.ibb.co/25cym9V/db-diagram-stock-management.jpg)

## Usage

- To access products and product_quantity_history cruds, firstly login on route api/login with one of the below credentials or register on api/users/register:

rafael@turnoverbnb.com
password: turnoverbnb

stevejobs@apple.com
password: turnoverbnb



