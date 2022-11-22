<?php

    class user{
        //private database object\
        private $db;

        //constructor to initialize private variable to the database connection 
        function __construct($conn){
            $this->db = $conn;
        }

        public function insertUser($username,$password){
            try {
                //the line below checks the database if the username already exist. 
                $result = $this->getUserbyUsername($username);
                if($result['num'] > 0){
                    return false;
                } else{
                    //Username is appended to the password. Makes the Password haarder to figure out
                    //md5()- most popular php encription (password hash)
                    $new_password = md5($password.$username);
                    //define sql statement to be executed
                    $sql = "INSERT INTO users (username,password) VALUES (:username,:password)";
                    //prepare the sql statement for execution
                    $stmt = $this->db->prepare($sql);
                    //bind all placehoders to the actual values
                    $stmt->bindparam(':username',$username);
                    //$new_password will be stored in the database.
                    $stmt->bindparam(':password',$new_password);

                    //execute statement
                    $stmt->execute();
                    return true;

                }
                

            } catch (PDOException $e) {
              echo $e->getMessage();
              return false;
            }
        }

        public function getUser($username,$password){
            try{
                $sql = "select * from users where username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }
// The perpose of the below function is to ensure you do not enter more than one user with the same username
        public function getUserbyUsername($username){
            try{
                $sql = "select count(*) as num from users where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>