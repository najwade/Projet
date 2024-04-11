<?php
include ("../BD/connection.php" ); 
$sql= "SELECT
semestre.id_semestre,
filiere.nom_filiere,
session_annee.nom_session,
semestre.nom_semestre
FROM
semestre
JOIN
session_annee ON semestre.id_session = session_annee.id_session
JOIN
filiere ON semestre.id_filiere = filiere.id_filiere
ORDER BY semestre.id_semestre DESC" ; 
$result = mysqli_query($conn ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 