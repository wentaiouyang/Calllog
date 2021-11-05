<?php
$servername = "localhost";
$username = "root";
$password = "root";
 
// create connection
$conn = new mysqli($servername, $username, $password);
 
// check connection
if ($conn->connect_error) {
    die("connect fail: " . $conn->connect_error);
} 
?>