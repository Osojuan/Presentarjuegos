<?php
$servername = "localhost";
$database = "system_down";
$username = "root";
$password = "3312..";
// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
