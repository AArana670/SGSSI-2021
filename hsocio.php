<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <title>MONKEISLAND-HACERSE SOCIO</title>
  <link rel="stylesheet" href="styleHacerseSocio.css">
  <script src="scripthsocio.js"></script>
  <link rel="icon" type="image/png" href="/favicon.png"/>
  <link rel="icon" type="image/png" href="https://favicon-generator.org/favicon-generator/htdocs/favicons/2012-10-18/11028c7d3531cb369e8128ace155a556.ico"/>

</head>

<body>
 	<header>
 		 <div>
  			<img src="https://see.fontimg.com/api/renderfont4/M72w/		eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
		</div>
		<nav>
			<ul>
			<li><a href="index.html">Página principal</a></li>
			<li><a href="mostrarMonkes.php">Nuestros monkes</a></li>
			<li><a href="hsocio.php">Hazte socio</a></li>
			<li><a href="login.php">Iniciar sesión</a></li>
		</ul>
		</nav>
	</header>
	
	<h1>Hazte socio</h1>
	<h2>¿Ya eres socio? <a href="login.php">Inicia sesión</a></h2>
	<div id="avisos"> </div>
	<h4>Nombre y apellido</h4>	
	<input type="text" name="nomApell" id="nomApell">
	<h4>DNI</h4>
	<input type="text" name="dni" id="dni">
	<h4>Fecha de nacimiento</h4>
	<input type="date" name="fechaNac" id="fechaNac">
	<h4>Teléfono</h4>
	<input type="text" name="tel" id="tel">
	<h4>Email</h4>
	<input type="text" name="email" id="email">
	<h4>Usuario</h4>
	<input type="text" name="usuario" id="usuario">
	<h4>Contraseña</h4>
	<input type="text" name="contr" id="contr">
	<br>
	<br>
	<button onclick="addSocio()" id="btnAddSocio">Convertirse en socio</button>
	
	<?php
		if (isset($_GET["w1"]) && isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"]) && isset($_GET["w5"]) && isset($_GET["w6"]) && isset($_GET["w7"])) {
		$dni=$_GET["w1"];
   		$nombre = $_GET["w2"];
    		$tel = $_GET["w3"];
    		$fecha = $_GET["w4"];
    		$email = $_GET["w5"];
    		$usuario = $_GET["w6"];
    		$password = $_GET["w7"];
    		$con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    		if(!$con){
    			die("La conexión ha fallado: " . mysqli_connect_error());
    		}
   		$consulta="INSERT INTO SOCIO(DNI, NOMBRE, TELEFONO, FECHANAC, EMAIL, USUARIO, CONTRASENA) VALUES 			('$dni','$nombre','$tel','$fecha','$email','$usuario','$password')";
   		mysqli_query($con, $consulta);
    		mysqli_close($con); 
    		echo "EL usuario nuevo ha sido registrado";
		}
	?>
</body>
</html>

