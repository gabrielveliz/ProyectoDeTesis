
    <?php

    $id = $_POST["ID"];
    include ("../include/coneccion.php"); 

    $eliminar = "delete from producto where id_producto = $id";
    $eliminar2 = "delete from t_inventario where id_producto = $id";

    $ejecutar_eliminar = mysql_query($eliminar,$coneccion); 
    $ejecutar_eliminar2 = mysql_query($eliminar2,$coneccion);  
    
    header('Location: index.php');
    ?>