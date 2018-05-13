<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php"); 

$id=$_GET["op"];
include ("../include/coneccion_prestashop.php");    
    $consulta = "select ps_product_lang.id_product ,ps_product_lang.name , ps_stock_available.quantity, indexed from ps_product_lang join ps_stock_available on ps_product_lang.id_product= ps_stock_available.id_product join ps_product on ps_product_lang.id_product= ps_product.id_product where ps_product_lang.id_product=$id  order by name ASC";
    $ejecuta = mysql_query($consulta,$coneccion); 
while ($rojo=mysql_fetch_array($ejecuta))
{
    $p2=$rojo["name"];
    $p3=$rojo["quantity"];
    
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
Producto<input name="nombre" value="<?php echo $p2;?>"  type="text" size="35" maxlength="35" required />
</p>
<p>
Stock<input name="stock" value="<?php echo $p3;?>"  type="text" size="35" maxlength="35" required />
</p>
<input id="bot" type="submit" value="Enviar"/>

</form>
</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>