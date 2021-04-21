<?php
include('login.php'); // Includes Login Script
 
if(isset($_SESSION['login_user_sys'])){
header("location: entrada.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>

<title>YP</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Flat Login Form Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>
<!--google fonts-->
</head>
<body>
<br>
<!--header start here-->

<div class="header agile">
	<div class="wrap">
		<div class="login-main wthree">
			<div class="login">
			<h3>Ingresar</h3>
			<form action="index.php" method="post">
				<input type="text" placeholder="Usuario" required name="username" required >
				<input type="password" placeholder="Contraseña" name="password" required>
				<input name="submit" type="submit" value="Ingresar">
			</form>
			<div class="clear"> </div>
				<p><span><?php echo $error; ?></span>
			  </p>
				   
<?php echo '<a href="registro.php">Registrarse</a>';?>
			</div>
			
			
		</div>
	</div>
</div>
<!--header end here-->
<!--copy rights end here-->

<!--copyrights start here-->
 
</body>
</html>