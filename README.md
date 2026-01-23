## License Tracker

A web application for managing product licenses within a company.

## Author: Aleksandra Reja

## Features

### User
- registration and login  
- view assigned licenses  
- view license status (active / expired)  
- information about expiration date  
- view of licenses expiring soon  

### Administrator
- admin panel  
- user management  
- product management  
- license management  
- assigning multiple users to one license  
- user limit per license  
- view assigned licenses  
- statistics:  
  - number of users  
  - active licenses  
  - cost of active licenses  
  - licenses expiring soon  

## Technologies
- server side: Laravel 10 (PHP)  
- database: MySQL, Eloquent ORM  
- client side: Laravel Blade, Vite, TailwindCSS  
- authentication: Laravel Breeze  

## Requirements
Versions of software used to build the application  
(the application has not been tested for compatibility with earlier versions):
- XAMPP (Apache Web Server, MySQL Database)  
- PHP 8.3.x  
- Composer 2.6.6  
- Laravel Framework 10.38.1  
- Node.js 21.5.0  
- npm  

## Installation
1. Copy the project folder `laravel-example` to `XAMPP\htdocs`.  
2. Open a terminal and navigate to the project directory.  
3. Install frontend dependencies: `npm install`  
4. Install PHP (backend) dependencies: `composer install`  
5. Enable in XAMPP: Apache Web Server and MySQL Database.  
6. Configure the `.env` file in the project directory, setting up the database connection (MySQL).  
7. Generate the application key: `php artisan key:generate`  
8. Run database migrations: `php artisan migrate`  
9. Seed the database with sample data: `php artisan db:seed`  
10. Run frontend compilation: `npm run dev`  
11. Start the Laravel server: `php artisan serve`  
12. Open the application in your browser at: `localhost:8000`  

## Test Accounts
- **Admin**  
  - Email: admin@company.com  
  - Password: Admin123  
- **Test User**  
  - Email: user@company.com  
  - Password: User123  
