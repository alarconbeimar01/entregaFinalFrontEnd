<?php
include('session.php');
?>
 

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
<header class="header">
	  <img class="header__img" src="imagenes/iconologo.png" alt="Logo">
		<div class="header__menu">
		<div class="header__menu__perfil">
			<img src="imagenes/iconologo.png" alt="perfil"><p>Perfil</p>
			<ul>
				<li><a href=""><?php echo $login_session; ?></a></li>
				<li><a href="logout.php">Salir</a></li>
			</ul>
		</div>
	</div>
	</header>