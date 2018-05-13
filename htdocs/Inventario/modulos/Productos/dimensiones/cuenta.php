<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php");
include ("../include/coneccion.php");


$consulta = "SELECT * FROM t_plazas order by plaza_nombre asc";
$ejecuta = mysql_query($consulta,$coneccion);

$consulta2 = "SELECT * FROM t_categoria order by categoria_nombre asc";
$ejecuta2 = mysql_query($consulta2,$coneccion);

$consulta3 = "SELECT * FROM t_proveedor order by proveedor_nombre asc";
$ejecuta3 = mysql_query($consulta3,$coneccion);


?>


<html>
<head>
    <script type="text/javascript" src="../../js/vendor/jquery-3.2.1.min.js"></script>
    <title>Cuentas</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Productos</p></span>
    </div>

</head>
<body>
<br />
<div id="ingreso">

<caption>Ingrese Datos</caption>
<form method="POST" action="doscue.php">
<p>
Nombre</td> <td><input id="texto" name="nom" type="text" size="10" maxlength="35" required/>
</p>
<br />

<p>
Dimensiones
<select name='plaza' id="texto" >
    <option value="0">Seleccionar Dimensiones</option>
 <?php
                $a0=0;
                while ($row0=mysql_fetch_array($ejecuta))
                    {
                        $a0=$a0+1;
                        $id0 = $row0["id_plaza"] ;
                            echo "<option value='$id0'>$row0[plaza_nombre]</option>";                
                        }
                        
            ?>
            </select>
            
            
</p>

<br/>
</select>
<p>Categoria
<select name='categoria' id="texto">
    <option value="0">Seleccionar Categoria</option>
 <?php
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta2))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_categoria"] ;
                            echo "<option value='$id1'>$row1[categoria_nombre]</option>";                
                        }
                        
            ?>
            </select>
            
            
</p>

<br/>
</select>

<p>Proveedor
<select name='proveedor' id="texto">
<option value="0">Seleccionar Proveedor</option>
 <?php
                $a2=0;
                while ($row2=mysql_fetch_array($ejecuta3))
                    {
                        $a2=$a2+1;
                        $id2 = $row2["id_proveedor"] ;
                            echo "<option value='$id2'>$row2[proveedor_nombre]</option>";                
                        }
                        
            ?>

            </select>
            
            
</p>

<br/>
</select>


<input id="bot" type="reset" value="Borrar"/>
<input id="bot" type="submit" value="Enviar"/>

</form>
</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>

</body>
</html>

