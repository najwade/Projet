<?php
 include ("../BD/connection.php" ); 
$nom_filiere =  $_POST['nom_filiere']; 

$sql = "INSERT INTO `Filiere` (`nom_filiere`) 
        VALUES ('$nom_filiere')";

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record created succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record created failed!'
    ];
    print_r(json_encode($response));
} 
?> 