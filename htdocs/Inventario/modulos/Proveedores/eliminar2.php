<?php
$id = $_POST["ID"];

    include ("../include/coneccion.php");    
    $consulta = "delete from t_proveedor where id_proveedor = $id";

    $ejecuta = mysql_query($consulta,$coneccion);  
    
   header('Location: index.php');
     

?>