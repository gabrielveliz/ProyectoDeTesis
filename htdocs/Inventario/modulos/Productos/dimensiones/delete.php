<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php"); 

$id=$_GET["op"];
include ("../include/coneccion.php");    
    $consulta = "select * from producto join t_plazas on producto.id_plaza=t_plazas.id_plaza join t_categoria on producto.id_categoria=t_categoria.id_categoria join t_proveedor on producto.id_proveedor=t_proveedor.id_proveedor where id_producto=$id order by producto_nombre ASC";
    $ejecuta = mysql_query($consulta,$coneccion); 
    
    $consulta2="select * from t_inventario join t_ubicacion on t_inventario.id_ubicacion=t_ubicacion.id_ubicacion where id_producto=$id";
    $ejecuta2 = mysql_query($consulta2,$coneccion); 

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
<span><p>ELIMINAR REGISTRO</p></span>
    </div>
</head>
<body>
<br />
<div id="ingreso">

<form name="uno" method="POST" action="eliminar2.php">
<input type="hidden" value="<?php echo $id; ?>" name="ID"/>
<h2>Informacion del Producto</h2>
<p>
Nombre :
<?php echo $p2;?>
</p>
<p>
Dimensiones :
<?php echo $p3;?>
</p>
<p>
Categoria :
<?php echo $p4;?>
</p>
<p>
Proveedor :
<?php echo $p5;?>
</p>
<br/>
<h2>Informacion de Existencias en inventario</h2>
<?php
                $a12=0;
                while ($row12=mysql_fetch_array($ejecuta2))
                    {
                        $a12=$a12+1;
                        $id12 = $row12["id_inventario"] ;
                        echo "<tr>";                    
                            
                            echo "<p>Inventario:  $row12[ubicacion_nombre]</p>";
                           
                            echo "<p>Stock: $row12[stock]</p>";
                            echo "<br/>";

                        }
                if (empty($id12)) {
                	echo "<p>No hay informacion de este producto en inventario</p>";
                	echo "<br/>";
                }
            ?>
<h2>¿Seguro desea eliminar este registro?</h2>
<p>Si elimina este registro se eliminara toda informacion referente al producto y su respectivo inventario</p>
<br/>


<input id="ce" type="submit"  value="SI, Estoy Seguro"/>
<a id="ce" href="index.php">NO, Prefiero Volver</a>
	</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>