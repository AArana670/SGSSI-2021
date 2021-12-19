<?php session_start();?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Monke Island-Eliminar Monke</title>
	<link rel="stylesheet" href="./style.css">
	<script src="borrarMonke.js"></script>
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
	
	<img class="tituloPrin" src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjozNSwidyI6MTAwMCwiZnMiOjM1LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/RUxJTUlOQVIgUFJJTUFURVM/hanalei-fill.png"></a>
	
	<br>	
	<br>
	<!--Formulario para recoger el id del primate que se desea eliminar-->
	<form method="POST">
	<h4>Introduce el id del primate que quieres eliminar</h4>
	<br>
	<input type="text" id="txtMONKEID" name="txtMONKEID">
	<br>
	<div id="confirmar">
	<br>
	<button onclick="avisar()" id="btnDel">Borrar</button>
	<br>
	</div>
	</form>
	<!--Hiperlink para volver a ver la lista de los primates-->
	<h1><a class= "links" href="mostrarMonkes.php">Volver a la lista de primates</a></h1>

<?php   //conexión con la base de datos
	$con = mysqli_connect("db","monkeyDirector","fVNsjkNwyrtL0yqq","database");
	if(!$con){
    		die("La conexión ha fallado: " . mysqli_connect_error());
    	} //recogida de datos
	if (isset($_POST["btnYes"])&&isset($_POST["txtMONKEID"])){
		$id=$_POST['txtMONKEID'];
		if(!empty($id)){
		//consulta para eliminar el primate de la base de datos
		$consulta="DELETE FROM MONKE WHERE MONKID = '$id'";
		mysqli_query($con, $consulta);
		//mensaje de éxito
		echo"<html>";
    		echo "<br>";
    		echo"<h1> Primate eliminado correctamente";
    		echo "<br>";
    		echo"</html>";
		
		}else{
		//mensaje para advertir sobre la falta de datos
		echo "<html>";
		echo "<br>";
		echo "<h1> Tienes que introducir el id del primate </h1>";
		echo "<br>";
		echo "<html>";
		}
	}
   	mysqli_close($con);
 
?>

</body>
</html>
