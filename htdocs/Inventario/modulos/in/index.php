<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
$tipo_usuario=$_SESSION['tipo'];
include ("../../conecta/check.php");
include ("../include/coneccion.php"); 

$condicion=true;


if(empty($_SESSION['ubi']))
{$id_ubi=$_GET["op"];
}


if (empty($id_ubi)) {
    $id_ubi=$_SESSION['ubi'];
}
if (empty($id_ubi)==false or $_SESSION['ubi']=0) {
    $_SESSION['ubi']=$id_ubi;
}

if(isset($_POST["buscar"]))
{

$buscar =$_POST["buscar"];

if ($buscar=="orden_nombre") 
{
    $consulta = "SELECT t_inventario.id_inventario,t_inventario.id_producto,producto.producto_nombre, t_plazas.plaza_nombre,t_inventario.stock, t_inventario.id_ubicacion,sum(stock) 'Stock' FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_ubicacion=$id_ubi  group by t_inventario.id_producto,t_inventario.id_ubicacion order by producto.producto_nombre ASC";
}
if ($buscar=="orden_plaza") 
{
    $consulta = "SELECT t_inventario.id_inventario,t_inventario.id_producto,producto.producto_nombre, t_plazas.plaza_nombre,t_inventario.stock, t_inventario.id_ubicacion,sum(stock) 'Stock' FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_ubicacion=$id_ubi  group by t_inventario.id_producto,t_inventario.id_ubicacion order by t_plazas.plaza_nombre ASC";
}
if ($buscar=="orden_stock") 
{
    $consulta = "SELECT t_inventario.id_inventario,t_inventario.id_producto,producto.producto_nombre, t_plazas.plaza_nombre,t_inventario.stock, t_inventario.id_ubicacion,sum(stock) 'Stock' FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_ubicacion=$id_ubi group by t_inventario.id_producto,t_inventario.id_ubicacion order by Stock ASC";
}
if ($buscar!=="orden_nombre" and $buscar!=="orden_plaza" and $buscar!=="orden_stock")
{ 
$consulta = "SELECT t_inventario.id_inventario,t_inventario.id_producto,producto.producto_nombre, t_plazas.plaza_nombre,t_inventario.stock, t_inventario.id_ubicacion,sum(stock) 'Stock' FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_ubicacion=$id_ubi and producto.producto_nombre like '%$buscar%' group by t_inventario.id_producto,t_inventario.id_ubicacion order by t_inventario.id_inventario ASC"; 
$condicion=false;
}


}

else
{
  $consulta = "SELECT t_inventario.id_inventario,t_inventario.id_producto,producto.producto_nombre, t_plazas.plaza_nombre,t_inventario.stock, t_inventario.id_ubicacion,sum(stock) 'Stock' FROM `t_inventario` join producto on t_inventario.id_producto=producto.id_producto join t_plazas on t_plazas.id_plaza = producto.id_plaza where t_inventario.id_ubicacion=$id_ubi group by t_inventario.id_producto,t_inventario.id_ubicacion order by t_inventario.id_inventario ASC";  
  $condicion=true;
}

       
    
    $ejecuta = mysql_query($consulta,$coneccion);   
?>

<html>
    <head>
    <title>Inventario</title>
    <style type="text/css">
        #col_iz{
            float: left;
            width: 65%;
        }
        #col_de{
            float: left;
            width: 35%;
        }
    </style>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Inventario</p></span>
    </div>
    </head>
    <body>
    <br/><br/> 
    <div id="listas">
        <table id="menu" width="100%" align="center">
            <tr>
                <?php
               if ($tipo_usuario==1 or $tipo_usuario==2) {
                 
               
               ?>
                <th><a href="cuenta.php">Agregar Nuevo</a></th>
                <?php
              }
               ?>
                <th><a href="excel.php">Listado Excel</a></th>
                <th><a href="word.php">Listado Word</a></th>
                <th><a href="pdf.php" target="_blank">Listado PDF</a></th>
                <th><a href="../../conecta/exit.php">Cerrar Sesion</a></th>
            </tr>
        </table>

      
<div id="col_iz">
<form name="uno" method="POST" action="index.php">
            <p>
Buscar nombre</td> <td><input id="texto" name="buscar" type="text" size="30" maxlength="30" required />
</p>
            
<input id="bot" type="submit" value="BUSCAR" />
<input id="bot" type="reset" value="BORRAR" />
</form>
</div>

<div id="col_de">
<form name="uno" method="POST" action="index.php">

<p>
<input type="radio" name="buscar" value="orden_nombre" > Nombre
</p>
<p>
<input type="radio" name="buscar" value="orden_plaza" >Plaza
</p>
<p>
<input type="radio" name="buscar" value="orden_stock" >Stock
</p>
<input id="bot" type="submit" value="ordenar"/>

</form>
</div>
  <center>
<?php if($condicion==false)
{
?>

<form name="uno"  action="index.php">
<input id="bot" type="submit" value="Mostrar todo"/>
</form>
<?php
}
?>

        <table id="lista" width="100%" align="center">
            <caption><h2>Listado</h2></caption>

            <thead>
                
                <tr>
                    
                    <th>Nombre</th>
                    <th>Plazas</th>
                    <th>Cantidad</th>
                     <?php
               if ($tipo_usuario==1 or $tipo_usuario==2) {
                 
               
               ?>
                    <th>Accion</th>
                    <th>Accion</th>
                    <th>Accion</th>

                    <?php
                  }
               ?>

                </tr>
            </thead>
            <tbody>
            <?php
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_inventario"] ;
                        $id2 = $row1["id_producto"] ;
                        echo "<tr>";                    
                            
                            echo "<td>$row1[producto_nombre]</td>";
                            echo "<td>$row1[plaza_nombre]</td>";
                           
                            echo "<td>$row1[Stock]</td>";
                            
               if ($tipo_usuario==1 or $tipo_usuario==2) {
                 
               
               
                            echo "<td><a href='ingresar.php?op=$id1'>Ingreso</a></td>";
                            echo "<td><a href='vender.php?op=$id1'>Salida</a></td>";
                            echo "<td><a href='editar.php?op=$id1'>Ver Mas</a></td>";
                            }

                        echo "</tr>";                    
                        }
            ?>
            </tbody>
        </table>
        </center>
<br/><br/>
        <center><a id="ce" href="../">REGRESAR</a></center>
        </div>
    </body>
