<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php"); 

$id=$_GET["op"];
include ("../include/coneccion.php");    
    $consulta = "select * from producto join t_plazas on producto.id_plaza=t_plazas.id_plaza join t_categoria on producto.id_categoria=t_categoria.id_categoria join t_proveedor on producto.id_proveedor=t_proveedor.id_proveedor where id_producto=$id order by producto_nombre ASC";
    $ejecuta = mysql_query($consulta,$coneccion); 
while ($rojo=mysql_fetch_array($ejecuta))
{
    $p2=$rojo["producto_nombre"];
    $p3=$rojo["plaza_nombre"];
    $p4=$rojo["categoria_nombre"];
    $p5=$rojo["proveedor_nombre"];
    
    }


?>
<html>
<head>
    <title>Cuentas</title>
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
<caption>EDITAR DATOS</caption>
<form name="uno" method="POST" action="editar2.php">
<p>
<input type="hidden" value="<?php echo $id; ?>" name="ID"/>
Usuario<input name="nom" value="<?php echo $p2;?>"  type="text" size="35" maxlength="35" required />
</p>
<p>
Dimensiones
<?php echo $p3;?>
</p>
<p>
Categoria
<?php echo $p4;?>
</p>
<p>
Proveedor
<?php echo $p5;?>
</p>
<input id="bot" type="submit" value="Enviar"/>

</form>
</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>