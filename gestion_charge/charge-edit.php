<?php
include ("../BD/connection.php" );

$id_prof= $_POST['id_prof'];
$id_module= $_POST['id_module'];
$type_charge= $_POST['type_charge'];
$volume_h= $_POST['volume_h'];
$nbrgroups= $_POST['nbrgroups'];
$duree= $_POST['duree'];
$facteur= $_POST['facteur'];
$id_charge = $_POST['id_charge'];

$sql = " UPDATE charge
        SET id_module = $id_module,
            type_charge = '$type_charge',
            nbrgroups = $nbrgroups,
            volume_h = $volume_h,
            duree = $duree,
            facteur = $facteur,
            id_prof = $id_prof
        WHERE id_charge = $id_charge ";

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