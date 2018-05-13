<?php
session_start();

include ("../../../conecta/check.php");

    include ("../../include/coneccion.php");    
    $consulta = "select * from t_plaza order by plaza_nombre ASC";
    $ejecuta = mysql_query($consulta,$coneccion);   

?>

<html>
    <head>
    <title>Cuentas</title>
            <link rel="icon" type="image/png" href="../../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Productos</p></span>
    </div>
    </head>
    <body>
    <br/><br/> 
    <div id="listas">
        <table id="menu" width="100%" align="center">
            <tr>
                <th><a href="cuenta.php">Agregar Dimension</a></th>
                <th><a href="../../../conecta/exit.php">Cerrar Sesion</a></th>
            </tr>
        </table>

        <br/>
        
        <center> <table id="lista" width="100%" align="center">



<tr><th><caption>Ingrese Datos</caption></th></tr>
<form method="POST" action="doscue.php">
<tr>
<th><p>
Nombre</td> <td><input id="texto" name="nom" type="text" size="10" maxlength="35" required/>
</p></th>
<th><p>
Nombre</td> <td><input id="texto" name="nom" type="text" size="10" maxlength="35" required/>
</p></th>
<th><p>
Nombre</td> <td><input id="texto" name="nom" type="text" size="10" maxlength="35" required/>
</p></th>

<tr>
<input id="bot" type="reset" value="Borrar"/>
<input id="bot" type="submit" value="Enviar"/>
</tr>
</tr>
</form>
            <caption>LISTADO DE PRODUCTOS</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
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
                        $id1 = $row1["id_producto"] ;
                        echo "<tr>";                    
                            echo ("<td>$row1[id_producto]</td>");
                            echo ("<td>$row1[producto_nombre]"." - "."$row1[plaza_nombre]</td>");
                            echo ("<td>$row1[categoria_nombre]</td>");
                            echo ("<td>$row1[proveedor_nombre]</td>");
                            echo "<td><a href='editar.php?op=$id1'>EDITAR</a></td>";
                            echo "<td><a href='delete.php?op=$id1'>SUPRIMIR</a></td>";

                            
                        echo "</tr>";                    
                        }
            ?>
            
            </tbody>

        </table>
        </center>
<br/>


<br/><br/>
        <center><a id="ce" href="../">REGRESAR</a></center>
        </div>
    </body>
