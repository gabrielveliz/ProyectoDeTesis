<?php
$id = $_POST["ID"];

$nombreus = $_POST["nom"];
$contrasena = $_POST["pass"];
$trabajador = $_POST["trabajador"];

include ("../include/coneccion.php");

$consulta = "update t_us set us_nom='$nombreus',us_pass='$contrasena',us_nombre_trabajador='$trabajador' where id_usuario=$id";
$ejecuta_consulta=mysql_query($consulta,$coneccion);  

header('Location: index.php');
?>