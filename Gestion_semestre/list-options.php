<?php
include("../BD/connection.php");

// Récupérer les noms de filières depuis la base de données
$queryFiliere = "SELECT id_filiere, nom_filiere FROM filiere";
$resultFiliere = mysqli_query($conn, $queryFiliere);

// Récupérer les noms de sessions depuis la base de données
$querySession = "SELECT id_session, nom_session FROM session_annee";
$resultSession = mysqli_query($conn, $querySession);

// Vérifier s'il y a des résultats
if ($resultFiliere && $resultSession) {
    $filiereOptions = "";
    while ($row = mysqli_fetch_assoc($resultFiliere)) {
        $idFiliere = $row['id_filiere'];
        $nomFiliere = $row['nom_filiere'];
        $filiereOptions .= "<option value=\"$idFiliere\">$nomFiliere</option>";
    }

    $sessionOptions = "";
    while ($row = mysqli_fetch_assoc($resultSession)) {
        $idSession = $row['id_session'];
        $nomSession = $row['nom_session'];
        $sessionOptions .= "<option value=\"$idSession\">$nomSession</option>";
    }

    $response = [
        'filiereOptions' => $filiereOptions,
        'sessionOptions' => $sessionOptions,
    ];

    echo json_encode($response);
} else {
    // Gérer les erreurs si la requête échoue
    $response = [
        'error' => 'Erreur de chargement des filières et/ou sessions',
    ];

    echo json_encode($response);
}
?>
