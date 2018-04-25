<?php

function fn_ConnectSQL() {
	
$servername = "localhost";
$username = "root";
$password = "abcABC!@#123";
$dbName = "db_94Store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
return $conn;
}

?>