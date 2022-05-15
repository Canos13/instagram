<?php

    namespace Cano\Instagram\controllers;
    use Cano\Instagram\lib\Controller;
    use Cano\Instagram\models\User;

    class Home extends Controller{
        public function __construct(private User $user){
            parent::__construct();
        }

        /**
         * The function `index()` is a public function that is called when the user visits the home
         * page. It renders the view `home/index` and passes the variable `` to the view.
         */
        public function index(){
            $this->render('home/index', ['user' => $this->user] );
        }

        public function store(){
            $title = $this->post('title');
            $image = $this->file('image');

            if(!is_null($title) && !is_null($image)){
                $filename= UtilImages::storeImage($image);
                $post = new PostImage($image, $filename);
                $this->user->publish($post);
            } else {
                header('Location: /instagram/home');
            }
        }
    }


?>