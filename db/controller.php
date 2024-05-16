<?php

// if (!empty($_POST["btnLogin"])) {
//     if (empty($_POST["curp"])) {
//         echo "LOS CAMPOS ESTAN VACIOS";
//     }
// }

if (!empty($_POST["btnRegister"])) {
    if (empty($_POST["name"]) and empty($_POST["curp"]) and empty($_POST["phone"]) and empty($_POST["address"])) {
        echo "LOS CAMPOS ESTAN VACIOS";
    } else {
        $user_name = $_POST["name"];
        $user_curp = $_POST["curp"];
        $user_phone = $_POST["phone"];
        $user_address = $_POST["address"];
        $user_created = date("Y-m-d H:i:s");
        $sql = "INSERT INTO users (user_name, user_curp, user_phone, user_address, user_type, user_created) VALUES ('$user_name', '$user_curp', '$user_phone', '$user_address', 'user', '$user_created')";
        if ($conn->query($sql)) {

            echo "<p>Registro insertado con éxito</p>";
            header("location:../content/home-user.html");
        } else {
            echo "<p>Hubo un error al ejecutar la sentencia de inserción: {$conn->error}</p>";
        }
        $conn->close();
    }
}
