<?php
include ("../BD/connection.php" ); 
$id_prof =$_GET['id_prof' ];  
$sql= "DELETE FROM  `professeur` WHERE `id_prof`  =  $id_prof " ; 

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