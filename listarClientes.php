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
		  <h2 class=" main_tible">Listado de Cliente</h2>
		  <section class="main__container">


  

<form action="#" method="post" name="buscador">
<div align="center">
  <div align="center">
    <div align="center">
      <div align="center">
        <input class="input" placeholder="CC ó Nit " type="number" name="buscar" id="buscar" required>
        <input class="button" type="submit" name="enviar" value="Buscar">
      </div>
</form>
      <br />
      <div class="login-main">
      
      <?php
  
include("Modelo/conectaDb.php");

if (isset($_REQUEST['buscar']))
{
	$cli =$_POST['buscar'];
	$sql ="CALL LISTARCLIENTE($cli)";
}
else{

$sql ="CALL LISTARCLIENTES()";
}
$respuesta = mysqli_query($conexion, $sql);
?>
      
      
      </p>
      
      <table width="95%" border="1">
      
      
      
      
    </div>
<tr>
  <th scope="col"><div align="center">Nombre</div></th>
    <th scope="col"><div align="center">Documento</div></th>
    <th scope="col"><div align="center">Estado</div></th>
    <th scope="col"><div align="center"></div></th>
</tr>
  <?php
while($filas = mysqli_fetch_array($respuesta)){
	$nombre =$filas['nombre'];
	$documento = $filas['cc'];
	$estado = $filas['estado'];
	$identificacion = $filas['identificacion'];
	$idUsuario = $login_sessions;
	$priUsuario = $login_sessionPrivilegios;
	
	if($estado==3){
		$estado1="Pendiente";
		$color = "blue";
	}
	elseif($estado==2){
		$estado1="Inactivo";		
	}
	elseif($estado==1){
		$estado1="Activo";
		$color = "green";		
	}
	elseif($estado==4){
		$estado1="Suspendido";	
		$color = "red";	
	}
		?>
  <tr>
    <td><div align="center"><?php echo "$nombre"?></div></td>
    <td><div align="center"><?php echo $documento;?></div></td>
    <td><div align="center" style="color:<?php echo $color;?>"><?php echo $estado1;?></div></td>
    <td><div align="center">
<form action="verCliente.php" method="post" name="vercliente">
    <input type="hidden" hidden="" value="<?php echo $identificacion;?>" name="idCliente" id="idCliente" />
    <input class="button" type="submit" name="enviar" id="enviar" value="Ver" />
</form>
    
    </div></td>
  </tr>
  <?php    
}
?>
</table>
</div>
		  </section>

</section>
<?php
  
include("footer.html");

?>
</body>

</html>