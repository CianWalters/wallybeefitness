<?php 
    $title = 'Success';

require_once 'includes/header.php'; 
require_once 'db/conn.php';
require_once 'sendemail.php';


// var_dump($_POST);

if(isset($_POST['submit'])){
    //extract values from the $_POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $gender = $_POST['gender'];

    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$contact.$ext";
    move_uploaded_file($orig_file,$destination);

    //exit();  //This is used whenever you don't want it to access the database

    //Call Function to insert and track if success or not
    $isSuccess = $crud->insertMembers($fname, $lname, $dob, $email, $contact, $gender,$destination);
    $genderName = $crud->getGenderById($gender);

    if($isSuccess){
        SendEmail::SendMail($email, 'Welcome to IT Conference 2022', 'You have successfully registered for this years\' IT Conference');
        //echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
        include 'includes/successmessage.php';
    }
    else{
      //  echo '<h1 class="text-center text-danger">There was an error in processing!</h1>';
      include 'includes/errormessage.php';
    }
    }
?>

<!-- in line 45, 18rem changed to 25rem to accommodate the email address width -->
<img src="<?php echo $destination; ?>"class="rounded-circle" style="width: 20%; height: 20%"/>
<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title">

<?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
    <?php echo $genderName['name']; ?>
    </h6>
    <p class="card-text">
        Date of Birth: <?php echo $_POST['dob']; ?>
    </p>
    <p class="card-text">
        Email Address: <?php echo $_POST['email']; ?>
    </p>
    <p class="card-text">
        Contact Number: <?php echo $_POST['phone']; ?>
    </p>
    
  </div>
</div>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>