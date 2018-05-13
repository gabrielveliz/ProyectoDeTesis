<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
</head>
<body>
<style type="text/css">
body
{
	background-color: #E3F2FD;

}
	div
	{
		width: 30%;
		float: left;
		border: 1px solid black;
		padding: 2%;
		border-radius: 10px;
		margin: 1%;
		background-color: white;
	}
</style>
<h1>Metodo del primer ajuste</h1>
<h2>(por favor llene los datos solo con numeros)</h2>
<form action="index2.php" method="POST">

<div>
<p>Memoria del Buffer</p>
	<input type="text" name="memo" placeholder="Cantidad de Memoria" required="">
	<p>Primer bloque de memoria</p>
	<input type="text" name="bloque1" placeholder="Bloque 1" required="">
	<p>Segundo bloque de memoria</p>
	<input type="text" name="bloque2" placeholder="Bloque 2" required="">
	<p>Tercer bloque de memoria</p>
	<input type="text" name="bloque3" placeholder="Bloque 3" required="">
	<p>Cuarto bloque de memoria</p>
	<p>Este bloque sera la memoria no utilizada por lo otros bloques</p>
</div>
<div>
	<p>Instruccion 1</p>
	<input type="text" name="instruccion1" placeholder="Instruccion 1" required="">
	<p>Instruccion 2</p>
	<input type="text" name="instruccion2" placeholder="Instruccion 2" required="">
	<p>Instruccion 3</p>
	<input type="text" name="instruccion3" placeholder="Instruccion 3" required="">
	<p>Instruccion 4</p>
	<input type="text" name="instruccion4" placeholder="Instruccion 4" required="">
    <p>Debe llenar todos los campos</p>
	<input type="submit" value="Iniciar Emulacion">
</div>
	
</form>
</body>
</html>