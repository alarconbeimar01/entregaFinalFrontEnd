<?php  
include("session.php");
?>
<header class="header">
	<a href="index.php"><img class="header__img" src="imagenes/iconologo.png" alt="Logo"></a>
		<div class="header__menu">
		<div class="header__menu__perfil">
			<img src="imagenes/user-icon.png" alt="perfil"><p><?php echo $login_session; ?></p>
			<ul>
				<li><a href="actualizarDatos.php">Cuenta</a></li>
				<li><a href="logout.php">Salir</a></li>
			</ul>
		</div>
	</div>
</header>