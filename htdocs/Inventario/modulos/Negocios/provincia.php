<?php
include ("../include/coneccion.php");
 //Obtenemos el valor del evento GET que pusimos en JQuery
 $idregion = $_GET['idregion'];


 //Hacemos nuestra consulta MySQL.
$consulta2 = "SELECT * FROM provincia where PROVINCIA_REGION_ID=$idregion order by PROVINCIA_NOMBRE asc";

$ejecuta2 = mysql_query($consulta2,$coneccion);
?>

<option>Seleccionar Provincia</option>
         <?php 
                $a2=0;
                while ($row2=mysql_fetch_array($ejecuta2))
                    {
                        $a2=$a2+1;
                        $id2 = $row2["PROVINCIA_ID"] ;
                            echo "<option value='$id2'>$row2[PROVINCIA_NOMBRE]</option>";                
                        }
                        
            ?>
