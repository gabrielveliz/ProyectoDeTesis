<?php
$id = $_POST["ID"];
$cantidad = $_POST["cantidad"];
$vender=$_POST["vender"];

$total=$cantidad - $vender;
echo "cantidad ".$cantidad." menos ".$vender." es igual a".$total;
include ("../include/coneccion.php");
if($total>=0)
{
    
$consulta = "update t_inventario set stock=$total where id_inventario=$id";
$ejecuta_consulta=mysql_query($consulta,$coneccion);

$hora=date("H").":".date("i");
$fecha= date("d") . "/" . date("m") . "/" . date("Y");

$consulta_entrada = "insert into salida (id_inventario,cantidad,Hora,Fecha) values($id,$vender,'$hora','$fecha')";
     $ejecuta_entrada=mysql_query($consulta_entrada,$coneccion);

header('Location: index.php');  
}
else
{   echo"<script>alert('La Cantidad ingresada no es valida');</script>";
    echo"<script>location.href='http://localhost/inventario/modulos/in/index.php';</script>";
}

?>