<?php
include ("../include/coneccion.php");
 //Obtenemos el valor del evento GET que pusimos en JQuery
 $idcomuna = $_GET['idcomuna'];


 //Hacemos nuestra consulta MySQL.
$consulta3 = "SELECT * FROM comuna where COMUNA_PROVINCIA_ID=$idcomuna order by COMUNA_NOMBRE asc";

$ejecuta3 = mysql_query($consulta3,$coneccion);
?>
<option>Seleccionar Comuna</option>
         <?php 
                $a3=0;
                while ($row3=mysql_fetch_array($ejecuta3))
                    {
                        $a3=$a3+1;
                        $id3 = $row3["COMUNA_ID"] ;
                            echo "<option value='$id3'>$row3[COMUNA_NOMBRE]</option>";                
                        }
                        
            ?>
