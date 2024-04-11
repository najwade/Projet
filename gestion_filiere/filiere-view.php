<?php
include ("../BD/connection.php" ); 
$id= $_GET['id'];
$sql= "SELECT id_filiere , nom_filiere  FROM `filiere`  WHERE  `id_filiere` =   $id";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>