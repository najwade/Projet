<?php
include ("../BD/connection.php" ); 
$id_session =$_GET['id_session'];  
$sql= "DELETE FROM  `session_annee` WHERE `id_session`  =  $id_session " ; 

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record deleted succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record deleted failed!'
    ];
    print_r(json_encode($response));
} 
?> 