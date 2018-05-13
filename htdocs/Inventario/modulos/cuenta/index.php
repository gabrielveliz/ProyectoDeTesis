<?php
session_start();

include ("../../conecta/check.php");

    include ("../include/coneccion.php");    
    $consulta = "select * from t_us join t_tipo_usuario on t_us.id_tipo_usuario=t_tipo_usuario.id_tipo_usuario order by id_usuario ASC";
    $consulta2 = "select * from t_tipo_usuario order by id_tipo_usuario ASC";

    $ejecuta = mysql_query($consulta,$coneccion);   
    $ejecuta2 = mysql_query($consulta2,$coneccion);   
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cuentas</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Cuentas de Usuario</p></span>
    </div>
    </head>
    <body>
    <br/><br/> 
    <div id="listas">
        <table id="menu" width="100%" align="center">
            <tr>
                <th><a href="cuenta.php">Agregar Cuenta</a></th>

                <th><a href="../../conecta/exit.php">Cerrar Sesion</a></th>
            </tr>
        </table>
        <br/><br/><br/>
        
        <center> <table id="lista" width="100%" align="center">
            <caption>LISTADO DE CUENTAS</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Trabajador</th>
                    <th>Tipo de Usuario</th>
                    <th>Accion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_usuario"] ;
                        echo "<tr>";                    
                            echo ("<td>$row1[id_usuario]</td>");
                            echo ("<td>$row1[us_nom]</td>");
                            echo ("<td>$row1[us_nombre_trabajador]</td>");
                            echo ("<td>$row1[tipo_nombre]</td>");

                            if($row1['id_usuario']==1)
                                {echo "<td>-</td>";
                                 echo "<td>-</td>";}

                            if($row1['id_usuario']>1)
                            {
                            echo "<td><a href='editar.php?op=$id1'>EDITAR</a></td>";
                            echo "<td><a href='delete.php?op=$id1'>SUPRIMIR</a></td>";
                            }

                            
                        echo "</tr>";                    
                        }
            ?>
            
            </tbody>
        </table>

                </table>
        <br/><br/><br/>
        
        <center> <table id="lista" width="100%" align="center">
            <caption>LISTADO TIPOS DE CUENTAS</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Permiso Cuentas</th>
                    <th>Permiso Inventario</th>
                   
                </tr>
            </thead>
            <tbody>
            <?php
            
                $a2=0;
                while ($row2=mysql_fetch_array($ejecuta2))
                    {
                        $a2=$a2+1;
                        $id2 = $row2["id_tipo_usuario"] ;
                        echo "<tr>";                    
                            echo ("<td>$row2[id_tipo_usuario]</td>");
                            echo ("<td>$row2[tipo_nombre]</td>");
                            $pcue=$row2['Permiso_administracion_cuentas'];
                            
                            if($pcue==1)
                            {
                              echo ("<td>SI</td>");  
                            }
                            if($pcue==2)
                            {
                              echo ("<td style='color:red;'>NO</td>");  
                            }
                            
                            $pcue=$row2['Permiso_administracion_inventario'];
                           
                            if($pcue==1)
                            {
                              echo ("<td>SI</td>");  
                            }
                            if($pcue==2)
                            {
                              echo ("<td style='color:red;'>NO</td>");  
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
