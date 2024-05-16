<?php
$servername = "localhost";
$database = "system_down";
$username = "root";
$password = "Pozarica.1";
// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
$user_name = $_POST["name"];
$user_curp = $_POST["curp"];
$user_phone = $_POST["phone"];
$user_address = $_POST["address"];
$user_created = date("Y-m-d H:i:s");
$sql = "INSERT INTO users (user_name, user_curp, user_phone, user_address, user_type, user_created) VALUES ('$user_name', '$user_curp', '$user_phone', '$user_address', 'user', '$user_created')";
if ($conn->query($sql)) {
    echo "<p>Registro insertado con éxito</p>";
    header("location:../content/home-user.php");
} else {
    echo "<p>Hubo un error al ejecutar la sentencia de inserción: {$conn->error}</p>";
}
$conn->close();
