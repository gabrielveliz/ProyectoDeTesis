<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php"); 

$id=$_GET["op"];
include ("../include/coneccion.php");    
    $consulta = "select * from t_ubicacion join t_tipo_inmueble on t_ubicacion.tipo_inmueble=t_tipo_inmueble.id_tipo where t_ubicacion.id_ubicacion= $id order by id_ubicacion ASC";;
    $ejecuta = mysql_query($consulta,$coneccion); 
    
    $consulta2="select * from t_inventario join t_ubicacion on t_inventario.id_ubicacion=t_ubicacion.id_ubicacion join producto on producto.id_producto=t_inventario.id_producto join t_plazas on producto.id_plaza=t_plazas.id_plaza where t_ubicacion.id_ubicacion=$id";
    $ejecuta2 = mysql_query($consulta2,$coneccion); 

while ($rojo=mysql_fetch_array($ejecuta))
{
    $p2=$rojo["ubicacion_nombre"];
    $p3=$rojo["ubicacion_direccion"];
    $p4=$rojo["tipo_nombre"];
    $p5=$rojo["tipo_descripcion"];
}

     

?>
<html>
<head>
    <title>Eliminar Inmueble</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>ELIMINAR REGISTRO</p></span>
    </div>
</head>
<body>
<br />
<div id="ingreso">

<form name="uno" method="POST" action="eliminar2.php">
<input type="hidden" value="<?php echo $id; ?>" name="ID"/>
<h2>Informacion del inmueble</h2>
<p>
Nombre :
<?php echo $p2;?>
</p>
<p>
Direccion :
<?php echo $p3;?>
</p>
<p>
Tipo :
<?php echo $p4;?>
</p>
<p>
Descripcion :
<?php echo $p5;?>
</p>
<br/>
<h2>Informacion de Existencias en inventario</h2>
<?php
                $a12=0;
                while ($row12=mysql_fetch_array($ejecuta2))
                    {
                        $a12=$a12+1;
                        $id12 = $row12["id_producto"] ;
                        echo "<tr>";                    
                            
                            echo "<p>Producto:  $row12[producto_nombre] $row12[plaza_nombre]</p>";
                            echo "<p>Stock:  $row12[stock]</p>";
                           
                            
                            echo "<br/>";

                        }
                if (empty($id12)) {
                	echo "<p>No hay informacion de este producto en inventario</p>";
                	echo "<br/>";
                }
            ?>
<h2>¿Seguro desea eliminar este registro?</h2>
<p>Si elimina este registro se eliminara toda informacion referente al Inmueble y su respectivo Inventario</p>
<br/>


<input id="ce" type="submit"  value="SI, Estoy Seguro"/>
<a id="ce" href="index.php">NO, Prefiero Volver</a>
	</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>