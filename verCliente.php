<?php
	include( 'profile.php' );
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Info Cliente</title>
</head>

<body>
<div class="login-main" align="center">
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
  <div align="center"></div>
  <div align="center"></div>
        <?php
	  if($priUsuario==1 || $priUsuario==2 && $estadoPlan ==3 ){
      
      ?>
      </div>
        <form action="Validador/validarInstalar.php" name="instalar" method="post">
          <div align="center">
            <table width="90%" border="0">
              <tr>
                <th scope="row"><div align="right">Ref  : </div></th>
                <td><div align="left">
                  <input type="text" name="ip" id="ip"  required="required"  />
                </div></td>
              </tr>
              <tr>
                <th scope="row"><div align="right">N/S Router : </div></th>
                <td><input type="text" name="ns" id="ns" required="required"  /></td>
              </tr>
              <tr>
                <th colspan="2" scope="row"><div align="right">
                  <input type="hidden" hidden="" value="<?php echo $idUsuario?>" name="usuario" id="usuario" />
                  <input type="hidden" hidden="" value="<?php echo $identificacion ?>" name="identificacion" id="identificacion" />
                </div>                  <div align="left">
                  <input type="submit" name="btinstalar" value="Registrar Instalación" />
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
          <? echo '<a href="index.php"><h2>Regresar</h2></a>'; ?>
          </div>
      </div>
    
</div>

</body>
</html>