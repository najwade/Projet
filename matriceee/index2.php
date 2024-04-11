<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Interface</title>
    <style>
        /* Basic styling */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }

        th:first-child, td:first-child {
            text-align: left;
            font-weight: bold;
        }

        .module-title {
            font-size: smaller;
        }

        .filiere-cell {
            background-color: lightblue;
        }
        
        /* Make input cells editable */
        input {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            width: 60px;
        }
    </style>
</head>
<body>

<?php
// Sample data for demonstration
$professors = [
    ['id' => 1, 'name' => 'John Doe'],
    ['id' => 2, 'name' => 'Jane Smith'],
];

$modules = [
    ['module_name' => 'Thermodynamics', 'TP' => 2, 'TD' => 3, 'CRS' => 1],
    ['module_name' => 'Physics', 'TP' => 1, 'TD' => 2, 'CRS' => 3],
];

// Begin the table
echo '<table>';

// Row for professors
echo '<tr>';
echo '<th></th>'; // Empty cell in top left corner
foreach ($modules as $module) {
    echo '<th colspan="3">' . $module['module_name'] . '</th>'; // Column headers for module names
}
echo '<th>Charge</th>'; // Additional cell for charge calculation
echo '</tr>';

// Titles row for TP, TD, and CRS
echo '<tr>';
echo '<th></th>'; // Empty cell in top left corner
foreach ($modules as $module) {
    echo '<th class="module-title">TP</th>';
    echo '<th class="module-title">TD</th>';
    echo '<th class="module-title">CRS</th>';
}
echo '<th></th>'; // Empty cell for charge calculation
echo '</tr>';

// Loop through professors to create rows
foreach ($professors as $professor) {
    echo '<tr>';
    echo '<td>' . $professor['name'] . '</td>'; // Professor name cell

    // Loop through modules to create cells for each charge
    foreach ($modules as $module) {
        echo '<td><input type="number" class="nbrgroup" data-prof="' . $professor['id'] . '" data-module="' . $module['module_name'] . '" data-type="TP" value="' . $module['TP'] . '"></td>'; // Input cell for TP
        echo '<td><input type="number" class="nbrgroup" data-prof="' . $professor['id'] . '" data-module="' . $module['module_name'] . '" data-type="TD" value="' . $module['TD'] . '"></td>'; // Input cell for TD
        echo '<td><input type="number" class="nbrgroup" data-prof="' . $professor['id'] . '" data-module="' . $module['module_name'] . '" data-type="CRS" value="' . $module['CRS'] . '"></td>'; // Input cell for CRS
    }

    // Additional cell for charge calculation
    echo '<td><input type="text" class="charge" readonly></td>';

    echo '</tr>';
}

echo '</table>';
?>

<script>
// Function to calculate charge for a specific professor
function calculateCharge(profId) {
    let totalCharge = 0;
    // Loop through input cells for the given professor
    document.querySelectorAll('.nbrgroup[data-prof="' + profId + '"]').forEach(function(cell) {
        const type = cell.getAttribute('data-type');
        const value = parseInt(cell.value) || 0; // Convert input value to integer, default to 0 if empty or invalid
        totalCharge += value; // Accumulate charge
    });
    // Set the calculated charge value to the corresponding input cell
    document.querySelector('.charge[data-prof="' + profId + '"]').value = totalCharge;
}

// Attach event listeners to input cells
document.querySelectorAll('.nbrgroup').forEach(function(cell) {
    cell.addEventListener('input', function() {
        const profId = this.getAttribute('data-prof');
        calculateCharge(profId); // Recalculate charge when input value changes
    });
});

// Initial calculation for all professors
document.querySelectorAll('.nbrgroup').forEach(function(cell) {
    const profId = cell.getAttribute('data-prof');
    calculateCharge(profId);
});
</script>

</body>
</html>
