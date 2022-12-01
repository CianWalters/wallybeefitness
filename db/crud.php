<?php
    class crud{
        //private database object\
        private $db;

        //constructor to initialize private variable to the database connection 
        function __construct($conn){
            $this->db = $conn;
        }
        //function to insert a new record into the attendee database
        public function insertMembers($fname, $lname, $dob, $email, $contact, $gender,$avatar_path){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO member (firstname,lastname,dateofbirth,emailaddress,contactnumber,
                gender_id,avatar_path) VALUES (:fname,:lname,:dob,:email,:contact,:gender,:avatar_path)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placehoders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':gender',$gender);
                $stmt->bindparam(':avatar_path',$avatar_path);

                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
              echo $e->getMessage();
              return false;
            }
        } 

        public function editMember($id, $fname, $lname, $dob, $contact, $gender){
        try{
            $sql = "UPDATE `member` SET `firstname`=:fname,`lastname`=:lname,
            `dateofbirth`=:dob,`contactnumber`=:contact,`gender_id`=:gender WHERE member_id = :id ";
            // Removed from above-    `emailaddress`=:email,
            $stmt = $this->db->prepare($sql);
            //bind all placehoders to the actual values
            $stmt->bindparam(':id',$id);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':gender',$gender);
            //execute statement
            $stmt->execute();
            return true;

        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

            public function getMembers(){
                try{
                    $sql = "SELECT * FROM `member` a inner join genders s on a.gender_id = s.gender_id";
                    $result = $this->db->query($sql);
                    return $result;
                }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
           

            }

            public function getMemberDetails($id){
                try{
                    $sql = "select * from member a inner join genders s on a.gender_id = s.gender_id where member_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
                }
            }

            public function deleteMember($id){
                try{
                    $sql = "delete from member where member_id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    return true;
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
        

            }           

            public function getGenders(){
                try{
                $sql = "SELECT * FROM `genders`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

            public function getGenderById($id){
                try{
                $sql = "SELECT * FROM `genders` where gender_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
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