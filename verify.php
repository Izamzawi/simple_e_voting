<?php 
// Session initialization
session_start();

// Load the One for All
require("functions.php");

//login diklik
if( isset($_POST["verify"]) ){
   $collegeMail = $_POST["collegeMail"];
   $pinNumber = $_POST["pinNumber"];

   $result = mysqli_query($db, "SELECT * FROM voterdb WHERE collegeMail = '$collegeMail'");

   //cek username
   if( mysqli_num_rows($result) === 1 ){
      //cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($pinNumber, $row["pinNumber"])){
         // Set session
         $_SESSION["eduMail"] = $_POST["collegeMail"];
         header("Location: vote.php");
         exit;
      }
   }

   $error = true;
}

$PageTitle = "Verify Your Eligibility";
include_once("include/header.php");
include_once("include/navsimple.php");
?>

<div class="container bg-light my-3">
   <h2>Please verify your eligibility to vote below.</h2>
   <p>Remember your college account and your 6 digits pin.</p>

   <?php if(isset($error)) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Wrong credentials!</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   <?php endif; ?>

   <form actions="" method="post">
      <div class="mb-3">
         <label for="collegeMail" class="form-label">College email</label>
         <input type="email" class="form-control" name="collegeMail" id="collegeMail" aria-describedby="emailHelp" placeholder="yourname@edu.ac.id">
      </div>
      <div class="mb-3">
         <label for="pinNumber" class="form-label">Six digits pin</label>
         <input type="password" class="form-control" name="pinNumber" id="pinNumber">
      </div>
      <button type="submit" name="verify" class="btn btn-primary">Verify</button>
   </form>

   <p>If you're not yet registered, you can register your credential <a href="registration.php">by clicking here.</a> </p>
</div>

<?php 
include_once("include/footer.php")
?>
