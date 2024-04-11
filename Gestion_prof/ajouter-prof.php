<?php
 include ("../BD/connection.php" ); 
$nom =  $_POST['nom' ]; 
$prenom =  $_POST['prenom' ]; 
$cin =  $_POST['cin' ]; 
$addresse =  $_POST['addresse' ]; 
$email =  $_POST['email' ];
$sql=  "INSERT  INTO `professeur`(`nom` , `prenom` , `cin` , `addresse` , `email`)
 VALUE  (' {$nom} ' , ' {$prenom} ' , ' {$cin} ' , ' {$addresse} ', ' {$email} ')" ; 

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