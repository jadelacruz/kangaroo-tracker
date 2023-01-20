# Pet Tracker
- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
    - [Repository Cloning](#repository-cloning)
    - [Package Installation](#package-installation)
    - [Env Setup](#env-setup)
    - [Database Setup](#database-setup)
        - [Laravel Migration](#laravel-migration)
        - [SQL Dump](#sql-dump)
- [Authors](#authors)

## Introduction
This project is a tracker for kangaroos which has CRUD functionality to in better management and tracking of the kangaroos.
 
## Prerequisites
- __PHP 8.1+__
- __MariaDB / MySQL__
- __Composer__ (Tested on version __2.3.9__)
- __Node Package Manager (NPM)__ (Tested on version __7.21.1__)

## Installation
### Repository Cloning
Cloning and changing directory to the project directory
```
git clone https://github.com/jadelacruz/kangaroo-tracker.git
cd kangaroo-tracker
```
### Package Installation
Install PHP Packages using composer
```bash
composer install
```
Next step is to install Node packages using NPM and build the JS resources
```bash
npm update
npm run build
```
### Env Setup
After setting up the installation of project packages,  we will have to update the __ENV file__ of the project. In the project repository, there is a file named __.env.example__ you can modify that file and specify the value needed for the follow fields:

```bash
...
DB_HOST={hostname}           # default 127.0.0.1 or localhost
DB_PORT={port}               # default 3306
DB_DATABASE={database_name}  # DB name (sample: vokke_pet_tracker)
DB_USERNAME={user_name}      # default root
DB_PASSWORD={password}
```
After modification of __.env.example__, we need to rename it to __.env__ for it to be detected by the application
### Database Setup
After __ENV file__ setup, next thing to do is to create database for the project, __vokke_pet_tracker__ will be our sample database name, but make sure that you will be using the one that you will put in the __ENV file__

```sql
CREATE DATABASE vokke_pet_tracker;
```
_Note: You can you any database name you prefer._

After having creation of database, we will then have to import the project's table to the databases. We have two different ways of doing it. We can do it by [__Laravel Migration__](https://laravel.com/docs/9.x/migrations) or we can just dump the provided __SQL dump file__

#### Laravel Migration
To do Laravel migration, you need to execute an [__artisan__](https://laravel.com/docs/9.x/artisan) command
```bash
php artisan migrate:fresh
```
This command will create the table/s needed by the project

#### SQL Dump
_Note: Skip this if you chose the Laravel Migration instead of MySQL import thru dump._

Check if __/dump.sql__ exists in the root directory of the project, this will be the dump file for the database table. To dump it to MySQL execute this command:
```bash
mysql -u root -p vokke_pet_tracker < {path_to}/dump.sql
```
Wherein __root__ is our user and __vokke_pet_tracker__ is the database name in MySQL.

## Running the project
Now all the preparation has been made, all that is left was to host or run the project. You can do it by serving it using [__artisan__](https://laravel.com/docs/9.x/artisan) command, go to the project path and execute the command below:
```bash
php artisan serve
```
By default, the project will run at __http://127.0.0.1:8000__, please be sure that port __8000__ is available to avoid any issues.

 
## Author(s)
- Jhon Aldrin Dela Cruz (jhon.aldrin.delacruz@gmail.com)
