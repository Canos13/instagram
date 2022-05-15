<?php

    /* Importing the classes from the controllers folder. */
    use Cano\Instagram\controllers\Signup;
    use Cano\Instagram\controllers\Login;
    use Cano\Instagram\controllers\Home;
    /* use Cano\Instagram\lib\Controller; */

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
        $controller = new Login;
        $controller->render('login/index');
    });

    $router->post('/auth', function(){
        $controller = new Login;
        $controller->auth();
    });

    /* Creating a route for the signup page. */
    $router->get('/signup', function(){
        $controller = new Signup;
        $controller->render('signup/index');
    });

    $router->post('/register', function(){
        $controller = new Signup;
        $controller->register();
    });

    $router->get('/home', function(){
        $user = unserialize($_SESSION['user'] );
        $controller = new Home($user);
        $controller->index();
    });

    $router->post('/publish', function(){
        $user = unserialize($_SESSION['user'] );
        $controller = new Home($user);
        $controller->store();
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