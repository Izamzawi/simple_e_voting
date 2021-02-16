<?php
// Accept session
session_start();


if(!isset($_SESSION["eduMail"])){
   echo "<script>
      alert('You are not verified!');
      </script>";
   header("Location: verify.php");
   exit;
}

// Load the One for All
require("functions.php");

// Retrieve candidates' information
$candidates = query("SELECT * FROM candidates ORDER BY id");

// Retrieve data from session sent
$eduMail = $_SESSION["eduMail"];
// Query data from database by email
$voter = query("SELECT collegeMail FROM voterdb WHERE collegeMail = '$eduMail'")[0];


// Vote submission
if(isset($_POST["votesubmit"])){
   if(vote($_POST) >0 ){
      header("Location: hasVoted.php");
   } else{
      echo mysqli_error($db);
      header("Location: verify.php");
   }
}

// Write the desired page title inside quotation marks
$PageTitle = "Vote Now!";
include_once("include/header.php");
include_once("include/navsimple.php");
?>

<!-- The page body can be written below -->
<div class="container my-3">

   <!-- Candidates selection -->
   <div id="candidates" class="mb-4">
      <h3>Candidates</h3>
      <form action="" method="post">
         <input type="hidden" name="collegeMail" id="collegeMail" value="<?= $eduMail; ?>">
         <div class="row justify-content-center">

            <?php foreach($candidates as $candidate) : ?>
            <div class="col-3 mb-3">
               <div class="card" >
                  <img src="img/<?= $candidate["picture"] ?>.jpg" class="card-img-top" alt="<?= $candidate["picture"] ?>">
                  <div class="card-body">
                     <h5 class="card-title"><?= $candidate["name"]; ?></h5>
                     <input type="radio" class="btn-check" name="candidate" value="<?= $candidate["value"] ?>" id="<?= $candidate["value"] ?>" autocomplete="off">
                     <label class="btn btn-secondary candidate-label mx-auto" for="<?= $candidate["value"] ?>" style="display: block; width: 5rem;">VOTE</label>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>

         </div>

         <div class="d-grid gap-2 col-3 mx-auto my-5">
            <button class="btn btn-primary btn-lg" type="submit" name="votesubmit">Submit Your Vote</button>
         </div>

      </form>
   </div>

</div>
<!-- End of page -->

<?php 
include_once("include/footer.php")
?>
