<?php
include('login.php'); // Includes Login Script
 
if(isset($_SESSION['login_user_sys'])){
header("location: entrada.php");
}
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
  <link rel="stylesheet" href="./css/styles-login.css">
	
	
  <title>Iniciar Sesión</title>
</head>
	
<body>

  <section class="login">
      <section class="login__container">
        <h2>Inicia sesión</h2>
			<form class="login__container--form" action="index.php" method="post">
				<input class="input" type="text" placeholder="Usuario" required name="username" required >
				<input class="input" type="password" placeholder="Contraseña" name="password" required>
				<input class="button" name="submit" type="submit" value="Ingresar">
				
				
				<span><?php echo $error; ?></span>
				<div class="login__container--remember-me">
			  
			
			  
            <label>
              <input type="checkbox" name="" id="cbox1" value="checkbos">Recuérdame
            </label>
            <a href="/">Olvidé mi contraseña</a>
          </div>
				
				
			</form>
			
<?php if($error=="El Usuario o la contraseña es inválida."){ ?>
		  <script src="js/alertas.js"></script>
<script>
  mensajeErrorLogin();
</script>
<?	
}
	 ?>
			  
<p class="login__container--register">No tienes ninguna cuenta <a href="registro.php">Regístrate</a></p>				   

			</div>
			
			
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