<?php
include("../BD/connection.php");

//$sql = "SELECT * FROM `module` ORDER BY id_module DESC";
$sql = "SELECT module.id_module, module.nom_module, filiere.nom_filiere
        FROM module
        INNER JOIN filiere ON module.id_filiere = filiere.id_filiere
        ORDER BY module.id_module DESC";
        
$result = mysqli_query($conn, $sql);

$data = [];
while ($fetch = mysqli_fetch_assoc($result)) {
    $data[] = $fetch;
}

print_r(json_encode($data));
?>
