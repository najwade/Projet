<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Interface</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<style>

        /* Import the Montserrat font */
        * {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        
        /* Basic styling */
        table {
            border-collapse: collapse;
            
        }

        th, td {
            border: 1px solid black;
            padding: 5px; /* Increased padding for better spacing */
            text-align: center;
            /* Equal width for each cell */
        }




        th {
            background-color: #5269C7; /* Green header background */
            color: white; /* White text color */
            font-weight: bold;
        }

        /* Alternate row colors */
        

        /* Hover effect */
        tr:hover {
            background-color: #c1cbf1; /* Darker background on hover */
        }

        tr:hover input[type="number"] {
            background-color: #c1cbf1; /* Change the background color of inputs when the tr is hovered */
        }

        th:first-child, td:first-child {
            text-align: left;
            font-weight: bold;
        }

        tbody td:first-child {
            z-index: 1;
            position: sticky;
            left: 0;
        }
        
        thead {
            z-index: 3;
            position: sticky;
            top: 0;
            left: 0;
        }


        td[data-professor-id]{
          width: 0;
          background-color:#B2BEEE;
        }

        .module-title {
            font-size: smaller;
            background-color: #B2BEEE;
        }

        .filiere-cell {
            background-color: #5356FF;
        }

        .topleftcell{
          border: 0;
          background-color: white;
          
        }

        /* Style for editable cells */
        input[type="number"] {
            border: 1px solid transparent; /* Set border color transparent by default */
            width: 47px;
            height: 47px;
            outline: none;
            text-align: center;
            -webkit-appearance: textfield;
            background-color: white;
            box-sizing: border-box; /* Remove outline */
            font-size: x-large;
        }

        /* Style for cells when clicked and focused */
        

        /* Remove number increment arrows in WebKit browsers */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0; /* Optional - if you don't want arrows to be the specified size */
        }

        .table-container {
            width: 50em;
            overflow-x: auto;
            height: 100vh;
        }
        

</style>
<body>

<?php
// Include the database connection file
include "connection.php";

// Query to retrieve professors
$sqlProfessors = "SELECT * FROM Professeur";
$resultProfessors = mysqli_query($conn, $sqlProfessors);

// Query to retrieve filiere names and their corresponding modules
$sqlFiliereModules = "SELECT filiere.nom_filiere, Module.nom_module, charge.type_charge, charge.nbrgroups, charge.id_prof,charge.id_charge
                      FROM filiere
                      INNER JOIN Module ON filiere.id_filiere = Module.id_filiere
                      LEFT JOIN charge ON Module.id_module = charge.id_module
                      ORDER BY filiere.nom_filiere, Module.nom_module";
$resultFiliereModules = mysqli_query($conn, $sqlFiliereModules);

// Array to hold filiere names and their corresponding modules
$filiereInfo = [];
while ($row = mysqli_fetch_assoc($resultFiliereModules)) {
    $filiereInfo[$row['nom_filiere']][$row['nom_module']][$row['type_charge']][$row['id_prof']] = $row['nbrgroups'];
}
echo '<div class="table-container">';
// Begin the table
echo '<table>';

echo '<thead>';


// Row for professors
echo '<tr>';
echo '<th class = "topleftcell"></th>';
foreach ($filiereInfo as $filiereName => $modules) {
    echo '<th colspan="' . count($modules) * 3 . '" class="filiere-cell">' . $filiereName . '</th>'; // Column header for filiere name
}
echo '<th rowspan="3">Charge Printemps</th>';
echo '</tr>';

// Row for module names under each filiere
echo '<tr>';
echo '<th class = "topleftcell"></th>'; // Empty cell in top left corner
foreach ($filiereInfo as $modules) {
    foreach ($modules as $moduleName => $types) {
        echo '<th colspan="3">' . $moduleName . '</th>'; // Column headers for module names
    }
}

echo '</tr>';

// Titles row for TP, TD, and CRS
echo '<tr>';
echo '<th class = "topleftcell"></th>'; // Empty cell in top left corner
foreach ($filiereInfo as $modules) {
    foreach ($modules as $types) {
        foreach ($types as $type => $profGroups) {
            echo '<th class="module-title" style= "width :47px;">Cr</th>';
            echo '<th class="module-title" style= "width :47px;">TD</th>';
            echo '<th class="module-title" style= "width :47px;">TP</th>';
            
        }
    }
}

echo '</tr>';
echo '</thead>';
echo '<tbody>';
// Loop through professors to create rows
while ($professor = mysqli_fetch_assoc($resultProfessors)) {
    echo '<tr>';
    echo '<td data-professor-id="' . $professor['id_prof'] . '">' . $professor['nom'] . ' ' . $professor['prenom'] . '</td>'; // Professor name cell
    // Loop through filiere names and their corresponding modules to create cells for each charge
    foreach ($filiereInfo as $modules) {
        foreach ($modules as $types) {
            foreach ($types as $type => $profGroups) {
                // Retrieve and display the correct nbrgroups value for each module type
                $nbrGroupsValue = isset($profGroups[$professor['id_prof']]) ? $profGroups[$professor['id_prof']] : '';
                $idCharge = isset($profGroups['id_charge']) ? $profGroups['id_charge'] : 'null';


                echo '<td class="nbrgroups" data-id-charge="' . $idCharge . '">' . '<input type="number" min="0" max="99" maxlength="2" value="' . ($type === 'Cr' ? $nbrGroupsValue : '') . '">' . '</td>';
                echo '<td class="nbrgroups" data-id-charge="' . $idCharge . '">' . '<input type="number" min="0" max="99" maxlength="2" value="' . ($type === 'TD' ? $nbrGroupsValue : '') . '">' . '</td>';
                echo '<td class="nbrgroups" data-id-charge="' . $idCharge . '">' . '<input type="number" min="0" max="99" maxlength="2" value="' . ($type === 'TP' ? $nbrGroupsValue : '') . '">' . '</td>';
                
                
            }
        }
    }
    echo '<td></td>'; // Charge Printemps cell

    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
?>
<script>
    // Get all td elements
    const cells = document.querySelectorAll('td');
    
    // Attach mouseover event listener to each td
    cells.forEach(cell => {
        cell.addEventListener('mouseover', () => {
            // Get the index of the current cell
            const columnIndex = Array.from(cell.parentNode.children).indexOf(cell);
            
            // Get all cells in the same column
            const cellsInColumn = document.querySelectorAll(`td:nth-child(${columnIndex + 1})`);
            
            // Apply background color to all cells in the column
            cellsInColumn.forEach(cell => {
                cell.style.backgroundColor = '#c1cbf1';
                 // Change to the hover color
            });

            // Get all input fields in the same column
            const inputsInColumn = document.querySelectorAll(`td:nth-child(${columnIndex + 1}) input[type="number"]`);
            
            // Apply background color to all input fields in the column
            inputsInColumn.forEach(input => {
                input.style.backgroundColor = '#c1cbf1'; // Change to the hover color
            });

            // Get all th elements in the same column
            const thsInColumn = document.querySelectorAll(`th:nth-child(${columnIndex + 1})`);

            // Apply background color to all th elements in the column
            
        });
        
        // Attach mouseout event listener to each td to reset column color on hover out
        cell.addEventListener('mouseout', () => {
            // Reset background color of all cells and input fields in the column
            const cellsAndInputsInColumn = document.querySelectorAll(`td, input[type="number"]`);
            cellsAndInputsInColumn.forEach(element => {
                element.style.backgroundColor = ''; // Reset to default
            });

            // Reset background color of all th elements in the column
            const thsInColumn = document.querySelectorAll(`th`);
            
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
    // Get all input elements
    const inputs = document.querySelectorAll('input[type="number"]');

    // Attach event listener to each input
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            const professorId = input.parentNode.dataset.professorId;
            const chargeId = input.parentNode.dataset.chargeId;
            const nbrGroups = input.value;

            // AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_nbrgroups.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle response from server
                    console.log(xhr.responseText);
                    console.log('professorId:', professorId, 'chargeId:', chargeId, 'nbrGroups:', nbrGroups);
                }
            };
            xhr.send('professor_id=' + professorId + '&charge_id=' + chargeId + '&nbr_groups=' + nbrGroups);
        });
    });
});


   
</script>




</body>

</html>
