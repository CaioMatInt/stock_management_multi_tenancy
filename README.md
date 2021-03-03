

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

 
 ## How to test it without installing locally
 - Configure your enviroment on your Postman App containing the server ip (192.81.210.246) and token variables. Import the Postman Collection (postman/Turnover.postman_collection) to your Postman app.
 ![Image of Database Diagram](https://i.ibb.co/bX9Y19P/external-server-enviroment.jpg)

## Database Diagram

![Image of Database Diagram](https://i.ibb.co/25cym9V/db-diagram-stock-management.jpg)

## Usage

- To get access to products and product_quantity_history cruds, firstly login on route api/login with one of the below credentials:

rafael@turnoverbnb.com
password: turnoverbnb

stevejobs@apple.com
password: turnoverbnb

- Or register a new user on api/users/register sending a registered company id (1, 2 or 3) in the request body:
![Image of Database Diagram](https://i.ibb.co/7CpZGyV/register-user.jpg)

