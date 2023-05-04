<?php
include('connection.php');

// Fetch all unique districts for the selected state from the database
$state = $_POST['state'];
$districts_result = pg_query("SELECT DISTINCT district FROM locations WHERE state = '" . $state . "' ORDER BY district ASC");

// Build the HTML for the district dropdown
$district_dropdown = "<option value=''>Select district</option>";
while ($row = pg_fetch_assoc($districts_result)) {
    $district_dropdown .= "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
}

// Return the HTML for the district dropdown
echo $district_dropdown;

// Close the database connection
pg_close($conn);
?>
