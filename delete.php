<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
       // echo 'error';
       include 'includes/errormessage.php';
        //the below redirects to the viewrecords page if you have entered incorrect values in the URL.
       header("Location: viewrecords.php");
    }else{
        //Get ID values
        $id = $_GET['id'];

        //Call Delete function
        $result = $crud->deleteMember($id);
        //Redirect to list
        if($result)
        {
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }

?>