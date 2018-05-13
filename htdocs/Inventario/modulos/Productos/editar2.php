<?php
$id = $_POST["ID"];
$nombre = $_POST["nom"];


include ("../include/coneccion.php");

$consulta = "update producto set producto_nombre='$nombre' where id_producto=$id";
$ejecuta_consulta=mysql_query($consulta,$coneccion);  

header('Location: index.php');
?>