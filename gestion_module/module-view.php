<?php
include ("../BD/connection.php" ); 
$id_module= $_GET['id'];
$sql = "SELECT module.id_module, module.nom_module, filiere.nom_filiere
        FROM module
        INNER JOIN filiere ON module.id_filiere = filiere.id_filiere
        WHERE module.id_module = $id_module
        ORDER BY module.id_module DESC";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>