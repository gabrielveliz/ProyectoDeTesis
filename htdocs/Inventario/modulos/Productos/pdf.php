<?php
session_start();
include "../../fpdf/fpdf.php";
  
 $id_ubi=$_SESSION['ubi'];  

  include ("../include/coneccion.php");    
 $consulta = "select * from producto join t_plazas on producto.id_plaza=t_plazas.id_plaza join t_categoria on producto.id_categoria=t_categoria.id_categoria join t_proveedor on producto.id_proveedor=t_proveedor.id_proveedor order by producto_nombre ASC";
    $ejecuta = mysql_query($consulta,$coneccion);    
 
class MIPDF extends FPDF{
    public function Header(){
      
      $this -> image("../../img/logo.png",50,10,100,50);
      $this -> SetFont ('Times','b',14);
      $this -> Ln(50);
      
      }
    }


$mipdf = new MIPDF();

$mipdf -> addPage();





$mipdf -> Cell(100,10,"Lista Productos",1,0,'c');
$mipdf-> Ln(10);

$fecha= date("d") . "/" . date("m") . "/" . date("Y");
$mipdf -> Cell(30,10,"Fecha : ",1,0,'c');
$mipdf -> Cell(100,10,$fecha,1,0,'c');
$mipdf-> Ln(10);


 $mipdf -> Cell(8,10,"N",0,0,'c');
    $mipdf -> Cell(50,10,"Nombre",0,0,'c');
    $mipdf -> Cell(40,10,"Plaza",0,0,'c');
    $mipdf -> Cell(40,10,"Categoria",0,0,'c');
    $mipdf -> Cell(50,10,"Proveedor",0,0,'c');

    $mipdf ->Ln(10);

$n=0;
while( $datos = mysql_fetch_array($ejecuta))
{    $n=$n+1;
    $nombre = $datos['producto_nombre'];
    $plaza = $datos['plaza_nombre'];
    $categoria = $datos['categoria_nombre'];
    $proveedor = $datos['proveedor_nombre'];
    


    $mipdf -> Cell(8,10,$n,1,0,'c');
    $mipdf -> Cell(50,10,$nombre,1,0,'c');
    $mipdf -> Cell(40,10,$plaza,1,0,'c');
    $mipdf -> Cell(40,10,$categoria,1,0,'c');
    $mipdf -> Cell(50,10,$proveedor,1,0,'c');

//    $mipdf-> Ln(10);
    $mipdf ->Ln(10);
}
$mipdf -> Output();

?>