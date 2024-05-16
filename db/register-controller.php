<?php

include './conexion_db.php';

$user_name = $_POST["name"];
$user_curp = $_POST["curp"];
$user_phone = $_POST["phone"];
$user_address = $_POST["address"];
$user_created = date("Y-m-d H:i:s");
if (empty($user_name) and empty($user_curp) and empty($user_phone) and empty($user_phone)) {
    echo "LOS CAMPOS ESTAN VACIOS";
} else {
    //Verified-Data-Reply
    $verified_data = mysqli_query($conn, "SELECT user_curp FROM users WHERE user_curp='$user_curp'");
    if (mysqli_num_rows($verified_data) > 0) {
        echo '
            <script>
                alert("La CURP ingresada ya ha sido registrada");
                window.location = "../content/home-admin.php";
            </script>
        ';
    } else {

        $sql = "INSERT INTO users (user_name, user_curp, user_phone, user_address, user_type, user_created) VALUES ('$user_name', '$user_curp', '$user_phone', '$user_address', 'user', '$user_created')";
        if ($conn->query($sql)) {

            echo "<p>Registro insertado con éxito</p>";
            header("location:../content/home-admin.php");
        } else {
            echo "<p>Hubo un error al ejecutar la sentencia de inserción: {$conn->error}</p>";
        }
    }
}
