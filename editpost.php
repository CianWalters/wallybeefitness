<?php
require_once 'db/conn.php';

//Get values from post operation
if(isset($_POST['submit'])){
    //extract values from the $_POST array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
  //  $email = $_POST['email'];
    $contact = $_POST['phone'];
    $gender = $_POST['gender'];

//Call Crud Function
    $result = $crud->editMember($id, $fname, $lname, $dob, $contact, $gender);
    // Removed from above -  $email,

//Redirect to index.php
    if($result){
        header("Location: viewrecords.php");
    }
    else{
       // echo'error';
       include 'includes/errormessage.php';
    }
}
else{
    // echo 'error';
    include 'includes/errormessage.php';

    }


?>