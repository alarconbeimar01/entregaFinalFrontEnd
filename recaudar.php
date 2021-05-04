<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/styles1.css">
	<link rel="stylesheet" href="css/menu.css">
<title>Recaudar</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <h2 class=" main_tible" align="center">Recaudar</h2>
		  <section class="main__container--tablas">


  
<h2 class=" main_tible" align="center">Ingrese Documento</h2>
<form action="#" method="post" name="vercliente">
<div align="center">
  
      <input class="input_buscar" type="number"  name="doc" id="doc" required="required" placeholder="CC ó Nit" />
	<p></p>
    <input class="button" type="submit" name="submit" value="Buscar" />
    
  </form>
</div>
<p align="center"><?php

if (isset($_REQUEST['doc']))
{

$doc = $_REQUEST['doc'];




include("Modelo/conectaDb.php");


$sql ="CALL DOCUMENTO('$doc')";

$respuesta = mysqli_query($conexion, $sql);

$filas = mysqli_fetch_array($respuesta);

	$idRecaudo =$filas['idRecaudo'];
	$mes = $filas['mes'];
	$valor = $filas['valor'];
	$plan = $filas['plan'];
	$cc = $filas['cc'];
	$nombre = $filas['nombre'];
	$ciudad = $filas['ciudad'];
	$dir = $filas['dir'];
	$refCliente = $filas['refCliente'];
	
	
$registrado = mysqli_affected_rows($conexion); // filas afectadas

	?>
<div align="center">
<h2 style="color:red"><? echo "Recaudo correspondiente al mes $mes" ?></h2>
 <table style="border-radius: 10px; border: 2px solid #081C8F">
  <tr >
    <th class="azul" scope="row">Documento:</th>
    <td><? echo $cc ?></td>
  </tr>
  <tr>
    <th scope="row">Nombre: </th>
    <td><? echo $nombre ?></td>
  </tr>
  <tr>
    <th scope="row">Ciudad:</th>
    <td><? echo $ciudad ?></td>
  </tr>
  <tr>
    <th scope="row">Dirección</th>
    <td><? echo $dir ?></td>
  </tr>
  <tr>
    <th scope="row">Plan:</th>
    <td><? echo $plan ?></td>
  </tr>
  <tr>
    <th scope="row">Valor :</th>
    <td style="background: red; border-radius: 8px;"><? echo number_format($valor) ?></td>
  </tr>
</table>
<form action="Validador/recaudarV.php" method="post" name="recaudar" onSubmit="return preguntarRecaudar()">

<input type="hidden" hidden="" name="refCliente" id="refCliente" value="<? echo $refCliente ?>" />

<input type="hidden" hidden="" name="cobro" id="cobro" value="<? echo $idRecaudo ?>" />
<input type="hidden" hidden="" name="usuario" id="usuario" value="<? echo $login_sessions ?>" />
<input type="submit"  class="button" name="boton" id="boton" value="Recaudar" />
</form>
 </div>

 <?
}
?>


		  </section>

</section>
<?php
  
include("footer.html");

?>
</body>
</html>