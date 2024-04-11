<?php
include("../BD/connection.php");


$nom_module = $_POST['nom_module'];
$id_filiere = $_POST['id_filiere'];


$sql = "INSERT INTO `Module` (`nom_module`, `id_filiere`) 
        VALUES ('$nom_module', '$id_filiere')";


if (mysqli_query($conn, $sql)) {
    $response = [
        'status' => 'ok',
        'success' => true,
        'message' => 'Module created successfully!'
    ];
    echo json_encode($response);
} else {
    $response = [
        'status' => 'ok',
        'success' => false,
        'message' => 'Failed to create module!'
    ];
    echo json_encode($response);
}
?>
