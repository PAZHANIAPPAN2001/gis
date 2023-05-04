<?php
include('connection.php');
$result = pg_query($conn, "SELECT * FROM users where username = '$_POST[username]' and email = '$_POST[email]'");
$login_check=pg_num_rows($result);
if($login_check > 0)
  {
    header("location:reset.php");
}
  else
   {
    echo '<script>alert("Enter the valid Credentials")</script>';
  }
 ?>