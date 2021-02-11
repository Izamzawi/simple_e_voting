<?php

// Connection
$db = mysqli_connect("localhost", "root", "", "evotec");

// Query function
function query($query){
   global $db;
   $result = mysqli_query($db, $query);
   $rows = [];
   while( $row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }
   return $rows;
}

// Registration functions
function register($data){
   global $db;

   $collegeMail = $data["collegeMail"];
   $completeName = stripslashes($data["completeName"]);
   $pinNumber = $data["pinNumber"];
   $pinNumber2 = $data["pinNumber2"];


   // College email checking
   // Checks for a correct edu mail
   // if( preg_match('/(@edu.ac.id)$/i', @collegeMail)){}

   $eduMail = mysqli_query($db, "SELECT collegeMail FROM voterdb WHERE collegeMail = '$collegeMail'");
   if(mysqli_fetch_assoc($eduMail)){
      echo "<script>
         alert('Email already registered');
         </script>";
      return false;
   }

   // PIN confirmation, number only
   if( is_numeric($pinNumber) ){
      if ( $pinNumber !== $pinNumber2){
         echo "<script>
         alert('PIN numbers don't match')
         </script>";
      return false;
      } 
   } else{
      echo "<script>
      alert('PIN can only contains numbers')
      </script>";    
   }

   // PIN ecnription
   $newPin = password_hash($pinNumber, PASSWORD_DEFAULT);

   //register new voter
   mysqli_query($db, "INSERT INTO voterdb VALUES('', '$collegeMail', '$completeName', '$newPin', '') ");
   
   return mysqli_affected_rows($db);
}

function vote($data){
   global $db;

   $collegeMail = $data["collegeMail"];
   $vote = $data["candidate"];

   $query = "UPDATE voterdb SET vote = '$vote' WHERE collegeMail = '$collegeMail'";
   mysqli_query($db, $query);

   return mysqli_affected_rows($db);
}