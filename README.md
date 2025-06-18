This is a project i made to learn the basics of laravel.

First move to the projects directory propably laravel_transactions.
then run the following commands on powershell or bash

composer install

for bash cp .env.example .env for powershell copy .env.example .env

php artisan key:generate

php artisan migrate (if it asks you to create a file type yes its the file where laravel searches for sqlite databases it will just create it)

php artisan serve

paste the url in your browser and enjoy.
