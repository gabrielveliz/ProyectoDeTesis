<?php

session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php"); 

$id=$_GET["op"];
include ("../include/coneccion.php");    
    $consulta = "select * from t_ubicacion join t_tipo_inmueble on t_ubicacion.tipo_inmueble = t_tipo_inmueble.id_tipo join comuna on t_ubicacion.ubicacion_comuna=comuna.COMUNA_ID join provincia on comuna.COMUNA_PROVINCIA_ID=provincia.PROVINCIA_ID join region on provincia.PROVINCIA_REGION_ID=region.REGION_ID where id_ubicacion=$id";
    $ejecuta = mysql_query($consulta,$coneccion); 
while ($rojo=mysql_fetch_array($ejecuta))
{
    $p2=$rojo["ubicacion_nombre"];
    $p4=$rojo["ubicacion_direccion"];
    $p5=$rojo["tipo_nombre"];
    $p6=$rojo["COMUNA_NOMBRE"];
    $p7=$rojo["PROVINCIA_NOMBRE"];
    $p8=$rojo["REGION_NOMBRE"];

    }


?>
<html>
<head>
    <title>INMUEBLES</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Editar</p></span>
    </div>

</head>
<body>
<br />
<div id="ingreso">
<caption>INGRESE DATOS INMUEBLE</caption>
<form name="uno" method="POST" action="editar2.php">
<p>
<input id="texto" type="hidden" value="<?php echo $id; ?>" name="ID"/>
Nombre : <input id="texto" name="nombre" value="<?php echo $p2;?>"  type="text" size="35" maxlength="35" />
</p>
<p>
Direccion : <input id="texto" name="direccion" value="<?php echo $p4;?>"  type="text" size="35" maxlength="35" />
</p>
<p>
Tipo : <?php echo $p5;?>
</p>
<p>
Comuna : <?php echo $p6;?>
</p>
<p>
Provincia : <?php echo $p7;?>
</p>
<p>
Region : <?php echo $p8;?>
</p>
<br />
<input id="bot" type="submit" value="Modificar"/>

</form>
</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>