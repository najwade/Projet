<?php
include ("../BD/connection.php" );
$nom_module= $_POST['nom_module'];
$id_filiere = $_POST['id_filiere'];
$id_module= $_POST['id_module'];

$sql = "UPDATE module
        SET nom_module = '$nom_module',
            id_filiere = $id_filiere
        WHERE id_module = $module_id";

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record updated succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record updated failed!'
    ];
    print_r(json_encode($response));
} 
?>