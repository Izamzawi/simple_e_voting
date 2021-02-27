<?php

// Connection
$db = pg_connect("host=localhost dbname=ecvotec user=postgres password=postgre");

// Query function
function query($query){
   global $db;
   $result = pg_query($db, $query);
   $rows = [];
   while( $row = pg_fetch_assoc($result)){
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

   $eduMail = pg_query($db, "SELECT collegeMail FROM voterdb WHERE collegeMail = '$collegeMail'");
   if(pg_fetch_assoc($eduMail)){
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
   pg_query($db, "INSERT INTO voterdb VALUES('', '$collegeMail', '$completeName', '$newPin', '') ");
   
   return pg_affected_rows($db);
}

function vote($data){
   global $db;

   $collegeMail = $data["collegeMail"];
   $vote = $data["candidate"];

   $query = "UPDATE voterdb SET vote = '$vote' WHERE collegeMail = '$collegeMail'";
   pg_query($db, $query);

   return pg_affected_rows($db);
}