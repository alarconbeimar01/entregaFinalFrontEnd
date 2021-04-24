<?php
	include( 'profile.php' );
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nuevo Cliente</title>
</head>

<body>
<div  class="login-main">
<h2 align="center">Generar Mensualidades </h2>
<form action="Validador/generarCobrarV.php" method="post" >
<div align="center">

<? 
$mes = date("m");
$ano = date("Y");
$integrado ="$mes de $ano";
echo " Generar cuentas de cobro correspondintes a : <br><span>
Mes $mes del año $ano</span>"?>
  
      <p>
      <input type="hidden" name="usuario" id="usuario" hidden="" value="<? echo $login_sessions ?>" />
      
        <input type="hidden" name="mes" id="mes" hidden="" value="<? echo $integrado ?>" />
      
      <input type="submit" name="generar" value="Generar" />
</div>
</form>
<div align="center">
  <?php

if (isset($_REQUEST['Mensaje']))
{

$mensaje = $_REQUEST['Mensaje'];


if($mensaje=="mensualidad1"){
	
	echo " <span> ¡ Mensualidades geberadas exitosamente !</span>";
	}
elseif($mensaje=="mensualidad2"){
	echo "<span> ¡Verifique, error al registrar!</span>";
}

}
?>
</div>
</div>

<div align="center"><br>
  <? echo '<a href="index.php"><h2>Regresar</h2></a>'; ?>
</div>
</body>
</html>