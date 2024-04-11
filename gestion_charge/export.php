<?php
/*
include("../BD/connection.php");
require '../phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style;

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

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Ajouter les en-têtes de colonne
$sheet->setCellValue('A1', 'Nom Professeur');
$sheet->setCellValue('B1', 'Nom Module');
$sheet->setCellValue('C1', 'Type de charge');
$sheet->setCellValue('D1', 'Nombre de groupes');
$sheet->setCellValue('E1', 'Volume horaire');
$sheet->setCellValue('F1', 'Durée');
$sheet->setCellValue('G1', 'Facteur');

$rowCount = 2; // Commencer à partir de la deuxième ligne pour les données

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $rowCount, $row['nom'] . " " . $row['prenom']);
    $sheet->setCellValue('B' . $rowCount, $row['nom_module']);
    $sheet->setCellValue('C' . $rowCount, $row['type_charge']);
    $sheet->setCellValue('D' . $rowCount, $row['nbrgroups']);
    $sheet->setCellValue('E' . $rowCount, $row['volume_h']);
    $sheet->setCellValue('F' . $rowCount, $row['duree']);
    $sheet->setCellValue('G' . $rowCount, $row['facteur']);

    $rowCount++;
}

// Créer un objet Writer pour XLSX
$writer = new Xlsx($spreadsheet);

// Définir le type de contenu et le nom de fichier pour le téléchargement
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="charge.xlsx"');
header('Cache-Control: max-age=0');

// Transférer le fichier Excel téléchargé
$writer->save('php://output');

*/


include("../BD/connection.php");
require '../phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Ajouter les en-têtes de colonne
$sheet->setCellValue('A1', 'Nom Professeur');
$sheet->setCellValue('B1', 'Nom Module');
$sheet->setCellValue('C1', 'Type de charge');
$sheet->setCellValue('D1', 'Nombre de groupes');
$sheet->setCellValue('E1', 'Volume horaire');
$sheet->setCellValue('F1', 'Durée');
$sheet->setCellValue('G1', 'Facteur');

$rowCount = 2; // Commencer à partir de la deuxième ligne pour les données

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $rowCount, $row['nom'] . " " . $row['prenom']);
    $sheet->setCellValue('B' . $rowCount, $row['nom_module']);
    $sheet->setCellValue('C' . $rowCount, $row['type_charge']);
    $sheet->setCellValue('D' . $rowCount, $row['nbrgroups']);
    $sheet->setCellValue('E' . $rowCount, $row['volume_h']);
    $sheet->setCellValue('F' . $rowCount, $row['duree']);
    $sheet->setCellValue('G' . $rowCount, $row['facteur']);

    $rowCount++;
}

// Créer un objet Writer pour XLSX
$writer = new Xlsx($spreadsheet);

// Définir le type de contenu et le nom de fichier pour le téléchargement
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="charge.xlsx"');
header('Cache-Control: max-age=0');

// Transférer le fichier Excel téléchargé
$writer->save('php://output');

// Tableau HTML pour afficher les mêmes données
echo '<table border="1">
        <tr>
            <th>Nom Professeur</th>
            <th>Nom Module</th>
            <th>Type de charge</th>
            <th>Nombre de groupes</th>
            <th>Volume horaire</th>
            <th>Durée</th>
            <th>Facteur</th>
        </tr>';

// Retourner à la première ligne des données
mysqli_data_seek($result, 0);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['nom'] . ' ' . $row['prenom'] . '</td>';
    echo '<td>' . $row['nom_module'] . '</td>';
    echo '<td>' . $row['type_charge'] . '</td>';
    echo '<td>' . $row['nbrgroups'] . '</td>';
    echo '<td>' . $row['volume_h'] . '</td>';
    echo '<td>' . $row['duree'] . '</td>';
    echo '<td>' . $row['facteur'] . '</td>';
    echo '</tr>';
}

echo '</table>';






?>
