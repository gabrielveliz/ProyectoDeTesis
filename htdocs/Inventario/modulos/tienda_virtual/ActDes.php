<?php
$id=$_GET["op"];

include ("../include/coneccion_prestashop.php");

$consulta = "SELECT * from ps_product where id_product=$id";
$ejecuta_consulta=mysql_query($consulta,$coneccion);

while ($rojo=mysql_fetch_array($ejecuta_consulta))
{
    $p=$rojo["indexed"];
}


if($p==1)
{
	$consulta2 = "update ps_product set indexed=0, active=0 where id_product=$id";
}
if($p==0)
{
	$consulta2 = "update ps_product set indexed=1, active=1 where id_product=$id";
}


$ejecuta_consulta2=mysql_query($consulta2,$coneccion);

header('Location: index.php');

?>