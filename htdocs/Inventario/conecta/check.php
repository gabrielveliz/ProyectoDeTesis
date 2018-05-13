<?php

if (isset($_SESSION['nombre']))
    {
        $nombre=$_SESSION['nombre'];

    } 
    else
    {  
        header("location:../");
    }

?>