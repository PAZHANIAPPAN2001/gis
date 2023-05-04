<?php
include('connection.php');

// Fetch all taluks for the selected district from the database
$district = $_POST['district'];
$taluks_result = pg_query("SELECT DISTINCT taluk FROM locations WHERE district = '" . $district . "' ORDER BY taluk ASC");

// Build the HTML for the taluk dropdown
$taluk_dropdown = "<option value=''>Select taluk</option>";
while ($row = pg_fetch_assoc($taluks_result)) {
    $taluk_dropdown .= "<option value='" . $row['taluk'] . "'>" . $row['taluk'] . "</option>";
}

// Return the HTML for the taluk dropdown
echo $taluk_dropdown;

// Close the database connection
pg_close($conn);
?>
