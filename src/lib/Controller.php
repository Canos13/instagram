<?php 

    namespace Cano\Instagram\lib;
    use Cano\Instagram\lib\View;

    /* The Controller class is a parent class for all controllers. It has a render method that renders
    a view. */
    class Controller{
        
        private View $view;

        public function __construct(){
            $this->view = new View();
        }

        public function render($name, $data = [] ){
            $this->view->render($name, $data);
        }

        public function get($param){
            if(!isset($_GET[$param])){
                return NULL;
            }
            return $_GET[$param];
        }

        public function file($param){
            if(!isset($_FILES[$param])){
                return NULL;
            }
            return $_FILES[$param];
        }

    }

?>