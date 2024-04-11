<?php
 include ("../BD/connection.php" ); 
$nom_session =  $_POST['nom_session']; 
$annee_univ =  $_POST['annee_univ']; 
$sql=  "INSERT  INTO `session_annee`(`nom_session` , `annee_univ`)
 VALUE  (' {$nom_session} ' , ' {$annee_univ} ')" ; 

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