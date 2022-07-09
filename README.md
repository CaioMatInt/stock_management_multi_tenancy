

## Stock Management System

This is a simple single database multi tenancy stock management system.

## How to install and use this project locally

 - Clone this project to your computer
 - Navigate to the created laravel project folder
 - Run composer install
 - Setup a new database and configure your db connection on .env file
 - Change your QUEUE_CONNECTION=sync on .env file to QUEUE_CONNECTION=database
 - Optional: Setup Redis and configure your .env file
 - Run php artisan migrate:fresh --seed
 - Run php artisan serve
 - If you are not using Redis, run php artisan queue:work in a separate terminal
 - Optional: Configure a local enviroment on your Postman App containing ip and token variables. Import the Postman Collection (postman/stock_management.postman_collection) to your Postman app.
 ![Image of postman](https://i.ibb.co/qBBF9G1/postman-local-enviroment.jpg)

## Database Diagram

![image](https://user-images.githubusercontent.com/40992883/178123071-9a64a796-4ffc-4aab-b2b4-03a31c32e84c.png)


## System Architecture

![Image of System Architecture](https://i.ibb.co/XsBdk3R/system-architecture.jpg)

## Usage

- To get access to products and product_quantity_history cruds, firstly login on route api/login with one of the below credentials:

bill@microsoft.com
password: 123456

stevejobs@apple.com
password: 123456

- Or register a new user on api/users/register sending a registered company id (1 or 2 for example) on request body:
![Image of Database Diagram](https://i.ibb.co/7CpZGyV/register-user.jpg)

## Tests

This project is using PEST. To run tests, run on your terminal from the project's root folder: ./vendor/bin/pest
 
 ## Todo

- Adapt the code to PSR-12
- Finish tests
- TBD 

