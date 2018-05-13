<?php
$nombre = $_POST["nom"];
$plaza = $_POST["plaza"];
$categoria = $_POST["categoria"];
$proveedor = $_POST["proveedor"];


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
<?php

if($plaza==0 or $categoria==0 or $proveedor==0)
{

		echo "<p>No es posible insertar los datos, debe completar todos los campos</p>";

?>

</div>
<br />        <center><a id="ce" href="cuenta.php">REGRESAR</a></center>

</body>
</html>
<?php

}

if($plaza>0 or $categoria>0 or $proveedor>0)
{
include ("../include/coneccion.php");

$consulta = "insert into producto (producto_nombre,id_plaza,id_categoria,id_proveedor) values('$nombre',$plaza,$categoria,$proveedor);";

$ejecuta_consulta=mysql_query($consulta,$coneccion);  

header("Location:index.php");
}
?>
