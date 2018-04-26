# laravel-task

Project Setup
==============

 - Install composer (if don't have): https://getcomposer.org/doc/00-intro.md

 - Create a MySQL database for the project.

 - Create/Update a file called .env:
```
	'DB_HOST' = 'HOST'
    'DB_DATABASE' = 'DATABASE',
    'DB_USERNAME' = 'USERNAME',
    'DB_PASSWORD' = 'PASSWORD',
```

 - From the project directory,
   1. `composer install`

      That will download dependencies.

   2. `php artisan migrate`

      That will apply database migrations

   3. `php artisan db:seed`

      That will add a user in database for testing purpose

   4. `php artisan serve`

      That will start the dev server (not for production)


User Credentials
=========================
	-Username : naeem.ednet@gmail.com
	-Password : laravel-test
	
  - For any query contact me naeem.ednet@gmail.com