<?php
session_start();
$nombreusuario= $_SESSION['nombre'];
include ("../../conecta/check.php");
include ("../include/coneccion.php");

$consulta0 = "SELECT * FROM t_tipo_inmueble order by tipo_nombre asc";
$ejecuta0 = mysql_query($consulta0,$coneccion);

$consulta = "SELECT * FROM region order by REGION_NOMBRE asc";
$ejecuta = mysql_query($consulta,$coneccion);
?>


<html>
<head>
    <script type="text/javascript" src="../../js/vendor/jquery-3.2.1.min.js"></script>
    <title>Cuentas</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Inmuebles</p></span>
    </div>

</head>
<body>
<br />
<div id="ingreso">

<caption>Ingrese Datos</caption>
<form method="POST" action="doscue.php">
<p>
Nombre</td> <td><input id="texto" name="nom" type="text" size="10" maxlength="35" />
</p>
<br />
<p>
Direccion</td><td><input id="texto" name="dir" type="text" size="10" maxlength="150"/>
</p>
<br />

<p>
Tipo de Inmueble
<select name='inmueble' id="texto" class="inmueble">
    <option>Seleccionar tipo de Inmueble</option>
 <?php
                $a0=0;
                while ($row0=mysql_fetch_array($ejecuta0))
                    {
                        $a0=$a0+1;
                        $id0 = $row0["id_tipo"] ;
                            echo "<option value='$id0'>$row0[tipo_nombre]</option>";                
                        }
                        
            ?>
            </select>
            
            
</p>

<br/>
</select>
<p>Region
<select name='region' id="texto" class="region">
    <option>Seleccionar Region</option>
 <?php
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["REGION_ID"] ;
                            echo "<option value='$id1'>$row1[REGION_NOMBRE]</option>";                
                        }
                        
            ?>
            </select>
            
            
</p>

<br/>
</select>

<p>Provincia
<select name='provincia' id="texto" class="provincia">
<option>Seleccionar Provincia</option>


            </select>
            
            
</p>

<br/>
</select>
<p>Comuna
<select name='Comuna' id="texto" class="Comuna">
<option>Seleccionar Comuna</option>


            </select>
            
            
</p>

<br/>
</select>

<input id="bot" type="reset" value="Borrar"/>
<input id="bot" type="submit" value="Enviar"/>

</form>
</div>
<br />        <center><a id="ce" href="index.php">REGRESAR</a></center>
<script type="text/javascript">
   
    $(document).ready(function(){
 $(".region").change(function(){ //Evento que se activa cuando selecciono el ID de institución
      var region=$(this).val(); //Obtenemos el valor de region

//Envio a una página que hara la consulta SQL y me devolvera los datos
$.get("provincia.php?idregion="+region,
           function(data){
                $(".provincia").html(data); //Le decimos donde queremos mostrar el resultado que se hara en la pagina.
           });
 });
});

    $(document).ready(function(){
 $(".provincia").change(function(){ //Evento que se activa cuando selecciono el ID de institución
      var comuna=$(this).val(); //Obtenemos el valor de region

//Envio a una página que hara la consulta SQL y me devolvera los datos
$.get("comuna.php?idcomuna="+comuna,
           function(data){
                $(".comuna").html(data); //Le decimos donde queremos mostrar el resultado que se hara en la pagina.
           });
 });
});
</script>
</body>
</html>

