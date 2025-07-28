<?php
//railway DB
$host = "interchange.proxy.rlwy.net";
$user = "root";
$password = "JMEVYjBfpTuvMkJftlnzRyQmrZkwKCxk";
$dbname = "orkom";

//Website InfinityFree Hostingan DB (Uncomment to change)
//$host = "sql111.infinityfree.com";
//$user = "if0_39482843";
//$password = "7lvstKImTR";
//$dbname = "if0_39482843_tungbes";


// Optional: port (if not default 3306)
$port = 59010;
//$port = 3306; //InfinityFree Port

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
