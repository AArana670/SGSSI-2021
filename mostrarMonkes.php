<?php
	session_start();
    $con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <title>MONKEISLAND-MOSTRAR MONKES</title>
  <link rel="stylesheet" href="styleHacerseSocio.css">
</head>
<body>
 <header>
  <div>
  <img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
	</div>
	<nav>
		<ul>
			<li><a href="index.php">Página principal</a></li>
			<li><a href="mostrarMonkes.php">Nuestros monkes</a></li>
			<?php if (isset($_SESSION['usrDni'])){?>
				<li><a href="cambiarSocio.php?i=<?php echo $_SESSION["usrDni"];?>"></a><?php echo $_SESSION["usrName"];?></li>
			<?php }else{ ?>
				<li><a href="hsocio.php">Hazte socio</a></li>
				<li><a href="login.php">Iniciar sesión</a></li>
			<?php } ?>
		</ul>
	</nav>
</header>

<h1>	Monos de nuestro zoo </h1>
	<table>
		<tr>
			<td>Nombre</td>
			<td>Raza</td>
		</tr>
		
		<?php
		$consulta="SELECT `MONKID`,`NOMBRE`,`RAZA` FROM MONKE";
   		$resultado=mysqli_query($con, $consulta);
   		 
   		 while($mostrar=mysqli_fetch_array($resultado)){
		?>
		
		<tr>
			<td><a href="cambiarMonke.php?i=<?php echo $mostrar["MONKID"]?>"><?php echo $mostrar["NOMBRE"]?></a></td>
			<td><?php echo $mostrar['RAZA']?></td>
		</tr>
		
		<?php
		}
		?>
		
	</table>
<br>
<br>
<h4>¿Falta algún monke? <a href="addMonke.php">Añádelo</a></h4>
</body>
</html>