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
		  <section class="main__container">

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
<div  align="center">
    <nav class="nav-collapse">

      <ul>
         
           <? if ($pri ==1 ){ ?>
        <li><a href="listarClientes.php">Listar Clientes</a></li>
          <? } ?>
          <? if ($pri ==1 || $pri==3){ ?>
        <li><a href="nuevoCliente.php">Agregar Cliente</a></li>
          
         
        <li><a href="recaudar.php">Recaudar</a></li>
        <li><a href="reporteRecaudo.php">Reporte Recaudos</a></li>
           <? } ?>
          <? if ($pri ==1 ){ ?>
         <li><a href="listarUsuarios.php">Usuarios</a></li>
        <li><a href="listarPlanes.php">Planes</a></li>
           <? } ?>
         <? if ($pri ==1 || $pri==2){ ?>
        <li><a href="porInstalar.php">Instalaciones</a></li>
        <li><a href="porSuspender.php">Suspenciones</a></li>
          
          
         <li><a href="porReconectar.php">Reconexiones</a></li>
          <? } ?>
           <? if ($pri ==1 ){ ?>
        <li><a href="generarCobrar.php">Mensualidades</a></li>
            <? } ?>
      </ul>
        

    </nav>
  
</div>
		  
		 </section>

</section>
<?php
  
include("footer.html");

?>
</body>
</html>