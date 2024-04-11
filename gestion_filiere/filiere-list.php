<?php
include ("../BD/connection.php" ); 
$sql= "SELECT *  FROM `filiere` ORDER BY id_filiere DESC" ;
$result = mysqli_query($conn ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 