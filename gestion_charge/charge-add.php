<?php
 include ("../BD/connection.php" ); 
    $id_prof =  $_POST['id_prof']; 
    $id_module =  $_POST['id_module']; 
    $type_charge =  $_POST['type_charge']; 
    $nbr_groups =  $_POST['nbrgroups']; 
    $volume_h =  $_POST['volume_h']; 
    $duree =  $_POST['duree']; 
    $facteur =  $_POST['facteur']; 

    $sql = "INSERT INTO `charge` (`id_module`, `type_charge`, `nbrgroups`, `volume_h`, `duree`, `facteur`, `id_prof`)   VALUES ('$id_module', '$type_charge', '$nbr_groups', '$volume_h', '$duree', '$facteur', '$id_prof')";


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