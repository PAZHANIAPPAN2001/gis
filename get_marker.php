<?php
include('connection.php');

// Query the database for the latitude and longitude data
// Query the database for the latitude and longitude data
$query = "SELECT temple_name, latitude, longitude FROM temple";
$result = pg_query($conn, $query);

// Create an array to hold the data
$data = array();

// Loop through the result set and add each row to the $data array
while ($row = pg_fetch_assoc($result)) {
    $data[] = $row;
}

// Convert the data to a JSON object and output it
header('Content-Type: application/json');
echo json_encode($data);

?>
