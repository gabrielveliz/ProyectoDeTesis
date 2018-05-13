<?php

    session_start();
    include ("conecta.php");
    $cuenta= $_POST['cu'];
    $contrasena= $_POST['pas'];
 
    $logueo= mysql_query("SELECT *  FROM t_us WHERE us_nom = '$cuenta' AND us_pass = '$contrasena'",$conecta);

    
    if($reg=mysql_fetch_array($logueo))
        {
         $_SESSION['nombre']=$reg['us_nom'];
         $_SESSION['tipo']=$reg['id_tipo_usuario'];
         $_SESSION['trabajador']=$reg['us_nombre_trabajador'];
         
            echo"<script>location.href='../modulos/';</script>";
        }
    
    
    else
        {
         echo"<script>alert('usuario o clave incorrectos');</script>";
            echo"<script>location.href='../../inventario';</script>";

         
        }

?>