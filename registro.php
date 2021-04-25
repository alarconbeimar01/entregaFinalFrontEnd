<!DOCTYPE HTML>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="./css/styles-login.css">
	
	
  <title>Registro de Usuario</title>
</head>
	<script src="js/alertas.js"></script>
<body>
<header class="header"></header>
  <section class="login">
      
      <section class="login__container">
        <h2>Registro</h2>
      
   
    <div align="center">
      <form action="Validador/registrarUsuarioV.php" method="post" class="login-main">
<table width="auto%" border="0">
  <tr>
    <th scope="row">Usuario:</th>
    <td><input class="input" name="usuario"  type="text" required   ></td>
  </tr>
  <tr>
    <th scope="row">Contraseña:</th>
    <td><input class="input" type="password" name="password" required>
  </tr>
    <tr>
    <th scope="row">Confirmar Contraseña:</th>
    <td><input class="input" type="password" name="confirmarpassword" required>
  </tr>
  <tr>
    <th scope="row">Telefono:</th>
    <td><input class="input" type="number" name="telefono" required></td>
  </tr>
  <tr>
    <th scope="row">E-mail:</th>
    <td><input class="input" type="email" name="email" required></td>
  </tr>
</table>
 
          <input class="button" type="button" name="Submit" value="REGISTRAR" align="center" onClick="validarContrasenas(this.form)">		
		 
       </form>
        <?php

if (isset($_REQUEST['Mensaje']))
{

$mensaje = $_REQUEST['Mensaje'];


if($mensaje==1){
	
	echo " Usuario Registrado Exitosamente <br> espera activacion por parte del administrador. ";
	}
elseif($mensaje==2){
	echo "Error al registrar el usuario <br> Nombre de usuario ya existe";
}
}
 

?>
     <p class="login__container--register">Ya tienes una cuenta <a href="index.php">Iniciar Sesión</a></p>	   
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