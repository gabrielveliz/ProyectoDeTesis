<?php

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=Informe_inventario.doc");
session_start();

include ("../../conecta/check.php");

    include ("../include/coneccion.php");    
    $consulta = "select entrada.id_in,t_ubicacion.ubicacion_nombre,producto.producto_nombre, sum(costo) 'costo',sum(cantidad) 'cantidad' from entrada join t_inventario on t_inventario.id_inventario=entrada.id_inventario join producto on producto.id_producto=t_inventario.id_producto join t_ubicacion on t_ubicacion.id_ubicacion=t_inventario.id_ubicacion group by t_ubicacion.ubicacion_nombre,producto.producto_nombre;";
    $ejecuta = mysql_query($consulta,$coneccion);  

        $consulta2 = "  select salida.id_sal,t_ubicacion.ubicacion_nombre,producto.producto_nombre, sum(costo) 'costo',sum(cantidad) 'cantidad' from salida join t_inventario on t_inventario.id_inventario=salida.id_inventario join producto on producto.id_producto=t_inventario.id_producto join t_ubicacion on t_ubicacion.id_ubicacion=t_inventario.id_ubicacion group by t_ubicacion.ubicacion_nombre,producto.producto_nombre;";
    $ejecuta2 = mysql_query($consulta2,$coneccion);  

?>

<html>
    <head>
    <title>Informes</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body>

    <div id="listas">

        <center> 
        <table id="lista" width="100%" align="center">
            <caption><h2>Informe de existencias</h2></caption>


            <tbody>

<tr>
    <th>Tipo de Documento:</th>
    <td>Informe de valuacion de existencias</td>
</tr>
<?php $fecha= date("d") . "/" . date("m") . "/" . date("Y"); ?>
<tr>
    <th>Fecha:</th>
    <td><?php echo $fecha; ?></td>
</tr>
<tr>
    <th>Departamento:</th>
    <td>Departamento de Logistica</td>
</tr>
<tr>
    <th>Empresa:</th>
    <td>Muebles Veliz</td>
</tr>
<tr>
    <th>Dirigido a:</th>
    <td>Gerencia</td>
</tr>
<tr>
    <th></th>
</tr>

</tbody>
        </table>
<p>El presente informe tiene como objetivo mostrar la gestion dentro del departamento de logistica y entregar informacion que permita apoyar a la toma de decisiones de la empresa Muebles Veliz.</p>

            <table id="lista" width="100%" align="center">
           


            <tbody>

<tr>
    <th>Fuente:</th>
    <td>Sistema de inventario</td>
</tr>



</tbody>
        </table>


</div>
        </center>

  <center> <table id="lista" width="100%" align="center">
            <caption><h2>Entrada</h2></caption>
            <thead>
                <tr>
                    
                    <th>Local</th>
                    <th>Producto</th>
                    <th>Costo (CLP)</th>
                    <th>Cantidad</th>

                </tr>
            </thead>
            <tbody>
            <?php
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_in"] ;
                        echo "<tr>";                    
                            
                            echo "<td>$row1[ubicacion_nombre]</td>";
                            echo "<td>$row1[producto_nombre]</td>";
                            echo "<td>$ $row1[costo]</td>";
                            echo "<td>$row1[cantidad] UN</td>";


                        echo "</tr>";                    
                        }
            ?>
            </tbody>
        </table>
        </center>
          <center> <table id="lista" width="100%" align="center">
            <caption><h2>Salida</h2></caption>
            <thead>
                <tr>
                    
                    <th>Local</th>
                    <th>Producto</th>
                    <th>Costo (CLP)</th>
                    <th>Cantidad</th>

                </tr>
            </thead>
            <tbody>
            <?php
                $a2=0;
                while ($row2=mysql_fetch_array($ejecuta2))
                    {
                        $a2=$a2+1;
                        $id2 = $row2["id_sal"] ;
                        echo "<tr>";                    
                            
                            echo "<td>$row2[ubicacion_nombre]</td>";
                            echo "<td>$row2[producto_nombre]</td>";
                            echo "<td>$ $row2[costo]</td>";
                            echo "<td>$row2[cantidad] UN</td>";


                        echo "</tr>";                    
                        }
            ?>
            </tbody>
        </table>
        </center>


    </body>
