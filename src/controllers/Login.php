<?php
    namespace Cano\Instagram\controllers;
    use Cano\Instagram\lib\Controller;
    use Cano\Instagram\models\User;

    class Login extends Controller{
        public function __construct(){
            parent::__construct();
        }

        public function auth(){
            $username = $this->post('username');
            $password = $this->post('password');

            /* Checking if the username and password are not null, if they are not null it checks if
            the user exists, if the user exists it checks if the password is correct, if the
            password is correct it sets the session and redirects to the home page, if the password
            is incorrect it redirects to the login page, if the user does not exist it redirects to
            the login page, if the username and password are null it redirects to the login page. */
            if(!is_null($username) && !is_null($password)){
                if(User::exists($username)){
                    $user = User::getUser($username);
                    if($user->comparePassword($password)){
                        $_SESSION['user'] = serialize($user);
                        header('location: /instagram/home');
                    } else {
                        header('location: /instagram/login');
                    }
                } else {
                    header('location: /instagram/login');
                }
            } else {
                header('location: /instagram/login');
            }
        }
    }
?>