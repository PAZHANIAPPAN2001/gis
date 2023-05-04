<?php 
include('connection.php');
$result=pg_query($conn,"UPDATE users SET Password='$_POST[password]' where email = '$_POST[email]'");
$login_check=pg_num_rows($result);
if($login_check > 0)
  {
    echo '<script>alert("unsuccessful")</script>';
  }
  else
   {
    echo '<script>alert("password changed successfully")</script>';
    header("location:index.php");
  }
?>