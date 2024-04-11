<?php 
  $server_name= "localhost";
  $user_name= "root";
  $password= "";
  $database_name= "db_charge";
 

  if (isset($_POST))

    $conn = new mysqli($server_name,$user_name,$password, $database_name);
if ($conn) {
    // echo 'Server Connected Success';
} else {
    die(mysqli_error($conn));
}

?>