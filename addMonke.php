<?php session_start()?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Monke Island-Añadir Primate</title>
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
			<li><a href="index.php">Página principal</a></li>
			<li><a href="mostrarMonkes.php">Nuestros primates</a></li>
			<?php if (isset($_SESSION['usrDni'])){?>
				<li><a href="cambiarSocio.php?i=<?php echo $_SESSION["usrDni"];?>"></a><?php echo $_SESSION["usrName"];?></li>
			<?php }else{ ?>
				<li><a href="hsocio.php">Hazte socio</a></li>
				<li><a href="login.php">Iniciar sesión</a></li>
			<?php } ?>
		</ul>
		</nav>
	</header>
	<h4><a href="mostrarMonkes.php">Volver a la lista de primates</a></h4>
	<br>
	<h1 class="titulo">Añade un primate</h1>
	<div id="avisos">
		
	</div>
	<div id="divAñadir" class="addDiv">
		
		<h4>nombre</h4>
		<input type="text" id="txtNom">
		<h4>raza</h4>
		<input type="text" id="txtRaza">
		<h4>sexo</h4>
		<select name="sexo" id="drpSexo">
			<option value="M">Macho</option>
			<option value="H">Hembra</option>
		</select>
		<h4>¿es peligroso?</h4>
		<select name="peligro" id="drpPeligro">
			<option value="1">Sí</option>
			<option value="0">No</option>
		</select>
		<br>
		<br>
		<button onclick="addMonke()" id="btnAddMonke">Añadir primate</button>
		
	</div>

<?php
if (isset($_GET["w1"]) && isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"])) {
	$con = mysqli_connect("localhost","admin","password","MONKEISLAND");
	if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
	$consulta="SELECT MAX(MONKID) as maxId FROM MONKE" ;
    $resultado=mysqli_query($con, $consulta);
	$mostrar=mysqli_fetch_array($resultado);
    $id=$mostrar["maxId"]+1;
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