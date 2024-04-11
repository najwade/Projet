<?php
include ("../BD/connection.php" );

$nom= $_POST['nom_filiere'];
$id= $_POST['id_filiere'];

$sql = "UPDATE Filiere
        SET nom_Filiere = '$nom'
        WHERE id_filiere = '$id'";



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