<?php
include ("../BD/connection.php" ); 
$id_prof= $_GET['id_prof' ];
$sql= "SELECT *  FROM `professeur`  WHERE  `id_prof` =   $id_prof";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>