This is a project i made to learn the basics of laravel.

To successfully run this project in your pc you need to run the following commands

git clone https://github.com/yourusername/laravel_transactions.git

cd laravel_transactions

composer install (may take sometime just chill)

bash: cp .env.example .env
powershell: copy .env.example .env

php artisan key:generate

php artisan migrate (if it asks you to create a file type yes its the file where laravel searches for sqlite databases it will just create it)

php artisan serve

paste the url in your browser and enjoy.
