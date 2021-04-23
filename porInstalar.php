

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
<title>Por Instalar</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <section class="main__container--tablas">


  <?php
  
include("Modelo/conectaDb.php");


$sql ="CALL PORINSTALAR()";
$respuesta = mysqli_query($conexion, $sql);
?>

<p> 
<h2 align="center">Instalaciones Pendientes</h2>
</p> 
<table  width="99%" border="1">


  <tr>
      <th scope="col"><div align="center">Nombre</div></th>
    <th scope="col"><div align="center">Documento</div></th>
    <th scope="col"><div align="center">Ciudad</div></th>
    <th scope="col"><div align="center"></div></th>
  </tr>
  <?php
while($filas = mysqli_fetch_array($respuesta)){
	$nombre =$filas['nombre'];
	$cc = $filas['cc'];
	$identificacion = $filas['identificacion'];
	$ciudad = $filas['ciudad'];
	?>	
	
  <tr>
    <td><div align="center"><?php echo $nombre ;?></div></td>
    <td><div align="center"><?php echo $cc;?></div></td>
    <td><div align="center"><?php echo $ciudad;?></div></td>
    <td><div align="center">
    <form action="instalar.php" method="post" name="vercliente">
    <input type="hidden" hidden="" value="<?php echo $identificacion;?>" name="idCliente" id="idCliente" />
    <input type="submit" name="enviar" id="enviar" value="Ver" />
    </form>
    
    </div></td>
  </tr>
  <?php    
}
?>
</table>

</section>

</section>
<?php
  
include("footer.html");

?>
</body>
</html>