<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php"); 

$id=$_GET["op"];
include ("../include/coneccion.php");    
    $consulta = "select * from t_proveedor where id_proveedor=$id";
    $ejecuta = mysql_query($consulta,$coneccion); 
while ($rojo=mysql_fetch_array($ejecuta))
{
    $p2=$rojo["proveedor_nombre"];
    $p4=$rojo["proveedor_descripcion"];
    
    }
    ?>
<html>
<head>
    <title>Proveedor</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Eliminar</p></span>
    </div>

</head>
<body>
<br />
<div id="ingreso">
<caption>¿Desea Eliminar Este Registro?</caption>
<form name="uno" method="POST" action="eliminar2.php">
<input type="hidden" value="<?php echo $id; ?>" name="ID"/>
<p>Nombre : 
<?php echo $p2;?>
</p>
<p>Descripcion: 
<?php echo $p4;?>
</p>
<br/>
<p>Si elimina este registro estara eliminando toda la informacion enlazada a el, productos, inventarios, etc...</p>
<input id="bot" type="submit" value="Eliminar"/>

</form>
</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>