<?php
session_start();

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

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


header("content-disposition: attachment;filename=Inventario ".$p1.".xls");


$fecha= date("d") . "/" . date("m") . "/" . date("Y");

?>
<html>
    <head>
    <title>Inventario</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Inventario <?php echo $p1 ?></p></span>
<p>Fecha <?php echo $fecha ?></p>
    </div>
    </head>
    <body>
 
    <div id="listas">

       <center> <table id="lista" width="100%" align="center">
            <caption><h2>Listado</h2></caption>
            <thead>
                <tr>
                    
                    <th>Nombre</th>
                    <th>Plazas</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_inventario"] ;
                        $id2 = $row1["id_producto"] ;
                        echo "<tr>";                    
                            
                            echo "<td>$row1[producto_nombre]</td>";
                            echo "<td>$row1[plaza_nombre]</td>";
                           
                            echo "<td>$row1[Stock]</td>";



                        echo "</tr>";                    
                        }
            ?>
            </tbody>
        </table>
        </center>
        </div>
    </body>
