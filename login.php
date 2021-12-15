<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MONKEISLAND-LOGIN</title>
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
	<img class="tituloPrin" src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo1OSwidyI6MTAwMCwiZnMiOjU5LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/SU5JQ0lBIFNFU0nDk04/hanalei-fill.png"></a>
	<br>
	<!--Hiperlink para la creación de una cuenta nueva-->
	<h1>¿Aún no tienes cuenta? <a class ="links" href="hsocio.php">Hazte socio</a></h1>
	<br>
	<br>
	<!--Formulario para recoger el login y la contraseña del usuario-->
	<form method="post">
	<br>
	<h4>Usuario</h4>	
	<br>
	<input type="text" name="txtUsuarioLogin" id="txtUsuarioLogin">
	<br>
	<h4>Contraseña</h4>	
	<br>
	<input type="password" name="txtContrLogin" id="txtContrLogin">
	<br>
	<br>
	<button onclick="submit" id="btnLOGIN" name="btnLogin">Iniciar sesión</button>
	</form>
<?php //recogida de datos
	if (isset($_POST["btnLogin"])){
		//conexión a la base de datos
        	$con = mysqli_connect("db","admin","test","database");
        	if(!$con){
    	    	die("La conexión ha fallado: " . mysqli_connect_error());
        	}   	
        	$usuario=$_POST['txtUsuarioLogin'];
        	$contrasena=$_POST['txtContrLogin'];
        	//consulta para obtener el DNI del usuario que ha iniciado la sesión
        	$consulta="SELECT DNI FROM SOCIO WHERE USUARIO='$usuario'AND CONTRASENA='$contrasena'" ;
        	$resultado=mysqli_query($con, $consulta);
        	$ses=mysqli_fetch_array($resultado);
        	$filas=mysqli_num_rows($resultado);
        	if($filas){
        		$dni=$ses['DNI'];
            		$_SESSION["usrDni"]=$dni;
            		$_SESSION["usrName"]=$usuario;
     	?>
     	<br>	  
     	<!--Mensaje de éxito-->
    	<h4>Usuario y contraseña correctas</h4>
    	<br>
    	<!--Hiperlink para poder modificar los datos-->
    	<h4>Para modificar tus datos pulsa <a class="links" href="cambiarSocio.php?i=<?php echo $_SESSION["usrDni"];?>">aquí</a></h4>";
    	<?php
        }else{
        	//mensaje de fallo
    	    	echo "<html>";
		echo "<br>";
		echo "<h1> Usuario o contraseña incorrectas</h1>";
		echo "<br>";
		echo "<html>";
        }
        mysqli_free_result($resultado);
        mysqli_close($con); 
     }
?>

</body>
</html>

