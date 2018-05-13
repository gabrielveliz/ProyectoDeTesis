<?php
$id = $_POST["ID"];

$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];

include ("../include/coneccion.php");

$consulta = "update t_ubicacion set ubicacion_nombre='$nombre',ubicacion_direccion='$direccion' where id_ubicacion=$id";
$ejecuta_consulta=mysql_query($consulta,$coneccion);  

header('Location: index.php');
?>