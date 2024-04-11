<?php
include ("../BD/connection.php" );
$nom =  $_POST['nom' ]; 
$prenom =  $_POST['prenom' ]; 
$cin =  $_POST['cin' ]; 
$addresse =  $_POST['addresse' ]; 
$email =  $_POST['email' ];
$id_prof= $_POST['id_prof' ];
$sql= "UPDATE `professeur`  SET  `nom` = '". $nom."'  ,`prenom` = '". $prenom."'  , `cin` = '". $cin."'  , `addresse` =  '". $addresse."' , 
`email`  =  '".$email ."'  WHERE `id_prof` = $id_prof " ;

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