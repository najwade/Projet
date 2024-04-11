<?php
include("../BD/connection.php");

$id_semestre = $_GET['id_semestre'];
$sql = "DELETE FROM `semestre` WHERE `id_semestre` = $id_semestre";

if (mysqli_query($conn, $sql)) {
    $response = [
        'status' => 'ok',
        'success' => true,
        'message' => 'Record deleted successfully!'
    ];
    print_r(json_encode($response));
} else {
    $response = [
        'status' => 'ok',
        'success' => false,
        'message' => 'Record deletion failed!'
    ];
    print_r(json_encode($response));
}
?>
