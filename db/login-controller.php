<?php
include './conexion_db.php';
$user_curp = $_POST["curp"];

if (empty($user_curp)) {
    echo "EL CAMPO ESTA VACIO";
} else {
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE user_curp='$user_curp'");
    if (mysqli_num_rows($check_user) == 1) {
        $check_type = mysqli_query($conn, "SELECT user_type FROM users WHERE user_type='admin' and user_curp='$user_curp'");
        $_SESSION['loggedin'] = true;
        if (mysqli_num_rows($check_type) == 1) {
            header("location:../content/home-admin.php");
        } else {
            header("location:../content/home-user.php");
        }
    }
}
