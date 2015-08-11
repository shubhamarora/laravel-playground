## How to execute
1. Clone this repo on your local machine
2. Import database file - `mj_rel_builder.sql`
3. Naviagte to project direcory (where you have cloned this repo)
4. Set the following db details in .env file
```php
DB_HOST=localhost
DB_DATABASE=mj_rel_builder
DB_USERNAME=root
DB_PASSWORD=
```


5. Install dependencies using below command.
`composer install`

6. Generate App Key using below command.
`php artisan key:generate`

7. Start Laravel Development server usin below command.
`php artisan serve'
