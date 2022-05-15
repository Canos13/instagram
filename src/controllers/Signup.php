<?php

    namespace Cano\Instagram\controllers;
    use Cano\Instagram\lib\Controller;
    use Cano\Instagram\lib\UtilImages;
    use Cano\Instagram\models\User;

    class Signup extends Controller{
        public function __construct(){
            parent::__construct();
        }

        /**
         * It takes the username, password and profile picture from the form, stores the picture in the
         * server and then saves the user in the database.
         */
        public function register(){
            $username = $this->post('username');
            $password = $this->post('password');
            $profile = $this->file('profile');

            if(
                !is_null($username) &&
                !is_null($password) &&
                !is_null($profile)
            ){
                $pictureName = UtilImages::storeImage($profile);
                $user = new User($username,$password);
                $user->setProfile($pictureName);
                $user->save();
                header('Location: /instagram/login');
            } else {
                $this->render('errors/index');
            }
        }

    }


?>