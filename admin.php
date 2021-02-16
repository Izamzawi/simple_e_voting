<?php 
// Load the One for All
require("functions.php");

// Retrieve vote column from voterdb table
$voters = query("SELECT vote FROM voterdb");

// Declare variables for counting the vote
$voted = 0;
$total = 0;
$leon = 0;
$kevin = 0;
$elmy = 0;
$empty = 0;
// Write the function to count the vote
foreach($voters as $voter){
   $total++;
   switch($voter["vote"]){
      case "leon":
         $leon++;
         $voted++;
         break;
      case "kevin":
         $kevin++;
         $voted++;
         break;
      case "elmy":
         $elmy++;
         $voted++;
         break;
      default:
         $empty++;
   }
}
var_dump($elmy);

// Write the desired page title inside quotation marks
$PageTitle = "e-Voting Statistics";
include_once("include/header.php");
include_once("include/navsimple.php");
?>

<!-- The page body can be written below -->
<div class="container">
   <h2 class="mb-4">e-Voting Statistics</h2>

   <div class="mb-4">
      <h5>Result</h5>
      <p>Leon Y Gie</p>
      <div class="progress">
         <div class="progress-bar bg-success" role="progressbar" style="width: <?= $leon/$voted*100; ?>%" aria-valuenow="<?= $leon; ?>" aria-valuemin="0" aria-valuemax="<?= $voted; ?>">
            <?= $leon; ?>
         </div>
      </div>
      <p>Kevin Palma</p>
      <div class="progress">
         <div class="progress-bar bg-info" role="progressbar" style="width: <?= $kevin/$voted*100; ?>%" aria-valuenow="<?= $kevin; ?>" aria-valuemin="0" aria-valuemax="<?= $voted; ?>">
            <?= $kevin; ?>
         </div>
      </div>
      <p>Elmy Anada</p>
      <div class="progress">
         <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $elmy/$voted*100; ?>%" aria-valuenow="<?= $elmy; ?>" aria-valuemin="0" aria-valuemax="<?= $voted; ?>">
            <?= $elmy; ?>
         </div>
      </div>
   </div>

   <div>
      <h5>Data</h5>
      <table class="table">
         <tbody>
            <tr>
               <td>Amount of voters</td>
               <td>:</td>
               <td><?= $total; ?></td>
            </tr>
            <tr>
               <td>Amount of votes</td>
               <td>:</td>
               <td><?= $voted; ?></td>
            </tr>
            <tr>
               <td>Not yet voted</td>
               <td>:</td>
               <td><?= $empty; ?></td>
            </tr>
         </tbody>
      </table>
   </div>

</div>


<!-- End of page -->

<?php 
include_once("include/footer.php")
?>
