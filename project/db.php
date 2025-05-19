<?php
$servername = "localhost";
$username = "root";  // aapka mysql username
$password = "";      // aapka mysql password
$dbname = "ajax_crud_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
