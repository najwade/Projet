<?php
include ("../BD/connection.php" ); 
$sql= "SELECT *  FROM `session_annee` ORDER BY id_session DESC" ; 
$result = mysqli_query($conn ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 