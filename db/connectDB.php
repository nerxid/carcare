<?php
$servername = "localhost";
// $username = "porlaroid";
$username = "root";
// $password = "6541470034";
$password = "";
$database = "carcare";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$conn ->set_charset('utf8');
?>