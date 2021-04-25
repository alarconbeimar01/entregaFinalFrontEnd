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
		  <section class="main__container">
<?php

$idUsuario = $login_sessions;


include("Modelo/conectaDb.php");


$sql ="CALL VER_USUARIO('$idUsuario')";


$respuesta = mysqli_query($conexion, $sql);
$filas = mysqli_fetch_array($respuesta);

	$ref =$filas['ref'];
	$nombre = $filas['nombre'];
	$pass = $filas['pass'];
	$idUsuario = $login_sessions;
	$priUsuario = $login_sessionPrivilegios;

  ?>
 
 
  

  
  
  <h4 align="center">Cambio de Contraseña</h4>
  <div align="center"></div>
	
<form action="#" method="post" class="login-main">
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
      <th scope="row">Contraseña Anterior</th>
      <td><input type="password" name="anterior" id="anterior" ></td>
      </tr>
    <tr>
      <th scope="row">Nueva Contraseña</th>
      <td><input type="password" name="nueva" id="nueva" ></td>
    </tr>
    <tr>
      <th scope="row">Confirmar Nueva  Contraseña</th>
      <td><input type="password" name="confirmar" id="confirmar" ></td>
      </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="actualizar" id="actualizar" value="Cambiar Contraseña">
       </th>
    </tr>
  </table>
  <p>
    <?php
  
if (isset($_REQUEST['anterior'])&&($_REQUEST['nueva'])&&($_REQUEST['confirmar']))
{
	include("Modelo/conectaDbAux.php");
	$original = $pass;
	$anterior =crypt($_POST['anterior'],"Beimar");
	$nueva =crypt($_POST['nueva'],"Beimar");
	$confirmar =crypt($_POST['confirmar'],"Beimar");
	$usu = $idUsuario;
	
	
if($original==$anterior){
	
		
	if($nueva==$confirmar){
				
		
		
$sql2 ="CALL `ACTUALIZAR_PASS`('$usu','$confirmar')";

mysqli_query($conexionAux, $sql2);
	
$registrado2 = mysqli_affected_rows($conexionAux);



if($registrado2 == 1){
	
	echo "Contraseña cambiada con exito";
	
	
}
elseif($registrado2 == 0){
echo "error al cambiar la contraseña";	
}
	
		
	}
	else{
		echo "Nueva contraseña y confirmación deben ser iguales";
	}
	
	}else{
	echo "Contraseña Anterior erronea";	
	}

}
?>
  </p>
 </div>


</form>
<br>

</section>

</section>
<?php
  
include("footer.html");

?>
</body>

	</html>