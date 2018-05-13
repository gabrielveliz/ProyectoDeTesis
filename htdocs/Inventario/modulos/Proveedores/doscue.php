<?php
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$tipo = $_POST["op"];


include ("../include/coneccion.php");

$consulta = "insert into t_proveedor (proveedor_nombre,proveedor_descripcion) values('$nombre','$descripcion');";

$ejecuta_consulta=mysql_query($consulta,$coneccion);  

header("Location:index.php");

?>