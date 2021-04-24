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
<title>Datos Usuario</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <h2 class=" main_tible">Info Usuario</h2>
		  <section class="main__container">


  
<?php

$ref=$_POST['idUsuario'];



include("Modelo/conectaDb.php");


$sql ="$verUsuario('$ref')";


$respuesta = mysqli_query($conexion, $sql);
$filas = mysqli_fetch_array($respuesta);

	$identificacion =$filas['identificacion'];
	$usu = $filas['usu'];
	$telefono = $filas['telefono'];
	$correo = $filas['correo'];
	$rol = $filas['rol'];
	$estado = $filas['estado'];
	$idUsuario = $login_sessions;
	$priUsuario = $login_sessionPrivilegios;
?>

<div align="left">
  <table width="95%" border="1">
    <tr>
      <th scope="row"><div align="left">Usuario</div></th>
      <td><div align="left"><?php echo $usu?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Teléfono</div></th>
      <td><div align="left"><?php echo $telefono?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">e-mail</div></th>
      <td><div align="left"><?php echo $correo?></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Perfil</div></th>
      <td><div align="left">
        <?php
	
	if($rol==1){
		$permisos="Admin";
	}
	elseif($rol==3){
		$permisos="Recaudo";
	}
	elseif($rol==2){
		$permisos ="Técnico";
		
	}
	else{
		$permisos="Sin definir";
	}
	echo $permisos;
	
	?>
	</div></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Estado</div></th>
      <td><div align="left">
        
          <?php
	
	if($estado==1){
		$estados="Activo";
	}
	else {
		$estados="Bloqueado";
	}
 echo $estados?></option>
          
      </div></td>
    </tr>
    
      </table>
      <?php
	  if($priUsuario==1){
	  ?>
      <br>
      <form action="Validador/actualizarUsuario.php" method="post" name="actualizarUsuario">
      <table width="95%" border="1">
  <tr>
    <th colspan="2" scope="row">Actualizar Datos</th>
    </tr>
  <tr>
    <th scope="row">Teléfono:</th>
    <td><input class="input" type="text" name="telefono" id="telefono" value="<?php echo $telefono?>" /></td>
  </tr>
  <tr>
    <th scope="row">e-mail :</th>
    <td><input class="input" type="text" name="mail" id="mail" value="<?php echo $correo?>" />
	</td>
  </tr>
  <tr>
    <th scope="row">Perfil :</th>
    <td><select class="input" name="rol" id="rol">
        <?php
	
	if($rol==1){
		$permisos="Admin";
	}
	elseif($rol==3){
		$permisos="Recaudo";
	}
	elseif($rol==2){
		$permisos ="Técnico";
		
	}
	else{
		$permisos="Sin definir";
	}
	?>
        <option value="<?php echo $rol?>"><?php echo $permisos?></option>
        <option value="2">Técnico</option>
        <option value="1">Admin</option>
        <option value="3">Recaudo</option>
        
        </select></td>
  </tr>
  <tr>
    <th scope="row">Estado:</th>
    <td><select class="input" name="estado" id="estado">
          <?php
	
	if($estado==1){
		$estados="Activo";
	}
	else {
		$estados="Bloqueado";
	}
	?>
          <option value="<?php echo $estado?>"><?php echo $estados?></option>
          <option value="1">Activo</option>
          <option value="2">Bloqueado</option>
        </select>
        <input type="hidden" hidden="" name="idUsuario" id="idUsuario" value="<? echo $identificacion ?>" />
        
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

  </div>       
      </section>

</section>
<?php
  
include("footer.html");

?>
</body>
</html>