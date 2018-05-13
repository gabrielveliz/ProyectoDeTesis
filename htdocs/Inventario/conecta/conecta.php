<?php
$host='localhost';
$nombre_usuario='root';
$pas ='';
$nombre_base_datos='inventario';

$conecta = mysql_connect($host,$nombre_usuario,$pas)  or die ("error al conectar");

$db = mysql_select_db($nombre_base_datos,$conecta);
?>