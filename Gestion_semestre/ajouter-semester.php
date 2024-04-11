<?php
 include ("../BD/connection.php" ); 
$nom_semestre =  $_POST['nom_semestre']; 
$nom_filiere =  $_POST['nom_filiere']; 
$nom_session =  $_POST['nom_session' ]; 
$sql = "INSERT INTO semestre (id_session, id_filiere, nom_semestre) 
        VALUES ('$nom_session', '$nom_filiere', '$nom_semestre')";

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