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
<title>Registrar Cliente</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <section class="main__container">


  <h2 class=" main_tible">Registro de Cliente</h2>
		<p>
	<form method="post" name="recaudar"  action="Validador/nuevoClienteV.php" onSubmit="return preguntarNC()">
		<input type="text" required="required" class="input_buscar" placeholder="Nombre..." name="nombre" id="nombre">
		  <input type="text" required="required" class="input_buscar" placeholder="CC ó Nit..." name="doc" id="doc">
		<input type="number" required="required" class="input_buscar" placeholder="Teléfono..." name="tel" id="tel">
		<input type="email" required="required" class="input_buscar" placeholder="mail..." name="mail" id="mail">
		</p><p>
		<select name="ciudad" id="ciudad" >		
        	<option >Seleccione Ciudad</option>
        	<option value="Génova">Génova </option> 
         </select>
			  </p><p>
		<input type="text" required="required" class="input_buscar" placeholder="Dirección" name="direccion" id="direccion">
		
		 <input type="hidden" value="1" name="usuario" id="usuario" hidden=""/>
	  </p>
		
			  <p>
			  <?php
  
include("Modelo/conectaDb.php");


$sql ="CALL LISTARPLANES()";

$respuesta = mysqli_query($conexion, $sql);
?>

      <td><select name="plan" id="plan">
        <option>Seleccione Plan</option>
        
        <?php
while($opciones = mysqli_fetch_array($respuesta)){
	$idPlan = $opciones['idPlan'];
	$nombre =$opciones['nombre'];
	$costo = $opciones['costo'];
		?>
        <option value="<?php echo $idPlan?>"><?php echo "$nombre $ $costo"?> </option>
<?php } ?>
        </select>
			  </p>
			  <p>
		  <input class="button" type="submit" value="   Agregar   ">
	  </p>
	</form>
		  </section>

</section>
<?php
  
include("footer.html");

?>
</body>
</html>