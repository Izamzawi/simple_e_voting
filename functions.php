<?php

// Connection
$db = pg_connect("host=ec2-54-87-34-201.compute-1.amazonaws.com 
                  dbname=d8ps3q8u9o4un 
                  user=nmfqhwbqtjlaep 
                  password=54fd8cfd7413bda31b8dd6a045e37fc280b5d891f0d21dda1385a8943e7bb31d");

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

   // PIN encription
   $newPin = password_hash($pinNumber, PASSWORD_DEFAULT);

   // Register new voter and check for college_mail duplicate
   $result = pg_query($db, "INSERT INTO voterdb (college_mail, complete_name, pin_number) VALUES('$collegeMail', '$completeName', '$newPin') ON CONFLICT (college_mail) DO NOTHING");
   
   return pg_affected_rows($result);
}

function vote($data){
   global $db;

   $collegeMail = $data["collegeMail"];
   $vote = $data["candidate"];

   $query = "UPDATE voterdb SET vote = '$vote' WHERE college_mail = '$collegeMail'";
   $result = pg_query($db, $query);

   return pg_affected_rows($result);
}
