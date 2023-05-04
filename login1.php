<?php
include('connection.php');
$result = pg_query($conn, "SELECT * FROM users where username = '$_POST[username]' and password = '$_POST[password]'");
$login_check=pg_num_rows($result);
if($login_check > 0)
  {
    echo '<script>alert("login successful")</script>';
    header('Location: web.php');
  }
  else
   {
    echo '<script>alert("login unsuccessful")</script>';
  }
 ?>