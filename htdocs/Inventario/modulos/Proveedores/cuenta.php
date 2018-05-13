<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php");

?>


<html>
<head>
    <title>Proveedor</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Proveedor</p></span>
    </div>

</head>
<body>
<br />
<div id="ingreso">

<caption>Ingrese Datos</caption>
<form method="POST" action="doscue.php">
<p>
Nombre</td> <td><input id="texto" name="nombre" type="text" size="10" maxlength="35" required="" />
</p>
<br />
<p>
Descripcion</td><td><input id="texto" name="descripcion" type="text" size="10" maxlength="150" required="" />
</p>
<br />
<br />
<input id="bot" type="reset" value="Borrar"/>
<input id="bot" type="submit" value="Enviar"/>

</form>
</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
</body>
</html>

