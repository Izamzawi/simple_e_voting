<?php
// Remove session from verify.php
session_start();

$_SESSION = [];
session_unset();
session_destroy();

// Then automatically redirect to home page after 5 seconds
header("Refresh:5; url=index.php");

// Write the desired page title inside quotation marks
$PageTitle = "Thanks for your vote!";
include_once("include/header.php");
include_once("include/navsimple.php");
?>

<!-- The page body can be written below -->
<p>Congratulations! You have cast your vote.</p>
<p>You'll be redirected to home page soon.</p>
<!-- End of page -->

<?php 
include_once("include/footer.php")
?>
