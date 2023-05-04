<?php
include('connection.php');
$query = pg_query($db, "INSERT into state_master values('$_POST[state_id]','$_POST[state_name]')");


// check if the query was successful and rows were affected
if (pg_affected_rows($query) > 0) {
  // display success message
    echo '<script>alert("Successful")</script>';
} else {
  // display error message
    echo '<script>alert("unsuccessfully")</script>';
}
// close database connection
pg_close($conn);
?>