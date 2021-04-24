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
<title>Listado de planes</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <h2 class=" main_tible">Listado de planes</h2>
		  <section class="main__container--tablas">
  <?php
  
include("Modelo/conectaDb.php");


$sql ="CALL LISTARPLANES()";

$respuesta = mysqli_query($conexion, $sql);
?>

<table width="95%" border="1">


  <tr>
      <th scope="col"><div align="center">Descripción</div></th>
    <th scope="col"><div align="center">Precio</div></th>
    <th scope="col"><div align="center"></div></th>
  </tr>
  <?php
while($filas = mysqli_fetch_array($respuesta)){
	$plan =$filas['nombre'];
	$valor = $filas['costo'];
	$ref = $filas['idPlan'];
		
		?>
  <tr>
    <td><div align="center"><?php echo $plan?></div></td>
    <td><div align="center"><?php echo number_format($valor)?></div></td>
    <td><div align="center">
      <form action="verPlan.php" method="post" name="vercliente">
        <input type="hidden" hidden="" value="<?php echo $ref;?>" name="ref" id="ref" />
        <input class="button" type="submit" name="editar" id="editar" value="Editar" />
        </form>
      
    </div></td>
  </tr>
  <?php    
}
?>
	
</table>
			  <p>
<div align="center"><form action="nuevoPlan.php">
      <div align="center">
        <input class="button" type="submit" value="Agregar Plan" />
      </div>

    </form></div>
			  </p>
</section>
</section>
<?php
  
include("footer.html");

?>
</body>

</html>