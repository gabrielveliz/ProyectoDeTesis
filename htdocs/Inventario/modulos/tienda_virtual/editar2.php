<?php
$id = $_POST["ID"];
$nombre = $_POST["nombre"];
$stock = $_POST["stock"];

include ("../include/coneccion_prestashop.php");

$consulta = "update ps_product_lang set name='$nombre' where id_product=$id";
$ejecuta_consulta=mysql_query($consulta,$coneccion);

$consulta2 = "update ps_stock_available set quantity=$stock where id_product=$id";
$ejecuta_consulta2=mysql_query($consulta2,$coneccion);

header('Location: index.php');
?>