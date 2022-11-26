# Installations

composer install
    
cp .env.example .env
nano .env

set database name, username and password

php artisan key:generate

php artisan migrate --seed

// if you have already migrated and want to migrate again

php artisan migrate:fresh --seed

php artisan serve
