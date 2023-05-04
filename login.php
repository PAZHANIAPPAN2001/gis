<?php
include('connection.php');
// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form data (you can add your own validation rules here)
if (empty($email) || empty($password)) {
	die("Please fill all fields.");
}

// Check if the email exists in the database
$query = "SELECT * FROM users WHERE email = '$email'";
$result = pg_query($conn, $query);
$row = pg_fetch_assoc($result);

if ($row) {
	// Verify the password
	if (password_verify($password, $row['password'])) {
		// Check if the email has been verified
		if ($row['is_email_verified']) {
			// Start the user session
			session_start();
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			
			// Redirect to the home page (or any other page you want)
			header("Location: web.php");
			exit();
		} else {
			echo "Please verify your email address.";
		}
	} else {
		echo "Incorrect email or password.";
	}
} else {
	echo "Incorrect email or password.";
}

// Close the database connection
pg_close($conn);
?>
