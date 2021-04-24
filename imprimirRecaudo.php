<?php
include('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pago Recibo Internet</title>
</head>

<body onload="print()">
<div align="center">
  <?
if (isset($_REQUEST['recaudo'])&& isset($_REQUEST['seguridad']))
{
$consecutivo = $_REQUEST['recaudo'];
$encriptado = $_REQUEST['seguridad'];



include("Modelo/conectaDb.php");


$sql ="CALL IMPRIMIRPAGO('$consecutivo')";

$respuesta = mysqli_query($conexion, $sql);

$filas = mysqli_fetch_array($respuesta);
	$nombreUsuario = $filas['nombreUsuario'];
	$cobro =$filas['cobro'];
	$fecha = $filas['fecha'];
	$mes = $filas['mes'];
	$valor = $filas['valor'];
	$nombre = $filas['nombre'];
	$cc = $filas['cc'];
	$ciudad = $filas['ciudad'];
	$direccion = $filas['direccion'];
	
	
$registrado = mysqli_affected_rows($conexion); // filas afectadas
echo $registrado;
	?>
  <table width="auto%" border="0">
    <tr>
      <td><h3 align="center">Servicio de internet.</h3></td>
    </tr>
    <tr>
      <td><div align="center">Recibo Nº : <? echo $cobro ?></div></td>
    </tr>
    <tr>
      <td><div align="center">Periodo: <? echo $mes ?></div></td>
    </tr>
    <tr>
      <td><div align="center">fecha: <? echo $fecha ?></div></td>
    </tr>
    <tr>
      <td><div align="center">Cajero :<? echo $nombreUsuario ?></div></td>
    </tr>
    <tr>
      <td><div align="center">+==========+</div></td>
    </tr>
    <tr>
      <td><div align="center">CC ó Nit : <? echo $cc ?></div></td>
    </tr>
    <tr>
      <td><div align="center">Nombre : <? echo $nombre ?></div></td>
    </tr>
    <tr>
      <td><div align="center">Ciudad: <? echo $ciudad ?></div></td>
    </tr>
    <tr>
      <td><div align="center">Direccion : <? echo $direccion ?></div></td>
    </tr>
    <tr>
      <td><div align="center">
        <h2>Valor: <? echo number_format($valor) ?></h2>
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Servicio al cliente : 318 798 7165</div></td>
    </tr>
  </table>
</div>

<? } ?>
<div align="center"><br>
  <? echo '<a href="index.php"><h2>Regresar</h2></a>'; ?>
</div>
</body>
</html>