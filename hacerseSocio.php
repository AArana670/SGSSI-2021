<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <title>MONKEISLAND-HACERSE SOCIO</title>
  <link rel="stylesheet" href="style.css">
  <script src="scriptHacerseSocio.js"></script>
</head>
<body>
<header>
  <div>
  <img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
	</div>
	<nav>
		<ul>
			<li><a href="#">Página principal</a></li>
			<li><a href="index.html">Nuestros monkes</a></li>
			<li><a href="hacerseSocio.php">Hazte socio</a></li>
		</ul>
	</nav>
</header>

<h1>Hazte socio</h1>
<div id="avisos">
		
</div>

<h4>DNI</h4>
<input type="text" name="txtDni" id="txtDni">
<h4>Nombre y apellido</h4>
<input type="text" name="txtNomApell" id="txtNomApell">
<h4>Teléfono</h4>
<input type="text" name="txtTel" id="txtTel">
<h4>Fecha de nacimiento</h4>
<input type="date" name="txtFechaNac" id="txtFechaNac">
<h4>Email</h4>
<input type="text" name="txtEmail" id="txtEmail">
<h4>Usuario</h4>
<input type="text" name="txtUsuario" id="txtUsuario">
<h4>Contraseña</h4>
<input type="password" name="txtContr" id="txtContr">

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
    $consulta="INSERT INTO SOCIO(DNI, NOMBRE, TELEFONO, FECHANAC, EMAIL, USUARIO, CONTRASENA) VALUES ('$dni','$nombre','$tel','$fecha','$email','$usuario','$password')";
    mysqli_query($con, $consulta);
    mysqli_close($con); 
	
	 /*  unset($_GET['w2']);
    unset($_GET['w3']);
    unset($_GET['w4']);
    unset($_GET['w5']);
    unset($_GET['w6']);
    unset($_GET['w7']);
*/
  
} 
?>
</body>
</html>
