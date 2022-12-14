## How to Use

### Clone the repository

> git clone **https://github.com/Kirolos-Victor/lulubuy.git**

### Install Via Composer

> composer install

### Generate Application Key

> php artisan key:generate

### Run the database migrations (Set the database connection in .env before migrating)

> **php artisan migrate**
>

### Setup the laravel queue

> inside the .env file change QUEUE_CONNECTION=**database**
> run php artisan queue:work

### Task

> Go to **/ or /upload** upload the file of 1 million records and done :)
> You will find all the logic inside OrganisationController and the OrganisationCsvProcess.




