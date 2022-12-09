

<?php 
    $title = 'Index';

require_once 'includes/header.php'; 
require_once 'db/conn.php';

$results = $crud->getGenders();

?>

<!-- 
    First Name
    Last Name
    Date of Birth (Using date picker)
    Gender (male, female)
    Email Address
    Contact Number
 -->

    <h1 class="text-center" style="font-family:algerian"><em>Wally Bee Fitness Registration</em></h1>
<form method="post" action="success.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input required type="text" class="form-control" id="firstname" name="firstname">
  </div>  

  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input required type="text" class="form-control" id="lastname" name="lastname">
  </div>  

  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" id="dob" name="dob">
  </div>

<!-- The below taken from bootstrap 4.6 -->
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender">
  
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php echo $r['gender_id']?>"><?php echo $r['name']; ?></option>
        <?php }?>

    </select>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="phone" name="phone"aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
  </div>
  <br/>
  <div class="custom file">
    <label for="avatar" class="form-label">Upload Image(Optional)</label>
    <input type="file" accept="image/*"class="custom-file-input" id="avatar" name="avatar">
    <label class="custom-file-label"></label>
  </div>
  

<!-- In Bootstrap 5.2 - w-100 is used to stretch button across the page. -->
  <button type="submit" name="submit" class="btn btn-warning w-100">Submit</button>
</form>

<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>
