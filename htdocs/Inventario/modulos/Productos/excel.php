<?php
session_start();

include ("../include/coneccion.php");    
    $consulta = "select * from producto join t_plazas on producto.id_plaza=t_plazas.id_plaza join t_categoria on producto.id_categoria=t_categoria.id_categoria join t_proveedor on producto.id_proveedor=t_proveedor.id_proveedor order by producto_nombre ASC";
    $ejecuta = mysql_query($consulta,$coneccion);     


header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


header("content-disposition: attachment;filename=Productos.xls");


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
<span><p>Productos</p></span>
<p>Fecha <?php echo $fecha ?></p>
    </div>
    </head>
    <body>
 
    <div id="listas">

       <center> <table id="lista" width="100%" align="center">
            <caption><h2>Listado</h2></caption>
            <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_producto"] ;
                        echo "<tr>";                    
                            echo ("<td>$row1[id_producto]</td>");
                            echo ("<td>$row1[producto_nombre]"." - "."$row1[plaza_nombre]</td>");
                            echo ("<td>$row1[categoria_nombre]</td>");
                            echo ("<td>$row1[proveedor_nombre]</td>");
                           

                            
                        echo "</tr>";                    
                        }
            ?>
            </tbody>
        </table>
        </center>
        </div>
    </body>
