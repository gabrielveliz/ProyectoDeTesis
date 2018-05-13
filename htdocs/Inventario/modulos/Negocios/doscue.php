<?php
$nombre = $_POST["nom"];
$direccion = $_POST["dir"];
$tipo = $_POST["inmueble"];
$comuna = $_POST["Comuna"];


include ("../include/coneccion.php");

$consulta = "insert into t_ubicacion (ubicacion_nombre,ubicacion_direccion,tipo_inmueble,ubicacion_comuna) values('$nombre','$direccion',$tipo,$comuna);";

$ejecuta_consulta=mysql_query($consulta,$coneccion);  

header("Location:index.php");

?>