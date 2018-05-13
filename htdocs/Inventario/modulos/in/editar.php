<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
$ubi=$_SESSION['ubi'];
include ("../../conecta/check.php"); 

$id=$_GET["op"];
include ("../include/coneccion.php");    
    $consulta = "SELECT t_inventario.id_inventario,producto.producto_nombre, t_plazas.plaza_nombre,t_inventario.stock FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_inventario=$id order by producto.producto_nombre ASC";
    $ejecuta = mysql_query($consulta,$coneccion); 

    $consulta_entra = "SELECT * FROM  entrada where id_inventario=$id order by id_in desc";

    $ejecuta_entra = mysql_query($consulta_entra,$coneccion); 

    $consulta_sale = "SELECT * FROM  salida where id_inventario=$id order by id_sal desc";
    $ejecuta_sale = mysql_query($consulta_sale,$coneccion); 

while ($rojo=mysql_fetch_array($ejecuta))
{
    $p1=$rojo["producto_nombre"];
    $p2=$rojo["plaza_nombre"];

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
<span><p>Editar</p></span>
    </div>

</head>
<body>

<br />
<div id="ingreso">
<h2><caption>Producto</caption></h2>
<form name="uno" method="POST" action="editar2.php">
<input type="hidden" value="<?echo $id; ?>" name="ID"/>
<p>
<?php echo $p1." ".$p2;?>
</p>

 <?php
 echo "<br/>";
                echo "<h2>Historial Entrada</h2>";
           
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta_entra))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_in"] ;                  
                            
                            echo "<p>Cantidad Ingresada $row1[cantidad]</p>";
                           
                            echo "<p>Hora y Fecha $row1[Hora] ";
                                 
                            echo "$row1[Fecha] </p>";
                                 echo "<br/>";        
                        }
                        if (empty($id1)) {
                     echo "Sin informacion"; 
                     echo "<br/>";
                }
                echo "<h2>Historial Salida</h2>";
                
                $a2=0;
                while ($row2=mysql_fetch_array($ejecuta_sale))
                    {
                        $a2=$a2+1;
                        $id2 = $row2["id_inventario"] ;                  
                            
                            echo "<p>Cantidad Salida $row2[cantidad]</p>";
                            echo "<p>Hora y Fecha $row2[Hora] ";
                           
                            echo "$row2[Fecha]</P>";
                                 echo "<br/>";           
                        }
                        if (empty($id2)) {
                     echo "Sin informacion"; 
                }
            ?>

</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>
