<?php
$servername = "iisvoltapescara.edu.it";
$username = "quintab";
$password = "x9Sb8e58?";
$dbname = "labinf_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>