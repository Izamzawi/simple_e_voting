<?php
// Load the One for All
require("functions.php");

// Registration
if(isset($_POST["register"])){
   if(register($_POST) >0 ){
      echo "<script>
         alert('Registration succeed.');
         </script>";
      header("Location: verify.php");
   } else{
      echo mysqli_error($db);
   }
}

$PageTitle = "Register Yourself";
include_once("include/header.php");
include_once("include/navsimple.php");
?>

<div class="container bg-light my-3 ">
   <h2>Register yourself as voter here.</h2>
   <form action="" method="post">
      <div class="mb-3">
         <label for="collegeMail" class="form-label">College email</label>
         <input type="email" class="form-control" name="collegeMail" id="collegeMail" aria-describedby="emailHelp" placeholder="yourname@edu.ac.id" required>
      </div>
      <div class="mb-3">
         <label for="completeName" class="form-label">Complete name</label>
         <input type="text" class="form-control" name="completeName" id="completeName" pattern="[A-Za-z ]+" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
         <label for="pinNumber" class="form-label">Six digits pin</label>
         <input type="password" class="form-control" name="pinNumber" id="pinNumber" pattern="[0-9]+" minLength=6 maxlength=6 required>
      </div>
      <div class="mb-3">
         <label for="pinNumber2" class="form-label">Rewrite pin</label>
         <input type="password" class="form-control" name="pinNumber2" id="pinNumber2" required>
      </div>
      <button type="submit" name="register" class="btn btn-primary">Register</button>
   </form>

   <p>If you're already registered, you can verify your credential <a href="verify.php">by clicking here.</a> </p>
</div>

<?php 
include_once("include/footer.php")
?>
