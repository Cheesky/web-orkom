<?php
$host = "interchange.proxy.rlwy.net";
$user = "root";
$password = "JMEVYjBfpTuvMkJftlnzRyQmrZkwKCxk";
$dbname = "orkom";

// Optional: port (if not default 3306)
$port = 59010;

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
