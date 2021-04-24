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
<title>Info Cliente</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <h2 class=" main_tible">Info de Cliente</h2>
		  <section class="main__container">


  
<?php

$ref=$_POST['idCliente'];	


include("Modelo/conectaDb.php");


$sql ="CALL INFOCLIENTE('$ref')";

$respuesta = mysqli_query($conexion, $sql);

?>

<div align="left">
  <table width="95%" border="1">
    <tr>
      <?php
$filas = mysqli_fetch_array($respuesta);
	$nombre =$filas['nombre'];
	$documento = $filas['cc'];
	$estadoCliente = $filas['estado'];
	$identificacion = $filas['identificacion'];
	$plan = $filas['plan'];
	$estadoPlan = $filas['estadoPlan'];
	$registro = $filas['fechaRegistro'];
	$ciudad = $filas['ciudad'];
	$direccion = $filas['direccion'];
	$telefono = $filas['telefono']; 
	$idUsuario = $login_sessions;
	$priUsuario = $login_sessionPrivilegios;
	
?>
      
      <th scope="row"><div align="left">CC ó Nit</div></th>
      <td><div align="left"><?php echo $documento?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Nombre</div></th>
      <td><div align="left"><?php echo $nombre?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Plan</div></th>
      <td><div align="left"><?php echo $plan?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Ciudad</div></th>
      <td><div align="left"><?php echo $ciudad?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Dirección</div></th>
      <td><div align="left"><?php echo $direccion ?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Teléfono</div></th>
      <td><div align="left"><?php echo $telefono?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Fecha </div></th>
      <td><?php echo $registro?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Estado</div></th>
      <td><div align="left">
        <?php 
	if($estadoPlan ==3){
		echo "Pendiente de Instalación";	
	}
	elseif($estadoPlan == 1){
		echo "Activo";	
	}
	elseif( $estadoPlan== 2){
	echo "Inactivo";	
	}
	
	?>
      </div></td>
    </tr>
    
      </table>
  <div align="center"></div>
  <div align="center"></div>
        <?php
	  if($priUsuario==1 || $priUsuario==2 && $estadoPlan ==3 ){
      
      ?>
      </div>
       
        
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