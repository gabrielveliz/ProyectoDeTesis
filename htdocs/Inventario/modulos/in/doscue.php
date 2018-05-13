<?php
session_start();
$producto = $_POST["producto"];
$ubicacion = $_SESSION['ubi'];
$cantidad = $_POST["cant"];
$costo = $_POST["costo"];

include ("../include/coneccion.php");

$consulta = "insert into t_inventario (id_producto,id_ubicacion,stock) values($producto,$ubicacion,$cantidad)";

 $consulta2 = "SELECT * FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_ubicacion=$ubicacion and t_inventario.id_producto=$producto order by producto.producto_nombre ASC";
    $ejecuta2 = mysql_query($consulta2,$coneccion); 




$consulta_ultimo = "select max(id_inventario) 'ID' ,stock from t_inventario";
$ejecuta_ultimo=mysql_query($consulta_ultimo,$coneccion);
 

$a1=0;

                while ($row1=mysql_fetch_array($ejecuta2))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_inventario"] ;
                        $id2 = $row1["id_producto"] ;
                        
                        }
$hora=date("H").":".date("i");
$fecha= date("d") . "/" . date("m") . "/" . date("Y");

$a2=0;
                while ($row2=mysql_fetch_array($ejecuta_ultimo))
                    {
                        $a2=$a2+1;
                        $id_ul = $row2["ID"] ;
                        $stockActual=$row2["stock"] ;
                        
                        }

if (empty($id2)) {
    $ejecuta_consulta=mysql_query($consulta,$coneccion);

                        }
$ingresando = $cantidad;
if (empty($id2)==false) {
    $id1 = $id_ul + 1;
    
    $cantidad = $cantidad + $stockActual;

     $consulta_actualizar = "update t_inventario set stock=$cantidad where id_inventario=$id1";
     $ejecuta_actualizar=mysql_query($consulta_actualizar,$coneccion);
                        }

 $consulta_entrada = "insert into entrada (id_inventario,cantidad,Costo,Hora,Fecha) values($id1,$ingresando,$costo,'$hora','$fecha')";
     $ejecuta_entrada=mysql_query($consulta_entrada,$coneccion);

    echo "inventario ".$id1." cantidad ".$ingresando." costo ".$costo ;

header('Location: index.php');

?>