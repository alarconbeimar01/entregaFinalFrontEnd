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

$ref=$_POST['idCliente'];	


include("Modelo/conectaDb.php");


$sql ="CALL INFOCLIENTE('$ref')";

$respuesta = mysqli_query($conexion, $sql);

?><h2 align="center"> Info Cliente  </h2>

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
	$dia = date('d');
	$pendientes = 31 - $dia;
	$valor =$filas['valor'];
	$refPlan =$filas['idplanes'];
	$facturar = ($valor / 31)*$pendientes;
	$totalFacturar = number_format($facturar,0,'','');
	$mes = date("m");
	$ano = date("Y");
	$integrado ="$mes de $ano";
	
	echo  "$ $totalFacturar es el valor a cancelar por el mes $integrado";
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
 
        <?php
	  if($priUsuario==1 || $priUsuario==2 && $estadoPlan ==3 ){
      
      ?>
      </div>
        <form action="Validador/validarInstalar.php" name="instalar" method="post">
          <div align="center">
            <table width="99%" border="0">
              <tr>
                <th scope="row"><div align="right">Ref  : </div></th>
                <td><div align="left">
                  <input class="input" type="text" name="ip" id="ip"  required="required"  />
                </div></td>
              </tr>
              <tr>
                <th scope="row"><div align="right">N/S Router : </div></th>
                <td><input class="input" type="text" name="ns" id="ns" required="required"  /></td>
              </tr>
              <tr>
                <th colspan="2" scope="row"><div align="right">
                                    
                  <input type="hidden" name="refPlan" id="refPlan" hidden="" value="<? echo $refPlan ?>" />
                  
                  
                  <input type="hidden" name="integrado" id="integrado" hidden="" value="<? echo $integrado ?>" />
                  
                  <input type="hidden" hidden="" value="<?php echo $totalFacturar?>" name="totalFacturar" id="totalFacturar" />
                  
                  
                  <input type="hidden" hidden="" value="<?php echo $idUsuario?>" name="usuario" id="usuario" />
                  <input type="hidden" hidden="" value="<?php echo $identificacion ?>" name="identificacion" id="identificacion" />
                </div>                  <div align="left">
                  <input type="submit" class="button" name="btinstalar" value="Registrar Instalación" />
                </div></th>
              </tr>
            </table>
          </div>
        </form>
        <div align="center">
          <?php
	  }
	  
	  
		?>
          <div align="center">
          <? echo '<a href="porInstalar.php"><h2>Regresar</h2></a>'; ?>
          </div>
      </div>
    
</div>
</section>

</section>
<?php
  
include("footer.html");

?>
</body>
</html>