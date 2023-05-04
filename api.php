<?php /*
header('Content-Type: application/json');

$data = [
	[
		"title" => "Post 1",
		"content" => "This is the content of post 1."
	],
	[
		"title" => "Post 2",
		"content" => "This is the content of post 2."
	],
	[
		"title" => "Post 3",
		"content" => "This is the content of post 3."
	]
];

echo json_encode($data);
?>*/

include('connection.php');

  // Make sure to set appropriate headers to allow cross-origin requests
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST');

  // Retrieve data from the form submission
  $name = $_POST['name'];
  $description = $_POST['description'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  // Do something with the data (e.g., save to database)
  // ...

  // Return a response to the client
  echo json_encode(array('success' => true));
?>

