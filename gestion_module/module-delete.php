<?php
include ("../BD/connection.php" ); 
$id_module =$_GET['id_module'];  
$sql= "DELETE FROM  `Module` WHERE `id_module`  =  $id_module " ; 

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