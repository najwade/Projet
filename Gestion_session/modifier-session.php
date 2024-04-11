<?php
include ("../BD/connection.php" );
$nom_session =  $_POST['nom_session']; 
$annee_univ =  $_POST['annee_univ']; 
$id_session= $_POST['id_session'];
$sql= "UPDATE `session_annee`  SET  `nom_session` = '". $nom_session."'  ,`annee_univ` = '". $annee_univ."' 
WHERE `id_session` = $id_session " ;

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