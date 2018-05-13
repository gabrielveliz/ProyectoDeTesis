<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php"); 

$id=$_GET["op"];
include ("../include/coneccion.php");    
$consulta = "SELECT t_inventario.id_inventario,producto.producto_nombre, t_plazas.plaza_nombre,t_inventario.stock FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_inventario=$id order by producto.producto_nombre ASC";
    $ejecuta = mysql_query($consulta,$coneccion); 
while ($rojo=mysql_fetch_array($ejecuta))
{
    $p1=$rojo["producto_nombre"];
    $p2=$rojo["plaza_nombre"];
    $p3=$rojo["stock"];     
}
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
<span><p>Ingresar</p></span>
    </div>

</head>
<body>

<br />
<div id="ingreso">
<caption>Datos del Producto</caption>
<form name="uno" method="POST" action="ingreso2.php">
<input type="hidden" value="<?php echo $id; ?>" name="ID"/>
<input type="hidden" value="<?php echo $p3; ?>" name="cantidad"/>
<?php
echo "<p> Nombre : ".$p1."</p>";
echo "<p> Plazas : ".$p2."</p>";
echo "<p> Cantidad : ".$p3."</p>";
?>
<p>
Cantidad que Entra</td> <td><input id="texto" name="ingreso"  type="text" size="11" maxlength="10"  required/>
</p>
<p>
Costo unitario</td> <td><input id="texto" name="costo"  type="text" size="11" maxlength="10"  required/>
</p>

<input id="bot" type="submit" value="Enviar"/>

</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>