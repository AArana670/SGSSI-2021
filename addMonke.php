<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Monke Island-Añadir Monke</title>
	<link rel="stylesheet" href="./styleAddMonke.css">
	<script src="scriptAddMonke.js"></script>
</head>
<body>
	<header>
  <div>
	  <img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
		</div>
		<nav>
			<ul>
				<li><a href="#">Página principal</a></li>
				<li><a href="mostrarMonkes.php">Nuestros monkes</a></li>
				<li><a href="hacerseSocio.php">Hazte socio</a></li>
			</ul>
		</nav>
	</header>
	
	<h1 class="titulo">Añade un monke</h1>
	<div id="avisos">
		
	</div>
	<div id="divAñadir" class="addDiv">
		
		<h4>nombre</h4>
		<input type="text" id="txtNom">
		<h4>raza</h4>
		<input type="text" id="txtRaza">
		<h4>sexo</h4>
		<select name="sexo" id="drpSexo">
			<option value="M">M</option>
			<option value="H">H</option>
		</select>
		<h4>¿es peligroso?</h4>
		<select name="peligro" id="drpPeligro">
			<option value="1">Sí</option>
			<option value="0">No</option>
		</select>
		<br>
		<br>
		<button onclick="addMonke()" id="btnAddMonke">Añadir monke</button>
		
	</div>

<?php
if (isset($_GET["w1"]) && isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"])) {
	$con = mysqli_connect("localhost","admin","password","MONKEISLAND");
	if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
	$idConsulta=mysqli_query($con, "SELECT * FROM MONKE");
    $id=mysql_num_rows($idConsulta)+1;
    $nombre = $_GET["w1"];
    $raza = $_GET["w2"];
    $sexo = $_GET["w3"];
    $peligro = $_GET["w4"];
    $consulta="INSERT INTO MONKE(MONKID, NOMBRE, RAZA, SEXO, PELIGRO) VALUES ('$id','$nombre','$raza','$sexo','$peligro')";
    mysqli_query($con, $consulta);
    mysqli_close($con);
} 
?>

</body>
</html>