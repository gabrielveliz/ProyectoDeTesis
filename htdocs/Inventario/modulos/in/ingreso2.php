<?php
$id = $_POST["ID"];
$cantidad = $_POST["cantidad"];
$ingreso=$_POST["ingreso"];
$costo=$_POST["costo"];

$total=$cantidad + $ingreso;

include ("../include/coneccion.php");

if($total>=0)
{
    
$consulta = "update t_inventario set stock=$total where id_inventario=$id";
$ejecuta_consulta=mysql_query($consulta,$coneccion);

$hora=date("H").":".date("i");
$fecha= date("d") . "/" . date("m") . "/" . date("Y");

$consulta_entrada = "insert into entrada (id_inventario,cantidad,Costo,Hora,Fecha) values($id,$ingreso,$costo,'$hora','$fecha')";
     $ejecuta_entrada=mysql_query($consulta_entrada,$coneccion);

header('Location: index.php');  
}
else
{   echo"<script>alert('La Cantidad ingresada no es valida');</script>";
    echo"<script>location.href='http://localhost/inventario/modulos/in/index.php';</script>";
}

?>