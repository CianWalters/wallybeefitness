<?php
require_once 'db/conn.php';

//Get values from post operation
if(isset($_GET['submit'])){
    //extract values from the $_POST array
    $id = $_GET['id'];
    $fname = $_GET['firstname'];
    $lname = $_GET['lastname'];
    $dob = $_GET['dob'];
    $email = $_GET['email'];
    $contact = $_GET['phone'];
    $specialty = $_GET['expertise'];

//Call Crud Function
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);

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