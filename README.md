

## Stock Management System

This is a simple single database multi tenancy stock management system.

## How to install and use this project

 - Clone this project to your computer
 - Navigate to the created laravel project folder
 - Run composer install
 - Setup a new database and configure your db connection on .env file
 - Optional: Setup Redis and configure your .env file
 - Run php artisan migrate:fresh --seed
 - Optional: COngiure a local enviroment on your Postman App containing ip and token variables. Import the Postman Collection (postman/Turnover.postman_collection) to your Postman app.
 ![Image of Database Diagram](https://i.ibb.co/qBBF9G1/postman-local-enviroment.jpg)
 - Run php artisan serve
 - If you are not using Redis, run php artisan queue:work in a separate terminal


## Database Diagram

![Image of Database Diagram](https://i.ibb.co/25cym9V/db-diagram-stock-management.jpg)


