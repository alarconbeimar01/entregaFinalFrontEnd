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
<title>Generador de cuentas de cobro</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <section class="main__container--Gc">


  <h2 class=" main_tible">Generar Mensualidades</h2>
<p>
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
      
      <input class="button" type="submit" name="generar" value="Generar" />
</div>
</form>
			  </p>
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

</section>

</section>
<?php
  
include("footer.html");

?>
</body>
</html>