<?php
include './conexion_db.php';
$user_curp = $_POST["curp"];

if (empty($user_curp)) {
    echo "EL CAMPO ESTA VACIO";
} else {
    $check_user = $conn->query("SELECT * FROM users WHERE user_curp='$user_curp'");
    if (mysqli_num_rows($check_user) == 1) {
        $check_type = $conn->query("SELECT user_type FROM users WHERE user_type='admin' and user_curp='$user_curp'");

        $_SESSION['name'] = $user_curp;
        $_SESSION['loggedin'] = true;

        if (mysqli_num_rows($check_type) == 1) {

            header("location:../content/home-admin.php");
        } else {
            header("location:../content/home-user.php");
        }
    } else {
        echo '
            <script>
                alert("La CURP ingresada no se encuentra registrada, corroborala e intentalo de nuevo");
                window.location = "../index.php";
            </script>
        ';
    }
}
