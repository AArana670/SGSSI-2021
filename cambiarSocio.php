<?php
	session_start();
	//inicio de sesión
	$con = mysqli_connect("db","admin","test","database");
	if(!$con){
		die("La conexión ha fallado: " . mysqli_connect_error());
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Monke Island-Modificar datos personales</title>
	<script src="scriptCambiarSocio.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/png" href="/favicon.png"/>
  	<link rel="icon" type="image/png" href="https://favicon-generator.org/favicon-generator/htdocs/favicons/2012-10-18/11028c7d3531cb369e8128ace155a556.ico"/>
</head>
<body>
	<header>
		<div>
			<img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkZGQ0ZDIiwiYmdjIjoiI0Y0RjNGMyIsInQiOjF9/bW9ua2UgaXNsYW5k/hanalei-fill.png"></a>
		</div>
		<nav>
			<ul>
				<li><a href="index.php">Página principal</a></li>
				<li><a href="mostrarMonkes.php">Nuestros primates</a></li>
				<li><a href="hsocio.php">Hazte socio</a></li>
				<li><a href="login.php">Iniciar sesión</a></li>
			</ul>
		</nav>
	</header>
	
	<img class="tituloPrin" src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjozOCwidyI6MTAwMCwiZnMiOjM4LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/Q0FNQklBIFRVUyBEQVRPUw/hanalei-fill.png"></a>
	<br>
	<div id="avisos">	
	</div>
	<!--La primera fila de la tabla que contiene los nombres de os campos de la base de datos-->
	<table>
		<tr>
			<td>DNI</td>
			<td>Nombre</td>
			<td>Teléfono</td>
			<td>Fecha Nacimiento</td>
			<td>Email</td>
			<td>Usuario</td>
			<td>Contraseña</td>
		</tr>
		
		<?php //conexión a la base de datos para conseguir los dato del usuario que ha iniciado la sesión
			if (isset($_GET["i"])){
				$id = $_GET["i"];
				$consulta="SELECT DNI, NOMBRE, TELEFONO, FECHANAC, EMAIL, USUARIO, CONTRASENA FROM SOCIO WHERE DNI='$id'";
   				$resultado=mysqli_query($con, $consulta);
   		 	}
   		 	while($mostrar=mysqli_fetch_array($resultado)){
		?>
		<tr><!--Con estos comandos se imprimen los datos del usuario que ha iniciado la sesión-->
			<td><?php echo $mostrar['DNI']?></td>
			<td><?php echo $mostrar['NOMBRE']?></td>
			<td><?php echo $mostrar['TELEFONO']?></td>
			<td><?php echo $mostrar['FECHANAC']?></td>
			<td><?php echo $mostrar['EMAIL']?></td>
			<td><?php echo $mostrar['USUARIO']?></td>
			<td><?php echo $mostrar['CONTRASENA']?></td>
		</tr>
		
		<?php
		}
		?>		
	</table>
	<br>
	<br>
	<!--Formulario con datos nuevos del usuario-->
	<div class="aviso" id="avisos"></div>
		<br>
		<h4>Nombre</h4>
		<br>
		<input type="text" id="f2t1" name="f2t1">
		<br>
		<h4>Teléfono</h4>
		<br>
		<input type="text" id="f3t1" name="f3t1">
		<br>
		<h4>Fecha de nacimiento</h4>
		<br>
		<input type="date" id="f4t1" name="f4t1" max="<?= date('Y-m-d'); ?>">
		<br>
		<h4>Email</h4>
		<br>
		<input type="text" id="f5t1" name="f5t1">
		<br>
		<h4>Usuario</h4>
		<br>
		<input type="text" id="f6t1" name="f6t1">
		<br>
		<h4>Contraseña</h4>
		<br>
		<input type="password" id="f7t1" name="f7t1">
		<br>
		<!--Botón para iniciar el proceso de modificación de datos-->
		<button onclick="addSocio()" id="btnAddSocio">Guardar cambios</button>
	
	
<?php	//la recogida de los datos nuevos del usuario
	if(isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"]) && isset($_GET["w5"]) && isset($_GET["w6"]) && isset($_GET["w7"])) {
		$id=$_GET['i'];
		$nombre=$_GET['w2'];
		$tel=$_GET['w3'];
		$fech=$_GET['W4'];
		$mail=$_GET['w5'];
		$usr=$_GET['w6'];
		$pass=$_GET['w7'];
		
		//conexión a la base de datos
		$con = mysqli_connect("db","admin","test","database");
    		if(!$con){
    			die("La conexión ha fallado: " . mysqli_connect_error());
   	 	}
		//consulta para modificar los datos del usuario
		$consulta="UPDATE SOCIO SET NOMBRE='$nombre', TELEFONO='$tel', EMAIL='$mail', USUARIO='$usr', CONTRASENA='$pass' WHERE DNI='$id'";	
		$resultado=mysqli_query($con, $consulta);
		mysqli_close($con);
		//mensaje de éxito
		echo "<html>";
		echo "<br>";
		echo "<h1> Datos del usuario modificados </h1>";
		echo "<br>";
		echo "<html>";
	}
?>
</body>
</html>
