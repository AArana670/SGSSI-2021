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
if (isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"]) && isset($_GET["w5"]) && isset($_GET["w6"]) && isset($_GET["w7"])) {
    $phpVar2 = $_GET["w2"];
    $phpVar3 = $_GET["w3"];
    $phpVar4 = $_GET["w4"];
    $phpVar5 = $_GET["w5"];
    $phpVar6 = $_GET["w6"];
    $phpVar7 = $_GET["w7"];
    echo "Todo guay";
    include("registrar.php");
  
} else {
    echo "<p>No parameters</p>";
}
?>
</body>
</html>
