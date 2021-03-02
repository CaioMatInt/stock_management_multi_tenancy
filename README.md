

## Stock Management System

This is a simple stock management system.

## How to install and use this project

 - Clone the project to your computer.
 - Run composer Install on the root folder
 - Navigate to the created laravel project folder
 - Run composer install
 - Setup a new database and configure your db connection on .env file
 - Optional: Setup Redis and configure your .env file
 - Run php artisan migrate:fresh --seed
 - Optional: Import the Postman Collection (postman/Turnover.postman_collection) to your Postman app.
 - Run php artisan serve
 - If you are not using Redis, run php artisan queue:work in a separate terminal


## Database Diagram

![Image of Database Diagram](https://i.ibb.co/25cym9V/db-diagram-stock-management.jpg)

