<?php
include('connection.php');
$query = pg_query($db, "INSERT into locations values('$_POST[state]','$_POST[district]','$_POST[taluk]')");


// check if the query was successful and rows were affected
if (pg_affected_rows($query) > 0) {
  // display success message
    echo '<script>alert("successfully")</script>';
} else {
  // display error message
    echo '<script>alert("unsuccessfully")</script>';
}

// close database connection
pg_close($conn);
header("Location: taluk_master.php");
?>