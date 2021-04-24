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
<title>Listado de usuarios</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <h2 class=" main_tible">Listado de usuarios</h2>
		  <section class="main__container">


  
  <?php
  
include("Modelo/conectaDb.php");


$sql ="CALL LISTARUSUARIOS()";

$respuesta = mysqli_query($conexion, $sql);
?>

  
</p>

<table width="95%" border="1">


  <tr>
      <th scope="col"><div align="center">Usuario</div></th>
    <th scope="col"><div align="center">Rol</div></th>
    <th scope="col"><div align="center">Estado</div></th>
    <th scope="col"><div align="center"></div></th>
  </tr>
  <?php
while($filas = mysqli_fetch_array($respuesta)){
	$nombre =$filas['nombre'];
	$rol = $filas['rol'];
	$estado = $filas['estado'];
	$identificacion = $filas['identificacion'];
	$idUsuario = $login_sessions;
	$priUsuario = $login_sessionPrivilegios;
	if($estado==1){
		$refEstado="Activo";
	}
	elseif($estado==2){
		$refEstado="Bloqueado";		
	}
	
	
	
	if($rol==0){
		$refRol="Sin Definir";
	}
	elseif($rol==2){
		$refRol="Técnico";		
	}
	elseif($rol==1){
		$refRol="Admin";		
	}
	elseif($rol==3){
		$refRol="Recaudo";		
	}
		?>
  <tr>
    <td><div align="center"><?php echo "$nombre"?></div></td>
    <td><div align="center"><?php echo $refRol?></div></td>
    <td><div align="center"><?php echo $refEstado;?></div></td>
    <td><div align="center">
    <form action="verUsuario.php" method="post" name="vercliente">
    <input type="hidden" hidden="" value="<?php echo $identificacion;?>" name="idUsuario" id="idUsuario" />
    <input class="button" type="submit" name="enviar" id="enviar" value="Ver" />
    </form>
    
    </div></td>
  </tr>
  <?php    
}
?>
</table>

</div>
</div>
  </section>

</section>
<?php
  
include("footer.html");

?>
</body>

</html>