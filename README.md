## Movie Ticket Booking
The app is simple laravel api uses some of its features like model, controller, service layer, validation by form requests, database seeding and Laravel Passport. You can create cinema, assing movies to it and buy tickets to movies.

### Installation
Clone the project

Copy .env.example and rename it as .env
and setup your db credentials as you wish


Go to directory of project

Run
```
$ composer install
```
to install dependencies

Run
```
$ php artisan key:generate
```

You should run
```
$ php artisan migrate
```
to create database table

You should run
```
$ php artisan passport:install
```
to create passport clients, at the bottom of your .env file, fill the fields with your newly created personal access client credentials like:

```
PASSPORT_PERSONAL_ACCESS_CLIENT_ID=6
PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET=JqRmyrg9xIIBmAVC2KiwY6KUZhmSDuEOeCQl2OJy
```

```
$ php artisan db:seed
```
to seed the database with related entries.(cities)

### To Run The App


```
$ php artisan serve
```

### Endpoints

postman collection is available at the root directory of the project as 
"movie.postman_collection.json"

or check api.php

### Usage

Register and Login to get an access token and use it on other endpoints' authorization tab -> Bearer token to authorize yourself. Then you can create cinema, movie, buy ticket etc.

