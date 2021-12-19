<?php session_start()?>
<html lang="es"> <!--El lenguaje de la página es español-->
<head><!--Comienzo del head de la página-->
	<meta charset="UTF-8"><!--8 bit Unicode Transformation Format-->
	<title>Monke Island-Añadir Monke</title><!--Título visible en la pestaña de la página-->
	<link rel="stylesheet" href="./style.css"><!--Indicación del archivo css que usa esta página-->
	<script src="scriptAddMonke.js"></script><!--Indicación del archivo js que usa esta página-->
	<link rel="icon" type="image/png" href="/favicon.png"/><!--Indicación del icono de la pestaña-->
  	<link rel="icon" type="image/png" href="https://favicon-generator.org/favicon-generator/htdocs/favicons/2012-10-18/11028c7d3531cb369e8128ace155a556.ico"/><!--Indicación del icono de la pestaña-->
</head><!--Fin del comienzo de la página-->
<body><!--Comienzo del cuerpo de la página-->

<!-- -->
	<header><!--Comienzo del encabezado de la página-->
  		<div>
	  <img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkZGQ0ZDIiwiYmdjIjoiI0Y0RjNGMyIsInQiOjF9/bW9ua2UgaXNsYW5k/hanalei-fill.png"></a>
		<!--Lista de los hiperlinks a diferentes secciones del sistema web-->
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
		<img class="tituloPrin" src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo1MywidyI6MTAwMCwiZnMiOjUzLCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/QcORQURFIFVOIFBSSU1BVEU/hanalei-fill.png"></a>
		<br>
		<!--Hiperlink para acceder al apartado "Nuestros primates"-->
		<h1><a class= "links" href="mostrarMonkes.php">Volver a la lista de primates</a></h1>
		<br>
		<!--Línea de texto en la que aparecen los avisos sobre el contenido del formulario-->
		<div class="avisos" id="avisos"><h1></h1></div>
		<br>
		<!--Textboxs para recoger los datos delprimate que se desea añadir a la base de datos-->
		<div id="divAñadir" class="addDiv">
			<h4>Nombre</h4>
			<br>
			<input type="text" id="txtNom">
			<br>
			<h4>Raza</h4>
			<br>
			<input type="text" id="txtRaza">
			<br>
			<h4>Sexo</h4>
			<br>
			<select name="sexo" id="drpSexo">
				<option value="M">Macho</option>
				<option value="H">Hembra</option>
			</select>
			<br>
			<h4>¿Es peligroso?</h4>
			<br>
			<select name="peligro" id="drpPeligro">
				<option value="1">Sí</option>
				<option value="0">No</option>
			</select>
			<br>
			<!--Botón para empezar con la conexión a base de datos-->
			<button onclick="addMonke()" id="btnAddMonke">Añadir primates</button>	
		</div>

<?php
	
	if (isset($_GET["w1"]) && isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"])) { //if para recoger los datos de la URL
		
		//intento de conexión a la base de datos
		$con = mysqli_connect("db","monkeyDirector","fVNsjkNwyrtL0yqq","database");
		if(!$con){
    			die("La conexión ha fallado: " . mysqli_connect_error());}
		//consulta a la base de datos para poder crear el id del nuevo primate
		$consulta="SELECT MAX(MONKID) as maxId FROM MONKE" ;
   		$resultado=mysqli_query($con, $consulta);
		$mostrar=mysqli_fetch_array($resultado);
	
		//los datos delprimate que se van a introducir
    		$id=$mostrar["maxId"]+1;
    		$nombre = $_GET["w1"];
    		$raza = $_GET["w2"];
    		$sexo = $_GET["w3"];
    		$peligro = $_GET["w4"];
    		
    		//consulta a la base de datos para añadir el primate 
    		$consulta="INSERT INTO MONKE(MONKID, NOMBRE, RAZA, SEXO, PELIGRO) VALUES ('$id','$nombre','$raza','$sexo','$peligro')";
    		mysqli_query($con, $consulta);
		mysqli_close($con);
		
		//mensaje de que la operación ha sido un éxito
    		echo "<br>";
    		echo"<h1> Primate añadido correctamente";
    		echo "<br>";
    		echo"</html>";
	} 
?>

</body><!--Fin del head de la página-->
</html>
