
<?php
include("../BD/connection.php");

$id_semestre  = $_GET['id_semestre'];

$sql = "SELECT semestre.nom_semestre, filiere.nom_filiere, session_annee.nom_session
        FROM semestre
        INNER JOIN filiere ON semestre.id_filiere = filiere.id_filiere
        INNER JOIN session_annee ON semestre.id_session = session_annee.id_session
        WHERE semestre.id_semestre = $id_semestre";

$result = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($result);

// Vérifier s'il y a des résultats
if ($fetch) {
    echo json_encode($fetch);
} else {
    // Gérer les erreurs si la requête échoue
    $response = [
        'error' => 'Erreur de chargement des données du semestre',
    ];

    echo json_encode($response);
}
?>
