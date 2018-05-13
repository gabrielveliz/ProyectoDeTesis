<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php");
include ("../include/coneccion.php");

$consulta = "SELECT * FROM producto join t_plazas on producto.id_plaza = t_plazas.id_plaza;";
$ejecuta = mysql_query($consulta,$coneccion);

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
<span><p>Inventario</p></span>
    </div>

</head>
<body>
<hr />

<hr />
<br />
<div id="ingreso">
<h2>Nueva Existencia</h2>
<br />
<form name="uno" method="POST" action="doscue.php">
<p>Producto
<select name='producto' id="texto">
 <?php
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_producto"] ;
                            echo "<option value='$id1'>$row1[producto_nombre]"." "."$row1[plaza_nombre]</option>";                
                        }
                        
            ?>
            </select>
            
            
</p>

<br/>
</select>

<p>
Cantidad</td> <td><input id="texto" name="cant" type="text" size="10" maxlength="10" required />
</p>
<br />
<p>
Costo</td> <td><input id="texto" name="costo" type="text" size="10" maxlength="10" required />
</p>
<br />

<p>
<br/>
<input id="bot" type="reset" value="Borrar"/>
<input id="bot" type="submit" value="Enviar"/>
</p>
</form>
</div>

<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>

