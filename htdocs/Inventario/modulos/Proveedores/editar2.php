<?php
$id = $_POST["ID"];

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];

include ("../include/coneccion.php");

$consulta = "update t_proveedor set proveedor_nombre='$nombre',proveedor_descripcion='$descripcion' where id_proveedor=$id";
$ejecuta_consulta=mysql_query($consulta,$coneccion);  

header('Location: index.php');
?>