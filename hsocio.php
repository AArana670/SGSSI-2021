<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MONKEISLAND-HACERSE SOCIO</title>
	<link rel="stylesheet" href="style.css">
	<script src="scripthsocio.js"></script>
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
	
	<img class="tituloPrin" src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjozNSwidyI6MTAwMCwiZnMiOjM1LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/SGF6dGUgc29jaW8/hanalei-fill.png"></a>

<div class="cuerpo">
	<!--Formulario para recoger los datos del usuario nuevo-->
	<br>
	<!--Hiperlink para iniciar sesión si el usuario ya es socio-->
	<h1>¿Ya eres socio? <a class ="links" href="login.php">Inicia sesión</a></h1>
	<br>
	<div class="aviso" id="avisos"><h1></h1> </div>
	<br>
	<h4>Nombre y apellido</h4>	
	<br>
	<input type="text" name="nomApell" id="nomApell" placeholder="Nombre Apellido">
	<br>
	<h4>DNI</h4>
	<br>
	<input type="text" name="dni" id="dni" placeholder="XXXXXXXX-Y">
	<br>
	<h4>Fecha de nacimiento</h4>
	<br>
	<input type="date" name="fechaNac" id="fechaNac" placeholder="dd-mm-yyyy" max="<?= date('Y-m-d'); ?>">	
	<br>
	<h4>Teléfono</h4>
	<br>
	<input type="text" name="tel" id="tel" placeholder="ZZZZZZZZZ">
	<br>
	<h4>Email</h4>
	<br>
	<input type="text" name="email" id="email" placeholder="ejemplo@x.com">
	<br>
	<h4>Usuario</h4>
	<br>
	<input type="text" name="usuario" id="usuario" placeholder="ejemplo001">
	<br>
	<h4>Contraseña</h4>
	<br>
	<input type="password" name="contr" id="contr">
	<br>
	<br>
	<!--Botón para empezar con la creación del nuevo socio-->
	<button onclick="addSocio()" id="btnAddSocio">Convertirse en socio</button>
	</div>
	<?php	//recogida de datos del usuario nuevo
		if (isset($_GET["w1"]) && isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"]) && isset($_GET["w5"]) && isset($_GET["w6"]) && isset($_GET["w7"])) {
			
			$dni=$_GET["w1"];
   			$nombre = $_GET["w2"];
    			$tel = $_GET["w3"];
    			$fecha = $_GET["w4"];
    			$email = $_GET["w5"];
    			$usuario = $_GET["w6"];
    			$password = $_GET["w7"];
    			//conexión a la base de datos
    			$con = mysqli_connect("db","admin","test","database");
    			if(!$con){
    				die("La conexión ha fallado: " . mysqli_connect_error());
    			}
    			//consulta para añadir el nuevo usuario en el sistema
   			$consulta="INSERT INTO SOCIO(DNI, NOMBRE, TELEFONO, FECHANAC, EMAIL, USUARIO, CONTRASENA) VALUES 			('$dni','$nombre','$tel','$fecha','$email','$usuario','$password')";
   			mysqli_query($con, $consulta);
    			mysqli_close($con); 
    			//mensaje de éxito
    			echo "<html>";
			echo "<br>";
			echo "<h1> El usuario ha sido registrado</h1>";
			echo "<br>";
			echo "<html>";
		}
	?>
</body>
</html>

