<?php
include_one 'db/conexion_db.php';
$objeto =new conexion();
$conexion =$objeto->Conectar();

$consulta = "SELECT* FROM activity_user";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$activity_user=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head></head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">


<table id="activity_user" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>CURP</th>
            <th>Teléfono</th>
            <th>Dirección</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $user): ?>
        <tr>
            <td><?php echo $user['user_id']; ?></td>
            <td><?php echo $user['user_name']; ?></td>
            <td><?php echo $user['user_curp']; ?></td>
            <td><?php echo $user['user_phone']; ?></td>
            <td><?php echo $user['user_address']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#activity_user').DataTable();
        });
    </script>
</body>
</html>