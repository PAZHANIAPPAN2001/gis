<?php
include('connection.php');

// Fetch all taluks for the selected district from the database
$taluk = $_POST['taluk'];
$village_result = pg_query("SELECT village FROM locations WHERE taluk = '" . $taluk . "'");

// Build the HTML for the taluk dropdown
$village_dropdown = "<option value=''>Select village</option>";
while ($row = pg_fetch_assoc($village_result)) {
    $village_dropdown .= "<option value='" . $row['village'] . "'>" . $row['village'] . "</option>";
}

// Return the HTML for the taluk dropdown
echo $village_dropdown;

// Close the database connection
pg_close($conn);
?>
