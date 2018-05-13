<html>
<head>
	<title>Emulando</title>
	<style type="text/css">
	#memoria,#memoria2
		{
			
			width: 99%;
			margin: 2px;
			float: left;
			border:1px solid #AAAAAA;
			border-radius: 10px;
			text-align: center;
			

		}
		#memoria2
		{
		background-color: #76FF03;
		}
		#memoria
		{
		background-color: #E0F2F1;
		}
		#columna1
		{
			width: 30%;
			float:left;
		}
		#columna2
		{
			width: 60%;
			float: left;
		    padding: 5%;
		}
</style>
</head>
<body>
<div id="columna1">
<?php
$memoria=$_POST["memo"];
$bloque1=$_POST["bloque1"];;
$bloque2=$_POST["bloque2"];;
$bloque3=$_POST["bloque3"];;
$sumablo=$bloque1+$bloque2+$bloque3;
$bloque4=$memoria-$sumablo;
$suma=$bloque1+$bloque2+$bloque3+$bloque4;
$instruccion1=$_POST["instruccion1"];
$instruccion2=$_POST["instruccion2"];
$instruccion3=$_POST["instruccion3"];
$instruccion4=$_POST["instruccion4"];
$co1=0;
$co2=0;
$co3=0;
$co4=0;
$ocupado1=0;
$ocupado2=0;
$ocupado3=0;
$ocupado4=0;
$aux1=0;
$aux2=0;
$aux3=0;
$aux4=0;
if ( ($sumablo<=$memoria) && ($instruccion1>0) && ($instruccion2>0) && ($instruccion3>0) && ($instruccion4>0) && ($bloque1>0) && ($bloque2>0) && ($bloque3>0) && ($bloque4>0) && ($memoria>0)) {



if (($instruccion1<=$bloque1)&&($co1==0)&&($ocupado1==0)) {
$aux1=$instruccion1;	
$co1=1;
$ocupado1=1;
$i1='<p>La instruccion 1 ingreso en el bloque 1</p>';
}
if (($instruccion1<=$bloque2)&&($co1==0)&&($ocupado2==0)) {
$aux2=$instruccion1;
$co1=1;
$ocupado2=1;
$i1='<p>La instruccion 1 ingreso en el bloque 2</p>';
}
if (($instruccion1<=$bloque3)&&($co1==0)&&($ocupado3==0)) {
$aux3=$instruccion1;
$co1=1;
$ocupado3=1;
$i1='<p>La instruccion 1 ingreso en el bloque 3</p>';
}
if (($instruccion1<=$bloque4)&&($co1==0)&&($ocupado4==0)) {
$aux4=$instruccion1;
$co1=1;
$ocupado1=1;
$i1='<p>La instruccion 1 ingreso en el bloque 4</p>';
}
/*---Fin Validacion primera instruccion--*/

if (($instruccion2<=$bloque1)&&($co2==0)&&($ocupado1==0)) {
$aux1=$instruccion2;	
$co2=1;
$ocupado1=1;
$i2='<p>La instruccion 2 ingreso en el bloque 1</p>';
}
if (($instruccion2<=$bloque2)&&($co2==0)&&($ocupado2==0)) {
$aux2=$instruccion2;
$co2=1;
$ocupado2=1;
$i2='<p>La instruccion 2 ingreso en el bloque 2</p>';
}
if (($instruccion2<=$bloque3)&&($co2==0)&&($ocupado3==0)) {
$aux3=$instruccion2;
$co2=1;
$ocupado3=1;
$i2='<p>La instruccion 2 ingreso en el bloque 3</p>';
}
if (($instruccion2<=$bloque4)&&($co2==0)&&($ocupado4==0)) {
$aux4=$instruccion2;
$co2=1;
$ocupado4=1;
$i2='<p>La instruccion 2 ingreso en el bloque 4</p>';
}
/*---Fin Validacion segunda instruccion--*/

if (($instruccion3<=$bloque1)&&($co3==0)&&($ocupado1==0)) {
$aux1=$instruccion3;	
$co3=1;
$ocupado1=1;
$i3='<p>La instruccion 3 ingreso en el bloque 1</p>';
}
if (($instruccion3<=$bloque2)&&($co3==0)&&($ocupado2==0)) {
$aux2=$instruccion3;
$co3=1;
$ocupado2=1;
$i3='<p>La instruccion 3 ingreso en el bloque 2</p>';
}
if (($instruccion3<=$bloque3)&&($co3==0)&&($ocupado3==0)) {
$aux3=$instruccion3;
$co3=1;
$ocupado3=1;
$i3='<p>La instruccion 3 ingreso en el bloque 3</p>';
}
if (($instruccion3<=$bloque4)&&($co3==0)&&($ocupado4==0)) {
$aux4=$instruccion3;
$co3=1;
$ocupado4=1;
$i3='<p>La instruccion 3 ingreso en el bloque 4</p>';
}

/*---Fin Validacion tercera instruccion--*/


if (($instruccion4<=$bloque1)&&($co4==0)&&($ocupado1==0)) {
$aux1=$instruccion4;	
$co4=1;
$ocupado1=1;
$i4='<p>La instruccion 4 ingreso en el bloque 1</p>';
}
if (($instruccion4<=$bloque2)&&($co4==0)&&($ocupado2==0)) {
$aux2=$instruccion4;
$co4=1;
$ocupado2=1;
$i4='<p>La instruccion 4 ingreso en el bloque 2</p>';
}
if (($instruccion4<=$bloque3)&&($co4==0)&&($ocupado3==0)) {
$aux3=$instruccion4;
$co4=1;
$ocupado3=1;
$i4='<p>La instruccion 4 ingreso en el bloque 3</p>';
}
if (($instruccion4<=$bloque4)&&($co4==0)&&($ocupado4==0)) {
$aux4=$instruccion4;
$co4=1;
$ocupado4=1;
$i4='<p>La instruccion 4 ingreso en el bloque 4</p>';
}

/*---Fin Validacion cuarta instruccion--*/
?><h1>Bloque 1 de memoria</h1>
<?php

for ($i=1; $i <=$bloque1 ; $i++) { 
	 if ($i<=$aux1) {
    	echo('<div id="memoria2">'.$i.'</div>');
    }
    if ($i>$aux1)
    {  
   echo('<div id="memoria">'.$i.'</div>');
    }
}
?><h1>Bloque 2 de memoria</h1>
<?php
for ($i=1; $i <=$bloque2 ; $i++) { 
    	 if ($i<=$aux2) {
    	echo('<div id="memoria2">'.$i.'</div>');
    }
    if ($i>$aux2)
    {  
   echo('<div id="memoria">'.$i.'</div>');
    }
}
?><h1>Bloque 3 de memoria</h1>
<?php
for ($i=1; $i <=$bloque3 ; $i++) { 
	 	 if ($i<=$aux3) {
    	echo('<div id="memoria2">'.$i.'</div>');
    }
    if ($i>$aux3)
    {  
   echo('<div id="memoria">'.$i.'</div>');
    }
}
?><h1>Bloque 4 de memoria</h1>
<?php
for ($i=1; $i <=$bloque4 ; $i++) { 
	 	 if ($i<=$aux4) {
    	echo('<div id="memoria2">'.$i.'</div>');
    }
    if ($i>$aux4)
    {  
   echo('<div id="memoria">'.$i.'</div>');
    }
}
?>
</div>
<div id="columna2">
<?php
echo '<h1>Datos sobre la emulacion</h1>';
echo '<h2>Tama&ntilde;o de los bloques</h2>';
echo '<p>El bloque 1 tiene :'.$bloque1.'KB de memoria</p>';
echo '<p>El bloque 2 tiene :'.$bloque2.'KB de memoria</p>';
echo '<p>El bloque 3 tiene :'.$bloque3.'KB de memoria</p>';
echo '<p>El bloque 4 tiene :'.$bloque4.'KB de memoria</p>';
echo '<h2>Tama&ntilde;o del buffer</h2>';
echo '<p>La memoria total del buffer es :'.$memoria.'KB de memoria</p>';
echo '<h2>Tama&ntilde;o de las instrucciones</h2>';
echo '<p>La instruccion 1 pesa :'.$instruccion1.'KB de memoria</p>';
echo '<p>La instruccion 2 pesa :'.$instruccion2.'KB de memoria</p>';
echo '<p>La instruccion 3 pesa :'.$instruccion3.'KB de memoria</p>';
echo '<p>La instruccion 4 pesa :'.$instruccion4.'KB de memoria</p>';
echo '<h2>Localizacion de las instrucciones</h2>';
if ($co1==1) {
echo $i1;
}
if ($co2==1) {
echo $i2;
}
if ($co3==1) {
echo $i3;
}
if ($co4==1) {
echo $i4;
}
if(($ocupado1==0)&&($ocupado2==0)&&($ocupado3==0)&&($ocupado4==0))
{echo '<p>Las instrucciones no pudieron ingresar a los bloques</p>';
}
echo '<h2>Instrucciones que no ingresaron a ningun bloque</h2>';



if ($co1==0) {
echo '<p>La instruccion 1 no se pudo ejecutar</p>';
}
if ($co2==0) {
echo '<p>La instruccion 2 no se pudo ejecutar</p>';
}
if ($co3==0) {
echo '<p>La instruccion 3 no se pudo ejecutar</p>';
}
if ($co4==0) {
echo '<p>La instruccion 4 no se pudo ejecutar</p>';
}
if(($co1==1)&&($co2==1)&&($co3==1)&&($co4==1))
{echo '<p>No hay instrucciones</p>';
}
echo '<h2>Bloques de memoria no utilizados</h2>';
if ($ocupado1==0) {
	echo '<p>El bloque 1 no se utilizo</p>';
}

if ($ocupado2==0) {
	echo '<p>El bloque 2 no se utilizo</p>';
}

if ($ocupado3==0) {
	echo '<p>El bloque 3 no se utilizo</p>';
}

if ($ocupado4==0) {
	echo '<p>El bloque 4 no se utilizo</p>';
}

if(($ocupado1==1)&&($ocupado2==1)&&($ocupado3==1)&&($ocupado4==1))
{echo '<p>No hay bloques sin utilizar</p>';
}

echo '<h1><a href="index.php">Regresar a la pagina principal</a></h1>';
}
else{
echo '<p>Los datos ingresados no son validos</p>';
echo '<p>por favor ingrese solo numeros que sean mayores que 0 y que la suma de los bloques no sean mayor a la memoria del buffer</p>';
echo '<a href="index.php">Regresar a la pagina principal</a>';
}
?>

</div>
</body>
</html>

