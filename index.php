<?php
// Load the One for All
require("functions.php");

// Retrieve candidates' information
$candidates = query("SELECT * FROM candidates ORDER BY id");

include_once("include/header.php");
?>

<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
      <a class="navbar-brand" href="index.php">eVotec</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="navbar-nav">
            <a class="nav-item nav-link" href="#">About</a>
            <a class="nav-item nav-link float-left" href="admin.php">Admin</a>
         </div>
      </div>
   </div>
</nav>

<!-- Container for main page content -->
<div class="container">

   <div id="main-banner" class="mt-3 mb-5 bg-light">
      <div class="p-4">
         <h1 class="display-4">Senate Election Today</h1>
         <p class="lead">Cast your vote today for the Senate Election 2021. Your vote is important. Choose your future college life!</p>
         <p>Click the button below to view our candidate's profile and major programs.</p>
         <p class="lead">
            <a class="btn btn-info btn-lg" href="#candidates" role="button">View Profile</a>
         </p>
         <hr class="my-4">
         <p>If you already know who's your chosen one is, click the button below to cast your vote.</p>
         <p class="lead">
            <a class="btn btn-primary btn-lg" href="verify.php" role="button">VOTE NOW</a>
         </p>
         <hr class="my-4">
         <p>If you're not yet registered, you can register your credential <a href="registration.php">by clicking here.</a></p>
      </div>
   </div>

   <!-- Container for candidates' profile -->
   <div id="candidates" class="mb-4">
      <h3>Candidates' Profile</h3>
      <div class="row justify-content-center">

         <!-- Define a variable called "i" for looping through candidate ID -->
         <?php $i=1; ?>
         <!-- Retrieving data from candidates' table, increased the value of "i" per candidate -->
         <?php foreach($candidates as $candidate) : ?>
         <!-- Retrieving data from programs and achievements tables, filtered by candidate ID -->
         <?php $programs = query("SELECT * FROM programs WHERE candidate_id = '$i'"); ?>
         <?php $achievements = query("SELECT * FROM achievements WHERE candidate_id = '$i'"); ?>

         <div class="col-3 mb-3">
            <div class="card" >
               <img src="img/<?= $candidate["picture"] ?>.jpg" class="card-img-top" alt="<?= $candidate["picture"] ?>">
               <div class="card-body">
                  <h5 class="card-title"><?= $candidate["name"]; ?></h5>
                  <p class="card-text"><?= $candidate["description"]; ?></p>

                  <div class="card-header">Programs</div>
                  <ul class="list-group list-group-flush mb-3">
                     
                     <?php foreach($programs as $program) : ?>
                     <li class="list-group-item"><?= $program["program"] ?></li>
                     <?php endforeach; ?>
                  </ul>
                  <div class="card-header">Achievements</div>
                  <ul class="list-group list-group-flush mb-3">
                     
                     <?php foreach($achievements as $achievement) : ?>
                     <li class="list-group-item"><?= $achievement["achievement"] ?></li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            </div>
         </div>

         <!-- Increasing the value of "i" per candidate -->
         <?php $i++; ?>
         <?php endforeach; ?>

      </div>
   </div>

</div>

<?php 
include_once("include/footer.php")
?>
