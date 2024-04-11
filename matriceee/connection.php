<?php 
  $server_name= "localhost";
  $user_name= "root";
  $password= "";
  $database_name= "db_charge";
  $conn= mysqli_connect($server_name , $user_name , $password , $database_name); 
  if ($conn) { 
   //echo "connected" ; 
  }else{
      echo "not connected" ; 
  }
?>