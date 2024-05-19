<?php
include './conexion_db.php';
$user_curp = $_POST["curp"];

if (empty($user_curp)) {
    echo "EL CAMPO ESTA VACIO";
} else {
    $check_user = $conn->query("SELECT * FROM users WHERE user_curp='$user_curp'");
    if (mysqli_num_rows($check_user) == 1) {

        $_SESSION['loggedin'] = true;

        if ($check_user) {
            while ($row = $check_user->fetch_array()) {
                $id = $row['user_id'];
                $name = $row['user_name'];
                $type = $row['user_type'];
                $curp = $row['user_curp'];
            }
        }
        if ($type == "admin") {
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
