<?php
session_start();
include "../../fpdf/fpdf.php";
  
 $id_ubi=$_SESSION['ubi'];  

  include ("../include/coneccion.php");    
    $consulta = "SELECT t_inventario.id_inventario,t_inventario.id_producto,producto.producto_nombre, t_plazas.plaza_nombre,t_inventario.stock, t_inventario.id_ubicacion,sum(stock) 'Stock' FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_ubicacion=$id_ubi group by t_inventario.id_producto,t_inventario.id_ubicacion order by producto.producto_nombre ASC";
    $ejecuta = mysql_query($consulta,$coneccion);    

    $consulta2 = "SELECT * FROM t_ubicacion where id_ubicacion=$id_ubi";
    $ejecuta2 = mysql_query($consulta2,$coneccion);  

while ($rojo=mysql_fetch_array($ejecuta2))
{
    $p1=$rojo["ubicacion_nombre"];


}
class MIPDF extends FPDF{
    public function Header(){
      
      $this -> image("../../img/logo.png",50,10,100,50);
      $this -> SetFont ('Times','b',14);
      $this -> Ln(50);
      
      }
    }


$mipdf = new MIPDF();

$mipdf -> addPage();




$mipdf -> Cell(30,10,"Lugar : ",1,0,'c');
$mipdf -> Cell(100,10,"Inventario ".$p1,1,0,'c');
$mipdf-> Ln(10);

$fecha= date("d") . "/" . date("m") . "/" . date("Y");
$mipdf -> Cell(30,10,"Fecha : ",1,0,'c');
$mipdf -> Cell(100,10,$fecha,1,0,'c');
$mipdf-> Ln(10);


 $mipdf -> Cell(8,10,"N",0,0,'c');
    $mipdf -> Cell(100,10,"Nombre",0,0,'c');
    $mipdf -> Cell(40,10,"Plaza",0,0,'c');
    $mipdf -> Cell(20,10,"Stock",0,0,'c');

    $mipdf ->Ln(10);

$n=0;
while( $datos = mysql_fetch_array($ejecuta))
{    $n=$n+1;
    $nombre = $datos['producto_nombre'];
    $plaza = $datos['plaza_nombre'];
    $cantidad = $datos['Stock'];
    


    $mipdf -> Cell(8,10,$n,1,0,'c');
    $mipdf -> Cell(100,10,$nombre,1,0,'c');
    $mipdf -> Cell(40,10,$plaza,1,0,'c');
    $mipdf -> Cell(20,10,$cantidad,1,0,'c');

//    $mipdf-> Ln(10);
    $mipdf ->Ln(10);
}
$mipdf -> Output();

?>