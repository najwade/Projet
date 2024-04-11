<?php
include ("../BD/connection.php" ); 
$sql = "SELECT charge.id_charge, 
               module.nom_module, 
               filiere.nom_filiere,
               charge.type_charge,
               charge.nbrgroups,
               charge.volume_h,
               charge.duree,
               charge.facteur,
               Professeur.nom,
               Professeur.prenom 
        FROM charge
        INNER JOIN module ON charge.id_module = module.id_module
        INNER JOIN filiere ON module.id_filiere = filiere.id_filiere
        INNER JOIN Professeur ON charge.id_prof = Professeur.id_prof
        ORDER BY charge.id_charge DESC";

$result = mysqli_query($conn ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 