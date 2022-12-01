<?php
//This includes the session file. This file contains code that starts/resumes a session. 
//By having it in the header file, It will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php'; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">

    <!-- Below is the bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!-- below is the stylesheet from jquery for date -->
    <link rel="stylesheet" href="css/site.css" />

    <title>Wally Bee Fitness - <?php echo $title ?></title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <a class="navbar-brand" href="index.php">WALLY BEE FITNESS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
      <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only"></span></a>
      <a class="nav-item nav-link active" href="viewrecords.php">View Members</a>
      <a class="nav-item nav-link active" href="training.php">Training</a>
      <a class="nav-item nav-link active" href="openinghours.php">Opening Hours</a>
      <a class="nav-item nav-link active" href="contacts.php">Contacts</a>
      <a class="nav-item nav-link active" href="aboutus.php">About Us</a>

    </div>
    <!-- ms-auto is used to margin right -->
    <div class="navbar-nav ms-auto">
      <?php
          if(!isset($_SESSION['id'])){
      ?>
        <a class="nav-item nav-link" href="login.php">Login <span class="sr-only"></span></a>
      <?php }else { ?>
        <a class="nav-link nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>! </span> <span class="sr-only"></span></a>
        <a class="nav-link nav-link" href="logout.php">Logout <span class="sr-only"></span></a>

        <?php } ?>
    </div>
  </div>
</nav>
  <div class="container">
  
<br/>
  