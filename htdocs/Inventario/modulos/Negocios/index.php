<?php
session_start();

include ("../../conecta/check.php");

    include ("../include/coneccion.php");    
    $consulta = "select * from t_ubicacion join t_tipo_inmueble on t_ubicacion.tipo_inmueble=t_tipo_inmueble.id_tipo order by id_ubicacion ASC";
    $ejecuta = mysql_query($consulta,$coneccion);   

    $consulta2 = "select * from t_tipo_inmueble order by id_tipo ASC";
    $ejecuta2 = mysql_query($consulta2,$coneccion);   
?>

<html>
    <head>
    <title>Inmuebles</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Inmuebles</p></span>
    </div>
    </head>
    <body>
    <br/><br/> 
    <div id="listas">
        <table id="menu" width="100%" align="center">
            <tr>
                <th><a href="cuenta.php">Agregar Inmuebles</a></th>

                <th><a href="../../conecta/exit.php">Cerrar Sesion</a></th>
            </tr>
        </table>
        <br/><br/><br/>
        
        <center> <table id="lista" width="100%" align="center">
            <caption>LISTADO DE INMUEBLES</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Tipo</th>
                    <th>Accion</th>
                    <th>Accion</th>

                </tr>
            </thead>
            <tbody>
            <?php
            
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_ubicacion"] ;
                        echo "<tr>";                    
                            echo ("<td>$row1[id_ubicacion]</td>");
                            echo ("<td>$row1[ubicacion_nombre]</td>");
                            echo ("<td>$row1[ubicacion_direccion]</td>");
                            echo ("<td>$row1[tipo_nombre]</td>");
                            echo "<td><a href='editar.php?op=$id1'>EDITAR</a></td>";
                            echo "<td><a href='delete.php?op=$id1'>SUPRIMIR</a></td>";

                            
                        echo "</tr>";                    
                        }
            ?>
            
            </tbody>

        </table>
        </center>
<br/>
 <center> <table id="lista" width="100%" align="center">
 <caption>LISTADO DE TIPOS DE INMUEBLES</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>

                </tr>
            </thead>
            <tbody>
            <?php
            
                $a2=0;
                while ($row2=mysql_fetch_array($ejecuta2))
                    {
                        $a2=$a2+1;
                        $id2 = $row2["id_tipo"] ;
                        echo "<tr>";                    
                            echo ("<td>-</td>");
                            echo ("<td>$row2[tipo_nombre]</td>");
                            echo ("<td>$row2[tipo_descripcion]</td>");
                            
                        echo "</tr>";                    
                        }
            ?>
            
            </tbody>
            </table>
        </center>

<br/><br/>
        <center><a id="ce" href="../">REGRESAR</a></center>
        </div>
    </body>
