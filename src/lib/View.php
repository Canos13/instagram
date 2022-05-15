<?php

    /* A way to organize your code. */
    namespace Cano\Instagram\lib;

    class View{
        /**
         * It takes a view name and an array of data, and then requires the view file.
         * param name The name of the view file to be rendered.
         * param data The data that you want to pass to the view.
         */
        function render($name, $data = [] ){
            $this->d = $data;
            require 'src/views/' .$name. '.php';
        }
    }

?>