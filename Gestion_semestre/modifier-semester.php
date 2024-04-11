<?php
include("../BD/connection.php");

// Vérifie si la connexion est établie
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupère les données du formulaire
$id_semestre = $_POST['id_semestre'];
$nom_semestre = $_POST['nom_semestre'];
$nom_filiere = $_POST['nom_filiere'];
$nom_session = $_POST['nom_session'];

// Obtient l'ID de la filière en fonction du nom
$sql_filiere = "SELECT id_filiere FROM filiere WHERE nom_filiere = '$nom_filiere'";
$result_filiere = mysqli_query($conn, $sql_filiere);

if (!$result_filiere) {
    echo json_encode(array("status" => "error", "message" => "Erreur lors de la récupération de l'ID de la filière : " . mysqli_error($conn)));
    exit();
}

$row_filiere = mysqli_fetch_assoc($result_filiere);
$id_filiere = $row_filiere['id_filiere'];
// Obtient l'ID de la session en fonction du nom
$sql_session = "SELECT id_session FROM session_annee WHERE nom_session = '$nom_session'";
$result_session = mysqli_query($conn, $sql_session);

if (!$result_session) {
    echo json_encode(array("status" => "error", "message" => "Erreur lors de la récupération de l'ID de la session : " . mysqli_error($conn)));
    exit();
}

$row_session = mysqli_fetch_assoc($result_session);
$id_session = $row_session['id_session'];

// Met à jour le semestre
$sql_update = "UPDATE semestre
               SET nom_semestre = '$nom_semestre',
                   id_filiere = $id_filiere,
                   id_session = $id_session
               WHERE id_semestre = $id_semestre";

if (mysqli_query($conn, $sql_update)) {
    echo json_encode(array("status" => "success", "message" => "Semestre mis à jour avec succès."));
} else {
    echo json_encode(array("status" => "error", "message" => "Erreur lors de la mise à jour du semestre : " . mysqli_error($conn)));
}

// Ferme la connexion à la base de données
mysqli_close($conn);
?>
