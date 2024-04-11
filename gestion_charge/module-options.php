<?php
include("../BD/connection.php");

$sql = "SELECT nom_module,id_module FROM `module` ORDER BY id_module DESC";
$result = mysqli_query($conn, $sql);

$data = [];
while ($fetch = mysqli_fetch_assoc($result)) {
    $data[] = $fetch;
}

print_r(json_encode($data));
?>
