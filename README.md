# Lumen API JWT + Docker

This API run with docker. It creates 3 containers ( app, webserver and mysql).

Server running on the port 8015. 
DB running on the port 5002.
You can change the ports in the docker-composer file.

## Steps to follow

// Cloning repository
1- git clone https://github.com/marioGMIT/api.git

// Running the containers (DOCKER). Check DB configuration for production.
2- cd api && docker-compose up -d

// Having access to the app container
3- docker exec -it app bash

// Installing packages within the container
4- composer install

// Generating JWT within the container and creating tables
5- php artisan jwt:secret
6- php artisan migrate

// Want fake data for users? Run the next command
7- php artisan db:seed

## TEST API

In the repository is included a postman file. 

1- Open Postman and import the file

2- Run the request 'register'

If you get as a response the new user.. everything is working fine. In order to use the rest of the request you need to get the token previosly and set it in the authorization. 


## If you want to connect the API to an existing DB container replace in docker-compose file this:

// Remove
networks:
  app-network:
    driver: bridge

// Add
networks:
  default:
    external:
      name: name_of_your_current_db_container

## TODO

- enviroment postman
- get token automatically


## Notice

- Expires of JWT is too high. You can reduce it on App\Http\Controllers\Controllers.php


[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
