<?php
session_start();
include "../../fpdf/fpdf.php";
  
 $id_ubi=$_SESSION['ubi'];  

  include ("../include/coneccion.php");    
        $consulta = "select entrada.id_in,t_ubicacion.ubicacion_nombre,producto.producto_nombre, sum(costo) 'costo',sum(cantidad) 'cantidad' from entrada join t_inventario on t_inventario.id_inventario=entrada.id_inventario join producto on producto.id_producto=t_inventario.id_producto join t_ubicacion on t_ubicacion.id_ubicacion=t_inventario.id_ubicacion group by t_ubicacion.ubicacion_nombre,producto.producto_nombre;";
    $ejecuta = mysql_query($consulta,$coneccion);  

        $consulta2 = "  select salida.id_sal,t_ubicacion.ubicacion_nombre,producto.producto_nombre, sum(costo) 'costo',sum(cantidad) 'cantidad' from salida join t_inventario on t_inventario.id_inventario=salida.id_inventario join producto on producto.id_producto=t_inventario.id_producto join t_ubicacion on t_ubicacion.id_ubicacion=t_inventario.id_ubicacion group by t_ubicacion.ubicacion_nombre,producto.producto_nombre;";
    $ejecuta2 = mysql_query($consulta2,$coneccion);  

class MIPDF extends FPDF{
    public function Header(){
      
      $this -> image("../../img/logo.png",50,10,100,50);
      $this -> SetFont ('Times','b',14);
      $this -> Ln(50);
      
      }
    }


$mipdf = new MIPDF();

$mipdf -> addPage();




$mipdf -> Cell(50,10,"Tipo de documento : ",1,0,'c');
$mipdf -> Cell(80,10,"Informe de existencias",1,0,'c');
$mipdf-> Ln(10);

$fecha= date("d") . "/" . date("m") . "/" . date("Y");
$mipdf -> Cell(30,10,"Fecha : ",1,0,'c');
$mipdf -> Cell(100,10,$fecha,1,0,'c');
$mipdf-> Ln(10);


$mipdf -> Cell(40,10,"Departamento : ",1,0,'c');
$mipdf -> Cell(90,10,"Departamento de logistica",1,0,'c');
$mipdf-> Ln(10);

$mipdf -> Cell(30,10,"Empresa : ",1,0,'c');
$mipdf -> Cell(100,10,"Muebles Veliz",1,0,'c');
$mipdf-> Ln(10);

$mipdf -> Cell(30,10,"Dirigido a : ",1,0,'c');
$mipdf -> Cell(100,10,"Gerencia",1,0,'c');
$mipdf-> Ln(10);
$mipdf-> Ln(10);

$mipdf -> Cell(30,10,"Entrada",1,0,'c');

$mipdf-> Ln(10);


 $mipdf -> Cell(80,10,"Local",0,0,'c');
    $mipdf -> Cell(40,10,"Producto",0,0,'c');
    $mipdf -> Cell(20,10,"Costo",0,0,'c');
    $mipdf -> Cell(20,10,"Cantidad",0,0,'c');

    $mipdf ->Ln(10);

$n=0;
while( $datos = mysql_fetch_array($ejecuta))
{    $n=$n+1;
    $nombre = $datos['ubicacion_nombre'];
    $plaza = $datos['producto_nombre'];
    $costo = $datos['costo'];
    $cantidad = $datos['cantidad'];
    



    $mipdf -> Cell(80,10,$nombre,1,0,'c');
    $mipdf -> Cell(40,10,$plaza,1,0,'c');
    $mipdf -> Cell(20,10,"$".$costo,1,0,'c');
    $mipdf -> Cell(20,10,$cantidad." UN",1,0,'c');

//    $mipdf-> Ln(10);
    $mipdf ->Ln(10);
}

$mipdf-> Ln(10);
$mipdf -> Cell(30,10,"Salida",1,0,'c');

$mipdf-> Ln(10);


 $mipdf -> Cell(80,10,"Local",0,0,'c');
    $mipdf -> Cell(40,10,"Producto",0,0,'c');
    $mipdf -> Cell(20,10,"Costo",0,0,'c');
    $mipdf -> Cell(20,10,"Cantidad",0,0,'c');

    $mipdf ->Ln(10);


while( $datos2 = mysql_fetch_array($ejecuta2))
{   
    $nombre = $datos2['ubicacion_nombre'];
    $plaza = $datos2['producto_nombre'];
    $costo = $datos2['costo'];
    $cantidad = $datos2['cantidad'];
    



    $mipdf -> Cell(80,10,$nombre,1,0,'c');
    $mipdf -> Cell(40,10,$plaza,1,0,'c');
    $mipdf -> Cell(20,10,"$".$costo,1,0,'c');
    $mipdf -> Cell(20,10,$cantidad." UN",1,0,'c');

//    $mipdf-> Ln(10);
    $mipdf ->Ln(10);
}


$mipdf -> Output();

?>