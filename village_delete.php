<?php
include('connection.php');


// Check if the form was submitted
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
   // $state_id = $_POST['state_id'];
  //  $delete="delete from state_master where state_id='$state_id'";
  //  $result = pg_query($conn,$delete);
    $village = $_POST['village'];
    $delete="delete from locations where taluk='$village'";
    $result = pg_query($conn,$delete);
     
 	//$res=pg_num_rows($result);
 if ($result) {
        echo '<script>alert("Record updated successfully.")</script>';

    } else {
        echo '<script>alert("Error updating record: ")</script>' . pg_last_error($conn);
    }
    
//}
header('Location: village_master.php');
// Close the database connection
pg_close($conn);
 ?>
