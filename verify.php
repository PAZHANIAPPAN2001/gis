<?php
include('connection.php');

// Get the email and token from the URL parameters
$email = $_GET['email'];
$token = $_GET['token'];

// Check if the email and token match a user in the database
$query = "SELECT * FROM users WHERE email = '$email' AND token = '$token'";
$result = pg_query($conn, $query);
$row = pg_fetch_assoc($result);

if ($row) {
	// Update the user's is_email_verified field in the database
	$update_query = "UPDATE users SET is_email_verified = TRUE WHERE email = '$email'";
	$update_result = pg_query($conn, $update_query);
	
	if ($update_result) {
		echo '<script>alert("Email verification successful. You can now log in.")</script>';
		
	} else {
		echo '<script>alert("Email verification failed. Please try again later.")</script>';
	}
} else {
	echo "Invalid email or token.";
}

// Close the database connection
pg_close($conn);
?>
