<?php

    namespace Cano\Instagram\models;
    use Cano\Instagram\lib\Database;
    use Cano\Instagram\lib\Model;
    use PDOException;
    use PDO;

    class User extends Model{
        private $id;
        private $posts;
        private $profile;

        public function __construct(private $username, private $password){
            parent::__construct();
            $this->posts = [];
            $this->profile = " ";
        }

        /**
         * It takes the password, hashes it, and then inserts it into the database
         * return The return value is a boolean value.
         */
        public function save(){
            try{
                $hash = $this->getHashedPassword($this->password);
                $query = $this->prepare('INSERT INTO users(username, password, profile) VALUES (:username, :password, :profile)');
                $query->execute([
                    'username' => $this->username,
                    'password' => $hash,
                    'profile'  => $this->profile,
                ]);
                return true;
            } catch(PDOException $e){
                error_log($e->getMessage());
                return false;
            }
        }

        /**
         * It checks if the username exists in the database
         * param username The username of the user you want to check if exists.
         * return a boolean value.
         */
        public static function exists($username){
            try{
                $db = new Database();
                $query = $db->connect()->prepare('SELECT username FROM users WHERE username = :username');
                $query->execute(['username' => $username]);
                if($query->rowCount() > 0){
                    return true;
                } else {
                    return false;
                }
            }catch(PDOException $e){
                error_log($e->getMessage());
                return false;
            }
        }

        /**
         * It gets the user from the database and returns it as an object
         * param username the username of the user you want to get
         * return An object of the User class.
         */
        public static function getUser($username){
            try{
                $db = new Database();
                $query = $db->connect()->prepare('SELECT * FROM users WHERE username = :username');
                $query->execute(['username' => $username]);
                
                $data = $query->fetch(PDO::FETCH_ASSOC);

                $user = new User($data['username'], $data['password']);
                $user->setId($data['user_id']);
                $user->setProfile($data['profile']);

                return $user;

            }catch(PDOException $e){
                error_log($e->getMessage());
                return NULL;
            }
        }

        /**
         * It takes a password and compares it to the password stored in the database 
         * password The password to be hashed.
         * return The password_verify() function is used to verify that a password matches a hash.
         */
        public function comparePassword($password){
            return password_verify($password, $this->password);
        }

        public function getHashedPassword($password){
            return password_hash($password, PASSWORD_DEFAULT, ['cost'=>5]);
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id= $id;
        }

        public function getPosts(){
            return $this->posts;
        }

        public function setPosts($posts){
            $this->posts= $posts;
        }

        public function getProfile(){
            return $this->profile;
        }

        public function setProfile($profile){
            $this->profile= $profile;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setUsername($username){
            $this->username= $username;
        }

    }

?>