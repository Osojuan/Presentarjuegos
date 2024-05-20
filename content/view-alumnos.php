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
<html lang="en">

<head></head>
<meta charset="UTF-8">
