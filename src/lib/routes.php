<?php

    $router = new \Bramus\Router\Router();
    session_start();

    /* Loading the .env file. */
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../config/');
    $dotenv->load();

    /* Creating a route for the home page. */
    $router->get('/', function(){
        echo "Inicio";
    });

    /* Creating a route for the login page. */
    $router->get('/login', function(){
        echo "login Page";
    });

    $router->post('/auth', function(){
        echo "autenticando...";
    });

    $router->get('/signup', function(){
        echo "signup page";
    });

    $router->post('/register', function(){
        echo "new user";
    });

    $router->get('/home', function(){
        echo "home page";
    });

    $router->post('/publish', function(){
        echo "new publish";
    });

    $router->get('/profile', function(){
        echo "my profile";
    });

    $router->post('/addLike', function(){
        echo "addLike";
    });

    $router->get('/logout', function(){
        echo "logout";
    });

    $router->get('/profile/{username}', function($username){
        echo "hello $username";
    });

    $router->run();
?>