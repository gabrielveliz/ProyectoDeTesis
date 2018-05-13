<?php
include "../../fpdf/fpdf.php";
 include ("../include/coneccion_prestashop.php");    
 $consulta = "SELECT ps_product_lang.id_product ,ps_product_lang.name , ps_stock_available.quantity, indexed from ps_product_lang join ps_stock_available on ps_product_lang.id_product= ps_stock_available.id_product join ps_product on ps_product_lang.id_product= ps_product.id_product where LENGTH(name)>0 order by name ASC";
    $ejecuta = mysql_query($consulta,$coneccion);     

class MIPDF extends FPDF{
    public function Header(){
      
      $this -> image("../../img/logo.png",50,10,100,50);
      $this -> SetFont ('Times','b',14);
      $this -> Ln(50);
      $this -> Cell(30,10,"Lugar : ",1,0,'c');
      $this -> Cell(100,10,"Inventario Tienda Virtual",1,0,'c');
     
      }
    }


$mipdf = new MIPDF();

$mipdf -> addPage();
$mipdf-> Ln(10);

$fecha= date("d") . "/" . date("m") . "/" . date("Y");
$mipdf -> Cell(30,10,"Fecha : ",1,0,'c');
$mipdf -> Cell(100,10,$fecha,1,0,'c');
$mipdf-> Ln(10);

 $mipdf -> Cell(8,10,"N",0,0,'c');
    $mipdf -> Cell(100,10,"Nombre",0,0,'c');
    $mipdf -> Cell(20,10,"Stock",0,0,'c');
    $mipdf -> Cell(40,10,"Visibilidad",0,0,'c');
    $mipdf ->Ln(10);

$n=0;
while( $datos = mysql_fetch_array($ejecuta))
{    $n=$n+1;
    $id = $datos['id_product'];
    $nombre = $datos['name'];
    $cantidad = $datos['quantity'];
    

                    if($datos['indexed']==1)
                        {$visible = "ACTIVO";}
                    if($datos['indexed']==0)
                        {$visible = "NO VISIBLE";}

    $mipdf -> Cell(8,10,$n,1,0,'c');
    $mipdf -> Cell(100,10,$nombre,1,0,'c');
    $mipdf -> Cell(20,10,$cantidad,1,0,'c');
    $mipdf -> Cell(40,10,$visible,1,0,'c');
//    $mipdf-> Ln(10);
    $mipdf ->Ln(10);
}
$mipdf -> Output();

?>