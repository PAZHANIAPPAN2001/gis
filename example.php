<?php



ini_set("display_errors", 1);

require_once("mail.php");

include('connection.php');

// Get the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form data (you can add your own validation rules here)
if (empty($username) || empty($email) || empty($password)) {
	die("Please fill all fields.");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Generate a random token
$token = bin2hex(random_bytes(16));

// Insert the user data into the database
$query = "INSERT INTO users (username, email, password, token) VALUES ('$username', '$email', '$hashed_password', '$token')";
$result = pg_query($conn, $query);

$from = "pazhaniappanarul2001@gmail.com"; // example: testemail@domain.com

$to = $email; // example: testemail@domain.com

$subject = " Verify your email address ";

$msg = " Click the link below to verify your email address:\n\nhttp://localhost/tngis1/verify.php?email=$email&token=$token";

$res = send_mail($from, $to, $subject, $msg);

if($res){
echo '<script>alert(" Please Check Your Mail and Verify your mail id.")</script>';
}
else
{
echo '<script>alert("Something went wrong. please try again.")</script>';
}

?>
