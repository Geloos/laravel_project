This is a project i made to learn the basics of laravel.

Before you start,make sure you have the following installed:

- PHP 8.1 or higher
- [Composer](https://getcomposer.org/)
- Git (to clone the repo)
- SQLite (included by default with PHP)

Follow this commands and you are ready

git clone https://github.com/yourusername/laravel_transactions.git

cd laravel_transactions

composer install (may take sometime)

bash: cp .env.example .env
powershell: copy .env.example .env

php artisan key:generate

php artisan migrate (if it asks you to create a file type yes its the file where laravel searches for sqlite databases it will just create it)

php artisan serve

paste the url in your browser and enjoy.
