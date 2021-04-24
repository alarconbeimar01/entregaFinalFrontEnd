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
<title>Suspender</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <h2 class=" main_tible">Clientes por suspender</h2>
		  <section class="main__container">
  <?php
  
include("Modelo/conectaDb.php");


$sql ="CALL PORCOBRAR()";

$respuesta = mysqli_query($conexion, $sql);
?>

  
<div align="center">
  <table width="auto%" border="1">
      
      
    <tr>
        <th  scope="col"><div align="center">cc</div></th>
        <th scope="col">mes</th>
        <th  scope="col">nomCliente</th>
        <th scope="col">ciudad</th>
      <th  scope="col"><div align="center">direccion</div></th>
      <th  scope="col">telefono</th>
      <th  scope="col"><div align="center">Ver</div></th>
    </tr>
    <?php
while($filas = mysqli_fetch_array($respuesta)){
	$refCliente =$filas['refCliente'];	
	$cc =$filas['cc'];
	$mes = $filas['mes'];
	$nomCliente = $filas['nomCliente'];
	$ciudad =$filas['ciudad'];
	$direccion =$filas['direccion'];
	$telefono =$filas['telefono'];
		
		?>
    <tr>
      <td><?php echo $cc?></td>
      <td><?php echo $mes?></td>
      <td><?php echo $nomCliente?></td>
      <td><?php echo $ciudad?></td>
      <td><?php echo $direccion?></td>
      <td><a target="_blank" href="https://api.whatsapp.com/send?phone=57<?php echo $telefono?>&text=Cordial saludo, recuerda cancelar tu plan de internet, evita suspención..."><?php echo $telefono?></a></td>
      <td><form action="suspenderCliente.php" method="post" name="cortarCliente"> 
      <input type="hidden" hidden="" name="refCliente" id="refCliente" value="<?php echo $refCliente?>" />
      <input class="button" type="submit" name="ver" value="Ver" />
      </form>
      </td>
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