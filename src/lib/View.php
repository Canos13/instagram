<?php

    /* A way to organize your code. */
    namespace Cano\Instagram\lib;

    class View{

        function render($name, $data = [] ){
            $this->d = $data;
            require 'src/views/'.$name.'.php';
        }


    }

?>