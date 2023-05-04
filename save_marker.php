<?php

include('connection.php');

// Get form data
$name = $_POST['name'];
$description = $_POST['description'];
$latitude = floatval($_POST['latitude']);
$longitude = floatval($_POST['longitude']);

// Insert data into the markers table
$query = "INSERT INTO markers (name, description, latitude, longitude) VALUES ('$name', '$description', '$latitude', '$longitude')";
$result = pg_query($conn, $query);

// Check if the query was successful
if ($result) {
    echo '<script>alert("Marker Saved successful")</script>';
} else {
    echo "Error saving marker";
}

// Close the database connection
pg_close($conn);
?>

