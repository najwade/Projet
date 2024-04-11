<?php
// Include the database connection file
include "connection.php";

// Check if data is received via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data sent via AJAX
    $professorId = $_POST['professor_id'];
    $chargeId = $_POST['charge_id'];
    $nbrGroups = $_POST['nbr_groups'];

    // Perform database update
    $sqlUpdate = "UPDATE charge SET nbrgroups = '$nbrGroups' WHERE id_prof = '$professorId' AND id_charge = '$chargeId'";
    $resultUpdate = mysqli_query($conn, $sqlUpdate);

    if ($resultUpdate) {
        // Return success message
        echo "Data updated successfully";
        echo $professorId;
        echo $chargeId;
        echo $nbrGroups;
    } else {
        // Return error message
        echo "Error updating data";
    }
}
?>
