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
<title>Info de plan</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <h2 class=" main_tible">Info de plan </h2>
		  <section class="main__container">
<?php

$ref=$_POST['ref'];



include("Modelo/conectaDb.php");


$sql ="$verPlan('$ref')";


$respuesta = mysqli_query($conexion, $sql);
$filas = mysqli_fetch_array($respuesta);

	$idRef =$filas['idRef'];
	$nombre = $filas['nombre'];
	$valor = $filas['valor'];
	$priUsuario =$login_sessionPrivilegios;
	
?>
<?php
	  if($priUsuario==1){
	  ?>

      <form action="Validador/actualizarPlan.php" method="post" name="actualizarUsuario">
      <table width="95%" border="1">
  
  <tr>
    <th scope="row">Nombre :</th>
    <td><input class="input_buscar" type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" /></td>
  </tr>
  <tr>
    <th scope="row">Valor :</th>
    <td><input class="input_buscar" type="number" name="valor" id="valor" value="<?php echo $valor?>" />
    
    <input type="hidden" name="ref" id="ref" value="<?php echo $idRef?>" hidden="" />
	</td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><input class="button" type="submit" name="actualizar" value="Actualizar"></th>
  </tr>
</table>
</form>

        
    <?php
	  }
	  ?>    

</section>

</section>
<?php
  
include("footer.html");

?>
</body>
</html>