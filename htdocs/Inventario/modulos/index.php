<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
$tra= $_SESSION['trabajador'];
$tipo_usuario=$_SESSION['tipo'];
$_SESSION['ubi']=0;
include ("../conecta/check.php");

    include ("include/coneccion.php");    
    $consulta = "select * from t_ubicacion order by id_ubicacion ";
    $ejecuta = mysql_query($consulta,$coneccion);   

?>
<html>
    <head><title>Muebles Veliz</title>
    <link rel="icon" type="image/png" href="../assets/img/icono.png" />
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body> 
        <div>
          <img id="lo" src="../img/logo.png">
       </div>

       <div id="bienvenida">
    <?php

    echo "<center><span><p>Bienvenido/a ".strtoupper($tra)." </p> </span></center>";
    ?>
    </div>
<div class="panel">
<center>
 

       <table  id="panel">

       <span><h2>Inventario</h2></span>
       <tr>
                <td><a href="tienda_virtual/">Tienda Virtual</a></td>
               </tr>
       <?php
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_ubicacion"] ;
                        echo "<tr>";                    

                            echo "<td><a href='in/index.php?op=$id1'>$row1[ubicacion_nombre]</a></td>";

                        echo "</tr>";                    
                        }
            ?>
            
            </table>
            
            <table  id="panel">
              <?php
               if ($tipo_usuario==1 or $tipo_usuario==2) {
                 
               
               ?>
            <span><h2>Administracion</h2></span>
            
              <tr>
                <td><a href="Productos/">Productos</a></td>
               </tr>
               <tr>
                <td><a href="Proveedores/">Proveedores</a></td>
               </tr>
               <tr>
                <td><a href="informes/">Informes</a></td>
               </tr>
               <?php
               if ($tipo_usuario==1) {
                 
               
               ?>
                <tr>
                <td><a href="Negocios/">Negocios</a></td>
               </tr>
               <tr>
                <td><a href="cuenta/">Cuentas de Usuarios</a></td>
               </tr>
               <?php
                  }}
               ?>
               
               
             
                
                

                <tr>
                <td id="cerrar"><a href="../conecta/exit.php">Cerrar Sesion</a></td>
               </tr>

        </table>
        </center>

        </div>
    </body>
</html>