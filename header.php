<?php
  
include("session.php");

?>
<header class="header">
	  <img class="header__img" src="imagenes/iconologo.png" alt="Logo">
		<div class="header__menu">
		<div class="header__menu__perfil">
			<img src="imagenes/user-icon.png" alt="perfil"><p><?php echo $login_session; ?></p>
			<ul>
				<li><a href="">Cuenta</a></li>
				<li><a href="logout.php">Salir</a></li>
			</ul>
		</div>
	</div>
	</header>