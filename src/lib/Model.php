<?php 

    namespace Cano\Instagram\lib ;

    class Model{

        private Database $db;

        /**
         * The above function is a constructor function that creates a new instance of the Database
         * class
         */
        public function __construct(){
            $this->db = new Database();
        }

        public function query($query){
            return $this->db->connect()->query($query);
        }

        public function prepare($query){
            return $this->db->connect()->prepare($query);
        }
    }


?>