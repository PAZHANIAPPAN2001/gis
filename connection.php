<?php
$conn = pg_connect("host=localhost port=5432 dbname=templesdata user=postgres password=12345");
if (!$conn) {
    die("Failed to connect to the database");
}

?>