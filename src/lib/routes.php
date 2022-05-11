<?php

    $router = new \Bramus\Router\Router();
    session_start();

    $router->get('/', function(){
        echo "Inicio";
    });

    $router->get('/login', function(){
        echo "login Page";
    });

    $router->get('/auth', function(){
        echo "autenticando...";
    });

    $router->get('/signup', function(){
        echo "signup page";
    });

    $router->get('/register', function(){
        echo "new user";
    });

    $router->get('/home', function(){
        echo "home page";
    });

    $router->get('/publish', function(){
        echo "new publish";
    });

    $router->get('/profile', function(){
        echo "my profile";
    });

    $router->get('/addLike', function(){
        echo "addLike";
    });

    $router->get('/logout', function(){
        echo "logout";
    });

    $router->get('/profile/{username}', function(){
        echo "other profile";
    });

    $router->run();
?>