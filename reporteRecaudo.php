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
<title>Reporte Recaudo</title>
</head>
	
<script src="js/alertas.js"></script>

<body>
	<?php
  
include("header.php");

?>
	  <section class="main">
		  <section class="main__container--Gc">


  <h2 class=" main_tible">Reporte Recaudo</h2>
<form action="#" method="post" name="buscador">

  
      
  <table width="auto" border="0">
          <tr>
            <th scope="row">Inicio </th>
            <td><input class="input" type="date" name="ini" ></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th scope="row">Fin</th>
            <td><input class="input" type="date" name="fin" ></td>
          </tr><? if($login_sessionPrivilegios==1){ ?>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th scope="row"><div align="center">Usuario  </div></th>
            <td><select class="input" name="usuario" id="usuario">
            
            <?php
			
			include("Modelo/conectaDbAux.php");
 $verRecaudador ="CALL LISTARRECAUDADOR()";

$recaudador = mysqli_query($conexionAux, $verRecaudador);
			 
			 
while($recaudadores = mysqli_fetch_array($recaudador)){
	$idRecaudador =$recaudadores['idRecaudador'];
	$nombreRecaudador =$recaudadores['nombreRecaudador'];
	

		?>
            
            <option value="<? echo $idRecaudador ?>"><? echo $nombreRecaudador ?> <? } ?></option>
            
            </select>
            </td>
          </tr> <? } ?>
          <tr>
            <th colspan="2" scope="row"><input class="button" type="submit" name="enviar2" value="Buscar"></th>
          </tr>
        </table>
        <div align="center"></div>
        <div align="center"></div>
        
        
</form>
</div>
<br />
      
      
        <div align="center">
          <?php
  

if (isset($_REQUEST['ini'])&&($_REQUEST['fin']))
{
	$ini =$_POST['ini'];
	$fin =$_POST['fin'];
	if($login_sessionPrivilegios==3){
	$usu=$login_sessions;
	}else{
	$usu=$_POST['usuario'];	
	}
	$fini="$ini 00:00:00.000000";
	$ffin="$fin 23:59:59.000000";

$sql ="CALL LISTARRECAUDOSUMA($usu,'".$fini."', '".$ffin."')";

$respuesta = mysqli_query($conexion, $sql);



?>
          
          
          </p>
          
          <table width="auro%" border="1">
            
            
            
            
            
            <tr>
              <th scope="col"><div align="center">Total</div></th>
              
            </tr>
            <?php
$filas = mysqli_fetch_array($respuesta);
	$suma =$filas['suma'];
	
	
		?>
            <tr>
              <td><div align="center"><?php echo number_format($suma)?></div></td>
              
            </tr>
            <?php    
 }
?>
          </table>
        </div>


<div align="center">
  <?php
  

if (isset($_REQUEST['ini'])&&($_REQUEST['fin']))
{
	$ini =$_POST['ini'];
	$fin =$_POST['fin'];
	if($login_sessionPrivilegios==3){
	$usu=$login_sessions;
	}else{
	$usu=$_POST['usuario'];	
	}
	$fini="$ini 00:00:00.000000";
	$ffin="$fin 23:59:59.000000";
	
include("Modelo/conectaDbAux.php");

$tt ="CALL LISTARRECAUDO($usu,'".$fini."', '".$ffin."')";

$respuesta1 = mysqli_query($conexionAux, $tt);



?>
        
        
        </p>
        
        <table style="border-radius: 10px;" width="90%" border="1">
          
          
                   
          
          <tr>
            <th scope="col">Ref</th>
            <th scope="col"><div align="center">Fecha</div></th>
            <th scope="col"><div align="center">Cliente</div></th>
            <th scope="col"><div align="center">Valor</div></th>
          </tr>
          <?php
while($filas1 = mysqli_fetch_array($respuesta1)){
	$ref1 =$filas1['idCobro'];
	$fecha1 =$filas1['fecha'];
	$documento1 = $filas1['cliente'];
	$valor1 = $filas1['valor'];
	
		?>
          <tr>
            <td><div align="center"><?php echo $ref1?></div></td>
            <td><div align="center"><?php echo $fecha1?></div></td>
            <td><div align="center"><?php echo $documento1;?></div></td>
            <td><div align="center"><?php echo number_format($valor1);?></div></td>
          </tr>
          <?php    
} }
?>
  </table>
  </div>
  </section>

</section>
<?php
  
include("footer.html");

?>
</body>

</html>