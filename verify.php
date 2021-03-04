<?php 
// Session initialization
session_start();

// Load the One for All
require("functions.php");

//login diklik
if( isset($_POST["verify"]) ){
   $collegeMail = $_POST["collegeMail"];
   $pinNumber = $_POST["pinNumber"];

   $result = pg_query($db, "SELECT * FROM voterdb WHERE college_mail = '$collegeMail'");

   // Check for registered college_mail
   if( pg_num_rows($result) === 1 ){

      // Check for pin_number
      $row = pg_fetch_assoc($result);
      if(password_verify($pinNumber, $row["pin_number"])){

         // Check if already voted
         if(empty($row["vote"])){
            // If not yet voted, set session and redirect to vote page
            $_SESSION["eduMail"] = $_POST["collegeMail"];
            header("Location: vote.php");
            exit;
         } else {
            // If already voted
            header("Location: hasVoted.php");
            var_dump($row["vote"]);
         }
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
