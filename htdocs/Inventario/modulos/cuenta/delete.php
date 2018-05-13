<?php
$id = $_GET["op"];

    include ("../include/coneccion.php");    
    $consulta = "delete from t_us where id_usuario = $id";

    $ejecuta = mysql_query($consulta,$coneccion);  
    
    header('Location: index.php');
     

?>