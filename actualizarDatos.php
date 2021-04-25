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
<title>Listado Cliente</title>
</head>
	<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
          <h4 align="center">Modificar Datos de Usuario</h4>
		  <section class="main__container">
<?php

$idUsuario = $login_sessions;


include("Modelo/conectaDb.php");


$sql ="CALL VER_USUARIO('$idUsuario')";


$respuesta = mysqli_query($conexion, $sql);
$filas = mysqli_fetch_array($respuesta);

    $ref =$filas['ref'];
	$nombre = $filas['nombre'];
	$telefono = $filas['telefono'];
	$correo  = $filas['correo'];
	$pass = $filas['pass'];
	$idUsuario = $login_sessions;
	$priUsuario = $login_sessionPrivilegios;

  ?>
 
 
  

  
  
  
  <div align="center"></div>
	
<form action="Validador/actualizarDatosV.php" method="post" class="login-main">
 <div align="center">
  
   
  <table width="auto%" border="1">
    <tr>
      <th scope="row">Usuario</th>
      <td>
        <?php echo $nombre?>
        <input type="hidden" name="idUsuarior" id="idUsuarior" value="<?php echo $ref?>">
        </td>
      </tr>
    <tr>
      <th scope="row">E-mail</th>
      <td><input class="input" type="email" name="email" id="email" value="<?php echo $correo?>"></td>
      </tr>
    <tr>
      <th scope="row">Telefono</th>
      <td><input class="input" type="number" name="telefono" id="telefono" value="<?php echo $telefono?>"></td>
      </tr>
    <tr>
      <th colspan="2" scope="row"><input class="button" type="submit" name="actualizar" id="actualizar" value="Actualizar">
        <?
if (isset($_REQUEST['Actualizacion']))
{

$mensaje = $_REQUEST['Actualizacion'];


if($mensaje=='Actualizado'){
	
	echo " <span> ¡ Sus datos fueron actualizados exitosamente !</span>";
	}
elseif($mensaje=='SinCambios'){
	echo "<span> ¡Verifique, no hubo cambios!</span>";
}
elseif($mensaje=='Error'){
	echo "<span> ¡Verifique, error al actualizar!</span>";
}

}
?></th>
    </tr>
  </table>
 </div>


</form>

      
   
</section>
<input  class="button" type="button" value="Cambiar Contraseña" onClick="location.href='changepass.php'">
</section>
<?php
  
include("footer.html");

?>
	</body>

	</html>