	<?php
	include( 'profile.php' );
	?>
<!DOCTYPE HTML>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="css/styles1.css">
	
	
  <title>Iniciar Sesión</title>
</head>

<body>
<header class="header"></header>
  <section class="login">
      <section class="login__container">

<div align="center">
  <?php
$pri = $login_sessionPrivilegios;
if (isset($_REQUEST['Mensaje']))
{

$mensaje = $_REQUEST['Mensaje'];


if($mensaje=="Instalacion1"){
	
	echo " <span> ¡ Registro de Instalación exitosa !</span>";
	}
elseif($mensaje=="Instalacion2"){
	echo "<span> ¡Verifique el estado de la instalación!</span>";
}
elseif($mensaje=="cliente1"){
	echo "<span> ¡Registro de cliente exitoso!</span>";
}
elseif($mensaje=="cliente2"){
	echo "<span> ¡Verifique, error al registrar el cliente!</span>";
}
}
?>
</div>
<div class="login-main" align="center">
  <table width="95%" border="0"><? if ($pri ==1 || $pri==2){ ?>
  <tr>

    <td><form action="porInstalar.php">
      <div align="center">
        <input type="submit" value="Por Instalar" />
      </div>
    </form></td>
    </tr><? } ?><? if ($pri ==1 || $pri==3){ ?>
  <tr>

    <td><form action="nuevoCliente.php">
      <div align="center">
        <input type="submit" value="Nuevo Cliente" />
      </div>
    </form></td>
    </tr><? } ?><? if ($pri ==1){ ?>
  <tr>

    <td><form action="generarCobrar.php">
      <div align="center">
        <input type="submit" value=" Generar Cobrar" />
      </div>
    </form></td>
    </tr><? } ?><? if ($pri ==1 || $pri==3){ ?>
  <tr>

    <td><div align="center"></div><form action="recaudar.php">
      <div align="center">
        <input type="submit" value="Recaudar" />
      </div>
    </form></td>
    </tr>
	<tr>

    <td><div align="center"></div><form action="reporteRecaudo.php">
      <div align="center">
        <input type="submit" value="Reporte Recaudo" />
      </div>
    </form></td>
    </tr><? } ?><? if ($pri ==1 ){ ?>

  <tr>
    <td><div align="center"><form action="listarClientes.php">
      <div align="center">
        <input type="submit" value="Clientes" />
      </div>
    </form></div></td>
    </tr>
  <tr>
    <td><div align="center"><form action="listarUsuarios.php">
      <div align="center">
        <input type="submit" value="Usuarios" />
      </div>
    </form></div></td>
    </tr>
  <tr>
    <td><div align="center"><form action="listarPlanes.php">
      <div align="center">
        <input type="submit" value="Planes" />
      </div>
    </form></div></td>
    </tr><? } ?><? if ($pri ==1 || $pri==2 ){ ?>
	 <tr>
    <td><div align="center"><form action="porSuspender.php">
      <div align="center">
        <input type="submit" value="Por Suspender" />
      </div>
    </form></div></td>
    </tr>
    
    <tr>
    <td><div align="center"><form action="porReconectar.php">
      <div align="center">
        <input type="submit" value="Por Reconectar" />
      </div>
    </form></div></td>
    </tr>
    
	<? } ?>
</table>


</div>
		  
		  </section>
  </section>
  <footer class="footer">
    <a href="">Términos de uso</a>
    <a href="">Declaración de privacidad</a>
    <a href="">Centro de ayudas</a>
  </footer>
 
</body>
</html>