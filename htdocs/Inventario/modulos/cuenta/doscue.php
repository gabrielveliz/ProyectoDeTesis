<?php

$nombreus = $_POST["us"];
$contrasena = $_POST["pas"];
$trabajador = $_POST["trabajador"];
$tipo = $_POST["op"];

include ("../include/coneccion.php");

$consulta = "insert into t_us (us_nom, us_pass, us_nombre_trabajador, id_tipo_usuario) values('$nombreus','$contrasena','$trabajador',$tipo);";

$ejecuta_consulta=mysql_query($consulta,$coneccion);  



header("Location:index.php"); 


?>