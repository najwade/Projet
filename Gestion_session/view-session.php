<?php
include ("../BD/connection.php" ); 
$id_session= $_GET['id_session'];
$sql= "SELECT *  FROM `session_annee`  WHERE  `id_session` =   $id_session";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>