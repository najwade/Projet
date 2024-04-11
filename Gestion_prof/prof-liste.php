<?php
include ("../BD/connection.php" ); 
$sql= "SELECT *  FROM `professeur` ORDER BY id_prof DESC" ; 
$result = mysqli_query($conn ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 